<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Solicitud;
use frontend\models\SolicitudSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\ForbiddenHttpException;

/**
 * SolicitudController implements the CRUD actions for Solicitud model.
 */
class SolicitudController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Solicitud models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SolicitudSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Solicitud model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Solicitud model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can( 'crear-solicitud' ) ){

                 $model = new Solicitud();

            if ($model->load(Yii::$app->request->post()) ) {
                $model->solicitud_estado='1';
                $model->save();
                return $this->redirect(['view', 'id' => $model->solicitud_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

        }
        else{
            throw new ForbiddenHttpException;
        }


       
    }

    /**
     * Updates an existing Solicitud model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
   public function actionUpdate($id)
    {
        if(Yii::$app->user->can( 'editar-solicitud' ) ){


            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->solicitud_id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }

        }
        else{
            throw new ForbiddenHttpException;
        }    



    }

    /* public function actionUpdate($id){
$model = new WhateverModel();
// Lets say that you want to insert your own data it any field, do it like this :
$model->solicitud_estado = $whateverData;
#some code is here... yada yada
$this->render('update',array('model'=>$model));

}*/

    /**
     * Deletes an existing Solicitud model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can( 'editar-solicitud' ) ){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
          }
        else{
            throw new ForbiddenHttpException;
        }    
    
    }

    /**
     * Finds the Solicitud model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Solicitud the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Solicitud::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
