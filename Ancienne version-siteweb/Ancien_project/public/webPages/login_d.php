<?php
  $who=$_GET['user'];
  if ($who='employee') {
    $user="employer";
  } else {
    $user="delegue";
  }
?>
<form class="form-signin" method="post" action="phpLogic/login_verify.php?user=delegue">
  <h1 class="h3 mb-3 font-weight-normal">Connexion délégué</h1>
  <label for="inputEmail" class="text-left">Email</label>
  <input name="email" type="email" id="inputEmail" class="form-control" placeholder="name@viacesi.fr" required autofocus>
  <label for="inputPassword" class="text-left">Mot de passe</label>
  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="mot de passe" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="Se souvenir de moi"> 
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Connexion</button>
  <div class="text-center">Pas encore inscrit ? inscrit toi <span class="text-primary" style="cursor:pointer;" onclick="loadDoc('content','public/webPages/student_register.php')">Etudiant</span>/<span style="cursor :pointer;" class="text-primary" onclick="loadDoc('content','public/webPages/employee_register.php')">Pilote</span></div>
</form>
