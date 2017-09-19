<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 16.08.17
 * Time: 11:20
 */
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
