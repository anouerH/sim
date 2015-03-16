<?php
class Walltype_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getWallTypes()
	{
            //$query = $this->db->get('wall_type');
            $query = $this->db->get_where('sim_wall_type',array('parent_id'=>null));
            return $query->result_array();
	}
        
        public function getKpi_m($id){
            if($id == 0)
                return 0.8;
            
            $Aparams = array(
                        'id'=>$id, 
            ) ;
        
            $query = $this->db->get_where('sim_wall_type', $Aparams);
            $resutl = $query->result_array() ;
            
            return $resutl[0]['kpi_m'];
        }
}