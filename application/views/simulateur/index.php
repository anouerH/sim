
<div class="container">

      <h1>Maison individuelle</h1>
      <p>Calcul des consommations de chauffage.</p>
      <p>Calcul des consommations d’ECS</p>
      <p>Calcul des consommations de refroidissement</p>
	  
	  
		<form class="form-horizontal" role="form">
		
			<div class="form-group">
				<label for="surface" class="col-sm-2 control-label">Surface habitable</label>
				<div class="col-sm-2 input-group">
					<input type="number" class="form-control" name="surface" id="surface" placeholder="Surface habitable">
					<span class="input-group-addon">m<sup>2</sup></span>
				</div>
			</div>
			
			<div class="form-group">
				<label for="departement" class="col-sm-2 control-label">Département</label>
				<div class="col-sm-2">
					<select class="form-control" id="departement" name="departement">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="altitude" class="col-sm-2 control-label">Altitude</label>
				<div class="col-sm-2 input-group">
					<input type="number" class="form-control" id="altitude" name="altitude" placeholder="Altitude">
					<span class="input-group-addon">m<sup>2</sup></span>
				</div>
			</div>
			
			<div class="form-group">
				<label for="year_of_construction" class="col-sm-2 control-label">Année de construction</label>
				<div class="col-sm-2">
					<select class="form-control" id="year_of_construction" name="year_of_construction">
						<option>- Préciser -</option>
						<?php foreach ($c_years as $year ) {?>
							<option value="<?php echo $year['code'] ?>"><?php echo $year['label'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="roof_type" class="col-sm-2 control-label">Type de toiture</label>
				<div class="col-sm-2">
					<select class="form-control" id="roof_type" name="roof_type">
						<option>- Préciser -</option>
						<?php foreach ($r_types as $type ) {?>
							<option value="<?php echo $type['code'] ?>"><?php echo $type['label'] ?></option>
						<?php } ?>
						
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="basement_type" class="col-sm-2 control-label">Type de plancher bas</label>
				<div class="col-sm-2">
					<select class="form-control" id="basement_type" name="basement_type">
						<option>- Préciser -</option>
						<?php foreach ($b_types as $type ) {?>
							<option value="<?php echo $type['code'] ?>"><?php echo $type['label'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="levels" class="col-sm-2 control-label">Nombre de niveaux</label>
				<div class="col-sm-5">
					<label class="radio-inline">
					  <input type="radio" name="levels" id="levels" value="option1"> 1
					</label>
					<label class="radio-inline">
					  <input type="radio" name="levels" id="levels" value="option1"> 1.5
					</label>
					<label class="radio-inline">
					  <input type="radio" name="levels" id="levels" value="option1"> 2
					</label>
					
					<label class="radio-inline">
					  <input type="radio" name="nbre_niveaux" id="nbre_niveaux" value="option1"> 2.5
					</label>
					<label class="radio-inline">
					  <input type="radio" name="nbre_niveaux" id="nbre_niveaux" value="option1"> 3
					</label>
				</div>
			</div>
			
			
			<div class="form-group">
				<label for="ceiling_height" class="col-sm-2 control-label">Hauteur moyenne sous plafond</label>
				<div class="col-sm-2 input-group">
					<input type="float" class="form-control" id="ceiling_height" name="ceiling_height" placeholder="Hauteur moyenne sous plafond">
					<span class="input-group-addon">m</span>
				</div>
			</div>
			
			<div class="form-group">
				<label for="mitoyennete" class="col-sm-2 control-label">Mitoyenneté</label>
				<div class="col-sm-2">
					<select class="form-control" id="mitoyennete" name="mitoyennete">
						<option>- Préciser -</option>
						<?php foreach ($mitoyennetes as $mitoyennete ) {?>
							<option value="<?php echo $mitoyennete['code'] ?>"><?php echo $mitoyennete['label'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="shape" class="col-sm-2 control-label">Forme</label>
				<div class="col-sm-2">
					<select class="form-control" id="shape" name="shape">
						<option>- Préciser -</option>
						<?php foreach ($shapes as $shape ) {?>
							<option value="<?php echo $shape['code'] ?>"><?php echo $shape['label'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			
			
  <!--<div class="form-group">

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>


    </div>
	