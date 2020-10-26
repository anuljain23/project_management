<?php    

    require 'config.php';
    
    
    /*************************************************************/
    /********************** EMPLOYEE LOGIN ***********************/
    /*************************************************************/
 
    
    
    if(isset($_POST['emp_login_button'])){
        
      $error_array_emp_login = array();    
      $emp_log_email = filter_var($_POST['emp_log_email'],FILTER_SANITIZE_EMAIL);
      $emp_log_password = $_POST['emp_log_password'];

      $_SESSION['emp_email'] = $emp_log_email;

      $check_database_query = mysqli_query($conn,"SELECT * FROM `employee` WHERE email = '$emp_log_email' ");
      $check_emp_email_query = mysqli_num_rows($check_database_query);
      
      if($check_emp_email_query>0){
          $row = mysqli_fetch_assoc($check_database_query);
          $registered_password = $row['password'];
      }
      
      if($emp_log_password === $registered_password){
          $emp_user_id = $row['id'];
          $_SESSION['emp_id'] = $emp_user_id;
          setcookie('emp_user_email',$row['email'],time() + 60*60*24*15, "/");
          setcookie('emp_user_password',$row['password'],time() + 60*60*24*15, "/");
          header("Location: assigned_task.php");
          exit();
      }

      else {
        array_push($error_array_emp_login, "Email or password is incorrect");
        print_r($error_array_emp_login);
      }
    }
    
?>