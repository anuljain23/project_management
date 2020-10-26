<?php

    require 'auth.php';
    $client_comp_id = $_SESSION['client_id'];
    
    $sql_query = mysqli_query($conn, "SELECT * FROM `project` WHERE client_id = '$client_comp_id'");
    while($row = mysqli_fetch_assoc($sql_query)){
        $project_id = $row['id'];
        $dev_comp_id = $row['company_id'];
        $sql_comp_query = mysqli_query($conn, "SELECT `name` FROM `developing_company` WHERE id = '$dev_comp_id'");
        $sql_user_query = mysqli_query($conn, "SELECT `name`, `contact` FROM `client_users` WHERE project_id = '$project_id'");
        
        if($sql_comp_query){
            $row2 = mysqli_fetch_assoc($sql_comp_query);
            $dev_comp_name = $row2['name'];
        }
        echo $row['name']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row['specifics']
                        ."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row['start_date']
                        ."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row['estimated_delivery_date']
                        ."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$dev_comp_name;
        while($row3 = mysqli_fetch_assoc($sql_user_query)){
            echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row3['name'].
                    "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row3['contact'];;
        }echo "<br>";
    }

?>
