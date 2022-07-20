<script>
var base_url="<?php echo base_url(); ?>";
var table = $('#tablaVehiculos').DataTable();
$(document).ready(function() {
  ObtenerListadoVehiculos();
});
function crearNuevo(){
  $('#idVehiculo').val("");

  llenarCboTipoVehiculo("");
  $('#TxtPatenteVehiculo').val("");
  $('#TxtCapacidadVehiculo').val("0");
  $('#ckVigente').prop('checked', true);
  $('#modalVehiculo').modal({backdrop: 'static', keyboard: false});
}

function GrabarVehiculo(){
  var idVehiculo=$('#idVehiculo').val();
  var TipoVehiculo=$('#CboTipoVehiculo').val();
  var PatenteVehiculo=$('#TxtPatenteVehiculo').val().toUpperCase().replace(/[,.'"$#%&]+/g, "");
  var CapacidadVehiculo=parseFloat($('#TxtCapacidadVehiculo').val());
  var vigente=($('#ckVigente').is(":checked")   ? 1 : 0);

  var msg="";
  if (PatenteVehiculo=="") {
    msg="Patente Vehiculo\n";
  }
  if (TipoVehiculo=="") {
    msg="Patente Vehiculo\n";
  }
  if (CapacidadVehiculo<0) {
    msg="Capacidad Del Vehiculo Invalida\n" ;
  }
  /*
  if (CapacidadVehiculo=="") {
    msg="Patente Vehiculo\n";
  }*/
  if (msg.length) {
    swal("Le falta completar los siguiente(s) dato(s):\n"+msg);
  }else{
    $('#GrabarVehiculo').prop('disabled', true);
    var miJson = {
      'id_vehiculo':idVehiculo,
      'id_tipo_vehiculo':TipoVehiculo,
      'patente_vehiculo':PatenteVehiculo,
      'capacidad_vehiculo':CapacidadVehiculo,
      'vigente':vigente
    };

    $.post(base_url+"index.php/Vehiculo/GrabarVehiculo",{
      'prod':miJson
    },function(){
    }).done(function(datos) {
      try {
        var obj = $.parseJSON(datos); // lo convierto a un objeto a json
        $.each(obj,function(index,v) { // recorro el array
        });	//fin each
        $('#modalVehiculo').modal('hide');
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

    $('#GrabarVehiculo').prop('disabled', false);
  }//fin validacion de datos
}

function ObtenerListadoVehiculos(){
  //  $('#load').show();
  //$('#btn-grabar').prop('disabled', false);
  let tituloExport="Vehiculos";
  if ( $.fn.dataTable.isDataTable('#tablaVehiculos') ) {
    table = $('#tablaVehiculos').DataTable();
    table.destroy();
  }
  table = $("#tablaVehiculos").DataTable( {
    "ajax": {
      "url": base_url+"index.php/Vehiculo/Listado_Vehiculo_Datatable"
    },
    "bPaginate":true,
    "bProcessing": true,
    "pageLength": 10,
    "select": true,
    "dom": "Bfrtip",
    "columns": [
      { mData: "id_vehiculo", className:"text-center","visible": false } ,
      { mData: "nombre_tipo_vehiculo", className:"text-center" },
      { mData: "patente_vehiculo", className:"text-center" },
      { mData: "capacidad_vehiculo", className:"text-center" } ,
      { mData: "vigente", className:"text-center"  }
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

    $('#idVehiculo').val(rowData[0].id_vehiculo);
    llenarCboTipoVehiculo(rowData[0].nombre_tipo_vehiculo);
    $('#TxtPatenteVehiculo').val(rowData[0].patente_vehiculo);
    $('#TxtCapacidadVehiculo').val(rowData[0].capacidad_vehiculo);
    if (rowData[0].vigente=='<i class="fa fa-check"></i>') {
      $('#ckVigente').prop('checked', true);
    }else{
      $('#ckVigente').prop('checked', false);
    }
    $('#modalVehiculo').modal({backdrop: 'static', keyboard: false});

  } )
}//fin obtenerDatos

function llenarCboTipoVehiculo(objSelected){
  $.post(base_url+"index.php/Tipo_Vehiculo/Listado_Nombres_TiposDeVehiculos",{id:""},function(datos){

    var obj = jQuery.parseJSON(datos); // lo convierto a un objeto a json

    tbl="";
    $.each(obj,function(index,v) { // recorro el array
      if (v.nombre_tipo_vehiculo==objSelected) {
        tbl=tbl+'<option selected value="'+v.id_tipo_vehiculo+'">'+v.nombre_tipo_vehiculo+'</option>';
      }else{
        tbl=tbl+'<option value="'+v.id_tipo_vehiculo+'">'+v.nombre_tipo_vehiculo+'</option>';
      }
    });	//fin each
    $("#CboTipoVehiculo").html(tbl);
    $("#CboTipoVehiculo").select2();

  });
}

</script>
