<script>
var base_url="<?php echo base_url(); ?>";
var tableImpuesto = $('#tablaImpuesto').DataTable();
$(document).ready(function() {
  ListadoImpuesto();
});

//-----------------------------------------------------------------------------------------------

function crearNuevoImpuesto(){
  $('#id_impuesto').val("");
  $('#nombre_impuesto').val("");
  $('#valor').val("");
  $('#ckvigente').prop('checked', true);
  $('#ModalImpuesto').modal({backdrop: 'static', keyboard: false});
}
//------------------------------------------------------------------------------------------------

$('#btnNuevoImpuesto').click(function(){
  crearNuevoImpuesto();
});


//------------------------------------------------------------------------------------------------


$('#btnGrabarImpuesto').on('click', function(){
      var msg="";
      if ($('#nombre_impuesto').val()=="") {
        msg="No ingresó Nombre del impuesto\n";
      }
      if ($('#valor').val()=="") {
        msg="No ingresó Valor del impuesto\n";
      }

      if ($('#valor').val()<0) {
    msg="El valor debe ser positivo" ;
      }
      if (msg.length) {
        swal("Le falta completar los siguiente(s) dato(s):\n"+msg);
        clicando= false;
      }else{
        clicando= false;

            //grabar datos
      id_impuesto=$('#id_impuesto').val();
      nombre_impuesto=$('#nombre_impuesto').val().toUpperCase().replace(/[,.'"$#%&]+/g, '');
      var valor=$('#valor').val().toUpperCase().replace(/[,.'"$#%&]+/g, '');

      if($('#ckvigente').is(":checked")){
        var vigente = 1
      }else{
        var vigente = 0
      }

      var miJson = {
        'id_impuesto':id_impuesto,
        'nombre_impuesto':nombre_impuesto,
        'valor':valor,
        'vigente':vigente,
      };
      console.log(miJson);
      $.post(base_url+"index.php/Impuestos/grabarImpuesto",{prod:miJson},function(){
      }).done(function(datos) {

      try {
      var obj = jQuery.parseJSON(datos); // lo convierto a un objeto a json
      $('#ModalImpuesto').modal('hide');
      swal("FELICIDADES", "Se Registro Exitosamente", "success");
      tableImpuesto.ajax.reload();
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


//datatable impuestos

function  ListadoImpuesto(){
//$('#load').show();
//$('#btn-grabar').prop('disabled', false);
let tituloExport="Impuestos";
if ( $.fn.dataTable.isDataTable('#tablaImpuesto') ) {
  tableImpuesto = $('#tablaImpuesto').DataTable();
  tableImpuesto.destroy();
}
tableImpuesto = $("#tablaImpuesto").DataTable( {
  "ajax": {
    "url": base_url+"index.php/Impuestos/ListadoImpuestoDatatable"
  },
  "bPaginate":true,
  "bProcessing": true,
  "pageLength": 10,
  "select": true,
  "dom": "Bfrtip",
  "columns": [
    { mData: "id_impuesto", className:"text-center", "visible": false} ,
    { mData: "nombre_impuesto", className:"text-center"},
    { mData: "valor", className:"text-center" },
    { mData: "vigente", className:"text-center" }
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
tableImpuesto
.on( 'select', function ( e, dt, type, indexes ) {
  var rowData = tableImpuesto.rows( indexes ).data().toArray();
  $('#id_impuesto').val(rowData[0].id_impuesto);
  $('#nombre_impuesto').val(rowData[0].nombre_impuesto);
  $('#valor').val(rowData[0].valor);
  if (rowData[0].vigente=='<i class="fa fa-check"></i>') {
    $('#ckvigente').prop('checked', true);
  }else{
    $('#ckvigente').prop('checked', false);
  }
  $('#ModalImpuesto').modal({backdrop: 'static', keyboard: false});

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





</script>
