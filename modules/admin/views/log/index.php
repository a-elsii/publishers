<?php

use app\modules\admin\models\EventSearch;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\LogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logs';
$this->params['breadcrumbs'][] = $this->title;
$is_reload_page = Yii::$app->request->get('reload_page');

?>
<div class="log-index box box-primary">
    <div class="box-header with-border">
        <?= Html::button('Search Log', ['class' => 'btn btn-default btn-flat', 'data-toggle' => 'modal', 'data-target' => '#modal-search']) ?>
        <a class="btn btn-info btn-flat" href="<?= Url::to(['/admin/log', 'reload_page' => true]); ?>">reload page auto start</a>
        <a class="btn btn-warning btn-flat" href="<?= Url::to(['/admin/log']); ?>">reload page auto stop</a>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                'id',
                'level',
                'log_time:time',
                'category',
//                'prefix:ntext',
                'message:ntext',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'visibleButtons' => [
                        'view' => \Yii::$app->user->can('log-view'),
                        'update' => \Yii::$app->user->can('log-update'),
                        'delete' => \Yii::$app->user->can('log-delete'),
                    ],
                ],
            ],
        ]); ?>
    </div>
</div>

<?php if($is_reload_page): ?>
    <script>
        setTimeout(function () {
            document.location.reload(true);
        },5000)
    </script>
<?php endif; ?>