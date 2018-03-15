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
class ListAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
    'css/bootstrap.min.css',
    'css/plugins.css',
    'css/main.css',
    'css/themes.css',
    'css/custom.css',
    ];
    public $js = [
          'js/vendor/jquery-2.2.4.min.js',
          'js/vendor/bootstrap.min.js',
        'js/vendor/modernizr-3.3.1.min.js',
        'js/plugins.js',
        'js/app.js',
        'js/plugins/ckeditor/ckeditor.js',
    ];
    public $depends = [
          'yii\web\YiiAsset',
          'yii\bootstrap\BootstrapAsset',
    ];
}
