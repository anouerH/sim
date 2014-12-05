<?php
class Departement_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getDepartements()
	{
            $query = $this->db->get('sim_departement');
            return $query->result_array();
	}
        
        public function getZone($departement){
            $query = $this->db->get_where('sim_departement',array('id'=>$departement));
            $resutl = $query->result_array() ;
            return $resutl[0]['zone_hiver'];
        }

}