<?php

namespace App\Controllers;

use App\Services\ArticlesService;
use App\Services\CommentsService;
use App\System\Controller;

/**
 * Class Home
 * Контроллер главной страницы
 * @package App\Controllers
 */
class HomeController extends Controller
{
    public function index()
    {
        $articleId = 1;
        $articleService = new ArticlesService();
        $article = $articleService->getById($articleId);

        $commentsService = new CommentsService();
        $comments = $commentsService->getCommentsForArticle($articleId);

        return $this->view('home', [
            'meta' => [
                'title' => 'Test for Andata'
            ],
            'article' => $article,
            'comments' => $comments
        ]);
    }
}