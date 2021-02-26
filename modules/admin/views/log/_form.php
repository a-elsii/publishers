<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Log */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="log-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">
        <div class="panel box box-danger">
            <div class="panel-collapse collapse in">
                <div class="box-body">
                    <?= $form->errorSummary($model) ?>
                </div>
            </div>
        </div>

        <?= $form->field($model, 'level')->textInput() ?>

        <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'log_time')->textInput() ?>

        <?= $form->field($model, 'prefix')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
