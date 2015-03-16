<?php
class Hsp_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function getHsps()
    {

            $query = $this->db->get('sim_hsp');
            return $query->result_array();
    }

}