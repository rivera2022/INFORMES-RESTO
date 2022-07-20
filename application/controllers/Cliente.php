<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model(array('Mclientes'));
  }

  public function index() {
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
    $data = array(
      'nombreUsuario' => $this->session->userdata('nombre_usuario'),
    );
		$this->load->view('MenuTop.php',$data);
    $this->load->view('Clientes/Clientes.php');
    $this->load->view('menuFooter.php');
    $this->load->view('Clientes/js.php');
  }


  public function ListadoClientesDatatable()
  {
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
    echo json_encode($this->Mclientes->ListadoClientesDatatable());
  }


  public function GrabarClientes(){
      if (strlen($this->session->userdata('nombre_usuario'))==0) {
        redirect(base_url());//redireccionar al login
      }
      $d = $this->input->post('prod');
      $id =intval($d['id_cliente']);
      $miData=array(
        'rut_cliente'=>$d['rut_cliente'],
        'dv'=>$d['dv'],
        'nombre_cliente'=>$d['nombre_cliente'],
        'razon_social'=>$d['razon_social'],
        'nombre_fantasia'=>$d['nombre_fantasia'],
        'giro_cliente'=>$d['giro_cliente'],
        'direccion_cliente'=>$d['direccion_cliente'],
        'id_comuna'=>$d['id_comuna'],
        'id_ciudad'=>$d['id_ciudad'],
        'telefono_cliente'=>$d['telefono_cliente'],
        'correo_cliente'=>$d['correo_cliente'],
        'id_condicion_venta'=>$d['id_condicion_venta'],
        'es_empresa'=>($d['es_empresa']>0 ? 'true' : 'false'),
        'vigente'=>($d['vigente']>0 ? 'true' : 'false'),
      );

      $r=$this->Mclientes->GrabarClientes($id,$miData);
      echo json_encode($r);

  //  }// fin validacion de usuario

  }// fin Grabar_Clientes

    public function Listado_CondicionVenta()
    {
      if (strlen($this->session->userdata('nombre_usuario'))==0) {
        redirect(base_url());//redireccionar al login
      }
      echo json_encode($this->Mclientes->Listado_CondicionVenta());
    }
}
