<?php
class Iecs_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getIecs($id_energy = NULL)
	{
        if(!$id_energy )
            $query = $this->db->get('ecs');
        else 
            $query = $this->db->get_where('ecs',array('energy'=>$id_energy));
        
		return $query->result_array();
	}

}