<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mtipo_vehiculo extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function obtenerListadoTipoVehiculo(){
		/*if(strlen($this->session->userdata('nombre_usuario'))>0){
			$this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);*/

			$query = $this->db->query('select * from tipo_vehiculo order by nombre_tipo_vehiculo');
			return $query->result();
		/*}*/
	}

	public function obtenerListadoTipoVehiculoDataTable(){
		/*if(strlen($this->session->userdata('nombre_usuario'))==0){
			redirect(base_url());
		}*/

		//$this->db = $this->load->database($this->session->userdata('rut_cliente'), TRUE);
		$q = 'SELECT * FROM tipo_vehiculo';
		$consulta=$this->db->query($q);
		$sampleData = $consulta->result();
		$data = array();

		foreach ($sampleData as $key){
			array_push($data, array(
				"id_tipo_vehiculo" => $key->id_tipo_vehiculo,
				'nombre_tipo_vehiculo' => $key->nombre_tipo_vehiculo,
				'vigente'=>($key->vigente=='t' ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>'),
			));
		}
		$results = array("sEcho" => 1,
						"iTotalRecords" => count($data),
						"iTotalDisplayRecords" => count($data),
						"aaData" => $data);
		return $results;
	}

	public function grabarTipoVehiculo($id, $data){
		/*if(strlen($this->session->userdata('nombre_usuario'))==0){
			redirect(base_url());
		}*/

		//$this->db = $this->load->database($this->session->userdata('rut_cliente'), TRUE);
		if($id){
			$this->db->where('id_tipo_vehiculo', $id);
			$this->db->update('tipo_vehiculo', $data);
			$consulta = $this->db->query("select ".$id." as id_tipo_vehiculo");
		}else{
			$this->db->insert('tipo_vehiculo', $data);
			$consulta = $this->db->query("SELECT CURRVAL('tipo_vehiculo_id_tipo_vehiculo_seq'::regclass) as id_tipo_vehiculo");
		}
		return $consulta->result();
	}

	public function Listado_Nombres_TiposDeVehiculos()
	{
		//$this->db=$this->load->database($this->session->userdata('rut_cliente'), TRUE);
		$query = $this->db->query("select * from tipo_vehiculo order by nombre_tipo_vehiculo");
		return $query->result();
	}
}
