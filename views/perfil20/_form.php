<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\dialog\Dialog;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $model app\models\Orina */
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

/* @var $this yii\web\View */
/* @var $model app\models\Quimicas */
/* @var $form yii\widgets\ActiveForm */

$paciente= $model->perfil->paciente->nombres." ".$model->perfil->paciente->apellidos. " ".number_format($model->perfil->paciente->cedula, 0,"",".");
$model->globulos_blancos = str_replace(".", ",", $model->globulos_blancos);
$model->segmentados = str_replace(".", ",", $model->segmentados);
$model->linfocitos = str_replace(".", ",", $model->linfocitos);
$model->monocitos = str_replace(".", ",", $model->monocitos);
$model->eosinofilos = str_replace(".", ",", $model->eosinofilos);
$model->globulos_rojos = str_replace(".", ",", $model->globulos_rojos);
$model->hemoglobina = str_replace(".", ",", $model->hemoglobina);
$model->hematocritos = str_replace(".", ",", $model->hematocritos);
$model->vcm = str_replace(".", ",", $model->vcm);
$model->chcm = str_replace(".", ",", $model->chcm);
$model->hcm = str_replace(".", ",", $model->hcm);
$model->rdw = str_replace(".", ",", $model->rdw);
$model->vpm = str_replace(".", ",", $model->vpm); 

$quimicas->glicemia            = str_replace(".", ",",$quimicas->glicemia         );
$quimicas->urea                = str_replace(".", ",",$quimicas->urea             );
$quimicas->creatinina          = str_replace(".", ",",$quimicas->creatinina       );
$quimicas->colesterol          = str_replace(".", ",",$quimicas->colesterol       );
$quimicas->trigliceridos       = str_replace(".", ",",$quimicas->trigliceridos    );
$quimicas->hdl_colesterol      = str_replace(".", ",",$quimicas->hdl_colesterol   );
$quimicas->ldl_colesterol      = str_replace(".", ",",$quimicas->ldl_colesterol   );
$quimicas->vldl_colesterol     = str_replace(".", ",",$quimicas->vldl_colesterol  );
$quimicas->acido_urico         = str_replace(".", ",",$quimicas->acido_urico      );
$quimicas->proteinas_totales   = str_replace(".", ",",$quimicas->proteinas_totales);
$quimicas->albumina            = str_replace(".", ",",$quimicas->albumina         );
$quimicas->alb_glob            = str_replace(".", ",",$quimicas->alb_glob         );
$quimicas->globulina           = str_replace(".", ",",$quimicas->globulina        );
$quimicas->bilirrubina_total   = str_replace(".", ",",$quimicas->bilirrubina_total);
$quimicas->bili_directa        = str_replace(".", ",",$quimicas->bili_directa     );
$quimicas->bili_indirecta      = str_replace(".", ",",$quimicas->bili_indirecta   );
$quimicas->ast                 = str_replace(".", ",",$quimicas->ast              );
$quimicas->alt                 = str_replace(".", ",",$quimicas->alt              );
$quimicas->calcio_serico       = str_replace(".", ",",$quimicas->calcio_serico    );

?>

<div class="quimicas-form">


    <h3>
    <?= $paciente;?>
    </h3>

    <?php $form = ActiveForm::begin(['enableAjaxValidation'=>true]); ?>

    <h4>Hematologia</h4>
    <br>
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

    <h4>Quimicas</h4>
    <?= '<div class="row">';?>
    <?= '<div class="col-lg-4">';?>
    <?= $form->field($quimicas, 'glicemia')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']); ?>
    <?= '</div>';?>
    <?= '<div class="col-lg-4">';?>
    <?= $form->field($quimicas, 'urea')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']); ?>
    <?= '</div>';?>
    <?= '<div class="col-lg-4">';?>
    <?= $form->field($quimicas, 'creatinina')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']) ;?>
    <?= '</div>';?>
    <?= '</div>';?>
    <?= '<div class="row">';?>
    <?= '<div class="col-lg-4">';?>      
    <?= $form->field($quimicas, 'colesterol')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($quimicas, 'trigliceridos')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($quimicas, 'hdl_colesterol')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">  
    <?= $form->field($quimicas, 'ldl_colesterol')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($quimicas, 'vldl_colesterol')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']) ?>
    </div>



    <div class="col-lg-4">
    <?= $form->field($quimicas, 'acido_urico')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">
    <?= $form->field($quimicas, 'proteinas_totales')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($quimicas, 'albumina')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($quimicas, 'alb_glob')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">    
    <?= $form->field($quimicas, 'globulina')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($quimicas, 'bilirrubina_total')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($quimicas, 'bili_directa')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">
    <?= $form->field($quimicas, 'bili_indirecta')->textInput(['placeholder'=>"g/dl", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($quimicas, 'ast')->textInput(['placeholder'=>"UI/L", 'maxlength'=>'5']) ?>
    </div>
    <div class="col-lg-4">
    <?= $form->field($quimicas, 'alt')->textInput(['placeholder'=>"UI/L", 'maxlength'=>'5']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4">
    <?= $form->field($quimicas, 'calcio_serico')->textInput(['placeholder'=>"mg/dl", 'maxlength'=>'5']) ?>
    </div>
    </div>  


    <?= $form->field($model, 'observaciones')->textarea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Cargar'." ".$icono, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
