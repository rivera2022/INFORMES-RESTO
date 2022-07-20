<?php
defined('BASEPATH') OR exit('No direct script access allowed');


Class Mcondicion_pago extends CI_Model {
  function __construct(){
    parent:: __construct();

  }



public function grabarCondicionPago($id,$data){
  //$this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
  if($id){
    $this->db->where('id_condicion_pago', $id);
    $this->db->update('condicion_pago', $data);
    $consulta=$this->db->query("select ".$id." as id_condicion_pago");
  }else{
    $this->db->insert('condicion_pago', $data);
    $consulta=$this->db->query("SELECT CURRVAL('condicion_pago_id_condicion_pago_seq'::regclass) as id_tipo_documento");
  }
  return $consulta->result();
}



public function ListadoTipoDocumento(){
	$query = $this->db->query('select * from tipo_documento order by nombre_tipo_documento');
	return $query->result();
}


//DataTable condicion pago

public function ListadoCondicionPagoDatatable(){
  // if (strlen($this->session->userdata('nombre_usuario'))==0) {
  //   redirect(base_url());//redireccionar al login
  // }

  //$this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
  $q="select * from condicion_pago order by nombre_condicion_pago";
  $consulta=$this->db->query($q);
  $sampleData = $consulta->result();
  $data = array();

  foreach($sampleData as $key) {
    array_push($data, array(
            "id_condicion_pago" => $key->id_condicion_pago,
            'nombre_condicion_pago'=>$key->nombre_condicion_pago,
            "vigente"=>$key->vigente,
            ));
  }
  $results = array("sEcho" => 1,
                   "iTotalRecords" => count($data),
                   "iTotalDisplayRecords" => count($data),
                   "aaData"=>$data);

  return $results;
}


}
