<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_Documento extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model(array('Mtipo_documento'));
  }


	public function index(){
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
      $data = array(
        'nombreUsuario' => $this->session->userdata('nombre_usuario'),
      );
      $this->load->view('MenuTop.php',$data);
			$this->load->view('Tipo_Documento/Tipo_Documento.php');
			$this->load->view('menuFooter.php');
			$this->load->view('Tipo_Documento/js.php');


	}


  public function grabarTipoDocumento(){
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}
        $d = $this->input->post('prod');
        $id =intval($d['id_tipo_documento']);
        $miData=array(
          'nombre_documento'=>$d['nombre_documento'],
          'codigo_tributario'=>$d['codigo_tributario'],
          'vigente'=>$d['vigente'],
        );

        $r=$this->Mtipo_documento->grabarTipoDocumento($id,$miData);
        echo json_encode($r);

  }

	
	public function ListadoTipoDocumento(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		  }
		echo json_encode($this->Mtipo_documento->ListadoTipoDocumento());
	}

  //DataTable Tipo Documento
  public function ListadoTipoDocumentoDatatable()
  {
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}
    echo json_encode($this->Mtipo_documento->ListadoTipoDocumentoDatatable());
  }

}
