<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use kartik\dialog\Dialog;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $model app\models\Perfil */

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

$titulo = $tipo_perfil == 7 ?  "Perfil diarreico" : "Examen de heces";
$this->title = $titulo." Nº ".$model->id_heces;;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="heces-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>
    <?= "Paciente ".$paciente;?>
    </h3>
    <p>
        <?= Html::a('Modificar '.$icono2, ['cargar', 'id' => $model->id_heces], ['class' => 'btn btn-primary']) ?>
        <?php echo $btns;?> 
    </p>
<?php 
$prueba = [ 'id_heces', 'aspecto', 'color', 'reaccion', 'olor', 'moco', 'restos', 'sangre', 'parasitos1', 'parasitos2', 'parasitos3','observaciones:ntext',];

if($tipo_perfil == 7){
$prueba = [ 'id_heces', 'aspecto', 'color', 'reaccion', 'olor', 'moco', 'restos', 'sangre', 'parasitos1', 'parasitos2', 'parasitos3', 'sangre_oculta', 'azucares', 'ph', 'observaciones:ntext',];
}
?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $prueba,
    ]) ?>

</div>
