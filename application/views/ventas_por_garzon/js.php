<script>
var base_url="<?php echo base_url(); ?>";
var table = $('#tableVentasPorGarzon').DataTable();
var table = $('#TablaVentasPorGarzonNoVigentes').DataTable();
$(document).ready(function() {
  obtenerVentasRealizadasPorGarzonesVigentes();
  obtenerVentasRealizadasPorGarzonesNoVigentes()
});
}

function  obtenerVentasRealizadasPorGarzonesVigentes(){
  //$('#load').show();
  //$('#btn-grabar').prop('disabled', false);
  if ( $.fn.dataTable.isDataTable('#tableVentasPorGarzon') ) {
    table = $('#tableVentasPorGarzon').DataTable();
    table.destroy();
  }
  table = $("#tableVentasPorGarzon").DataTable( {
    "ajax": {
      "url": base_url+"index.php/VentasPorGarzon/VentasRealizadasPorGarzonesVigentesDataTable"
    },
    "bPaginate":true,
    "bProcessing": true,
    "pageLength": 10,
    "select": true,
    "dom": "Bfrtip",
    "columns": [
      { mData: "nombre_usuario" } ,
      { mData: "cantidad_ventas_realizadas" },
      { mData: "ganacia_ventas_realizadas" } ,
      { mData: "total_propinas" }
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
        title : "Informe De Ventas Realizadas Por Garzones"
      },
      {
        text: 'EXPORTAR A EXCEL',
        extend: 'excel',
        exportOptions: {
          modifier: {
            selected: null
          }
        },
        title : "Informe De Ventas Realizadas Por Garzones"
      }
    ]
  });
}


function  obtenerVentasRealizadasPorGarzonesNoVigentes(){
  //$('#load').show();
  //$('#btn-grabar').prop('disabled', false);
  if ( $.fn.dataTable.isDataTable('#TablaVentasPorGarzonNoVigentes') ) {
    table = $('#TablaVentasPorGarzonNoVigentes').DataTable();
    table.destroy();
  }
  table = $("#TablaVentasPorGarzonNoVigentes").DataTable( {
    "ajax": {
      "url": base_url+"index.php/VentasPorGarzon/VentasRealizadasPorGarzonesVigentesDataTable"
    },
    "bPaginate":true,
    "bProcessing": true,
    "pageLength": 10,
    "select": true,
    "dom": "Bfrtip",
    "columns": [
      { mData: "nombre_usuario" } ,
      { mData: "cantidad_ventas_realizadas" },
      { mData: "ganacia_ventas_realizadas" } ,
      { mData: "total_propinas" }
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
        title : "Informe De Ventas Realizadas Por Garzones Desvinculados"
      },
      {
        text: 'EXPORTAR A EXCEL',
        extend: 'excel',
        exportOptions: {
          modifier: {
            selected: null
          }
        },
        title : "Informe De Ventas Realizadas Por Garzones Desvinculados"
      }
    ]
  });
}
</script>
