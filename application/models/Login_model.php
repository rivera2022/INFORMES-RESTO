<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login_model extends CI_Model {
  function __construct(){
    parent:: __construct();
    $this->load->library('session');
  }

  public function login_user($username,$password)
  {
    $this->db=$this->load->database('default', TRUE);
    //$this->db->select('usuario.*','cliente.*');
    $this->db->select('*');
    //$this->db->select('usuario.*, rol.nombre_rol');
    $this->db->from('usuario');
    $this->db->join('cliente', 'usuario.id_cliente = cliente.id_cliente');
    $this->db->where('nombre_usuario',$username);
    $this->db->where('clave',$password);
    $query = $this->db->get();
    if($query->num_rows() == 1)
    {
      return $query->row();
    }else{
      $this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
      redirect(base_url(),'refresh');
    }
  }

  public function login_dte()
  {
    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
    $query = $this->db->query('select e.*, c.nombre_comuna,
      (select co.usuario_dte from configuracion co) as user_dte,
      (select co.clave_usuario_dte from configuracion co) as pass_dte
      from empresa e inner join comuna c on c.id_comuna = e.id_comuna');
    return $query->row();
  }


}
