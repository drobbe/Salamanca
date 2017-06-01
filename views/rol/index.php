<?php
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
 use kartik\icons\Icon;
 use yii\helpers\Url;
Icon::map($this);
$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?> 
<?php /* echo Html::button('prueba', ['value'=>Url::to('http://localhost/salamanca/web/index.php/site/login'),'class'=> 'btn btn-success','id'=>'modalButton2']) ?>
<?php/*
Modal::begin([
    'header'=>"hola",
    'id'=>'modal2',
    'size'=>'modal-lg',
    ]);
echo "<div id='modalContent'> </div>";
Modal::end();
$js = <<< JS
$(document).ready(function(){

 $("#modalButton2").click(function(){
     $("#modal2").modal('show')
             .find("#modalContent")
             .load($(this).attr('value'));
    });
});
JS;
$this->registerJs($js);/**/

$css = <<<CSS
[title=Eliminar] {
    visibility: collapse !important;
}
CSS;
$this->registerCss($css);

?>
<div class="rol-index">

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
            //['class' => 'yii\grid\SerialColumn'],         
            'descripcion',              
            [   'attribute' => 'estatus',
                'value' => function ($model) {
                    return $model->estatus==true ? 'Activo' : 'Apagado';
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
