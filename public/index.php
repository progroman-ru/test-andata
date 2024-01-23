<?php
require __DIR__.'/../vendor/autoload.php';

$config = require '../config.php';
$app = new \App\System\App();
echo $app->start();