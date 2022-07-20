<?php
defined('BASEPATH') OR exit('No direct script access allowed');


Class Mimpuestos extends CI_Model {
  function __construct(){
    parent:: __construct();

  }


  public function grabarImpuesto($id,$data){
    //$this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
    if($id){
      $this->db->where('id_impuesto', $id);
      $this->db->update('impuesto', $data);
      $consulta=$this->db->query("select ".$id." as id_impuesto");
    }else{
      $this->db->insert('impuesto', $data);
      $consulta=$this->db->query("SELECT CURRVAL('impuesto_id_impuesto_seq'::regclass) as id_tipo_documento");
    }
    return $consulta->result();
  }


  public function ListadoImpuesto(){
  	$query = $this->db->query('select * from impuesto order by nombre_impuesto');
  	return $query->result();
  }


  public function ListadoImpuestoDatatable(){
    // if (strlen($this->session->userdata('nombre_usuario'))==0) {
    //   redirect(base_url());//redireccionar al login
    // }

    //$this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
    $q="select * from impuesto order by nombre_impuesto";
    $consulta=$this->db->query($q);
    $sampleData = $consulta->result();
    $data = array();

    foreach($sampleData as $key) {
      array_push($data, array(
              "id_impuesto" => $key->id_impuesto,
              'nombre_impuesto'=>$key->nombre_impuesto,
              "valor"=>$key->valor,
              'vigente'=>($key->vigente=='t' ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>')
              ));
    }
    $results = array("sEcho" => 1,
                     "iTotalRecords" => count($data),
                     "iTotalDisplayRecords" => count($data),
                     "aaData"=>$data);

    return $results;
  }

}
