<?php

namespace App\Entities;

class ArticleEntity extends Entity
{
    private int $id;
    private string $title;
    private string $text;
    private string $email;
    private string $author;
}