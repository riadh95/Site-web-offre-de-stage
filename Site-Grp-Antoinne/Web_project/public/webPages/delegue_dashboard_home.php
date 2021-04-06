<?php
  session_start();
?>
<?php include '../../phpLogic/connection.php';?>
    <style media="screen">

    </style>
    <?php
       $del_id=$_SESSION['id'];
       $query1="SELECT `del_id` FROM `delegue_intern_view` WHERE `del_id`='$del_id'";
       $result=$mysqli->query($query1);
       $interns=$result->num_rows;
    ?>
    <!-- <div class="navbar fixed-top bg-white p box-shadow">
        <div class="row nav-scroller">
           <div class="col-sm-3 text-left nav-li" onclick="loadDoc('content','public/webPages/student_dashboard_home.php')">
            <strong> Dashboard </strong>
           </div>
           <div class="col-sm-3 text-left nav-li" onclick="loadDoc('content','public/webPages/student_dashboard_internships.php')">
            View applied Internships
           </div>
           <div class="col-sm-3 text-left nav-li" onclick="loadDoc('content','public/webPages/internlist.php')">
            Apply for new Internship
           </div>
        </div>
    </div> -->
    <script>loadDoc('dash','public/webPages/delegue_dashboard.php')</script>
    <div class="padding">

    </div>
     <h3 class="text-center">Connaissances</h3>
    <div class="container">
      <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Nombre total de stagiaires qui ont postulés</h5>
        <h4 class="card-text text-primary"><?php echo $interns; ?></h4>
        <div onclick="loadDoc('content','public/webPages/delegue_dashboard_internships.php')" class="btn btn-primary">Voir les stages</div>
      </div>
    </div>
  </div>
</div>
    </div>
  <!-- </body>
</html> -->