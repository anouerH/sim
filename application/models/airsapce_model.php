<?php
class Airsapce_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getAirSpaces()
	{
		
		$query = $this->db->get('sim_air_space');
		return $query->result_array();
		

		
	}

}