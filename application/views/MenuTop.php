<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/favicon/datamaule36x36.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>AridosPDV</title>

  <!-- ========== Css Files ========== -->
  <link href="<?php echo base_url()?>assets/css/root.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/miscss/cssdiego.css">

  </head>
  <body>
  <!-- Start Page Loading -->
  <div class="loading"><img src="<?php echo base_url()?>assets/img/loading.gif" alt="loading-img"></div>
  <!-- End Page Loading -->
 <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START TOP -->
  
<style type="text/css">
  
 table.dataTable thead{
   background-color: rgb(92, 92, 92);
   color: azure;
 }
 .page-link{
   color: black;
 }



</style>
  <div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
      <a class="logo">ARIDOS PDV</a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->

    <!-- Start Searchbox -->
    <form class="text">
      <div class="fs-1 text-white"></div>
    </form>
    <!-- End Searchbox -->


    <!-- Start Top Right -->
    <ul class="top-right">


    <li class="dropdown link">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="<?php echo base_url()?>assets/img/logo1.jpg" alt="img"><b><?php echo "Usuario : ".$nombreUsuario; ?></b><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <li><a href="<?php echo base_url()?>index.php/Login/logout_ci"><i class="fa falist fa-power-off"></i> Salir</a></li>
        </ul>
    </li>

    </ul>
    <!-- End Top Right -->

  </div>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// -->


<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START SIDEBAR -->
<div class="sidebar clearfix">

<ul class="sidebar-panel nav">
  <li class="sidetitle">MENU</li>
  <li><a href="index.html"><span class="icon color5"><i class="fa fa-home"></i></span>Dashboard</a></li>
  <li><a href="<?php echo base_url()?>index.php/GuiaDespacho"><span class="icon color7"><i class="fa fa-calculator"></i></span>Vales De Venta</a></li>
  <li><a href="<?php echo base_url()?>index.php/GuiaDespacho"><span class="icon color7"><i class="fa fa-shopping-cart"></i></span>Orden De Compra</a></li>
  <li><a href="<?php echo base_url()?>index.php/GuiaDespacho"><span class="icon color7"><i class="fa fa-credit-card"></i></span>Pago de Creditos</a></li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-file-text"></i></span>Consultas<span class="caret"></span></a>
    <ul>
                  <li><a href="<?php echo base_url()?>index.php/GuiaDespacho"><span class="icon color7"><i class="fa fa-credit-card"></i></span>Credito Actual Por Cliente</a></li>
      <li><a href="<?php echo base_url()?>index.php/GuiaDespacho"><span class="icon color7"><i class="fa fa-close"></i></span>Vales Anulados</a></li>
        <li><a href="<?php echo base_url()?>index.php/GuiaDespacho"><span class="icon color7"><i class="fa fa-check-square"></i></span>Vales Vigentes</a></li>
          <li><a href="<?php echo base_url()?>index.php/GuiaDespacho"><span class="icon color7"><i class="fa fa-dollar"></i></span>Ventas</a></li>
              <li><a href="<?php echo base_url()?>index.php/GuiaDespacho"><span class="icon color7"><i class="fa fa-users"></i></span>Ventas Por Cliente</a></li>
    </ul>
  </li>
  <li><a href="#"><span class="icon color7"><i class="fa fa-list-ul"></i></span>Mantenedores<span class="caret"></span></a>
    <ul>
      <li><a href="<?php echo base_url()?>index.php/Ciudad"><span class="icon color3"><i class="fa fa-map-marker"></i></span>Ciudad</a></li>
      <li><a href="<?php echo base_url()?>index.php/Cliente"><span class="icon color7"><i class="fa fa-users"></i></span>Clientes</a></li>
      <li><a href="<?php echo base_url()?>index.php/Comuna"><span class="icon color7"><i class="fa fa-map-marker"></i></span>Comunas</a></li>
  <!--    <li><a href="<?php echo base_url()?>index.php/Condicion_pago"><span class="icon color7"><i class="fa fa-cc-visa"></i></span>Condicion De Pago</a></li>-->
      <li><a href="<?php echo base_url()?>index.php/Familias"><span class="icon color7"><i class="fa fa-book"></i></span>Familias</a></li>
      <li><a href="<?php echo base_url()?>index.php/Forma_Pago"><span class="icon color7"><i class="fa fa-credit-card"></i></span>Formas De pago</a></li>
      <li><a href="<?php echo base_url()?>index.php/Impuestos"><span class="icon color7"><i class="fa fa-legal"></i></span>Impuestos</a></li>
      <li><a href="<?php echo base_url()?>index.php/productos"><span class="icon color7"><i class="fa fa-paypal"></i></span>Productos</a></li>
      <li><a href="<?php echo base_url()?>index.php/Tipo_Despacho"><span class="icon color7"><i class="fa fa-truck"></i></span>Tipo De Despacho</a></li>
      <li><a href="<?php echo base_url()?>index.php/Tipo_Documento"><span class="icon color7"><i class="fa fa-book"></i></span>Tipo De Documento</a></li>
      <li><a href="<?php echo base_url()?>index.php/Tipo_vehiculo"><span class="icon color7"><i class="fa fa-cab"></i></span>Tipo De Vehiculos</a></li>
      <li><a href="<?php echo base_url()?>index.php/Unidad_medida"><span class="icon color7"><i class="fa fa-magnet"></i></span>Unidad De Medida</a></li>
      <li><a href="<?php echo base_url()?>index.php/Vehiculo"><span class="icon color7"><i class="fa fa-automobile"></i></span>Vehiculos</a></li>
    </ul>
  </li>
  <li><a href="#"><span class="icon color9"><i class="fa fa-gears"></i></span>Configuracion<span class="caret"></span></a>
    <ul>
      <li><a href="<?php echo base_url()?>index.php/OrdenTrabajo"><span class="icon color7"><i class="fa fa-user"></i></span>Usuarios</a></li>
    </ul>
  </li>
</ul>
</div>
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// -->

<div class="sidebar-plan">
  <footer>
      <div class="row">
        <div class="col-md-8 text-center">
              Copyright © <a href="http://datamaule.cl" target="_blank">datamaule.cl</a>
        </div>
      </div>
</footer>
</div>




</div>
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// -->

 <!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START CONTENT -->
<div class="content">

<!-- Start Page Loading -->
<div id="load" class="loading"><img src="<?php  echo base_url()?>assets/img/loading.gif" alt="loading-img"></div>
<!-- End Page Loading -->
