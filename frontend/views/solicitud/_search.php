<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'local_id') ?>

    <?= $form->field($model, 'hora_id') ?>

    <?= $form->field($model, 'motivo_id') ?>

    <?= $form->field($model, 'dia_id') ?>

    <?= $form->field($model, 'materia_id') ?>

    <?php // echo $form->field($model, 'solicitante') ?>

    <?php // echo $form->field($model, 'solicitud_estado') ?>

    <?php // echo $form->field($model, 'solicitud_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
