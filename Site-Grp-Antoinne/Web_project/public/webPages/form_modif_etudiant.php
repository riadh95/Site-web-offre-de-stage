
<?php

$objetPdo = new PDO('mysql:host=localhost;dbname=internweb','root','');

$pdoStat = $objetPdo->prepare('SELECT * FROM employee WHERE emp_id = :num');

$pdoStat->bindValue(':num', $_GET['numContact'],PDO::PARAM_INT);

$executeIsOk = $pdoStat->execute();


$contact = $pdoStat->fetch();
?>


<!DOCTYPE html>
<html>
<header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-pos bg-dark">
        <a class="navbar-brand" href="#">CESI STAGE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php" onclick="cokie('page_content','index.php',1)">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="loadDoc('content','public/webPages/internlist.php'); cokie('page_content','internlist.php',1);">Offre de stage</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="loadDoc('content','public/webPages/lister.php'); cokie('page_content','lister.php',1);">Liste</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown text-right">
              <a class="nav-link dropdown-toggle" href="#" id="log" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Se connecter
              </a>
              <div class="dropdown-menu" id="drop" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" onclick="loadDoc('content','public/webPages/login.php?user=employee'); cokie('page_content','login.php?user=employee',1); ">Pilote</a>
                <a class="dropdown-item" href="#" onclick="loadDoc('content','public/webPages/login_s.php?user=student'); cokie('page_content','login_s.php?user=student',1);">Etudiant</a>
                <a class="dropdown-item" href="#" onclick="loadDoc('content','public/webPages/login_d.php?user=delegue'); cokie('page_content','login_d.php?user=student',1);">Delegue</a>
              </div>
           </li>
            <li class="nav-item dropdown text-right">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               S'inscrire
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" onclick="loadDoc('content','public/webPages/employee_register.php'); cokie('page_content','employee_register.php',1);">Pilote</a>
                <a class="dropdown-item" href="#" onclick="loadDoc('content','public/webPages/student_register.php'); cokie('page_content','student_register.php',1);">Etudiant</a>
                <a class="dropdown-item" href="#" onclick="loadDoc('content','public/webPages/delegue_register.php'); cokie('page_content','delegue_register.php',1);">Delegue</a>
              </div>
           </li>
          </ul>
        </div>
      </nav>
      <div id="dash" class="p">

      </div>
    </header>
    <h1> Modifier une Entreprise</h1>
     <form action="modifier.php" method="post">
     <input type="hidden" name="numContact" value="<?= $contact['iemp_id'] ?>">
         <p>
             <label for="nom">Nom</label>
             <input id="nom" type="text" name="nom" value="<?= $contact['organization']?>">
        </p>

        <p>
             <label for="secteur">Secteur</label>
             <input id="secteur" type="text" name="secteur" value="<?= $contact['email-id']?>">
        </p>
        <p>
             <label for="competence">Compétences</label>
             <input id="competence" type="text" name="competence" value="<?= $contact['password']?>">
        </p>
        <p>
             <label for="localite">Localité</label>
             <input id="localite" type="text" name="localite" value="<?= $contact['first_name']?>">
        </p>
        <p>
        <label for="nbrestagiaire"> Nombre de stagiaires</label>
        <input type="text" id="nbrestagiaire" name="nbrestagiaire" value="<?= $contact['last_name']?>">
        </p>
        p>
        <label for="nbrestagiaire"> Nombre de stagiaires</label>
        <input type="text" id="nbrestagiaire" name="nbrestagiaire" value="<?= $contact['phone_number']?>">
        </p>
        
        <p><input type="submit" value="Enregistrer les modifications"></p>
</form>
</body>
</html>