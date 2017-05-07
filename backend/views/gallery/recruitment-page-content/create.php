<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RecruitmentPageContent */

$this->title = 'Create Recruitment Page Content';
$this->params['breadcrumbs'][] = ['label' => 'Recruitment Page Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recruitment-page-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
