<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\EventListener\ExceptionListener;

$routes = new RouteCollection();

$legacyWrapper = function($legacyController, Request $request)
{
    if (file_exists($legacyController)) {
        ob_start();
        require $legacyController;
        $result = ob_get_contents();
        ob_end_clean();

        return new Response($result);
    } else {
        throw new NotFoundHttpException('Not found!');
    }
};

$routes->add('newRoute', new Route('/new', array('_controller' =>
    function(Request $request)
    {
        return new Response('new');
    }
)));

$routes->add('legacy', new Route('/legacypath', array('_controller' =>
    function(Request $request) use ($legacyWrapper)
    {
        return $legacyWrapper(__DIR__ . '/legacy/old.php', $request);
    }
)));

$request = Request::createFromGlobals();

$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

$dispatcher = new EventDispatcher();
$dispatcher->addSubscriber(new RouterListener($matcher));

$resolver = new ControllerResolver();

$kernel = new HttpKernel($dispatcher, $resolver);

$dispatcher->addSubscriber(new ExceptionListener(function (Request $request) {
    $exception = $request->get('exception');
    $msg = 'Oops! ' . $exception->getMessage();
    $status = $exception->getStatusCode() === 404 ? 404 : 500;

    return new Response($msg, $status);
}));

$kernel->handle($request)->send();
