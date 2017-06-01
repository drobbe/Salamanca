<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\dialog\Dialog;
use kartik\icons\Icon;


Icon::map($this);
echo Dialog::widget();
$icono = Icon::show('check', ['class'=>'fa-lg'], Icon::FA);
$js = <<< JS
$('#w1').on('beforeSubmit', function (e) {
    krajeeDialog.alert("Se Cargo los valores");
    return true;
});
$('#heces-parasitos1').change(function() {
    if ($(this).val() !== 'NO SE OBSERVARON FORMAS PARASITARIAS') {
        $("#heces-parasitos2,[for='heces-parasitos2']").css('visibility','visible');
    }
    else {
        $("#heces-parasitos2, #heces-parasitos3, [for='heces-parasitos3'], [for='heces-parasitos2']").css('visibility','hidden');
        $("#heces-parasitos3").val('');
        $("#heces-parasitos2").val('');
    }
});
$('#heces-parasitos2').change(function() {
    if ($(this).val() !== '') {
        $("#heces-parasitos3,[for='heces-parasitos3']").css('visibility','visible');
    }
    else {
        $("#heces-parasitos3, [for='heces-parasitos3']").css('visibility','hidden');
        $("#heces-parasitos3").val('');
    }
});
JS;
$this->registerJs($js);
$vParasito2 = $model->parasitos2=='' ? 'hidden' : 'visible';

$ccs = <<< CCS
#heces-parasitos2, #heces-parasitos3,label[for^="heces-parasitos3"],label[for^="heces-parasitos2"]{
    visibility: $vParasito2;
}
CCS;
$this->registerCss($ccs);

$aspecto = array(
    "Heterogeneo" => "Heterogeneo",
    "Homogeneo" => "Homogeneo",
);
$reaccion = array(
    "Alcalina" => "Alcalina",
    "Acida" => "Acida",
);
$color = array(
    "Amarillo" => "Amarillo",
    "Marrón" => "Marron",
    "Verdoso" => "Verdoso",
    "Negruzca" => "Negruzca",
    "Rojizo" => "Rojizo",
    "Acolica" => "Acolica",
);
$olor = array(
    "Fecal" => "Fecal",
    "Fetido" => "Fetido",
);
$moco = array(
    "Ausente" => "Ausente",
    "Escaso" => "Escaso",
    "Moderado" => "Moderado",
    "Abundante" => "Abundante",
);
$restos = array(
    "Ausente" => "Ausente",
    "Presente" => "Presente",
);
$sangre = array(
    "Ausente" => "Ausente",
    "Escaso" => "Escaso",
    "Moderado" => "Moderado",
    "Abundante" => "Abundante",
);
$parasitos1 = array(
"NO SE OBSERVARON FORMAS PARASITARIAS" => "NO SE OBSERVARON FORMAS PARASITARIAS",
"Quistes de Entamoeba histolytica y/o dispar" => "Quistes de Entamoeba histolytica y/o dispar",
"Quistes de Entamoeba spp." => "Quistes de Entamoeba spp.",
"Quistes de Entamoeba coli" => "Quistes de Entamoeba coli",
"Quistes de Giardia duodenalis" => "Quistes de Giardia duodenalis",
"Quistes de Chilomastix mesnilii" => "Quistes de Chilomastix mesnilii",
"Quistes de Endolimax nana" => "Quistes de Endolimax nana",
"Trofozoitos hematofagos de Entamoeba  de histolytica " => "Trofozoitos hematofagos de Entamoeba  de histolytica ",
"Trofozoitos de Entamoeba spp" => "Trofozoitos de Entamoeba spp",
"TRofozoitos de Entamoeba coli" => "TRofozoitos de Entamoeba coli",
"Trofozoitos de Giardia duodenalis" => "Trofozoitos de Giardia duodenalis",
"Trofozoitos de Chilomastix mesnilii" => "Trofozoitos de Chilomastix mesnilii",
"Blastocystis spp con cuerpo central" => "Blastocystis spp con cuerpo central",
"Blastocystis spp forma granulosa" => "Blastocystis spp forma granulosa",
"Blastocystis spp forma globulosa" => "Blastocystis spp forma globulosa",
);
$parasitoa = array(
"" => "Escoger...",
"Quistes de Entamoeba histolytica y/o dispar" => "Quistes de Entamoeba histolytica y/o dispar",
"Quistes de Entamoeba spp." => "Quistes de Entamoeba spp.",
"Quistes de Entamoeba coli" => "Quistes de Entamoeba coli",
"Quistes de Giardia duodenalis" => "Quistes de Giardia duodenalis",
"Quistes de Chilomastix mesnilii" => "Quistes de Chilomastix mesnilii",
"Quistes de Endolimax nana" => "Quistes de Endolimax nana",
"Trofozoitos hematofagos de Entamoeba  de histolytica " => "Trofozoitos hematofagos de Entamoeba  de histolytica ",
"Trofozoitos de Entamoeba spp" => "Trofozoitos de Entamoeba spp",
"TRofozoitos de Entamoeba coli" => "TRofozoitos de Entamoeba coli",
"Trofozoitos de Giardia duodenalis" => "Trofozoitos de Giardia duodenalis",
"Trofozoitos de Chilomastix mesnilii" => "Trofozoitos de Chilomastix mesnilii",
"Blastocystis spp con cuerpo central" => "Blastocystis spp con cuerpo central",
"Blastocystis spp forma granulosa" => "Blastocystis spp forma granulosa",
"Blastocystis spp forma globulosa" => "Blastocystis spp forma globulosa",
);
$sangre_oculta = array(
    "Negativo" => "Negativo",
    "1+" => "1+",
    "2+" => "2+",
    "3+" => "3+",
    "4+" => "4+",
);
$azucares = array(
    "Negativo" => "Negativo",
    "Trazas" => "Trazas",
    "1+" => "1+",
    "2+" => "2+",
    "3+" => "3+",
    "4+" => "4+",
);

$paciente= $model->perfil->paciente->nombres." ".$model->perfil->paciente->apellidos. " ".number_format($model->perfil->paciente->cedula, 0,"",".");
$tipo_perfil = ($this->params['tipo_perfil']);

?>

<div class="heces-form">
    <h3>
    <?= "Paciente ".$paciente;?>
    </h3>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'aspecto')->dropDownList($aspecto,['prompt'=>'Escoger..']);  ?>

    <?= $form->field($model, 'color')->dropDownList($color,['prompt'=>'Escoger..']);  ?>

    <?= $form->field($model, 'reaccion')->dropDownList($reaccion,['prompt'=>'Escoger..']);  ?>

    <?= $form->field($model, 'olor')->dropDownList($olor,['prompt'=>'Escoger..']);  ?>

    <?= $form->field($model, 'moco')->dropDownList($moco,['prompt'=>'Escoger..']);  ?>

    <?= $form->field($model, 'restos')->dropDownList($restos,['prompt'=>'Escoger..']);  ?>

    <?= $form->field($model, 'sangre')->dropDownList($sangre,['prompt'=>'Escoger..']);  ?>

    <div class="row">
    <div class="col-lg-4">
    <?= $form->field($model, 'parasitos1')->dropDownList($parasitos1);  ?>
    </div><!-- /.col-lg-4 -->

    <div class="col-lg-4">
    <?= $form->field($model, 'parasitos2')->dropDownList($parasitoa);  ?>
    </div><!-- /.col-lg-4 -->

    <div class="col-lg-4">
    <?= $form->field($model, 'parasitos3')->dropDownList($parasitoa);  ?>
    </div>
    </div><!-- /.row -->
    
    <?php if($tipo_perfil ==7){
        echo($form->field($model, 'sangre_oculta')->dropDownList($sangre_oculta,['prompt'=>'Escoger..']));
        echo($form->field($model, 'azucares')->dropDownList($azucares,['prompt'=>'Escoger..']));
        echo($form->field($model, 'ph')->textInput(['placeholder'=>"3 - 9", 'maxlength'=>'1']));
    } ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Cargar'." ".$icono, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
