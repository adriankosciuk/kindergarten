<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $image
 */
class Images extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['file'],'file'],
            [['name'], 'unique'],
            [['height'], 'integer'],
            [['width'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Tytuł',
            'image' => 'Podgląd',
            'file' => 'Obrazek',
            'height' => 'Wysokość',
            'width' => 'Szerokość'
        ];
    }
    
    public static function saveUrl($title){
        
        $characters = array();
        $characters['Ą'] = 'a';
        $characters['Ć'] = 'c';
        $characters['Ę'] = 'e';
        $characters['Ł'] = 'l';
        $characters['Ń'] = 'n';
        $characters['Ó'] = 'o';
        $characters['Ś'] = 's';
        $characters['Ż'] = 'z';
        $characters['Ź'] = 'z';
        $characters['ą'] = 'a';
        $characters['ć'] = 'c';
        $characters['ę'] = 'e';
        $characters['ł'] = 'l';
        $characters['ń'] = 'n';
        $characters['ó'] = 'o';
        $characters['ś'] = 's';
        $characters['ż'] = 'z';
        $characters['ź'] = 'z';
        $characters['%'] = '';
        $characters['/'] = '';
        $characters['&'] = '';
        $characters['@'] = '';
        $characters['.'] = '';
        $characters['!'] = '';

        $keys = array_keys($characters);
        $values = array_values($characters);
        $tytul = $title;
        $adres = strtr($tytul, ' ', '-');
        $adres2 = str_replace($keys, $values, $adres);
        $url = strtolower($adres2);
        return $url;
    }
}
