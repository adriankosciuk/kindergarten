<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "offer_page_content".
 *
 * @property integer $id
 * @property string $content
 */
class OfferPageContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offer_page_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Zawartość',
        ];
    }
}
