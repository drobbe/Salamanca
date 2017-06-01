<?php

/* @var $this yii\web\View */
use kartik\icons\Icon;
Icon::map($this);
$this->title = 'Salamcana C.A';
$ccs = <<< CSS

    .jumbotron{
        padding: 0px !important;
         text-shadow: 0px 0px 2px rgba(0,0,0, 0.5) !important;
         color: #006633!important;
         margin-bottom : 0px!important;
    }
    address{
        
    }
    .img-responsive{
      box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.75);
      border-radius: 5px;
    }

CSS;
$this->registerCss($ccs);



?>
<div class="site-index">

    <div class="jumbotron">
        <h1> <?php Echo Icon::show('hospital-o')."Bienvenido";?></h1> 

        <p>Al Sistema de Pérfiles Clinicos del</p>
        <p> Centro Médico Salamcanca C.A.</p>
        

    </div>
<div class="container-fluid bg-3 text-center">    

  <h3>Nuestos Valores</h3><br>
  <div class="row">
    <div class="col-sm-3">
       <strong><p>Responsabilidad</p>
      <img src="http://localhost/salamanca/web/bionalista.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Compromiso</p>
      <img src="http://localhost/salamanca/web/medicos.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Ética y Moral</p>
      <img src="http://localhost/salamanca/web/paciente.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3">
      <p>Solidaridad</p></strong>
      <img src="http://localhost/salamanca/web/a.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
  </div>
</div><br>

<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-3">
      <strong><p>Servicio al Cliente</p>
      <img src="http://localhost/salamanca/web/cliente.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Excelencia</p>
      <img src="http://localhost/salamanca/web/enfermeras.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Innovación</p>
      <img src="http://localhost/salamanca/web/inovacion.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3">
      <p>Sensibilidad</p></strong>
      <img src="http://localhost/salamanca/web/sensibilidad.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
  </div>
</div><br><br><br><br>
<address>
    <img src="http://localhost/salamanca/web/logo.png" style="margin-top: -5px"  class="pull-right">
  <strong>Centro Médico Salamanca C.A<strong><br>
  Caracas, Bello Monte<br>
  Calle bolta<br>
  <abbr title="Telefono">Teléfono:</abbr> (0212) 251-4719
    <br>
  <a href="mailto:#">SalamcaLab@salamca.com.ve</a >

</address>

</div>

