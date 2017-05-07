<?php

namespace frontend\controllers;

use Yii;
use common\models\Menu;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ContactEmail;
use yii\db\Expression;
/**
 * ContactController implements the CRUD actions for Contact model.
 */
class MenuController extends Controller
{
    /**
     * @inheritdoc
     */
    const CONTACT = 1;
    
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
     * Lists all Contact models.
     * @return mixed
     */
    public function actionIndex()
    {
        $content= Menu::find()->where(['id' => 1])->one();
        
        return $this->render('index', [
            'content' => $content->content
        ]);
    }
}
