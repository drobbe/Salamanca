<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orinas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orina-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orina', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_orina',
            'id_perfil',
            'aspecto',
            'color',
            'dendidad',
            // 'reaccion',
            // 'ph',
            // 'proteina',
            // 'hemoglobina',
            // 'glucosa',
            // 'bilirrubina',
            // 'urobilinogeno',
            // 'nitritos',
            // 'cuerpos_cetonicos',
            // 'celulas_leucariotas',
            // 'celulas _epiteliales_planas',
            // 'leucocitos',
            // 'heamaties',
            // 'bacterias',
            // 'muscina',
            // 'observaciones:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
