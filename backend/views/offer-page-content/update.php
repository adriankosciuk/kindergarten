<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OfferPageContent */

$this->title = 'Edytuj ofertę';
$this->params['breadcrumbs'][] = ['label' => 'Oferta', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Edycja';
?>
<div class="offer-page-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
