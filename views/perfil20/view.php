<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use kartik\dialog\Dialog;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $model app\models\Quimicas */
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


$this->title = "Perfil 20 Nº ".$model->id_hematologia;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quimicas-view">
    
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
            ['attribute'=> 'globulos_blancos', 'value'=> str_replace(".", ",", $model->globulos_blancos)],
            ['attribute'=> 'segmentados', 'value'=> str_replace(".", ",", $model->segmentados)],
            ['attribute'=> 'linfocitos', 'value'=> str_replace(".", ",", $model->linfocitos)],
            ['attribute'=> 'monocitos', 'value'=> str_replace(".", ",", $model->monocitos)],
            ['attribute'=> 'eosinofilos', 'value'=> str_replace(".", ",", $model->eosinofilos)],
            ['attribute'=> 'globulos_rojos', 'value'=> str_replace(".", ",", $model->globulos_rojos)],
            ['attribute'=> 'hemoglobina', 'value'=> str_replace(".", ",", $model->hemoglobina)],
            ['attribute'=> 'hematocritos', 'value'=> str_replace(".", ",", $model->hematocritos)],
            ['attribute'=> 'vcm', 'value'=> str_replace(".", ",", $model->vcm)],
            ['attribute'=> 'hcm', 'value'=> str_replace(".", ",", $model->hcm)],
            ['attribute'=> 'chcm', 'value'=> str_replace(".", ",", $model->chcm)],
            ['attribute'=> 'rdw', 'value'=> str_replace(".", ",", $model->rdw)],
            ['attribute'=> 'vpm', 'value'=> str_replace(".", ",", $model->vpm)],
            ['attribute'=> 'plaquetas', 'value'=> str_replace(".", ",", $model->plaquetas)],

            ['attribute'=> 'glicemia',           'value'=>str_replace(".", ",", $quimicas->glicemia)],
                
            ['attribute'=> 'urea',               'value'=>str_replace(".", ",", $quimicas->urea)],
                
            ['attribute'=> 'creatinina',         'value'=>str_replace(".", ",", $quimicas->creatinina)],
                
            ['attribute'=> 'colesterol',         'value'=>str_replace(".", ",", $quimicas->colesterol)],

            ['attribute'=> 'trigliceridos',      'value'=>str_replace(".", ",", $quimicas->trigliceridos)],

            ['attribute'=> 'hdl_colesterol',     'value'=>str_replace(".", ",", $quimicas->hdl_colesterol)],
                
            ['attribute'=> 'ldl_colesterol',     'value'=>str_replace(".", ",", $quimicas->ldl_colesterol)],
                
            ['attribute'=> 'vldl_colesterol',    'value'=>str_replace(".", ",", $quimicas->vldl_colesterol)],
                
            ['attribute'=> 'acido_urico',        'value'=>str_replace(".", ",", $quimicas->acido_urico)],
                
            ['attribute'=> 'proteinas_totales',  'value'=>str_replace(".", ",", $quimicas->proteinas_totales)],

            ['attribute'=> 'albumina',           'value'=>str_replace(".", ",", $quimicas->albumina)],
              
            ['attribute'=> 'alb_glob',           'value'=>str_replace(".", ",", $quimicas->alb_glob)],
                
            ['attribute'=> 'globulina',          'value'=>str_replace(".", ",", $quimicas->globulina)],

            ['attribute'=> 'bilirrubina_total',  'value'=>str_replace(".", ",", $quimicas->bilirrubina_total)],

            ['attribute'=> 'bili_directa',       'value'=>str_replace(".", ",", $quimicas->bili_directa)],

            ['attribute'=> 'bili_indirecta',     'value'=>str_replace(".", ",", $quimicas->bili_indirecta)],
                
            ['attribute'=> 'ast',                'value'=>str_replace(".", ",", $quimicas->ast)],
                
            ['attribute'=> 'alt',                'value'=>str_replace(".", ",", $quimicas->alt)],
                
            ['attribute'=> 'calcio_serico',      'value'=>str_replace(".", ",", $quimicas->calcio_serico)],

             'observaciones:ntext',
        ],
    ]) ?>

</div>
