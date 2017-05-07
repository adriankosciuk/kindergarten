<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OfferPageContent */

$this->title = 'Update Offer Page Content: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Offer Page Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="offer-page-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
