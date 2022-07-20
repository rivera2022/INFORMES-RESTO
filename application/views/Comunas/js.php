<script>
var base_url="<?php echo base_url(); ?>";
var table = $('#tablaComunas').DataTable();
$(document).ready(function() {
  ObtenerListadoComunas();
});

function crearNuevo(){
  $('#idComuna').val("");
  $('#TxtNombreComuna').val("");
  llenarCboCiudad("");
  $('#modalComunas').modal({backdrop: 'static', keyboard: false});
}

$('#btnNuevaComuna').click(function() {
  crearNuevo();
});

/*
function grabarComunas(){
  var msg="";
  if ($('#TxtNombreComuna').val()=="") {
    msg="Nombre De La Comuna\n";
  }
  if ($('#CboCiudad').val()==null || $('#CboCiudad').val()==0 ) {
      msg="Ciudad\n";
    }
  if (msg.length) {
    swal("Le falta completar los siguiente(s) dato(s):\n"+msg);
    clicando= false;
  }else{
    clicando= false;
    //grabar datos
    idComuna=$('#idComuna').val();
    nombreComuna=$('#TxtNombreComuna').val().toUpperCase().replace(/[,.'"$#%&]+/g, '');
    Ciudad=$('#CboCiudad').val();

    var miJson = {
      'id_comuna':idComuna,
      'nombre_comuna':nombreComuna,
      'id_ciudad':Ciudad

    };
    $.post(base_url+"index.php/Comuna/GrabarComuna",{prod:miJson},function(datos){
    }).done(function() {
      $('#modalComunas').modal('hide');
      table.ajax.reload();
    })
    .fail(function() {
      swal( "Se produjo un error al realizar el proceso, favor vuelva a intentarlo" );
    })
    .always(function() {
    });
  }//fin validacion de datos

}
*/

function grabarComunas(){
  var idComuna=$('#idComuna').val();
  var nombreComuna=$('#TxtNombreComuna').val().toUpperCase().replace(/[,.'"$#%&]+/g, '');
  var Ciudad=$('#CboCiudad').val();

  var msg="";
  if (nombreComuna=="") {
    msg="Nombre De La Comuna\n";
  }
  if (Ciudad=="") {
    msg="Ciudad\n";
  }
  if (msg.length) {
    swal("Le falta completar los siguiente(s) dato(s):\n"+msg);
  }else{
    $('#GrabarComuna').prop('disabled', true);
    var miJson = {
      'id_comuna':idComuna,
      'nombre_comuna':nombreComuna,
      'id_ciudad':Ciudad,
    };

    $.post(base_url+"index.php/Comuna/GrabarComuna",{
      'prod':miJson
    },function(){
    }).done(function(datos) {
      try {
        var obj = $.parseJSON(datos); // lo convierto a un objeto a json
        $.each(obj,function(index,v) { // recorro el array
        });	//fin each
        $('#modalComunas').modal('hide');
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

    $('#GrabarComuna').prop('disabled', false);
  }//fin validacion de datos

}

function ObtenerListadoComunas(){
  //$('#load').show();
  //$('#btn-grabar').prop('disabled', false);
    let tituloExport="Comunas";
  if ( $.fn.dataTable.isDataTable('#tablaComunas') ) {
    table = $('#tablaComunas').DataTable();
    table.destroy();
  }
  table = $("#tablaComunas").DataTable( {
    "ajax": {
      "url": base_url+"index.php/Comuna/Listado_Comunas_Datatable"
    },
    "bPaginate":true,
    "bProcessing": true,
    "pageLength": 10,
    "select": true,
    "dom": "Bfrtip",
    "columns": [
      { mData: "id_comuna", className:"text-center", "visible": false } ,
      { mData: "nombre_comuna", className:"text-center" },
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

    $('#idComuna').val(rowData[0].id_comuna);
    $('#TxtNombreComuna').val(rowData[0].nombre_comuna);
    llenarCboCiudad(rowData[0].nombre_ciudad);
    $('#modalComunas').modal({backdrop: 'static', keyboard: false});

  } )
}//fin obtenerDatos



function llenarCboCiudad(objSelected){
  $.post(base_url+"index.php/Ciudad/Listado_Nombre_Ciudades",{id:""},function(datos){

      var obj = jQuery.parseJSON(datos); // lo convierto a un objeto a json

      tbl="";
      $.each(obj,function(index,v) { // recorro el array
        if (v.nombre_ciudad==objSelected) {
          tbl=tbl+'<option selected value="'+v.id_ciudad+'">'+v.nombre_ciudad+'</option>';
        }else{
          tbl=tbl+'<option value="'+v.id_ciudad+'">'+v.nombre_ciudad+'</option>';
        }
      });	//fin each
      $("#CboCiudad").html(tbl);
      $("#CboCiudad").select2();

    });
}

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
