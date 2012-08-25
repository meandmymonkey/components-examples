<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpFoundation\Request;

$routes = new RouteCollection();
$routes->add('hello', new Route('/hello', array('_controller' =>
    function(Request $request)
    {
        return sprintf('Hello %s!', $request->query->get('name'));
    }
)));

$request = Request::createFromGlobals();

$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

$parameters = $matcher->match($request->getPathInfo());

echo $parameters['_controller']($request);
