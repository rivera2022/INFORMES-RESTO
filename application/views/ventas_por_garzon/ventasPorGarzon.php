<div class="page-header">
  <h1 class="title">INFORMES RESTO</h1>
  <ol class="breadcrumb">
    <li class="active">INFORME VENTAS POR GARZON SISTEMA DAT@RESTO</li>
  </ol>
</div>


<div class="container-widget">
  <div class="row">
    <div class="h-panel"><!--Tabs para los formularios-->
      <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#tabVentasRealizadasPorGarzonesVigentes" data-toggle="tab" id="tab2">Reporte De Ventas Realizadas Por Garzon</a></li>
        <li ><a href="#tabVentasRealizadasPorGarzonesNoVigentes" data-toggle="tab" id="tab1">Reporte De Ventas Realizadas Por Garzones Desvinculados</a></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade active in" id="tabVentasRealizadasPorGarzonesVigentes">
          <!--<form id="basic-form">-->
          <div class="panel panel-default">
            <div class="panel-title">
              Reporte De Ventas
            </div>
            <div class="panel-body">
              <fieldset>
                <div class="col-md-12">
                  <div class="panel-body table-responsive">
                    <table id="tableVentasPorGarzon" class="table table-hover display" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text text-center text-dark">Garzon</th>
                          <th class="text text-center text-dark">Cantidad De Ventas Realizadas</th>
                          <th class="text text-center text-dark">$ Total de Ventas Realizadas</th>
                          <th class="text text-center text-dark">$ Propinas</th>
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
          <!--  </form>-->
        </div>  <!-- end tabMensualidad-->
        <div class="tab-pane fade" id="tabVentasRealizadasPorGarzonesNoVigentes">
          <!--<form id="basic-form">-->
          <div class="panel panel-default">
            <div class="panel-title">
              Reporte De Ventas
            </div>
            <div class="panel-body">
              <fieldset>
                <div class="col-md-12">
                  <div class="panel-body table-responsive">
                    <table id="TablaVentasPorGarzonNoVigentes" class="table table-hover display" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text text-center text-dark">Garzon</th>
                          <th class="text text-center text-dark">Cantidad De Ventas Realizadas</th>
                          <th class="text text-center text-dark">$ Total de Ventas Realizadas</th>
                          <th class="text text-center text-dark">$ Propinas</th>
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
          <!--  </form>-->
        </div>
      </div>
    </div><!-- end h-panel -->
  </div><!-- end row-->
</div><!-- end container-widget-->
