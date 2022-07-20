<div class="page-header">
  <h1 class="title">INFORMES RESTO</h1>
  <ol class="breadcrumb">
    <li class="active">INFORME DE CAJAS SISTEMA DAT@RESTO</li>
  </ol>
</div>

<div class="container-widget">
  <div class="row">
    <div class="h-panel">
      <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#tabReporteDeCajas" data-toggle="tab" id="tab2">CAJAS</a></li>
        <li ><a href="#tabCajasPorUsuario" data-toggle="tab" id="tab1">CAJAS POR USUARIO</a></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade active in" id="tabReporteDeCajas">

          <div class="panel panel-default">
            <div class="panel-title">
              Reporte De Cajas
            </div>
            <div class="panel-body">
              <fieldset>
                <div class="col-md-4">
                  <div class="control-group">
                    <div class="controls">
                      <label>  SELECCIONE LA FECHA </label>
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
                      <label class="label1" for="cboCajero">USUARIOS   :
                        <div class="checkbox checkbox-success checkbox-inline">
                          <input type="checkbox" id="ckTodosLosCajeros" value="option1" checked>
                          <label for="ckTodosLosCajeros"> TODOS </label>
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
              <fieldset>
                <div class="col-md-12">
                  <div class="panel-body table-responsive">
                    <table id="tablaReporteDeCajas" class="table table-hover display" style="width:100%">
                      <thead>
                        <tr>
                          <th>Numero De Caja</th>
                          <th>Fecha Apertura</th>
                          <th>Total De Venta</th>
                          <th>Usuario</th>
                          <th>Turno</th>
                          <th>Detale Caja</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </fieldset>
            </div>
          </div>

        </div>
        <div class="tab-pane fade" id="tabCajasPorUsuario">

          <div class="panel panel-default">
            <div class="panel-title">
              Reporte De Cajas Por Usuario
            </div>
            <div class="panel-body">
              <fieldset>
                <div class="col-md-12">
                  <div class="panel-body table-responsive">
                    <table id="TablaCajasPorUsuario" class="table table-hover display" style="width:100%">
                      <thead>
                        <tr>
                          <th>USUARIO</th>
                          <th>TOTAL DE CAJAS</th>
                          <th>CAJAS</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </fieldset>
            </div>
          </div>

        </div>
      </div>
    </div>
</div>
