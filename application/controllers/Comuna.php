<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comuna extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model(array('Mcomuna','Mciudad'));
  }

  public function index() {
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
    $data = array(
      'nombreUsuario' => $this->session->userdata('nombre_usuario'),
    );
		$this->load->view('MenuTop.php',$data);
    $this->load->view('Comunas/Comunas.php');
    $this->load->view('menuFooter.php');
    $this->load->view('Comunas/js.php');
  }


  public function Listado_Comunas_Datatable()
  { 
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
    echo json_encode($this->Mcomuna->Listado_Comunas_Datatable());
  }

  public function Listado_Nombres_Comunas()
  {
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
    echo json_encode($this->Mcomuna->Listado_Nombres_Comunas());
  }

  public function GrabarComuna(){
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
      $d = $this->input->post('prod');
      $id =intval($d['id_comuna']);
      $miData=array(
        'nombre_comuna'=>$d['nombre_comuna'],
        'id_ciudad'=>$d['id_ciudad']
      );

      $r=$this->Mcomuna->GrabarComuna($id,$miData);
      echo json_encode($r);

  //  }// fin validacion de usuario

  }// fin Grabar_Comuna
}
