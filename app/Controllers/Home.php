<?php

namespace App\Controllers;

use App\System\Controller;

/**
 * Class Home
 * Контроллер главной страницы
 * @package App\Controllers
 */
class Home extends Controller
{
    public function index()
    {
        return $this->view('home', [
            'meta' => [
                'title' => 'Test for Andata'
            ],
            'title' => 'Test for Andata'
        ]);
    }
}