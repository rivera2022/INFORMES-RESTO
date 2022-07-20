<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mcajas extends CI_Model {
  function __construct(){
    parent:: __construct();
    $this->load->library('session');
  }

  public function ReporteDeCajasDataTable(){
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());
    }

    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
    $q="select c.id_caja, c.fecha, c.ventas, u.nombre_usuario, t.nombre_turno
    from caja c
    join usuario u on c.id_usuario=u.id_usuario
    join turno t on c.id_turno=t.id_turno";
    $consulta=$this->db->query($q);
    $sampleData = $consulta->result();
    $data = array();

    foreach($sampleData as $key) {
      array_push($data, array(
        "id_caja" => $key->id_caja,
        "fecha" => $key->fecha,
        "ventas" => $key->ventas,
        "nombre_usuario" => $key->nombre_usuario,
        "nombre_turno" => $key->nombre_turno,
      ));
    }
    $results = array("sEcho" => 1,
                     "iTotalRecords" => count($data),
                     "iTotalDisplayRecords" => count($data),
                     "aaData"=>$data);

    return $results;
  }


  public function CantidadDeCajasPorUsuarioDataTable(){
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());
    }

    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
    $q="select u.nombre_usuario,count(c.id_caja)as cantidad
    from caja c
    join usuario u on c.id_usuario=u.id_usuario
    group by u.nombre_usuario";
    $consulta=$this->db->query($q);
    $sampleData = $consulta->result();
    $data = array();

    foreach($sampleData as $key) {
      array_push($data, array(
              "nombre_usuario" => $key->nombre_usuario,
              "cantidad" => $key->cantidad,
              ));
    }
    $results = array("sEcho" => 1,
                     "iTotalRecords" => count($data),
                     "iTotalDisplayRecords" => count($data),
                     "aaData"=>$data);

    return $results;
  }

}
