<?php
class Energy_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getEnergys()
	{
		
		$query = $this->db->get('energy');
		return $query->result_array();
	}
        
        public function getAPcsi($id){
            $query = $this->db->get_where('energy',array('id'=>$id));
            $resutl = $query->result_array() ;
            return $resutl[0]['a_pcsi'];
        }

}