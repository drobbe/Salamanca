<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\dialog\Dialog;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $model app\models\Quimicas */
/* @var $form yii\widgets\ActiveForm */

Icon::map($this);
echo Dialog::widget();
$icono = Icon::show('check', ['class'=>'fa-lg'], Icon::FA);
$js = <<< JS
$('#w1').on('beforeSubmit', function (e) {
    krajeeDialog.alert("Se Cargo los valores");
    return true;
});


$(document).ready(function(){


    $("#quimicas-bilirrubina_total, #quimicas-bili_directa").blur (function(){
        var total = $("#quimicas-bilirrubina_total").val();
        var directa = $("#quimicas-bili_directa").val();        
        total = total.replace(",", "."); 
        directa = directa.replace(",", "."); 
        total = parseFloat(total);
        directa = parseFloat(directa);
        if($.isNumeric(total) && $.isNumeric(directa) && total > directa){

            var indirecta = total-directa;
            indirecta = indirecta.toLocaleString('es-ES', {minimumFractionDigits: 2})
            $("#quimicas-bili_indirecta").val(indirecta);
        }
        else{
            $("#quimicas-bili_indirecta").val("");
        }
    });

    $("#quimicas-proteinas_totales, #quimicas-albumina").blur (function(){

        var albumina = $("#quimicas-albumina").val();
        var proteinas = $("#quimicas-proteinas_totales").val();        
        albumina = albumina.replace(",", "."); 
        proteinas = proteinas.replace(",", "."); 
        albumina = parseFloat(albumina);
        proteinas = parseFloat(proteinas);
        if(proteinas > albumina){

        }
        if($.isNumeric(proteinas) && $.isNumeric(albumina) && proteinas > albumina){

            var globulina = proteinas-albumina;
            var relacion = globulina / albumina ;
            relacion = relacion.toLocaleString('es-ES', {maximumFractionDigits: 1, minimumFractionDigits: 1})  
            globulina = globulina.toLocaleString('es-ES', {minimumFractionDigits: 1})
            $("#quimicas-globulina").val(globulina);
            $("#quimicas-alb_glob").val(relacion);
        }
        else{
            $("#quimicas-globulina").val("");
            $("#quimicas-alb_glob").val("");
        }
    });

    $("#quimicas-colesterol, #quimicas-trigliceridos, #quimicas-hdl_colesterol").blur (function(){

        var triglicerido = $("#quimicas-trigliceridos").val();        
        var hdl = $("#quimicas-hdl_colesterol").val(); 
        var colesterol_total = $("#quimicas-colesterol").val();
        colesterol_total = colesterol_total.replace(",", "."); 
        triglicerido = triglicerido.replace(",", "."); 
        hdl = hdl.replace(",", "."); 
        colesterol_total = parseFloat(colesterol_total);
        triglicerido = parseFloat(triglicerido);
        hdl = parseFloat(hdl);
        var vldl = (triglicerido /5);
        var ldl = colesterol_total - hdl - vldl;
        //ldl = ldl.toFixed(1);
        if(ldl > 0){
            ldl = ldl.toLocaleString('es-ES', {maximumFractionDigits: 1})

            $("#quimicas-ldl_colesterol").val(ldl);
        }
        else{
            $("#quimicas-ldl_colesterol").val("");
        }        

        if(vldl > 0){
            vldl = vldl.toLocaleString('es-ES', {maximumFractionDigits: 1})
            $("#quimicas-vldl_colesterol").val(vldl);
        }
        else{
            $("#quimicas-vldl_colesterol").val("");
        }
    });

});
JS;
$this->registerJs($js);

$paciente= $model->perfil->paciente->nombres." ".$model->perfil->paciente->apellidos. " ".number_format($model->perfil->paciente->cedula, 0,"",".");
$tipo_perfil = ($this->params['tipo_perfil']);

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
//var_dump($model);

/*
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

*/
?>

<div class="quimicas-form">
    <h3>
    <?= "Paciente ".$paciente;?>
    </h3>

    <?php $form = ActiveForm::begin(['enableAjaxValidation'=>true]); ?>


    <?php if($tipo_perfil ==2){ ?>
        <?= '<div class="row">';?>
        <?= '<div class="col-lg-4">';?>
        <?= $form->field($model, 'glicemia')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']); ?>
        <?= '</div>';?>
        <?= '<div class="col-lg-4">';?>
        <?= $form->field($model, 'urea')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']); ?>
        <?= '</div>';?>
        <?= '<div class="col-lg-4">';?>
        <?= $form->field($model, 'creatinina')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']) ;?>
        <?= '</div>';?>
        <?= '</div>';?>
    <?php
    } 
    ?>

    <?= '<div class="row">';?>
    <?= '<div class="col-lg-4">';?>      
    <?= $form->field($model, 'colesterol')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'trigliceridos')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'hdl_colesterol')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">  
    <?= $form->field($model, 'ldl_colesterol')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5','readonly'=>'true']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'vldl_colesterol')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5','readonly'=>'true']) ?>
    </div>


    <?php 
    if($tipo_perfil ==2){?>
    <div class="col-lg-4">
    <?= $form->field($model, 'acido_urico')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">
    <?= $form->field($model, 'proteinas_totales')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'3']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'albumina')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'3']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'alb_glob')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'3','readonly'=>'true']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">    
    <?= $form->field($model, 'globulina')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5','readonly'=>'true']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'bilirrubina_total')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'bili_directa')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">
    <?= $form->field($model, 'bili_indirecta')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5','readonly'=>'true']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'ast')->textInput(['placeholder'=>"UI/L", 'maxlength'=>'4']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($model, 'alt')->textInput(['placeholder'=>"UI/L", 'maxlength'=>'4']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">
    <?= $form->field($model, 'calcio_serico')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'3']) ?>
    </div>
    </div>  
    <?php
    }
    else{
        echo "</div>";
    }
    ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Cargar'." ".$icono, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
