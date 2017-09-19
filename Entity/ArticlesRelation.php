<?php

/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 31.08.2017
 * Time: 14:08
 */

class ArticlesRelation
{
    const tableName = 'articles';
    public function getArticles() {
        $articles = array();
        $array = DB::getDB()->getArticles(self::tableName);
        foreach ($array as $article) {
            $articles[] = new main_model($article['id'],$article['type'], $article['title'],$article['description'],$article['data'],$article['text'],$article['img']);
        }
    return $articles;
    }

    public function getArticlesWhere($type) {
        $articles = array();
        $array = DB::getDB()->getArticlesWhere(self::tableName, $type);
        foreach ($array as $article) {
            $articles[] = new main_model($article['id'],$article['type'], $article['title'],$article['description'],$article['data'],$article['text'],$article['img']);
        }
        return $articles;
    }
    public function getArticleById($id) {
        $articles = array();
        $array = DB::getDB()->getArticlesWhereId(self::tableName, $id);
        foreach ($array as $article) {
            $articles[] = new main_model($article['id'],$article['type'], $article['title'],$article['description'],$article['data'],$article['text'],$article['img']);
        }
        return $articles;
    }
}