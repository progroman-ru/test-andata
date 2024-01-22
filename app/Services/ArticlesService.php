<?php

namespace App\Services;

use App\Entities\ArticleEntity;

/**
 * Class ArticlesService
 * Класс-сервис для работы со статьями
 * @package App\Services
 */
class ArticlesService
{
    public function getById(int $id) : ArticleEntity
    {
        return new ArticleEntity([]);
    }
}
