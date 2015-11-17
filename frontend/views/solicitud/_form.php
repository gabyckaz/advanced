<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Local;
use frontend\models\Hora;
use frontend\models\Motivo;
use frontend\models\Dia;
use frontend\models\Materia;


/* @var $this yii\web\View */
/* @var $model frontend\models\Solicitud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-form">

    <?php $form = ActiveForm::begin(); ?>



   <?= $form->field($model, 'motivo_id')->dropDownlist(
        ArrayHelper::map(Motivo::find()->all(),'motivo_id','motivo_nombre'),
       ['promp'=>'Seleccionar']

     ) ?>

      <?= $form->field($model, 'dia_id')->dropDownlist(
        ArrayHelper::map(Dia::find()->all(),'dia_id','dia_nombre'),
       ['promp'=>'Seleccionar']

     ) ?>

       <?= $form->field($model, 'hora_id')->dropDownlist(
        ArrayHelper::map(Hora::find()->all(),'hora_id','hora_nombre'),
       ['promp'=>'Seleccionar']

     ) ?>

   
     <?= $form->field($model, 'local_id')->dropDownlist(
        ArrayHelper::map(Local::find()->all(),'local_id','local_nombre'),
       ['promp'=>'Seleccionar']

     ) ?>

    

       <?= $form->field($model, 'materia_id')->dropDownlist(
        ArrayHelper::map(Materia::find()->all(),'materia_id','materia_nombre'),
       ['promp'=>'Seleccionar']

     ) ?>


    <?= $form->field($model, 'solicitante')->textInput(['maxlength' => true]) ?>

  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
