<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
//use yii\widgets\MaskedInput;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchPerfil */
/* @var $dataProvider yii\data\ActiveDataProvider */
Icon::map($this);
$iconDesanular = Icon::show('undo', ['class'=>'fa-lg'], Icon::FA);


$this->title = 'Perfiles Anulados';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="perfil-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
             [
             'attribute'=>'id_perfil',
             'value'=>'id_perfil',
             'contentOptions'=>['style'=>'width: 50px !important;']
            ],

            [
                 'attribute' => 'perfil',
                 'value' => 'tipoPerfil.descripcion',
            ],   
            [
                 'attribute' => 'fecha_creacion',
                 'format'=>['DateTime','php:d-m-Y'],
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

            [
                'format' => 'raw',
                //'visible' =>  true,
                //'contentOptions' => ['title' => 'Desanular'],
                'value'=>function ($data) use ($iconDesanular) {
                    return Html::a("<span class='glyphicon glyphicon-eye-open'></span>",['view', 'id' => $data->id_perfil] , ['title' => 'Ver'])." ".Html::a($iconDesanular,['undelete', 'id' => $data->id_perfil], ['title' => 'Desanular']);
                },

            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
