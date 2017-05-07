<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Tytuł'); ?>

    <?= \kato\DropZone::widget([
       'options' => [
           'url' => 'index.php?r=gallery/create',
           'addRemoveLinks'=> true,
           'dictCancelUploadConfirmation'=> "Na pewno chcesz usunąć to zdjęcie?",
       ],
       'clientEvents' => [
           'addedfile'=>"function(file){document.getElementById('savebtn').disabled = 'true';}",
        'uploadprogress'=>"function(file){document.getElementById('savebtn').disabled = 'true';}",
        'queuecomplete'=>"function(){document.getElementById('savebtn').disabled = '';}",
        'removedfile' => "function(file){
\$.ajax({
        type: 'POST',
        url: 'index.php?r=gallery/deletep&name='+file.name,
        dataType: 'html'
    }); }"
       ],
   ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton('Dodaj zdjęcia', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>'savebtn']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<script>
    document.getElementById('savebtn').onclick = function(e) {
 window.onbeforeunload = null;
 return true;
}
window.onbeforeunload = function(e) {
    console.log("poszło?");
    $.ajax({
        type: 'POST',
        async: true,
        url: 'index.php?r=gallery/delete-uploaded-photos',
        dataType: 'html'
    }); };


    </script>