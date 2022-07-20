<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

	function __construct(){
		parent:: __construct();
			$this->load->model(Array('Mventa'));
    }

	public function index()
	{/*
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}

	$data = array(
			'nombreUsuario' => $this->session->userdata('nombre_usuario'),
			'tdocumento'=>json_decode($this->Mtdocumento->listadoTdocumentos(),TRUE)
	);*/

		$this->load->view('plantillaBase.php');
		$this->load->view('ventas/ventas.php');
		$this->load->view('ventas/js.php');
    $this->load->view('plantillaFooter.php');

	}
}//end class
