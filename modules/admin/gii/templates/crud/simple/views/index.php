<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\BaseInflector;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();
$columns = $generator->getColumnNames();
$is_soft_deleted = array_search('deleted_at', $columns) !== false;
$underscoreModelClass = BaseInflector::underscore(StringHelper::basename($generator->modelClass));

echo "<?php\n";
?>

use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
<?= $generator->enablePjax ? 'use yii\widgets\Pjax;' : '' ?>

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index box box-primary">
<?= $generator->enablePjax ? "    <?php Pjax::begin(); ?>\n" : ''
?>    <div class="box-header with-border">
<?php if(!empty($generator->searchModelClass)): ?>
        <?= "<?= " ?>Html::button(<?= $generator->generateString('Search ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, ['class' => 'btn btn-default btn-flat', 'data-toggle' => 'modal', 'data-target' => '#modal-search']) ?>
<?php endif; ?>
        <?= "<?= " ?>Html::a(<?= $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, ['create'], ['class' => 'btn btn-success btn-flat']); ?>
    </div>
    <div class="box-body table-responsive no-padding">
<?php if(!empty($generator->searchModelClass)): ?>
<?= "        <?= " ?>$this->render('_search', ['model' => $searchModel]); ?>
<?php endif;

if ($generator->indexWidgetType === 'grid'):
    echo "        <?= " ?>GridView::widget([
            'dataProvider' => $dataProvider,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) {
            echo "                '" . $name . "',\n";
        } else {
            echo "                // '" . $name . "',\n";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if (++$count < 6) {
            echo "                '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        } else {
            echo "                // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        }
    }
}
?>

                [
                    'class' => 'yii\grid\ActionColumn',
<?php if($is_soft_deleted): ?>
                    'template' => '{view} {update} {delete} {restore}',
                    'buttons' => [
                        'restore' => function ($url, $model, $key) {
                            $options = [
                                'title' => 'Відновити',
                                'aria-label' => 'Відновити',
                                'data-pjax' => '0',
                            ];
                            $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-repeat"]);
                            return Html::a($icon, $url, $options);
                        },
                    ],
<?php endif; ?>
                    'visibleButtons' => [
                        'view' => \Yii::$app->user->can('<?= $underscoreModelClass ?>-view'),
                        'update' => \Yii::$app->user->can('<?= $underscoreModelClass ?>-update'),
<?php if($is_soft_deleted): ?>
                        'delete' => function ($model, $key, $index) {
                            return \Yii::$app->user->can('<?= $underscoreModelClass ?>-delete') && !$model->status_del;
                        },
                        'restore' => function ($model, $key, $index) {
                            return \Yii::$app->user->can('<?= $underscoreModelClass ?>-restore') && $model->status_del;
                        },
<?php else: ?>
                        'delete' => \Yii::$app->user->can('<?= $underscoreModelClass ?>-delete'),
<?php endif; ?>
                    ],
                ],
            ],
        ]); ?>
<?php else: ?>
        <?= "<?= " ?>ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model, $key, $index, $widget) {
                return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
            },
        ]) ?>
<?php endif; ?>
    </div>
<?= $generator->enablePjax ? "    <?php Pjax::end(); ?>\n" : '' ?>
</div>
