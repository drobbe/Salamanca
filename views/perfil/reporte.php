<?php
use miloschuman\highcharts\Highcharts;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
//use kartik\dialog\DialogAsset;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PacienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$css = <<<CSS
.row-centered {
    text-align:center;
}
.col-centered {
    display:inline-block;
    float:none;
    /* reset the text-align */
    /*text-align:left;
    /* inline-block space fix */
    margin-right:-4px;
}
.highcharts-container {
    margin-top: 20px;
}

CSS;
$this->registerCss($css);

$this->title = 'Reporte';
$this->params['breadcrumbs'][] = $this->title;
if(isset($inicio) && isset($final)){
    $comienzo = $inicio;
    $termina = $final;
}
else{
    $comienzo = date("d/m/Y"); 
    $termina = date("d/m/Y");    
}


/*$array =    [
                ['name' => 'Jane', 'data' => [23,32]],
                ['name' => 'Loco', 'data' => [24,12]],

            ];*/




?>
<div class="paciente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php $form = ActiveForm::begin(); ?>
    <div class= "container">
        <div class="row row-centered">
            <div class="col-lg-3 col-centered">
            <label class="text-center">Desde</label>   
            <?= DatePicker::widget([
            'name' => 'inicio',
            'value' => $comienzo,
            'removeButton' => false,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd/mm/yyyy'
                ]
            ]); ?>  
            </div>
            <div class="col-lg-3 col-centered">
            <label class="text-center">Hasta</label>       
            <?= DatePicker::widget([
            'name' => 'final',
            'value' => $termina,
            'removeButton' => false,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd/mm/yyyy'
                ]
            ]); 
        ?> 

            </div>
        </div>
    </div>   
    <br>
    <div class= "container">
        <div class="row row-centered">
            <div class="col-lg-3 col-centered">
                <?= Html::submitButton("Generar <i class=\"fa fa-bar-chart fa-3\"></i>", ['class' => $model->isNewRecord ? 'btn btn-primary btn-lg' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
  <?php ActiveForm::end(); ?>

<?php 
if(isset($query)){
    echo Highcharts::widget([

       'options' => [

           'chart'=> [  'type'=>'column'],
            "colors"=> ["#d223df", "#DF5353", "#8d4654", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
          "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
          'title' => ['text' => 'Perfiles Realizados'],
          'subtitle'=> ['text'=> 'desde '.$comienzo.' hasta '.$termina],
          'xAxis' => [
             'categories' => ["Tipos de perfil"]
          ],
          'yAxis' => [
             'title' => ['text' => 'Cantidad']
          ],
            'plotOptions'=> [
            'line'=>['dataLabels'=>[
                    'enabled'=>true
                ],
                'enableMouseTracking'=>false
            ]
        ],
          'series' => $query,

       ]
    ]);
}
?>


</div>