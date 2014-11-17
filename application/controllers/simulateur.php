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

		$this->load->view('templates/header', $data);
		$this->load->view('simulateur/index', $data);
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
	
	public function calculation(){
		
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
				die("is valid");
			}
				
		} 
					
			$aRA = $this->input->post('ventilation');	
			var_dump($this->input->post('ventilation'));
			print "<h1>test detetetet</h1>";
			die();
	}
	
}
