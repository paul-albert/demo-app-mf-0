<?php

namespace app\controllers;

use Yii;
use app\models\Client;
use app\models\ClientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use yii\helpers\Url;

/**
 * ClientController implements the CRUD and Show actions for Client model.
 */
class ClientController extends Controller {

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

    public function actionIndex () {
        $searchModel  = new ClientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render(
            'index',
            [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
    }
    
    /*
    public function actionCreate () {
        $model = new Client();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render(
                'create',
                [
                    'model' => $model,
                ]
            );
        }
    }

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
    
    public function actionView ($id) {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('/client/view/' . $model->id);
        }
        
        return $this->render(
            'view',
            [
                'model' => $model,
            ]
        );
    }
    
    public function actionModify ($id) {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return json_encode($model->attributes);
        }
        
        return json_encode(['error' => Yii::t('app', 'Saving data error')]);
    }
    
    /**
     * Finds the Client model based on its primary key value.
     * If the model is not found, then a 404 HTTP exception will be thrown.
     */
    protected function findModel ($id) {
        if (($model = Client::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(
                Yii::t('app', 'The requested page does not exist.')
            );
        }
    }
    
}
