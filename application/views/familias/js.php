<script>
    var base_url="<?php echo base_url(); ?>";
    var tablaFamilias = $('#tableFamilias').DataTable();
    var table = $('#TablaProductosPorFamilias').DataTable();
    $(document).ready(function() {
        ListadoFamilias();
        ListadoPorductosPorFamilias();
    });

    function  ListadoFamilias(){
      if ( $.fn.dataTable.isDataTable('#tableFamilias') ) {
          tablaFamilias = $('#tableFamilias').DataTable();
          tablaFamilias.destroy();
      }
      tablaFamilias = $("#tableFamilias").DataTable( {
                  "ajax": {
                      "url": base_url+"index.php/Familias/obtenerListadoFamiliasDataTable"
                  },
                  "bPaginate":true,
                  "bProcessing": true,
                  "pageLength": 10,
                  "select": true,
                  "dom": "Bfrtip",
                  "columns": [
                    { mData: "nombre_familia" }
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
                                title : "Familias"
                        },
                        {
                               text: 'EXPORTAR A EXCEL',
                               extend: 'excel',
                               exportOptions: {
                                   modifier: {
                                       selected: null
                                   }
                               },
                               title : "Familias"
                       }
                    ]
      });
    }


      function  ListadoPorductosPorFamilias(){
        if ( $.fn.dataTable.isDataTable('#TablaProductosPorFamilias') ) {
            table = $('#TablaProductosPorFamilias').DataTable();
            table.destroy();
        }
        table = $("#TablaProductosPorFamilias").DataTable( {
                    "ajax": {
                        "url": base_url+"index.php/Familias/CantidadProductosPorFamiliasDataTable"
                    },
                    "bPaginate":true,
                    "bProcessing": true,
                    "pageLength": 10,
                    "select": true,
                    "dom": "Bfrtip",
                    "columns": [
                      { mData: "nombre_familia" }
                      { mData: "cantidad" }
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
                                  title : "Productos Por Familias"
                          },
                          {
                                 text: 'EXPORTAR A EXCEL',
                                 extend: 'excel',
                                 exportOptions: {
                                     modifier: {
                                         selected: null
                                     }
                                 },
                                 title : "Productos Por Familias"
                         }
                      ]
        });
      }





</script>
