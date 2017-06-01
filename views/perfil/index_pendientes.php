<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
//use yii\widgets\MaskedInput;
use yii\helpers\Url;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchPerfil */
/* @var $dataProvider yii\data\ActiveDataProvider */

Icon::map($this);
//$ruta = Url::to(['usuario/delete', 'id' => $model->id_usuario]);
$icono = Icon::show('drivers-license-o', ['class'=>'fa-lg'], Icon::FA);
$this->title = 'Perfiles Pendientes';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="perfil-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
             [
             'attribute'=>'id_perfil',
             'value'=>'id_perfil',
             'contentOptions'=>['style'=>'width: 70px !important;']
            ],

            [
                 'attribute' => 'perfil',
                 'value' => 'tipoPerfil.descripcion',
            ],   
            [
                 'attribute' => 'fecha_creacion',
                 'format'=>['DateTime','php:d-m-Y'],
                 'contentOptions'=>['style'=>'width: 130px !important;']
            ],            
            [
                 'attribute' => 'paciente',
                 'value' =>  function($data)
                 {
                    return $data->getNombrePaciente();
                  },
            ],

            [
                 'attribute' => 'cedula',
                 'value' => 'paciente.cedula',
                  //'contentOptions'=>['style'=>'width: 120px;'
            ],
            [
                 'attribute' => 'id_usuario',
                 'value' =>  function($data)
                 {
                    return $data->getNombre();
                  },
            ],

            ['class' => 'yii\grid\ActionColumn'],
            [
                'format' => 'raw',
                'contentOptions' => ['title' => 'Cargar'],
                'value'=>function ($data) use ($icono) {
                    return Html::a($icono ,['/'.$data->getUrl($data->tipoPerfil->id_tipo_perfil).'/cargar?id='.($data->getId($data->id_perfil, $data->tipoPerfil->id_tipo_perfil))]);
                },

            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

