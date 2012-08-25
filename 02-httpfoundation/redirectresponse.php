<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\RedirectResponse;

$response = new RedirectResponse('/thankyou.html');

$response->send();
