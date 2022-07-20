<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mfamilias extends CI_Model {
  function __construct(){
    parent:: __construct();
  }

  public function obtenerListadoFamiliasDataTable(){
  /*  if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());
    }

    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);*/
    $q="select * from familia";
    $consulta=$this->db->query($q);
    $sampleData = $consulta->result();
    $data = array();

    foreach($sampleData as $key) {
      array_push($data, array(
              "nombre_familia" => $key->nombre_familia,
              ));
    }
    $results = array("sEcho" => 1,
                     "iTotalRecords" => count($data),
                     "iTotalDisplayRecords" => count($data),
                     "aaData"=>$data);

    return $results;
  }

  public function CantidadProductosPorFamiliasDataTable(){
  /*  if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());
    }

    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);*/
    $q="select f.nombre_familia,count(p.id_producto)as cantidad
    from producto p
    join familia f on p.id_familia=f.id_familia
    group by f.nombre_familia";
    $consulta=$this->db->query($q);
    $sampleData = $consulta->result();
    $data = array();

    foreach($sampleData as $key) {
      array_push($data, array(
              "nombre_familia" => $key->nombre_familia,
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
