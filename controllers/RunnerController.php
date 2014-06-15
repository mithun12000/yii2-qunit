<?php

namespace dizews\qunit\controllers;

use Yii;
use yii\web\Controller;


class RunnerController extends Controller
{
    public $layout = 'main';

    /**
     * @var \dizews\qunit\Module
     */
    public $module;


    public function actionIndex()
    {
        return $this->render($this->module->runner['template']);
    }
}
