<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->searchModelClass, '\\') ?> */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="modal fade" id="modal-search" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <?= "<?php " ?>$form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
<?php if ($generator->enablePjax): ?>
                'options' => [
                    'data-pjax' => 1
                ],
<?php endif; ?>
            ]); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?= 'Search ' . Inflector::camel2words(StringHelper::basename($generator->modelClass)) ?></h4>
            </div>
            <div class="modal-body">
                <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-search">
<?php
    $count = 0;
    foreach ($generator->getColumnNames() as $attribute) {
        if (++$count < 6) {
            echo "                  <?= " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
        } else {
            echo "                  <?php // echo " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
        }
    }
?>
                </div>
            </div>
            <div class="modal-footer">
                <?= "<?= " ?>Html::button(<?= $generator->generateString('Reset') ?>, ['class' => 'btn btn-default pull-left', 'onclick' => "$(this).parents('form:first').find('input:text, input:password, select, textarea').val(''); $(this).parents('form:first').find('input:radio, input:checkbox').prop('checked', false); $(this).parents('form:first').submit();"]) ?>
                <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Search') ?>, ['class' => 'btn btn-primary']) ?>
            </div>
            <?= "<?php " ?>ActiveForm::end(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
