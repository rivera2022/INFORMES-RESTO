<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Condicion_pago extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model(array('Mcondicion_pago'));


  }


public function index(){
	if (strlen($this->session->userdata('nombre_usuario'))==0) {
		redirect(base_url());//redireccionar al login
	  }
		$data = array(
			'nombreUsuario' => $this->session->userdata('nombre_usuario'),
		);
		$this->load->view('MenuTop.php',$data);
		$this->load->view('MenuTop.php');
		$this->load->view('Condicion_pago/Condicion_pago.php');
		$this->load->view('menuFooter.php');
		$this->load->view('Condicion_pago/js.php');


}


//grabar condicion de pago



public function grabarCondicionPago(){
	if (strlen($this->session->userdata('nombre_usuario'))==0) {
		redirect(base_url());//redireccionar al login
	}
		$d = $this->input->post('prod');
		$id =intval($d['id_condicion_pago']);
		$miData=array(
			'nombre_condicion_pago'=>$d['nombre_condicion_pago'],
			'vigente'=>($d['vigente']>0 ? 'true' : 'false')
		);
		$r=$this->Mcondicion_pago->grabarCondicionPago($id,$miData);
		echo json_encode($r);
}




public function ListadoCondicionPago(){
	if (strlen($this->session->userdata('nombre_usuario'))==0) {
		redirect(base_url());//redireccionar al login
	}
	echo json_encode($this->Mcondicion_pago->ListadoCondicionPago());
}


//DataTable condicion pago
public function ListadoCondicionPagoDatatable()
{
	if (strlen($this->session->userdata('nombre_usuario'))==0) {
		redirect(base_url());//redireccionar al login
	}
	echo json_encode($this->Mcondicion_pago->ListadoCondicionPagoDatatable());
}








}
