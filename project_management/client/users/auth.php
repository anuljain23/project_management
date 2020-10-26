<?php

    require 'config.php';
    $comp_user_email = $_COOKIE['client_comp_user_email'];
    $comp_user_password = $_COOKIE['client_comp_user_password'];
    
    $check_cookie_query = mysqli_query($conn, "SELECT * FROM `client_users` WHERE email = '$comp_user_email' AND password = '$comp_user_password'");
    $num_rows = mysqli_num_rows($check_cookie_query);
    if($num_rows>0){
        $row = mysqli_fetch_assoc($check_cookie_query);
        $_SESSION['client_user_id'] = $row['id'];
        $_SESSION['client_user_name'] = $row['name'];
        $_SESSION['client_user_email']  = $comp_user_email;
    }else{
        header("Location: company_user_login.php");
        exit();
    }
    
?>