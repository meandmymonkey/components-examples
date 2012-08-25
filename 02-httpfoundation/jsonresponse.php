<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\JsonResponse;

// application/json
$response = new JsonResponse(
    array(
        'name'  => 'John Doe',
        'email' => 'j.doe@example.com'
    )
);

// text/javascript
$response->setCallback('jsCallback');

$response->send();
