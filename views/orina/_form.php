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

$aspecto = array(
    "Limplidad" => "Limplidad",
    "Ligeramente Turbia" => "Ligeramente Turbia",
    "Turbia" => "Turbia",
);
$color = array(
    "Amarillo" => "Amarillo",
    "Ambar" => "Ambar",
    "Rojizo" => "Rojizo",
    "Medicamento" => "Medicamento",
);
$densidad = array(
    '1.000' => '1,000',
    '1.005' => '1,005',
    '1.010' => '1,010',
    '1.015' => '1,015',
    '1.020' => '1,020',
    '1.025' => '1,025',
    '1.030' => '1,030',
);
$ph = array(
    '5' => '5',
    '5.5' => '5,5',
    '6' => '6',
    '6.5' => '6.5',
    '7' => '7',
    '7.5' => '7,5',
    '8' => '8',
);
$reaccion = array(
    "Acida" => "Acida",
    "Alcalina" => "Alcalina",
    "Anfotera" => "Anfotera",
    "Neutra" => "Neutra",
);
$bioquimicas = array(
    "Negativo" => "Negativo",
    "Trazas" => "Trazas",
    "1+" => "1+",
    "2+" => "2+",
    "3+" => "3+",
    "4+" => "4+",
);
$micro = array(
    "Escasas" => "Escasas",
    "Moderadadas" => "Moderadadas",
    "Abundantes" => "Abundantes",
);


$paciente= $model->perfil->paciente->nombres." ".$model->perfil->paciente->apellidos. " ".number_format($model->perfil->paciente->cedula, 0,"",".");
?>

<div class="orina-form">
    <h3>
    <?= "Paciente ".$paciente;?>
    </h3>

<h4>Caracteristicas generales</h4>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, 'aspecto')->dropDownList($aspecto,['prompt'=>'Escoger..']);  ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'color')->dropDownList($color,['prompt'=>'Escoger..']);  ?>
    </div>
    <div class="col-lg-2">
    <?= $form->field($model, 'densidad')->dropDownList($densidad,['prompt'=>'Escoger..']);  ?>
    </div>
    <div class="col-lg-2">
    <?= $form->field($model, 'reaccion')->dropDownList($reaccion,['prompt'=>'Escoger..']);  ?>
    </div>
    <div class="col-lg-2">
    <?= $form->field($model, 'ph')->dropDownList($ph,['prompt'=>'Escoger..']);  ?>
    </div>
    </div>
    <h4>Caracteristicas Bioquimicas</h4>
    <div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, 'proteina')->dropDownList($bioquimicas,['prompt'=>'Escoger..']);  ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'hemoglobina')->dropDownList($bioquimicas,['prompt'=>'Escoger..']);  ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'glucosa')->dropDownList($bioquimicas,['prompt'=>'Escoger..']);  ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'bilirrubina')->dropDownList($bioquimicas,['prompt'=>'Escoger..']);  ?>
    </div>
    </div>

    <div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, 'urobilinogeno')->dropDownList($bioquimicas,['prompt'=>'Escoger..']);  ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'nitritos')->dropDownList($bioquimicas,['prompt'=>'Escoger..']);  ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'cuerpos_cetonicos')->dropDownList($bioquimicas,['prompt'=>'Escoger..']);  ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'celulas_leucariotas')->dropDownList($bioquimicas,['prompt'=>'Escoger..']);  ?>
    </div>
    </div>
    <h4>Analisis Microscopico</h4>
    <div class="row">
    <div class="col-lg-2">
    <?= $form->field($model, 'celulas_epiteliales_planas')->textInput(['maxlength' => true,'placeholder'=>"XCPO"]) ?>
    </div>
    <div class="col-lg-2">
    <?= $form->field($model, 'leucocitos')->textInput(['maxlength' => true,'placeholder'=>"XCPO"]) ?>
    </div>
    <div class="col-lg-2">
    <?= $form->field($model, 'heamaties')->textInput(['maxlength' => true,'placeholder'=>"XCPO"]) ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'bacterias')->dropDownList($micro,['prompt'=>'Escoger..']);  ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'muscina')->dropDownList($micro,['prompt'=>'Escoger..']);  ?>
    </div>
    </div>
    <?= $form->field($model, 'observaciones')->textarea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Cargar'." ".$icono, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
