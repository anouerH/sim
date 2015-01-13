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
        
    public function getZone($departement, $summer = false){
        $query = $this->db->get_where('sim_departement',array('id'=>$departement));
        $resutl = $query->result_array() ;
        if($summer)
            return $resutl[0]['zone_ete'];
        else 
            return $resutl[0]['zone_hiver'];
    }
    
    public function getClimat($departement){
        $query = $this->db->get_where('sim_departement',array('id'=>$departement));
        $resutl = $query->result_array() ;
        return $resutl[0]['c_alt_max'];
    }
    
    public function getE($departement){
        $query = $this->db->get_where('sim_departement',array('id'=>$departement));
        $resutl = $query->result_array() ;
        return ($resutl[0]['pref'] * $resutl[0]['pref']) / 100;
    }
    
    public function getFch($departement){
        $query = $this->db->get_where('sim_departement',array('id'=>$departement));
        $resutl = $query->result_array() ;
        return $resutl[0]['fch'];
    }
    
    public function getFecs($departement, $isNewInstall=false){
        $query = $this->db->get_where('sim_departement',array('id'=>$departement));
        $resutl = $query->result_array() ;
        if($isNewInstall)
           return $resutl[0]['fecs_new'];
        else 
            return $resutl[0]['fecs_old'];
    }

}