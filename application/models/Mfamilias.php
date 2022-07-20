<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mfamilias extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function obtenerListadoFamilia(){
		/*if (strlen($this->session->userdata('nombre_usuario'))==0){
			redirect(base_url());
		}*/
		//$this->db = $this->load->database($this->session->userdata('rut_cliente'), TRUE);
		$query = $this->db->query('select * from familia order by nombre_familia');
		return $query->result();
	}

	public function obtenerListadoFamiliaDataTable(){
		/*if (strlen($this->session->userdata('nombre_usuario'))==0){
			redirect(base_url());
		}*/

		//$this->db = $this->load->database($this->session->userdata('rut_cliente'), TRUE);
		$q = 'SELECT * FROM familia';
		$consulta = $this->db->query($q);
		$sampleData = $consulta->result();
		$data = array();

		foreach($sampleData as $key) {
			array_push($data, array(
				"id_familia" => $key->id_familia,
				'nombre_familia' => $key->nombre_familia,
				'vigente'=>($key->vigente=='t' ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>'),
			));
		}
		$results = array("sEcho" => 1,
						"iTotalRecords" => count($data),
						"iTotalDisplayRecords" => count($data),
						"aaData" => $data);
		return $results;
	}

	public function grabarFamilia($id,$data){
		/*if (strlen($this->session->userdata('nombre_usuario'))==0){
			redirect(base_url());
		}*/
		//$this->db = $this->load->database($this->session->userdata('rut_cliente'), TRUE);
		if($id){
			$this->db->where('id_familia', $id);
			$this->db->update('familia', $data);
			$consulta = $this->db->query("select ".$id." as id_familia");
		}else{
			$this->db->insert('familia', $data);
			$consulta = $this->db->query("SELECT CURRVAL('familia_id_familia_seq'::regclass) as id_familia");
		}
		return $consulta->result();
	}

	public function ListadoNombreFamilia()
  {
    // $this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
    $query = $this->db->query("select * from familia order by nombre_familia

    ");
    return $query->result();
  }
}
