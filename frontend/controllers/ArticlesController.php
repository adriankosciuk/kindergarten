<?php

namespace frontend\controllers;

use Yii;
use common\models\Gallery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Articles;
/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class ArticlesController extends Controller
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
        $articles= Articles::find()->all();
        
     
        return $this->render('index', [
            'articles' => $articles
        ]);
    }
    
    public function actionArticle($id){
        $article = Articles::find()->where(['id' => $id])->one();
        
        return $this->renderAjax('article', [
            'article' => $article
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
