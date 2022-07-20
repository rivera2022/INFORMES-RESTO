
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehiculo extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model(array('Mvehiculo' ));
  }

  public function index() {
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
    $data = array(
      'nombreUsuario' => $this->session->userdata('nombre_usuario'),
    );
		$this->load->view('MenuTop.php',$data);
    $this->load->view('Vehiculo/Vehiculo.php');
    $this->load->view('menuFooter.php');
    $this->load->view('Vehiculo/js.php');
  }


  public function Listado_Vehiculo_Datatable()
  {
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
    echo json_encode($this->Mvehiculo->Listado_Vehiculo_Datatable());
  }


  public function GrabarVehiculo(){
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
    $d = $this->input->post('prod');
    $id =intval($d['id_vehiculo']);
    $miData=array(
      'id_tipo_vehiculo'=>$d['id_tipo_vehiculo'],
      'patente_vehiculo'=>$d['patente_vehiculo'],
      'capacidad_vehiculo'=>$d['capacidad_vehiculo'],
      'vigente'=>$d['vigente']
    );

    $r=$this->Mvehiculo->GrabarVehiculo($id,$miData);
    echo json_encode($r);
  }// fin Grabar_Vehiculo
}
