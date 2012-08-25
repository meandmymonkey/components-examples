<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Processor;
use Demo\Configuration;

$configuration = new Configuration();
$processor = new Processor();

$raw1 = Yaml::parse(__DIR__ . '/fixtures/data.yml');
$raw2 = Yaml::parse(__DIR__ . '/fixtures/data_extend.yml');

$rawConfigs = array($raw1['config'], $raw2['config']);

$config = $processor->processConfiguration($configuration, $rawConfigs);

// cache config...

var_dump($config);
