<?php
class Thickness_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getThickness()
	{
		$query = $this->db->get('sim_wall_thickness');
		return $query->result_array();
	}
        
    public function getWallThickness($id_wall){
        $query = $this->db->get_where('sim_wall_thickness',array('id_wall'=>$id_wall));
        return $query->result_array();
    }

}