<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoPerfilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$css = <<<CSS
[title=Eliminar] {
    visibility: collapse !important;
}
CSS;
$this->registerCss($css);


$this->title = 'Tipo Perfiles';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tipo-perfil-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?php 
            // echo Html::a('Adgred', ['create'], ['class' => 'btn btn-success'])
        ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id_tipo_perfil',
            'descripcion',
            [   'attribute' => 'estatus',
                'value' => function ($model) {
                    return $model->estatus==true ? 'Activo' : 'Apagado';
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
