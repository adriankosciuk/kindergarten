<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<?php foreach($articles as $article): ?>
<div class="photo" value ="<?= Url::to(['articles/article', 'id' => $article->id]) ?>">
<img width="350" height="250" src="/projekt/backend/web/<?= $article->image ?>">
<p id="gallery-title"><?= $article->title; ?></p>
</div>
<?php endforeach; ?>

<?php
    yii\bootstrap\Modal::begin([
        'id' => 'article_modal',
        'size' => 'modal-lg',
        'closeButton' =>false,
        //keeps from closing modal with esc key or by clicking out of the modal.
        // user must click cancel or X to close
    ]);
    echo "<div id='article_content'></div>";
    yii\bootstrap\Modal::end();
    ?>

