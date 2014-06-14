<?php

namespace dizews\qunit;

use yii\web\AssetBundle;


class Asset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@app/modules/qunit/assets';
    /**
     * @inheritdoc
     */
    public $css = [
        '//code.jquery.com/qunit/qunit-1.14.0.css',
        'yii2-qunit.css',
    ];
    /**
     * @inheritdoc
     */
    public $js = [
        '//code.jquery.com/qunit/qunit-1.14.0.js',
        'yii2-qunit.js',
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
