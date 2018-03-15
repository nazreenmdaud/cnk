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
class FrontAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
    'front/lib/bootstrap/css/bootstrap.min.css',
    'front/lib/font-awesome/css/font-awesome.min.css',
    'front/lib/animate-css/animate.min.css',
    'front/css/style.css',
    ];
    public $js = [
         // "front/lib/jquery/jquery.min.js",
          "front/lib/bootstrap/js/bootstrap.min.js",
          "front/lib/superfish/hoverIntent.js",
          "front/lib/superfish/superfish.min.js",
          "front/lib/morphext/morphext.min.js",
          "front/lib/wow/wow.min.js",
          "front/lib/stickyjs/sticky.js",
          "front/lib/stickyjs/jquery.collapse.js",
          "front/lib/stickyjs/jquery.custom.collapse.js",
          "front/lib/easing/easing.js",
          "front/js/custom.js",
          "front/js/dropzone.js",
          "front/js/signature_pad.min.js",
    ];
    public $depends = [
          // 'yii\web\YiiAsset',
          // 'yii\bootstrap\BootstrapAsset',
    ];
}
