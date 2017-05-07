<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Employees */

$this->title = 'Dodaj slajd';
$this->params['breadcrumbs'][] = ['label' => 'Slajder', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
