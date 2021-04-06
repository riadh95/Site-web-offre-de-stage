<?php
  $who=$_GET['user'];
  if ($who='employee') {
    $user="employer";
  } else {
    $user="student";
  }
?>
<form class="form-signin" method="post" action="phpLogic/login_verify.php?user=employee">
  <h1 class="h3 mb-3 font-weight-normal">Connexion pilote</h1>
  <label for="inputEmail" class="text-left">Email</label>
  <input name="email" type="email" id="inputEmail" class="form-control" placeholder="name@viacesi.fr" required autofocus>
  <label for="inputPassword" class="text-left">Mot de passe</label>
  <input name="password" type="password" id="inputPassword" class="form-control" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me">Se souvenir
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Se connecter</button>
  <div class="text-center">Pas encore inscrit ? Inscrits-toi ici <span class="text-primary" style="cursor:pointer;" onclick="loadDoc('content','public/webPages/student_register.php')">Etudiant</span>/<span style="cursor :pointer;" class="text-primary" onclick="loadDoc('content','public/webPages/delegue_register.php')">Délégué</span></div>
</form>
