<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mclientes extends CI_Model {
  function __construct(){
    parent:: __construct();

  }

  public function ListadoClientesDatatable(){
  /*  if (strlen($this->session->userdata('nombre_usuario'))==0) {
      redirect(base_url());//redireccionar al login
    }

    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);*/
    $q="select c.rut_cliente, c.dv, c.nombre_cliente, c.id_cliente,c.razon_social,c.nombre_fantasia,c.direccion_cliente,
    c.giro_cliente,c.correo_cliente,c.telefono_cliente, c.vigente,c.es_empresa,
    (select co.nombre_comuna from comuna co where co.id_comuna=c.id_comuna),
    (select ci.nombre_ciudad from ciudad ci where ci.id_ciudad=c.id_ciudad)
    from cliente c
    ";
    $consulta=$this->db->query($q);
    $sampleData = $consulta->result();
    $data = array();

    foreach($sampleData as $key) {
      array_push($data, array(
        "id_cliente" => $key->id_cliente,
        "rut_cliente" => $key->rut_cliente,
        "dv" => $key->dv,
        "nombre_cliente" => $key->nombre_cliente,
        'razon_social'=>$key->razon_social,
        'nombre_fantasia'=>$key->nombre_fantasia,
        "giro_cliente" => $key->giro_cliente,
        "direccion_cliente" => $key->direccion_cliente,
        'nombre_comuna'=>$key->nombre_comuna,
        'nombre_ciudad'=>$key->nombre_ciudad,
        'correo_cliente'=>$key->correo_cliente,
        'telefono_cliente'=>$key->telefono_cliente,
        'vigente'=>($key->vigente=='t' ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>'),
        'es_empresa'=>($key->es_empresa=='t' ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>'),
      ));
    }
    $results = array("sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData"=>$data);

    return $results;
  }

  public function GrabarClientes($id,$data){ //
    /* if (strlen($this->session->userdata('nombre_usuario'))>0) {
    $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);*/
    if($id){
      $this->db->where('id_cliente', $id);
      $this->db->update('cliente', $data);
      $consulta=$this->db->query("select ".$id." as id_cliente");
    }else{
      $this->db->insert('cliente', $data);
      $consulta=$this->db->query("SELECT CURRVAL('cliente_id_cliente_seq'::regclass) as id_cliente");
    }
    return $consulta->result();
  }


    public function Listado_CondicionVenta()
    {
      // $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
      $query = $this->db->query("select * from condicion_venta where vigente='true' order by nombre_condicion_venta");
      return $query->result();
    }
}
