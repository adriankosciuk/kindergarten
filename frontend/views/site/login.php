<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Login') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Hasło') ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label('Zapamiętaj mnie') ?>

                <div style="color:#999;margin:1em 0">
                    Jeśli zapomniałeś hasła: <?= Html::a('kliknij tutaj', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Zaloguj', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
