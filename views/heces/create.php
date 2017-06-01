<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Heces */

$this->title = 'Create Heces';
$this->params['breadcrumbs'][] = ['label' => 'Heces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="heces-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
