<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Usuariosearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_usuario',
            'user',
             // 'pass',
              //'id_rol',
            'nombre',
            'apellido',
            [
                 'attribute' => 'descripcion',
                 'value' => 'rol.descripcion',
                  //'contentOptions'=>['style'=>'width: 120px;'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
