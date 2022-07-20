<!DOCTYPE html>


<html lang="en">
  <head>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/favicon/datamaule36x36.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />


  <link href="<?php echo base_url() ?>assets/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/micss/cssdiego.css">




	<!-- <link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">-->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">
	<title>datamaule.cl</title>




  <!-- ========== Css Files ========== -->
  <link href="<?php echo base_url()?>assets/css/root.css" rel="stylesheet">

<style type="text/css">
  footer {

    position: absolute;
    bottom: 0;
    width: 100%;
    height: 40px;
    color: white;
  }
  .buttonload {
    background-color: #04AA6D; /* Green background */
    border: none; /* Remove borders */
    color: white; /* White text */
    padding: 12px 24px; /* Some padding */
    font-size: 16px; /* Set a font-size */
  }

  /* Add a right margin to each icon */
  .fa {
    margin-left: -12px;
    margin-right: 8px;
  }


  .col-md-6-t {
     height: 295px;
     overflow-y: scroll;
     padding: 0px 0px;
     width:100%;
 }

 #dsTable {
     padding: 0px 0px;
 }

 table {
     width:100%;
 }




 textarea:focus,
 input[type="text"]:focus,
 input[type="password"]:focus,
 input[type="datetime"]:focus,
 input[type="datetime-local"]:focus,
 input[type="date"]:focus,
 input[type="month"]:focus,
 input[type="time"]:focus,
 input[type="week"]:focus,
 input[type="number"]:focus,
 input[type="email"]:focus,
 input[type="url"]:focus,
 input[type="search"]:focus,
 input[type="tel"]:focus,
 input[type="color"]:focus,
 input[type="select"]:focus,
 .uneditable-input:focus {
   border-color: rgba(126, 239, 104, 0.8);
   box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);
   outline: 0 none;
   background-color : #E4F8C1;
 }
</style>


  </head>
  <body>
 <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START TOP -->
  <div id="top" class="clearfix">
    <!-- Start App Logo -->
    <div class="applogo">
      <a href="<?php echo base_url()?>index.php/Dashboard" class="logo f-size-6">DATAMAULE</a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->

    <!-- Start Top Right -->
    <ul class="top-right">
    <li class="dropdown link">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="<?php echo base_url()?>assets/img/logoUser.png" alt="img"><b>usuario</b><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <li><a href="<?php echo base_url()?>index.php/Login"><i class="fa falist fa-power-off"></i> Cerrar Sesión</a></li>
        </ul>
    </li>
    </ul>
    <!-- End Top Right -->
  </div>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// -->


<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START SIDEBAR -->
<div  class="sidebar clearfix">
  <ul class="sidebar-panel nav">
    <li class="sidetitle">MENU</li>
    <li><a href="<?php echo base_url()?>index.php/Dashboard"><span class="icon color5"><i class="fa fa-home"></i></span>INICIO</a></li>
    <li><a href="#"><span class="icon color7"><i class="fa fa-file-text"></i></span>INFORMES DE VENTAS<span class="caret"></span></a>
      <ul>
        <li><a  href="<?php echo base_url()?>index.php/Ventas"><span class="icon color7"><i class="fa fa-dollar"></i></span>Ventas</a></li>
        <li><a href="<?php echo base_url()?>index.php/VentasPorMesas"><span class="icon color7"><i class="fa fa-dollar"></i></span>Ventas Por Mesas</a></li>
        <li><a href="<?php echo base_url()?>index.php/VentasDelivery"><span class="icon color7"><i class="fa fa-dollar"></i></span>Ventas Delivery</a></li>
        <li><a href="<?php echo base_url()?>index.php/VentasRetiroLocal"><span class="icon color7"><i class="fa fa-dollar"></i></span>Ventas Retiro En Local</a></li>
  <!--      <li><a href="<?php echo base_url()?>index.php/VentasFamilia"><span class="icon color7"><i class="fa fa-dollar"></i></span>Ventas Por Familias</a></li> -->
        <li><a href="<?php echo base_url()?>index.php/VentasPorGarzon"><span class="icon color7"><i class="fa fa-dollar"></i></span>Ventas Por Garzon</a></li>
      </ul>
    </li>
    <li><a href="#"><span class="icon color14"><i class="fa fa-circle"></i></span>FAMILIAS<span class="caret"></span></a>
      <ul>
        <li><a href="<?php echo base_url()?>index.php/Familias"><span class="icon color7"><i class="fa fa-check-square-o"></i></span>Familias</a></li>
        <!--<li><a href="invoice.html"><span class="icon color7"><i class="fa fa-paypal"></i></span>Productos Por Familias</a></li>-->
      </ul>
    </li>
    <li><a href="#"><span class="icon color14"><i class="fa fa-calculator"></i></span>CAJAS<span class="caret"></span></a>
      <ul>
        <li><a href="<?php echo base_url()?>index.php/ReporteCajas"><span class="icon color7"><i class="fa fa-file"></i></span>Reportes De Cajas</a></li>
      </ul>
    </li>
    <li><a href="#"><span class="icon color14"><i class="fa fa-users"></i></span>VENDEDORES<span class="caret"></span></a>
      <ul>
        <li><a href="<?php echo base_url()?>index.php/Vendedores"><span class="icon color7"><i class="fa fa-male"></i></span>Vendedores</a></li>
      </ul>
    </li>
  </ul>

  <div class="sidebar-plan">
    <footer>
      <div class="row footer">
        <div class="col-md-12 text-center">
          Copyright © 2021 <a href="http://datamaule.cl" target="_blank">datamaule.cl</a>
        </div>
      </div>
    </footer>
  </div>
</div>
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// -->


<!-- START CONTENT -->
<div class="content">

<!-- Start Page Loading -->
<div id="load" class="loading"><img src="<?php  echo base_url()?>assets/img/loading.gif" alt="loading-img"></div>
<!-- End Page Loading -->
