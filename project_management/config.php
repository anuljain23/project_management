<?php

    session_start();
    $servername = "localhost";
    $username = "rajsamma_dbuser1";
    $password = "9q6{*u_.y+,J";
    $dbname = "rajsamma_dev_db3";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    
?>