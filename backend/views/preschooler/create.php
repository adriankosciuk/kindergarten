<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Preschooler */

$this->title = 'Dodaj nowego ucznia';
$this->params['breadcrumbs'][] = ['label' => 'Uczniowie', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preschooler-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'year' => $year
    ]) ?>

</div>
