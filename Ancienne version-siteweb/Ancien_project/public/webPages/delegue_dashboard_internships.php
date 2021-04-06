<?php
  session_start();
?>
<?php include '../../phpLogic/connection.php';?>
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
    <div class="padding">

    </div>
    <div class="row">
      <div class="col text-center">
        <h4>Stages postuler</h4>
      </div>
    </div>

    <?php
    if($_SESSION['who']==='delegue'){
      $del_id=$_SESSION['id'];
      $query="SELECT * FROM `delegue_intern_view` WHERE `del_id`='$del_id'";
      $result = $mysqli->query($query);
    } else {
      echo "<script>alert('veuillez vous connecter en tant que délégué);</script>";
      echo "<script>
      setTimeout(function(){
      window.location.href = '/internshala_project/index.php';
      }, 5);
      </script>";
      exit;
    }

    ?>
    <div class="contain">
      <?php
      if($result->num_rows==0){
        echo "<h3>Aucun stage appliqué</h3>";
      }
      while($row = $result->fetch_array(MYSQLI_ASSOC))
      {
      ?>
       <div class="card text-left w-75">
        <div class="card-header">
          <?php echo $row['intern_title']; ?>
        </div>
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['organization']; ?></h5>
          <div class="card-text text-left">
            <div class="row">
               <div class="col-sm-3 text-muted">
                 <p>Lieu:</p>
               </div>
               <div class="col-sm-9">
                  <p><?php echo $row['location']; ?></p>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-3 text-muted">
                 <p>Postulé a :</p>
               </div>
               <?php
               $date = new DateTime($row['applied_on']);
               $applied_on = $date->format('d-M-Y');
               ?>
               <div class="col-sm-9">
                  <p><?php echo $applied_on; ?></p>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-3 text-muted">
                 <p>Le salaire:</p>
               </div>
               <div class="col-sm-3">
                  <p>€<?php echo $row['stipend']; ?></p>
               </div>
               <div class="text-right col-sm-6">
                 <form class="" action="phpLogic/removeintern.php" method="post">
                   <input type="hidden" name="internId" value="<?php echo $row['intern_id']; ?>">
                   <input type="submit" class="btn btn-primary" value="Opt Out">
                 </form>
               </div>
            </div>
          </div>
        </div>
       </div>
    <?php } ?>
    <div class="text-center">Postuler pour <span class="text-primary" style="cursor:pointer;" onclick="loadDoc('content','public/webPages/internlist.php')"> Nouveau stage</span></div>
    </div>
