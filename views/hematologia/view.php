<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use kartik\dialog\Dialog;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $model app\models\Hematologia */


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


$this->title = "Hematologia Nº ".$model->id_hematologia;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hematologia-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>
    <?= "Paciente ".$paciente;?>
    </h3>    
    <p>
        <?= Html::a('Modificar'.$icono2, ['cargar', 'id' => $model->id_hematologia], ['class' => 'btn btn-primary']) ?>
        <?= $btns;?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_hematologia',
            'globulos_blancos',
            'segmentados',
            'linfocitos',
            'monocitos',
            'eosinofilos',
            'globulos_rojos',
            'hemoglobina',
            'hematocritos',
            'vcm',
            'hcm',
            'chcm',
            'rdw',
            'vpm',
            'plaquetas',
            'observaciones:ntext',
        ],
    ]) ?>

</div>
