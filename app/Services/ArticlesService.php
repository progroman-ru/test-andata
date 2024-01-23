<?php

namespace App\Services;

use App\Models\Article;

/**
 * Class ArticlesService
 * Класс-сервис для работы со статьями
 * @package App\Services
 */
class ArticlesService
{
    public function getById(int $id) : Article
    {
        return Article::where('id', $id)->first();
    }
}
