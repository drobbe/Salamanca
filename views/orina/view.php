<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use kartik\dialog\Dialog;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $model app\models\Orina */

Icon::map($this);
echo Dialog::widget();
$ruta = Url::to(['perfil/delete', 'id' => $model->perfil->id_perfil]);
$icono = Icon::show('trash', ['class'=>'fa-lg'], Icon::FA);
$icono2 = Icon::show('edit', ['class'=>'fa-lg'], Icon::FA);
$paciente= $model->perfil->paciente->nombres." ".$model->perfil->paciente->apellidos. " ".number_format($model->perfil->paciente->cedula, 0,"","."); 


$btns = <<< HTML
<button type="button" id="btn-confirm"  class="btn btn-warning">Anular $icono </button>
HTML;

$js = <<< JS

$("#btn-confirm").on("click", function() {
    krajeeDialog.confirm("Deseas Anular el Perfil?", function (result) {
        if (result) {
            alert('El Perfil ha sido Anulado');
            window.location="$ruta";
        } else {
            alert('Oops! No ha sido Anulado!');
        }
    });
});

JS;
 
// registrando JS
$this->registerJs($js);

$this->title = "Examen Orina Nº ".$model->id_orina;
//$this->params['breadcrumbs'][] = ['label' => 'Orinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orina-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>
    <?= "Paciente ".$paciente;?>
    </h3> 
    <p>
        <?= Html::a('Modificar'.$icono2, ['cargar', 'id' => $model->id_orina], ['class' => 'btn btn-primary']) ?>
        <?= $btns;?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_orina',
            'aspecto',
            'color',
            ['attribute'=> 'densidad', 'value'=> str_replace(".", ",", $model->densidad)],
            'reaccion',
            ['attribute'=> 'ph', 'value'=> str_replace(".", ",", $model->ph)],
            'proteina',
            'hemoglobina',
            'glucosa',
            'bilirrubina',
            'urobilinogeno',
            'nitritos',
            'cuerpos_cetonicos',
            'celulas_leucariotas',
            'celulas_epiteliales_planas',
            'leucocitos',
            'heamaties',
            'bacterias',
            'muscina',
            'observaciones:ntext',
        ],
    ]) ?>

</div>
