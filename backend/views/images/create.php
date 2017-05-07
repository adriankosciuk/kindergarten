<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Images */

$this->title = 'Dodaj obrazek';
$this->params['breadcrumbs'][] = ['label' => 'Obrazki', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
