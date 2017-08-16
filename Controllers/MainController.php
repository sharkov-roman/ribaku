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

    private $slug;

//    public function __construct($slug)
//    {
//        $this->slug = $slug;
//    }

    public function response()
    {

        include_once 'Views/header.php';
        include_once 'Views/main.php';
        include_once 'Views/footer.php';
    }
}