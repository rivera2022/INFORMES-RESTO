<script>
var base_url="<?php echo base_url(); ?>";
var tableUnidadMedida = $('#tablaUnidadMedida').DataTable();
$(document).ready(function() {
  ListadoUnidadMedida();
});

//-----------------------------------------------------------------------------------------------------------------------------------

function crearNuevaUnidadMedida(){
  $('#id_umedida').val("");
  $('#nombre_umedida').val("");
  $('#nombre_corto').val("");
  $('#ckvigente').prop('checked', true);
  $('#ckFracionable').prop('checked', true);
  $('#ModalUnidadMedida').modal({backdrop: 'static', keyboard: false});
}


//----------------------------------------------------------------------------------------------------------------------------------

$('#btnNuevaUnidadMedida').click(function(){
  crearNuevaUnidadMedida();
});

//----------------------------------------------------------------------------------------------------------------------------------


$('#btnGrabarUnidadMedida').on('click', function(){
      var msg="";
      if ($('#nombre_umedida').val()=="") {
        msg="No ingresó Nombre de la la Unidad de Medida\n";
      }
      if ($('#nombre_corto').val()=="") {
        msg="No ingresó Nombre corto de la Unidad de Medida\n";
      }
      if (msg.length) {
        swal("Le falta completar los siguiente(s) dato(s):\n"+msg);
        clicando= false;
      }else{
        clicando= false;

            //grabar datos
      id_umedida=$('#id_umedida').val();
      nombre_umedida=$('#nombre_umedida').val().toUpperCase().replace(/[,.'"$#%&]+/g, '');
      nombre_corto=$('#nombre_corto').val().toUpperCase().replace(/[,.'"$#%&]+/g, '');



      if($('#ckvigente').is(":checked")){
        var vigente = 1
      }else{
        var vigente = 0
      }

      if($('#ckFracionable').is(":checked")){
        var fracionable = 1
      }else{
        var fracionable = 0
      }






      var miJson = {
        'id_umedida':id_umedida,
        'nombre_umedida':nombre_umedida,
        'nombre_corto':nombre_corto,
        'vigente':vigente,
        'fracionable':fracionable,
      };

      console.log(miJson);

      $.post(base_url+"index.php/Unidad_Medida/grabarUnidadMedida",{prod:miJson},function(){
      }).done(function(datos) {

      try {
      var obj = jQuery.parseJSON(datos); // lo convierto a un objeto a json
      $('#ModalUnidadMedida').modal('hide');
      swal("FELICIDADES", "Se Registro Exitosamente", "success");
      tableUnidadMedida.ajax.reload();
      } catch (e) {
      var positionError = datos.search("ERROR");
      if (positionError>0) {
      swal("Error", "Se produjo un error al grabar : \n"+datos.substr(positionError,100), "error");
      console.log(datos);
        }
      }
    })
  }//fin validacion de datos
});


//-----------------------------------------------------------------------------------------------------------------------------------

//DataTable Unidad de Medida


function  ListadoUnidadMedida(){
//$('#load').show();
//$('#btn-grabar').prop('disabled', false);
let tituloExport="Unidades De Medida";
if ( $.fn.dataTable.isDataTable('#tablaUnidadMedida') ) {
  tableUnidadMedida = $('#tablaUnidadMedida').DataTable();
  tableUnidadMedida.destroy();
}
tableUnidadMedida = $("#tablaUnidadMedida").DataTable( {
  "ajax": {
    "url": base_url+"index.php/Unidad_Medida/ListadoUnidadMedidaDatatable"
  },
  "bPaginate":true,
  "bProcessing": true,
  "pageLength": 10,
  "select": true,
  "dom": "Bfrtip",
  "columns": [
    { mData: "id_umedida", className:"text-center", "visible": false} ,
    { mData: "nombre_umedida", className:"text-center"},
    { mData: "nombre_corto", className:"text-center"},
    { mData: "vigente", className:"text-center" } ,
    { mData: "fracionable", className:"text-center" } ,
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
tableUnidadMedida
.on( 'select', function ( e, dt, type, indexes ) {
  var rowData = tableUnidadMedida.rows( indexes ).data().toArray();

  $('#id_umedida').val(rowData[0].id_umedida);
  $('#nombre_umedida').val(rowData[0].nombre_umedida);
  $('#nombre_corto').val(rowData[0].nombre_corto);
  if (rowData[0].vigente=='<i class="fa fa-check"></i>') {
    $('#ckvigente').prop('checked', true);
  }else{
    $('#ckvigente').prop('checked', false);
  }
  if (rowData[0].fracionable=='<i class="fa fa-check"></i>') {
    $('#ckFracionable').prop('checked', true);
  }else{
    $('#ckFracionable').prop('checked', false);
  }
  $('#ModalUnidadMedida').modal({backdrop: 'static', keyboard: false});

});

}//



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
