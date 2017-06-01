<?php
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
//use kartik\dialog\DialogAsset;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PacienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Pacientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //'id_paciente',
            'nombres',
            'apellidos',
            'cedula',
            [
                 'attribute' => 'fecha_nacimiento',
                 'format'=>['DateTime','php:d/m/Y'],
                     'filter'=> DatePicker::widget([
                     'pickerButton' => false,
                     'value' => $searchModel->fecha_nacimiento,
                     'attribute' => 'fecha_nacimiento',
                     'name' => 'PacienteSearch[fecha_nacimiento]',
                     'options' => ['placeholder' => 'Fecha'],
                     'pluginOptions' => [
                         'todayHighlight' => true,
                         'autoclose'=>true
                        ]
                ]),
                 'contentOptions'=>['style'=>'width: 160px !important;']  

            ], 
            [        
            'attribute' => 'sexo',
            'filter'=>array("M"=>"Masculino","F"=>"Femenino"),
            'value' => function ($model) {
                return $model->sexo=='M' ? 'Masculino' : 'Femenino';
            },
            ],
            //'telefono',
             'correo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
