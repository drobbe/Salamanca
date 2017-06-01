<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoPerfil */

$this->title = 'Crear Tipo Perfil';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-perfil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
