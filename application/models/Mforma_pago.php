<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mforma_pago extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function obtenerListadoFormaPago(){
		/*if (strlen($this->session->userdata('nombre_usuario'))>0){*/
			//$this->db = $this->load->database($this->session->userdata('rut_cliente'), TRUE);
			$query = $this->db->query('select * from forma_pago order by nombre_forma_pago');
			return $query->result();
		/*}*/
	}

	public function obtenerListadoFormaPagoDataTable(){
		/*if (strlen($this->session->userdata('nombre_usuario'))==0){
			redirect(base_url());
		}*/

		//$this->db = $this->load->database($this->session->userdata('rut_cliente'), TRUE);
		$q = 'SELECT * FROM forma_pago';
		$consulta = $this->db->query($q);
		$sampleData = $consulta->result();
		$data = array();

		foreach($sampleData as $key){
			array_push($data, array(
				'id_forma_pago' => $key->id_forma_pago,
				'nombre_forma_pago' => $key->nombre_forma_pago,
				'vigente'=>($key->vigente=='t' ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>'),
			));
		}
		$results = array("sEcho" => 1,
						"iTotalRecords" => count($data),
						"iTotalDisplayRecords" => count($data),
						"aaData" => $data);
		return $results;
	}

	public function grabarFormaPago($id, $data){
		/*if (strlen($this->session->userdata('nombre_usuario'))==0){
			redirect(base_url());
		}*/
		//$this->db = $this->load->database($this->session->userdata('rut_cliente'), TRUE);
		if($id){
			$this->db->where('id_forma_pago', $id);
			$this->db->update('forma_pago', $data);
			$consulta = $this->db->query("select ".$id." as id_forma_pago");
		}else{
			$this->db->insert('forma_pago', $data);
			$consulta = $this->db->query("SELECT CURRVAL('forma_pago_id_forma_pago_seq'::regclass) as id_forma_pago");
		}
		return $consulta->result();
	}
}
