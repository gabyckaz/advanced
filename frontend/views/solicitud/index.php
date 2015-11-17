<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SolicitudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicituds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>Blanca=Sol. hechas</p>
    <p>Verde=Sol.aprovadas por Admin</p>
    <p>Rojo=Denegada por admin</p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
          <?= Html::a('Create Solicitud', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
  
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
//para cambiar de color
        
        'rowOptions'=>function($model){


            if($model->solicitud_estado==2){
                return ['class'=>'danger'];

            }
             if($model->solicitud_estado==3){
                return ['class'=>'success'];

            }


        },
        


        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

             [
            'attribute'=>'motivo_id',
            'value'=> 'motivo.motivo_nombre',
            ],


            [
            'attribute'=>'local_id',
            'value'=> 'local.local_nombre',
            ],

             [
            'attribute'=>'hora_id',
            'value'=> 'hora.hora_nombre',
            ],

              

               [
            'attribute'=>'dia_id',
            'value'=> 'dia.dia_nombre',
            ],

               [
            'attribute'=>'materia_id',
            'value'=> 'materia.materia_nombre',
            ],

        /*        [
            'attribute'=>'docente_id',
            'value'=> 'docente.docente_nombre',
            ],
*/
          
          /* 'local.local_nombre', 
          'hora.hora_nombre',
            'motivo.motivo_nombre',
            'dia.dia_nombre',
            'materia.materia_nombre',*/
            // 'solicitante',
           //  'solicitud_estado',
            // 'solicitud_id',
             'mensaje',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
