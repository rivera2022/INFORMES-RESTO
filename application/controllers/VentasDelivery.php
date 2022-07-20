<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentasDelivery extends CI_Controller {

	function __construct(){
		parent:: __construct();
			$this->load->model(Array('MventasDelivery'));
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
		$this->load->view('ventas_por_delivery/VentasDelivery.php');
    $this->load->view('plantillaFooter.php');

	}
}//end class
