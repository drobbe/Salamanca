<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchPerfil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_perfil') ?>

    <?= $form->field($model, 'id_tipo_perfil') ?>

    <?= $form->field($model, 'fecha_creacion') ?>

    <?= $form->field($model, 'id_paciente') ?>

    <?= $form->field($model, 'id_estatus') ?>

    <?php // echo $form->field($model, 'id_usuario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
