<?php
    require 'config.php';
    $comp_email = $_COOKIE['client_comp_email'];
    $comp_password = $_COOKIE['client_comp_password'];
    
    $check_cookie_query = mysqli_query($conn, "SELECT * FROM `client_company` WHERE email = '$comp_email' AND password = '$comp_password'");
    $num_rows = mysqli_num_rows($check_cookie_query);
    if($num_rows>0){
        $row = mysqli_fetch_assoc($check_cookie_query);
        $_SESSION['client_id'] = $row['id'];
        $_SESSION['client_name'] = $row['name'];
        $_SESSION['client_email']  = $comp_email;
    }else{
        header("Location: client_company_login.php");
        exit();
    }
?>