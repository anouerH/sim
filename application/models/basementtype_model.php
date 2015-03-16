<?php
class Basementtype_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getBasementType()
	{
		
		$query = $this->db->get('sim_basement_type');
		return $query->result_array();
		

		
	}

}