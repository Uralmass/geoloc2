<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_city".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $date_create
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_create'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date_create' => 'Date Create',
        ];
    }

    public function getReview()
    {
        return $this->hasMany(Review::className(), ['id_city'=>'id']);
    }


}
