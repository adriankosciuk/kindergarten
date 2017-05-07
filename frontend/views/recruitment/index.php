<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<?= $content ?>
<div class="preschooler-index">
    <button id="modalButton" value ="<?= Url::to(['recruitment/create']) ?>">Formularz zgłoszenia</button>
    <?php
    yii\bootstrap\Modal::begin([
        'id' => 'modall',
        'header' => '<h1>Karta zgłoszenia dziecka do przedszkola</h1>',
        'size' => 'modal-lg',
        //keeps from closing modal with esc key or by clicking out of the modal.
        // user must click cancel or X to close
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
    ]);
    echo "<div id='modalContentt'></div>";
    yii\bootstrap\Modal::end();
    ?>
    
</div>
