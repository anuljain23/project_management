<?php

    require 'auth.php';
    $id = $_SESSION['id'];
    $project_id = 3;
    $sql_query = mysqli_query($conn, "SELECT * FROM `team` WHERE project_id = '$project_id' AND company_id = '$id'");
    while($row = mysqli_fetch_assoc($sql_query)){
        $member_role = unserialize($row['member_and_role']);
    }
    foreach($member_role as $member => $roles){
        echo "<br><br>".$member."=>";
        foreach($roles as $role => $role_id){
            echo "<br>".$role_id;
        }
    }
    
?>

