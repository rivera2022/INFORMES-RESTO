<script>
    var base_url="<?php echo base_url(); ?>";
    var table = $('#tableVendedoresVigentes').DataTable();
    var table = $('#tableVendedoresNoVigentes').DataTable();
    $(document).ready(function() {
        obtenerVendedoresVigentes();
        obtenerVendedoresNoVigentes()
    });
    }

    function  obtenerVendedoresVigentes(){
      //$('#load').show();
      //$('#btn-grabar').prop('disabled', false);
      if ( $.fn.dataTable.isDataTable('#tableVendedoresVigentes') ) {
          table = $('#tableVendedoresVigentes').DataTable();
          table.destroy();
      }
      table = $("#tableVendedoresVigentes").DataTable( {
                  "ajax": {
                      "url": base_url+"index.php/Vendedores/obtenerListadoVendedoresVigentesDataTable"
                  },
                  "bPaginate":true,
                  "bProcessing": true,
                  "pageLength": 10,
                  "select": true,
                  "dom": "Bfrtip",
                  "columns": [
                    { mData: "nombre_usuario" } ,
                    { mData: "nombre_rol" }
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
                                title : "Vendedores Vigentes"
                        },
                        {
                               text: 'EXPORTAR A EXCEL',
                               extend: 'excel',
                               exportOptions: {
                                   modifier: {
                                       selected: null
                                   }
                               },
                               title : "Vendedores Vigentes"
                       }
                    ]
      });


      function  obtenerVendedoresNoVigentes(){
        //$('#load').show();
        //$('#btn-grabar').prop('disabled', false);
        if ( $.fn.dataTable.isDataTable('#TablaVendedoresNoVigentes') ) {
            table = $('#TablaVendedoresNoVigentes').DataTable();
            table.destroy();
        }
        table = $("#TablaVendedoresNoVigentes").DataTable( {
                    "ajax": {
                        "url": base_url+"index.php/Vendedores/obtenerListadoVendedoresNoVigentesDataTable"
                    },
                    "bPaginate":true,
                    "bProcessing": true,
                    "pageLength": 10,
                    "select": true,
                    "dom": "Bfrtip",
                    "columns": [
                      { mData: "nombre_usuario" } ,
                      { mData: "nombre_rol" }
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
                                  title : "Vendedores No Vigentes"
                          },
                          {
                                 text: 'EXPORTAR A EXCEL',
                                 extend: 'excel',
                                 exportOptions: {
                                     modifier: {
                                         selected: null
                                     }
                                 },
                                 title : "Vendedores No Vigentes"
                         }
                      ]
        });





</script>
