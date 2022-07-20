<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Tipo_Vehiculo extends CI_Controller {
	function __construct() {
		parent::__construct();
	$this->load->model(array('Mtipo_vehiculo'/*, 'Mtdocumento'*/));
	}

	public function index(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}
		$data = array(
			'nombreUsuario' => $this->session->userdata('nombre_usuario'),
		);
		$this->load->view('MenuTop.php',$data);
		$this->load->view('tipo_vehiculo/tipo_vehiculo.php');
		$this->load->view('menuFooter.php');
		$this->load->view('tipo_vehiculo/js.php');
	}

	public function obtenerListadoTipoVehiculo(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}
		echo json_encode($this->Mtipo_vehiculo->obtenerListadoTipoVehiculo());
	}

	public function obtenerListadoTipoVehiculoDataTable(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}
		echo json_encode($this->Mtipo_vehiculo->obtenerListadoTipoVehiculoDataTable());
	}

	public function grabarTipoVehiculo(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}
		$d = $this->input->post('prod');
		$id = intval($d['id_tipo_vehiculo']);
		$miData = array(
			'nombre_tipo_vehiculo' => $d['nombre_tipo_vehiculo'],
			'vigente' => $d['vigente'] > 0 ? 'true' : 'false',
		);
		$r = $this->Mtipo_vehiculo->grabarTipoVehiculo($id, $miData);
		echo json_encode($r);
	}

	public function Listado_Nombres_TiposDeVehiculos()
	{
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}
		echo json_encode($this->Mtipo_vehiculo->Listado_Nombres_TiposDeVehiculos());
	}
}
