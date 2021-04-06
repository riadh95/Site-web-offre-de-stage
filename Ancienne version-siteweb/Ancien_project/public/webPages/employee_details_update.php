<?php
  session_start();
?>
<?php include '../../phpLogic/connection.php';?>
<?php
  $id=$_SESSION['id'];
  if($_SESSION['who']==='student'){
    header('Location:student_details_update.php');
  } else{
  $query="SELECT * FROM `employee` WHERE emp_id=$id";
  $result = $mysqli->query($query);
  $row=$result->fetch_array(MYSQLI_ASSOC);
}
?>

  <div class="container body">
    <form class="form-signin" method="post" action="phpLogic/update.php?user=employee">
      <h1 class="h3 mb-3 font-weight-normal">Votre profil</h1>
      <div class="row">
        <div class="col-6">
          <label for="firstName" class="text-left">Prénom</label>
          <input type="text" name="firstName" id="firstName" value="<?php echo $row['first_name']; ?>" class="form-control-plaintext rw" required readonly>
        </div>
        <div class="col-6">
          <label for="lastName" class="text-left">Nom</label>
          <input type="text" name="lastName" value="<?php echo $row['last_name']; ?>" id="lastName" class="form-control-plaintext rw" required readonly>
        </div>
      </div>
      <label for="inputEmail" class="text-left">Email</label>
      <input type="email" name="email" value="<?php echo $row['email_id']; ?>" id="inputEmail" class="form-control-plaintext rw" autofocus required readonly>
      <label for="inputPassword" class="text-left">Mot de passe</label>
      <input type="password" name="password" value="<?php echo $row['password']; ?>" id="inputPassword" class="form-control-plaintext" required readonly>
      <label for="organizationName" class="text-left">Centre</label>
      <input type="text" name="organization" value="<?php echo $row['organization']; ?>" id="organizationName" class="form-control-plaintext rw" autofocus required readonly>
      <label for="mobileNo" class="text-left">Promo assignée</label>
      <input type="text" id="mobileNo" name="phone" value="<?php echo $row['phone_number']; ?>" class="form-control-plaintext rw" required readonly>
      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <div id="Ubuttons">
        <button class="btn btn-lg btn-primary btn-block" type="button" style="margin-top:10px;" onclick="eupdate()">Modifier</button>
      </div>
    </form>
</div>
