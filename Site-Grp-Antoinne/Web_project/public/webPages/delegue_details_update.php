<?php
  session_start();
?>
<?php include '../../phpLogic/connection.php';?>
<?php
  $id=$_SESSION['id'];
  $query="SELECT * FROM `delegue` WHERE del_id=$id";
  $result = $mysqli->query($query);
  $row=$result->fetch_array(MYSQLI_ASSOC);
?>

<div class="container body">
  <form class="form-signin" method="post" action="phpLogic/update.php?user=delegue">
    <h1 class="h3 mb-3 font-weight-normal text-center" style="color:  #ff6060 ;"><b>Votre profil</b></h1><br>
    <div class="row">
      <div class="col-6">
        <label for="firstName" class="text-left">Prénom</label>
        <input type="text" style="font-size: 22px" name="firstName" value="<?php echo $row['firstName']; ?>" id="firstName" class="form-control-plaintext rw" required readonly>
      </div>
      <div class="col-6">
        <label for="lastName" class="text-left">Nom</label>
        <input type="text" style="font-size: 22px" name="lastName" value="<?php echo $row['lastName']; ?>" id="lastName" class="form-control-plaintext rw" placeholder="surname" required readonly><br>
      </div>
      </div>
      <label for="inputEmail" class="text-left">Email</label>
    <input type="email" style="font-size: 22px" name="email" value="<?php echo $row['email_id']; ?>" id="inputEmail" class="form-control-plaintext rw" placeholder="name@viacesi.fr" required readonly autofocus><br>
    <label for="inputPassword" class="text-left">Mot de passe</label>
    <input type="password" name="password" value="<?php echo $row['password']; ?>" id="inputPassword" class="form-control-plaintext" placeholder="Password" required readonly><bfr>
 
    <div id="Ubuttons">
      <button class="btn btn-lg btn-primary btn-block" type="button" style="margin-top:10px;" onclick="eupdate()">Modifier</button>
    </div>
  </form>
</div>
