<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/favicon/datamaule36x36.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>datamaule.cl</title>

  <!-- ========== Css Files ========== -->
  <link href="assets/css/root.css" rel="stylesheet">
  <style type="text/css">
    body {
        background: url("<?php echo base_url()?>assets/img/fondoLogin2.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
  </style>
  </head>
  <body style="background-color: #f5f5f5;">

    <div class="login-form">
<!--      <form action="index.html">-->
<?php echo form_open('Login/new_user','id="loginForm"','class="form-signin", autocomplete="off"'); ?>
        <div class="top">
          <img src="assets/img/datamaule.jpg" alt="icon" class="icon">
          <h1>INFORMES RESTO</h1>
          <h4>Inicio De Sesion</h4>
        </div>
        <div class="form-area">
          <div class="group">
            <input type="text" class="form-control text-center" placeholder="Nombre De Usuario" name="username" autocomplete="false"  value="" onfocus="if($(this).val() == 'Email') $(this).attr({value:''});" onblur="if($(this).val() == '') $(this).attr({value:''});"/ >
            <i class="fa fa-user"></i>
          </div>
          <div class="group">
            <input type="password" class="form-control text-center" placeholder="Contraseña" name="password" autocomplete="false" value="" onfocus="if($(this).val() == 'Password') $(this).attr({value:''});" onblur="if($(this).val() == '') $(this).attr({value:''});"/>
            <i class="fa fa-key"></i>
          </div>

          <?php
               if($this->session->flashdata('usuario_incorrecto')) {
                   $message = $this->session->flashdata('usuario_incorrecto');
                   ?>
                   <div class="error" style="color:red; font-weight:bold"><?php echo $message; ?>

                   </div>
                   <?php
               }
            ?>

          <button type="submit" class="btn btn-success btn-block">INGRESAR</button>
        </div>
    <!--  </form>-->
    <?php echo form_close(); ?>

</body>
</html>
