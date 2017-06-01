<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Heces';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="heces-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Heces', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_heces',
            'id_perfil',
            'aspecto',
            'color',
            'reaccion',
            // 'olor',
            // 'moco',
            // 'restos',
            // 'sangre',
            // 'parasitos1',
            // 'parasitos2',
            // 'parasitos3',
            // 'sangre_oculta',
            // 'azucares',
            // 'ph',
            // 'observaciones:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
