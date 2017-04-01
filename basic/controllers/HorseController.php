<?php

namespace app\controllers;

use Yii;
use app\models\Horse;
//use app\models\HorseSearch;
use app\models\Client;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use yii\helpers\Url;

/**
 * HorseController implements the CRUD and Show actions for Horse model.
 */
class HorseController extends Controller {

    public function behaviors () {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionAdd () {
        $model = new Horse();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            
            return $this->redirect('/client/view/' . $model->client_id);
            
        } else {
            $data['sexs']    = Horse::getSexList();
            $data['clients'] = Client::getClientList();

            return $this->render(
                'add',
                [
                    'model' => $model,
                    'data'  => $data,
                ]
            );
        }
    }

    /*
    public function actionUpdate ($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render(
                'update',
                [
                    'model' => $model,
                ]
            );
        }
    }

    public function actionDelete ($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    */
    
    /**
     * Finds the Horse model based on its primary key value.
     * If the model is not found, then a 404 HTTP exception will be thrown.
     */
    protected function findModel ($id) {
        if (($model = Horse::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(
                Yii::t('app', 'The requested page does not exist.')
            );
        }
    }
    
}
