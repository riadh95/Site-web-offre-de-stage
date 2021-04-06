<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/home.css">
    <link rel="stylesheet" href="public/css/formstyle.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="bootstrap-accordions-faqs.css" rel="stylesheet">
    <title>Future (offres de stage)</title>
    <script src="public/js/jquery-3.3.1.js"></script>
    <script src="public/js/js.cookie.js"></script>
    <script type="text/javascript">

       function cokie(name,value,expiry) {
         Cookies.set(name, value, { expires: expiry });
       }

    </script>
    <script type="text/javascript">
    function loadDoc(element,file) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         document.getElementById(element).innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", file , true);
      xhttp.send();
    }

    //function for employee update pages
    function eupdate() {
      console.log("eupdate is called")
      $(".rw").attr("readonly", false);
      $(".rw").removeClass("form-control-plaintext");
      $(".rw").addClass("form-control");
      $("#Ubuttons").html("<div class='row'><div class='col-sm-12'><button class='btn btn-lg btn-primary btn-block' type='submit' style='margin-top:10px;'>Update</button></div></div>");
      // <div class='col-sm-6'><button class='reset btn btn-lg btn-primary btn-block' type='button' style='margin-top:10px;' onClick=\'window.location.reload()\''>reset</button></div>
    }
    <?php
      if(isset($_COOKIE['page_content'])){
        $script="$(document).ready(function() { loadDoc('content','public/webPages/";
        $script.=$_COOKIE['page_content']."'); console.log('i was executed'); });";
        echo $script;
      }
      if(isset($_COOKIE['dash'])){
        $script="$(document).ready(function() { loadDoc('dash','public/webPages/";
        $script.=$_COOKIE['dash']."'); console.log('i was executed'); });";
        echo $script;
      }
    ?>
    </script>
    <script type="text/javascript">
       if(<?php echo isset($_SESSION['user']); ?>){
         $('nav').ready(function() {
           document.getElementById('log').innerHTML="<?php echo $_SESSION['user']; ?>";
           document.getElementById('drop').innerHTML="<a class='dropdown-item' href='#' onclick=\"loadDoc('content','public/webPages/employee_details_update.php')\">Voir le profil</a> <a class='dropdown-item' href='#' onclick=\"loadDoc('content','public/webPages/employer_dashboard_home.php')\">Tableau de bord</a> <a class=\"dropdown-item\" href='phpLogic/Logout.php'>Se déconnecter</a>";
         });

       }
    </script>
  </head>
  
<style>

.accordion-section .panel-default > .panel-heading {
    border: 0;
    background: #f4f4f4;
    padding: 0;
}
.accordion-section .panel-default .panel-title a {
    display: block;
    font-style: italic;
    font-size: 1.4rem;
}
.accordion-section .panel-default .panel-title a:after {
    font-family: 'FontAwesome';
    font-style: normal;
    font-size: 2rem;
    content: "\f106";
    color: #1f7de2;
    float: right;
    margin-top: -12px;
}
.accordion-section .panel-default .panel-title a.collapsed:after {
    content: "\f107";
}
.accordion-section .panel-default .panel-body {
    font-size: 1.2rem;
}

.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    background-color: #FFFF00;
    color: #FF90CB;
}

.footer{

background:#ccc;

position:absolute;

bottom:0;

width:100%;

padding-top:50px;

height:50px;

}


</style>

  <body class="bg-light">

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-pos bg-dark shadow p-1" style="margin-bottom: -10px">
        <a class="navbar-brand" style="color: #FFFFFF"><h2>&nbsp&nbspFuture&nbsp</h2></a>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php" onclick="cokie('page_content','index.php',1)">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="loadDoc('content','public/webPages/internlist.php'); cokie('page_content','internlist.php',1);">Offres de stage</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="loadDoc('content','liste_entreprise.php'); cokie('page_content','liste_entreprise.php',1);">Entreprises partenaires</a>
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

    <!-- Begin page content -->
    <main role="main" class="main">
      <div id="content">
      
      <div class="jumbotron" style="background-image: linear-gradient(180deg,  #f8f9f9 0%, rgba(255,255,255,0.00) 20%), url(https://ssl.sitew.org/images/blog/articles/cover/fond_de_site.jpg);">
        <div class="container">
        <br>
        <br>
        <br>
        <br>
        <br>    
        
          <div class="row">
            <br>
           
            <div class="col-5">
              <img src="https://www.cesi.fr/wp-content/themes/cesi/static/logo/default.svg" class="img-fluid" alt="Responsive image">
            </div>

            <div class="col-7">
              <div class="container">
                  <blockquote class="blockquote text-center">
                    <p class="mb-0"> <h1 class="mb-4" style="font: small-caps bold 40px/1 sans-serif;">Future, ton assistant professionnel</h1></p>
                  </blockquote>
              </div>
            </div>
            </div>

          </div>
          <br>
          <br>
          </div>
<br>
<br>  
<br>
<div class="container">
          <div class="row">
          <div class="col-1">
          </div>
            <div class="col-10">
              <div class="container">
              
                    <blockquote class="blockquote text-center rounded" style="border: 1px solid black; padding: 30px">
                      <p class="mb-0"><h4><b>Bienvenue sur Future  !</b></h4>
                      
                      <br><h5>

                          Vous êtes étudiant à CESI et vous recherchez un stage ou une alternance ? 

                          L’assistant personnel « Future » est l’outil d’excellence pour tous nos étudiants a la recherche de stages ou d’alternances, ici vous pourrez avoir accès a un grand choix d’offres proposé par nos entreprises partenaires, vous aurez la possibilité de pouvoir postuler directement depuis notre site et vous pourrez aussi avoir accès a la liste de toutes nos entreprises partenaires.

                          Un suivi de progression permettra a vos enseignants de consulter vos statistiques afin de mieux vous guider et de vous accompagner tout au long de votre cursus.</h5></p>
                    </blockquote>
                </div>
                
                <div class="col-1">
          </div>
            </div>
          </div>

<br>
<br>
<br>
          <div class="row">
          <div class="col-2">
          </div>
          <div class="col-8">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="https://cdn.discordapp.com/attachments/827664390282674179/827665653791326238/bourse-etudiant-erasmus_398x210_acf_cropped.png" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="https://cdn.discordapp.com/attachments/827664390282674179/827665658611105802/definition-culture-entreprise.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="https://cdn.discordapp.com/attachments/827664390282674179/827665661290610698/impact-donnees-rh-resultats-entreprise.png" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            </div>
            </div>
            <div class="col-2">
          </div>

<br>
<br>
<br>  
<br>  

          <div class="row">
            <div class="col-5">
              <blockquote class="blockquote text-justify shadow" style="padding: 30px">
                <p class="mb-0"><h5 style="color:  #d5fea3 ; font-size: 35px; text-shadow: -0.5px 0 black, 0 0.5px black, 0.5px 0 black, 0 -0.5px black"><b>Etudiant</b></h5>
                        
                <br><h5>
                Vous devez effectuer un stage étudiant au cours de votre formation (Stage de fin d’études, BTP, 
                Informatique, Systèmes électronique embarqués) ? Consultez nos centaines d’offres de stages en France mais aussi à l’étranger. 
                Que vous recherchiez un stage en audiovisuel, droit, commerce international, langue, marketing, informatique, communication, culture,
                 vente, ressources humaines, architecture, gestion administration, comptabilité, tourisme, journalisme… Future vous propose des centaines
                  d’offres d’entreprises à la recherche de stagiaires pour des missions de toutes durées et proches des principales villes étudiantes.

                </h5></p>
              </blockquote>
            </div>
            <div class="col-2">
            </div>
            <div class="col-5">
            <blockquote class="blockquote text-justify shadow" style="padding: 30px">
                <p class="mb-0"><h5 style="color:  #adcdff; font-size: 35px; text-shadow: -0.5px 0 black, 0 0.5px black, 0.5px 0 black, 0 -0.5px black"><b>Entreprise</b></h5><br>
                <ul class="list-unstyled" style="margin-bottom: 25px">
                      <li>Pourquoi les entreprises choisissent Future ?
                    </li>

                        <ul>
                          <li>Plus de 5000 candidats inscrits.
                    </li>
                          <li>Publiez votre offre d’emploi rapidement et efficacement.
                    </li>
                          <li>Recevez des conseils personnalisés des modérateurs .
                    </li>
                          <li>Postez votre annonce gratuitement.
                    </li>
                    <li>Nous avons satisfaits des employeurs comme Yoopala et Keetiz (pour en nommer quelques-uns). 
                    </li>
                    <br>
                        </ul>

                    </ul>
            </blockquote>
            </div>
          </div>
<br>
<br>
<br>

          <div class="row">

            <div class="col-2">
            </div>

            <div class="col-8">
            <blockquote class="blockquote text-center" style="padding: 30px">
                <p class="mb-0"><h2 style="font-size: 2.5rem;"><b>Comment ça fonctionne ?</b></h2></p>
                </blockquote>

            </div>

            <div class="col-2">
            </div>
          </div>


          <div class="row">

            <div class="col-4">
            <blockquote class="blockquote text-justify" style="padding: 20px">
                <p class="mb-0"><h5>Vous êtes étudiants à CESI et vous recherchez un stage ? Vous pouvez découvrir toutes nos offres de stage
                à votre disposition. Vous devez d’abord créer votre compte étudiant, après vous être connecter avec votre compte.</h5></p>
                </blockquote>
            </div>

            <div class="col-4">
            <br>  
            <img src="https://coreight.com/sites/default/files/pc-portable-pro-ecran.jpg" height="auto" width="350" alt="Bootstrap" class="img-responsive">
            </div>

            <div class="col-4">
            <blockquote class="blockquote text-justify" style="padding: 20px">
                <p class="mb-0"><h5>Quand vous aurez postulé au différentes offres, grâce à la Dashboard vous aurez accès à toutes les offres auxquels vous avez 
                postulé. Maintenant il vous reste plus qu'à vous créer ton compte étudiant.</h5></p>
                </blockquote>
            </div>
          </div>


          <div class="row">

            <div class="col-4">
            <img src="https://ecole-ingenieurs.cesi.fr/wp-content/uploads/sites/5/2018/10/CESI_Corporate_Ecole_Ingenieurs.jpg" height="auto" width="350" alt="Bootstrap" class="img-responsive">

            </div>

            <div class="col-4">
            <blockquote class="blockquote text-justify" style="padding: 20px">
                  <p class="mb-0"><h5>Vous pourrez ensuite naviguer sur notre site, vous aurez accès aux offres de stages en cliquant sur la barre de navigation, 
                  ensuite vous chercherez l’offre qui vous plait. Après avoir choisis votre offre vous n’avez plus qu’à postuler.</h5></p>
                  </blockquote>
            </div>

            <div class="col-4">
            <img src="https://partners-in-law.fr/wp-content/uploads/2018/05/photo-1529636444744-adffc9135a5e-1454x727.jpg" height="auto" width="350" alt="Bootstrap" class="img-responsive">
            </div>
          </div>
<br>
<br>
<br>
<br>

          <div class="row">

            <div class="col">

              <section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
                <div class="container">
                
                  <h2 style="font-family: Arial, Verdana; font-weight: 800; font-size: 2.5rem; color: #091f2f; text-transform: uppercase;">Foire aux question (FAQ)</h2><br><br><br>

                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
                    <h3 class="panel-title">
                      <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">
                      En quoi Future se distingue-t-il des autres sites sur lesquels je peux publier des offres d'emploi ?
                      </a>
                    </h3>
                    </div>
                    <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
                    <div class="panel-body px-3 mb-4">
                      <p>Future est le leader des sites d’emploi dans le monde. Grâce à notre moteur de recherche, les candidats ont accès à des millions d’offres présentes sur l’ensemble du web. De plus, vous avez une flexibilité totale ; il n’y a pas de contrat, ni d’engagement de long terme.</p>
                      
                    </div>
                    </div>
                  </div>
                  
                  <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3" role="tab" id="heading1">
                    <h3 class="panel-title">
                      <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                              Comment trouver une entreprise?			  </a>
                    </h3>
                          
                    </div>
                    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                    <div class="panel-body px-3 mb-4">
                      <p>
                              Les techniques de recherche d'un stage sont les mêmes que celles pour trouver un emploi : il faut rédiger un CV et une lettre de motivation, rechercher des entreprises, les appeler, les relancer, activer son réseau. Votre choix de stage doit aussi, dans la mesure du possible et en fonction de votre niveau, s'inscrire dans un projet professionnel. L'objectif est tout de même de faire un stage qui vous plaise et qui vous fasse avancer dans vos choix futurs !</p>
                            <ul>
                      <li>Consultez les offres de stages sur Internet.</li>
                      <li>Allez sur les salons ou aux journées portes ouvertes : vous pourrez prendre contact avec des entreprises.</li>
                      <li> Consultez les offres de stage sur la plateforme #Future(cesi)
                                  Si vous ne trouvez pas d'entreprise, parlez de vos difficultés à votre professeur !</li>
                      </ul>
                    </div>
                    </div>
                  </div>
                  
                  <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3" role="tab" id="heading2">
                    <h3 class="panel-title">
                      <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                              J’ai trouvé un stage : comment procéder pour la suite ?			  </a>
                    </h3>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                    <div class="panel-body px-3 mb-4">
                      <p>Dès que vous avez trouvé un stage, vous devez prendre rendez-vous avec l’entreprise ou l’organisme qui accepte de vous accueillir afin de faire compléter la fiche de validation qui vous permettra de saisir votre convention de stage en ligne sur l’application Future. Pour accéder à Future(cesi), il vous suffit de vous connecter avec vos identifiants étudiant.
                          </p>
                    </div>
                    </div>
                  </div>
                  
                  <div class="panel panel-default">
                    <div class="panel-heading p-3 mb-3" role="tab" id="heading3">
                    <h3 class="panel-title">
                      <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
                              Comment cibler ma recherche de CV ?
                          </a>
                    </h3>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                    <div class="panel-body px-3 mb-4">
                      <p>Vous pouvez créer des requêtes de recherche avancées pour cibler toute combinaison de critères tels que la formation, le titre de poste, la localisation, l’entreprise, les compétences et l’expérience. Affinez votre recherche en filtrant les résultats en fonction de ces critères. Vous pourrez trier les résultats par pertinence ou par date de publication.</p>
                    </div>
                    </div>
                  </div>
                  </div>
                
                </div>
              </section>

            </div>
          </div>


        </div>  
      </div>
      </div>
    </main>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <br>
    <br>
    <br>
  </body>

<br>
<br>

<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3">
    © 2021 Copyright - Projet WEB - Groupe de Antoine 
  </div>
  <!-- Copyright -->
</footer>


</html>
