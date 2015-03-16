<?php
class Doortype_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getDoorTypes()
	{
		$query = $this->db->get('sim_door_type');
		return $query->result_array();
	}

}
