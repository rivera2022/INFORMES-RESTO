<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidad_Medida extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model(array('Munidad_medida'));
  }


	public function index(){
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }
    $data = array(
      'nombreUsuario' => $this->session->userdata('nombre_usuario'),
    );
		$this->load->view('MenuTop.php',$data);
		$this->load->view('Unidad_medida/Unidad_Medida.php');
		$this->load->view('menuFooter.php');
		$this->load->view('Unidad_medida/js.php');
	}

public function grabarUnidadMedida(){
  if (strlen($this->session->userdata('nombre_usuario'))==0) {
    redirect(base_url());//redireccionar al login
  }
      $d = $this->input->post('prod');
      $id =intval($d['id_umedida']);
      $miData=array(
        'nombre_umedida'=>$d['nombre_umedida'],
        'nombre_corto'=>$d['nombre_corto'],
        'vigente'=>$d['vigente'],
				'fracionable'=>$d['fracionable'],
      );

      $r=$this->Munidad_medida->grabarUnidadMedida($id,$miData);
      echo json_encode($r);

}



public function ListadoUnidadMedida(){
	if (strlen($this->session->userdata('nombre_usuario'))==0) {
    redirect(base_url());//redireccionar al login
  }
	echo json_encode($this->Munidad_medida->ListadoUnidadMedida());
}

//DataTable Unidad Medida
public function ListadoUnidadMedidaDatatable()
{
  if (strlen($this->session->userdata('nombre_usuario'))==0) {
    redirect(base_url());//redireccionar al login
  }
  echo json_encode($this->Munidad_medida->ListadoUnidadMedidaDatatable());
}

public function ListadoNombreUmedida()
{
  if (strlen($this->session->userdata('nombre_usuario'))==0) {
    redirect(base_url());//redireccionar al login
  }
  echo json_encode($this->Munidad_medida->ListadoNombreUmedida());
}





}
