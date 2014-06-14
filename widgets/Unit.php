<?php

namespace dizews\qunit\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use dizews\qunit\UnitAsset;

class Unit extends Widget
{
    public $fixture = [];

    public $testPath = '';

    public $options;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->setId('qunit');

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    /**
     * Executes the widget.
     * This method renders the unit tests
     */
    public function run()
    {
        $this->getView()->registerAssetBundle(UnitAsset::className());

        echo $this->renderUnit();
        echo $this->renderFixture();
    }

    /**
     * Renders the fixtures of tests
     * @return string the rendering result
     */
    protected function renderUnit()
    {
        return Html::tag('div', '', $this->options);
    }

    /**
     * Renders the fixture
     * @return string the rendering result
     */
    protected function renderFixture()
    {
        if ($this->fixture !== null) {
            $class = ArrayHelper::remove($this->fixture, 'class', Fixture::className());

            $fixture = $this->fixture;
            $fixture['view'] = $this->getView();

            return $class::widget($fixture);
        }

        return '11';
    }
}
