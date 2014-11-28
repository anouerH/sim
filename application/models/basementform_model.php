<?php
class Basementform_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function getBasementForm()
    {

            $query = $this->db->get('basement_form');
            return $query->result_array();
    }
    
    public function getBasementFormByType($id_palncher_type){
        $query = $this->db->get_where('basement_form',array('id_palncher_type'=>$id_palncher_type));
        return $query->result_array();
    }

}