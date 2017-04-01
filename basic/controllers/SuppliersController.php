<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SuppliersController extends Controller {

    public function actionIndex () {
        return $this->render('index');
    }
    
}
