<?php
	$fechaActual = date('d-m-Y');
?>

<!-- TITULO -->
<div class="page-header">
	<h1 class="title">Familia</h1>
	<ol class="breadcrumb">
		<li class="active">Mantenedores</li>
		<li class="active">Familia</li>
	</ol>
	<div class="right">

	</div>
</div>
<!-- FIN TITULO -->

<!-- BTN NUEVO REGISTRO  -->
<div class="container-padding">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<fieldset>
					<div class="col-sm-8 col-md-10 col-lg-10">
					</div>
					<div class="col-sm-2 col-lg-2 col-md-2">
						<div class="right">
							<div class="btn-group" role="group" aria-label="...">
								<button type="button" class="btn btn-default" id="BtnNuevaFamilia"><i class="fa fa-plus"></i>Nueva</button>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
</div>
<!-- FIN BTN NUEVO REGISTRO  -->

<!-- TABLA CONTENIDO -->
<div class="container-padding">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-title panel-primary">
				</div>
				<div class="panel-body table-responsive">
					<table id="tableFamilia" class="display" style="width: 100%">
						<thead>
							<tr>
								<th class="text text-center">ID</th>
								<th class="text text-center">NOMBRE FAMILIA</th>
								<th class="text text-center">VIGENTE</th>	
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- FIN TABLA CONTENIDO  -->

<!-- MODAL NUEVO REGISTRO  -->
<div id="ModalFamilias" class="modal fade" role="dialog" style="overflow-y: scroll;">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- TITULO  MODAL  -->
			<div id="tituloModal" class="modal-header modal-warning">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Mantención</h4>
			</div>
			<!-- FIN TITULO  MODAL  -->

			<!-- CONTENIDO MODAL  -->
			<div class="modal-body">
				<div class="h-panel">
					<ul id="myTab" class="nav nav-tabs">
						<li class="active"><a href="#datosFamilias" data-toggle="tab" id="tab1">Familias</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="datosFamilias">
						<!-- CAMPOS DE REGISTRO  -->
							<fieldset>
								<div class="col-md-6">
									<label for="idFamilia">ID</label>
									<input type="number" class="form-control input-sm" name="idFamilia" id="idFamilia" disabled value="">
								</div>
							</fieldset>
							<fieldset>
								<div class="col-md-12">
									<label for="nombreFamilia">Nombre Familia</label>
									<input type="text" onpaste="return false;" ondrop="return false;" autocomplete="off" onkeypress="return sololetras(event)" class="form-control input-sm" name="nombreFamilia" id="nombreFamilia" requerido="si" value="" placeholder="Nombre Familia">
								</div>
							</fieldset>
							<fieldset>
								<div class="col-md-6">
									<div class="checkbox checkbox-info">
										<input id="ckVigente" type="checkbox">
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
			</div>
			<!-- FIN CONTENIDO MODAL -->

			<!-- BOTONES -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success"  id="btnGrabar"><i class="fa fa-check-square-o"></i>Grabar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i>Salir</button>
			</div>
			<!-- FIN BOTONES -->
		</div>
	</div>
</div>
<!-- FIN MODAL NUEVO REGISTRO  -->
