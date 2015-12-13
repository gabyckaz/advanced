<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\NotFoundHttpException;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//if(Yii::$app->user->can( 'ver-usuario' )){

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;


//}
  //      else{
  //                 throw new ForbiddenHttpException;
   //             }

 ?>
    <div class="user-index">

        <h1>Usuarios registrados</h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
        
            
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'username',
               
               // 'password_hash',
              //  'password_reset_token',
                 'email:email',
                // 'status',
                 'created_at',
                 'updated_at',
                 'docente_id',
                  'auth_key',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
 