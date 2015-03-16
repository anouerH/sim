<?php
class Mitoyennete_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getMitoyennetes()
	{
		
		$query = $this->db->get('sim_mitoyennete');
		return $query->result_array();
		
        }
        
        public function getMit($id, $strfield = null){
            $Aparams = array(
                        'id'=>$id, 
            ) ;
        
            $query = $this->db->get_where('sim_mitoyennete', $Aparams);
            $resutl = $query->result_array() ;
            if($strfield)
                return $resutl[0][$strfield];
            return $resutl[0]['mit'];
        }
        
        

}