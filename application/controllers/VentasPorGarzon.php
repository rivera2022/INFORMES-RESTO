<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentasPorGarzon extends CI_Controller {

	function __construct(){
		parent:: __construct();
			$this->load->model(Array('MventasPorGarzon'));
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
		$this->load->view('ventas_por_garzon/ventasPorGarzon.php');
    $this->load->view('plantillaFooter.php');

	}

	public function VentasRealizadasPorGarzonesVigentesDataTable(){
    /*if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }*/
    echo json_encode($this->MventasPorGarzon->VentasRealizadasPorGarzonesVigentesDataTable());
  }

	public function VentasRealizadasPorGarzonesNoVigentesDataTable(){
    /*if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }*/
    echo json_encode($this->MventasPorGarzon->VentasRealizadasPorGarzonesNoVigentesDataTable());
  }


}//end class
