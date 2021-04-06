<?php
$objetPdo = new PDO('mysql:host=localhost;dbname=internweb','root','');

$pdoStat = $objetPdo->prepare('SELECT * FROM employee');

$executeIsOk = $pdoStat->execute();

$contacts = $pdoStat->fetchAll();

?>
<!DOCTYPE html>
<html>
    <head>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <title>Liste pilotes</title>
    </head>

    <body>
        <h1> Liste des étudiants </h1>
        <ul> <?php foreach ($contacts as $contact): ?>
            <li>
                <?= $contact['organization'] ?> <?= $contact['email_id'] ?> - <?= $contact['first_name'] ?> - <?= $contact['last_name'] ?> - <?= $contact['phone_number'] ?>
        </li>
             <?php endforeach; ?>
        </ul>
        <a class="nav-link" href="#" onclick="loadDoc('content','public/webPages/lister_delegue.php'); cokie('page_content','lister_delegue.php',1);">Liste des délégués</a>
</body>
</html>