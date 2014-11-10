<?php
class Walltype_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getWallTypes()
	{
		$query = $this->db->get('wall_type');
		return $query->result_array();
	}

}