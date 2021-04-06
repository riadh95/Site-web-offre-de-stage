<?php
$objetPdo = new PDO('mysql:host=localhost;dbname=internweb','root','');

$pdoStat = $objetPdo->prepare('SELECT * FROM delegue');

$executeIsOk = $pdoStat->execute();

$contacts = $pdoStat->fetchAll();

?>
<!DOCTYPE html>
<html>
    <head>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
    </head>

    <body>
        <h1> Liste des délégués </h1>
        <ul> <?php foreach ($contacts as $contact): ?>
            <li>
                <?= $contact['email_id'] ?> <?= $contact['password'] ?> - <?= $contact['firstName'] ?> - <?= $contact['last_name'] ?>
        </li>
             <?php endforeach; ?>
        </ul>
</body>
</html>