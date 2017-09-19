<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 16.08.17
 * Time: 19:05
 */
class VodoyomController
{
    const TYPE ='lake';
    public function response()
    {

        $articles = new ArticlesRelation();
        $lakes = $articles->getArticlesWhere(self::TYPE);

        include_once 'Views/header.php';
        include_once 'Views/vodo.php';
        include_once 'Views/footer.php';
    }
}