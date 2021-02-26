<?php
/** @var \app\models\User $user */
/** @var $directoryAsset */
//$user=Yii::$app->user->getIdentity();
$avatar = $directoryAsset.'/img/user2-160x160.jpg';
//if($user->userData->avatar){
//    $avatar=\app\models\FileCache::Url($user->userData->avatar,212,220);
//}
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $avatar ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p style="width: 155px; overflow: hidden; text-overflow: ellipsis;">Test</p>
                <a href="/"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Masterskaya', 'options' => ['class' => 'header']],
                    ['label' => 'Test', 'icon' => 'folder-open-o', 'url' => ['#'], 'visible' => true],
//                    [
//                        'label' => 'Новини',
//                        'icon' => 'folder-open-o',
//                        'url' => '#',
//                        'visible'=>Yii::$app->user->can('news-index'),
//                        'items'=>[
//                            ['label' => 'Новини', 'icon' => 'folder-open-o', 'url' => ['/admin/news'],'visible'=>Yii::$app->user->can('news-index')],
//                            ['label' => 'Новини Теги', 'icon' => 'folder-open-o', 'url' => ['/admin/news-tag'],'visible'=>Yii::$app->user->can('news_tag-index')],
//                            ['label' => 'Запланирование', 'icon' => 'folder-open-o', 'url' => ['//admin/news/order-publish'],'visible'=>Yii::$app->user->can('news-index')],
//                        ],
//                    ],

                    ['label' => 'Logs', 'options' => ['class' => 'header']],
                    ['label' => 'Logs', 'icon' => 'fa fa-book', 'url' => ['/admin/log'], 'visible' => true],
                    ['label' => 'Апи', 'options' => ['class' => 'header']],
                    ['label' => 'Апи', 'icon' => 'fa fa-book', 'url' => ['/admin/setting/documentation-api'], 'visible' => true],
                ],
            ]
        ) ?>

    </section>

</aside>
