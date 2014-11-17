<?php
class Ventilation_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getVentilations()
	{
		
		$query = $this->db->get('ventilation');
		return $query->result_array();
		

		
	}

}
