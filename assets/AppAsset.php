<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'waterfall/demos/css/reset.css',
        'waterfall/demos/css/waterfall.css'
    ];
    public $js = [
        //'js/responsive_waterfall.js',
        //'js/app.js',
        //'waterfall/demos/js/libs/jquery/jquery.js',
        'waterfall/demos/js/libs/handlebars/handlebars.js',
        'waterfall/demos/js/waterfall.min.js',     
        'js/script.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
