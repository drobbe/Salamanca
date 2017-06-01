<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\dialog\Dialog;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Hematologia */
/* @var $form yii\widgets\ActiveForm */
Icon::map($this);
echo Dialog::widget();
$icono = Icon::show('check', ['class'=>'fa-lg'], Icon::FA);
$js = <<< JS
$('#w1').on('beforeSubmit', function (e) {
    krajeeDialog.alert("Se Cargo los valores");
    return true;
});
JS;
$this->registerJs($js);

$model->globulos_blancos    = str_replace(".", ",", $model->globulos_blancos);
$model->segmentados         = str_replace(".", ",", $model->segmentados);
$model->linfocitos          = str_replace(".", ",", $model->linfocitos);
$model->monocitos           = str_replace(".", ",", $model->monocitos);
$model->eosinofilos         = str_replace(".", ",", $model->eosinofilos);
$model->globulos_rojos      = str_replace(".", ",", $model->globulos_rojos);
$model->hemoglobina         = str_replace(".", ",", $model->hemoglobina);
$model->hematocritos        = str_replace(".", ",", $model->hematocritos);
$model->vcm                 = str_replace(".", ",", $model->vcm);
$model->chcm                = str_replace(".", ",", $model->chcm);
$model->hcm                 = str_replace(".", ",", $model->hcm);
$model->rdw                 = str_replace(".", ",", $model->rdw);
$model->vpm                 = str_replace(".", ",", $model->vpm); 
/*
$model->globulos_blancos   == 0 ? $model->globulos_blancos = Null : false;
$model->segmentados        == 0 ? $model->segmentados = Null : false;
$model->linfocitos         == 0 ? $model->linfocitos = Null : false;
$model->monocitos          == 0 ? $model->monocitos = Null : false;
$model->eosinofilos        == 0 ? $model->eosinofilos = Null : false;
$model->globulos_rojos     == 0 ? $model->globulos_rojos = Null : false;
$model->hemoglobina        == 0 ? $model->hemoglobina = Null : false;
$model->hematocritos       == 0 ? $model->hematocritos = Null : false;
$model->vcm                == 0 ? $model->vcm = Null : false;
$model->chcm               == 0 ? $model->chcm = Null : false;
$model->hcm                == 0 ? $model->hcm = Null : false;
$model->rdw                == 0 ? $model->rdw = Null : false;
$model->vpm                == 0 ? $model->vpm = Null : false;
$model->plaquetas          == 0 ? $model->plaquetas = Null : false;  */


$paciente= $model->perfil->paciente->nombres." ".$model->perfil->paciente->apellidos. " ".number_format($model->perfil->paciente->cedula, 0,"",".");
?>

<div class="hematologia-form">
    <h3>
    <?= "Paciente ".$paciente;?>
    </h3>


    <?php $form = ActiveForm::begin(['enableAjaxValidation'=>true]); ?>
    <div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, 'globulos_blancos')->textInput(['placeholder'=>"m.m3", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'segmentados')->textInput(['placeholder'=>"%", 'maxlength'=>'5']) ?>
    </div>  
    <div class="col-lg-3"> 
    <?= $form->field($model, 'linfocitos')->textInput(['placeholder'=> "%", 'maxlength'=>'5']) ?>
    </div>  
    <div class="col-lg-3"> 
    <?= $form->field($model, 'monocitos')->textInput(['placeholder'=>"%", 'maxlength'=>'5','value']) ?>
    </div>   
    </div>   

    <div class="row">
    <div class="col-lg-3">  
    <?= $form->field($model, 'eosinofilos')->textInput(['placeholder'=>"%", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'globulos_rojos')->textInput(['placeholder'=>"m.m3", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'hemoglobina')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'hematocritos')->textInput(['placeholder'=>"%", 'maxlength'=>'5']) ?>
    </div>   
    </div> 

    <div class="row">
    <div class="col-lg-3">      
    <?= $form->field($model, 'vcm')->textInput(['placeholder'=>"fl", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-3">   
    <?= $form->field($model, 'hcm')->textInput(['placeholder'=>"uug", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'chcm')->textInput(['placeholder'=>"%", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'rdw')->textInput(['placeholder'=>"%", 'maxlength'=>'5']) ?>
    </div>   
    </div> 

    <div class="row">
    <div class="col-lg-6">   
    <?= $form->field($model, 'vpm')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-6">
    <?= $form->field($model, 'plaquetas')->textInput(['placeholder'=>"m.m3", 'maxlength'=>'3'] ) ?>
    </div>   
    </div> 
    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Cargar'." ".$icono, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>