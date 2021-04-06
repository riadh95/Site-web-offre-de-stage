<?php
  session_start();
?>
<?php include '../../phpLogic/connection.php';?>
<?php
  $query="SELECT * FROM `internships_list`";
  $result = $mysqli->query($query);
?>
<?php
if(isset($_POST['search']))
{

    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `internships_list` WHERE CONCAT(`intern_id`, `emp_id`, `organization`, `intern_title`, `location`, `duration`, `stipend`, `posted_on`, `apply_by`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `internships_list`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "internweb");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
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
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/home.css">
    <link rel="stylesheet" href="public/css/formstyle.css">
    <script src="public/js/jquery-3.3.1.js"></script>
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
    <div class="padding">

    </div>

    <br><h3 class="text-center" style="color:  #ff6060; font-size: 2rem;"><b>&nbsp&nbspLes offres de stages disponibles</b></h3><br><br>


    <div class="contain">
      <div class="row">
        <div class="col-sm-12 text-center">
        <form action="public\webPages\internlist.php" method="post">
        <input type="text" style="width: 125%" name="valueToSearch" placeholder="Trouvez un stage selon vos critères..."><br><br>
        <input type="submit" name="search" value="Trouver"><br><br><br>
        <?php while($row = mysqli_fetch_array($search_result)):?>
        </div>
      </div>
    

       <div class="card text-left w-50" style="margin-left: auto; margin-right: auto;">
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
                 <p>Base de rémunération :</p>
               </div>
               <div class="col-sm-3">
                  <p><?php echo $row['stipend']; ?> €/mois</p>
               </div>
               <div class="text-right col-sm-6">
                  <form class="" action="phpLogic/applyIntern.php?action=apply" method="post">
                     <input type="hidden" name="intern_id"  value="<?php echo $row['intern_id']; ?>">
                     <input type="submit" name="submit" class="btn btn-primary" value="Postuler !">
                  </form>
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
            Publiée le : <?php echo $posted_on; ?>
            </div>
            <div class="col text-right">
            Début du contrat : <?php echo $apply_by; ?>
            </div>
          </div>
        </div>
       </div>
       
    </div>
    <?php endwhile;?>
    </form>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
  </body>
</html>
