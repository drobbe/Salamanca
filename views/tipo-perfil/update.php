<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoPerfil */

$this->title = 'Actualizar Tipo Perfil: ' . $model->id_tipo_perfil;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_perfil, 'url' => ['view', 'id' => $model->id_tipo_perfil]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
