<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
?>
<h1 id="gallery_title"><?= $gallery_title ?></h1>
<div>
<?php echo yii\bootstrap\Carousel::widget(['items'=>$photos], ['options'=>['class'=>'carousel slide']]); ?>
</div>

<p id="second-title">Pozostałe galerie:</p>

    <?php foreach ($other_galleries as $index=>$gallery): ?>
<?php if($gallery->photosInGalleries): ?>
        <div class="photo">
            <a href="<?= Url::to(['gallery/photos', 'id' => $gallery->id]) ?>"><img width="350" height="250" src="/projekt/backend/web/uploads/photos-gallery/<?= $gallery->photosInGalleries[0]->image ?>"></a>
            <a href="<?= Url::to(['gallery/photos', 'id' => $gallery->id]) ?>"><p id="gallery-title"><?= $gallery->title; ?></p></a>
        </div>
<?php endif ?>
    <?php endforeach; ?>
