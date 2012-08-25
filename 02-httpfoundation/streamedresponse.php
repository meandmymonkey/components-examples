<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\StreamedResponse;



$file = __DIR__ . '/path/to/some/file.zip';

$response = new StreamedResponse(
    function() use ($file)
    {
        readfile($file);
    },
    200
);

$response->send();
