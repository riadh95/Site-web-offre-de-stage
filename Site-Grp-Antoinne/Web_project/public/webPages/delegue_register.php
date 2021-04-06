  <div class="container body">
  <div class="row">
    <div class="col text-center">
      <h4>Inscription délégué</h4>
    </div>
  </div>
  <form class="form-signin" method="post" action="phpLogic/registration.php?user=delegue">
  <div class="row">
      <div class="col-6">
        <label for="firstName" class="text-left">Prénom</label>
        <input type="text" name="firstName" id="firstName" class="form-control" required>
      </div>
      <div class="col-6">
        <label for="lastName" class="text-left">Nom</label>
        <input type="text" name="lastName" id="lastName" class="form-control" placeholder="nom" required>
      </div>
    </div>
    <label for="inputEmail" class="text-left">Email</label>
    <input type="email"  name="email" id="inputEmail" class="form-control" placeholder="name@viacesi.fr" required autofocus>
    <label for="inputPassword" class="text-left">Mot de passe</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
    <button class="btn btn-lg btn-primary btn-block" style="margin-top:10px;" type="submit">S'inscrire</button>
  </form>
</div>
