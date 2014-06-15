<?php

namespace dizews\qunit;

use Yii;
use yii\base\BootstrapInterface;


class Module extends \yii\base\Module implements BootstrapInterface
{
    public $defaultRoute = 'runner';

    public $runner = [
        'template' => 'index'
    ];

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'dizews\qunit\controllers';

    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules([
            $this->id => $this->id . '/runner/index',
            $this->id . '/<id:\w+>' => $this->id . '/runner/view',
            $this->id . '/<controller:\w+>/<action:\w+>' => $this->id . '/<controller>/<action>',
        ], false);
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        $this->resetGlobalSettings();

        return true;
    }

    /**
     * Resets potentially incompatible global settings done in app config.
     */
    protected function resetGlobalSettings()
    {
        Yii::$app->assetManager->bundles = [];
    }

}
