<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use kartik\icons\Icon;
Icon::map($this);
AppAsset::register($this);

$ccs = <<< CSS

        html {
        height: 100% !important;
        }

        body {
        background: linear-gradient( 130deg , rgba(171, 17, 51, 1) 30%,   rgba(255, 51, 102, 0.75)),  linear-gradient( 200deg ,   #AB1133 50%, #FF3366 50% ) ;
        background:  linear-gradient( 130deg , rgb(206, 251, 205) 30%, rgba(209, 255, 159, 0.8) ), linear-gradient( 200deg , #27AD29 50%, #14F627 50% )
        }
        .wrap > .container{
        
        padding: 10px 5px 0px !important;

        }
        .footer{
            background: -webkit-gradient(linear, left top, left bottom, from(#2e2e2e), to(#424242));
        }
        a:not(.btn){
        color :#6ea547!important;  
        }

        a:not(.btn):hover{
        color :#86db4a !important;  
        }
        .footer p{
          color:  white!important;
        }
        .navbar-default {
          background-color: #2bc071 !important;
          border-color: #35e588 !important;
          -webkit-box-shadow: 0px 4px 14px -3px rgba(0,0,0,0.5);
          -moz-box-shadow: 0px 4px 14px -3px rgba(0,0,0,0.5);
          box-shadow: 0px 4px 14px -3px rgba(0,0,0,0.5);
        }
        .navbar-default .navbar-brand {
          color: #ffffff !important;
        }
        .navbar-default .navbar-brand:hover,
        .navbar-default .navbar-brand:focus {
          color: #065e37 !important;
        }
        .navbar-default .navbar-text {
          color: #ffffff !important;
        }
        .navbar-default .navbar-nav > li > a {
          color: #ffffff !important;
        }
        .navbar-default .navbar-nav > li > a:hover,
        .navbar-default .navbar-nav > li > a:focus {
          color: #065e37 !important;
        }
        .navbar-default .navbar-nav > li > .dropdown-menu {
          background-color: #2bc071 !important;
        }
        .navbar-default .navbar-nav > li > .dropdown-menu > li > a {
          color: #ffffff !important;
        }
        .navbar-default .navbar-nav > li > .dropdown-menu > li > a:hover,
        .navbar-default .navbar-nav > li > .dropdown-menu > li > a:focus {
          color: #065e37 !important;
          background-color: #35e588 !important;
        }
        .navbar-default .navbar-nav > li > .dropdown-menu > li > .divider {
          background-color: #35e588 !important;
        }
         .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
        .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
        .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
          color: #065e37 !important;
          background-color: #35e588 !important;
        }
        .navbar-default .navbar-nav > .active > a,
        .navbar-default .navbar-nav > .active > a:hover,
        .navbar-default .navbar-nav > .active > a:focus {
          color: #065e37 !important;
          background-color: #35e588 !important;
        }

        li.dropdown:hover{
          color: #065e37 !important;
          background-color: #35e588 !important;
        }
        .navbar-default .navbar-nav > .open > a,
        .navbar-default .navbar-nav > .open > a:hover,
        .navbar-default .navbar-nav > .open > a:focus {
          color: #065e37 !important;
          background-color: #35e588 !important;
        }
        .navbar-default .navbar-toggle {
          border-color: #35e588 !important;
        }
        .navbar-default .navbar-toggle:hover,
        .navbar-default .navbar-toggle:focus {
          background-color: #35e588 !important;
        }
        .navbar-default .navbar-toggle .icon-bar {
          background-color: #ffffff !important;
        }
        .navbar-default .navbar-collapse,
        .navbar-default .navbar-form {
          border-color: #ffffff !important;
        }
        .navbar-default .navbar-link {
          color: #ffffff !important;
        }
        .navbar-default .navbar-link:hover {
          color: #065e37 !important;
        }

        @media (max-width: 767px) {
          .navbar-default .navbar-nav .open .dropdown-menu > li > a {
          color: #ffffff !important;
          }
          .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
          .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
            color: #065e37 !important;
          }
          .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
          .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
          .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
          color: #065e37 !important;
          background-color: #35e588 !important;

          }
        }
        .pagination > .active > a{
          color: white!important;
          background-color: #449d44!important;
          border-color: #255625!important;
        }
        
        .navbar-default .btn-link {
        color: white;

        .navbar-default .btn-link:hover {
        color: #065e37;
        }

CSS;
$this->registerCss($ccs); ?> 

<?php $buton= Html::button('prueba', ['value'=>Url::to('http://localhost/salamanca/web/index.php/site/login'),'class'=> 'btn btn-success','id'=>'modalButton']);


$js = <<< JS
$(document).ready(function(){

 $("#modalButton").click(function(){
  
     $("#modal").modal('show')
             .find("#modalContent")
             .load($(this).attr('value'));
    });
});
JS;
$this->registerJs($js);

//echo $buton;

$this->beginPage();
$logo= Url::base()."/logo-small.png"; ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<!--<span class="glyphicon glyphicon-plus"> </span>-->
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl."/img"; ?>/otro2.png" type="png" />
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody();?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="'.$logo.'" style="margin-top: -5px"  class="pull-left">  Laboratorio Clinico ',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default',

        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [
            //['label' => '<span class="glyphicon glyphicon-home"></span> Home', 'url' => ['/site/index']],
            ['label' => Icon::show('medkit',['class'=>'fa-lg'], Icon::FA).'Tipo de Perfil',
                'items' => [
                 ['label' => 'Administrar', 'url' => ['/tipo-perfil/index']],
                 '<li class="divider"></li>',
                 ['label' => 'Crear', 'url' => ['/tipo-perfil/create']],
                ],
                'visible' =>  isset(Yii::$app->user->identity->id_rol) && (Yii::$app->user->identity->id_rol ==1 || Yii::$app->user->identity->id_rol ==4)
            ],
            ['label' => Icon::show('flask',['class'=>'fa-lg'], Icon::FA).'Perfiles',
                'items' => [
                 ['label' => 'Completados', 'url' => ['/perfil/index']],
                 ['label' => 'Anulados', 'url' => ['/perfil/indexanuladas']],
                 ['label' => 'Pendientes', 'url' => ['/perfil/indexpendientes']],
                 '<li class="divider"></li>',
                 ['label' => 'Crear', 'url' => ['/perfil/create']],
                 ['label' => 'Reporte', 'url' => ['/perfil/reporte']],                 
                ],
                'visible' =>  isset(Yii::$app->user->identity->id_rol) && (Yii::$app->user->identity->id_rol ==1 || Yii::$app->user->identity->id_rol ==2)
            ],            
            ['label' => Icon::show('heart',['class'=>'fa-lg'], Icon::FA).'Pacientes',
                'items' => [
                 ['label' => 'Administrar', 'url' => ['/paciente/index']],
                 '<li class="divider"></li>',
                 ['label' => 'Crear', 'url' => ['/paciente/create']],
                ],
                'visible' =>  isset(Yii::$app->user->identity->id_rol) && (Yii::$app->user->identity->id_rol ==1 || Yii::$app->user->identity->id_rol ==4)
            ],
            ['label' => '<span class="glyphicon glyphicon-king fa-lg"></span>  Roles',
                'items' => [
                 ['label' => 'Administrar', 'url' => ['/rol/index']],
                 '<li class="divider"></li>',
                 ['label' => 'Crear', 'url' => ['/rol/create']],
                 ],
                'visible' =>  (isset(Yii::$app->user->identity->id_rol) && Yii::$app->user->identity->id_rol <=1)

            ],

            ['label' => Icon::show('user', ['class'=>'fa-lg'], Icon::FA).'Usuarios',
                'items' => [
                 ['label' => 'Administrar', 'url' => ['/usuario/index']],
                 '<li class="divider"></li>',
                 ['label' => 'Crear', 'url' => ['/usuario/create']],
                ],
               'visible' =>  (isset(Yii::$app->user->identity->id_rol) && Yii::$app->user->identity->id_rol <=1)
            ],
           ['label' => 'Acerca', 'visible' =>  Yii::$app->user->isGuest , 'url' => ['/site/about'] ] , 
           ['label' => 'Contactanos', 'visible' =>  Yii::$app->user->isGuest , 'url' => ['/site/contact']],

            Yii::$app->user->isGuest ? (
                '<li>'
               . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
               . Html::Button(
                    (Icon::show('key',['class'=>'fa-lg'], Icon::FA).'Ingresar'),
                    ['class' => 'btn btn-link',
                    'id'=>'modalButton',
                    'value'=>Url::to('http://localhost/salamanca/web/index.php/site/login')]
                )
               . Html::endForm()
                . '</li>'
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    (Icon::show('lock',['class'=>'fa-lg'], Icon::FA).'Salir (' . Yii::$app->user->identity->user . ')'),
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    Modal::begin([
    'header'=>'<h2 align="center" >Ingresar</h2>',
    'id'=>'modal',
    'size'=>'modal-ls',
    ]);
    echo "<div id='modalContent'> </div>";
    Modal::end();
    ?>
  <style>
    .modal-content{
           
    }
  </style>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left"> Copyright <?php echo Icon::show('copyright', ['class'=>'fa-lg'], Icon::FA);?> Centro Médico Salamca C.A <?= date('Y') ?></p>
      
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
