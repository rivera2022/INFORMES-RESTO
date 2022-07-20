<script>
var base_url="<?php echo base_url(); ?>";
var table = $('#tablaCiudades').DataTable();
$(document).ready(function() {
  ObtenerListadoCiudades();
});

function crearNuevo(){
  $('#idCiudad').val("");
  $('#TxtNombreCiudad').val("");
  $('#modalCiudades').modal({backdrop: 'static', keyboard: false});
}

$('#btnNuevaCiudad').click(function() {
  crearNuevo();
});
$('#GrabarCiudad').click(function() {
  grabarCiudades();
});

function grabarCiudades(){
  var msg="";
  if ($('#TxtNombreCiudad').val()=="") {
    msg="Nombre De La Ciudad\n";
  }
  if (msg.length) {
    swal("Le falta completar los siguiente(s) dato(s):\n"+msg);
    clicando= false;
  }else{
    clicando= false;
    //grabar datos
    idCiudad=$('#idCiudad').val();
    nombreCiudad=$('#TxtNombreCiudad').val().toUpperCase().replace(/[,.'"$#%&]+/g, '');

    var miJson = {
      'id_ciudad':idCiudad,
      'nombre_ciudad':nombreCiudad

    };
    $.post(base_url+"index.php/Ciudad/Grabar_Ciudad",{
      'prod':miJson
    },function(){
    }).done(function(datos) {
      try {
        var obj = $.parseJSON(datos); // lo convierto a un objeto a json
        $.each(obj,function(index,v) { // recorro el array
        });	//fin each
        $('#modalCiudades').modal('hide');
        swal("FELICIDADES", "Se Registro Exitosamente", "success");
        table.ajax.reload();
      } catch (e) {
        let positionError = datos.search("ERROR:");
        swal("Error", "Se produjo un error, favor reintente \n("+e+")\n"+datos.substr(positionError,150), "error");
      }
    })
    .fail(function() {
      swal( "Se produjo un error al realizar el proceso, favor vuelva a intentarlo" );
    });

    $('#GrabarCiudad').prop('disabled', false);
  }//fin validacion de datos
}


    /*
    $.post(base_url+"index.php/Ciudad/Grabar_Ciudad",{prod:miJson},function(datos){
    }).done(function() {
      $('#modalCiudades').modal('hide');
      table.ajax.reload();
    })
    .fail(function() {
      alert( "Se produjo un error al realizar el proceso, favor vuelva a intentarlo" );
    })
    .always(function() {
    });
  }//fin validacion de datos

}
*/
function ObtenerListadoCiudades(){
  //$('#load').show();
  //$('#btn-grabar').prop('disabled', false);
  let tituloExport="Ciudades";
  if ( $.fn.dataTable.isDataTable('#tablaCiudades') ) {
    table = $('#tablaCiudades').DataTable();
    table.destroy();
  }
  table = $("#tablaCiudades").DataTable( {
    "ajax": {
      "url": base_url+"index.php/Ciudad/Listado_Nombre_Ciudades_Datatable"
    },
    "bPaginate":true,
    "bProcessing": true,
    "pageLength": 10,
    "select": true,
    "dom": "Bfrtip",
    "columns": [
      { mData: "id_ciudad", className:"text-center", "visible": false},
      { mData: "nombre_ciudad", className:"text-center" },
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
  .on( 'select', function ( e, dt, type, indexes ) {
    var rowData = table.rows( indexes ).data().toArray();

    $('#idCiudad').val(rowData[0].id_ciudad);
    $('#TxtNombreCiudad').val(rowData[0].nombre_ciudad);
    $('#modalCiudades').modal({backdrop: 'static', keyboard: false});

  } )
}//fin obtenerDatos

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
</script>
