<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ciudad extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model(array('Mciudad'));
  }

  public function index() {
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
    $data = array(
      'nombreUsuario' => $this->session->userdata('nombre_usuario'),
    );
		$this->load->view('MenuTop.php',$data);
    $this->load->view('Ciudad/Ciudad.php');
    $this->load->view('menuFooter.php');
    $this->load->view('Ciudad/js.php');
  }


  public function Listado_Nombre_Ciudades_Datatable()
  {
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
    echo json_encode($this->Mciudad->Listado_Nombre_Ciudades_Datatable());
  }


  public function Grabar_Ciudad(){
      if (strlen($this->session->userdata('nombre_usuario'))==0) {
        redirect(base_url());//redireccionar al login
      }
      $d = $this->input->post('prod');
      $id =intval($d['id_ciudad']);
      $miData=array(
        'nombre_ciudad'=>$d['nombre_ciudad']
      );

      $r=$this->Mciudad->Grabar_Ciudad($id,$miData);
      echo json_encode($r);

//    }// fin validacion de usuario

  }// fin Grabar_Ciudad


    public function Listado_Nombre_Ciudades()
    {
      if (strlen($this->session->userdata('nombre_usuario'))==0) {
        redirect(base_url());//redireccionar al login
      }
      
      echo json_encode($this->Mciudad->Listado_Nombre_Ciudades());
    }


}
