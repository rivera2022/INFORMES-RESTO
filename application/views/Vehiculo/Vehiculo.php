
<?php
  $fechaActual=date('d-m-Y');
?>

<!--  TITULO  -->
<div class="page-header">
   <h1 class="title">Vehiculos</h1>
     <ol class="breadcrumb">
       <li class="active">Mantenedores</li>
       <li class="active">Vehiculos</li>
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
                <button type="button" class="btn btn-default" id="btnNuevoVehiculo" onclick="crearNuevo()"><i class="fa fa-plus"></i>Nuevo</button>
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
         <table id="tablaVehiculos" class="display" style="width:100%">
					<thead>
            <tr>
              <th class="text text-center">CODIGO</th>
              <th class="text text-center">TIPO VEHICULO</th>
              <th class="text text-center">PATENTE VEHICULO</th>
              <th class="text text-center">CAPACIDAD VEHICULO</th>
              <th class="text text-center">VIGENTE</th>
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
 <div id="modalVehiculo" class="modal fade" role="dialog" style="overflow-y: scroll;">
   <div class="modal-dialog">
     <div class="modal-content">
       <!-- TITULO  MODAL  -->
       <div id="tituloModalAgregados" class="modal-header color8-bg">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title text text-center">Registro De Vehiculos
         </h4>
       </div>
       <!-- FIN TITULO  MODAL  -->

       <!-- CONTENIDO  MODAL  -->
       <div class="modal-body">
         <div class="h-panel">
           <ul id="myTab" class="nav nav-tabs">
             <li class="active"><a href="#tabDatosVehiculos" data-toggle="tab" id="tab1">Vehiculos</a></li>
           </ul>
           <div class="tab-pane fade active in" id="tabDatosVehiculos">
             <!-- CAMPOS DE REGISTRO  -->
             <fieldset>
               <div class="col-md-6 ">
                 <label for="idVehiculo">ID</label>
                 <input type="number" disabled  class="form-control input-sm input-sm"   name="idVehiculo" id="idVehiculo" requerido="no" value="">
               </div>
               <br>
             </fieldset>
             <fieldset>
               <div class="col-md-4">
                  <label for="CboTipoVehiculo">Tipo De Vehiculo</label>
                  <select style="width:100%;"  id="CboTipoVehiculo"  nombre="CboTipoVehiculo"  class="form-control input-sm"  requerido="no"><option value="">--Seleccione--</option></select>
                </div>
               <div class="col-md-4 ">
                 <label for="TxtPatenteVehiculo">Patente Vehiculo</label>
                 <input onpaste="return false;" ondrop="return false;" autocomplete="off" type="text" maxlength="6" class="form-control input-sm input-sm"   name="TxtPatenteVehiculo" id="TxtPatenteVehiculo" requerido="si" value="" placeholder="Patente Vehiculo">
               </div>
               <div class="col-md-4 ">
                 <label for="TxtCapacidadVehiculo">Capacidad Vehiculo</label>
                 <input onpaste="return false;" ondrop="return false;" autocomplete="off" type="number" min="0" class="text-right form-control input-sm" name="TxtCapacidadVehiculo"  id="TxtCapacidadVehiculo" requerido="no" value="">
               </div>
             </fieldset>
             <fieldset>
                <div class="col-md-6">
                  <div class="checkbox checkbox-info">
                    <input id="ckVigente" type="checkbox" >
                    <label for="ckVigente">
                      Vigente
                    </label>
                  </div>
                </div>
              </fieldset>
             <!-- FIN CAMPOS DE REGISTRO  -->
           </div>
         </div>
       </div>
       <!-- CONTENIDO  MODAL  -->

       <!-- BOTONES  -->
       <div class="modal-footer">
         <button type="button" class="btn btn-info" onclick="GrabarVehiculo()"  id="GrabarVehiculo"><i class="fa fa-check-square-o"></i>Grabar</button>
         <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i>Salir</button>
       </div>
       <!-- FIN BOTONES  -->
     </div>
   </div>
 </div>
 <!-- FIN  MODAL NUEVO REGISTRO  -->
