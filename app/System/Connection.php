<?php

namespace App\System;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class Connection
 * Класс подключения к БД
 * @package App\System
 */
class Connection
{
    public function __construct($driver, $host, $port, $database, $user, $password) {
        $capsule = new Capsule;
        $capsule->addConnection([
            "driver" => $driver,
            "host" => $host,
            "post" => $port,
            "database" => $database,
            "username" => $user,
            "password" => $password,
            "charset" => "utf8",
            "collation" => "utf8_general_ci",
            "prefix" => "",
        ]);

        $capsule->bootEloquent();
    }
}