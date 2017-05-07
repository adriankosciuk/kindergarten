<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "send_email".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property string $post_date
 */
class ContactEmail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'send_email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['message'], 'string'],
            [['post_date'], 'safe'],
            [['name', 'email', 'subject'], 'string', 'max' => 60],
        ];
    }
    
    public function afterSave($insert, $changedAttributes){
        $this->send_email($this->attributes);
    }
    
    public function send_email($data)
    {
        return Yii::$app->mailer->compose('contactEmail', ['data'=>$data])
            ->setFrom($data['email'])
            ->setTo('johnytributante@gmail.com')
            ->setSubject($data['subject'])
            ->setTextBody($data['message'])
            ->send();
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'subject' => 'Subject',
            'message' => 'Message',
            'post_date' => 'Post Date',
        ];
    }
}
