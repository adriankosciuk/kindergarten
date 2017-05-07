<style>
    .photo{
        width: 367px;
        height: 280px;
        float: left;
        margin: 5px 6px 5px 6px;
    }
    
    .photo>button{
        margin-top: 5px;
        font-size: 16px; 
        width: 100%;
        display: none;
        background-color: red;
        border: none;
    }
    .photo>button:hover{
        font-size: 18px; 
        border: 3px;
        border-color: black;
    }
</style><?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Tytuł'); ?>

<?=
\kato\DropZone::widget([
    'options' => [
        'url' => 'index.php?r=gallery/create',
        'addRemoveLinks' => true,
        'dictCancelUploadConfirmation' => "Na pewno?",
    ],
    'clientEvents' => [
        'addedfile'=>"function(file){document.getElementById('savebtn').disabled = 'true';}",
        'uploadprogress'=>"function(file){document.getElementById('savebtn').disabled = 'true';}",
        'queuecomplete'=>"function(){console.log(document.getElementById('savebtn'));document.getElementById('savebtn').disabled = '';}",
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
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <img id="modal" class="img-responsive">
        </div>
    </div>
  </div>
</div>
<div id="photos">
    <?php foreach ($photos as $photo): ?>
        <div class="photo" data-type="<?= $photo->image; ?>" >
            <?php echo Html::img('@web/uploads/photos-gallery/' . $photo->image, ['data-target'=>'#myModal','data-toggle'=>'modal','width' => '367px', 'height' => '200px', 'data-type' => $photo->image]) ?> 
            <button data-type="<?= $photo->image; ?>" id="<?= $photo->image; ?>">Usuń</button>
        </div>
    <?php endforeach; ?>
</div>
<script>
    (function () {

        container = document.querySelector("#photos");

        container.addEventListener("mouseover", function (e) {
            var id = e.target.dataset.type;
            document.getElementById(id).style.display = "block";
             if (e.target.tagName == 'IMG') {
                e.target.style.cursor = "pointer";
            }
        });

        container.addEventListener("mouseout", function (e) {
            var id = e.target.dataset.type;
            document.getElementById(id).style.display = "none";
        });

        container.addEventListener("click", function (e) {
            if (e.target.tagName == 'BUTTON') {
                var id = e.target.dataset.type;
                var r = confirm("Na pewno chcesz usunąć");
                if (r == true) {
                    $.ajax({
                        type: 'POST',
                        url: 'index.php?r=gallery/deletep&name=' + id,
                        dataType: 'html',
                        success: function (response) {
                            document.getElementById(id).parentElement.remove();
                        }
                    });

                }
            }
        });
        document.getElementById('savebtn').onclick = function(e) {
 window.onbeforeunload = null;
 return true;
}
    
window.onbeforeunload = function(e) {
    $.ajax({
        type: 'POST',
        async: true,
        url: 'index.php?r=gallery/delete-uploaded-photos',
    }); };


   
        container.addEventListener("click", function (e) {
            if (e.target.tagName == 'IMG') {
                var id = e.target.dataset.type;
               document.getElementById("modal").src = 'uploads/photos-gallery/'+id;
            }
        });

    })();
</script>

