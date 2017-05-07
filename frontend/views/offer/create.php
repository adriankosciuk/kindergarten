<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OfferPageContent */

$this->title = 'Create Offer Page Content';
$this->params['breadcrumbs'][] = ['label' => 'Offer Page Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-page-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
