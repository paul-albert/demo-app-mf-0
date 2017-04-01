<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class MainController extends Controller {
    
    public function actions () {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'dialogs' => [
                'class' => 'app\components\TopAction',
            ],
        ];
    }
    
    public function actionIndex () {
        return $this->render('index');
    }
    
}