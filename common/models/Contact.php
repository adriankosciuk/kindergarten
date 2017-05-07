<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $city
 * @property string $addres
 * @property string $phone_number
 * @property string $email
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city', 'addres', 'DuringTheWeek'], 'required'],
            [['city', 'addres', 'email', 'DuringTheWeek', 'ForTheWeekend'], 'string', 'max' => 100],
            [['phone_number'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'Miasto',
            'addres' => 'Adres',
            'phone_number' => 'Numer telefonu',
            'email' => 'Adres E-mail',
            'DuringTheWeek' => 'W trakcie tygodnia',
            'ForTheWeekend' => 'W trakcie weekendu'
        ];
    }
}
