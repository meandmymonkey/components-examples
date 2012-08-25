<?php

use Demo\Product;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

$loader = require __DIR__ . '/vendor/autoload.php';

// --------------

$validator = Validation::createValidator();

$constraint = new Assert\Collection(array(
    'name' => array(
        new Assert\Length(array(
            'min' => 3,  'minMessage' => 'Be descriptive, dude!',
            'max' => 20, 'maxMessage' => 'Don\'t get carried away...'
        )),
        new Assert\NotBlank()
    ),
    'price' => new Assert\Range(array('min' => 0))
));

$product = array(
    'name'  => 'Sausage Inna Bun (TM)',
    'price' => 3.99
);

$violations = $validator->validateValue($product, $constraint);

var_dump($violations);
