<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Heces */

$titulo = $tipo_perfil == 7 ?  "Perfil diarreico" : "Examen de heces";
$this->title = 'Cargar valores '.$titulo." Nº ".$model->id_heces;
if($model->perfil->id_estatus==2){
	$this->params['breadcrumbs'][] = ['label' => $model->id_heces, 'url' => ['view', 'id' => $model->id_heces]];
}

$this->params['breadcrumbs'][] = 'Cargar';
$this->params['tipo_perfil'] = $tipo_perfil;
?>
<div class="heces-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
