<?php

namespace App\System;

use App\Controllers\Home;

/**
 * Class App
 * Основной класс приложения
 * @package App\System
 */
class App
{
    /**
     * Точка входа в приложение,  определяет контроллер, возвращает ответ от него
     * @return string
     */
    public function start() : string
    {
        try {
            $controller = new Home();
            $method = 'index';
            return $controller->$method();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}