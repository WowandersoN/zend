<?php
namespace backend\assets;

use yii\web\AssetBundle;

class AdminLtePluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte';
    public $js = [
        'bower_components/moment/min/moment.min.js',
        'plugins/input-mask/jquery.inputmask.js',
        'plugins/input-mask/jquery.inputmask.date.extensions.js',
        'plugins/input-mask/jquery.inputmask.extensions.js',
    ];
    public $css = [
        'bower_components/Ionicons/css/ionicons.min.css',
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
        'backend\assets\ICheckAsset',
    ];
}