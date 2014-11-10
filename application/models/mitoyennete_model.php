<?php
class Mitoyennete_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getMitoyennetes()
	{
		
		$query = $this->db->get('mitoyennete');
		return $query->result_array();
		

		
	}

}