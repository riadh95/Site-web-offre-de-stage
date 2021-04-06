<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `employee` WHERE CONCAT(`emp_id`, `organization`, `email_id`, `first_name`, `last_name`, `phone_number`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}   
 else {
    $query = "SELECT * FROM `employee`";
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
<html>
        <head>
        <style>
        table,tr,th,td
            {
                    border-width:1px;
                    border-style:dotted;
                    border-color:black;
                    margin : auto;
                    font-family: 'Rock Salt', cursive;
                    padding: 20px;
                    font-style: italic;
                    caption-side: bottom;
                    color: #666;
                    letter-spacing: 1px;
            }
            body{
                width : 100%;
            }
            </style>
        <style>
            footer{
              background:#e9e9e9;
              position:absolute;
              bottom:0;
              width:100%;
              padding-top:10px;
              padding-bottom: 10px;
              height:30px;
              color: black;
              text-align: center;
            }

            #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 75%;
  margin-left: 10%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:  #1063ff ;
  color: white;
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

    </head>
    <body>
    <br><br><br><br><h3 class="text-left" style="font-size: 2rem;">&nbsp&nbspRechercher un pilote inscrit sur le site</h3><br><br>

    <div class="row">
            <div class="col-12">    
    <form action="public\webPages\employee_recherche.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Rechercher un pilote..."><br><br>
            <input type="submit" name="search" value="Rechercher"><br><br>
            
            <table id="customers">
                <tr>
                    <th><h5>Email</h5></th>
                    <th><h5>Prenom</h5></th>
                    <th><h5>Nom</h5></th>
                    <th><h5>Entreprise</h5></th>
                    <th><h5>Téléphone</h5></th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['email_id'];?></td>
                    <td><?php echo $row['first_name'];?></td>
                    <td><?php echo $row['last_name'];?></td>
                    <td><?php echo $row['organization'];?></td>
                    <td><?php echo $row['phone_number'];?></td>

                </tr>
                <?php endwhile;?>
            </table>
        </form>
        <div class="footer-basic">
        
    </div>
    </body>
</html>