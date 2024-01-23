<?php

namespace App\Api\Controllers;

use App\System\Controller;

/**
 * Class ApiController
 * Базовый класс для API-контроллеров
 * @package App\Controllers
 */
abstract class ApiController extends Controller
{
    /**
     * Проверка, что метод POST
     * @return bool
     */
    protected function isMethodPost() : bool
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    /**
     * Возвращает POST-данные
     * @return array
     */
    protected function getPost() : array
    {
        return $_POST;
    }

    /**
     * Возвращает ответ в виде json
     * @param array $data
     * @return string
     */
    protected function responseJson(array $data) : string
    {
        return json_encode($data);
    }
}