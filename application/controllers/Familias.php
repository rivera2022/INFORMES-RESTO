<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Familias extends CI_Controller {
	function __construct() {
		parent::__construct();
	$this->load->model(array('Mfamilias', /*'Mtipo_documento'*/));
	}

	public function index() {
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}
		$data = array(
			'nombreUsuario' => $this->session->userdata('nombre_usuario'),
		);
		$this->load->view('MenuTop.php',$data);
		$this->load->view('familias/familias.php');
		$this->load->view('menuFooter.php');
		$this->load->view('familias/js.php');
	}

	public function obtenerListadoFamilia(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}else{
			echo json_encode($this->Mfamilias->obtenerListadoFamilia());
		}
	}

	public function obtenerListadoFamiliaDataTable(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}
		echo json_encode($this->Mfamilias->obtenerListadoFamiliaDataTable());
	}

	public function grabarFamilia(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}
		$d = $this->input->post('prod');
		$id = intval($d['id_familia']);
		$miData = array(
			'nombre_familia' => $d['nombre_familia'],
			'vigente' => $d['vigente'] >0 ? 'true' : 'false',
		);
		$r = $this->Mfamilias->grabarFamilia($id, $miData);
		echo json_encode($r);
	}

	public function ListadoNombreFamilia(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}
		echo json_encode($this->Mfamilias->ListadoNombreFamilia());
	}
}
