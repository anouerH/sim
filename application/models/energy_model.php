<?php
class Energy_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getEnergys()
	{
		
		$query = $this->db->get('energy');
		return $query->result_array();
		

		
	}

}