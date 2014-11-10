<?php
class Glazingtype_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getGlazingTypes()
	{
		$query = $this->db->get('glazing_type');
		return $query->result_array();
	}

}