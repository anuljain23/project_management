<?php

    require 'config.php';
    $email = $_COOKIE['user_email'];
    $password = $_COOKIE['user_password'];
    
    $check_cookie_query = mysqli_query($conn, "SELECT * FROM `developing_company` WHERE email = '$email' AND password = '$password'");
    $num_rows = mysqli_num_rows($check_cookie_query);
    if($num_rows>0){
        $row = mysqli_fetch_assoc($check_cookie_query);
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['name'];
        $_SESSION['email']  = $email;
    }else{
        header("Location: login_form/index.html");
        exit();
    }
    
?>