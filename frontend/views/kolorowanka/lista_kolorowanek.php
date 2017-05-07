<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div >
    <h1><?= Html::encode($this->title) ?></h1>

  <?php foreach($drawings as $draw): ?>
    <div class="images-list">
    <a href="<?= Url::to(['kolorowanka/kolorowanka', 'image' => $draw->url]) ?>" target="blank"><img width="150" height="200" src="http://localhost/projekt/backend/web/<?php echo $draw->image ?>"></a>
    <div class="images-title"><a href="<?= Url::to(['kolorowanka/kolorowanka', 'image' => $draw->url]) ?>"><?php echo $draw->name ; ?></a>
        </div></div>
        <?php endforeach ?>
</div>
