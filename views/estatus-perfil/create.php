<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstatusPerfil */

$this->title = 'Crear';
$this->params['breadcrumbs'][] = ['label' => 'Estatus Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estatus-perfil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
