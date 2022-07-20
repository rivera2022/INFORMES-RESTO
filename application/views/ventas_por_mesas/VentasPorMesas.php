<div class="page-header">
  <h1 class="title">INFORMES RESTO</h1>
  <ol class="breadcrumb">
    <li class="active">INFORME VENTAS POR MESAS SISTEMA DAT@RESTO</li>
  </ol>
</div>

<div class="container-widget">
  <div class="row">
    <div class="h-panel">
      <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#tabVentasRealizadasEnMesas" data-toggle="tab" id="tab1">Detalle De Ventas En Mesas</a></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade active in" id="tabVentasRealizadasEnMesas">
          <div class="panel panel-default">
            <div class="panel-title">
              Reporte De Ventas Por Mesas
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
                      <label class="label1" for="cboCajero">MESA :
                        <div class="checkbox checkbox-success checkbox-inline">
                          <input type="checkbox" id="ckTodosLosCajeros" value="option1" checked>
                          <label for="ckTodosLosCajeros"> TODAS </label>
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
              <br>
              <fieldset>
                <div class="col-md-12">
                  <div class="panel-body table-responsive">
                    <table id="tableVentasPorGarzon" class="table table-hover display" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text text-center text-dark">MESA</th>
                          <th class="text text-center text-dark">DOCUMENTO</th>
                          <th class="text text-center text-dark">FOLIO</th>
                          <th class="text text-center text-dark">NOMBRE CLIENTE</th>
                          <th class="text text-center text-dark">FECHA</th>
                          <th class="text text-center text-dark">SUBTOTAL</th>
                          <th class="text text-center text-dark">DESCUENTO</th>
                          <th class="text text-center text-dark">TOTAL</th>
                          <th class="text text-center text-dark">GARZON</th>
                          <th class="text text-center text-dark">PROPINA</th>
                          <th class="text text-center text-dark">NUMERO CAJA</th>
<!--
                          <th class="text text-center text-dark">MESA</th>
                          <th class="text text-center text-dark">Cantidad De Ventas Realizadas</th>
                          <th class="text text-center text-dark">$ Total de Ventas</th>
                          <th class="text text-center text-dark">$ Propinas</th>-->
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


  <!--        <div class="tab-pane fade" id="tabProductosPorFamilias">
            <div class="panel panel-default">
              <div class="panel-title">
                Productos Por Familias
              </div>
              <div class="panel-body">
                <fieldset>
                  <div class="col-md-12">
                    <div class="panel-body table-responsive">
                      <table id="TablaProductosPorFamilias" class="table table-hover display" style="width:100%">
                        <thead>
                          <tr>
                            <th class="text text-center text-dark">Nombre Familia</th>
                            <th class="text text-center text-dark">Cantidad De Productos</th>
                            <th class="text text-center text-dark">Productos</th>
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

          </div>-->
        </div>
      </div>
    </div>
  </div>
