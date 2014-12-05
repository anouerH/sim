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
        $this->load->model('hsp_model');
        $this->load->model('thickness_model');
        $this->load->model('basementform_model');
        $this->load->model('airsapce_model');
        $this->load->model('departement_model');
    }

    public function index()
    {
        $data = $this->loadData();
        $this->load->library('form_validation');
        $this->load->view('templates/header', $data);
        $this->load->view('simulateur/index', $data);
        $this->load->view('templates/footer');
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
        
        $data['MIT'] =  $MIT  = (isset($_POST['mitoyennete'])) ? $_POST['mitoyennete'] : 0 ;
        $data['NIV'] =  $NIV  = (isset($_POST['nbre_niveaux'])) ? $_POST['nbre_niveaux'] : 0 ; 
        
        
        
        // Forme
        $data['shape'] =  $shape  = $_POST['shape'] ; 
        
        switch ($shape){
            case  'compact' :
                $FOR = 4.12;
                break;
            case  'elongated' :
                $FOR = 4.81;
                break;
            case  'complex' :
                $FOR = 5.71;
                break;
            default :
                $FOR = 4.12;
            
        }
        $data['FOR'] =  $FOR  ; // FOR depends on the shape
        //
        // Type toiture
        $data['roof_type'] =  $roof_type = (isset($_POST['roof_type'])) ? $_POST['roof_type'] : false ;
        $isHabitableAttics = false; //type toiture : Combles habités
        if($roof_type && $roof_type === 'habitable_attics'){
            $isHabitableAttics = true;
            $NIV = $NIV * 0.8 ;
        }
        $data['isHabitableAttics'] =   $isHabitableAttics ;
        
        // CALCUL Smur  :  Smur = (MIT x FOR x RACINE(SH/NIV) x NIV x HSP ) – Sfenêtres – Sportes  
        $Smur = ($MIT * $FOR * sqrt($sh / $data['NIV']) * $NIV * $hsp) - $Sfenetres -$Sportes;
        $data['Smur'] = $Smur;
        
        
        // clacul Splancher
        $data['Splancher'] = $Splancher = $sh/$NIV;
        
        // clacul Splafond
        $data['Splafond'] = $Splafond = $sh/$NIV;
        if($isHabitableAttics) {
             $data['Splafond'] = $Splafond = ((1.3 * $sh)/$NIV) - $Sfenetrestoit;
        }
        
        // Calcul Umur
        $data['departement'] = $departement =  $_POST['departement'] ; 
        $data['zone'] = $zone = $this->getZone($departement) ; 
        $data['wall'] = $wall = $_POST['wall_material'] ;  // type de mur
        
        $data['Umur'] = $Umur = $this->getUmur($wall, $zone);
        
        var_dump($zone);
        
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
        $data['hsps'] = $this->hsp_model->getHsps(); 
        $data['a_spaces'] = $this->airsapce_model->getAirSpaces(); 
        $data['departements'] = $this->departement_model->getDepartements(); 
       
        // var_dump($data['thickness']);

        $data['title'] = 'Simulateur !!!';

        return $data;
    }
	
    public function cch_bch_env(){
		
	}
	public function cch_bch_env_smurs(){
		
	}
        
    public  function getWallThickness(){
        $thickness = new Thickness_model();
        $id_wall = $_POST['wall'];
        $data = $thickness->getWallThickness($id_wall);
        if(!count($data)){
            echo '0';
            exit();
        }


        $html = "<option value=''>- Préciser -</option>";
        foreach ($data as $item){
            $textVal = (is_numeric($item['thickness'] )) ?  $item['thickness']." cm" : $item['thickness']  ;

            $html .= "<option value='".$item['umur']."'>".$textVal."</optiion>";
        }

        echo $html;
        exit();
    }
        
    public function getBasementFormByType(){
        $basement = new Basementform_model();
        $id_basement = $_POST['id_basement'];
        $data = $basement->getBasementFormByType($id_basement);
        if(!count($data)){
            echo '0';
            exit();
        }

        $html = "<option value=''>- Préciser -</option>";
        foreach ($data as $item){
            $html .= "<option value='".$item['uplancher']."'>".$item['plancher']."</optiion>";
        }

        echo $html;
        exit();
    }
    
    /**
     * retourner la zone id selon le dpartement
     */
    public function getZone($departement){
        $Odept = new Departement_model();
        $zone = "H".$Odept->getZone($departement);
        return $zone;
    }
    
    
	
}
