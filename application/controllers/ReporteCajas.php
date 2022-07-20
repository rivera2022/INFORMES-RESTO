<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteCajas extends CI_Controller {

	function __construct(){
		parent:: __construct();
			$this->load->model(Array('Mcajas'));
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
		$this->load->view('cajas/cajas.php');
    $this->load->view('plantillaFooter.php');

	}

	public function ReporteDeCajasDataTable(){
    /*if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }*/
    echo json_encode($this->Mcajas->ReporteDeCajasDataTable());
  }

	public function CantidadDeCajasPorUsuarioDataTable(){
    /*if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }*/
    echo json_encode($this->Mcajas->CantidadDeCajasPorUsuarioDataTable());
  }
}//end class
//end class
