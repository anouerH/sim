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
		
		
		
	}

	public function index()
	{
		//$data['news'] = $this->news_model->get_news();
		
		//$data['news'] = $this->news_model->get_news();
		
		$data['c_years'] = $this->constructionyear_model->getConstructionYears();
		$data['r_types'] = $this->rooftype_model->getRoofTyes();
		$data['b_types'] = $this->basementtype_model->getBasementType();
		$data['mitoyennetes'] = $this->mitoyennete_model->getMitoyennetes();
		$data['shapes'] = $this->shape_model->getShapes();
		
		
		$data['title'] = 'Simulateur !!!';
		$this->load->view('templates/header', $data);
		$this->load->view('simulateur/index', $data);
		$this->load->view('templates/footer');
	
	}
	
}