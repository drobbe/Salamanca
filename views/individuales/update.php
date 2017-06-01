<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Individuales */

$this->title = 'Update Individuales: ' . $model->id_quimicas;
$this->params['breadcrumbs'][] = ['label' => 'Individuales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_quimicas, 'url' => ['view', 'id' => $model->id_quimicas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="individuales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
