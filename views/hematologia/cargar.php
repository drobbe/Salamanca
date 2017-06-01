<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hematologia */

$this->title = 'Cargar valores Hematologia'." Nº ".$model->id_hematologia;
if($model->perfil->id_estatus==2){
	$this->params['breadcrumbs'][] = ['label' => $model->id_hematologia, 'url' => ['view', 'id' => $model->id_hematologia]];
}
$this->params['breadcrumbs'][] = 'Cargar';
?>
<div class="hematologia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
