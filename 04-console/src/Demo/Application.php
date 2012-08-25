<?php

namespace Demo;
 
use Symfony\Component\Console\Application as BaseApplication;
 
class Application extends BaseApplication
{
    const NAME = 'Demo App';
    const VERSION = '0.1';
 
    public function __construct()
    {
        parent::__construct(static::NAME, static::VERSION);
    }
}