<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mcomuna extends CI_Model {
  function __construct(){
    parent:: __construct();

  }

  public function Listado_Comunas_Datatable(){
    // if (strlen($this->session->userdata('nombre_usuario'))==0) {
    //   redirect(base_url());//redireccionar al login
    // }
    //
    // $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
    $q="select c.id_comuna, c.nombre_comuna, ci.nombre_ciudad  from comuna c
    join ciudad ci on c.id_ciudad=ci.id_ciudad
     order by nombre_comuna";
    $consulta=$this->db->query($q);
    $sampleData = $consulta->result();
    $data = array();

    foreach($sampleData as $key) {
      array_push($data, array(
        "id_comuna" => $key->id_comuna,
        'nombre_comuna'=>$key->nombre_comuna,
          'nombre_ciudad'=>$key->nombre_ciudad,
      ));
    }
    $results = array("sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData"=>$data);

    return $results;
  }

  public function Listado_Nombres_Comunas()
  {
    // $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
    $query = $this->db->query("select * from comuna order by nombre_comuna");
    return $query->result();
  }


  public function GrabarComuna($id,$data){ //
    /* if (strlen($this->session->userdata('nombre_usuario'))>0) {
    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);*/
    if($id){
      $this->db->where('id_comuna', $id);
      $this->db->update('comuna', $data);
      $consulta=$this->db->query("select ".$id." as id_comuna");
    }else{
      $this->db->insert('comuna', $data);
      $consulta=$this->db->query("SELECT CURRVAL('comuna_id_comuna_seq'::regclass) as id_comuna");
    }
    return $consulta->result();
  }
}
