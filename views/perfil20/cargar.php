<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Quimicas */
$titulo = "Perfil 20";
$this->title = 'Cargar Cargar valores ' . $titulo." Nº ".$model->id_hematologia;
if($model->perfil->id_estatus==2){
	$this->params['breadcrumbs'][] = ['label' => $model->id_hematologia, 'url' => ['view', 'id' => $model->id_hematologia]];
	}
$this->params['breadcrumbs'][] = 'Update';

?>
<div class="quimicas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'quimicas' => $quimicas,
    ]) ?>

</div>
