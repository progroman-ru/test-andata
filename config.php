<?php
define('APP_DIR', __DIR__);
define('TEMPLATE_DIR', APP_DIR . '/resources/views/');

if (file_exists(__DIR__ . '/env.php')) {
    require_once 'env.php';
}