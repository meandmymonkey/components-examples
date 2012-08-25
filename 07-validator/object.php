<?php

use Demo\Product;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Symfony\Component\Validator\Validation;

$loader = require __DIR__ . '/vendor/autoload.php';

AnnotationRegistry::registerLoader(function($class) use ($loader) {
    $loader->loadClass($class);
    return class_exists($class, false);
});

// --------------

$builder = Validation::createValidatorBuilder();
$builder->enableAnnotationMapping(); // optionally accepts cached reader

$validator = $builder->getValidator();

$product = new Product();
$product->setName('Sausage Inna Bun (TM)');
$product->setPrice(-1);

$violations = $validator->validate($product);

var_dump($violations);
