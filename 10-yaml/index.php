<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$data = Yaml::parse('foo: bar');

var_dump($data);

$data = Yaml::parse(__DIR__ . '/fixtures/data.yml');

var_dump($data);

echo Yaml::dump($data) . "\n";
