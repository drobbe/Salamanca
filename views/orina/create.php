<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Orina */

$this->title = 'Create Orina';
$this->params['breadcrumbs'][] = ['label' => 'Orinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orina-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
