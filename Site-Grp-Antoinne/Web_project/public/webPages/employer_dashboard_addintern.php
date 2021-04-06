
    <style media="screen">
      .rounded{
         border-bottom-right-radius: 0rem !important;
         border-bottom-left-radius: 0rem !important;
      }

      .downround {
        border-bottom-left-radius: 0.25rem !important;
        border-bottom-right-radius: 0.25rem !important;
      }
      .card {
        width: 95%!important;
        box-shadow: 0px 0px 0px;
      }
      .my-3 {
        margin-bottom: 0rem !important;
      }
      .contain {
        border: 1px solid #6f42c1;

      }
      .foot {
        width: 100%;
        padding: 5px;
      }
      .small{
        color: papayawhip !important;
      }
    </style>
    <div class="navbar fixed-top bg-white p box-shadow">
      <div class="row nav-scroller">
            <div class="col-2 text-left nav-li" onclick="loadDoc('content','public/webPages/employer_dashboard_home.php')">
              <strong> Tableau de bord </strong>
            </div>
            <div class="col-2 text-left nav-li" onclick="loadDoc('content','public/webPages/employer_dashboard_applicants.php')">
              Voir les offres 
            </div>
            <div class="col-2 text-left nav-li" onclick="loadDoc('content','public/webPages/employer_dashboard_addintern.php')">
            Ajouter un nouveau stage 
            </div>
            <div class="col-2 text-left nav-li" onclick="loadDoc('content','public/webPages/student_recherche.php')">
            Rechercher un étudiant 
            </div>
            <div class="col-2 text-left nav-li" onclick="loadDoc('content','public/webPages/delegue_recherche.php')">
            Rechercher un délégué 
            </div>
            <div class="col-2 text-left nav-li" onclick="loadDoc('content','public/webPages/employee_recherche.php')">
            Rechercher un pilote 
            </div>
          </div>
    </div>
    <div class="padding">

    </div>
    <div class="container">
      <div class="container body">
        <form class="form-signin" method="post" action="phpLogic/createInternship.php?action=create">
          <h1 class="h3 mb-3 font-weight-normal text-center">Ajouter une nouvelle offre de stage</h1><br>
          <label for="internName" class="text-left">Nom</label>
          <input type="text" name="internName" id="internName" class="form-control" placeholder="Ex : Développement Web "  required autofocus>
          <br>
          <label for="internLocation" class="text-left">Lieu</label>
          <input type="text" name="internLocation" id="internLocation" class="form-control" placeholder="Ex : Paris" required autofocus><br>
          <label for="internDuration" class="text-left">Durée</label>
          <input type="text" name="internDuration" id="internDuration" class="form-control" placeholder="Ex : 6 mois" required><br>
          <label for="internStipend" class="text-left">Base de rémunération (en €)</label>
          <input type="text" name="internStipend" id="internStipend" class="form-control" placeholder="Nombre entre 0 et 9999" required><br>
          <label for="applyBy" class="text-left">Fermeture des candidatures</label>
          <input type="date" name="applyBy" id="applyBy" class="form-control" placeholder="ex:24-05-2018" required><br>

          <div class="row">
            <div class="col-6">
              <input type="reset" class="btn btn-lg btn-primary btn-block"  name="reset" value="Annuler" style="margin-top:10px; font-size: 15px">
            </div>
            <div class="col-6">
              <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Valider l'offre" style="margin-top:10px; font-size: 15px">
            </div>
          </div>
          <!-- <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div> -->
        </form>
    </div>
    </div>
