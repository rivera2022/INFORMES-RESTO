<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class productos extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model(array('Mproductos'));
  }

  public function index() {
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
    $data = array(
      'nombreUsuario' => $this->session->userdata('nombre_usuario'),
    );
		$this->load->view('MenuTop.php',$data);
    $this->load->view('productos/productos.php');
    $this->load->view('menuFooter.php');
    $this->load->view('productos/js.php');
  }


  public function ListadoProductosDatatable()
  {
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
    echo json_encode($this->Mproductos->ListadoProductosDatatable());
  }


  public function GrabarProducto(){
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
      $d = $this->input->post('prod');
      $id =intval($d['id_producto']);
      $miData=array(
        'nombre_producto'=>$d['nombre_producto'],
        'id_familia'=>$d['id_familia'],
        'id_umedida'=>$d['id_umedida'],
        'neto'=>$d['neto'],
        'costo'=>$d['costo'],
        'inventariable'=>($d['inventariable']>0 ? 'true' : 'false'),
        'vigente'=>($d['vigente']>0 ? 'true' : 'false'),
      );

      $r=$this->Mproductos->GrabarProducto($id,$miData);
      echo json_encode($r);

  //  }// fin validacion de usuario

  }// fin Grabar_Clientes
}
