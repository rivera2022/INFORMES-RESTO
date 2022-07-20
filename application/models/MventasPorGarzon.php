<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class MventasPorGarzon extends CI_Model {
  function __construct(){
    parent:: __construct();
    $this->load->library('session');
  }


  public function VentasRealizadasPorGarzonesVigentesDataTable(){
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());
    }

    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
    $q="select u.nombre_usuario,count(v.id_venta)as cantidad_ventas_realizadas,sum(v.total) as ganacia_ventas_realizadas,sum(v.propina_final) as total_propinas
    from venta v
    join usuario u on v.id_usuario=u.id_usuario
    where u.vigente='true'
    group by u.nombre_usuario";
    $consulta=$this->db->query($q);
    $sampleData = $consulta->result();
    $data = array();

    foreach($sampleData as $key) {
      array_push($data, array(
        "nombre_usuario" => $key->nombre_usuario,
        "cantidad_ventas_realizadas" => $key->cantidad_ventas_realizadas,
        "ganacia_ventas_realizadas" => $key->ganacia_ventas_realizadas,
        "total_propinas" => $key->total_propinas,
      ));
    }
    $results = array("sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData"=>$data);

    return $results;
  }

  public function VentasRealizadasPorGarzonesNoVigentesDataTable(){
    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());
    }

    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
    $q="select u.nombre_usuario,count(v.id_venta)as cantidad_ventas_realizadas,sum(v.total) as ganacia_ventas_realizadas,sum(v.propina_final) as total_propinas
    from venta v
    join usuario u on v.id_usuario=u.id_usuario
    where u.vigente='false'
    group by u.nombre_usuario";
    $consulta=$this->db->query($q);
    $sampleData = $consulta->result();
    $data = array();

    foreach($sampleData as $key) {
      array_push($data, array(
        "nombre_usuario" => $key->nombre_usuario,
        "cantidad_ventas_realizadas" => $key->cantidad_ventas_realizadas,
        "ganacia_ventas_realizadas" => $key->ganacia_ventas_realizadas,
        "total_propinas" => $key->total_propinas,
      ));
    }
    $results = array("sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData"=>$data);

    return $results;
  }


}
