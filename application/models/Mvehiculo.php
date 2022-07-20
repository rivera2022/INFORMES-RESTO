<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mvehiculo extends CI_Model {
  function __construct(){
    parent:: __construct();

  }

  public function Listado_Vehiculo_Datatable(){
  /*  if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }

    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);*/
    $q="select v.id_vehiculo,tv.nombre_tipo_vehiculo,v.patente_vehiculo,v.capacidad_vehiculo, v.vigente from vehiculo v
    join tipo_vehiculo tv on v.id_tipo_vehiculo=tv.id_tipo_vehiculo
    order by v.id_vehiculo";
    $consulta=$this->db->query($q);
    $sampleData = $consulta->result();
    $data = array();

    foreach($sampleData as $key) {
      array_push($data, array(
        "id_vehiculo" => $key->id_vehiculo,
        'nombre_tipo_vehiculo'=>$key->nombre_tipo_vehiculo,
        'patente_vehiculo'=>$key->patente_vehiculo,
        'capacidad_vehiculo'=>$key->capacidad_vehiculo,
        'vigente'=>($key->vigente=='t' ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>'),
      ));
    }
    $results = array("sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData"=>$data);

    return $results;
  }

  public function GrabarVehiculo($id,$data){ //
    /* if (strlen($this->session->userdata('nombre_usuario'))>0) {
     $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);*/
    if($id){
      $this->db->where('id_vehiculo', $id);
      $this->db->update('vehiculo', $data);
      $consulta=$this->db->query("select ".$id." as id_vehiculo");
    }else{
      $this->db->insert('vehiculo', $data);
      $consulta=$this->db->query("SELECT CURRVAL('vehiculo_id_vehiculo_seq'::regclass) as id_vehiculo");
    }
    return $consulta->result();
  }
}
