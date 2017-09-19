<?php


class Rout
{
    const INDEX='';
    const VODOEMY ='vodoemy';
    const USPEH='uspeh';
    const LETO='leto';
    const ZIMA='zima';
    const VIDEO ='video';
    const FOTO='foto';
    private $controller;

    public function __construct()
    {
        $params = explode('/', $_SERVER["REQUEST_URI"]);
        if (!empty($params[3])){
            $this->controller = new ErrorController();
        }

        if(isset($params[1]) and empty($params[2])) {
            switch ($params[1]) {
                case self::INDEX :
                    $this->controller = new MainController();
                    break;
                case self::VODOEMY :
                    $this->controller = new VodoyomController();
                    break;
                case self::USPEH :
                    $this->controller = new UspehController();
                    break;
                case self::LETO :
                    $this->controller = new LetoController();
                    break;
                case self::ZIMA :
                    $this->controller = new ZimaController();
                    break;
                case self::VIDEO :
                    $this->controller = new VideoController();
                    break;
                case self::FOTO :
                    $this->controller = new FotoController();
                    break;
            }
        } else
            if (!empty($params[2]) and !empty($params[1])) {
                $this->controller = new PostController($params[2]);
            }

    }
    public function resp()
    {
        $this->controller->response();
    }
}
//------------------------------------

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
        echo $_SERVER['DOCUMENT_ROOT'];

    }

}
//----------------------------
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
        $array = DB::getDB()->getArticlesWhereType(self::tableName, $type);
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
//-------------------
class DB
{
    const DB_NAME='ribaku';
    const  DB_HOST='localhost';
    const DB_USER_NAME='root';
    const DB_USER_PASSWORD='';

    private $connection;
    private static $db=null;

    public function __construct()
    {
        $this->connection=new mysqli(self::DB_HOST, self::DB_USER_NAME, self::DB_USER_PASSWORD,self::DB_NAME);
        $this->connection->query("SET lc_time_names = 'ru_RU'");
        $this->connection->query("SET NAMES 'utf8'");

    }

    public function __destruct()
    {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    public static function getDB()
    {
        if (self::$db == null) {
            self::$db = new DB();
        }
        return self::$db;
    }
    public  function getArticles($tableName) {
        $sql = "SELECT  * FROM $tableName";
        $result = $this->connection->query($sql);
        $array = array();
        while($row = $result->fetch_assoc()){
            $array[] = $row;
        }
        return $array;
    }
    public  function getArticlesWhereType($tableName, $type) {
        $sql = "SELECT * FROM $tableName WHERE type = '$type' ";
        $result = $this->connection->query($sql);
        $array = array();
        while($row = $result->fetch_assoc()){
            $array[] = $row;
        }
        return $array;
    }
    public  function getArticlesWhereId($tableName, $id) {
        $sql = "SELECT * FROM $tableName WHERE id = '$id' ";
        $result = $this->connection->query($sql);
        $array = array();
        while($row = $result->fetch_assoc()){
            $array[] = $row;
        }
        return $array;
    }
}