<?php

/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 06.09.2017
 * Time: 13:41
 */
class PostController
{
    function __construct($id)
    {
        $this->id=$id;
    }

    public function response()
    {
        $articles = new ArticlesRelation();
        $arts = $articles->getArticleById($this->id);

        include_once '/Views/header.php';
        include_once '/Views/post.php';
        include_once '/Views/footer.php';
    }

}