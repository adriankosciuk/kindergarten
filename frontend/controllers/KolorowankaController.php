<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Images;

/**
 * Site controller
 */
class KolorowankaController extends Controller {

    public function actionListaKolorowanek() {
        $drawings = Images::find()->all();
        return $this->render('lista_kolorowanek', ['drawings' => $drawings]);
    }

    public function actionKolorowanka() {
        $image = $_GET['image'];
        $draw = Images::find()->where(['url' => $image])->one();
        if(!is_int($draw->height)){
            $draw->height = '700';
            $draw->width = '850';
        }
       
        $colors = ['blue', 'midnightblue', 'cornflowerblue', 'turquoise', 'red','firebrick', 'Crimson', 'IndianRed', 'HotPink', 'DeepPink', 'OrangeRed', 'Tomato', 'Orange', 'Yellow', 'Khaki', 'Moccasin', 'LawnGreen', 'LimeGreen', 'MediumSpringGreen', 'DarkGreen', 'Olive', 'DarkOliveGreen', 'BlueViolet', 'Indigo', 'Plum', 'DarkSlateBlue', 'SandyBrown', 'Chocolate', 'Sienna', 'Brown', 'Silver','gray', 'Black', 'White'  ];
          $templateString = array(
            'front' => file_get_contents('http://localhost/projekt/backend/web/uploads/drawings/' . $draw->url.'.'.'svg', FILE_USE_INCLUDE_PATH)
        );
        $pos = strpos($templateString['front'], '<svg');
        $string = substr($templateString['front'], $pos);
//        $string = preg_replace("/width='(.*)'/",'width="612"',$string);
//        $string = preg_replace("/height='(.*)'/",'height="792"',$string);
        $newstr = substr_replace($string, " style='left: 0px; top: 0px; position: absolute; width: 100%; opacity: 0;' id='svg' ", 4, 0);
       
        return $this->render('kolorowanka', ['draw' => $draw, 'svg'=>$newstr, 'colors' => $colors]);
    }
    
    
     public function actionIndex() {
        return 'Index';
    }
   
    
    
    
    public function action_drawings() { 
        $drawings = Images::get();
        return $this->render('index', ['drawings' => $drawings]);
    }

    public function action_draw() {
        $image = $_GET['image'];
        $draw = Drawing::where('url', '=', $image)->first();
        $similar = Drawing::where('category_id', '=', $draw->category_id)->where('id', '!=', $draw->id)->get();

        $templateString = array(
            'front' => file_get_contents('public/images/drawings/original/' . $draw->image_filename, FILE_USE_INCLUDE_PATH)
        );
        $pos = strpos($templateString['front'], '<svg');
        $string = substr($templateString['front'], $pos);
        $string = preg_replace("/width='(.*)'/", 'width="612"', $string);
        $string = preg_replace("/height='(.*)'/", 'height="792"', $string);
        $newstr = substr_replace($string, " style='left: 0px; top: 0px; position: absolute; width: 100%; height: 100%; opacity: 0;' id='svg' width='612px' height='792px'", 4, 0);

        $this->render('index')->with('draw', $draw)->with('string', $newstr)->with('similar', $similar);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

}
