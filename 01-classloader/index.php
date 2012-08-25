<?php

require_once __DIR__ . '/vendor/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;
use Demo\Article;

$loader = new UniversalClassLoader();
$loader->register();

$loader->registerNamespace('Demo', __DIR__ . '/src');

$article = new Article();

var_dump($article);
