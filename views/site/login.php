<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


?>
<div class="site-login">


    <p align="center">Por favor Ingresar sus datos</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form'
        
   ]); ?>

        <?= $form->field($model, 'user')->textInput(['placeholder'=>"Usuario"])->label(false) ?>

        <?= $form->field($model, 'pass')->passwordInput(['placeholder'=>"Contraseña"])->label(false) ?>

        <div class="col-md-12 text-center">
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
        </div>
        <div class="form-group">
         
                <?= Html::submitButton('<i class="fa-lg fa fa-key"></i> Acceder', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>

  </div>
