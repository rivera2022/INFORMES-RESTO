<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mtipo_despacho extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function obtenerListadoTipoDespacho(){
		/*if (strlen($this->session->userdata('nombre_usuario'))>0){
			$this->db = $this->load->database($this->session->userdata('rut_cliente'), TRUE);*/
			$query = $this->db->query('select * from tipo_despacho order by nombre_tipo_despacho');
			return $query->result();
		/*}*/
		
	}

	public function obtenerListadoTipoDespachoDataTable(){
		/*if (strlen($this->session->userdata('nombre_usuario'))==0){
			redirect(base_url());
		}*/
		
		//$this->db = $this->load->database($this->session->userdata('rut_cliente'), TRUE);
		$q = "SELECT * FROM tipo_despacho";
		$consulta=$this->db->query($q);
		$sampleData = $consulta->result();
		$data = array();
		
		foreach ($sampleData as $key){
			array_push($data, array(
				"id_tipo_despacho" => $key->id_tipo_despacho,
				'nombre_tipo_despacho' => $key->nombre_tipo_despacho,
				'vigente'=>($key->vigente=='t' ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>'),
			));
		}
		$results = array("sEcho" => 1,
						"iTotalRecords" => count($data),
						"iTotalDisplayRecords" => count($data),
						"aaData" => $data);
		return $results;
	}

	public function grabarTipoDespacho($id, $data){
		/*if (strlen($this->session->userdata('nombre_usuario'))==0){
			redirect(base_url());
		}*/
		
		//$this->db = $this->load->database($this->session->userdata('rut_cliente'), TRUE);
		if($id){
			$this->db->where('id_tipo_despacho', $id);
			$this->db->update('tipo_despacho', $data);
			$consulta = $this->db->query("select ".$id." as id_tipo_despacho");
		}else{
			$this->db->insert('tipo_despacho', $data);
			$consulta = $this->db->query("SELECT CURRVAL('tipo_despacho_id_tipo_despacho_seq'::regclass) as id_tipo_despacho");
		}
		return $consulta->result();
	}
}
