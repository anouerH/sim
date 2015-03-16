<?php
class Carpentrytype_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getCarpentryTypes()
	{
		
		$query = $this->db->get('sim_carpentry_type');
		return $query->result_array();
		

		
	}

}
