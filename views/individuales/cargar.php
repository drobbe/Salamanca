<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Quimicas */

$this->title = "Cargar valores Pruebas individuales Nº ". $model->id_quimicas;

if($model->perfil->id_estatus==2){
	$this->params['breadcrumbs'][] = ['label' => $model->id_quimicas, 'url' => ['view', 'id' => $model->id_quimicas]];
}

$this->params['breadcrumbs'][] = 'Cargar';
$this->params['tipo_perfil'] = $tipo_perfil;
?>
<div class="quimicas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
