<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mvendedores extends CI_Model {
  function __construct(){
    parent:: __construct();
    $this->load->library('session');
  }

  public function getListadoVendedores()
  {
    if (strlen($this->session->userdata('nombre_usuario'))>0) {
      $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
      $query = $this->db->query('select u.nombre_usuario, r.nombre_rol  from usuario u
      join rol r on u.id_rol=r.id_rol
      order by u.nombre_usuario');
    }

  }


  public function obtenerListadoVendedoresVigentesDataTable(){
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());
    }

    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
    $q="select u.nombre_usuario, r.nombre_rol  from usuario u
    join rol r on u.id_rol=r.id_rol
    where u.vigente='true'
    order by u.nombre_usuario";
    $consulta=$this->db->query($q);
    $sampleData = $consulta->result();
    $data = array();

    foreach($sampleData as $key) {
      array_push($data, array(
              "nombre_usuario" => $key->nombre_usuario,
              'nombre_rol'=>$key->rol
              ));
    }
    $results = array("sEcho" => 1,
                     "iTotalRecords" => count($data),
                     "iTotalDisplayRecords" => count($data),
                     "aaData"=>$data);

    return $results;
  }

  public function obtenerListadoVendedoresNoVigentesDataTable(){
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());
    }

    $this->db=$this->load->database($this->session->userdata('nombre_usuario'), TRUE);
    $q="select u.nombre_usuario, r.nombre_rol  from usuario u
    join rol r on u.id_rol=r.id_rol
    where u.vigente='false'
    order by u.nombre_usuario";
    $consulta=$this->db->query($q);
    $sampleData = $consulta->result();
    $data = array();

    foreach($sampleData as $key) {
      array_push($data, array(
              "nombre_usuario" => $key->nombre_usuario,
              'nombre_rol'=>$key->rol
              ));
    }
    $results = array("sEcho" => 1,
                     "iTotalRecords" => count($data),
                     "iTotalDisplayRecords" => count($data),
                     "aaData"=>$data);

    return $results;
  }

}
