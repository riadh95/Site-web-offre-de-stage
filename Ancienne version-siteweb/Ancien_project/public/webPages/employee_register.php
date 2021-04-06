<div class="container body">
    <div class="row">
      <div class="col text-center">
        <h4>Inscription pilote</h4>
      </div>
    </div>
    <form class="form-signin" method="post" action="phpLogic/registration.php?user=employee">
      <div class="row">
        <div class="col-6">
          <label for="firstName" class="text-left">Prenom</label>
          <input type="text" name="firstName" id="firstName" class="form-control" required>
        </div>
        <div class="col-6">
          <label for="lastName" class="text-left">Nom</label>
          <input type="text" name="lastName" id="lastName" class="form-control" required>
        </div>
      </div>

      <label for="inputEmail" class="text-left">Email</label>
      <input type="email" name="email" id="inputEmail" class="form-control" required autofocus>

      <label for="inputPassword" class="text-left">Mot de passe</label>
      <input type="password" name="password" id="inputPassword" class="form-control" required>

      <label for="organizationName" class="text-left">Centre</label>
      <input type="text" name="organization" id="organizationName" class="form-control"  required autofocus>

      <label for="promoassigne" class="text-left">Promotion assignée</label>
      <input type="text" name="promotion" id="promoassigne" class="form-control"  required autofocus>

      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;">S'inscire</button>
    </form>
</div>