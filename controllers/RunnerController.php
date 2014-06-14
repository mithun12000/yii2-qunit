<?php

namespace dizews\qunit\controllers;

use Yii;
use yii\web\Controller;


class RunnerController extends Controller
{
    public $layout = 'main';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
