<?php

    require 'config.php';
    
    if(isset($_POST['client_user_login_button'])){
        
      $error_array = array();    
      $client_user_log_email = filter_var($_POST['client_user_log_email'],FILTER_SANITIZE_EMAIL);
      $client_user_log_password = $_POST['client_user_log_password'];

      $_SESSION['client_user_email'] = $client_user_log_email;

      $check_database_query = mysqli_query($conn,"SELECT * FROM `client_users` WHERE email = '$client_user_log_email'");
      $check_email_query = mysqli_num_rows($check_database_query);
      
      if($check_email_query>0){
          $row = mysqli_fetch_assoc($check_database_query);
          $client_user_registered_password = $row['password'];
      }
      
      if($client_user_log_password === $client_user_registered_password){
          $client_user_id = $row['id'];
          $_SESSION['client_user_id'] = $client_user_id;
          setcookie('client_comp_user_email',$row['email'],time() + 60*60*24*15, "/");
          setcookie('client_comp_user_password',$row['password'],time() + 60*60*24*15, "/");
          header("Location: view_projects.php");
          exit();
      }

      else {
        array_push($error_array, "Email or password is incorrect");
        print_r($error_array);
      }
    }

?>