<?php

$objetPdo = new PDO('mysql:host=localhost;dbname=internweb','root','');

$pdoStat = $objetPdo->prepare('UPDATE table_entreprise set nom=:nom, secteur=:secteur, competence=:competence, localite=:localite, nbrestagiaire=:nbrestagiaire, evalstagiaire=:evalstagiaire, confiancepilotepromo=:confiancepilotepromo  WHERE id_entreprise=:num LIMIT 1');

$pdoStat->bindValue(':num', $_POST['numContact'], PDO::PARAM_STR);
$pdoStat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
$pdoStat->bindValue(':secteur', $_POST['secteur'], PDO::PARAM_STR);
$pdoStat->bindValue(':competence', $_POST['competence'], PDO::PARAM_STR);
$pdoStat->bindValue(':localite', $_POST['localite'], PDO::PARAM_STR);
$pdoStat->bindValue(':nbrestagiaire', $_POST['nbrestagiaire'], PDO::PARAM_STR);
$pdoStat->bindValue(':evalstagiaire', $_POST['evalstagiaire'], PDO::PARAM_STR);
$pdoStat->bindValue(':confiancepilotepromo', $_POST['confiancepilotepromo'], PDO::PARAM_STR);


$executeIsOk = $pdoStat->execute();

if($executeIsOk){
    $message = 'La modification a bien été enregistré';
}

else{
    $message = 'Echec de la modification';
}
?>

<!DOCTYPE html>
<html>
    <header>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <title>Modification : résultats</title>
        
             

    </header>

    <body style="background-image: url(base.png);	background-position: top left;	background-size: 100%;	background-repeat: responsive; margin-left: 500px;">
        <h1> Les modifications ont bien été enregistrés</h1>
       
        <p><input class="projet_champ" type="button"    onclick="window.location.href = 'liste_entreprise.php';"  value="Retour a la liste"></p>
</form>
        <p> <?php $message; ?> </p>
</body>
</html>