<?php
    require 'config.php';
    $email = $_COOKIE['emp_user_email'];
    $password = $_COOKIE['emp_user_password'];
    
    $check_cookie_query = mysqli_query($conn, "SELECT * FROM `employee` WHERE email = '$email' AND password = '$password'");
    $num_rows = mysqli_num_rows($check_cookie_query);
    if($num_rows>0){
        $row = mysqli_fetch_assoc($check_cookie_query);
        $_SESSION['emp_id'] = $row['id'];
        $_SESSION['emp_user_name'] = $row['name'];
        $_SESSION['emp_email']  = $email;
        $_SESSION['emp_comp_id'] = $row['company_id'];
    }else{
        header("Location: employee_login.php");
        exit();
    }
?>