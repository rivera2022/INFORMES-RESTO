
<?php
  $fechaActual=date('d-m-Y');
?>

<!--  TITULO  -->
<div class="page-header">
   <h1 class="title">Comunas</h1>
     <ol class="breadcrumb">
       <li class="active">Mantenedores</li>
       <li class="active">Comunas</li>
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
                <button type="button" class="btn btn-default" id="btnNuevaComuna"><i class="fa fa-plus"></i>Nueva</button>
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
         <table id="tablaComunas" class="display" style="width:100%">
					<thead>
						<tr>
							<th class="text text-center">CODIGO</th>
							<th class="text text-center">NOMBRE COMUNA</th>
              <th class="text text-center">NOMBRE CIUDAD</th>
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
  <div id="modalComunas" class="modal fade" role="dialog" style="overflow-y: scroll;">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- TITULO  MODAL  -->
        <div id="tituloModalAgregados" class="modal-header color8-bg">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text text-center">Registro De Comunas
          </h4>
        </div>
        <!-- FIN TITULO  MODAL  -->

        <!-- CONTENIDO  MODAL  -->
        <div class="modal-body">
          <div class="h-panel">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#tabDatosComunas" data-toggle="tab" id="tab1">Comunas</a></li>
            </ul>
            <div class="tab-pane fade active in" id="tabDatosComunas">
              <!-- CAMPOS DE REGISTRO  -->
              <fieldset>
                <div class="col-md-6 ">
                  <label for="idComuna">ID</label>
                  <input type="number" disabled  class="form-control input-sm input-sm"   name="idComuna" id="idComuna" requerido="no" value="">
                </div>
              </fieldset>
              <fieldset>
                <div class="col-md-9 ">
                  <label for="TxtNombreComuna">Nombre De La Comuna</label>
                  <input onpaste="return false;" ondrop="return false;" autocomplete="off" onkeypress="return sololetras(event)" type="text" class="form-control input-sm input-sm"   name="TxtNombreComuna" id="TxtNombreComuna" requerido="si" value="" placeholder="Nombre De La Comuna">
                </div>
                <div class="col-md-3">
                  <label for="CboCiudad">Ciudad</label>
                  <select  id="CboCiudad"  nombre="CboCiudad"  class="form-control input-sm"  requerido="si"><option value="">--Seleccione--</option></select>
                </div>
              </fieldset>
              <!-- FIN CAMPOS DE REGISTRO  -->
            </div>
          </div>
        </div>
        <!-- CONTENIDO  MODAL  -->

        <!-- BOTONES  -->
        <div class="modal-footer">
          <button type="button" class="btn btn-info" onclick="grabarComunas()" id="GrabarComuna"><i class="fa fa-check-square-o"></i>Grabar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i>Salir</button>
        </div>
        <!-- FIN BOTONES  -->
      </div>
    </div>
  </div>
  <!-- FIN  MODAL NUEVO REGISTRO  -->
