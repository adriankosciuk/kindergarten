<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uczniowie';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preschooler-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Dodaj ucznia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'school_year',
            'name',
            'surname',
            'birthdate',
            // 'pesel',
            // 'parent_address_city',
            // 'parent_address_route',
            // 'phone_number',
            // 'parent_work_place',
            // 'phone_work_number',
            // 'contact_email:email',
            // 'accept_rules',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
