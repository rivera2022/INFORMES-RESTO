<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forma_Pago extends CI_Controller {
	function __construct() {
		parent::__construct();
	$this->load->model(array('Mforma_pago'/*, 'Mtipo_documento'*/));
	}

	public function index() {
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		  }
		$data = array(
			'nombreUsuario' => $this->session->userdata('nombre_usuario'),
		);
		$this->load->view('MenuTop.php',$data);
		$this->load->view('forma_Pago/forma_pago.php');
		$this->load->view('menuFooter.php');
		$this->load->view('forma_pago/js.php');	
	}

	public function obtenerListadoFormaPago(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}
		echo json_encode($this->Mforma_pago->obtenerListadoFpago());
	}

	public function obtenerListadoFormaPagoDataTable(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}
		echo json_encode($this->Mforma_pago->obtenerListadoFormaPagoDataTable());
	}

	public function grabarFormaPago(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}

		$d = $this->input->post('prod');
		$id= intval($d['id_forma_pago']);
		$miData = array(
			'nombre_forma_pago' => $d['nombre_forma_pago'],
			'vigente' => ($d['vigente'] > 0 ? 'true' : 'false')
		);

		$r = $this->Mforma_pago->grabarFormaPago($id, $miData);
		echo json_encode($r);
	}
}
