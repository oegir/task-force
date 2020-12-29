<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Ассет для страницы cоздания заданий
 *
 * Class TaskCreateAsset
 *
 * @package frontend\assets
 */
class TaskCreateAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
            'js/dropzone.js',
            'js/initDropzone.js',
        ];
}
