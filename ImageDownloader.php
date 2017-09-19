<?php

/**
 * Created by PhpStorm.
 * User: st
 * Date: 11.07.2017
 * Time: 18:44
 */
class ImageDownloader
{
    const IMAGE_PATH = '../src/img/';
    const MAX_WIDTH = 800;

    private $tmp_file_names;


    public function __construct($_FILE)
    {
        $this->tmp_file_names = array();
        foreach ($_FILES as $file){
            $this->tmp_file_names[] = $file['tmp_name'];
        }
    }

    public function uploadAllImages(){
        if(!count($this->tmp_file_names)){
            return null;
        }
        $arrayImages = array();
        for($i=0; $i<count($this->tmp_file_names); $i++){
            $arrayImages[] = $this->uploadImageAndResize($this->tmp_file_names[$i]);
        }
        return $arrayImages;
    }

    public function uploadFourImages(){
        if(!count($this->tmp_file_names)){
            return null;
        }
        $arrayImages = array();
        for($i=0; $i<4; $i++){
            $imgName = $this->uploadImageAndResize($this->tmp_file_names[$i]);
            if(isset($imgName)){
                $arrayImages[] = $imgName;
            }else{
                $arrayImages[] = 'img.png';
            }
        }
        return $arrayImages;
    }

    private function uploadImageAndResize($tmpFileName, $imagePath = self::IMAGE_PATH, $maxWidth = self::MAX_WIDTH)
    {
        if (empty($tmpFileName)){
            return null;
        }
        /*
         * $imageTemp - ссылка на временное изображение
         * $imagePath - папка, куда сохраняем обработанную картинку
         * $maxWidth -  ширина картинки
        */
        # Допустимые расширения
        $enabled = array('png', 'gif', 'jpeg');
        if ($info = getimagesize($tmpFileName)) {
            $type = trim(strrchr($info['mime'], '/'), '/');
            # Если тип не подходит
            if (!in_array($type, $enabled))
                return false;
            # Исходя из типа формируем названия функций
            $imageCreateF = 'imagecreatefrom' . $type;
            $imageSaveF = 'image' . $type;
            $imageName = md5(microtime()) . '.' . $type;
            # Получаем данные об изображении
            list($width, $height) = $info;
            # Создаём ресурс изображения
            $src_im = $imageCreateF($tmpFileName);
            # Коэффициент
            $ratio = $width / $maxWidth;
            # Вычисляем ширину
            $new_width = $maxWidth;
            # Вычисляем высоту
            $new_height = $height / $ratio;
            # Создаём новое изображение
            $dst_im = imagecreatetruecolor($new_width, $new_height);
            # Ресайз
            imagecopyresampled($dst_im, $src_im, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            # Чистим память
            unset($src_im);
            # Сохраняем превьюшку
            if (!$imageSaveF($dst_im, $imagePath . $imageName))
                return false;
            # Очищаем память
            unset($dst_im);
            # Удалем временный файл
            unlink($tmpFileName);
            # Возвращаем имя
            return $imageName;
        }

    }

}