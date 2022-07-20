<?php
  $fechaActual=date('d-m-Y');
?>

<!--  TITULO  -->
<div class="page-header">
   <h1 class="title">Condicion de pago</h1>
     <ol class="breadcrumb">
       <li><a href="#">Mantención</a></li>
       <li class="active">Condicion de pago</li>
     </ol>
   <div class="right">
 </div>
</div>
<!--  FIN TITULO  -->




<!--  BTN NUEVO REGISTRO  -->
<div class="container-padding">
 <div class="row">
   <div class="col-md-12">
     <div class="panel panel-white">
       <fieldset>
         <div class="col-sm-8 col-md-10 col-lg-10 ">
         </div>
         <div class="col-sm-2 col-lg-2 col-md-2">
           <div class="right">
             <div class="btn-group" role="group" aria-label="...">
               <button type="button" class="btn btn-default" id="btnNuevaCondicionPago"><i class="fa fa-plus"></i>Nuevo</button>
             </div>
         </div>
       </div>
       </fieldset>
     </div>
   </div>
 </div>
</div>
<!-- FIN BTN NUEVO REGISTRO  -->

<!--  TABLA CONTENIDO  -->
<div class="container-padding">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title panel-primary">
        </div>
        <div class="panel-body table-responsive">
        <table id="tablaCondicionPago" class="display" style="width:100%">
         <thead>
           <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>VIGENTE</th>
           </tr>
         </thead>
       </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- FIN  TABLA CONTENIDO  -->


<!--  MODAL NUEVO REGISTRO  -->
<div id="ModalCondicionPago" class="modal fade" role="dialog" style="overflow-y: scroll;">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- TITULO  MODAL  -->
      <div id="tituloModalAgregados" class="modal-header modal-warning">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nuevo Registro
        </h4>
      </div>
      <!-- FIN TITULO  MODAL  -->

      <!-- CONTENIDO  MODAL  -->
      <div class="modal-body">
        <div class="h-panel">
          <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#tabDatosCondicionPago" data-toggle="tab" id="tab1">Condicion de Pago</a></li>
          </ul>
          <div class="tab-pane fade active in" id="tabDatosCondicionPago">
            <!-- CAMPOS DE REGISTRO  -->
            <fieldset>
              <div class="col-md-12 ">
                <label for="id_condicion_pago">ID</label>
                <input type="number" disabled  class="form-control input-sm input-sm"   name="id_condicion_pago" id="id_condicion_pago" requerido="no" value="">
              </div>

            </fieldset>
            <fieldset>
              <div class="col-md-12 ">
                <label for="nombre_condicion_pago">Nombre</label>
                <input type="text" class="form-control input-sm input-sm"   name="nombre_condicion_pago" id="nombre_condicion_pago" requerido="si" value="" placeholder="Nombre condicion de pago"/>
              </div>
            </fieldset>
            <fieldset>
            <div class="col-md-12">
              <div class="btn-group" role="group" aria-label="...">
                <div class="checkbox checkbox-primary checkbox-circle">
                  <br>
                  <input id="ckvigente" type="checkbox">
                  <label for="ckvigente">
                    Vigente
                  </label>
                </div>
              </div>
            </div>
              <fieldset>
            <!-- FIN CAMPOS DE REGISTRO  -->
          </div>
        </div>
      </div>
      <!-- CONTENIDO  MODAL  -->

      <!-- BOTONES  -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnGrabarCondicionPago"><i class="fa fa-check-square-o"></i>Grabar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i>Salir</button>
      </div>
      <!-- FIN BOTONES  -->
    </div>
  </div>
</div>
<!-- FIN  MODAL NUEVO REGISTRO  -->
