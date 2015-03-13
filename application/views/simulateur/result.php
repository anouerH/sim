<?php
    //var_dump($_POST);
?>
<div class="container">
    <h1>1. Calcul des consommations de chauffage</h1>
    <div class="alert alert-info alert-dismissible fade in" role="alert">
      
      <strong><samp>CchPCI = CchPCS / apcsi</samp></strong>
    </div>
    
    <!--<div class="alert alert-warning alert-dismissible fade in" role="alert">
      
      S’il y a un seul système de chauffage sans système de chauffage solaire : 
      <strong><samp>CchPCS = Bch x Ich</samp></strong>
    </div>
    
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
      
      S’il y a un seul système de chauffage avec système de chauffage solaire : 
      <strong><samp>CchPCS = Bch x (1-Fch) x Ich</samp></strong>
    </div>
    
    
    
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
      
      S’il y a un système de chauffage (Ich1) et un insert ou poêle à bois : <br>
      <strong><samp>Cch1 PCS = 0.75 x Bch x Ich1</samp></strong><br>
      <strong><samp>Cch2 PCS = 0.25 x Bch x 2</samp></strong>
    </div>
    
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
      
      S’il y a plusieurs systèmes de chauffage <br>
      <strong><samp>Cch1 PCS = SH1/SH x Bch x Ich 1</samp></strong><br>
      <strong><samp>Cch2 PCS = SH2/SH x Bch x Ich 2</samp></strong><br>
      <strong><samp>Cch3 PCS = SH3/SH x Bch x Ich 3</samp></strong>
      
    </div>-->
    
    
    
    <h2>1.1. Calcul de Bch</h2>
    <div class="alert alert-info alert-dismissible fade in" role="alert">
      
      <strong><samp><samp>Bch = SH x ENV x METEO x INT</samp></samp></strong>
    </div>
    
    
    
    <div class="bs-example">
    <table class="table table-striped">
      <caption>Données du formulaire</caption>
      <thead>
        <tr>
          <th>Field</th>
          <th>Value</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Sur. fenêtres</td>
          <td><kbd>Sfenetres = <?php echo $Sfenetres?></kbd></td>
        </tr>
        <tr>
          <td>Sur. fenêtres toit</td>
          <td><kbd>Sfenetrestoit = <?php echo $Sfenetrestoit?></kbd></td>
        </tr>
        <tr>
          <td>Sur. portes</td>
          <td><kbd>Sportes = <?php echo $Sportes?></kbd></td>
        </tr>
        
        <tr>
          <td>type toiture</td>
          <td><kbd>roof_type = <?php echo $roof_type?></kbd></td>
        </tr>
        
        <tr>
          <td>Mitoyenneté</td>
          <td><kbd>MIT = <?php echo $MIT?></kbd></td>
        </tr>
        
        <tr>
          <td>Nbre de niveau </td>
          <td><kbd>NIV = <?php echo $NIV?></kbd></td>
        </tr>
        
        <tr>
          <td>Combles habités ? </td>
          <td><kbd>isHabitableAttics = <?php  ($isHabitableAttics) ? print "Oui" : print "Non" ?></kbd> </td>
        </tr>
        
        <tr>
          <td>Forme</td>
          <td><kbd>shape = <?php  echo $shape ?></kbd> </td>
        </tr>
        
        <tr>
          <td>FOR</td>
          <td><kbd>FOR = <?php  echo $FOR ?></kbd> </td>
        </tr>
        
        <tr>
          <td>Departement</td>
          <td><kbd>FOR = <?php  echo $departement ?></kbd> </td>
        </tr>
        
        <tr>
          <td>Type de mur</td>
          <td><kbd><?php  echo $wall ?></kbd> </td>
        </tr>
        
        <tr>
          <td>Epaisseur</td>
          <td><kbd><?php  echo $wall_thickness ?></kbd> </td>
        </tr>
        
        
        <tr>
          <td>Année de construction</td>
          <td><kbd><?php  echo $year_of_construction ?></kbd> </td>
        </tr>
        
        <tr>
          <td>Type de plancher</td>
          <td><kbd><?php  echo $plancher_bas ?></kbd> </td>
        </tr>
        
      </tbody>
    </table>
  </div>
    <h3>1.1.1. Calcul de ENV</h3>
    <kbd class="bg-primary">ENV = (DPmurs + DPplafond + DPplancher + DPfenêtres + DPportes + DPvéranda + PT) / 2.5 x Sh + aRA</kbd>
    <!--<br>
    <code>DP murs = b 1 x S murs1 x U murs1 + b 2 x S murs2 x U murs2 + b 3 x S murs3 x U murs3</code><br>
    <code>DP plafond = b’ 1 x S plafond1 x U plafond1 + b’ 2 x S plafond2 x U plafond2 + b’ 3 x S plafondt3 x U plafond3</code><br>
    <code>DP plancher = C orsol1 x S plancher 1 x U plancher 1 + C orsol2 x S plancher 2 x U plancher 2 + C orsol3 x S plancher 3 x U plancher 3</code><br>
    <code>DP fenêtres = S fenêtres1 x U fenêtres1 + S fenêtres2 x U fenêtres2 + S fenêtres3 x U fenêtres3</code><br>
    <code>DP portes = S portes1 x U portes1 + S portes2 x U portes2 + S portes3 x U portes3</code><br>
    <code>DP véranda = S véranda1 x U véranda1 + S véranda2 x U véranda2 + S véranda3 x U véranda3</code><br>    
    -->
    <h4>Calcul de aRA</h4>
    <samp>selon le type de ventillation :
    </samp><kbd class="bg-primary">aRA = <?php echo $aRA?></kbd>
    <h4>Calcul de CORH</h4>
    <samp>Si la hauteur moyenne est connue : <code>CORH = HSP / 2.5</code> </samp><kbd class="bg-primary">CORH = <?php echo $CORH ?></kbd>
        
    
    <h4>Caclul CORsol</h4>
    <samp>selon le type de plancher bas : </samp><kbd class="bg-primary">CORsol = <?php echo $CORsol?></kbd>
    <h4>Caclul Smur</h4>
    
    
    
    <!--<h4>Sur. fenêtres</h4><kbd class="bg-primary">Sfenetres = <?php echo $Sfenetres?></kbd>
    <h4>Sur. fenêtres toit</h4><kbd class="bg-primary">Sfenetrestoit = <?php echo $Sfenetrestoit?></kbd>
    <h4>Sur. portes </h4><kbd class="bg-primary">Sportes = <?php echo $Sportes?></kbd>
    <h5>type toiture <kbd class="bg-primary">roof_type = <?php echo $roof_type?></kbd></h5>
    <h5>Mitoyenneté <kbd class="bg-primary">MIT = <?php echo $MIT?></kbd></h5>
    <h5>nbre de niveau  <kbd class="bg-primary">NIV = <?php echo $NIV ?></kbd></h5>
    <h5>FOR <kbd class="bg-primary">FOR = <?php echo $FOR ?></kbd></h5>
    <h5>Combles habités ? <kbd class="bg-primary">isHabitableAttics = <?php  ($isHabitableAttics) ? print "Oui" : print "Non" ?></kbd> donc -->
        <?php 
            if($isHabitableAttics){
        ?>
            <code>Smur = (MIT x FOR x RACINE(SH/NIV) x (NIVx0.8) x HSP ) – Sfenêtres – Sportes  </code>
        <?php
            } else {
        ?>
            <code>Smur = (MIT x FOR x RACINE(SH/NIV) x NIV  x HSP ) – Sfenêtres – Sportes  </code>
        <?php
            } 
        ?>
    </h5>
    
    <div class="alert alert-success alert-dismissible fade in" role="alert">
      <strong><samp><samp>Smur = <?php echo $Smur?></samp></samp></strong>
    </div>
    
    
    
    <h4>Caclul Splancher</h4>
    <code>Splancher = SH / NIV </code>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
      <strong><samp><samp>Splancher = <?php echo $Splancher ?></samp></samp></strong>
    </div>
    <h4>Caclul Splafond</h4>
    Si les combles sont habités : <code>Splafond = 1.3 x SH / NIV - Sfenêtrestoit</code>
    Si non : <code>Splafond = SH / NIV </code>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
      <strong><samp><samp>Splafond = <?php echo $Splafond  ?></samp></samp></strong>
    </div>
    
    <h4>Coefficients U des murs</h4>
    <samp> Zone : </samp><kbd class="bg-primary"> <?php echo $zone ?></kbd> <br>
    <samp> Type de mur : </samp><kbd class="bg-primary"> <?php echo $wall ?></kbd> <br>
    <samp> Année de construction : </samp><kbd class="bg-primary"> <?php echo $year_of_construction ?></kbd>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong><samp><samp>Umur = <?php echo $Umur  ?></samp></samp></strong>
    </div>
    
    <h4>Coefficients U des planchers bas</h4>
    <samp> Zone : </samp><kbd class="bg-primary"> <?php echo $zone ?></kbd> <br>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong><samp><samp>Uplancher = <?php echo $Uplancher  ?></samp></samp></strong>
    </div>
    
    
    <h4>Coefficients U des planchers hauts :</h4>
    <samp> id vitrage : </samp><kbd class="bg-primary"> <?php echo $glazing_type ?></kbd> <br>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong><samp><samp>Uplafond = <?php echo $Uplafond  ?></samp></samp></strong>
    </div>
    
    <h4>Coefficients U des fenêtres, porte-fenêtres :</h4>
    <samp> id vitrage : </samp><kbd class="bg-primary"> <?php echo $glazing_type ?></kbd> <br>
    <samp> Type de menuiserie: </samp><kbd class="bg-primary"> <?php echo $carpentry_type ?></kbd> <br>
    <samp> Avex ou sans volet: </samp><kbd class="bg-primary"> <?php echo $with_volet ?></kbd> <br>
    <samp> lame d'air: </samp><kbd class="bg-primary"> <?php echo $air_space  ?></kbd> <br>
    
    
    
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong><samp><samp>Ufenetre = <?php echo $Ufenetre  ?></samp></samp></strong>
    </div>
    <h4>Coefficients U de la véranda (chauffée) :</h4>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong><samp><samp>Uveranda = <?php echo $Uveranda  ?></samp></samp></strong>
    </div>
    <h4>Coefficients U des portes :</h4>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong><samp><samp>Uportes = <?php echo $Uportes  ?></samp></samp></strong>
    </div>
    
    <!-- DPs-->
    <h4>Calcul des Dps</h4>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong><samp><samp>DPmurs = <?php echo $DPmurs  ?></samp></samp></strong>
    </div>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong><samp><samp>DPplafond = <?php echo $DPplafond  ?></samp></samp></strong>
    </div>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong><samp><samp>DPplancher = <?php echo $DPplancher  ?></samp></samp></strong>
    </div>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong><samp><samp>DPfenetres = <?php echo $DPfenetres  ?></samp></samp></strong>
    </div>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong><samp><samp>DPportes = <?php echo $DPportes  ?></samp></samp></strong>
    </div>
    
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong><samp><samp>DPveranda = <?php echo $DPveranda  ?></samp></samp></strong>
    </div>
    <h4>Calcul des ponts thermiques PT :</h4>
    
    <kbd class="bg-primary">PT = Kpb_m  x Lpb_m + kpi_m x lpi_m + krf_m x lrf_m + krf_pb x lrf_pb + kmen x lmen</kbd>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong><samp><samp>PT = <?php echo $PT  ?></samp></samp></strong>
    </div>
    <br>
    
    <h4>Calcul de ENV </h4>
    <kbd class="bg-primary">ENV = (DPmurs + DPplafond + DPplancher + DPfenêtres + DPportes + DPvéranda + PT) / 2.5 x Sh + aRA</kbd>
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <strong><samp><samp>ENV = <?php echo $ENV  ?></samp></samp></strong>
    </div>
    <br>
    
    <h3>1.1.1. Calcul de METEO</h3>
    <kbd class="bg-primary">METEO = CLIMAT x COMPL</kbd><br><br>
    
    
    <kbd class="bg-primary">CLIMAT = DHcor / 1000</kbd><br><br>
    <kbd class="bg-primary">DHcor= Dhref + ((Nref / C2)+5) x dN</kbd><br><br>
    <kbd class="bg-primary">Dhref = <?php echo (int)$Dhref  ?></kbd><br>
    <kbd class="bg-primary">Nref = <?php echo (int)$Nref  ?></kbd><br>
    
    <kbd class="bg-primary">C3 = <?php echo (int)$C3  ?></kbd><br>
    <kbd class="bg-primary">C4 = <?php echo (int)$C4  ?></kbd><br>
    
    <kbd class="bg-primary">C2 = <?php echo (int)$C2  ?>  (Si C4 = - ; C2=340 sinon C2=400)</kbd><br><br>
    
    <kbd class="bg-primary">dN = C3 x altitude (m)</kbd><br>
    <kbd class="bg-primary">dN = <?php echo $C3 ?> x <?php echo $altitude ?> </kbd><br>
    <kbd class="bg-primary">dN = <?php echo $dN ?></kbd><br><br>
    <kbd class="bg-primary">DHcor = <?php echo $Dhref ?> + ((<?php echo $Nref ?> / <?php echo $C2 ?> )+5) x <?php echo $dN ?> </kbd><br>
    <kbd class="bg-primary">DHcor = <?php echo $DHcor ?> </kbd><br><br>
    
    <kbd class="bg-primary">CLIMAT = <?php echo $DHcor  ?> / 1000 </kbd><br>
    <kbd class="bg-primary">CLIMAT = <?php echo $CLIMAT  ?> / 1000 </kbd><br><br>
    <kbd class="bg-primary">COMPL = <?php echo $COMPL  ?></kbd>
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <strong><samp><samp>METEO = <?php echo $METEO  ?></samp></samp></strong>
    </div>
    <br>
    
    <h4>Calcul de INT </h4>
    <kbd class="bg-primary">INT  = Io / (1 + 0.1 * (G - 1) )</kbd><br><br>
    
    <kbd class="bg-primary">Io = <?php echo $Io  ?></kbd>
    <kbd class="bg-primary">G = <?php echo $G  ?></kbd>
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <strong><samp><samp>INT = <?php echo $INT  ?></samp></samp></strong>
    </div>
    <br>
    <h4 class="text-info">Bch =  SH x ENV x METEO x INT </h4>
    <h4 class="text-info">Bch =  <?php echo $sh?> x <?php echo $ENV?> x <?php echo $METEO?> x <?php echo $INT?> </h4>
    <h4 class="text-info">Bch = <?php echo $Bch?></h4>
    
    
    
    <h2>1.2. Calcul de Ich</h2>
    <div class="alert alert-info alert-dismissible fade in" role="alert">
      
      <strong><samp><samp>Ich = Pg x (  (1 / Rg * Re * Rd * Rr) + Corch ) </samp></samp></strong>
    </div>
    
    <h4 class="text-info">Ich = <?php echo $Pg?> x (  (1 / <?php echo $Rg?> * <?php echo $Re?> * <?php echo $Rd?> * <?php echo $Rr?>) + <?php echo $Corch   ?> ) </h4>
    <h4 class="text-info">Ich = <?php echo $Ich?></h4>
    
    <h4>Calcul de Fch</h4>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong><samp><samp>Fch = <?php echo $Fch  ?> % </samp></samp></strong>
    </div>
    <br>
    
    <h3 class="text-info">Cch PCS = Bch x Ich</h3>
    <h3 class="text-info">Cch_PCS = <?php echo $Cch_PCS?></h3>
    <h3 class="text-info">Cch_PCS = <?php echo $Cch_PCS?></h3>
    <h3 class="text-info">a_pcsi = <?php echo $a_pcsi?></h3>
    <div class="alert alert-info alert-dismissible fade in" role="alert">
      
      <strong><samp>CchPCI = CchPCS / apcsi</samp></strong>
    </div>
    <h2 class="text-danger">Cch_PCI = <?php echo $Cch_PCI ?></h2>
    
    <h1>2. Calcul des consommations d’ECS</h1>
    <div class="alert alert-info alert-dismissible fade in" role="alert">
      
      <strong><samp>Cecs PCI = Cecs PCS / α pcsi</samp></strong>
    </div>
    <h2>2.1. Calcul de Becs</h2>
    <div class="alert alert-info alert-dismissible fade in" role="alert">
      
      <strong><samp><samp>Becs = 1.163 x Qecs x (40 – Tef) x 48 / 1000</samp></samp></strong>
    </div>
    <h1 class="text-info">Becs =  <?php echo $Becs ?></h1>
    <h2>2.2. Calcul de Iecs </h2>
    <h1 class="text-info">Iecs =  <?php echo $Iecs ?></h1>
    <h2>2.3. Calcul de Fecs</h2>
    <h1 class="text-info">Fecs =  <?php echo $Fecs ?></h1>
    <h1>3. Calcul des consommations de refroidissement</h1>
    <div class="alert alert-info alert-dismissible fade in" role="alert">
      <strong><samp><samp>Cclim = Rclim x Sclim</samp></samp></strong>
    </div>
    <h1 class="text-info">Cclim =  <?php echo $Cclim ?></h1>
    
</div>