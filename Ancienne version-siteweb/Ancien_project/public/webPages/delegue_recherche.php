<?php

if(isset($_POST['search']))
{

    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `delegue` WHERE CONCAT(`del_id`, `email_id`, `firstName`, `lastName`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `delegue`";
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
        <title>Recherche</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <form action="student_recherche.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>


            <input type="submit" name="search" value="Trouver"><br><br>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                </tr>

                
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php/echo $row['del_id'];?></td>
                    <td><?php echo $row['email_id'];?></td>
                    <td><?php echo $row['firstName'];?></td>
                    <td><?php echo $row['lastName'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>