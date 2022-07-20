<script>
var base_url="<?php echo base_url(); ?>";
var table = $('#tablaProductos').DataTable();
$(document).ready(function() {
  ObtenerListadoProductos();
});
function crearNuevo(){
  $('#idProducto').val("");
  $('#TxtNombreProducto').val("");
  llenarCboFamilia("");
  llenarCboUmedida("");

  $('#TxtPrecioNeto').val("100");
  $('#txtPrecioCosto').val("100");
  $('#ckInventariable').prop('checked', false);
  $('#ckVigente').prop('checked', true);
  $('#modalProductos').modal({backdrop: 'static', keyboard: false});
}

function GrabarProducto(){
  var idProducto=$('#idProducto').val();
  var nombreProducto=$('#TxtNombreProducto').val().toUpperCase().replace(/[,.'"$#%&]+/g, "");
  var familia=$('#CboFamilia').val();
  var Umedida=$('#CboUmedida').val();
  var precioNeto=parseFloat($('#TxtPrecioNeto').val());
  var PrecioCosto=parseFloat($('#txtPrecioCosto').val());
  var inventarible=($('#ckInventariable').is(":checked")   ? 1 : 0);
  var vigente=($('#ckVigente').is(":checked")   ? 1 : 0);

  var msg="";
  if (nombreProducto=="") {
    msg="Nombre Producto\n";
  }
  if (familia=="") {
    msg="Familia Producto\n";
  }
  if (Umedida=="") {
    msg="Unidad De Medida Producto\n";
  }
  if (precioNeto<0) {
    msg="Precio Neto Invalido\n" ;
  }
  if (PrecioCosto<0) {
    msg="Precio Costo Invalido\n" ;
  }

  if (msg.length) {
    swal("Le falta completar los siguiente(s) dato(s):\n"+msg);
  }else{
    $('#GrabarProducto').prop('disabled', true);
    var miJson = {
      'id_producto':idProducto,
      'id_familia':familia,
      'nombre_producto':nombreProducto,
      'id_umedida':Umedida,
      'neto':precioNeto,
      'costo':PrecioCosto,
      'inventariable':inventarible,
      'vigente':vigente,
    };

    $.post(base_url+"index.php/productos/GrabarProducto",{
      'prod':miJson
    },function(){
    }).done(function(datos) {
      try {
        var obj = $.parseJSON(datos); // lo convierto a un objeto a json
        $.each(obj,function(index,v) { // recorro el array
        });	//fin each
        $('#modalProductos').modal('hide');
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

    $('#GrabarProducto').prop('disabled', false);
  }//fin validacion de datos
}

function ObtenerListadoProductos(){
  let tituloExport="Productos";
  if ( $.fn.dataTable.isDataTable('#tablaProductos') ) {
    table = $('#tablaProductos').DataTable();
    table.destroy();
  }
  table = $("#tablaProductos").DataTable( {
    "ajax": {
      "url": base_url+"index.php/productos/ListadoProductosDatatable"
    },
    "bPaginate":true,
    "bProcessing": true,
    "pageLength": 10,
    "select": true,
    "dom": "Bfrtip",
    "columns": [
      { mData: "id_producto", className:"text-center","visible": false } ,
      { mData: "nombre_producto", className:"text-center" },
      { mData: "nombre_familia", className:"text-center" },
      { mData: "nombre_umedida", className:"text-center" } ,
      { mData: "neto", className:"text-center" },
      { mData: "costo", className:"text-center" },
      { mData: "inventariable", className:"text-center","visible": false },
      { mData: "vigente", className:"text-center","visible": false },

    ],
    "columnDefs": [
          {
            "targets": [0,5,6],
            "className": "text-right",
            "visible": false
          },
          {
            "targets": [3,4],
            "className": "text-right"
          }

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

    $('#idProducto').val(rowData[0].id_producto);
    $('#TxtNombreProducto').val(rowData[0].nombre_producto);
    llenarCboFamilia(rowData[0].nombre_familia);
    llenarCboUmedida(rowData[0].nombre_umedida);
    $('#TxtPrecioNeto').val(rowData[0].neto);
    $('#txtPrecioCosto').val(rowData[0].costo);
    $('#ckInventariable').val(rowData[0].inventarible);
    $('#ckVigente').val(rowData[0].vigente);
    $('#modalProductos').modal({backdrop: 'static', keyboard: false});

  } )
}//fin obtenerDatos

function llenarCboFamilia(objSelected){
  $.post(base_url+"index.php/Familias/ListadoNombreFamilia",{id:""},function(datos){

    var obj = jQuery.parseJSON(datos); // lo convierto a un objeto a json

    tbl="";
    $.each(obj,function(index,v) { // recorro el array
      if (v.nombre_familia==objSelected) {
        tbl=tbl+'<option selected value="'+v.id_familia+'">'+v.nombre_familia+'</option>';
      }else{
        tbl=tbl+'<option value="'+v.id_familia+'">'+v.nombre_familia+'</option>';
      }
    });	//fin each
    $("#CboFamilia").html(tbl);
    $("#CboFamilia").select2();

  });
}


function llenarCboUmedida(objSelected){
  $.post(base_url+"index.php/Unidad_Medida/ListadoNombreUmedida",{id:""},function(datos){

    var obj = jQuery.parseJSON(datos); // lo convierto a un objeto a json

    tbl="";
    $.each(obj,function(index,v) { // recorro el array
      if (v.nombre_umedida==objSelected) {
        tbl=tbl+'<option selected value="'+v.id_umedida+'">'+v.nombre_umedida+'</option>';
      }else{
        tbl=tbl+'<option value="'+v.id_umedida+'">'+v.nombre_umedida+'</option>';
      }
    });	//fin each
    $("#CboUmedida").html(tbl);
    $("#CboUmedida").select2();

  });
}

</script>
