<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MainPageText */

$this->title = 'Edytuj text na stronie głównej: ';
$this->params['breadcrumbs'][] = ['label' => 'Text na stronie głównej', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Edytuj';
?>
<div class="main-page-text-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
