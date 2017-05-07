<?php

namespace frontend\controllers;

use Yii;
use common\models\Gallery;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Photos;
/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Gallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $galleries= Gallery::find()->all();
        $gallery_photo_src = [];
       foreach($galleries as $gallery){
           if($gallery->photosInGalleries){
            array_push($gallery_photo_src, $gallery->photosInGalleries[0]->image);
           }
       }
     
        return $this->render('index', [
            'galleries' => $galleries,
            'gallery_photo_src' => $gallery_photo_src
        ]);
    }
    
    public function actionPhotos($id)
    {   $gallery = $this->findModel($id);
        $other_galleries = Gallery::find()->andWhere(['<>','id', $id])->all();
        $photos= Photos::find()->where(['gallery_id'=>$id])->all();
        $srcTable=[];
        foreach ($photos as $photo){
            array_push($srcTable, '<img  class="photo-in-gallery"  src="/projekt/backend/web/uploads/photos-gallery/'.$photo->image.'">'); 
        }
        
        return $this->render('photos', [
            'photos' => $srcTable,
            'gallery_title' => $gallery->title,
            'other_galleries' => $other_galleries
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
