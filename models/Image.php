<?php

namespace app\models;

use dastanaron\translit\Translit;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Image extends ActiveRecord
{
    public static function tableName()
    {
        return 'image';
    }

    public $img;

    public function rules()
    {
        return [
            [['name', 'datetime', 'img'], 'required', 'message' => 'Необходимо добавить как минимум 1 изображение'],
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 5],
        ];
    }

    public function add()
    {
        $translate = new Translit();
        $this->img = UploadedFile::getInstances($this, 'img');
        foreach ($this->img as $item) {
            $this->name = mb_strtolower($translate->translit($item->baseName, true, 'ru-en'));
            if(file_exists('img/'.$this->name.'.'.$item->extension)){
                $this->name .= "_" . time();
            }
            $this->name = $this->name . '.' . $item->extension;

            if($item->saveAs('img/'.$this->name)){
                $model = new Image();
                $model->name = $this->name;
                $model->datetime = date('Y-m-d H:i:s');
                $model->save(false);
            }
        }
        return true;
    }
}