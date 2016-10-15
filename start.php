#!/usr/bin/env php
<?php

$autoloader = require __DIR__ . '/vendor/autoload.php';

use DrupalCodeGenerator\Commands;
use DrupalCodeGenerator\GeneratorDiscovery;
use Symfony\Component\Console\Application;
use Symfony\Component\Filesystem\Filesystem;

// Register Vendor directories.
$commands_directories[] = DCG_ROOT . '/src/Commands';
$twig_directories[] = DCG_ROOT . '/src/Templates';

// Register app directories.
$commands_directories[] = __DIR__ . '/src/Commands';
$twig_directories[] = __DIR__ . '/src/Templates';

// @todo: Register other direcotries (modules, user home dir,  etc.).

// Discover generators.
$discovery = new GeneratorDiscovery($commands_directories, $twig_directories, new Filesystem());
$generators = $discovery->getGenerators();

// @todo: loop through generators and prefix command names with 'generate:'.

// Build application.
$application = new Application('My App');
$application->addCommands($generators);
$application->run();
