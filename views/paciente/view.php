<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use kartik\dialog\Dialog;
use kartik\icons\Icon;
Icon::map($this);
echo Dialog::widget();

$ruta = Url::to(['paciente/delete', 'id' => $model->id_paciente]);
$icono = Icon::show('trash', ['class'=>'fa-lg'], Icon::FA);
$icono2 = Icon::show('edit', ['class'=>'fa-lg'], Icon::FA);
$btns = <<< HTML
<button type="button" id="btn-confirm"  class="btn btn-warning">Elminar $icono </button>
HTML;

$js = <<< JS

$("#btn-confirm").on("click", function() {
    krajeeDialog.confirm("Deseas eliminar el Paciente?", function (result) {
        if (result) {
            alert('El Paciente ha sido eliminado');
            window.location="$ruta";
        } else {
            alert('Oops! No ha sido Elminado!');
        }
    });
});

JS;
 
// registrando JS
$this->registerJs($js);


$this->title = $model->id_paciente;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="paciente-view">

    <h1> Paciente <?= Html::encode(+$this->title) ?> </h1>

    <p>        
        <?= Html::a('Modificar '.$icono2, ['update', 'id' => $model->id_paciente], ['class' => 'btn btn-primary']) ?>
        <?php echo $btns;?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          
            'nombres',
            'apellidos',
            'cedula',
            'fecha_nacimiento',
            'sexo',
            'telefono',
            'correo',
        ],
    ]) ?>

</div>
