<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "weather".
 *
 * @property int $id
 * @property string $city
 * @property string $temp
 */
class Weather extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'weather';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city', 'temp'], 'required'],
            [['city', 'temp'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'temp' => 'Temp',
        ];
    }
}
