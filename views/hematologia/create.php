<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hematologia */

$this->title = 'Create Hematologia';
$this->params['breadcrumbs'][] = ['label' => 'Hematologias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hematologia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
