<?php
class Plafond_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getPlafonds()
	{
            $query = $this->db->get('plafond');
            //$query = $this->db->get_where('wall_type',array('parent_id'=>null));
            return $query->result_array();
	}
}