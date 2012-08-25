<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Filesystem\Filesystem;

$fs = new Filesystem();

$fs->copy('/origin', '/target', $override = false);

$fs->mkdir('/newDir', 0777);

$fs->symlink('/origin', '/target', true); // copyOnWindows

$path = $fs->makePathRelative('/rootDir/myPath', '/rootDir');
