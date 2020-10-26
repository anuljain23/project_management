<?php

    require 'config.php';
    
    
    
    
    /*************************************************************/
    /************** CLIENT COMPANY REGISTRATION ******************/
    /*************************************************************/
    
    
    
    
    if(isset($_POST['register_client_company'])){
        
        $client_comp_name = $_POST['client_comp_name'];
        $client_comp_contact = $_POST['client_comp_contact'];
        $client_comp_email = $_POST['client_comp_email'];
        $client_comp_password = $_POST['client_comp_password'];
        $error_array_client_comp = array();
        
        $check_client_comp_query = mysqli_query($conn, "SELECT name FROM `client_company` WHERE name = '$client_comp_name'");
        $num_row6 = mysqli_num_rows($check_client_comp_query);
        if($num_row6>0){
            array_push($error_array_client_comp, "This name is already registered in our database.");
        }
        
        if(empty($error_array_client_comp)){
            $client_comp_reg_query = mysqli_query($conn, "INSERT INTO `client_company` (`name`, `contact`, `email`, `password`) 
                                    VALUES ('$client_comp_name', '$client_comp_contact', '$client_comp_email', '$client_comp_password')");
            if($client_comp_reg_query){
                header("Location: client_company_login.php");
                exit();
            }else{
                echo "Error:" . mysqli_error($conn);
            }
        }else{
            print_r($error_array_client_comp);
        }
        
    }
    
    
    
    
    /*************************************************************/
    /***************** CLIENT COMPANY LOGIN **********************/
    /*************************************************************/
    
    
    
    
    if(isset($_POST['client_login_button'])){
        
      $error_array = array();    
      $client_log_email = filter_var($_POST['client_log_email'],FILTER_SANITIZE_EMAIL);
      $client_log_password = $_POST['client_log_password'];

      $_SESSION['client_email'] = $client_log_email;

      $check_database_query = mysqli_query($conn,"SELECT * FROM `client_company` WHERE email = '$client_log_email'");
      $check_email_query = mysqli_num_rows($check_database_query);
      
      if($check_email_query>0){
          $row = mysqli_fetch_assoc($check_database_query);
          $client_registered_password = $row['password'];
      }
      
      if($client_log_password === $client_registered_password){
          $client_comp_id = $row['id'];
          $_SESSION['client_id'] = $client_comp_id;
          setcookie('client_comp_email',$row['email'],time() + 60*60*24*15, "/");
          setcookie('client_comp_password',$row['password'],time() + 60*60*24*15, "/");
          header("Location: client_company_users_reg.php");
          exit();
      }

      else {
        array_push($error_array, "Email or password is incorrect");
        print_r($error_array);
      }
    }
    
    
    
    
    /*************************************************************/
    /**************** CLIENT USERS REGISTRATION ******************/
    /*************************************************************/
    
    
    
    
    if(isset($_POST['register_client_user'])){
        
        $client_comp_name = $_POST['client_company_name'];
        $client_user_name = $_POST['client_user_name'];
        $client_user_contact = $_POST['client_user_contact'];
        $assigned_project_name = $_POST['assigned_project_name'];
        $client_user_email = $_POST['client_user_email'];
        $client_user_password = $_POST['client_user_password'];
        $error_array_client_user_reg = array();
        $comp_id = "";
        $project_id = "";
        
        $comp_id_query = mysqli_query($conn, "SELECT * FROM `client_company` WHERE name = '$client_comp_name'");
        $num_rows7 = mysqli_num_rows($comp_id_query);
        if($num_rows7>0){
            $row3 = mysqli_fetch_assoc($comp_id_query);
            $comp_id = $row3['id'];
        }else{
            array_push($error_array_client_user_reg, "Sorry we could not find this company in our database.");
        }
        
        $project_id_query = mysqli_query($conn, "SELECT * FROM `project` WHERE name = '$assigned_project_name' AND client_id = '$comp_id'");
        $num_rows8 = mysqli_num_rows($project_id_query);
        if($num_rows8>0){
            $row2 = mysqli_fetch_assoc($project_id_query);
            $project_id = $row2['id'];
        }else{
            array_push($error_array_client_user_reg, "Sorry we could not find this project in our database for your company.");
        }
        
        if(empty($error_array_client_user_reg)){
            $client_user_reg_query = mysqli_query($conn, "INSERT INTO `client_users` 
                                (`name`, `contact`, `project_id`, `email`, `password` ,`client_company_id`) 
                                VALUES ('$client_user_name', '$client_user_contact', '$project_id', '$client_user_email', 
                                '$client_user_password', '$comp_id')");
            if($client_user_reg_query){
                header("Location: client_company_users_reg.php");
                exit();
            }else{
                echo "Error:" . mysqli_error($conn);
            }
        }else{
            print_r($error_array_client_user_reg);
        }
        
    }

?>




































