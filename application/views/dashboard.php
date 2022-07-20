<div class="page-header">
  <h1 class="title">INFORMES RESTO</h1>
  <ol class="breadcrumb">
    <li class="active">INFORMES SISTEMA DAT@RESTO</li>
  </ol>
</div>

<div class="container-widget">
  <div class="row">
    <div class="h-panel"><!--Tabs para los formularios-->
      <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#reporteMesActual" data-toggle="tab" id="tab2">Reporte Mes Actual</a></li>
        <li ><a href="#tabreporteCaja" data-toggle="tab" id="tab1">Reporte De Cajas</a></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade active in" id="reporteMesActual">
          <div class="panel panel-default">
            <div class="panel-title">
              Ventas Mes Actual
            </div>

            <div class="panel-body">
              <fieldset>
                <div class="col-md-12">
                  <div class="panel-body table-responsive">
                    <div class="col-md-12">
                      <ul class="topstats clearfix">
                        <li class="arrow"></li>
                        <li class="col-xs-6 col-lg-2">
                          <span class="title"><i class="fa fa-copyright"></i> Cantidad De Ventas Realizadas</span>
                          <h3 class="color5">0</h3>
                        </li>
                        <li class="col-xs-6 col-lg-2">
                          <span class="title"><i class="fa fa-copyright"></i> Cantidad De Ventas En Mesas</span>
                          <h3  class="color9">0</h3>
                        </li>
                        <li class="col-xs-6 col-lg-2">
                          <span class="title"><i class="fa fa-usd"></i> Ganancia De Ventas</span>
                          <h3 class="color5">$0</h3>
                        </li>
                        <li class="col-xs-6 col-lg-2">
                          <span class="title"><i class="fa fa-copyright"></i> Cantidad De Ventas Delivery</span>
                          <h3 class="color9">0</h3>
                        </li>
                        <li class="col-xs-6 col-lg-2">
                          <span class="title"><i class="fa fa-copyright"></i> Cantidad De Ventas En Retiro Local</span>
                          <h3 class="color5">0</h3>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </fieldset>

              <!-- Start Fourth Row -->
              <div class="row">
                <!-- Start Browser Stats -->
                <div class="col-md-12 col-lg-3">
                  <div class="panel panel-widget">
                    <div class="panel-title">
                      Ventas Por Familias <span class="label label-primary">0</span>
                    </div>
                    <div class="panel-body table-responsive">
                      <table class="table table-hover table-striped">
                        <thead>
                          <tr>
                            <td>FAMILIA</td>
                            <td>CANTIDAD</td>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- End Browser Stats -->

                <!-- Start Orders -->
                <div class="col-md-12 col-lg-6">
                  <div class="panel panel-widget">
                    <div class="panel-title">
                      VENTAS POR PRODUCTOS <span class="label label-danger">0</span>
                    </div>
                    <div class="panel-body table-responsive">
                      <table class="table table-hover table-striped">
                        <thead>
                          <tr>
                            <td>PRODUCTO</td>
                            <td>CANTIDAD</td>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- End Orders -->


                <!-- Start Inbox -->
                <div class="col-md-12 col-lg-3">
                  <div class="panel panel-widget">
                    <div class="panel-title">
                      VENTAS POR USUARIO <span class="label label-primary">0</span>
                    </div>
                    <div class="panel-body table-responsive">
                      <table class="table table-hover table-striped">
                        <thead>
                          <tr>
                            <td>USUARIO</td>
                            <td>CANTIDAD</td>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Fourth Row -->
            </div>
          </div>
        </div>  <!-- end tabReporteMesActual-->

        <div class="tab-pane fade" id="tabreporteCaja">
          <div class="panel panel-default">
            <div class="panel-title">
              REPORTE DE CAJAS
            </div>
            <div class="panel-body">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default panel-collapse">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#cajaAbiertas" aria-expanded="true" aria-controls="cajaAbiertas" class="">
                        CAJAS ABIERTAS <span class="label label-primary">0</span>
                      </a>
                    </h4>
                  </div>
                  <div id="cajaAbiertas" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                    <table class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <td>CAJA</td>
                          <td>FECHA DE APERTURA</td>
                          <td>USUARIO</td>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>
  </div>
</div>
