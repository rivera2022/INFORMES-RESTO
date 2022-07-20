<script>
var base_url="<?php echo base_url(); ?>";
var table = $('#tablaClientes').DataTable();
$(document).ready(function() {
  ObtenerListadoClientes();
});

function crearNuevo(){
  $('#idCliente').val("");
  $('#txtRut').val("");
  $('#txtDV').val("");
  $('#txtNombreCliente').val("");
  $('#TxtRazonSocial').val("");
  $('#TxtNombreFantasia').val("");
  $('#TxtGiroCliente').val("");
  $('#TxtDireccion').val("");
  llenarCboCiudad(" ");
  llenarCboComuna("");
  $('#TxtTelefono').val("");
  $('#TxtCorreoElectronico').val("");
  llenarCboCondicionDeVenta("");
  $('#ckEsEmpresa').prop('checked', true);
  $('#ckVigente').prop('checked', true);
  $('#modalClientes').modal({backdrop: 'static', keyboard: false});
}

$('#btnNuevoCliente').click(function() {
  crearNuevo();
});


function grabarCliente(){
    var msg="";
    if ($('#txtRut').val()<0) {
      msg="Rut Del Cliente Invalido\n";
    }
    if ($('#txtDV').val()=="") {
      msg="Digito Verificador De El Rut\n";
    }
    if ($('#txtNombreCliente').val()=="") {
      msg="Nombre Del Cliente\n";
    }
    if ($('#TxtRazonSocial').val()=="") {
      msg="Razon Social Del Cliente\n";
    }
    if ($('#TxtNombreFantasia').val()=="") {
      msg="Nombre Fantasia Del Cliente\n";
    }
    if ($('#TxtGiroCliente').val()=="") {
      msg="Giro Del Cliente\n";
    }
    if ($('#TxtDireccion').val()=="") {
      msg="Direccion Del Cliente\n";
    }
    if ($('#CboCiudad').val()==null || $('#CboCiudad').val()==0 ) {
        msg="Ciudad\n";
      }
      if ($('#CboComuna').val()==null || $('#CboComuna').val()==0 ) {
        msg="Comuna\n";
      }
      if ($('#CboCondicionDeVenta').val()==null || $('#CboCondicionDeVenta').val()==0 ) {
        msg="Condicion De Venta\n";
      }
      if ($('#TxtTelefono').val()<0) {
        msg="Numero De telefono Invalido\n";
      }
    if (msg.length) {
      swal("Le falta completar los siguiente(s) dato(s):\n"+msg);
      clicando= false;
    }else{
      clicando= false;
      //grabar datos
      idCliente=$('#idCliente').val();
      rutCliente=parseFloat($('#txtRut').val());
      digitoVerificador=$('#txtDV').val();
      NombreCliente=$('#txtNombreCliente').val().toUpperCase().replace(/[,.'"$#%&]+/g, '');
      RazonSocial=$('#TxtRazonSocial').val().toUpperCase().replace(/[,.'"$#%&]+/g, "");
      NombreFantasia=$('#TxtNombreFantasia').val().toUpperCase().replace(/[,.'"$#%&]+/g, '');
      GiroCliente=$('#TxtGiroCliente').val().toUpperCase().replace(/[,.'"$#%&]+/g, "");
      Direccion=$('#TxtDireccion').val().toUpperCase().replace(/[,.'"$#%&]+/g, "");
      Ciudad=$('#CboCiudad').val();
      Comuna=$('#CboComuna').val();
      Telefono=parseFloat($('#TxtTelefono').val());
      CorreoElectronico=$('#TxtCorreoElectronico').val().toUpperCase().replace(/[,.'"$#%&]+/g, "");
      CondicionDeVenta=$('#CboCondicionDeVenta').val();

      if ($('#ckEsEmpresa').is(":checked"))
      {
        var es_empresa=1;
      }else{
        var es_empresa=0;
      }
      if ($('#ckVigente').is(":checked"))
      {
        var vigente=1;
      }else{
        var vigente=0;
      }

      var miJson = {
        'id_cliente':idCliente,
        'razon_social':RazonSocial,
        'nombre_fantasia':NombreFantasia,
        'direccion_cliente':Direccion,
        'id_comuna':Comuna,
        'id_ciudad':Ciudad,
        'id_condicion_venta':CondicionDeVenta,
        'giro_cliente':GiroCliente,
        'correo_cliente':CorreoElectronico,
        'telefono_cliente':Telefono,
        'es_empresa':es_empresa,
        'vigente':vigente,
        'rut_cliente':rutCliente,
        'dv':digitoVerificador,
        'nombre_cliente':NombreCliente
      };

      $.post(base_url+"index.php/Cliente/GrabarClientes",{
        'prod':miJson
      },function(){
      }).done(function(datos) {
        try {
          var obj = $.parseJSON(datos); // lo convierto a un objeto a json
          $.each(obj,function(index,v) { // recorro el array
          });	//fin each
          $('#modalClientes').modal('hide');
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

      $('#GrabarCliente').prop('disabled', false);
    }//fin validacion de datos
  }


/*
      $.post(base_url+"index.php/Cliente/GrabarClientes",{prod:miJson},function(datos){
      }).done(function() {
        $('#modalClientes').modal('hide');
        table.ajax.reload();
      })
      .fail(function() {
        alert( "Se produjo un error al realizar el proceso, favor vuelva a intentarlo" );
      })
      .always(function() {
      });
    }//fin validacion de datos

}

function grabarCliente(){
  var idCliente=$('#idCliente').val();
  var rutCliente=$('#txtRut').val();
  var digitoVerificador=$('#txtDV').val();
  var NombreCliente=$('#txtNombreCliente').val().toUpperCase().replace(/[,.'"$#%&]+/g, '');
  var RazonSocial=$('#TxtRazonSocial').val();
  var NombreFantasia=$('#TxtNombreFantasia').val().toUpperCase().replace(/[,.'"$#%&]+/g, '');
  var GiroCliente=$('#TxtGiroCliente').val();
  var Direccion=$('#TxtDireccion').val();
  var Ciudad=$('#CboCiudad').val();
  var Comuna=$('#CboComuna').val();
  var Telefono=$('#TxtTelefono').val();
  var CorreoElectronico=$('#TxtCorreoElectronico').val();
  var CondicionDeVenta=$('#CboCondicionDeVenta').val();
  var EsEmpresa=($('#ckEsEmpresa').is(":checked")   ? 1 : 0);
  var Vigente=($('#ckVigente').is(":checked")   ? 1 : 0);

  var msg="";
  if (rutCliente=="") {
    msg="Rut Cliente\n";
  }
  var msg="";
  if (digitoVerificador=="") {
    msg="Digito Verificador Rut\n";
  }
  var msg="";
  if (NombreCliente=="") {
    msg="Nombre Cliente\n";
  }
  var msg="";
  if (RazonSocial=="") {
    msg="Razon Social Cliente\n";
  }
  var msg="";
  if (NombreFantasia=="") {
    msg="Nombre fantasia\n";
  }
  var msg="";
  if (GiroCliente=="") {
    msg="Giro Cliente\n";
  }
  var msg="";
  if (Direccion=="") {
    msg="Direccion Cliente\n";
  }
  var msg="";
  if (Ciudad=="") {
    msg="Ciudad Cliente\n";
  }
  var msg="";
  if (Comuna=="") {
    msg="Comuna Cliente\n";
  }
  var msg="";
  if (Telefono=="") {
    msg="Telefono Cliente\n";
  }
  if (msg.length) {
    swal("Le falta completar los siguiente(s) dato(s):\n"+msg);
  }else{
    $('#GrabarCliente').prop('disabled', true);
    var miJson = {
      'id_cliente':idCliente,
      'rut_cliente':rutCliente,
      'dv':digitoVerificador,
      'nombre_cliente':NombreCliente,
      'razon_social':RazonSocial,
      'nombre_fantasia':NombreFantasia,
      'giro_cliente':GiroCliente,
      'direccion_cliente':Direccion,
      'id_comuna':Comuna,
      'id_ciudad':Ciudad,
      'telefono_cliente':Telefono,
      'correo_cliente':CorreoElectronico,
      'id_condicion_venta':CondicionDeVenta,
      'es_empresa':es_empresa,
      'vigente':vigente,
    };
    $.post(base_url+"index.php/Cliente/GrabarClientes",{
      'prod':miJson
    },function(){
    }).done(function(datos) {
      try {
        var obj = $.parseJSON(datos); // lo convierto a un objeto a json
        $.each(obj,function(index,v) { // recorro el array
        });	//fin each
        $('#modalClientes').modal('hide');
        swal("Listo", "Se grabo con éxito", "success");
        table.ajax.reload();
      } catch (e) {
        let positionError = datos.search("ERROR:");
        swal("Error", "Se produjo un error, favor reintente \n("+e+")\n"+datos.substr(positionError,150), "error");
      }
    })
    .fail(function() {
      swal( "Se produjo un error al realizar el proceso, favor vuelva a intentarlo" );
    });

    $('#GrabarCliente').prop('disabled', false);
  }//fin validacion de datos

}

*/
function ObtenerListadoClientes(){
  let tituloExport="Clientes";
  if ( $.fn.dataTable.isDataTable('#tablaClientes') ) {
    table = $('#tablaClientes').DataTable();
    table.destroy();
  }
  table = $("#tablaClientes").DataTable( {
    "ajax": {
      "url": base_url+"index.php/Cliente/ListadoClientesDatatable"
    },
    "bPaginate":true,
    "bProcessing": true,
    "pageLength": 10,
    "select": true,
    "dom": "Bfrtip",
    "columns": [
      { mData: "id_cliente", className:"text-center", "visible": false } ,
      { mData: "rut_cliente", className:"text-center" } ,
      { mData: "dv", className:"text-center" } ,
      { mData: "nombre_cliente", className:"text-center" } ,
      { mData: "razon_social", className:"text-center" },
      { mData: "nombre_fantasia", className:"text-center" },
      { mData: "giro_cliente", className:"text-center" } ,
      { mData: "direccion_cliente", className:"text-center","visible": false },
      { mData: "nombre_comuna", className:"text-center","visible": false },
      { mData: "nombre_ciudad", className:"text-center","visible": false },
      { mData: "correo_cliente", className:"text-center","visible": false },
      { mData: "telefono_cliente", className:"text-center","visible": false },
      { mData: "vigente", className:"text-center" },
      { mData: "es_empresa", className:"text-center","visible": false },
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

    $('#idCliente').val(rowData[0].id_cliente);
    $('#txtRut').val(rowData[0].rut_cliente);
    $('#txtDV').val(rowData[0].dv);
    $('#txtNombreCliente').val(rowData[0].nombre_cliente);
    $('#TxtRazonSocial').val(rowData[0].razon_social);
    $('#TxtNombreFantasia').val(rowData[0].nombre_fantasia);
    $('#TxtGiroCliente').val(rowData[0].giro_cliente);
    $('#TxtDireccion').val(rowData[0].direccion_cliente);
    llenarCboCiudad(rowData[0].nombre_ciudad);
    llenarCboComuna(rowData[0].nombre_comuna);
    $('#TxtTelefono').val(rowData[0].telefono_cliente);
    $('#TxtCorreoElectronico').val(rowData[0].correo_cliente);
    llenarCboCondicionDeVenta(rowData[0].nombre_condicion_venta);
    if (rowData[0].es_empresa=='<i class="fa fa-check"></i>') {
      $('#ckEsEmpresa').prop('checked', true);
    }else{
      $('#ckEsEmpresa').prop('checked', false);
    }
    if (rowData[0].vigente=='<i class="fa fa-check"></i>') {
      $('#ckVigente').prop('checked', true);
    }else{
      $('#ckVigente').prop('checked', false);
    }
    $('#modalClientes').modal({backdrop: 'static', keyboard: false});

  } )
}//fin obtenerDatos


function llenarCboCiudad(objSelected){
  $.post(base_url+"index.php/Ciudad/Listado_Nombre_Ciudades",{id:""},function(datos){

      var obj = jQuery.parseJSON(datos); // lo convierto a un objeto a json

      tbl="";
      $.each(obj,function(index,v) { // recorro el array
        if (v.nombre_ciudad==objSelected) {
          tbl=tbl+'<option selected value="'+v.id_ciudad+'">'+v.nombre_ciudad+'</option>';
        }else{
          tbl=tbl+'<option value="'+v.id_ciudad+'">'+v.nombre_ciudad+'</option>';
        }
      });	//fin each
      $("#CboCiudad").html(tbl);
      $("#CboCiudad").select2();

    });
}


function llenarCboComuna(objSelected){
  $.post(base_url+"index.php/Comuna/Listado_Nombres_Comunas",{id:""},function(datos){

      var obj = jQuery.parseJSON(datos); // lo convierto a un objeto a json

      tbl="";
      $.each(obj,function(index,v) { // recorro el array
        if (v.nombre_comuna==objSelected) {
          tbl=tbl+'<option selected value="'+v.id_comuna+'">'+v.nombre_comuna+'</option>';
        }else{
          tbl=tbl+'<option value="'+v.id_comuna+'">'+v.nombre_comuna+'</option>';
        }
      });	//fin each
      $("#CboComuna").html(tbl);
      $("#CboComuna").select2();

    });
}


function llenarCboCondicionDeVenta(objSelected){
  $.post(base_url+"index.php/Cliente/Listado_CondicionVenta",{id:""},function(datos){

      var obj = jQuery.parseJSON(datos); // lo convierto a un objeto a json

      tbl="";
      $.each(obj,function(index,v) { // recorro el array
        if (v.nombre_condicion_venta==objSelected) {
          tbl=tbl+'<option selected value="'+v.id_condicion_venta+'">'+v.nombre_condicion_venta+'</option>';
        }else{
          tbl=tbl+'<option value="'+v.id_condicion_venta+'">'+v.nombre_condicion_venta+'</option>';
        }
      });	//fin each
      $("#CboCondicionDeVenta").html(tbl);
      $("#CboCondicionDeVenta").select2();

    });
}

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

function soloNumerosRut(e) {
    var rut = document.getElementById("rut").value;
    if (rut.length < 7) {
        var key = window.Event ? e.which : e.keyCode;
        return key >= 48 && key <= 57;
    } else {
        var key = e.keyCode || e.which;
        var teclado = String.fromCharCode(key).toLowerCase();
        var letra = "123456789k0-";
        if (rut.length < 8) {
            if (letra.indexOf(teclado) == -1) {
                return false;
            }
        }
        if(rut.length == 8 && rut.indexOf("-") == 7){
            var letra = "123456789k0";
            document. getElementById("rut"). setAttribute("maxlength", "9");
            if (rut.length < 9) {
                if (letra.indexOf(teclado) == -1) {
                    return false;
                }
            }
        }
        if(rut.length == 9 && rut.indexOf("-") == 8){
            var letra = "123456789k0";
            document. getElementById("rut"). setAttribute("maxlength", "10");
            if (rut.length < 10) {
                if (letra.indexOf(teclado) == -1) {
                    return false;
                }
            }
        }
    }
}
</script>
