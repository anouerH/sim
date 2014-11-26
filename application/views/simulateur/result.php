<div class="container">
    <h1>Calcul des consommations de chauffage</h1>
    <code>CchPCI = CchPCS / apcsi</code><br />
    
    
    <h3>Calcul de Bch</h3>
    <code>Bch = SH x ENV x METEO x INT</code>
    <kbd class="bg-primary">SH = <?php echo $sh ?> m<sup>2</sup></kbd>
    
    <h4>Calcul de ENV</h4>
    <code>ENV = (DPmurs + DPplafond + DPplancher + DPfenêtres + DPportes + DPvéranda + PT) / 2.5 x Sh + aRA</code>
    <br>
    <samp>Avec : </samp><br>
    <code>DP murs = b 1 x S murs1 x U murs1 + b 2 x S murs2 x U murs2 + b 3 x S murs3 x U murs3</code><br>
    <code>DP plafond = b’ 1 x S plafond1 x U plafond1 + b’ 2 x S plafond2 x U plafond2 + b’ 3 x S plafondt3 x U plafond3</code><br>
    <code>DP plancher = C orsol1 x S plancher 1 x U plancher 1 + C orsol2 x S plancher 2 x U plancher 2 + C orsol3 x S plancher 3 x U plancher 3</code><br>
    <code>DP fenêtres = S fenêtres1 x U fenêtres1 + S fenêtres2 x U fenêtres2 + S fenêtres3 x U fenêtres3</code><br>
    <code>DP portes = S portes1 x U portes1 + S portes2 x U portes2 + S portes3 x U portes3</code><br>
    <code>DP véranda = S véranda1 x U véranda1 + S véranda2 x U véranda2 + S véranda3 x U véranda3</code><br>
    
    <h5>Calcul de aRA</h5>
    <samp>selon le type de ventillation : </samp><kbd class="bg-primary">aRA = <?php echo $aRA?></kbd>
    <h5>Calcul CORH</h5>
    <code>CORH = HSP / 2.5</code>
    </samp><kbd class="bg-primary">HSP = <?php echo $hsp ?></kbd>
    </samp><kbd class="bg-primary">CORH = <?php echo $CORH ?></kbd>
    <h5>Caclul CORsol</h5>
    <samp>selon le type de plancher bas : </samp><kbd class="bg-primary">CORsol = <?php echo $CORsol?></kbd>
    <h5>Sur. fenêtres <kbd class="bg-primary">Sfenetres = <?php echo $Sfenetres?></kbd></h5>
    <h5>Sur. fenêtres toit <kbd class="bg-primary">Sfenetrestoit = <?php echo $Sfenetrestoit?></kbd></h5>
    <h5>Sur. portes <kbd class="bg-primary">Sportes = <?php echo $Sportes?></kbd></h5>
    <h5>type toiture <kbd class="bg-primary">roof_type = <?php echo $roof_type?></kbd></h5>
    <h5>Mitoyenneté <kbd class="bg-primary">MIT = <?php echo $MIT?></kbd></h5>
    <h5>nbre de niveau  <kbd class="bg-primary">NIV = <?php echo $NIV ?></kbd></h5>
    <h5>FOR <kbd class="bg-primary">FOR = <?php echo $FOR ?></kbd></h5>
    <h5>Combles habités ? <kbd class="bg-primary">isHabitableAttics = <?php  ($isHabitableAttics) ? print "Oui" : print "Non" ?></kbd> donc 
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
    <p class="bg-success"><strong> Smur = <?php echo $Smur?></strong></p>
</div>