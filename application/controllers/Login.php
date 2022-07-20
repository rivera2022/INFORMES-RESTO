<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Login extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->library(array('session','form_validation','parser'));
		$this->load->helper('url_helper');
        $this->load->model(array('Mlogin', /*'Mtipo_documento'*/));
    }

public function index(){
    $this->load->view('Login/login.php');
    if ($this->session->userdata('nombre_usuario')) {
        redirect(base_url().'index.php/Unidad_medida');
    }else{
        $this->load->view('Login/login.php');
    }
}



public function new_user(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $check_user = $this->Mlogin->login_user($username,$password);
    if($check_user == TRUE){
        $data = array(
            'rut_cliente'   => '77.115.675-4'   //$check_user->rut_cliente
        );
		$this->session->set_userdata($data);
		//	$dte = $this->Mconfiguracion->obtenerConfiguracionSistema();
			$data = array(
				'is_logued_in'  =>    TRUE,
				'id_usuario'  	=>    $check_user->id_usuario,
				'rut_cliente'   =>  '77.115.675-4',
				'nombre_usuario'=>     $check_user->nombre_usuario,
				'id_caja'=>     123,
				'user_dte'=>'77115675-4',//	$dte[0]->usuario_dte,
				'pass_dte'=>'123456',//$dte[0]->clave_usuario_dte,
				'terminal'=> ''

			);
			$this->session->set_userdata($data);
			//var_dump($data);
      //$counter = 0;
        $this->index();
    }else{
        redirect(base_url());
    }
}
public function logout_ci(){
    $this->session->unset_userdata('nombre_usuario');
    //$this->session->unset_userdata('rol');
    $this->session->sess_destroy();
    //$this->index();
		redirect(base_url());//redireccionar al login
}
/*
	public function relogin()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $check_user = $this->login_model->login_user($username,$password);
		$dte = $this->login_model->login_dte();
		//var_dump($dte);

    if($check_user == TRUE)
    {
      $data = array(
        'is_logued_in'  =>    TRUE,
        'usuario_id'  =>    $check_user->id_usuario,
        'cargo'   =>    $check_user->nombre_rol,
        //'username'    =>    $check_user->nick,
        //'email'     =>    $check_user->correo_electronico,
        'nombre'    =>      $check_user->nombre_usuario,
        'rol' => $check_user->id_rol,
        'rut_dte' => $dte->rut_empresa,
        'ciudad' => $dte->nombre_comuna,
        'giro' => $dte->giro,
        'comuna' =>$dte->nombre_comuna,
        'razon_social' => $dte->razon_social,
				'direccion' => $dte->direccion_empresa,
				'user_dte' => $dte->user_dte,
				'pass_dte' => $dte->pass_dte,
				'bodega' => $check_user->id_bodega
      );
      $this->session->set_userdata($data);
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(1));
    }else{
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(0));
    }
  }

	public function validarSesion(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			redirect(base_url());//redireccionar al login
		}
	}
	public function consultaSesionValida(){
		if (strlen($this->session->userdata('nombre_usuario'))==0) {
			echo false;
		}else{
			echo true;
		}
	}

  public function logout_ci()
  {
    $this->session->unset_userdata('nombre_usuario');
    //$this->session->unset_userdata('rol');
    $this->session->sess_destroy();
    //$this->index();
		redirect(base_url());//redireccionar al login
  }
*/
}
