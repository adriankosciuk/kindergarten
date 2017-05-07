<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\redactor\widgets\Redactor;
use dosamigos\tinymce\TinyMce;
/* @var $this yii\web\View */
/* @var $model app\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'content')->widget(TinyMce::className(), [
    'options' => ['rows' => 30],
    'language' => 'pl',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen textcolor colorpicker",
            "insertdatetime media table contextmenu paste image responsivefilemanager filemanager",
            
        ],
        'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager link image media forecolor backcolor',
        'external_filemanager_path' => '/projekt/backend/web/plugins/responsivefilemanager/filemanager/',
        'filemanager_title' => 'Responsive Filemanager',
        'external_plugins' => [
            'filemanager' => '/projekt/backend/web/plugins/responsivefilemanager/filemanager/plugin.min.js',
            'responsivefilemanager' => '/projekt/backend/web/plugins/responsivefilemanager/filemanager/plugin.min.js',
        ],
        'relative_urls' => false,
        'file_browser_callback'=> new yii\web\JsExpression("function(field_name, url, type, win) {
            if(type=='image') $('#my_form input').click();
        }"),
        ]
]);?>
    
    <div class="form-group">
        <?= Html::submitButton('Zapisz', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
 