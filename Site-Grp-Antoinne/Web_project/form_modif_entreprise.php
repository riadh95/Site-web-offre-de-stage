
<?php

$objetPdo = new PDO('mysql:host=localhost;dbname=internweb','root','');

$pdoStat = $objetPdo->prepare('SELECT * FROM table_entreprise WHERE id_entreprise = :num');

$pdoStat->bindValue(':num', $_GET['numContact'],PDO::PARAM_INT);

$executeIsOk = $pdoStat->execute();


$contact = $pdoStat->fetch();
?>


<!DOCTYPE html>
<html>
    <head>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <title>Titre</title>
        <link rel="stylesheet" href="Modif.css">
     
    </head>

    <body  style="background-image: url(base.png);	background-position: top left;	background-size: 100%;	background-repeat: responsive; margin-left: 500px;">
  
  <div class="exercice1_label">
    
     <form action="modifier_entreprise.php" method="post">
     <input type="hidden" name="numContact" value="<?= $contact['id_entreprise'] ?>">
</div>
<legend class="projet_legend"> Modifier une entreprise</legend>
     <p>
  
                
             <label style="margin_left: 40px;" for="nom"> Nom:  </label>
             <input style="margin_left: 40px;" class="projet_champ" id="nom" type="text" name="nom" value="<?= $contact['nom']?>">
           
        </p>

        <p>
        
             <label for="secteur">Secteur:  </label>
             <input class="projet_champ" id="secteur" type="text" name="secteur" value="<?= $contact['secteur']?>">

          </p>
        <p>
      
             <label for="competence">Compétences:  </label> 
             <input class="projet_champ" id="competence" type="text" name="competence" value="<?= $contact['competence']?>">
        </p>
        <p>
   
             <label for="localite">Localité:  </label>
             <input class="projet_champ" id="localite" type="text" name="localite" value="<?= $contact['localite']?>">
            
          </p>


        <p>
        
        <label for="nbrestagiaire"> Nombre de stagiaires:  </label>
        <input class="projet_champ" type="text" id="nbrestagiaire" name="nbrestagiaire" value="<?= $contact['nbrestagiaire']?>">
          
     </p>
        <p>
        
        <label for="evalstagiaire"> Evaluation des stagiaires:  </label>
        <input class="projet_champ" type="text" id="evalstagiaire" name="evalstagiaire" value="<?= $contact['evalstagiaire']?>">
          
     </p>
        <p>
        
        <label for="confiancepilotepromo"> Confiance du pilote:  </label>
        <input class="projet_champ" type="text" id="confiancepilotepromo" name="confiancepilotepromo" value="<?= $contact['confiancepilotepromo']?>">
        </div>  
     </p>

        
        <p><input class="projet_champ" type="submit" value="Enregistrer les modifications"></p>
</form>
</body>
</html>