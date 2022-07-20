<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Familias extends CI_Controller {

	function __construct(){
		parent:: __construct();
			$this->load->model(Array('Mfamilias'));
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
		$this->load->view('familias/familias.php');
	  $this->load->view('familias/js.php');
    $this->load->view('plantillaFooter.php');

	}

	public function obtenerListadoFamiliasDataTable(){
    /*if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }*/
    echo json_encode($this->Mfamilias->obtenerListadoFamiliasDataTable());
  }

	public function CantidadProductosPorFamiliasDataTable(){
    /*if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }*/
    echo json_encode($this->Mfamilias->CantidadProductosPorFamiliasDataTable());
  }
}//end class
//end class
