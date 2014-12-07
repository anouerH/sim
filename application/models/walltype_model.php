<?php
class Walltype_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getWallTypes()
	{
            //$query = $this->db->get('wall_type');
            $query = $this->db->get_where('wall_type',array('parent_id'=>null));
            return $query->result_array();
	}
}