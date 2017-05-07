<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Preschooler */
/* @var $form yii\widgets\ActiveForm */
?>



    <hr>
    <?php $form = ActiveForm::begin(); ?>
    <h3>Dane dziecka</h3>

    <?= $form->field($model, 'school_year')->dropDownList($year, ['prompt'=>'Rok szkolny'])->label(false) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => "Imię"])->label('') ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true, 'placeholder' => "Nazwisko"])->label('') ?>
        
    <?= $form->field($model, 'pesel')->textInput(['maxlength' => true, 'placeholder' => "Pesel"])->label('') ?>
    
   

    <hr>
    <h3>Dane rodzica</h3>
    
    <?= $form->field($model, 'parent_name')->textInput(['maxlength' => true, 'placeholder' => "Imię"])->label('') ?>
    
    <?= $form->field($model, 'parent_surname')->textInput(['maxlength' => true, 'placeholder' => "Nazwisko"])->label('') ?>
    
    <?= $form->field($model, 'parent_address_city')->textInput(['maxlength' => true, 'placeholder' => "Miasto"])->label('') ?>

    <?= $form->field($model, 'parent_address_route')->textInput(['maxlength' => true, 'placeholder' => "Ulica"])->label('') ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'placeholder' => "Numer telefonu"])->label('') ?>

    <?= $form->field($model, 'parent_work_place')->textInput(['maxlength' => true, 'placeholder' => "Miejssce pracy rodzica"])->label('') ?>

    <?= $form->field($model, 'phone_work_number')->textInput(['maxlength' => true, 'placeholder' => "Numer telefonu służbowego"])->label('') ?>

    <?= $form->field($model, 'contact_email')->textInput(['maxlength' => true, 'placeholder' => "E-mail"])->label('') ?>

    <?= $form->field($model, 'accept_rules')->checkbox(['id'=>'accept']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Zapisz', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


