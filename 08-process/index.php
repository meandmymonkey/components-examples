<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Process\Process;

$process = new Process('ps');
$process->setTimeout(1);

$process->run();

if (!$process->isSuccessful()) {
    throw new RuntimeException($process->getErrorOutput());
}

print $process->getOutput();
