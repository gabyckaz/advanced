<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1>Usuarios registrados</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <a class="btn btn-success" href="http://localhost/advanced/frontend/web/index.php?r=site%2Fsignup">Crear usuario</a>
        
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
