<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\dialog\Dialog;
use kartik\icons\Icon;
use app\models\Quimicas;
use app\models\Paciente;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $model app\models\Perfil */
/* @var $form yii\widgets\ActiveForm */

Icon::map($this);
echo Dialog::widget();
$icono = Icon::show('check', ['class'=>'fa-lg'], Icon::FA);
$icono2 = Icon::show('edit', ['class'=>'fa-lg'], Icon::FA);
$arrayperfil= $model->getDescripcionPerfil();
$arraypaciente= $model->getDescripcionPaciente();
$arrayestatus= $model->getEstatusPerfil();

$check = Quimicas::getTableSchema()->getColumnNames();
unset($check[1],$check[0],$check[21]);
$check = array_values($check);
$check = array_combine($check, $check);

$listado = Html::CheckboxList("checkbox", null, $check, $options = ['separator'=> "<label class='checkbox-inline'></label>",'class' => 'listcheck']);
$listado = str_replace ("'", "\"", $listado);

$js = <<< JS
$(document).ready(function(){
    $('#perfil-id_tipo_perfil').change(function(){
        if ($(this).val() === '5') {
            $("div.form-group.field-perfil-id_tipo_perfil.required").append('$listado');
        }
        else {
            $('div.listcheck').remove();
    
        }
    });
});
JS;
$this->registerJs($js);

$css = <<<CSS
.row-centered {
    text-align:center;
}
.col-centered {
    display:inline-block;
    float:none;
    /* reset the text-align */
    /*text-align:left;
    /* inline-block space fix */
    margin-right:-4px;
}
CSS;
$this->registerCss($css);



$model->id_estatus = $model->isNewRecord ? 1 : $model->id_estatus;
$model->id_usuario = $model->isNewRecord ? Yii::$app->user->identity->id_usuario : $model->id_estatus;
$nuevo = true;

$model->isNewRecord ? false : $model->fecha_creacion = Yii::$app->formatter->asDate($model->fecha_creacion, "php:d/m/Y");

$url = \yii\helpers\Url::to(['pacientelista']);

$paciente = empty($model->id_paciente) ? '' : Paciente::findOne($model->id_paciente);
$paciente = empty($model->id_paciente) ? '' : $paciente->nombres." ".$paciente->apellidos;

?>

<div class="perfil-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
            'fieldConfig' => ['errorOptions' => ['encode' => false, 'class' => 'help-block']] 
   ]); ?>

  
  

    
    <?php $model->isNewRecord ? $nuevo=true: $nuevo=false;
    if($model->isNewRecord){
        echo $form->field($model, 'id_tipo_perfil')->dropDownList($arrayperfil,['prompt'=>'Escoger..']);
        echo Html::activeHiddenInput($model, 'id_estatus') ;
    }
    else{

        echo($form->field($model, 'id_estatus')->dropDownList($arrayestatus));
    }
    ?>

    <?= DatePicker::widget([
        'model' => $model, 
        'attribute' => 'fecha_creacion',
        'pickerButton' => false,
        'form' => $form,
        'options' => ['placeholder' => 'Fecha del Perfil'],
        'pluginOptions' => [
            'todayHighlight' => true,
            'autoclose'=>true
        ]
    ]); ?>    


    <?= $form->field($model, 'id_paciente')->widget(Select2::classname(), [
            'initValueText' => $paciente,
            'options' => ['placeholder' => 'Nombres/Apellidos | Cedula'],
            'pluginOptions' => [        
                'allowClear' => true,
                'minimumInputLength' => 3,
                'language' => 'es',
            'ajax' => [
                'url' => $url,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
                ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(paciente) { return paciente.text; }'),
            'templateSelection' => new JsExpression('function (paciente) { return paciente.text; }'),
            ],
        ]);

?>

    <?= Html::activeHiddenInput($model, 'id_usuario'); ?>

    <div class="form-group">

    <?= Html::submitButton($model->isNewRecord ? 'Crear'." ".$icono: 'Modificar'." ".$icono2, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=> 'culo']) ?>
    
    </div>
    <?php ActiveForm::end();  ?>



</div>
