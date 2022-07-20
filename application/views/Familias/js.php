<script>
	var base_url = "<?php echo base_url(); ?>";
	var table = $('#tableFamilia').DataTable();
	$(document).ready(function() {
		obtenerDatos();
	});

	function nuevo() {
		$('#idFamilia').val('');
		$('#nombreFamilia').val('');
		$('#ckVigente').prop('checked', true);
		$('#ModalFamilias').modal({
			backdrop: 'static',
			keyboard: false
		});
	}

	$('#BtnNuevaFamilia').click(function() {
		nuevo();
	});

	function sololetras(e, espace) {
		key = e.keyCode || e.which;
		teclado = String.fromCharCode(key).toLowerCase();
		letras = "qwertyuiopasdfghjklñzxcvbnm ";
		especiales = "8-37-38-46-164";
		teclado_especial = false;

		for (var i in especiales) {
			if (key == especiales[i]) {
				teclado_especial = true;
				break;
			}
		}

		if (espace == true) {
			if (e.keyCode == 32) {
				return false;
			}
		}

		if (letras.indexOf(teclado) == -1 && !teclado_especial) {
			return false;
		}
	}

	function grabar() {
		var msg = "";
		if ($('#nombreFamilia').val() == 0) {
			msg = "-> Nombre de la familia.\n";
		}
		if (msg.length) {
			swal("Le falta completar los siguiente(s) dato(s):\n" + msg);
			clicando = false;
		} else {
			clicando = false;

			idFamilia = $('#idFamilia').val();
			nombreFamilia = $('#nombreFamilia').val().toUpperCase().replace(/[,.'"$#%&]+/g, "");

			if ($('#ckVigente').is(":checked")) {
				var vigente = 1;
			} else {
				var vigente = 0;
			}

			var miJson = {
				'id_familia': idFamilia,
				'nombre_familia': nombreFamilia,
				'vigente': vigente
			};
			$.post(base_url + "index.php/Familias/grabarFamilia", {
					prod: miJson
				}, function(data) {
					console.log(miJson);
				}).done(function() {
					$('#ModalFamilias').modal('hide');
					swal("FELICIDADES", "Se Registro Exitosamente", "success");
					table.ajax.reload();
				})
				.fail(function() {
					alert("Se produjo un error al realizar el proceso, favor contacte a su administrador.");
				})
				.always(function() {});
		}
	}

	$('#btnGrabar').click(function() {
		grabar();
	});

	function obtenerDatos() {
		let tituloExport = "Familias";
		if ($.fn.dataTable.isDataTable('#tableFamilia')) {
			table = $('#tableFamilia').DataTable();
			table.destroy();
		}

		table = $("#tableFamilia").DataTable({
			"ajax": {
				"url": base_url + "index.php/Familias/obtenerListadoFamiliaDataTable"
			},
			"bPaginate": true,
			"bProcessing": true,
			"pageLength": 10,
			"select": true,
			"dom": "Bfrtip",
			"columns": [{
					mData: "id_familia",
					className: "text-center",
					"visible": false
				},
				{
					mData: "nombre_familia",
					className: "text-center"
				},
				{
					mData: "vigente",
					className: "text-center"
				},
			],
			"buttons": [{
					text: "EXPORTAR A PDF",
					extend: 'pdf',
					exportOptions: {
						modifier: {
							selected: null
						}
					},
					extend: 'pdfHtml5',
					orientation: 'landscape',
					pageSize: 'LEGAL',
					title: tituloExport,
					className: "btn btn-danger"
				},
				{
					text: "EXPORTAR A EXCEL",
					extend: 'excel',
					exportOptions: {
						modifier: {
							selected: null
						}
					},
					title: tituloExport,
					className: "btn btn-success"
				}
			]
		});
		table
			.on('select', function(e, dt, type, indexes) {
				var rowData = table.rows(indexes).data().toArray();

				$('#idFamilia').val(rowData[0].id_familia);
				$('#nombreFamilia').val(rowData[0].nombre_familia);
				if (rowData[0].vigente == '<i class="fa fa-check"></i>') {
					$('#ckVigente').prop('checked', true);
				} else {
					$('#ckVigente').prop('checked', false);
				}
				$('#ModalFamilias').modal({
					backdrop: 'static',
					keyboard: false
				});
			})
	}
</script>
