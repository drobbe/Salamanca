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
$('#register-form').on('beforeSubmit', function (e) {
    krajeeDialog.alert("Se Cargo los valores");
    return true;
});
JS;
$this->registerJs($js);

$paciente= $model->perfil->paciente->nombres." ".$model->perfil->paciente->apellidos. " ".number_format($model->perfil->paciente->cedula, 0,"",".");


//Disabled imputs
$glicemia                =  ($model->glicemia            == null) ?   'disabled' : "";
$urea                    =  ($model->urea                == null) ?   'disabled' : "";
$creatinina              =  ($model->creatinina          == null) ?   'disabled' : "";
$colesterol              =  ($model->colesterol          == null) ?   'disabled' : "";
$trigliceridos           =  ($model->trigliceridos       == null) ?   'disabled' : "";
$hdl_colesterol          =  ($model->hdl_colesterol      == null) ?   'disabled' : "";
$ldl_colesterol          =  ($model->ldl_colesterol      == null) ?   'disabled' : "";
$vldl_colesterol         =  ($model->vldl_colesterol     == null) ?   'disabled' : "";
$acido_urico             =  ($model->acido_urico         == null) ?   'disabled' : "";
$proteinas_totales       =  ($model->proteinas_totales   == null) ?   'disabled' : "";
$albumina                =  ($model->albumina            == null) ?   'disabled' : ""; 
$alb_glob                =  ($model->alb_glob            == null) ?   'disabled' : "";
$globulina               =  ($model->globulina           == null) ?   'disabled' : "";
$bilirrubina_total       =  ($model->bilirrubina_total   == null) ?   'disabled' : "";
$bili_directa            =  ($model->bili_directa        == null) ?   'disabled' : "";
$bili_indirecta          =  ($model->bili_indirecta      == null) ?   'disabled' : "";
$ast                     =  ($model->ast                 == null) ?   'disabled' : "";
$alt                     =  ($model->alt                 == null) ?   'disabled' : "";
$calcio_serico           =  ($model->calcio_serico       == null) ?   'disabled' : "";


$model->glicemia            == 0 ? $model->glicemia         =   null: false;
$model->urea                == 0 ? $model->urea             =   null: false;
$model->creatinina          == 0 ? $model->creatinina       =   null: false;
$model->colesterol          == 0 ? $model->colesterol       =   null: false;
$model->trigliceridos       == 0 ? $model->trigliceridos    =   null: false;
$model->hdl_colesterol      == 0 ? $model->hdl_colesterol   =   null: false;
$model->ldl_colesterol      == 0 ? $model->ldl_colesterol   =   null: false;
$model->vldl_colesterol     == 0 ? $model->vldl_colesterol  =   null: false;
$model->acido_urico         == 0 ? $model->acido_urico      =   null: false;
$model->proteinas_totales   == 0 ? $model->proteinas_totales=   null: false;
$model->albumina            == 0 ? $model->albumina         =   null: false; 
$model->alb_glob            == 0 ? $model->alb_glob         =   null: false;
$model->globulina           == 0 ? $model->globulina        =   null: false;
$model->bilirrubina_total   == 0 ? $model->bilirrubina_total=   null: false;
$model->bili_directa        == 0 ? $model->bili_directa     =   null: false;
$model->bili_indirecta      == 0 ? $model->bili_indirecta   =   null: false;
$model->ast                 == 0 ? $model->ast              =   null: false;
$model->alt                 == 0 ? $model->alt              =   null: false;
$model->calcio_serico       == 0 ? $model->calcio_serico    =   null: false;

$model->glicemia            = str_replace(".", ",",$model->glicemia         );
$model->urea                = str_replace(".", ",",$model->urea             );
$model->creatinina          = str_replace(".", ",",$model->creatinina       );
$model->colesterol          = str_replace(".", ",",$model->colesterol       );
$model->trigliceridos       = str_replace(".", ",",$model->trigliceridos    );
$model->hdl_colesterol      = str_replace(".", ",",$model->hdl_colesterol   );
$model->ldl_colesterol      = str_replace(".", ",",$model->ldl_colesterol   );
$model->vldl_colesterol     = str_replace(".", ",",$model->vldl_colesterol  );
$model->acido_urico         = str_replace(".", ",",$model->acido_urico      );
$model->proteinas_totales   = str_replace(".", ",",$model->proteinas_totales);
$model->albumina            = str_replace(".", ",",$model->albumina         );
$model->alb_glob            = str_replace(".", ",",$model->alb_glob         );
$model->globulina           = str_replace(".", ",",$model->globulina        );
$model->bilirrubina_total   = str_replace(".", ",",$model->bilirrubina_total);
$model->bili_directa        = str_replace(".", ",",$model->bili_directa     );
$model->bili_indirecta      = str_replace(".", ",",$model->bili_indirecta   );
$model->ast                 = str_replace(".", ",",$model->ast              );
$model->alt                 = str_replace(".", ",",$model->alt              );
$model->calcio_serico       = str_replace(".", ",",$model->calcio_serico    );


?>

<div class="quimicas-form">
    <h3>
    <?= "Paciente ".$paciente;?>
    </h3>
    <?php $form = ActiveForm::begin([
    'id' => 'register-form',
]) ?>



    <?= '<div class="row">';?>
    <?= '<div class="col-lg-4">';?>
    <?= $form->field($model, 'glicemia')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5',$glicemia =>'']); ?>
    <?= '</div>';?>
    <?= '<div class="col-lg-4">';?>
    <?= $form->field($model, 'urea')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5',$urea =>'']); ?>
    <?= '</div>';?>
    <?= '<div class="col-lg-4">';?>
    <?= $form->field($model, 'creatinina')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5',$creatinina =>'']) ;?>
    <?= '</div>';?>
    <?= '</div>';?>

    <?= '<div class="row">';?>
    <?= '<div class="col-lg-4">';?>      
    <?= $form->field($model, 'colesterol')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5',$colesterol =>'']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'trigliceridos')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5',$trigliceridos =>'']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'hdl_colesterol')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5',$hdl_colesterol =>'']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">  
    <?= $form->field($model, 'ldl_colesterol')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5',$ldl_colesterol =>'']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'vldl_colesterol')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5',$vldl_colesterol =>'']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'acido_urico')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5',$acido_urico =>'']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">
    <?= $form->field($model, 'proteinas_totales')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5',$proteinas_totales =>'']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'albumina')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5',$albumina =>'']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'alb_glob')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5',$alb_glob =>'']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">    
    <?= $form->field($model, 'globulina')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5',$globulina =>'']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'bilirrubina_total')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5',$bilirrubina_total =>'']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'bili_directa')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5',$bili_directa =>'']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">
    <?= $form->field($model, 'bili_indirecta')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5',$bili_indirecta =>'']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'ast')->textInput(['placeholder'=>"UI/L", 'maxlength'=>'5',$ast =>'']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'alt')->textInput(['placeholder'=>"UI/L", 'maxlength'=>'5',$alt =>'']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">
    <?= $form->field($model, 'calcio_serico')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5',$calcio_serico =>'']) ?>
    </div>
    </div>  
  
    <?= $form->field($model, 'observaciones')->textarea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Cargar'." ".$icono, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
