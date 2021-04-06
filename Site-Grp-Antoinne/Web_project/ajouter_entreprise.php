<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=internweb', 'root', '');

if(isset($_POST['forminscription'])) {
   $nom = htmlspecialchars($_POST['nom']);
   $secteur = htmlspecialchars($_POST['secteur']);
   $competence = htmlspecialchars($_POST['competence']);
   $localite = htmlspecialchars($_POST['localite']);
   $nbre_stagiaire = htmlspecialchars($_POST['nbrestagiaire']);
   $eval_stagiaire = htmlspecialchars($_POST['evalstagiaire']);
   $confiance_pilote_promo = htmlspecialchars($_POST['confiancepilotepromo']);
   if(!empty($_POST['nom']) AND !empty($_POST['secteur']) AND !empty($_POST['competence']) AND !empty($_POST['localite']) AND !empty($_POST['nbrestagiaire']) AND !empty($_POST['evalstagiaire']) AND !empty($_POST['confiancepilotepromo'])) {
      $pseudolength = strlen($nom);
      if($pseudolength <= 255) {
         $pseudolength = strlen($secteur);
         if($pseudolength <= 255) {
            $pseudolength = strlen($competence);
            if($pseudolength <= 255) {
               $pseudolength = strlen($localite);
               if($pseudolength <= 255) {
                $pseudolength = strlen($nbre_stagiaire);
                  if($pseudolength <= 255) {
                    $pseudolength = strlen($eval_stagiaire);
                    if($pseudolength <= 255) {
                        $pseudolength = strlen($confiance_pilote_promo);
                        if($pseudolength <= 255) {
                              $insertmbr = $bdd->prepare("INSERT INTO table_entreprise(nom, secteur, competence, localite, nbrestagiaire, evalstagiaire, confiancepilotepromo) VALUES(?, ?, ?, ?, ?, ?, ?)");
                              $insertmbr->execute(array($nom, $secteur, $competence, $localite, $nbre_stagiaire, $eval_stagiaire, $confiance_pilote_promo));
                              $erreur = "L'entreprise a bien été créé ! <a href=\"liste_entreprise.php\">Retour a la liste</a>";
                           } else {
                              $erreur = "Votre note ne correspond pas !";
                           }
                        } else {
                           $erreur = "Votre note ne correspond pas !";
                        }
                     } else {
                        $erreur = "Votre nombre ne correspond pas !";
                     }
                  } else {
                  $erreur = "Votre ville ne doit pas dépasser 255 caractères !";
                  }
               } else {
               $erreur = "Vos compétences recherchées ne doivent pas dépasser 255 caractères !";
               } 
            } else {
            $erreur = "Votre ville ne doit pas dépasser 255 caractères !";
            }
         } else {
            $erreur = "Votre prenom ne doit pas dépasser 255 caractères !";
         }
        } else {
            $erreur = "Tous les champs doivent être complétés !";
         }
      }
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8" />
      <link href="assets/css/bootstap.css" rel="stylesheet" media="screen"/>
      <link rel="stylesheet" type="text/css" href="Modif.css" />
   </head>

   <body style="background-image: url(base.png);	background-position: top left;	background-size: 100%;	background-repeat: responsive; margin-left: 600px; margin-right: 600px;">
      </nav>
      <div id="projet_conteneur">
         <form name="inscription" method="post" action="">
          
               <legend style="width: 300px; margin-right: 170px;" class="projet_legend">Création d'une entreprise</legend>
               <div class="projet_label">
                <b> Nom de l'entreprise</b>
               </div>
               <div class="projet_input">
                  <input type="text" class="projet_champ" id="nom" placeholder="Nom entreprise" size="20" maxlength="30" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
               </div><br />
               <div class="projet_label">
                 <b> Secteur d'activité </b>
               </div>
               <div class="projet_input">
                  <input type="text" class="projet_champ" id="secteur" placeholder="Secteur d'activite" size="20" maxlength="30" name="secteur" value="<?php if(isset($secteur)) { echo $secteur; } ?>" />
               </div><br />
               <div class="projet_label">
                    <b> Compétence recherchées </b>
                   </div>
                   <div class="projet_input">
                   <input type="text" class="projet_champ" id="competence" placeholder="Competence recherchees" size="20" maxlength="50" name="competence" value="<?php if(isset($competence)) { echo $competence; } ?>"/>
                   </div><br />

                   <div class="projet_label">
                    <b> Localisation de l'entreprise</b>
                   </div>
                   <div class="projet_input">
                   <input type="text" class="projet_champ" id="localite" placeholder="localite" size="20" maxlength="50" name="localite" value="<?php if(isset($localite)) { echo $localite; } ?>" />
                   </div><br /> 

               <div class="projet_label">     
                <b> Nombre de stagiaire venant de CESI<b></b>
               </div> 
               <div class="projet_input">
                <input type="text" class="projet_champ" id="nbrestagiaire"  placeholder="Nombre de stagiaire" size="20" maxlength="50" name="nbrestagiaire" value="<?php if(isset($nbre_stagiaire)) { echo $nbre_stagiaire; } ?>" />
             </div><br />
               <div class="projet_label">
                <b> Evaluation des anciens stagiaires<b></b>
               </div>
               <div class="projet_input">
               <input type="text" class="projet_champ" id="evalstagiaire"  placeholder="Evaluation stagiaires" size="23" maxlength="50" name="evalstagiaire" value="<?php if(isset($eval_stagiaire)) { echo $eval_stagiaire; } ?>" />
               </div><br />
               <div class="projet_label">
                <b> Confiance du pilote </b>
               </div>
               <div class="projet_input">
               <input type="text" class="projet_champ" id="confiancepilotepromo"  placeholder="Confiance pilote" size="23" maxlength="50" name="confiancepilotepromo" value="<?php if(isset($confiance_pilote_promo)) { echo $confiance_pilote_promo; } ?>" />
               </div><br />
               <br>               
               <div class="albert">
               <input style="margin-right: 500px;" class="projet_champ" type="submit" name="forminscription" value="Je crée l'entreprise" />
               </div><br />
  
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
   <script src="assets/js/jquery.js"></script>
   <script src="assets/js/bootstrap.js"></script>
</html>