<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style_default.css',
        'css/font-awesome.min.css',
        'css/slick.css',
        'css/toastr.min.css',
        'css/style.css',
        'css/style_768.css',
    ];
    public $js = [
        'js/jquery.modal.min.js',
        'js/toastr_notification/toastr.min.js',
        'js/slick.js',
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
