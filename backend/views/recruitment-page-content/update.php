<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contact */

$this->title = 'Edytuj stronę rekrutacji';
$this->params['breadcrumbs'][] = ['label' => 'Rekrutacja', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Edycja';
?>
<div class="contact-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
