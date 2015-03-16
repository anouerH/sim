<?php
class Constructionyear_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getConstructionYears()
	{
		$query = $this->db->get('sim_construction_year');
        return $query->result_array();
	}
    public function getUByConstructionYear($year_of_construction, $criteria)
    {
        $query = $this->db->get_where('sim_construction_year',array('code'=>$year_of_construction));
        $resutl = $query->result_array() ;
        return $resutl[0][$criteria];
    }

}