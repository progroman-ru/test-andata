<?php

namespace App\System;

use App\Controllers\HomeController;
use App\Models\Article;

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
            $this->connection();
            $route = $this->route();
            return $this->response($route);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    private function connection() : Connection
    {
        return new Connection(DBDRIVER, DBHOST, DBPORT, DBNAME, DBUSER, DBPASS);
    }

    /**
     * Определяет контроллер и метод, который будет обрабатывать запрос
     * @return array
     */
    private function route() : callable
    {
        return [new HomeController(), 'index'];
    }

    /**
     * Запускает контроллер
     * @param callable $controller
     * @return string
     */
    private function response(callable $controller) : string
    {
        return call_user_func($controller);
    }
}