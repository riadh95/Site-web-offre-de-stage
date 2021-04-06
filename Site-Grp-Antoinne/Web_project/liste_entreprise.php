<?php
$objetPdo = new PDO('mysql:host=localhost;dbname=internweb','root','');

$pdoStat = $objetPdo->prepare('SELECT * FROM table_entreprise');

$executeIsOk = $pdoStat->execute();

$contacts = $pdoStat->fetchAll();

?>
<!DOCTYPE html>
<html>
    <head>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <title>Document</title>
        <link rel="stylesheet" href="/PHPstage/accueil.css">

<style>
     table,tr,th,td
            {
                    border-width:1px;
                    border-style:none;
                    border-color:black;
                    margin : auto;
                    font-family: 'Rock Salt', cursive;
                    padding: 15px;
                    font-style: italic;
                    caption-side: bottom;
                    color: #666;
                    letter-spacing: 1px;
            }
            body{
                width : 100%;
            }
           
            .footer{

background:#ccc;

position:absolute;

bottom:0;

width:100%;

padding-top:50px;

height:50px;

}
        #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
  margin-left: 15%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:  #1063ff ;
  color: white;
}


        </style>

    </head>

    <body>
    <br><br><br><br><h3 class="text-left" style="color:  #ff6060; font-size: 2rem;"><b>&nbsp&nbspLes entreprises présentes sur notre site</b></h3><br><br>

    <?php foreach ($contacts as $contact): ?>
        
        <div class="row">
            <div class="col-10">
        
            <form action="liste_entreprise.php" method="post">
             Rechercher une entreprise : <input type="text" name="valueToSearch" placeholder="Rechercher une entreprise..."><br><br>

            <input type="submit" name="search" value="Rechercher"><br><br>

        
                <table id="customers">
                    <tr>
                        <th><h5>Nom</h5></th>
                        <th><h5>Secteur</h5></th>
                        <th><h5>Compétences</h5></th>
                        <th><h5>Nombre de stagiaires </h5></th>
                        <th><h5>Evaluation des stagiaires</h5></th>
                        <th><h5>Confiance du pilote de promo</h5></th>
                        
                    </tr>
                    <tr>
                        <td><?= $contact['nom'] ?></td>
                        <td><?= $contact['secteur'] ?></td>
                        <td><?= $contact['competence'] ?></td>
                        <td><?= $contact['nbrestagiaire'] ?></td>
                        <td><?= $contact['evalstagiaire'] ?></td>
                        <td><?= $contact['confiancepilotepromo'] ?></td>
                        <td><a href="form_modif_entreprise.php?numContact=<?= $contact['id_entreprise']?>">Modifier</a><td>
                        <td><a href="Supprimer.php?numContact=<?= $contact['id_entreprise']?>">Supprimer</a></td>
                    </tr>
                  
                </table>
    </form>
    </div>




            <div class="col-2">

            <a href="ajouter_entreprise.php"><h4>Ajouter votre entreprise</h4></a>

            </div>
            </div>
             <?php endforeach; ?>
        
</body>
</html>