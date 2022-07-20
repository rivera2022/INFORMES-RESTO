<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mproductos extends CI_Model {
  function __construct(){
    parent:: __construct();

  }

  public function ListadoProductosDatatable(){
/*    if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }

    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);*/
    $q="select p.id_producto, p.nombre_producto,f.nombre_familia, u.nombre_umedida,
    p.neto, p.costo, p.inventariable, p.vigente from producto p
    join familia f on p.id_familia=f.id_familia
    join umedida u on p.id_umedida=u.id_umedida
    order by p.nombre_producto";
    $consulta=$this->db->query($q);
    $sampleData = $consulta->result();
    $data = array();

    foreach($sampleData as $key) {
      array_push($data, array(
        "id_producto" => $key->id_producto,
        "nombre_producto" => $key->nombre_producto,
        'nombre_familia'=>$key->nombre_familia,
        'nombre_umedida'=>$key->nombre_umedida,
        "neto" => $key->neto,
        'costo'=>$key->costo,
        "inventariable"=>($key->inventariable=='t' ? 'SI' : 'NO'),
        'vigente'=>($key->vigente=='t' ? 'SI' : 'NO')
      ));
    }
    $results = array("sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData"=>$data);

    return $results;
  }

  public function GrabarProducto($id,$data){ //
    /* if (strlen($this->session->userdata('nombre_usuario'))>0) {
    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE); */
    if($id){
      $this->db->where('id_producto', $id);
      $this->db->update('producto', $data);
      $consulta=$this->db->query("select ".$id." as id_producto");
    }else{
      $this->db->insert('producto', $data);
      $consulta=$this->db->query("SELECT CURRVAL('producto_id_producto_seq'::regclass) as id_producto");
    }
    return $consulta->result();
  }
}
