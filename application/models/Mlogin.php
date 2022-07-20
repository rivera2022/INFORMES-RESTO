<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mlogin extends CI_Model {
    function __construct(){
        parent:: __construct();
        $this->load->library('session');
    }

    public function login_user($username,$password)
    {
        $this->db=$this->load->database('default', TRUE);
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('nombre_usuario',$username);
        $this->db->where('clave',$password);
        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            $this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
            redirect(base_url(),'refresh');
        }
    }
}
