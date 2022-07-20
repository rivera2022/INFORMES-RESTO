
<?php
  $fechaActual=date('d-m-Y');
?>

<div class="page-header">
  <h1 class="title">INFORMES RESTO</h1>
  <ol class="breadcrumb">
    <li class="active">INFORME DE FAMILIAS SISTEMA DAT@RESTO</li>
  </ol>
</div>

<div class="container-widget">
  <div class="row">
    <div class="h-panel"><!--Tabs para los formularios-->
      <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#tabFamilias" data-toggle="tab" id="tab2">Familias</a></li>
        <li ><a href="#tabProductosPorFamilias" data-toggle="tab" id="tab1">Productos Por Familias</a></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade active in" id="tabFamilias">
          <!--<form id="basic-form">-->
          <div class="panel panel-default">
            <div class="panel-title">
              Familias
            </div>
            <div class="panel-body">
              <fieldset>
                <div class="col-md-12">
                  <div class="panel-body table-responsive">
                    <table id="tableFamilias" class="table table-hover display" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text text-center text-dark">Nombre Familia</th>
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
        <div class="tab-pane fade" id="tabProductosPorFamilias">
          <!--<form id="basic-form">-->
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
          <!--  </form>-->
        </div>
      </div>
    </div><!-- end h-panel -->
  </div><!-- end row-->
</div><!-- end container-widget-->
