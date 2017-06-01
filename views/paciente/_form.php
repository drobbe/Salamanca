<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;
use kartik\date\DatePicker;

Icon::map($this);
/* @var $this yii\web\View */
/* @var $model app\models\Paciente */
/* @var $form yii\widgets\ActiveForm */

$js = <<< JS

$( document ).ready(function() {
  $("[value=$model->sexo]").prop('checked', true);
});

JS;

$this->registerJs($js);

$model->isNewRecord ? false : $model->fecha_nacimiento = Yii::$app->formatter->asDate($model->fecha_nacimiento, "php:d/m/Y");
?>



<div class="paciente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true,'placeholder'=>"Nombres"]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true, 'placeholder'=>"Apellidos"]) ?>

    <?= DatePicker::widget([
        'model' => $model, 
        'attribute' => 'fecha_nacimiento',
        'pickerButton' => false,
        'form' => $form,
        'options' => ['placeholder' => 'Fecha de Nacimiento'],
        'pluginOptions' => [
            'todayHighlight' => true,
            'autoclose'=>true
        ]
    ]); ?>
    <?= $form->field($model, 'cedula')->textInput(['maxlength' => 8, 'placeholder'=>"Apellidos"]) ?>

        
    
            
         <label class="radio-head">Genero del Paciente</label>
         <?=
         $form->field($model, 'sexo')  ->radioList(
                 ['F' => ' Femenino ', 'M' => ' Masculino '],
                 [
                     'item' => function($index, $label, $name, $checked, $value) {

                         $return = '<label class="modal-radio">';
                         $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" tabindex="3">';
                         $return .= '<i></i>';
                         $return .= '<span>' . ucwords($label) . '</span>';
                         $return .= '</label> ';
                         if (ucwords($label) == ' Femenino ') {
                             $return .= '<i class="fa-lg fa fa-venus"></i>';
                         }
                         else{
                             $return .= '<i class="fa-lg fa fa-mars"></i>';
                             }                   

                         return $return;

                     }
                 ]
             )
         ->label(false);
         ?>
     
     <div class="help-block"></div>
 


    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true,'placeholder'=>"Telefono"]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true,'placeholder'=>"Correo"]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
