<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quimicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quimicas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Quimicas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_quimicas',
            'id_perfil',
            'glicemia',
            'urea',
            'creatinina',
            // 'colesterol',
            // 'trigliceridos',
            // 'hdl_colesterol',
            // 'ldl_colesterol',
            // 'vldl_colesterol',
            // 'acido_urico',
            // 'proteinas_totales',
            // 'albumina',
            // 'alb/glob',
            // 'globulina',
            // 'bilirrubina_total',
            // 'bili_directa',
            // 'bili_indirecta',
            // 'ast',
            // 'alt',
            // 'calcio_serico',
            // 'observaciones:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
