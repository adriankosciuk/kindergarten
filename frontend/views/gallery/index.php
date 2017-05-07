<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<?php foreach($galleries as $index => $gallery): ?>
<?php if($gallery->photosInGalleries): ?>
<div class="photo">
<a href="<?= Url::to(['gallery/photos', 'id' => $gallery->id]) ?>"><img width="350" height="250" src="/projekt/backend/web/uploads/photos-gallery/<?= $gallery_photo_src[$index] ?>"></a>
<a href="<?= Url::to(['gallery/photos', 'id' => $gallery->id]) ?>"><p id="gallery-title"><?= $gallery->title; ?></p></a>
</div>
<?php endif ?>
<?php endforeach; ?>

