<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->name('*.php')
    ->depth(4)
    ->in(__DIR__ . '/vendor/symfony') // can use stream wrappers - s3://, ftp:// etc.
;

foreach ($iterator as $file) {
    echo $file->getRealpath()."\n";
}
