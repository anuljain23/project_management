<?php

    require 'auth.php';
    $client_user_id = $_SESSION['client_user_id'];
    
    $sql_query = mysqli_query($conn, "SELECT `project_id` FROM `client_users` WHERE id = '$client_user_id'");
    if($sql_query){
        $row = mysqli_fetch_assoc($sql_query);
        $project_id = $row['project_id'];
    }
    $sql_project_query = mysqli_query($conn, "SELECT * FROM `project` WHERE id = '$project_id'");
    if($sql_project_query){
        $row2 = mysqli_fetch_assoc($sql_project_query);
        $project_name = $row2['name'];
        $project_specifics = $row2['specifics'];
        $project_start = $row2['start_date'];
        $project_timeline = $row2['estimated_delivery_date'];
    }
    echo $project_name."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".
        $project_specifics."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".
        $project_start."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".
        $project_timeline."<br>";

?>
