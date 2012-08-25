<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;

$routes = new RouteCollection();
$routes->add('hello', new Route('/hello', array('_controller' => function()
{
    return 'Hello World!';
})));

$context = new RequestContext();
$matcher = new UrlMatcher($routes, $context);

$parameters = $matcher->match('/hello'); // get route form environment

echo $parameters['_controller']();
