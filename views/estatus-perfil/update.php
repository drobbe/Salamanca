<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstatusPerfil */

$this->title = 'Update Estatus Perfil: ' . $model->id_status;
$this->params['breadcrumbs'][] = ['label' => 'Estatus Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_status, 'url' => ['view', 'id' => $model->id_status]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estatus-perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
