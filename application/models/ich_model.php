<?php
class Ich_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getIchs()
	{
		
		$query = $this->db->get('ich');
		return $query->result_array();
		

		
	}

}
