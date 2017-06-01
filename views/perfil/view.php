<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use kartik\dialog\Dialog;
use kartik\select2\Select2;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $model app\models\Perfil */

Icon::map($this);
echo Dialog::widget();
$ruta = Url::to(['perfil/delete', 'id' => $model->id_perfil]);
$icono = Icon::show('trash', ['class'=>'fa-lg'], Icon::FA);
$icono2 = Icon::show('edit', ['class'=>'fa-lg'], Icon::FA);
$btns = <<< HTML
<button type="button" id="btn-confirm"  class="btn btn-warning">Anular $icono </button>
HTML;

$js = <<< JS

$("#btn-confirm").on("click", function() {
    krajeeDialog.confirm("Deseas anular el Perfil?", function (result) {
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
$this->title = $model->id_perfil;
$this->params['breadcrumbs'][] = ['label' => 'Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar '.$icono2, ['update', 'id' => $model->id_perfil], ['class' => 'btn btn-primary']) ?>
        <?php echo $btns;?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_perfil',
            ['attribute' => 'id_tipo_perfil', 'value'=> $model->tipoPerfil->descripcion],
            'fecha_creacion',
            ['attribute' => 'id_paciente', 'value'=> $model->paciente->nombres." ".$model->paciente->apellidos],
            ['attribute' => 'cedula', 'value'=> $model->paciente->cedula],
            ['attribute' => 'id_estatus', 'value'=> $model->estatus->descripcion],
            ['attribute' => 'id_usuario', 'value'=> $model->usuario->user],
        ],
    ]) ?>

</div>
