<?php

namespace backend\controllers;

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
        Photos::deletePhotos();
        $dataProvider = new ActiveDataProvider([
            'query' => Gallery::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gallery model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $gallery = $this->findModel($id);
        $photos= Photos::find()->where(['gallery_id'=>$id])->all();
        $srcTable=[];
        foreach ($photos as $photo){
            array_push($srcTable, '<img  class="photo-in-gallery"  src="/projekt/backend/web/uploads/photos-gallery/'.$photo->image.'">'); 
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'photos' => $srcTable,
        ]);
    }

    /**
     * Creates a new Gallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gallery();
        $photo = new Photos();
        $fileName = 'file';
        $uploadPath = 'uploads/photos-gallery';
        $randomString = Yii::$app->getSecurity()->generateRandomString(10);
        
         
          
           if ($model->load(Yii::$app->request->post()) ) {
               $model->save();
               $photo->addGalleryIdToPhotos($model->id);
            return $this->redirect(['update', 'id' => $model->id]);
        }
    else {
        if (isset($_FILES[$fileName])) {
                $file = \yii\web\UploadedFile::getInstanceByName($fileName);
        if ($file->saveAs($uploadPath . '/' . $randomString . '_' . $file->name)) {
            $photo->image = $randomString . '_' .$file->name;
            $photo->upload = 1;
            $photo->save();
          }}
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Gallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $photosInGallery= Photos::find()->where(['gallery_id'=> $id])->all();
        $randomString = Yii::$app->getSecurity()->generateRandomString(10);
        
        $photo = new Photos();
        $fileName = 'file';
        $uploadPath = 'uploads/photos-gallery';
        
           if ($model->load(Yii::$app->request->post()) ) {
            
            $model->save();
            $photo->addGalleryIdToPhotos($model->id);
           
            return $this->redirect(['update', 'id' => $model->id, 'photos'=>$photosInGallery]);
        }
    else {
        if (isset($_FILES[$fileName])) {
                $file = \yii\web\UploadedFile::getInstanceByName($fileName);
     
        if ($file->saveAs($uploadPath . '/' .$randomString . '_' . $file->name)) {
             
            //Now save file data to database
            $photo->upload = 1;
            $photo->image = $randomString . '_' .$file->name;
            $photo->save();
          }}
          
            return $this->render('update', [
                'model' => $model,
                'photos'=>$photosInGallery,
                'id' => $model->id
            ]);
        }
    }
    public function actionDeleteUploadedPhotos(){
        Photos::deletePhotos();
    }
    
    /**
     * Deletes an existing Gallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
                if(count($this->findModel($id)->photosInGalleries)){
                     Yii::$app->session->setFlash('error', Yii::t('app', 'Ta galeria zawiera zdjęcia i nie może zostać usunięta.'));
                }else{
        $this->findModel($id)->delete();
                }
                return $this->redirect(['index']);
    }

    public function actionDeletep($name){
        $photo = Photos::find()->where(['image'=> $name])->one();
        if($photo){
            $photo->delete();
            unlink('uploads/photos-gallery/' . $name);
        }
    }
    
    public function actionGetphotos($id){
        $photos= Photos::find()->where(['gallery_id'=>$id])->all();
        return encode($photos);
    }
    /**
     * Finds the Gallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
