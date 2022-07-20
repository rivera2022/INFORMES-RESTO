<?php
defined('BASEPATH') OR exit('No direct script access allowed');


Class Mtipo_documento extends CI_Model {
  function __construct(){
    parent:: __construct();

  }


  public function grabarTipoDocumento($id,$data){
    //$this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
    if($id){
      $this->db->where('id_tipo_documento', $id);
      $this->db->update('tipo_documento', $data);
      $consulta=$this->db->query("select ".$id." as id_tipo_documento");
    }else{
      $this->db->insert('tipo_documento', $data);
      $consulta=$this->db->query("SELECT CURRVAL('tipo_documento_id_tipo_documento_seq'::regclass) as id_tipo_documento");
    }
		return $consulta->result();
  }


//datatable Tipo Documento

public function ListadoTipoDocumento(){
	$query = $this->db->query('select * from condicion_pago order by nombre_condicion_pago');
	return $query->result();
}

public function ListadoTipoDocumentoDatatable(){
  /*if (strlen($this->session->userdata('nombre_usuario'))==0) {
    redirect(base_url());//redireccionar al login
  }*/

  //$this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
  $q='SELECT * FROM tipo_documento';
  $consulta=$this->db->query($q);
  $sampleData = $consulta->result();
  $data = array();

  foreach($sampleData as $key) {
    array_push($data, array(
            "id_tipo_documento" => $key->id_tipo_documento,
            "nombre_documento"=>$key->nombre_documento,
            "codigo_tributario"=>$key->codigo_tributario,
            'vigente'=>($key->vigente=='t' ?'<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>')
            ));
  }
  $results = array("sEcho" => 1,
                   "iTotalRecords" => count($data),
                   "iTotalDisplayRecords" => count($data),
                   "aaData"=>$data);

  return $results;
}









}
