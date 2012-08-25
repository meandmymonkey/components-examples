<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

$response = new Response('Hello FrosCon!', 200);

$response->send();
