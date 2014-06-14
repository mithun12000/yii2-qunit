<?php

namespace dizews\qunit\widgets;

use dizews\qunit\helpers\FileHelper;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Fixture extends Widget
{
    public $fixturesPath = '@app/tests/js/unit/fixtures';

    public $fixtureIdPrefix = 'fixture-';

    public $options;


    public function init()
    {
        parent::init();
        $this->setId('qunit-fixture');

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    /**
     * Executes the widget.
     * This method renders the fixtures of tests
     */
    public function run()
    {
        $content = '';

        //render the fixtures files
        $list = FileHelper::scanDirectory(Yii::getAlias($this->fixturesPath));
        foreach ($list as $file) {
            $content .= "\n". Html::tag('div', $this->getView()->renderPhpFile($file), [
                'id' => $this->fixtureIdPrefix . str_replace('.', '-', basename($file))
            ]);
        }

        return Html::tag('div', $content ."\n", $this->options);
    }

}
