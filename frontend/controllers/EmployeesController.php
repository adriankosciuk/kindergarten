<?php

namespace frontend\controllers;

use Yii;
use common\models\Contact;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ContactEmail;
use yii\db\Expression;
use common\models\Employees;
/**
 * ContactController implements the CRUD actions for Contact model.
 */
class EmployeesController extends Controller
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
     * Lists all Contact models.
     * @return mixed
     */
    public function actionIndex()
    {
        $employees= Employees::find()->all();
       
         return $this->render('index', [
            'employees' => $employees,
        ]);
      
    }
}
