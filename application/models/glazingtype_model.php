<?php
class Glazingtype_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getGlazingTypes()
	{
		$query = $this->db->get('glazing_type');
		return $query->result_array();
	}
    
    public function getUfenetre($id_vitrage, $id_volet, $id_menuiserie, $air_space){
        $Aparams = array(
                        'id_vitrage'=>$id_vitrage, 
                        'id_volet'=>$id_volet, 
                        'id_menuiserie'=>$id_menuiserie
            ) ;
        
        if($air_space)
            $Aparams['id_airspace'] = $air_space;
        
        $query = $this->db->get_where('ufenetres', $Aparams);
        $resutl = $query->result_array() ;
        return $resutl[0]['ufenetre'];
    }

}