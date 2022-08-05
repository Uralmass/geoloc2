<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "tbl_review".
 *
 * @property int $id
 * @property int|null $id_city
 * @property string|null $title
 * @property string|null $text
 * @property int|null $rating
 * @property string|null $image
 * @property int|null $id_author
 * @property string|null $date_create
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_city', 'rating'], 'integer'],
            [['date_create'], 'date', 'format' => 'php:Y-m-d'],
            [['date_create'], 'default', 'value' => date('Y-m-d')],
            [['title'], 'string', 'max' => 100],
            [['text'], 'string', 'max' => 255],
            [['rating'], 'in', 'range' => [1, 2, 3, 4, 5], 'message' => "Целое число от 1 до 5"],
            //   [['id_author'], 'attribute' => 'fio', 'value' => 'fio'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_city' => 'Id City',
            'title' => 'Название',
            'text' => 'Текст',
            'rating' => 'Рейтинг',
            'image' => 'Изображение',
            'id_author' => 'Id Author',
            'date_create' => 'Date Create',
        ];
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/' . $this->image : '/no-image.png';
    }

    public function saveReview()
    {
        $this->id_author = Yii::$app->user->id;
        return $this->save();
    }

    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'id_author']);
    }


}
