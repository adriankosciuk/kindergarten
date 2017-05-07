<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<?php foreach ($employees as $e): ?>
<?=  $e->content; ?>
<br>
<hr>
<?php endforeach; ?>

