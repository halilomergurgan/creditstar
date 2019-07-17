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
    public $sourcePath = '@app/assets/bootstrap/';
    public $css = [
        'stylesheets/styles.css'
    ];

    public $js = [
        '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',
        'javascripts/bootstrap.js',
        'javascripts/custom.js',
        'javascripts/yii.js'
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
