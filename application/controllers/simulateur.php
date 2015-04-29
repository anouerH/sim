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
        $this->load->model('plafond_model');
        $this->load->model('energy_model');
        $this->load->model('iecs_model');
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
        
        /*********************************************************/
        /************ 1 . CALCUL DE CONSOMMATION ECS *************/
        /************ Cch PCI = Cch PCS / α pcsi (P: 7 ) *********/
        /*********************************************************/
        
        /*-------------------------------------------------------*/
        // 1.1. Calcul de Bch : Bch = SH x ENV x METEO x INT (P:8)
        /*-------------------------------------------------------*/
        
        //  -------------- 1.1.1. Calcul de ENV (P:8)-------------- 
        
        $data['sh'] =  $sh = (isset($_POST['sh'])) ? $_POST['sh'] : 0 ;
        $data['aRA'] = $aRA = (isset($_POST['aRA'])) ? $_POST['aRA'] : 0 ;
        $data['hsp'] = $hsp = (isset($_POST['hsp'])) ? $_POST['hsp'] : 0 ;
        // CORH = HSP / 2.5
        $data['CORH'] = $CORH = ($hsp) ? $hsp/2.5 : 0 ;
        
        $data['CORsol'] = $CORsol = (isset($_POST['CORsol'])) ? $_POST['CORsol'] : 0 ;
        
        $data['Sfenetres'] =  $Sfenetres = (isset($_POST['Sfenetres'])) ? $_POST['Sfenetres'] : 0 ;
        $data['Sfenetrestoit'] =  $Sfenetrestoit = (isset($_POST['Sfenetrestoit'])) ? $_POST['Sfenetrestoit'] : 0 ;
         $data['Sveranda'] =  $Sveranda = (isset($_POST['Sveranda'])) ? $_POST['Sveranda'] : 0 ;
        $data['Sportes'] =  $Sportes = 2 ; 
        
        $mitID = ($_POST['mitoyennete']);
        $mitoyennete= new Mitoyennete_model();
        $data['MIT'] =  $MIT  = $mitoyennete->getMit($mitID) ;
        $data['NIV'] =  $NIV  = (isset($_POST['nbre_niveaux'])) ? $_POST['nbre_niveaux'] : 0 ; 
        $data['year_of_construction'] = $year_of_construction = $_POST['year_of_construction'];
        
        
        // Forme
        $data['shape'] =  $shape  = $_POST['shape'] ; 
        
        switch ($shape){
            case  'compact' :
                $FOR = 4.12;
                $strConfiguration = "a";
                break;
            case  'elongated' :
                $FOR = 4.81;
                $strConfiguration = "b";
                break;
            case  'complex' :
                $FOR = 5.71;
                $strConfiguration = "c";
                break;
            default :
                $FOR = 4.12;
                $strConfiguration = "a";
            
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
        $data['wall_thickness'] =  $wall_thickness  = (isset($_POST['wall_thickness'])) ? $_POST['wall_thickness'] : 0 ; 
        
        if(!$wall){ // si le type de mur est inconnu
            $criteria = "umur_".$zone;
            $cYear = new Constructionyear_model();
            $data['Umur'] = $Umur = $cYear->getUByConstructionYear($year_of_construction, $criteria);
        }else{
            $Othickness = new Thickness_model();
            // $data['Umur'] = $Umur = $wall_thickness;
            $Umur0 = $wall_thickness;
           
            $data['isolation_mur'] =  $isolation_mur  = (isset($_POST['isolation_mur'])) ? $_POST['isolation_mur'] : 0 ; 
            $data['epaisseur_mur'] =  $epaisseur_mur  = (isset($_POST['epaisseur_mur'])) ? $_POST['epaisseur_mur'] : '' ;
            // Si isolé
            if(isset($_POST['isolation_mur']) && $_POST['isolation_mur']>0){
                // Risolant est définie
                $data['risolant_mur'] =  $risolant_mur  = (isset($_POST['risolant_mur'])) ? $_POST['risolant_mur'] : '' ;
                if(isset($_POST['risolant_mur']) && $_POST['risolant_mur']>0){
                    $data['Umur'] = $Umur = (1/( (1/ $Umur0 ) +  $_POST['risolant_mur'] ));
                }else{
                    // Si l'epaisseur de l'isolant est connue
                    
                    $lambda_mur = 0.04;
                    if(isset($_POST['lambda_mur']))
                        $lambda_mur = $_POST['lambda_mur'];
                    
                    if(isset($_POST['epaisseur_mur']) && $_POST['epaisseur_mur']>0){
                        $data['Umur'] = $Umur =  (1/( (1/$Umur0) + (1/($_POST['epaisseur_mur'] /$lambda_mur ) ) ));
                    }else{
                        // calcul de l'epaisseur
                        switch ($year_of_construction){
                            case  'before_1975' :
                                $e = 0.98;
                                break;
                            case  'between_1975_and_1977' :
                                $e = 0.98;
                                break;
                            case  'between_1978_and_1982' :
                                $e = 0.98;
                                break;
                            case  'between_1978_and_1982' :
                                $e = 0.98;
                                break;
                            case  'between_1983_and_1988' :
                                $e = 0.98;
                                break;
                            case  'between_1989_and_2000' :
                                $e = 0.56;
                                break;
                            case  'after_2000' :
                                $e = 0.42;
                                break;
                            default :
                                $e = 0;

                        }
                        
                        $data['Umur'] = $Umur = (1/( (1/ $Umur0) + ($e/$lambda_mur) ));
                    }
                }
            }else{
                $e = 0 ;
                $data['Umur'] = $Umur = (1/( (1/ $Umur0) ));
            }
            
        }
        
        // Coefficients U des planchers bas
        $data['plancher_bas'] = $plancher_bas = $_POST['plancher_bas'] ;
        $data['isolation_pb'] = $isolation_pb = (isset($_POST['isolation_pb'])) ? $_POST['isolation_pb'] : '' ;
        $data['risolant_ph'] = $risolant_ph = (isset($_POST['risolant_ph'])) ? $_POST['risolant_ph'] : '' ;
        $data['epaisseur_ph'] = $epaisseur_ph = (isset($_POST['epaisseur_ph'])) ? $_POST['epaisseur_ph'] : '' ;
        if($plancher_bas == 'terre-plein'){
            $data['Uplancher'] = $Uplancher = 0 ;
        }elseif($plancher_bas == '0'){
            
            $criteria = "uplancher_".$zone;
            $cYear = new Constructionyear_model();
            $data['Uplancher'] = $Uplancher = $cYear->getUByConstructionYear($year_of_construction, $criteria);
        }else{
            // $data['Uplancher'] = $Uplancher = (isset($_POST['basement_form'])) ? $_POST['basement_form'] : 0;
            $Uplancher0 = (isset($_POST['basement_form'])) ? $_POST['basement_form'] : 0;
            
            // Si isolé
            if(isset($_POST['isolation_pb']) && $_POST['isolation_pb']>0){
                // Risolant est définie
                if(isset($_POST['risolant_pb']) && $_POST['risolant_pb']>0){
                    $data['Uplancher'] = $Uplancher = ($Uplancher0) ? (1/( (1/ $Uplancher0 ) +  $_POST['risolant_pb'] )) : 0;
                }else{
                    
                    $lambda_pb = 0.042;
                        if(isset($_POST['lambda_pb']))
                            $lambda_pb = $_POST['lambda_pb'];
                        
                    // Si l'epaisseur de l'isolant est connue
                    if(isset($_POST['epaisseur_pb']) && $_POST['epaisseur_pb']>0){
                        $data['Uplancher'] = $Uplancher = (1/( (1/$Uplancher0) + (1/($_POST['epaisseur_pb'] / $lambda_pb )) ));
                    }else{
                        
                        
                        // calcul de l'epaisseur
                        switch ($year_of_construction){
                            case  'before_1975' :
                                $epb = 0.87;
                                break;
                            case  'between_1975_and_1977' :
                                $epb = 0.87;
                                break;
                            case  'between_1978_and_1982' :
                                $epb = 0.87;
                                break;
                            case  'between_1978_and_1982' :
                                $epb = 0.87;
                                break;
                            case  'between_1983_and_1988' :
                                $epb = 0.87;
                                break;
                            case  'between_1989_and_2000' :
                                $epb = 0.56;
                                break;
                            case  'after_2000' :
                                $epb = 0.42;
                                break;
                            default :
                                $epb = 0;

                        }
                        
                        $data['Uplancher'] = $Uplancher = (1/( (1/ $Uplancher0) + ($epb/$lambda_pb) ));
                    }
                }
                
            }else{
                $epb = 0 ;
                $data['Uplancher'] = $Uplancher = ($Uplancher0) ? (1/( (1/ $Uplancher0) )) : 1;
            }
        }
        // Coefficients U des planchers hauts
        $data['isolation_ph'] =  $isolation_ph  = (isset($_POST['isolation_ph'])) ? $_POST['isolation_ph'] : 0 ; 
        $data['risolant_ph'] =  $risolant_ph  = (isset($_POST['risolant_ph'])) ? $_POST['risolant_ph'] : '' ;
        $data['epaisseur_ph'] =  $epaisseur_ph  = (isset($_POST['epaisseur_ph'])) ? $_POST['epaisseur_ph'] : '' ;
        if(isset($_POST['plafond']) && !empty($_POST['plafond'])){
            // $data['Uplafond'] = $Uplafond = $_POST['plafond'];
            $Uplafond0 = $_POST['plafond'];
            
            // Si isolé
            if(isset($_POST['isolation_ph']) && $_POST['isolation_ph']>0){
                // Risolant est définie
                if(isset($_POST['risolant_ph']) && $_POST['risolant_ph']>0){
                    $data['Uplafond'] = $Uplafond = (1/( (1/ $Uplafond0) +   $_POST['risolant_ph'] ));
                }else{
                    
                    $lambda_ph = 0.042;
                        if(isset($_POST['lambda_pb']))
                            $lambda_pb = $_POST['lambda_pb'];
                        
                    // Si l'epaisseur de l'isolant est connue
                    if(isset($_POST['epaisseur_ph']) && $_POST['epaisseur_ph']>0){
                        $data['Uplafond'] = $Uplafond = (1/( (1/ $Uplafond0) + (1/ ($_POST['epaisseur_ph'] / $lambda_ph ) ) ));
                    }else{
                        // calcul de l'epaisseur
                        switch ($year_of_construction){
                            case  'before_1975' :
                                switch ($roof_type){
                                    case  'roof_terrace' :
                                        $eph = 1;
                                        break;
                                    case  'unoccupied_attics' :
                                        $eph = 0.43;
                                        break;
                                    case  'habitable_attics' :
                                        $eph = 0.63;
                                        break;
                                    case  'terrace_and_attics' :
                                        $eph = 0.63;
                                        break;
                                    
                                    default :
                                        $eph = 0;
                                }
                                break;
                            case  'between_1975_and_1977' :
                                switch ($roof_type){
                                    case  'roof_terrace' :
                                        $eph = 1;
                                        break;
                                    case  'unoccupied_attics' :
                                        $eph = 0.43;
                                        break;
                                    case  'habitable_attics' :
                                        $eph = 0.63;
                                        break;
                                    case  'terrace_and_attics' :
                                        $eph = 0.63;
                                        break;
                                    
                                    default :
                                        $eph = 0;
                                }
                                break;
                            case  'between_1978_and_1982' :
                                switch ($roof_type){
                                    case  'roof_terrace' :
                                        $eph = 1;
                                        break;
                                    case  'unoccupied_attics' :
                                        $eph = 0.43;
                                        break;
                                    case  'habitable_attics' :
                                        $eph = 0.63;
                                        break;
                                    case  'terrace_and_attics' :
                                        $eph = 0.63;
                                        break;
                                    
                                    default :
                                        $eph = 0;
                                }
                                break;
                            case  'between_1978_and_1982' :
                                switch ($roof_type){
                                    case  'roof_terrace' :
                                        $eph = 1;
                                        break;
                                    case  'unoccupied_attics' :
                                        $eph = 0.43;
                                        break;
                                    case  'habitable_attics' :
                                        $eph = 0.63;
                                        break;
                                    case  'terrace_and_attics' :
                                        $eph = 0.63;
                                        break;
                                    
                                    default :
                                        $eph = 0;
                                }
                                break;
                            case  'between_1983_and_1988' :
                                switch ($roof_type){
                                    case  'roof_terrace' :
                                        $eph = 1;
                                        break;
                                    case  'unoccupied_attics' :
                                        $eph = 0.43;
                                        break;
                                    case  'habitable_attics' :
                                        $eph = 0.63;
                                        break;
                                    case  'terrace_and_attics' :
                                        $eph = 0.63;
                                        break;
                                    
                                    default :
                                        $eph = 0;
                                }
                                break;
                            
                            
                            
                            case  'between_1989_and_2000' :
                                switch ($roof_type){
                                    case  'roof_terrace' :
                                        $eph = 0.5;
                                        break;
                                    case  'unoccupied_attics' :
                                        $eph = 0.23;
                                        break;
                                    case  'habitable_attics' :
                                        $eph = 0.38;
                                        break;
                                    case  'terrace_and_attics' :
                                        $eph = 0.38;
                                        break;
                                    
                                    default :
                                        $eph = 0;
                                }
                                break;
                            case  'after_2000' :
                                switch ($roof_type){
                                    case  'roof_terrace' :
                                        $eph = 0.27;
                                        break;
                                    case  'unoccupied_attics' :
                                        $eph = 0.19;
                                        break;
                                    case  'habitable_attics' :
                                        $eph = 0.27;
                                        break;
                                    case  'terrace_and_attics' :
                                        $eph = 0.27;
                                        break;
                                    
                                    default :
                                        $eph = 0;
                                }
                                break;
                            default :
                                $eph = 0;

                        }
                        
                        $data['Uplafond'] = $Uplafond = (1/( (1/ $Uplafond0) + ($eph/0.04) ));
                    }
                }
                
            }else{
                $eph = 0 ;
                $data['Uplafond'] = $Uplafond = (1/( (1/ $Uplafond0) ));
            }
        }else{
            $criteria = "uplancher_combles_".$zone;
            if($roof_type == 'roof_terrace' || $roof_type == 'terrace_and_attics' )
                $criteria = "uplancher_terrasse_".$zone;
              
            $cYear = new Constructionyear_model();
            $data['Uplafond'] = $Uplafond = $cYear->getUByConstructionYear($year_of_construction, $criteria);
        }
        // Coefficients U des fenêtres, porte-fenêtres :
        $data['glazing_type'] = $glazing_type = $_POST['glazing_type'] ;
        $data['carpentry_type'] = $carpentry_type = $_POST['carpentry_type'] ;
        $data['with_volet'] = $with_volet = (isset($_POST['with_volet']) && $_POST['with_volet'] == "true") ? 2 : 1 ;
        $data['air_space'] = $air_space  = (isset($_POST['air_space'])) ? $_POST['air_space'] : null ;
        
        $Oglazing = new Glazingtype_model();
        $data['Ufenetre'] = $Ufenetre = $Oglazing->getUfenetre($glazing_type, $with_volet, $carpentry_type, $air_space);
        // Coefficients U de la véranda (chauffée) :
        $data['Uveranda'] = $Uveranda = $Oglazing->getUveranda($glazing_type, $with_volet, $carpentry_type, $air_space);
        
        // Coefficients U des portes :: door_type
        $data['door_type'] = $door_type = (isset($_POST['door_type'])) ? $_POST['door_type'] : 0 ;
        $data['Uportes'] =  $Uportes  = (isset($_POST['door_type'])) ? $_POST['door_type'] : 0 ;
        
        /****************************************/
        /****************CACUL DES DPs***********/
        /****************************************/
        $b = 1 ;
        // Calcul DPmurs :: DPmurs = b1 x Smurs1 x Umurs1 + b2 x Smurs2 x Umurs2 + b3 x Smurs3 x Umurs3
        $data['DPmurs'] =  $DPmurs = $b * $Smur * $Umur ;
        
        //DP plafond = b’ 1 x S plafond1 x U plafond1 + b’ 2 x S plafond2 x U plafond2 + b’ 3 x S plafondt3 x U plafond3 
        $data['DPplafond'] =  $DPplafond = $b * $Splafond * $Uplafond ;
        //DP plancher = C orsol1 x S plancher 1 x U plancher 1 + C orsol2 x S plancher 2 x U plancher 2 + C orsol3 x S plancher 3 x U plancher 3
        $data['DPplancher'] =  $DPplancher = $b * $Splancher * $Uplancher ;
        //DP fenêtres = S fenêtres1 x U fenêtres1 + S fenêtres2 x U fenêtres2 + S fenêtres3 x U fenêtres3
        $data['DPfenetres'] =  $DPfenetres =  $Sfenetres * $Ufenetre ;
        // DP portes = S portes1 x U portes1 + S portes2 x U portes2 + S portes3 x U portes3
        $data['DPportes'] =  $DPportes =  $Sportes * $Uportes ;
        //DP véranda = S véranda1 x U véranda1 + S véranda2 x U véranda2 + S véranda3 x U véranda3
        
        $data['DPveranda'] =  $DPveranda =  $Sveranda * $Uveranda ;
        
        
        /*************************************************************/
        /**************** Calcul des ponts thermiques PT : ***********/
        /*************************************************************/
        
        // calcul MIT2 
        $str_filed = "mit2".$strConfiguration;
        $data['MIT2'] =  $MIT2 =  $mitoyennete->getMit($mitID, $str_filed) ;
        
        // calcul l pb/m (plancher bas / mur extérieur) : 
        $data['lpb_m'] =  $lpb_m = $FOR * $MIT2 * sqrt($sh/$NIV) ;
        
        // k pb/m (plancher bas / mur extérieur) :
        $data['kpb_m'] =  $kpb_m = 0.44 ;
        
        // l pi/m (plancher intermédiaire / mur extérieur) :
        switch ($data['NIV']){
            case  1 :
                $Cniv = 0;
                break;
            case  1.5 :
                $Cniv = 1;
                break;
            case  2 :
                $Cniv = 1;
                break;
            case  2.5 :
                $Cniv = 2;
                break;
            case  3 :
                $Cniv = 2;
                break;
            default :
                $Cniv = 0;
            
        }
        
        $data['lpi_m'] =  $lpi_m = $lpb_m * $Cniv ;
        
        // k pi/m (plancher intermédiaire / mur extérieur) :
        $wallType = new Walltype_model();
        $data['kpi_m'] =  $kpi_m = $wallType->getKpi_m($wall) ;
        
        // l rf/pb (refend/plancher bas) :
        if(($sh/$NIV)<= 50 )
            $data['lrf_pb'] =  $lrf_pb = 0 ;
        else{
            switch ($strConfiguration){
                case  'a' :
                    $Cfor = 1.5;
                    break;
                case  'b' :
                    $Cfor = 3.5;
                    break;
                case  'c' :
                    $Cfor = 6.5;
                    break;
                default :
                    $Cfor = 1.5;

            }
            $data['lrf_pb'] =  $lrf_pb = sqrt($sh/($NIV*$Cfor)) ; ;
        }
        
        
        // k rf/pb (refend/plancher bas) = 0.64
        $data['krf_pb'] =  $krf_pb = 0.64;
        
        // l rf/m (refend/mur extérieur) :
        if(($sh/$NIV)<= 50 )
            $data['lrf_m'] =  $lrf_m = 0 ;
        else{
            if($sh<90){
                switch ($data['NIV']){
                    case  1 :
                        switch ($strConfiguration){
                            case  'a' :
                                $data['lrf_m'] =  $lrf_m = 2;
                                break;
                            case  'b' :
                                $data['lrf_m'] =  $lrf_m = 4;
                                break;
                            case  'c' :
                                $data['lrf_m'] =  $lrf_m = 6;
                                break;
                            default :
                                $data['lrf_m'] =  $lrf_m = 2;

                        }
                        break;
                    case  1.5 :
                        switch ($strConfiguration){
                            case  'a' :
                                $data['lrf_m'] =  $lrf_m = 2;
                                break;
                            case  'b' :
                                $data['lrf_m'] =  $lrf_m = 4;
                                break;
                            case  'c' :
                                $data['lrf_m'] =  $lrf_m = 6;
                                break;
                            default :
                                $data['lrf_m'] =  $lrf_m = 2;

                        }
                        break;
                    default :
                       $data['lrf_m'] =  $lrf_m = 0;

                }
            }elseif (90>$sh && $sh<160) {
                switch ($data['NIV']){
                    case  1 :
                        switch ($strConfiguration){
                            case  'a' :
                                $data['lrf_m'] =  $lrf_m = 2;
                                break;
                            case  'b' :
                                $data['lrf_m'] =  $lrf_m = 4;
                                break;
                            case  'c' :
                                $data['lrf_m'] =  $lrf_m = 6;
                                break;
                            default :
                                $data['lrf_m'] =  $lrf_m = 2;

                        }
                        break;
                    case  1.5 :
                        switch ($strConfiguration){
                            case  'a' :
                                $data['lrf_m'] =  $lrf_m = 2;
                                break;
                            case  'b' :
                                $data['lrf_m'] =  $lrf_m = 4;
                                break;
                            case  'c' :
                                $data['lrf_m'] =  $lrf_m = 6;
                                break;
                            default :
                                $data['lrf_m'] =  $lrf_m = 2;

                        }
                        break;
                    case  2 :
                        switch ($strConfiguration){
                            case  'a' :
                                $data['lrf_m'] =  $lrf_m = 4;
                                break;
                            case  'b' :
                                $data['lrf_m'] =  $lrf_m = 8;
                                break;
                            case  'c' :
                                $data['lrf_m'] =  $lrf_m = 12;
                                break;
                            default :
                                $data['lrf_m'] =  $lrf_m = 4;

                        }
                        break;
                    default :
                       $data['lrf_m'] =  $lrf_m = 0;

                }
            }elseif ($sh>160) {
                switch ($data['NIV']){
                    case  1 :
                        switch ($strConfiguration){
                            case  'a' :
                                $data['lrf_m'] =  $lrf_m = 2;
                                break;
                            case  'b' :
                                $data['lrf_m'] =  $lrf_m = 4;
                                break;
                            case  'c' :
                                $data['lrf_m'] =  $lrf_m = 6;
                                break;
                            default :
                                $data['lrf_m'] =  $lrf_m = 2;

                        }
                        break;
                    case  1.5 :
                        switch ($strConfiguration){
                            case  'a' :
                                $data['lrf_m'] =  $lrf_m = 2;
                                break;
                            case  'b' :
                                $data['lrf_m'] =  $lrf_m = 4;
                                break;
                            case  'c' :
                                $data['lrf_m'] =  $lrf_m = 6;
                                break;
                            default :
                                $data['lrf_m'] =  $lrf_m = 2;

                        }
                        break;
                    case  2 :
                        switch ($strConfiguration){
                            case  'a' :
                                $data['lrf_m'] =  $lrf_m = 4;
                                break;
                            case  'b' :
                                $data['lrf_m'] =  $lrf_m = 8;
                                break;
                            case  'c' :
                                $data['lrf_m'] =  $lrf_m = 12;
                                break;
                            default :
                                $data['lrf_m'] =  $lrf_m = 4;

                        }
                        break;
                    case  2.5 :
                        switch ($strConfiguration){
                            case  'a' :
                                $data['lrf_m'] =  $lrf_m = 4;
                                break;
                            case  'b' :
                                $data['lrf_m'] =  $lrf_m = 8;
                                break;
                            case  'c' :
                                $data['lrf_m'] =  $lrf_m = 12;
                                break;
                            default :
                                $data['lrf_m'] =  $lrf_m = 4;

                        }
                        break;
                    case  3 :
                        switch ($strConfiguration){
                            case  'a' :
                                $data['lrf_m'] =  $lrf_m = 4;
                                break;
                            case  'b' :
                                $data['lrf_m'] =  $lrf_m = 8;
                                break;
                            case  'c' :
                                $data['lrf_m'] =  $lrf_m = 12;
                                break;
                            default :
                                $data['lrf_m'] =  $lrf_m = 4;

                        }
                        break;
                    default :
                       $data['lrf_m'] =  $lrf_m = 0;

                }
            }else{
                $data['lrf_m'] =  $lrf_m  = 0;
            }
            
        }
        
        
        // k rf/m (refend/mur extérieur) :
        $data['krf_m'] = $krf_m = 1 ;
        /* if(!ITE)
            $data['krf_m'] = $krf_m = 0.4 ;*/
        
        //l men (menuiseries) :
        $data['lmen'] = $lmen = 3 * $Sfenetres ;
        
        // k men (menuiseries) :
        $data['kmen'] = $kmen = 0.1 ;
        /*
         * if(!ITE)
         * $data['kmen'] = $kmen = 0 ;
         */
        
        $data['PT'] = $PT = ($kpb_m * $lpb_m) + ($kpi_m * $lpi_m) + ($krf_m * $lrf_m) + ($krf_pb * $lrf_pb) + ($kmen * $lmen) ;
        
        
        
        $data['ENV'] = $ENV = (($DPmurs + $DPplafond + $DPplancher + $DPfenetres + $DPportes + $DPveranda + $PT) / (2.5 * $sh))  + $aRA;
        
        // --------------  1.1.2. Calcul de METEO (P:24)-----------
        
        
        // CLIMAT = DHcor / 1000 
        // Avec = DHcor= Dhref + ((Nref / C2)+5) x dN 
        
        $Odept = new Departement_model();
        // get Departement Meteo Data
        $dataMeto = $Odept->getDeptMetoData($departement);
        $data['Dhref'] = $Dhref = $dataMeto['dhref'];
        $data['Nref'] = $Nref = $dataMeto['nref'];
        // Si C4 = NULL ; C2=340 sinon C2=400
        $data['C4'] = $C4 = $dataMeto['c4'];
        $data['C3'] = $C3 = $dataMeto['c3'];
        $data['C2'] = $C2 = ($dataMeto['c4']) ? 400 : 340 ;
        // dN = C3 x altitude (m)
        $data['altitude'] = $altitude = (int) $dataMeto["altitude"] ;
        $data['dN'] = $dN = (int)$dataMeto['c3']  *   $altitude ;
        // Avec = DHcor= Dhref + ((Nref / C2)+5) x dN 
        $data['DHcor'] = $DHcor = (int)$Dhref + (((int)$Nref / (int)$C2) + 5 ) * $dN ;
        $data['CLIMAT'] = $CLIMAT = $DHcor / 1000;
        
        $Sse = 0.028;
         /*
         * if(vitredegage){
         *      $Sse = 0.028;
         * }
         */
        // Caclul de E 
        // E = Pref x Nref / 1000 (selon méthode DEL2), par département – Ensoleillement sur(kWh/m²) – Valeurs en annexe 1.
        $data['E'] = $E = $Odept->getE($departement);
        
        // Calcul de X 
        switch ($zone){
            case  'h1' :
                $data['X'] = $X = (22.9 + ($Sse * $E ) ) / ($ENV * 2.5 * $CLIMAT);
                
                break;
            case  'h2' :
                $data['X'] = $X = (21.7 + ($Sse * $E ) ) / ($ENV * 2.5 * $CLIMAT);
                break;
            case  'h3' :
                $data['X'] = $X = (18.5 + ($Sse * $E ) ) / ($ENV * 2.5 * $CLIMAT);
                break;
            default :
               $data['X'] = $X = (22.9 + ($Sse * $E ) ) / ($ENV * 2.5 * $CLIMAT);

        }
        
        
       
        // COMPL
        $data['COMPL'] = $COMPL = 2.5 * (1 - ( ($X - pow($X, 2.9)) / (1 - pow($X, 2.9)) ));
        
        
        $data['METEO'] = $METEO = $CLIMAT * $COMPL;
        
        /********************************************************/
        /**************** 1.1.3. Calcul de INT ******************/
        /********* INT = Io / (1 + 0.1 * (G - 1 ) )  ************/
        /********************************************************/
        
        
        $data['Io'] = $Io = 0.85 ;
        $data['G'] = $G = $ENV / $CORH ;
        
        $data['INT'] = $INT = $Io / (1 + 0.1 * ($G - 1) );
        
        // Bch = SH x ENV x METEO x INT 
        $data['Bch'] = $Bch  = $sh * $ENV * $METEO * $INT ;
        
        /*----------------------------------------------------------------*/
        // 1.2. Calcul de Ich : Ich selon l’installation de chauffage (P:25)
        /*----------------------------------------------------------------*/
        
        $data['ich_id'] =  $ich_id = (isset($_POST['ich'])) ? $_POST['ich'] : 0 ;
		
        $OIch = new Ich_model();
        list($Rg, $Re, $Rd, $Rr, $with_chaudiere ) = $OIch->getRow($ich_id);
        $data['Rg'] = $Rg ;
        $data['Re'] = $Re ;
        $data['Rd'] = $Rd ;
        $data['Rr'] = $Rr ;
        $data['Pg'] = $Pg = (isset($_POST['programmateur'])) ? $_POST['programmateur'] : 1 ;;
	
        // Calcul $CORCH
        $Corch = 0;
        
        if($with_chaudiere){
            
           if($Bch < 2000 )
                $Corch = 1.7 - 6 * pow(10, -4) * $Bch;
            elseif(2000 < $Bch  && $Bch< 6000)
                $Corch = 0.75 - 1.25 * pow(10, -4) * $Bch;
            else 
                $Corch = 0; 
        }
        
        $data['Corch'] = $Corch;
        $data['Ich'] = $Ich = $Pg * (  (1 / $Rg * $Re * $Rd * $Rr) + $Corch ) ;
        
        // Calcul de Fch
        $data['Fch'] = $Fch = $Odept->getFch($departement);
        
        // Calcul Calcul des consommations de chauffage : Cch PCI = Cch PCS / α pcs 
        // S’il y a un seul système de chauffage sans système de chauffage solaire :
        $data['c_solaire'] = $c_solaire = $_POST['c_solaire'];
        $data['c_insert'] = $c_insert = $_POST['c_insert'];
        if($_POST['c_solaire']){
            // Avec un syteme Solaire : Cch PCS = Bch x (1-Fch) x Ich
            $data['Cch_PCS'] = $Cch_PCS = $Bch * (1-($Fch/100)) * $Ich;
        }else{
            // Sans systeme solaire : Cch PCS = Bch x Ich
            $data['Cch_PCS'] = $Cch_PCS = $Bch * $Ich;
        }
        
        // get a_pcsi
        $Oenergy = new Energy_model() ;
        $data['energy'] = $energy = $_POST['energy'] ;
        $data['energy_eau'] = $energy_eau = $_POST['energy_eau'] ;
        $data['a_pcsi'] = $a_pcsi = $Oenergy->getAPcsi($_POST['energy']);
        
        $data['Cch_PCI'] = $Cch_PCI = $Cch_PCS / $a_pcsi ;
        
        
        /*********************************************************/
        /************ 2 . CALCUL DE CONSOMMATION ECS *************/
        /************ Cecs PCI = Cecs PCS / α pcsi (P: 28 ) ******/
        /*********************************************************/
        
        
        /*------------------------------------------------------------------------*/
        // 2.1. Calcul de Becs : Becs = 1.163 x Qecs x (40 – Tef) x 48 / 1000 (P:28)
        /*------------------------------------------------------------------------*/
        
        $Qecs = 17.7 * $sh ;
        if($sh > 27 )
            $Qecs = (470.9 * log($sh) ) - 1075 ;
        
        switch ($zone){
            case  'h1' :
                $Tef = 10.5;
                break;
            case  'h2' :
                $Tef = 12;
                break;
            case  'h3' :
                $Tef = 14.5;
                break;
            default :
               $Tef = 10.5;

        }
            
        $data['Becs'] =  $Becs = 1.163 * $Qecs * (40 -$Tef) * 48 / 100 ;
        
        $data['ecs_id'] =  $ecs_id = (isset($_POST['iecs'])) ? $_POST['iecs'] : 0 ;
        $data['iecs_field'] =  $iecs_field  = (isset($_POST['iecs_field'])) ? $_POST['iecs_field'] : 0 ;
        
        /*------------------------------------------------------------------------*/
        // 2.2. Calcul de Iecs : Iecs selon l’installation  (P:29)
        /*------------------------------------------------------------------------*/
        
        $strIecsField = 'iecs_acc';
        if($iecs_field)
            $strIecsField = 'iecs_'.$iecs_field;
       
        $Oiecs = new Iecs_model();
        
        
        
        
        $data['Iecs'] =  $Iecs = $Oiecs->getIecsValue($ecs_id, $strIecsField);
        
        /*------------------------------------------------------------------------*/
        // 2.3. Calcul de Fecs   (P:30)
        /*------------------------------------------------------------------------*/
        
        // 2.3. Calcul de Fecs 
        $isNewInstall = $Oiecs->checkInstall($ecs_id);
        
        $data['Fecs'] = $Fecs = $Odept->getFecs($departement, $isNewInstall);
        
        
        /**************************************************************************/
        /************ 3 . Calcul des consommations de refroidissement  ************/
        /************       Cclim = Rclim x Sclim  (P: 32 )                  ******/
        /**************************************************************************/
        
        // Cclim = Rclim x Sclim
        $data['sh_clim'] =  $sh_clim  = (isset($_POST['sh_clim'])) ? $_POST['sh_clim'] : 1 ;
        
        $data['Sclim'] =  $Sclim = $sh_clim * $sh ;
        
        $zone_ete = $Odept->getZone($departement, true);
        
        switch ($zone_ete){
            case  'Ea' :
                if($Sclim<150)
                    $data['Rclim'] =  $Rclim = 2 ;
                else 
                    $data['Rclim'] =  $Rclim = 4 ;
                break;
            case  'Eb' :
                if($Sclim<150)
                    $data['Rclim'] =  $Rclim = 3 ;
                else 
                    $data['Rclim'] =  $Rclim = 5 ;
                break;
            case  'Ec' :
                if($Sclim<150)
                    $data['Rclim'] =  $Rclim = 4 ;
                else 
                    $data['Rclim'] =  $Rclim = 6 ;
                break;
            case  'Ed' :
                if($Sclim<150)
                    $data['Rclim'] =  $Rclim = 5 ;
                else 
                    $data['Rclim'] =  $Rclim = 7 ;
                break;
            default :
               if($Sclim<150)
                    $data['Rclim'] =  $Rclim = 3 ;
                else 
                    $data['Rclim'] =  $Rclim = 5 ;

        }
        
        $data['Cclim'] =  $Cclim = $Rclim * $Sclim;
        
        
        /**************************************************************************/
        /************ 4. Prise en compte de systèmes particuliers  ****************/
        /**************************************************************************/
        
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
        $data['plafonds'] = $this->plafond_model->getPlafonds();
        $data['energys'] = $this->energy_model->getEnergys();
        
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
        if(!isset($_POST['id_basement'])){
            echo '0';
            exit();
        }
        
        $id_basement = $_POST['id_basement'];
        if($id_basement == 0){
            echo '0';
            exit();
        }
            
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
        $zone = "h".$Odept->getZone($departement);
        return $zone;
    }
    
    
    
    /**
     * retourner les installations Ich selon le type d'energies
     */
    public function getIch(){
        $Oich = new Ich_model();
        $energy = $_POST['energy'];
        
        $data = $Oich->getIchs($energy);
        if(!count($data)){
            echo '0';
            exit();
        }
        
        $html = "<option value=''>- Préciser -</option>";
        foreach ($data as $item){
            $html .= "<option value='".$item['id']."'>".$item['label']."</optiion>";
        }

        echo $html;
        exit();
    }
    
    /**
     * retourner les installations Iecs selon le type d'energies
     */
    public function getIecs(){
        $Oiecs = new Iecs_model();
        $energy = $_POST['energy'];
        
        $data = $Oiecs->getIecs($energy);
        if(!count($data)){
            echo '0';
            exit();
        }
        
        $html = "<option value=''>- Préciser -</option>";
        foreach ($data as $item){
            $html .= "<option value='".$item['id']."'>".$item['label']."</optiion>";
        }

        echo $html;
        exit();
    }
	
}
