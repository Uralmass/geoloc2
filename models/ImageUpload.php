<?php

namespace app\models;

use yii\base\Model;

class ImageUpload extends Model
{


    public $image;

    public function uploadFile($file)
    {

        $this->image = $file;

        $filename = strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);

        $file->saveAs(\Yii::getAlias('@web') . 'uploads/' . $filename);

        return $filename;
    }

}
