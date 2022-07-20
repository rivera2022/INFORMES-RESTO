<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Tipo_Despacho extends CI_Controller {
	function __construct() {
		parent::__construct();
	$this->load->model(array('Mtipo_despacho'/*, 'Mtdocumento'*/));
	}

	public function index() {
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		  }
		$data = array(
			'nombreUsuario' => $this->session->userdata('nombre_usuario'),
		);
		$this->load->view('MenuTop.php',$data);
		$this->load->view('tipo_despacho/tipo_despacho.php');
		$this->load->view('menuFooter.php');
		$this->load->view('tipo_despacho/js.php');
	}

	public function obtenerListadoTipoDespacho(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		  }
		echo json_encode($this->Mtipo_despacho->obtenerListadoTipoDespacho());
	}

	public function obtenerListadoTipoDespachoDataTable(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		  }
		echo json_encode($this->Mtipo_despacho->obtenerListadoTipoDespachoDataTable());
	}

	public function grabarTipoDespacho(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		  }
		$d = $this->input->post('prod');
		$id = intval($d['id_tipo_despacho']);
		$miData = array(
			'nombre_tipo_despacho' => $d['nombre_tipo_despacho'],
			'vigente' => $d['vigente'] >0 ? 'true' : 'false',
		);
		$r = $this->Mtipo_despacho->grabarTipoDespacho($id, $miData);
		echo json_encode($r);
	}
}
