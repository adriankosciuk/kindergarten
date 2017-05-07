<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MainPageHeadings */

$this->title = 'Edytuj nagłówek: ' . $model->header;
$this->params['breadcrumbs'][] = ['label' => 'Nagłówki', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->header, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edytuj';
?>
<div class="main-page-headings-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
