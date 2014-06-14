<?php

namespace dizews\qunit;

use Yii;
use dizews\qunit\helpers\FileHelper;
use yii\web\AssetBundle;


class UnitAsset extends AssetBundle
{
    public $sourcePath = '@app/tests/js';

    public $testBaseUrl = 'unit';

    public $css = [
        'test_helper.css'
    ];

    public $js = [
        'test_helper.js'
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'app\modules\qunit\Asset'
    ];

    public function init()
    {
        if ($this->testBaseUrl !== null) {
            $this->testBaseUrl = rtrim(Yii::getAlias($this->testBaseUrl), '/');
        }

        parent::init();
    }

    /**
     * register all javascript tests
     * @param \yii\web\View $view
     */
    public function registerAssetFiles($view)
    {
        $testsPath = Yii::getAlias($this->sourcePath . DIRECTORY_SEPARATOR . $this->testBaseUrl);
        $list = FileHelper::scanDirectory($testsPath);
        foreach ($list as $file) {
            if (is_file($file)) {
                $this->js[] = $this->testBaseUrl . '/' . basename($file);
            }
        }
        parent::registerAssetFiles($view);
    }

}
