<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mciudad extends CI_Model {
  function __construct(){
    parent:: __construct();

  }

  public function Listado_Nombre_Ciudades_Datatable(){
/*    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }

    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);*/
    $q="select id_ciudad, nombre_ciudad from ciudad
    order by nombre_ciudad";
    $consulta=$this->db->query($q);
    $sampleData = $consulta->result();
    $data = array();

    foreach($sampleData as $key) {
      array_push($data, array(
        "id_ciudad" => $key->id_ciudad,
        'nombre_ciudad'=>$key->nombre_ciudad
      ));
    }
    $results = array("sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData"=>$data);

    return $results;
  }

  public function Grabar_Ciudad($id,$data){ //
    /* if (strlen($this->session->userdata('nombre_usuario'))>0) {
    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE); */
    if($id){
      $this->db->where('id_ciudad', $id);
      $this->db->update('ciudad', $data);
      $consulta=$this->db->query("select ".$id." as id_ciudad");
    }else{
      $this->db->insert('ciudad', $data);
      $consulta=$this->db->query("SELECT CURRVAL('ciudad_id_ciudad_seq'::regclass) as id_ciudad");
    }
    return $consulta->result();
  }


    public function Listado_Nombre_Ciudades()
    {
      // $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
      $query = $this->db->query("select * from ciudad order by nombre_ciudad");
      return $query->result();
    }
}
