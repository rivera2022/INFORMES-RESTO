<script>
	var base_url = "<?php echo base_url(); ?>";
	var table = $('#tableFormaPago').DataTable();
	$(document).ready(function() {
		obtenerDatos();
	});

	function nuevo(){
		$('#idFormaPago').val('');
		$('#nombreFormaPago').val('');
		$('#ckVigente').prop('checked', true);
		$('#ModalFormaPago').modal('show');
	}

	$('#BtnNuevaFormaPago').click(function(){
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

	function grabar(){
		var msg="";
		if($('#nombreFormaPago').val()==""){
			msg="-> Nombre de la Forma de Pago\n";
		}
		if(msg.length){
			swal("Le falta completar los siguiente(s) dato(s):\n"+msg);
			clicando = false;
		}else{
			clicando = false;

			idFormaPago = $('#idFormaPago').val();
			nombreFormaPago = $('#nombreFormaPago').val().toUpperCase().replace(/[,.'"$#%&]+/g, "");

			if ($('#ckVigente').is(":checked"))
            {
				var vigente = 1;
            }else{
				var vigente = 0;
            }

			var miJson = {
				'id_forma_pago': idFormaPago,
				'nombre_forma_pago': nombreFormaPago,
				'vigente': vigente
			};
			$.post(base_url+"index.php/Forma_Pago/grabarFormaPago", {prod:miJson}, function(data){
				console.log(miJson);
			}).done(function(){
				$('#ModalFormaPago').modal('hide');
				swal("FELICIDADES", "Se Registro Exitosamente", "success");
				table.ajax.reload();
			}).fail(function(){
				swal("Se produjo un error al realizar el proceso, favor contacte a su administrador.");
			}).always(function(){
			});
		}
	}


	$('#btnGrabar').click(function(){
		grabar();
	});

	function obtenerDatos(){
		let tituloExport="Formas De Pago";
		if($.fn.dataTable.isDataTable('#tableFormaPago')){
			table = $('#tableFormaPago').DataTable();
			table.destroy();
		}
		table = $('#tableFormaPago').DataTable({
			"ajax": {
				"url": base_url+"index.php/Forma_Pago/obtenerListadoFormaPagoDataTable",
			},
			"bpaginate": true,
			"bprocessing": true,
			"pagelength": 10,
			"select": true,
			"dom": 'Bfrtip',
			"columns": [
				{ mData: "id_forma_pago", className:"text-center", "visible": false },
				{ mData: "nombre_forma_pago", className:"text-center" },
				{ mData: "vigente", className:"text-center" },
			],
			"buttons": [
				{
					text: 'EXPORTAR A PDF',
					extend: 'pdf',
					exportOptions: {
						modifier: {
							selected: null
						}
					},
					extend: 'pdfHtml5',
					orientation: 'landscape',
					pageSize: 'LEGAL',
					title : tituloExport,
					className: "btn btn-danger"
				},
				{
					text: 'EXPORTAR A EXCEL',
					extend: 'excel',
					exportOptions: {
						modifier: {
							selected: null
						}
					},
					title : tituloExport,
					className: "btn btn-success"
				}
			]
		});
		table
			.on('select', function (e, dt, type, indexes) {
				var rowData = table.rows(indexes).data().toArray();
				$('#idFormaPago').val(rowData[0].id_forma_pago);
				$('#nombreFormaPago').val(rowData[0].nombre_forma_pago);
				if (rowData[0].vigente == '<i class="fa fa-check"></i>') {
					$('#ckVigente').prop('checked', true);
				} else {
					$('#ckVigente').prop('checked', false);
				}
				$('#ModalFormaPago').modal({backdrop: 'static', keyboard: false});
			})
	}
</script>
