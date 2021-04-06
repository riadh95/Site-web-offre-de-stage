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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>liste pilote</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
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

        </style>
    </head>
    <body>
        
        <form action="public\webPages\employee_recherche.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>Entreprise</th>
                    <th>Email</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['organization'];?></td>
                    <td><?php echo $row['email_id'];?></td>
                    <td><?php echo $row['first_name'];?></td>
                    <td><?php echo $row['last_name'];?></td>
                    <td><?php echo $row['phone_number'];?></td>

                </tr>
                <?php endwhile;?>
            </table>
        </form>
        <div class="footer-basic">
        <footer>
            <p><u>© Copyright 2021 Groupe de Antoine - All rights reserved</u></p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    </body>
</html>