<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nagłówki na stronie głównej';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-page-headings-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'header',
            'content:ntext',
            'url',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
            
        ]
    ]); ?>
</div>
