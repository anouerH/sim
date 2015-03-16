<?php
class Iecs_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getIecs($id_energy = NULL)
	{
        if(!$id_energy )
            $query = $this->db->get('sim_ecs');
        else 
            $query = $this->db->get_where('sim_ecs',array('energy'=>$id_energy));
        
		return $query->result_array();
	}
        
        public function getIecsValue($id, $field){
            $query = $this->db->get_where('sim_ecs',array('id'=>$id));
            $resutl = $query->result_array() ;
            return $resutl[0][$field];
        }
        
        public function checkInstall($id){
            $query = $this->db->get_where('sim_ecs',array('id'=>$id));
            $resutl = $query->result_array() ;
            if($resutl[0]['new_install'])
                return true;
            else 
                return false;
        }

}