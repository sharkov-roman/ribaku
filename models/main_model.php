<?php

/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 31.08.2017
 * Time: 13:11
 */
class main_model
{
    private $id;
    private $title;
    private $description;
    private $data;
    private $text;
    private $img;
    private $video;
    private $type;

    function __construct($id,$type,$title,$description,$data,$text,$img)
    {
        $this->id = $id;
        $this->type=$type;
        $this->title = $title;
        $this->description = $description;
        $this->data = $data;
        $this->text = $text;
        $this->img = $img;
    }

    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function getDescription() {
        return $this->description;
    }
    public function setDescription($description) {
        $this->description = $description;
    }
    public function getData() {
        return $this->data;
    }
    public function getText() {
        return $this->text;
    }
    public function setText($text) {
        $this->text = $text;
    }
    public function getImg() {
        return $this->img;
    }
    public function setImg($img) {
         $this->img = $img;
    }
    public function getVideo() {
        return $this->video;
    }
    public function setVideo($video) {
        $this->video = $video;
    }
    public function getType() {
        return $this->type;
    }
    public function getId() {
        return $this->id;
    }


}