<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Log */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-view box box-primary">
    <div class="box-header">
        <?= \Yii::$app->user->can('log-update') ? Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) : '' ?>
        <?= \Yii::$app->user->can('log-delete') ? Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) : '' ?>

    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'level',
                'category',
                'log_time',
                'prefix:ntext',
                'message:ntext',
            ],
        ]) ?>
    </div>
</div>
