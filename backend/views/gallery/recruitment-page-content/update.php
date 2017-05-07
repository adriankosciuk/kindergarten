<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RecruitmentPageContent */

$this->title = 'Update Recruitment Page Content: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recruitment Page Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recruitment-page-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
