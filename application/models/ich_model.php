<?php
class Ich_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getIchs($eneregy = NULL)
	{
		if(!$eneregy)
            $query = $this->db->get('sim_ich');
        else 
            $query = $this->db->get_where('sim_ich',array('energy'=>$eneregy));
		return $query->result_array();
	}
    
    public function getRow($ich_id){
        $query = $this->db->get_where('sim_ich',array('id'=>$ich_id));
        $resutl = $query->result_array() ;
        if($resutl[0]['rr'] == 'Rr1' )
            $resutl[0]['rr'] = 0.9;
        elseif ($resutl[0]['rr'] == 'Rr2' )
            $resutl[0]['rr'] = 0.97;
        else {
            
        }
        //return ($resutl[0]['pref'] * $resutl[0]['pref']) / 100;
        return array($resutl[0]['rg'], $resutl[0]['re'], $resutl[0]['rd'], $resutl[0]['rr'], $resutl[0]['chaudiere']);
    }

}
