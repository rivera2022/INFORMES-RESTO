<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedores extends CI_Controller {

	function __construct(){
		parent:: __construct();
			$this->load->model(Array('Mvendedores'));
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
		$this->load->view('vendedores/vendedores.php');
    $this->load->view('plantillaFooter.php');
		$this->load->view('vendedores/js.php');

	}

	public function getListadoVendedores()
 	{/*
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }*/
 		echo json_encode($this->Mvendedores->getListadoVendedores());
 	}
  public function obtenerListadoVendedoresVigentesDataTable(){
    /*if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }*/
    echo json_encode($this->Mvendedores->obtenerListadoVendedoresVigentesDataTable());
  }

	public function obtenerListadoVendedoresNoVigentesDataTable(){
    /*if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }*/
    echo json_encode($this->Mvendedores->obtenerListadoVendedoresNoVigentesDataTable());
  }
}//end class
