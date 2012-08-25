<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();



$request->query->get('product-id');

$lastProduct = $request->cookies->get('last-product', 1234);

$request->getContentType();

$request->getPreferredLanguage(array('de', 'en'));

$request->isXmlHttpRequest();


var_dump($request);
