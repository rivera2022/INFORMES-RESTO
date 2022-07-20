<?php
defined('BASEPATH') OR exit('No direct script access allowed');


Class Munidad_medida extends CI_Model {
  function __construct(){
    parent:: __construct();

  }


  public function ListadoUnidadMedida(){
  	$query = $this->db->query('select * from umedida order by nombre_umedida');
  	return $query->result();
  }

  public function grabarUnidadMedida($id,$data){
    //$this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
    if($id){
      $this->db->where('id_umedida', $id);
      $this->db->update('umedida', $data);
      $consulta=$this->db->query("select ".$id." as id_umedida");
    }else{
      $this->db->insert('umedida', $data);
      $consulta=$this->db->query("SELECT CURRVAL('umedida_id_umedida_seq'::regclass) as id_umedida");
    }
		return $consulta->result();
  }





  public function ListadoUnidadMedidaDatatable(){
    /*if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }*/

    //$this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
    $q='select * from umedida order by nombre_umedida';
    $consulta=$this->db->query($q);
    $sampleData = $consulta->result();
    $data = array();

    foreach($sampleData as $key) {
      array_push($data, array(
              "id_umedida" => $key->id_umedida,
              "nombre_umedida"=>$key->nombre_umedida,
              "nombre_corto"=>$key->nombre_corto,
              'vigente'=>($key->vigente=='t' ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>'),
              'fracionable'=>($key->fracionable=='t' ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>')
              ));
    }
    $results = array("sEcho" => 1,
                     "iTotalRecords" => count($data),
                     "iTotalDisplayRecords" => count($data),
                     "aaData"=>$data);

    return $results;
  }


      public function ListadoNombreUmedida()
      {
        // $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
        $query = $this->db->query("select * from umedida");
        return $query->result();
      }



}
