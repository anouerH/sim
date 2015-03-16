<?php
class Rooftype_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getRoofTyes()
	{
		
		$query = $this->db->get('sim_roof_type');
		return $query->result_array();
		

		
	}

}