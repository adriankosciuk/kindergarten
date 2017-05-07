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
/**
 * ContactController implements the CRUD actions for Contact model.
 */
class ContactController extends Controller
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
        $contact= Contact::find(self::CONTACT)->one();
        $addres= $contact->addres.', '.$contact->city;
        $model= new ContactEmail;
        
        if ($model->load(Yii::$app->request->post())) {
            $model->post_date = new Expression('NOW()');
            $model->save();
            \Yii::$app->getSession()->setFlash('success', 'Dziękujemy za wysłane maila');
           return $this->redirect(['index']);
        }else{
              return $this->render('index', [
            'contact' => $contact,
            'addres' => $addres,
            'model' => $model
        ]);
        }
      
    }
}
