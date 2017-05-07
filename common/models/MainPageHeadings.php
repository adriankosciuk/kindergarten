<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "main_page_headings".
 *
 * @property integer $id
 * @property string $header
 * @property string $content
 * @property string $url
 */
class MainPageHeadings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_page_headings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['header'], 'required'],
            [['header', 'content', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'header' => 'Nagłówek',
            'content' => 'Treść',
            'url' => 'Adres przekierowania',
        ];
    }
}
