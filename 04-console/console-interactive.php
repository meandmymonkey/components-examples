<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Demo\Application;
use Demo\TimeInteractiveCommand;

$app = new Application();
$app->add(new TimeInteractiveCommand());

$app->run();
