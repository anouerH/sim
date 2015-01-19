
<div class="container">

  <h1>simulateur énergétique</h1>
      <!--<p>Calcul des consommations de chauffage.</p>
      <p>Calcul des consommations d’ECS</p>
      <p>Calcul des consommations de refroidissement</p>-->
	

	 <?php echo form_open('index.php/simulateur/result',array('id'=>'example-advanced-form','class' => 'form-horizontal', 'role'=>'form')) ?>
            
		
            <h3>Maison</h3>
            <fieldset>
                <legend>Situation générale</legend>
                
                <div class="form-group full-row">
                    <label for="levels" class="col-sm-2 control-label">Type d'habitation</label>
                    <div class="col-sm-10 radio">
                        <div class="radio">
                            <label class="radio-inline">
                                <input type="radio" name="levels" id="levels" value="1" checked="checked"> Maison individuelle
                            </label>
                        </div>
                        <div class="radio">
                            <label class="radio-inline">
                                <input type="radio" name="levels" id="levels" value="2"> Appartement en immeuble collectif avec chauffage
    individuel
                            </label>
                        </div>
                        <div class="radio">
                            <label class="radio-inline">
                                <input type="radio" name="levels" id="levels" value="3"> Immeuble collectif avec chauffage collectif sans
    comptage individuel
                            </label>
                        </div>
                        
                    </div>
                </div>
                <hr>
                
                <div class="form-group">
                    <label for="shape" class="col-sm-4 control-label">Forme</label>
                    <div class="col-sm-4">
                        <select class="form-control required" id="shape" name="shape">
                            <option value="">- Préciser -</option>
                            <?php foreach ($shapes as $shape ) {?>
                                <option value="<?php echo $shape['code'] ?>"><?php echo $shape['label'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="mitoyennete" class="col-sm-4 control-label">Mitoyenneté</label>
                    <div class="col-sm-8">
                        <select class="form-control required" id="mitoyennete" name="mitoyennete">
                            <option value="">- Préciser -</option>
                            <?php foreach ($mitoyennetes as $mitoyennete ) {?>
                                <option value="<?php echo $mitoyennete['id'] ?>"><?php echo $mitoyennete['label'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="departement" class="col-sm-4 control-label">Département</label>
                    <div class="col-sm-4">
                        <select class="form-control required" id="departement" name="departement">
                            <option value="">- Préciser -</option>
                            <?php foreach ($departements as $departement ) {?>
                                <option value="<?php echo $departement['code'] ?>"><?php echo $departement['label'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label for="year_of_construction" class="col-sm-4 control-label">Année de construction</label>
                    <div class="col-sm-8">
                        <select class="form-control required" id="year_of_construction" name="year_of_construction">
                                                <option value="">- Préciser -</option>
                            <?php foreach ($c_years as $year ) {?>
                                <option value="<?php echo $year['code'] ?>"><?php echo $year['label'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                
                
                
                
                
                <legend>Structure</legend>
                <div class="form-group">
                    <label for="sh" class="col-sm-4 control-label">Surface habitable</label>
                    <div class="col-sm-4 input-group">
                            <input  class="form-control required number" name="sh" id="sh" placeholder="Surface habitable" value="<?php echo set_value('sh'); ?>">
                            <span class="input-group-addon">m<sup>2</sup></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sh_clim" class="col-sm-4 control-label">Pourcentage de surface habitable climatisée</label>
                    <div class="col-sm-4 input-group">
                            <input  class="form-control required number" name="sh_clim" id="sh_clim" placeholder="Pourcentage de surface habitable climatisée" value="<?php echo set_value('sh'); ?>">
                            <span class="input-group-addon">%</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="altitude" class="col-sm-4 control-label">Altitude</label>
                    <div class="col-sm-4 input-group">
                      <input type="text" class="form-control required number" id="altitude" name="altitude" placeholder="Altitude">
                        <span class="input-group-addon">m<sup>2</sup></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="roof_type" class="col-sm-4 control-label">Type de toiture</label>
                    <div class="col-sm-4">
                        <select class="form-control required" id="roof_type" name="roof_type">
                                                <option value="">- Préciser -</option>
                            <?php foreach ($r_types as $type ) {?>
                                <option value="<?php echo $type['code'] ?>"><?php echo $type['label'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="nbre_niveaux" class="col-sm-4 control-label">Nombre de niveaux</label>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" name="nbre_niveaux" id="nbre_niveaux" value="1" class="required"> 1
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="nbre_niveaux" id="nbre_niveaux" value="1.5" class="required"> 1.5
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="nbre_niveaux" id="nbre_niveaux" value="2" class="required"> 2
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="nbre_niveaux" id="nbre_niveaux" value="2.5" class="required"> 2.5
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="nbre_niveaux" id="nbre_niveaux" value="3" class="required"> 3
                        </label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="hsp" class="col-sm-4 control-label ">Hauteur moyenne sous plafond</label>
                    <div class="col-sm-4">
                        <select class="form-control required" id="hsp" name="hsp">
                            <option value="">- Préciser -</option>
                            <option value="0">- Inconnue -</option>
                            <?php foreach ($hsps as $item ) {?>
                                <option value="<?php echo $item['hsp'] ?>"><?php echo $item['hsp'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="cor_sol" class="col-sm-4 control-label">Plafond</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="plafond" name="plafond">
                            <option value="">- Préciser -</option>
                            <?php foreach ($plafonds as $plafond ) {?>
                                <option value="<?php echo $plafond['upafond'] ?>" ><?php echo $plafond['label'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div> 
                <div class="row  clear-div">
                    <div class="form-group">
                        <label for="cor_sol" class="col-sm-4 control-label">Type de plancher bas</label>
                        <div class="col-sm-4">
                            <select class="form-control required" id="CORsol" name="CORsol">
                                <option value="">- Préciser -</option>
                                <option value="0" rel="0" code="0">Inconnue</option>
                                <?php foreach ($b_types as $type ) {?>
                                    <option value="<?php echo $type['cor_sol'] ?>" rel="<?php echo $type['id']?>" code="<?php echo $type['code'] ?>"><?php echo $type['label'] ?></option>
                                <?php } ?>
                            </select>
                          <input type="hidden" id="plancher_bas" name="plancher_bas" value="">
                        </div>
                    </div>
                    <div class="form-group" id="basement_form_group">
                        <label for="basement_form" class="col-sm-4 control-label">Forme de plancher bas</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="basement_form" name="basement_form">

                            </select>
                        </div>
                    </div>
                </div>
                
                
                
            </fieldset>
			
            <h3>Equipements</h3>
            <fieldset>
                <legend>Isolation</legend>
                
                        <div class="form-group full-row">
				<label for="wall_material" class="col-sm-2 control-label">Type de mur</label>
				<div class="col-sm-10">
                                        <label class="radio-inline">
                                          <input type="radio" name="wall_material" id="wall_material" value="0" checked="checked"> Inconnu
					</label>
					<?php foreach ($w_types as $type ) {?>
						<label class="radio-inline">
						  <input type="radio" name="wall_material" id="wall_material" value="<?php echo $type['id'] ?>"> <?php echo $type['label'] ?>
						</label>
					<?php } ?>
				</div>
			</div>
                
                <div class="form-group full-row" id="wall_thickness_group">
                    <label for="wall_thickness" class="col-sm-2 control-label">Epaisseur</label>
                    <div class="col-sm-4">
                            <select class="form-control" id="wall_thickness" name="wall_thickness">
                                <option>- Préciser -</option>
                                <?php foreach ($thickness as $item ) {?>
                                        <option value="<?php echo $item['umur'] ?>"><?php echo $item['thickness'] ?></option>
                                <?php } ?>
                            </select>
                    </div>
		</div>
                
            <legend>Les fenêtres</legend>
                
            
            <div class="form-group">
                <label for="Sfenetres" class="col-sm-4 control-label">Surface des fenêtres</label>
                <div class="col-sm-4 input-group">
                    <input  class="form-control required" name="Sfenetres" id="Sfenetres" placeholder="Surface des fenêtres">
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>
            </div>
                        
            <div class="form-group">
                <label for="Sveranda" class="col-sm-4 control-label">Surface de véranda</label>
                <div class="col-sm-4 input-group">
                    <input  class="form-control required" name="Sveranda" id="Sveranda" placeholder="Surface de véranda">
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="Sfenetres" class="col-sm-4 control-label">Surface des fenêtres de toit</label>
                <div class="col-sm-4 input-group">
                    <input  class="form-control required" name="Sfenetrestoit" id="Sfenetrestoit" placeholder="Surface des fenêtres de toit">
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="glazing_type" class="col-sm-4 control-label">Type de vitrage</label>
                <div class="col-sm-4">
                    <select class="form-control required" id="glazing_type" name="glazing_type">
                        <option value="">- Préciser -</option>
                        <?php foreach ($g_types as $type ) {?>
                                <option value="<?php echo $type['id'] ?>"><?php echo $type['label'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            
            
            
            <div class="form-group" id="air_space_group">
                <label for="air_space" class="col-sm-4 control-label">Lame d’air</label>
                <div class="col-sm-4">
                    <select class="form-control required" id="air_space" name="air_space">
                      <option value="0">- Préciser -</option>
                        <?php foreach ($a_spaces as $item ) {?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['label'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="with_volet" class="col-sm-4 control-label">Présence de volets</label>
                <div class="col-sm-5">
                    <label class="radio-inline">
                      <input type="radio" name="with_volet" id="with_volet" value="true" class="required"> Oui  
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="with_volet" id="with_volet" value="false" class="required"> Non
                    </label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="carpentry_type" class="col-sm-4 control-label">Type de menuiserie</label>
                <div class="col-sm-4">
                    <select class="form-control required" id="carpentry_type" name="carpentry_type">
                        <option value="">- Préciser -</option>
                        <?php foreach ($car_types as $type ) {?>
                            <option value="<?php echo $type['id'] ?>"><?php echo $type['label'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            
            
            
            
            
            
            
            
            
            
            
            <div class="form-group">
                <label for="facing_south_glazing" class="col-sm-4 control-label">Grande surface vitrée au sud</label>
                <div class="col-sm-5">
                    <label class="radio-inline">
                      <input type="radio" name="facing_south_glazing" id="facing_south_glazing" value="true"> Oui 
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="facing_south_glazing" id="facing_south_glazing" value="false"> Nom
                    </label>
                </div>
            </div>
            

			


            <!--<div class="form-group has-error">
                <label for="wall_insulation" class="col-sm-4 control-label">Isolation du mur</label>
                <div class="col-sm-5">
                        In progress
                </div>
            </div>

            <div class="form-group has-error">
                <label for="wall_insulation" class="col-sm-4 control-label">Surface de toiture</label>
                <div class="col-sm-5">
                        In progress
                </div>
            </div>-->

            <!--<div class="form-group">
                <label for="roof_composition" class="col-sm-4 control-label">Composition de la toiture</label>
                <div class="col-sm-5">
                        <label class="radio-inline">
                          <input type="radio" name="roof_composition" id="roof_composition" value="false"> inconnu 
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="roof_composition" id="roof_composition" value="typologie"> typologie
                        </label>
                </div>
            </div>


            <div class="form-group has-error">
                    <label for="roof_insulation" class="col-sm-4 control-label">Isolation de la toiture</label>
                    <div class="col-sm-5">
                            In porgress
                    </div>
            </div>
			
			
			

            <div class="form-group has-error">
                <label for="basement_area" class="col-sm-4 control-label">Surface de plancher bas</label>
                <div class="col-sm-5">
                        In porgress
                </div>
            </div>
                
            <div class="form-group">
                    <label for="roof_composition" class="col-sm-4 control-label">Composition du plancher bas</label>
                    <div class="col-sm-5">
                            <label class="radio-inline">
                              <input type="radio" name="roof_composition" id="roof_composition" value="false"> inconnu 
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="roof_composition" id="roof_composition" value="typologie"> typologie
                            </label>
                    </div>
            </div>
			
            <div class="form-group has-error">
                <label for="roof_insulation" class="col-sm-4 control-label">Isolation du plancher bas</label>
                <div class="col-sm-5">
                        In porgress
                </div>
            </div>-->
			
			

			
            <div class="form-group">
                <label for="with_argon" class="col-sm-4 control-label">Présence d’argon</label>
                <div class="col-sm-5">
                    <label class="radio-inline">
                      <input type="radio" name="with_argon" id="with_argon" value="true"> Oui  
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="with_argon" id="with_argon" value="false"> Non
                    </label>
                </div>
            </div>
			
            

            <div class="form-group">
                <label for="window_area" class="col-sm-4 control-label">Surface de portes extérieures</label>
                <div class="col-sm-4 input-group">
                    <input  class="form-control" name="window_area" id="window_area" placeholder="Surface de portes extérieures">
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>
            </div>

            <div class="form-group">
                <label for="door_type" class="col-sm-4 control-label">Type de porte</label>
                <div class="col-sm-4">
                    <select class="form-control required" id="door_type" name="door_type">
                      <option value="">- Préciser -</option>
                            <?php foreach ($d_types as $type ) {?>
                                    <option value="<?php echo $type['u'] ?>"><?php echo $type['label'] ?></option>
                            <?php } ?>
                    </select>
                </div>
            </div>

            
			
			
			
                        

                        <!--<div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-default">Envoyer ... </button>
                            </div>
                        </div>-->
    
                </fieldset>
            
    <h3>Chauffage / Chauffe-eau</h3>
    <fieldset>
        
      
      <legend>Chauffage</legend>
                <div class="row  clear-div">
                    <div class="form-group ">
                        <label for="energy" class="col-sm-4 control-label">Energie</label>
                        <div class="col-sm-4">
                            <select class="form-control required" id="energy" name="energy">
                                <option value="">- Préciser -</option>
                                <?php foreach ($energys as $energy ) {?>
                                    <option value="<?php echo $energy['id'] ?>" ><?php echo $energy['label'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="ich_group">
                        <label for="ich" class="col-sm-4 control-label">Système de chauffage</label>
                        <div class="col-sm-4">
                            <select class="form-control required" id="ich" name="ich">
                                    
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row  clear-div">
                    <div class="form-group" >
                        <label class="col-sm-4 control-label">Installation avec un chauffage solaire ? </label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                              <input type="radio" name="c_solaire" id="c_solaire" value="1" class="required"> Oui  
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="c_solaire" id="c_solaire" value="0" checked="checked" class="required"> Non
                            </label>
                        </div>
                    </div>
                    <div class="form-group" >
                        <label class="col-sm-4 control-label">Installation avec un insert ou poêle à bois ? </label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                              <input type="radio" name="c_insert" id="c_insert" value="1" class="required"> Oui  
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="c_insert" id="c_insert" value="0" checked="checked" class="required"> Non
                            </label>
                        </div>
                    </div>
                </div>
                <legend>Chauffe-eau</legend>
                <div class="row  clear-div">
                    <div class="form-group ">
                        <label for="energy_eau" class="col-sm-4 control-label">Energie</label>
                        <div class="col-sm-4">
                            <select class="form-control required" id="energy_eau" name="energy_eau">
                                <option value="">- Préciser -</option>
                                <?php foreach ($energys as $energy ) {?>
                                    <option value="<?php echo $energy['id'] ?>" ><?php echo $energy['label'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="iecs_group">
                        <label for="iecs" class="col-sm-4 control-label">Installation</label>
                        <div class="col-sm-4">
                            <select class="form-control required" id="iecs" name="iecs">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row  clear-div">
                  <div class="form-group clear-div" id="ballon_type_group">
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                              <input type="radio" name="iecs_field" id="iecs_field" value="bv" class="required"> Ballon vertical  
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="iecs_field" id="iecs_field" value="bh" class="required"> Ballon horizontal
                            </label>
                        </div>
                    </div>
                  
                    <div class="form-group clear-div" id="veilleuse_group">
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                              <input type="radio" name="iecs_field" id="iecs_field" value="av" class="required"> Avec veilleuse  
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="iecs_field" id="iecs_field" value="sv" class="required"> Sans veilleuse
                            </label>
                        </div>
                    </div>
                  
                    <div class="form-group clear-div" id="accumulation_group">
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                              <input type="radio" name="iecs_field" id="iecs_field" value="inst" class="required"> instantanée  
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="iecs_field" id="iecs_field" value="acc" class="required"> Accumulation
                            </label>
                        </div>
                    </div>
                  
                </div>
                
                <!--
                <legend>Autres</legend>
            <div class="form-group">
                <label for="with_argon" class="col-sm-4 control-label">Chauffage eau chaude</label>
                <div class="col-sm-5">
                    <label class="radio-inline">
                      <input type="radio" name="with_argon" id="with_argon" value="true"> Oui  
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="with_argon" id="with_argon" value="false"> Non
                    </label>
                </div>
            </div>


            <div class="form-group">
                <label for="transmitter_type" class="col-sm-4 control-label">Type émetteur</label>
                <div class="col-sm-4">
                    <select class="form-control" id="transmitter_type" name="transmitter_type">
                            <option>- Préciser -</option>
                            <option>radiateur</option>
                            <option>plancher chauffant</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="with_argon" class="col-sm-4 control-label">Présence de robinet thermostatique sur les radiateur</label>
                <div class="col-sm-5">
                    <label class="radio-inline">
                      <input type="radio" name="with_argon" id="with_argon" value="true"> Oui  
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="with_argon" id="with_argon" value="false"> Non
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="with_programmer" class="col-sm-4 control-label">Présence d’un programmateur</label>
                <div class="col-sm-5">
                        <label class="radio-inline">
                          <input type="radio" name="with_programmer" id="with_programmer" value="true"> Oui  
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="with_programmer" id="with_programmer" value="false"> Non
                        </label>
                </div>
            </div>

            <div class="form-group has-warning">
                <label for="esc" class="col-sm-4 control-label">Système d’ECS</label>
                <div class="col-sm-4">
                    <select class="form-control" id="esc" name="esc">
                            <option>- Préciser -</option>
                            <?php foreach ($g_types as $type ) {?>
                                    <option value="<?php echo $type['code'] ?>"><?php echo $type['label'] ?></option>
                            <?php } ?>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label for="aRA" class="col-sm-4 control-label">Système de ventilation</label>
                <div class="col-sm-4">
                    <select class="form-control required" id="aRA" name="aRA">
                            <option value="">- Préciser -</option>
                            <?php foreach ($ventilations as $ventilation ) {?>
                                    <option value="<?php echo $ventilation['ara'] ?>"><?php echo $ventilation['label'] ?></option>
                            <?php } ?>
                    </select>
                </div>
            </div>
        <legend>Chauffage eau</legend>-->
    </fieldset>
 
    <!--<h3>Résultats</h3>
    <fieldset>
        <legend>Résultats</legend>
        <p>Affichage des résultats ...</p>
        
    </fieldset>-->
</form>


    </div>
	
