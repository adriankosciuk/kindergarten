<?php

namespace common\models;

use Yii;
use yii\db\Query;
/**
 * This is the model class for table "photos_in_gallery".
 *
 * @property integer $photo_id
 * @property integer $gallery_id
 * @property string $created_at
 *
 * @property PhotosGallery $gallery
 */
class Photos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photos_in_gallery';
    }

    static function deletePhotos(){
         $photos = Photos::find()->where(['upload'=> 1])->all();
        if($photos){
            foreach($photos as $photo){
             unlink('uploads/photos-gallery/' . $photo->image);
         }
         Yii::$app->db->createCommand()->delete('photos_in_gallery', ['upload' => 1])->execute();
        } 
    }
public function addGalleryIdToPhotos($id){
 Yii::$app->db->createCommand()->update('photos_in_gallery', ['gallery_id' => $id], 'upload = 1')->execute();
 Yii::$app->db->createCommand()->update('photos_in_gallery', ['upload' => 0])->execute();
}
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gallery_id'], 'integer'],
            [['created_at'], 'safe'],
            [['image'], 'string'],
            [['upload'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'photo_id' => 'Photo ID',
            'gallery_id' => 'Gallery ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(Gallery::className(), ['id' => 'gallery_id']);
    }
}
