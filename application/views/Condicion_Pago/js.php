<script>
var base_url="<?php echo base_url(); ?>";
var tableCondicionPago = $('#tablaCondicionPago').DataTable();
$(document).ready(function() {
  ListadoCondicionPago();
});
//-----------------------------------------------------------------------------------------------------------------------------------------------

function crearNuevaCondicionPago(){
  $('#id_condicion_pago').val("");
  $('#nombre_condicion_pago').val("");
  $('#ckvigente').val("");
  $('#ModalCondicionPago').modal({backdrop: 'static', keyboard: false});
}

//----------------------------------------------------------------------------------------------------------------------------------------------

$('#btnNuevaCondicionPago').click(function(){
  crearNuevaCondicionPago();
});


//----------------------------------------------------------------------------------------------------------------------------------------------

$('#btnGrabarCondicionPago').on('click', function(){
      var msg="";
      if ($('#nombre_condicion_pago').val()=="") {
        msg="No ingresó Nombre de la condicion de pago\n";
      }
      if (msg.length) {
        alert("Le falta completar los siguiente(s) dato(s):\n"+msg);
        clicando= false;
      }else{
        clicando= false;

            //grabar datos
      id_condicion_pago=$('#id_condicion_pago').val();
      nombre_condicion_pago=$('#nombre_condicion_pago').val().toUpperCase().replace(/[,.'"$#%&]+/g, '');

      if($('#ckvigente').is(":checked")){
        var vigente = 1
      }else{
        var vigente = 0
      }

      var miJson = {
        'id_condicion_pago':id_condicion_pago,
        'nombre_condicion_pago':nombre_condicion_pago,
        'vigente':vigente,
      };
      console.log(miJson);
      $.post(base_url+"index.php/Condicion_Pago/grabarCondicionPago",{prod:miJson},function(){
      }).done(function(datos) {

      try {
      var obj = jQuery.parseJSON(datos); // lo convierto a un objeto a json
      $('#ModalCondicionPago').modal('hide');
      tableCondicionPago.ajax.reload();
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


//datatable condicion pago



//---------------------------------------------------------------------------------------------------------------------------------------------------------

function  ListadoCondicionPago(){
//$('#load').show();
//$('#btn-grabar').prop('disabled', false);
if ( $.fn.dataTable.isDataTable('#tablaCondicionPago') ) {
  tableCondicionPago = $('#tablaCondicionPago').DataTable();
  tableCondicionPago.destroy();
}
tableCondicionPago = $("#tablaCondicionPago").DataTable( {
  "ajax": {
    "url": base_url+"index.php/Condicion_Pago/ListadoCondicionPagoDatatable"
  },
  "bPaginate":true,
  "bProcessing": true,
  "pageLength": 10,
  "select": true,
  "dom": "Bfrtip",
  "columns": [
    { mData: "id_condicion_pago", className:"text-center"} ,
    { mData: "nombre_condicion_pago", className:"text-center"},
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
      title : "Condicion de pago"
    },
    {
      text: 'EXPORTAR A EXCEL',
      extend: 'excel',
      exportOptions: {
        modifier: {
          selected: null
        }
      },
      title : "Condicion De Pago"
    }
  ]
});
tableCondicionPago
.on( 'select', function ( e, dt, type, indexes ) {
  var rowData = tableCondicionPago.rows( indexes ).data().toArray();
  $('#id_condicion_pago').val(rowData[0].id_condicion_pago);
  $('#nombre_condicion_pago').val(rowData[0].nombre_condicion_pago);
  $('#vigente').val(rowData[0].vigente);
  $('#ModalCondicionPago').modal({backdrop: 'static', keyboard: false});

})

}//



</script>
