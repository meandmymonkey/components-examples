<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Demo\ArticleRepository;

$dic = new ContainerBuilder();

$dic
    ->register('db', '%db.class%')
    ->addArgument('%db.dsn%')
    ->addArgument('%db.username%')
    ->addArgument('%db.password%')
;
$dic
    ->register('repository', '%repository.class%')
    ->addArgument(new Reference('db'))
;

$dic->setParameter('repository.class', 'Demo\\ArticleRepository');
$dic->setParameter('db.class', 'PDO');
$dic->setParameter('db.dsn', 'mysql:host=localhost;dbname=demo');
$dic->setParameter('db.username', 'root');
$dic->setParameter('db.password', '');

$repository = $dic->get('repository');

var_dump($repository);