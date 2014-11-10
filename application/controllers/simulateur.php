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
		
	}

	public function index()
	{
		//$data['news'] = $this->next(array)ws_model->get_news();
		
		//$data['news'] = $this->news_model->get_news();
		
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
		
		
		$data['title'] = 'Simulateur !!!';
		$this->load->view('templates/header', $data);
		$this->load->view('simulateur/index', $data);
		$this->load->view('templates/footer');
	
	}
	
}
