<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Demo\Application;
use Demo\TimeCommand;

$app = new Application();
$app->add(new TimeCommand());

$app->run();
