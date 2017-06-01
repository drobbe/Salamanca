<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use kartik\dialog\Dialog;
use kartik\icons\Icon;
Icon::map($this);
echo Dialog::widget();

$ruta = Url::to(['usuario/delete', 'id' => $model->id_usuario]);
$icono = Icon::show('remove', ['class'=>'fa-lg'], Icon::FA);
$icono2 = Icon::show('edit', ['class'=>'fa-lg'], Icon::FA);
$array= $model->getDescripcionRolSolo($model->id_rol);
//var_dump($array);
$descripcion=  $array[0]['descripcion'];



$btns = <<< HTML
<button type="button" id="btn-confirm" class="btn btn-warning">Elminar $icono </button>
HTML;

$js = <<< JS

$("#btn-confirm").on("click", function() {
    krajeeDialog.confirm("Deseas eliminar el Usuario?", function (result) {
        if (result) {
            alert('El Usuario ha sido eliminado');
            window.location="$ruta";
        } else {
            alert('Oops! No ha sido Elminado!');
        }
    });
});

JS;
 
// registrando JS
$this->registerJs($js);

$this->title = $model->id_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar '.$icono2, ['update', 'id' => $model->id_usuario], ['class' => 'btn btn-primary']) ?>
        <?php echo $btns;?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           
            'user',
            //'pass',
            [
             'attribute' => 'id_rol',
             'value'=> $descripcion,
        ],
            'nombre',
            'apellido',
        ],
    ]) ?>

</div>
