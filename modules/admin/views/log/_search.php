<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\LogSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="modal fade" id="modal-search" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Search Log</h4>
            </div>
            <div class="modal-body">
                <div class="log-search">
                  <?= $form->field($model, 'id') ?>

                  <?= $form->field($model, 'level') ?>

                  <?= $form->field($model, 'category') ?>

                  <?= $form->field($model, 'log_time') ?>

                  <?= $form->field($model, 'prefix') ?>

                  <?php // echo $form->field($model, 'message') ?>

                </div>
            </div>
            <div class="modal-footer">
                <?= Html::button('Reset', ['class' => 'btn btn-default pull-left', 'onclick' => "$(this).parents('form:first').find('input:text, input:password, select, textarea').val(''); $(this).parents('form:first').find('input:radio, input:checkbox').prop('checked', false); $(this).parents('form:first').submit();"]) ?>
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
