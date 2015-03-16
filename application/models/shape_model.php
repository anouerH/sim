<?php
class Shape_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getShapes()
	{
		
		$query = $this->db->get('sim_shape');
		return $query->result_array();
		

		
	}

}