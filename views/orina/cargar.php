<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Orina */

$this->title = 'Cargar valores Orina Nº ' .$model->id_orina;
if($model->perfil->id_estatus==2){
	$this->params['breadcrumbs'][] = ['label' => $model->id_orina, 'url' => ['view', 'id' => $model->id_orina]];
	}

$this->params['breadcrumbs'][] = 'Cargar';
?>
<div class="orina-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
