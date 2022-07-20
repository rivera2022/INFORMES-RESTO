

<?php
  $fechaActual=date('d-m-Y');
?>

<!-- TITULO -->
<div class="page-header">
	<h1 class="title">Unidad de Medida</h1>
	<ol class="breadcrumb">
		<li class="active">Mantenedores</li>
		<li class="active">Unidad De Medida</li>
	</ol>
	<div class="right">

	</div>
</div>
<!-- FIN TITULO -->



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
               <button type="button" class="btn btn-default" id="btnNuevaUnidadMedida"><i class="fa fa-plus"></i>Nuevo</button>
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
        <table id="tablaUnidadMedida" class="display" style="width:100%">
         <thead>
           <tr>
            <th>ID</th>
            <th>NOMBRE UNIDAD DE MEDIDA</th>
            <th>NOMBRE CORTO</th>
            <th>VIGENTE</th>
            <th>FRACCIONABLE</th>
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
<div id="ModalUnidadMedida" class="modal fade" role="dialog" style="overflow-y: scroll;">
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
            <li class="active"><a href="#tabDatosUnidadMedida" data-toggle="tab" id="tab1">Unidad de medida</a></li>
          </ul>
          <div class="tab-pane fade active in" id="tabDatosUnidadMedida">
            <!-- CAMPOS DE REGISTRO  -->
            <fieldset>
              <div class="col-md-12 ">
                <label for="id_umedida">ID</label>
                <input type="number" disabled  class="form-control input-sm input-sm"   name="id_umedida" id="id_umedida" requerido="no" value="">
              </div>

            </fieldset>
            <fieldset>
              <div class="col-md-6 ">
                <label for="nombre_umedida">Nombre</label>
                <input type="text" class="form-control input-sm input-sm" onpaste="return false;" ondrop="return false;" autocomplete="off" onkeypress="return sololetras(event)" name="nombre_umedida" id="nombre_umedida" requerido="si" value="" placeholder="Nombre De unidad de medida"/>
              </div>
              <div class="col-md-6 ">
                <label for="nombre_corto">Nombre Corto</label>
                <input type="text" class="form-control input-sm input-sm" onpaste="return false;" ondrop="return false;" autocomplete="off" onkeypress="return sololetras(event)"   name="nombre_corto" id="nombre_corto" requerido="si" value="" placeholder="Nombre Corto"/>
              </div>
            </fieldset>
            <fieldset>
            <div class="col-md-6">
              <div class="btn-group" role="group" aria-label="...">
                <div class="checkbox checkbox-info">
                  <br>
                  <input id="ckvigente" type="checkbox">
                  <label for="ckvigente">
                    Vigente
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div  aria-label="...">
                <div class="checkbox checkbox-info ">
                  <br>
                  <input id="ckFracionable" type="checkbox">
                  <label for="ckFracionable">
                    Fraccionable
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
        <button type="button" class="btn btn-success" id="btnGrabarUnidadMedida"><i class="fa fa-check-square-o"></i>Grabar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i>Salir</button>
      </div>
      <!-- FIN BOTONES  -->
    </div>
  </div>
</div>
<!-- FIN  MODAL NUEVO REGISTRO  -->
