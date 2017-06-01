<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TipoPerfil */

$this->title = $model->id_tipo_perfil;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-perfil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tipo_perfil], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tipo_perfil], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tipo_perfil',
            'descripcion',
[
    'attribute'=>'estatus',
    'value' => $model->estatus==true ? 'Activo' : 'Apagado',
],
        ],
    ]) ?>

</div>
