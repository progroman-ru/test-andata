<?php

namespace App\Api\Controllers;

use App\Services\CommentsService;
use App\Services\UsersService;

/**
 * Class CommentsController
 * Класс-контроллер работы с комментариями
 * @package App\Controllers
 */
class CommentsController extends ApiController
{
    /**
     * Добавление нового комментария
     */
    public function create() : string
    {
        if ($this->isMethodPost() && $this->validate()) {
            $post = $this->getPost();

            $service = new UsersService();
            $user = $service->findOrCreate($post['name'], $post['email']);

            $service = new CommentsService();
            $service->create([
                'user_id' => $user->id,
                'title' => $post['title'],
                'text' => $post['text'],
            ]);

            return $this->responseJson(['success' => false]);
        }

        return $this->responseJson(['success' => false]);
    }

    private function validate()
    {
        //todo реализовать проверку
        return true;
    }
}