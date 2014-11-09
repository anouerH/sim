<?php
class Constructionyear_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getConstructionYears()
	{
		
		$query = $this->db->get('construction_year');
		return $query->result_array();
	}

}