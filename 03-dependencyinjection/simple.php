<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Demo\ArticleRepository;

$dic = new ContainerBuilder();

$dic
    ->register('db', 'PDO')
    ->addArgument('mysql:host=localhost;dbname=demo')
    ->addArgument('root')
    ->addArgument('')
;
$dic
    ->register('repository', 'Demo\\ArticleRepository')
    ->addArgument(new Reference('db'))
;

$repository = $dic->get('repository');

var_dump($repository);