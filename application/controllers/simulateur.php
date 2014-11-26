<?php
class Simulateur extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		//$this->load->model('simulateur_model');
		$this->load->model('constructionyear_model');
		$this->load->model('rooftype_model');
		$this->load->model('basementtype_model');
		$this->load->model('mitoyennete_model');
		$this->load->model('shape_model');
		$this->load->model('walltype_model');
		$this->load->model('glazingtype_model');
		$this->load->model('carpentrytype_model');
		$this->load->model('doortype_model');
		$this->load->model('ich_model');
		$this->load->model('ventilation_model');
		
		
		
	}

	public function index()
	{
		$data = $this->loadData();
		$this->load->library('form_validation');
		// Form is submitted	
		if ($_POST)
		{
			
			
			// Is Valid Form 
			/*$config = array(
				array(
                     'field'   => 'surface', 
                     'label'   => 'surface', 
                     'rules'   => 'required'
                  ),
				array(
                     'field'   => 'basement_type', 
                     'label'   => 'basement_type', 
                     'rules'   => 'required'
                  ),
				array(
                     'field'   => 'ventilation', 
                     'label'   => 'ventilation', 
                     'rules'   => 'required'
                  ),
				array(
                     'field'   => 'ceiling_height', 
                     'label'   => 'ceiling_height', 
                     'rules'   => 'required'
                  )
            );*/
			
			$config = array(array(
                     'field'   => 'surface', 
                     'label'   => 'surface', 
                     'rules'   => 'required'
                  ));
            $this->form_validation->set_rules($config);
			
            // var_dump($this->form_validation->run());
            // die();
			if ($this->form_validation->run() == FALSE){
				
				$this->load->view('templates/header', $data);
				$this->load->view('simulateur/index', $data);
				$this->load->view('templates/footer');
				
			}else{
				// launch calculation
				$this->calculation($_POST);
			}
				
		}else{
			$this->load->view('templates/header', $data);
			$this->load->view('simulateur/index', $data);
			$this->load->view('templates/footer');
		}
			
		
		
	}
    
    public function result(){
        
        $data = $this->loadData();
        
        
        $data['sh'] =  $sh = (isset($_POST['sh'])) ? $_POST['sh'] : 0 ;
        $data['aRA'] = $aRA = (isset($_POST['aRA'])) ? $_POST['aRA'] : 0 ;
        $data['hsp'] = $hsp = (isset($_POST['hsp'])) ? $_POST['hsp'] : 0 ;
        // CORH = HSP / 2.5
        $data['CORH'] = $CORH = ($hsp) ? $hsp/2.5 : 0 ;
        
        $data['CORsol'] = $CORsol = (isset($_POST['CORsol'])) ? $_POST['CORsol'] : 0 ;
        
        $data['Sfenetres'] =  $Sfenetres = (isset($_POST['Sfenetres'])) ? $_POST['Sfenetres'] : 0 ;
        $data['Sfenetrestoit'] =  $Sfenetrestoit = (isset($_POST['Sfenetrestoit'])) ? $_POST['Sfenetrestoit'] : 0 ;
        $data['Sportes'] =  $Sportes = 2 ; 
        
        // Type toiture
        $data['roof_type'] =  $roof_type = (isset($_POST['roof_type'])) ? $_POST['roof_type'] : false ;
        $isHabitableAttics = false; //type toiture : Combles habités
        if($roof_type && $roof_type === 'habitable_attics')
            $isHabitableAttics = true;
        $data['isHabitableAttics'] =   $isHabitableAttics ;
        
        
        $this->load->view('templates/header', $data);
		$this->load->view('simulateur/result', $data);
				$this->load->view('templates/footer');
    }
	
	public function loadData(){
		$data['c_years'] = $this->constructionyear_model->getConstructionYears();
		$data['r_types'] = $this->rooftype_model->getRoofTyes();
		$data['b_types'] = $this->basementtype_model->getBasementType();
		$data['mitoyennetes'] = $this->mitoyennete_model->getMitoyennetes();
		$data['shapes'] = $this->shape_model->getShapes();
		$data['shapes'] = $this->shape_model->getShapes();
		$data['w_types'] = $this->walltype_model->getWallTypes();
		$data['g_types'] = $this->glazingtype_model->getGlazingTypes();
		$data['car_types'] = $this->carpentrytype_model->getCarpentryTypes();
		$data['d_types'] = $this->doortype_model->getDoorTypes();
		$data['ichs'] = $this->ich_model->getIchs();
		$data['ventilations'] = $this->ventilation_model->getVentilations();
		
		$data['title'] = 'Simulateur !!!';
		
		return $data;
	}
	
	public function calculation($data){
			
			
			//A - Maison individuelle 
				//1. Calcul des consommations de chauffage
													/*********************************************************/
													//Cch PCI = Cch PCS / α pcsi // AVEC : Cch PCS = Bch x Ich
													/*********************************************************/
					//1.1.Calcul de Bch 
													/*********************************************************/
													// Bch = SH x ENV x METEO x INT
													/*********************************************************/
						// 1.1.1. Calcul de ENV
						
													/*********************************************************/
													// ENV = (DPmurs + DPplafond + DPplancher + DPfenêtres + DPportes + DPvéranda + PT) / 2 . 5 x Sh   + aRA
													/*********************************************************/
						
						
		$sh 			= $data['surface'];  		// SH 	: surface habitable de la maison (m2)
		$aRA 			= $data['ventilation'];		// aRA 	: deperditions par renouvellement d’air 
		$hsp  			= $data['ceiling_height'];	// HSP	: hauteur sous plafond (m)
		$corh  			= $hsp/2.5;					// CORH : coefficient de correction de la hauteur sous plafond
			
		// Form is submitted	
		if ($_POST)
		{
				
			// Is Valid Form 
			$this->load->library('form_validation');
			$config = array(
               array(
                     'field'   => 'surface', 
                     'label'   => 'surface', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'ventilation', 
                     'label'   => 'ventilation', 
                     'rules'   => 'required'
                  )
            );
            $this->form_validation->set_rules($config);
				
			if ($this->form_validation->run() == FALSE){
				//$this->load->view('simulateur/index');
				
				die('is NOY valid ... ');
			}else{
				//die("is valid");
			}
				
		} 
					
			$aRA = $this->input->post('ventilation');	
			// var_dump($this->input->post('ventilation'));
			
			print "<pre>";
			print "<h1>test detetetet</h1>";
			print "</pre>";
			die();
	}
	
	public function cch_bch_env(){
		
	}
	public function cch_bch_env_smurs(){
		
	}
	
}
