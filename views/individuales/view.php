<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use kartik\dialog\Dialog;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $model app\models\Quimicas */
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


$this->title = "Examenes Individuales Nº ".$model->id_quimicas;
//$this->params['breadcrumbs'][] = ['label' => 'Quimicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quimicas-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>
    <?= "Paciente ".$paciente;?>
    </h3> 
    <p>
        <?= Html::a('Modificar'.$icono2, ['cargar', 'id' => $model->id_quimicas], ['class' => 'btn btn-primary']) ?>
        <?= $btns;?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_quimicas',
            'id_perfil',
            ['attribute'=> 'glicemia',           'value'=>str_replace(".", ",", $model->glicemia),                    
                'visible'=>$model->glicemia!=null],
                
            ['attribute'=> 'urea',               'value'=>str_replace(".", ",", $model->urea),                        
                'visible'=>$model->urea!=null],
                
            ['attribute'=> 'creatinina',         'value'=>str_replace(".", ",", $model->creatinina),                  
                'visible'=>$model->creatinina!=null],
                
            ['attribute'=> 'colesterol',         'value'=>str_replace(".", ",", $model->colesterol),                  
                'visible'=>$model->colesterol!=null    ],

            ['attribute'=> 'trigliceridos',      'value'=>str_replace(".", ",", $model->trigliceridos),               
                'visible'=>$model->trigliceridos!=null ],

            ['attribute'=> 'hdl_colesterol',     'value'=>str_replace(".", ",", $model->hdl_colesterol),              
                'visible'=>$model->hdl_colesterol!=null],

                
            ['attribute'=> 'ldl_colesterol',     'value'=>str_replace(".", ",", $model->ldl_colesterol),              
                'visible'=>$model->ldl_colesterol!=null],

                
            ['attribute'=> 'vldl_colesterol',    'value'=>str_replace(".", ",", $model->vldl_colesterol),             
                'visible'=>$model->vldl_colesterol!=null],

                
            ['attribute'=> 'acido_urico',        'value'=>str_replace(".", ",", $model->acido_urico),                 
                'visible'=>$model->acido_urico!=null],

                
            ['attribute'=> 'proteinas_totales',  'value'=>str_replace(".", ",", $model->proteinas_totales),           
                'visible'=>$model->proteinas_totales!=null ],

            ['attribute'=> 'albumina',           'value'=>str_replace(".", ",", $model->albumina),                    
                'visible'=>$model->albumina!=null],

                
            ['attribute'=> 'alb_glob',           'value'=>str_replace(".", ",", $model->alb_glob),                    
                'visible'=>$model->alb_glob!=null],

                
            ['attribute'=> 'globulina',          'value'=>str_replace(".", ",", $model->globulina),                   
                'visible'=>$model->globulina!=null     ],

            ['attribute'=> 'bilirrubina_total',  'value'=>str_replace(".", ",", $model->bilirrubina_total),           
                'visible'=>$model->bilirrubina_total!=null ],

            ['attribute'=> 'bili_directa',       'value'=>str_replace(".", ",", $model->bili_directa),                
                'visible'=>$model->bili_directa!=null ],

            ['attribute'=> 'bili_indirecta',     'value'=>str_replace(".", ",", $model->bili_indirecta),              
                'visible'=>$model->bili_indirecta!=null],

                
            ['attribute'=> 'ast',                'value'=>str_replace(".", ",", $model->ast),                         
                'visible'=>$model->ast!=null],
                
            ['attribute'=> 'alt',                'value'=>str_replace(".", ",", $model->alt),                         
                'visible'=>$model->alt!=null],
                
            ['attribute'=> 'calcio_serico',      'value'=>str_replace(".", ",", $model->calcio_serico),               
                'visible'=>$model->calcio_serico!=null],
                
            'observaciones:ntext',
        ],
    ]) ?>

</div>
