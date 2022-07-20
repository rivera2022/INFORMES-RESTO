<script>
var base_url="<?php echo base_url(); ?>";
var tableTipoDocumento = $('#tablaTipoDocumento').DataTable();
$(document).ready(function() {
  ListadoTipoDocumento();
});

//---------------------------------------------------------------------------------------------------------------------------------

function crearNuevoTipoDocumento(){
  $('#id_tipo_documento').val("");
  $('#nombre_documento').val("");
  $('#codigo_tributario').val("");
  $('#ckvigente').prop('checked', true);
  $('#ModalTipoDocumento').modal({backdrop: 'static', keyboard: false});
}

//----------------------------------------------------------------------------------------------------------------------------------

$('#btnNuevoTipoDocumento').click(function(){
  crearNuevoTipoDocumento();
});

//-----------------------------------------------------------------------------------------------------------------------------------


$('#btnGrabarTipoDocumento').on('click', function(){
      var msg="";
      if ($('#nombre_documento').val()=="") {
        msg="No ingresó Nombre del Tipo de Documento\n";
      }
      if ($('#codigo_tributario').val()=="") {
        msg="No ingresó código del Tipo de Documento\n";
      }
      if (msg.length) {
        swal("Le falta completar los siguiente(s) dato(s):\n"+msg);
        clicando= false;
      }else{
        clicando= false;

            //grabar datos
      id_tipo_documento=$('#id_tipo_documento').val();
      nombre_documento=$('#nombre_documento').val().toUpperCase().replace(/[,.'"$#%&]+/g, '');
      codigo_tributario=$('#codigo_tributario').val().toUpperCase().replace(/[,.'"$#%&]+/g, '');

      if($('#ckvigente').is(":checked")){
        var vigente = 1
      }else{
        var vigente = 0
      }

      if (vigente == "1") {
          $("#ckvigente").prop("checked", true);
      }else{
          $("#ckvigente").prop("checked", false);
      }



      var miJson = {
        'id_tipo_documento':id_tipo_documento,
        'nombre_documento':nombre_documento,
        'codigo_tributario':codigo_tributario,
        'vigente':vigente,
      };

      $.post(base_url+"index.php/Tipo_Documento/grabarTipoDocumento",{prod:miJson},function(){
      }).done(function(datos) {

      try {
      var obj = jQuery.parseJSON(datos); // lo convierto a un objeto a json
      $('#ModalTipoDocumento').modal('hide');
      swal("FELICIDADES", "Se Registro Exitosamente", "success");
      tableTipoDocumento.ajax.reload();
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


//---------------------------------------------------------------------------------------------------------------------------------

function  ListadoTipoDocumento(){
//$('#load').show();
//$('#btn-grabar').prop('disabled', false);
let tituloExport="Tipo De Documento";
if ( $.fn.dataTable.isDataTable('#tablaTipoDocumento') ) {
  tableTipoDocumento = $('#tablaTipoDocumento').DataTable();
  tableTipoDocumento.destroy();
}
tableTipoDocumento = $("#tablaTipoDocumento").DataTable( {
  "ajax": {
    "url": base_url+"index.php/Tipo_Documento/ListadoTipoDocumentoDatatable"
  },
  "bPaginate":true,
  "bProcessing": true,
  "pageLength": 10,
  "select": true,
  "dom": "Bfrtip",
  "columns": [
    { mData: "id_tipo_documento", className:"text-center", "visible": false} ,
    { mData: "nombre_documento", className:"text-center"},
    { mData: "codigo_tributario", className:"text-center"},
    { mData: "vigente", className:"text-center" } ,
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
tableTipoDocumento
.on( 'select', function ( e, dt, type, indexes ) {
  let rowData = tableTipoDocumento.rows( indexes ).data().toArray();
  $('#id_tipo_documento').val(rowData[0].id_tipo_documento);
  $('#nombre_documento').val(rowData[0].nombre_documento);
  $('#codigo_tributario').val(rowData[0].codigo_tributario);
  if (rowData[0].vigente=='<i class="fa fa-check"></i>') {
    $('#ckvigente').prop('checked', true);
  }else{
    $('#ckvigente').prop('checked', false);
  }
  $('#ModalTipoDocumento').modal({backdrop: 'static', keyboard: false});

})

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


function soloNumeros(e){
    var key = window.event ? e.which : e.keyCode;
    if (key < 48 || key > 57) {
      e.preventDefault();
    }
  }





</script>
