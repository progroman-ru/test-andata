<?php

namespace App\Services;

use App\Models\Comment;
use \Illuminate\Database\Eloquent\Collection;

/**
 * Class CommentsService
 * Класс-сервис для работы с комментариями
 * @package App\Services
 */
class CommentsService
{
    /**
     * Возвращает коллекцию комментариев для статьи
     * @param int $articleId
     * @return Collection
     */
    public function getCommentsForArticle(int $articleId) : Collection
    {
        return Comment::with('user')->where('article_id', $articleId)->get();
    }

    public function create(array $data) : Comment
    {
        $this->validateBeforeCreate();
        return Comment::create($data);
    }

    /**
     * Валидация комментария перед вставкой в БД
     * @return bool
     * @throws \Exception
     */
    private function validateBeforeCreate()
    {
        if (false) {
            throw new \Exception('Comment data not valid');
        }

        return true;
    }
}
