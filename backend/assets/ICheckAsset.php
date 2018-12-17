<?php
namespace backend\assets;

use yii\web\AssetBundle;

class ICheckAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte';
    public $js = [
        'plugins/iCheck/icheck.min.js',

    ];
    public $css = [
        'plugins/iCheck/square/blue.css',
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}