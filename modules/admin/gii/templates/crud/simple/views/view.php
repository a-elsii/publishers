<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\BaseInflector;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$columns = $generator->getColumnNames();
$is_soft_deleted = array_search('deleted_at', $columns) !== false;
$underscoreModelClass = BaseInflector::underscore(StringHelper::basename($generator->modelClass));

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view box box-primary">
    <div class="box-header">
        <?= "<?= " ?>\Yii::$app->user->can('<?= $underscoreModelClass ?>-update') ? Html::a(<?= $generator->generateString('Update') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary btn-flat']) : '' ?>
        <?= "<?= " ?><?= $is_soft_deleted ? '(' : '' ?>\Yii::$app->user->can('<?= $underscoreModelClass ?>-delete')<?= $is_soft_deleted ? ' && !$model->status_del)' : '' ?> ? Html::a(<?= $generator->generateString('Delete') ?>, ['delete', <?= $urlParams ?>], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?') ?>,
                'method' => 'post',
            ],
        ]) : '' ?>
<?php if($is_soft_deleted): ?>
        <?= "<?php " ?>if (\Yii::$app->user->can('<?= $underscoreModelClass ?>-restore') && $model->status_del) echo Html::a(<?= $generator->generateString('Restore') ?>, ['restore', <?= $urlParams ?>], ['class' => 'btn btn-warning btn-flat']) ?>
<?php endif; ?>

    </div>
    <div class="box-body table-responsive no-padding">
        <?= "<?= " ?>DetailView::widget([
            'model' => $model,
            'attributes' => [
<?php
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        echo "                '" . $name . "',\n";
    }
} else {
    foreach ($generator->getTableSchema()->columns as $column) {
        $format = stripos($column->name, 'created_at') !== false || stripos($column->name, 'updated_at') !== false ? 'datetime' : $generator->generateColumnFormat($column);
        echo "                '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
    }
}
?>
            ],
        ]) ?>
    </div>
</div>
