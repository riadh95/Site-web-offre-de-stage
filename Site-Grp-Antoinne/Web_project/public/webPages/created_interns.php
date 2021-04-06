<?php
  session_start();
?>
<?php include '../../phpLogic/connection.php';?>
<?php
  $id=$_SESSION['id'];
  $query="SELECT * FROM `internships_list` where `emp_id`='$id'";
  $result = $mysqli->query($query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>internlist</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/internshala_project/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/internshala_project/public/css/home.css">
    <link rel="stylesheet" href="/internshala_project/public/css/formstyle.css">
    <script src="/internshala_project/public/js/jquery-3.3.1.js"></script>
    <style media="screen">
      .card{
        margin:15px;
        box-shadow: 0px 0px 8px 1px #b3afaf;
        border-color: #c6c7ca!important;
      }
     .card-header {
        background-color: rgba(25, 24, 24, 0.08);
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        font-weight: bold;
        font-size: x-large;
    }
    .contain{
      display: flex;
      flex-direction: column;
      align-items: center;
     }
    </style>
  </head>
  <body>
  <div class="navbar fixed-top bg-white p box-shadow" >
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
    <?php
       if($result->num_rows==0){
         echo "<h5>No internships created.</h5>";
         exit;
       }
    ?>
    <br><h3 class="text-center" style="color:  #ff6060 ; font-size: 35px;"><b>Vos offres de stages</b></h3><br><br>
    <div class="contain">
      <?php
       while($row = $result->fetch_array(MYSQLI_ASSOC))
       {
      ?>
       <div class="card text-left w-50">
       <div class="card-header text-black" style="background-color: #97fad1">
          <?php echo $row['intern_title']; ?>
        </div>
        <div class="card-body">
          <h6 class="card-title"><?php echo $row['organization']; ?></h6><br>
          <div class="card-text text-left">
            <div class="row">
               <div class="col-sm-3 text-muted">
                 <p>Lieu :</p>
               </div>
               <div class="col-sm-9">
                  <p><?php echo $row['location']; ?></p>
               </div>
            </div>
            
            <div class="row">
               <div class="col-sm-3 text-muted">
                 <p>Rémunération :</p>
               </div>
               <div class="col-sm-3">
                  <p><?php echo $row['stipend']; ?> €/mois</p>
               </div>
               <div class="text-right col-sm-6">
                 <?php
                   $url="public/webPages/editIntern.php?internid=".$row['intern_id'];
                  ?>
                     <input type="submit" onclick="loadDoc('content','<?php echo $url ?>')" name="submit" class="btn btn-primary" value="Modifier">
               </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted">
          <div class="row">
              <?php
                $date = new DateTime($row['posted_on']);
                $posted_on = $date->format('d-M-Y');
                $date = new DateTime($row['apply_by']);
                $apply_by = $date->format('d-M-Y');
              ?>
            <div class="col text-left">
               Publié le : <?php echo $posted_on; ?>
            </div>
            <div class="col text-right">
            Début du contrat : <?php echo $apply_by; ?>
            </div>
          </div>
        </div>
       </div>
       <?php
         }
       ?>
       <div class="text-center"><span class="text-primary" style="cursor:pointer;" onclick="loadDoc('content','public/webPages/employer_dashboard_addintern.php')">Ajouter un nouveau stage</span></div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="/internshala_project/public/js/popper.min.js"></script>
    <script src="/internshala_project/public/js/bootstrap.min.js"></script>
  </body>
</html>
