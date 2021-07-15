<?php

require 'vendor/autoload.php';

putenv('OUTPUT_PATH='.__DIR__.'/results');

$manager = new \App\DrawerManager;
$input = new \App\Inputs\TerminalInput();

$input->parse($argv);

$drawer = $manager->createDriver($input->drawer_type, $input->drawer_name);

$core = new \App\Core;

$core->handle($drawer, $input->width, $input->height);