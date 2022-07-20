<div class="page-header">
  <h1 class="title">INFORMES RESTO</h1>
  <ol class="breadcrumb">
    <li class="active">INFORME VENTAS SISTEMA DAT@RESTO</li>
  </ol>
</div>

<div class="container-padding">
    <!-- Start Row -->
    <div class="row">
      <div class="col-md-9">
        <div class="panel panel-default">
              <div class="panel-body">

                <fieldset>
                  <div class="col-md-4">
                    <div class="control-group">
                      <div class="controls">
                        <label>  Seleccione la fecha </label>
                        <div class="input-prepend input-group">
                          <span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
                          <input type="text" id="date-range-picker" class="form-control" value="26-05-2022 - 26-05-2022" />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="control-group">
                      <div class="controls">
                        <label class="label1" for="cboCajero">DOCUMENTO DE VENTA   :
                          <div class="checkbox checkbox-success checkbox-inline">
                              <input type="checkbox" id="ckTodosLosCajeros" value="option1" checked>
                              <label for="ckTodosLosCajeros"> Todos </label>
                          </div>
                        </label>
                        <select class="js-example-basic-single" name="cboCajero" id="cboCajero" style="width: 100%;">
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="control-group">
                      <div class="controls">
                        <label class="label1" for="cboCajero">CLIENTE   :
                          <div class="checkbox checkbox-success checkbox-inline">
                              <input type="checkbox" id="ckTodosLosCajeros" value="option1" checked>
                              <label for="ckTodosLosCajeros"> Todos </label>
                          </div>
                        </label>
                        <select class="js-example-basic-single" name="cboCajero" id="cboCajero" style="width: 100%;">
                        </select>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="col-md-4">
                    <div class="control-group">
                      <div class="controls">
                        <label class="label1" for="cboCajero">USUARIO   :
                          <div class="checkbox checkbox-success checkbox-inline">
                              <input type="checkbox" id="ckTodosLosCajeros" value="option1" checked>
                              <label for="ckTodosLosCajeros"> Todos </label>
                          </div>
                        </label>
                        <select class="js-example-basic-single" name="cboCajero" id="cboCajero" style="width: 100%;">
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="control-group">
                      <div class="controls">
                        <label class="label1" for="cboCajero">TURNO   :
                          <div class="checkbox checkbox-success checkbox-inline">
                              <input type="checkbox" id="ckTodosLosCajeros" value="option1" checked>
                              <label for="ckTodosLosCajeros"> Todos </label>
                          </div>
                        </label>
                        <select class="js-example-basic-single" name="cboCajero" id="cboCajero" style="width: 100%;">
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1">

                    <br>
                    <button id="btnConsultar" type="button" class="btn btn-default btn-icon"><i class="fa fa-check"></i>Consultar</button>
                  </div>
                </fieldset>



              </div>

        </div>

      </div>



      <div class="col-md-3">
        <div class="panel panel-default">
          <div class="panel-body">
            <label>  TOTAL VENTAS $ </label>
            <input class="text-right form-control input-sm input-sm" type="text" name="totalVentas" disabled id="totalVentas"  value="">
          </div>
        </div>
      </div>

    </div>
    <!-- End Row -->




   <div class="row">
     <div class="col-md-12">
       <div class="panel panel-default">
         <div class="panel-title">
         </div>
         <div class="panel-body table-responsive">
         <table id="resumenCajas" class="display" style="width:100%">
					<thead>
						<tr>
							<th>N° VENTA</th>
              <th>FECHA VENTA</th>
              <th>CLIENTE</th>
              <th>LISTA DE PRECIOS</th>
              <th>DOCUMENTO</th>
              <th>FOLIO</th>
              <th>PRECIO NETO</th>
              <th>IVA</th>
              <th>TOTAL DE LA VENTA</th>
              <th>DETALLE DE LA VENTA</th>




						</tr>
					</thead>
          <tbody id="detalleCajas">
          </tbody>
				</table>
         </div>

       </div>
     </div>
   </div>
 </div>
</div>
<!-- END CONTAINER -->
 <!-- /////////////////////////////////////////
