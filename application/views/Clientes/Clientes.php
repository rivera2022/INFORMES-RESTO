
<?php
  $fechaActual=date('d-m-Y');
?>

<!--  TITULO  -->
<div class="page-header">
   <h1 class="title">Clientes</h1>
     <ol class="breadcrumb">
       <li class="active">Mantenedores</li>
       <li class="active">Clientes</li>
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
                <button type="button" class="btn btn-default" id="btnNuevoCliente"><i class="fa fa-plus"></i>Nuevo</button>
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
         <table id="tablaClientes" class="display" style="width:100%">
					<thead>
						<tr>
							<th class="text text-center">CODIGO</th>
              <th class="text text-center">RUT CLIENTE</th>
              <th class="text text-center">DV</th>
              <th class="text text-center">NOMBRE CLIENTE</th>
							<th class="text text-center">RAZON SOCIAL</th>
              <th class="text text-center">NOMBRE FANTASIA</th>
              <th class="text text-center">GIRO</th>
              <th class="text text-center">DIRECCION</th>
              <th class="text text-center">COMUNA</th>
              <th class="text text-center">CIUDAD</th>
              <th class="text text-center">CORREO</th>
              <th class="text text-center">TELEFONO CLIENTE</th>
              <th class="text text-center">VIGENTE</th>
              <th class="text text-center">ES EMPRESA</th>
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
 <div id="modalClientes" class="modal fade" role="dialog" style="overflow-y: scroll;">
   <div class="modal-dialog">
     <div class="modal-content">
       <!-- TITULO  MODAL  -->
       <div id="tituloModalAgregados" class="modal-header color8-bg">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title text text-center">Registro De Clientes
         </h4>
       </div>
       <!-- FIN TITULO  MODAL  -->

       <!-- CONTENIDO  MODAL  -->
       <div class="modal-body">
         <div class="h-panel">
           <ul id="myTab" class="nav nav-tabs">
             <li class="active"><a href="#tabDatosClientes" data-toggle="tab" id="tab1">Clientes</a></li>
           </ul>
           <div class="tab-pane fade active in" id="tabDatosClientes">
             <!-- CAMPOS DE REGISTRO  -->
             <fieldset>
               <div class="col-md-6 ">
                 <label for="idCliente">ID</label>
                 <input type="number" disabled  class="form-control input-sm input-sm"   name="idCliente" id="idCliente" requerido="no" value="">
               </div>
             </fieldset>
             <fieldset>
               <div class="col-md-6" >
                 <label for="txtRut">Rut</label>
                 <input onpaste="return false;" ondrop="return false;" autocomplete="off" onkeypress="return soloNumerosRut(event)" type="number" maxlength="10" class="form-control input-sm input-sm"   name="txtRut" id="txtRut" requerido="si" value="">
               </div>

               <div class="col-md-2 offset-md-4">
                 <label for="txtDV">Dv</label>
                 <input onpaste="return false;" ondrop="return false;" autocomplete="off"  type="text" maxlength="1" class="form-control input-sm input-sm"   name="txtDV" id="txtDV" requerido="si" value="">
               </div>
             </fieldset>
             <fieldset>
               <div class="col-md-12 ">
                 <label for="txtNombreCliente">Nombre Cliente</label>
                 <input onpaste="return false;" ondrop="return false;" autocomplete="off"  onkeypress="return sololetras(event)" type="text" class="form-control input-sm input-sm"   name="txtNombreCliente" id="txtNombreCliente" requerido="si" value="" placeholder="Nombre Cliente"/>
               </div>
             </fieldset>
             <fieldset>
               <div class="col-md-12 ">
                 <label for="TxtRazonSocial">Razon Social</label>
                 <input onpaste="return false;" ondrop="return false;" autocomplete="off"  onkeypress="return sololetras(event)" type="text" class="form-control input-sm input-sm"   name="TxtRazonSocial" id="TxtRazonSocial" requerido="si" value="" placeholder="Razon Social"/>
               </div>
             </fieldset>
             <fieldset>
               <div class="col-md-12 ">
                 <label for="TxtNombreFantasia">Nombre De Fantasia</label>
                 <input onpaste="return false;" ondrop="return false;" autocomplete="off"  onkeypress="return sololetras(event)" type="text" class="form-control input-sm input-sm"   name="TxtNombreFantasia" id="TxtNombreFantasia" requerido="si" value="" placeholder="Nombre De Fantasia"/>
               </div>
             </fieldset>
             <fieldset>
               <div class="col-md-12 ">
                 <label for="TxtGiroCliente">Giro Del Cliente</label>
                 <input onpaste="return false;" ondrop="return false;" autocomplete="off"  onkeypress="return sololetras(event)" type="text" class="form-control input-sm input-sm"   name="TxtGiroCliente" id="TxtGiroCliente" requerido="si" value="" placeholder="Nombre De Fantasia"/>
               </div>
             </fieldset>
             <fieldset>
               <div class="col-md-6 ">
                 <label for="TxtDireccion">Direccion</label>
                 <input onpaste="return false;" ondrop="return false;" autocomplete="off"  type="text" class="form-control input-sm input-sm"   name="TxtDireccion" id="TxtDireccion" requerido="si" value="" placeholder="Direccion Del Cliente"/>
               </div>
               <div class="col-md-3">
                 <label for="CboCiudad">Ciudad</label>
                 <select  id="CboCiudad"  nombre="CboCiudad" style="width:100%;"  class="form-control input-sm"  requerido="no"><option value="">--Seleccione--</option></select>
               </div>
               <div class="col-md-3">
                 <label for="CboComuna">Comuna</label>
                 <select style="width:100%;"  id="CboComuna"  nombre="CboComuna" class="form-control input-sm"  requerido="no"><option value="">--Seleccione--</option></select>
               </div>
             </fieldset>
             <fieldset>
               <div class="col-md-6 ">
                 <label for="TxtTelefono">Telefono</label>
                 <input onpaste="return false;" ondrop="return false;" autocomplete="off"  type="number" maxlength="9" class="form-control input-sm input-sm"   name="TxtTelefono" id="TxtTelefono" requerido="si" value="" placeholder="Telefono Del Cliente"/>
               </div>
               <div class="col-md-6 ">
                 <label for="TxtCorreoElectronico">Correo Electronico</label>
                 <input onpaste="return false;" ondrop="return false;" autocomplete="off"  type="text" class="form-control input-sm input-sm"   name="TxtCorreoElectronico" id="TxtCorreoElectronico" requerido="si" value="" placeholder="Correo Electronico Del Cliente"/>
               </div>
             </fieldset>
             <fieldset>
               <div class="col-md-4">
                  <label for="CboCondicionDeVenta">Condicion De Venta</label>
                  <select  id="CboCondicionDeVenta"  nombre="CboCondicionDeVenta"  class="form-control input-sm"  requerido="no"><option value="">--Seleccione--</option></select>
                </div>
                <br>
                <div class="col-md-4">
                  <div class="checkbox checkbox-info">
                    <input id="ckEsEmpresa" type="checkbox" value="option" >
                    <label for="ckEsEmpresa">
                      Es Empresa
                    </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="checkbox checkbox-info">
                    <input id="ckVigente" type="checkbox" value="option" >
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
         <button type="button" class="btn btn-info" onclick="grabarCliente()" id="GrabarCliente"><i class="fa fa-check-square-o"></i>Grabar</button>
         <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i>Salir</button>
       </div>
       <!-- FIN BOTONES  -->
     </div>
   </div>
 </div>
 <!-- FIN  MODAL NUEVO REGISTRO  -->
