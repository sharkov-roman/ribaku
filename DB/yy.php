<?php

/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 19.09.2017
 * Time: 17:55
 */
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