<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */

$this->title = 'Modificar Paciente: ' . $model->id_paciente;

?>
<div class="paciente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
