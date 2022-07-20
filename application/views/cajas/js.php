<script>
    var base_url="<?php echo base_url(); ?>";
    var table = $('#TablaCajasPorUsuario').DataTable();
    var table = $('#tablaReporteDeCajas').DataTable();
    $(document).ready(function() {
        ReporteDeCaja();
        ListadoCantidadCajasPorUsuario();
    });


    function  ReporteDeCaja(){
      if ( $.fn.dataTable.isDataTable('#tablaReporteDeCajas') ) {
          table = $('#tablaReporteDeCajas').DataTable();
          table.destroy();
      }
      table = $("#tablaReporteDeCajas").DataTable( {
                  "ajax": {
                      "url": base_url+"index.php/ReporteCajas/ReporteDeCajasDataTable"
                  },
                  "bPaginate":true,
                  "bProcessing": true,
                  "pageLength": 10,
                  "select": true,
                  "dom": "Bfrtip",
                  "columns": [
                    { mData: "id_caja" }
                    { mData: "fecha" }
                    { mData: "ventas" }
                    { mData: "nombre_usuario" }
                    { mData: "nombre_turno" }
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
                                title : "Reporte De Cajas"
                        },
                        {
                               text: 'EXPORTAR A EXCEL',
                               extend: 'excel',
                               exportOptions: {
                                   modifier: {
                                       selected: null
                                   }
                               },
                               title : "Reporte De Cajas"
                       }
                    ]
      });
    }


      function  ListadoCantidadCajasPorUsuario(){
        if ( $.fn.dataTable.isDataTable('#TablaCajasPorUsuario') ) {
            table = $('#TablaCajasPorUsuario').DataTable();
            table.destroy();
        }
        table = $("#TablaCajasPorUsuario").DataTable( {
                    "ajax": {
                        "url": base_url+"index.php/ReporteCajas/CantidadDeCajasPorUsuarioDataTable"
                    },
                    "bPaginate":true,
                    "bProcessing": true,
                    "pageLength": 10,
                    "select": true,
                    "dom": "Bfrtip",
                    "columns": [
                      { mData: "nombre_usuario" }
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
                                  title : "Cajas abiertas Por Usuarios"
                          },
                          {
                                 text: 'EXPORTAR A EXCEL',
                                 extend: 'excel',
                                 exportOptions: {
                                     modifier: {
                                         selected: null
                                     }
                                 },
                                 title : "Cajas abiertas Por Usuarios"
                         }
                      ]
        });
      }





</script>
