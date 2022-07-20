<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Impuestos extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model(array('Mimpuestos'));


  }

public function index(){
	if (strlen($this->session->userdata('nombre_usuario'))==0) {
		redirect(base_url());//redireccionar al login
	}
	$data = array(
		'nombreUsuario' => $this->session->userdata('nombre_usuario'),
	);
	$this->load->view('MenuTop.php',$data);
	$this->load->view('Impuestos/Impuestos.php');
	$this->load->view('menuFooter.php');
	$this->load->view('Impuestos/js.php');
}


public function grabarImpuesto(){
	if (strlen($this->session->userdata('nombre_usuario'))==0) {
		redirect(base_url());//redireccionar al login
	}
  	$d = $this->input->post('prod');
	$id =intval($d['id_impuesto']);
  	$miData=array(
  		'nombre_impuesto'=>$d['nombre_impuesto'],
        'valor'=>$d['valor'],
  		'vigente'=>($d['vigente']>0 ? 'true' : 'false')
  	);
  	$r=$this->Mimpuestos->grabarImpuesto($id,$miData);
  	echo json_encode($r);
}

  public function ListadoImpuesto(){
	if (strlen($this->session->userdata('nombre_usuario'))==0) {
		redirect(base_url());//redireccionar al login
	}
  	echo json_encode($this->Mimpuestos->ListadoImpuesto());
  }


  //DataTable condicion pago
  public function ListadoImpuestoDatatable()
  {
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
		redirect(base_url());//redireccionar al login
	}
    echo json_encode($this->Mimpuestos->ListadoImpuestoDatatable());
  }

}
