<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 16.08.17
 * Time: 18:41
 */
require_once 'IController.php';
class MainController implements IController
{

    public function response()
    {
        $articles = new ArticlesRelation();
        $arts = $articles->getArticles();
        include_once 'Views/header.php';
        include_once 'Views/main.php';
        include_once 'Views/footer.php';


    }

}