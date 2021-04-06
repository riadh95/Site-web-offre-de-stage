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
        <title>Le J c le S</title>
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
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>Organization</th>
                    <th>email_id</th>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>phone_number</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['emp_id'];?></td>
                    <td><?php echo $row['organization'];?></td>
                    <td><?php echo $row['email_id'];?></td>

                    <td><?php echo $row['first_name'];?></td>
                    <td><?php echo $row['last_name'];?></td>
                    <td><?php echo $row['phone_number'];?></td>

                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>