<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MainPageHeadings */

$this->title = $model->header;
$this->params['breadcrumbs'][] = ['label' => 'Nagłówki', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-page-headings-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edytuj', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'header',
            'content',
            'url:url',
        ],
    ]) ?>

</div>
