<?php

    require 'config.php';
    
    
    
    /*************************************************************/
    /***************** COMPANY REGISTRATION **********************/
    /*************************************************************/
 
    
    
    if(isset($_POST['register_company'])){
        $company_name = $_POST['name'];
        $company_email = $_POST['email'];
        $company_password = $_POST['password'];
        $company_username= $_POST['username'];
        $error_array_company = array();
        
        $company_name_query = mysqli_query($conn, "SELECT name FROM `developing_company` WHERE name = '$company_name'");
        $num_rows = mysqli_num_rows($company_name_query);
        if($num_rows>0){
            array_push($error_array_company, "This name is alreday registered.");
        }
        $company_email_query = mysqli_query($conn, "SELECT * FROM `developing_company` WHERE email = '$company_email'");
        $num_rows2 = mysqli_num_rows($company_email_query);
        if($num_rows2>0){
            array_push($error_array_company, "This email is alreday registered.");
        }
        
        
        if(empty($error_array_company)){
            
            // $sql = "INSERT INTO `developing_company` (`name`, `username`, `email`, `password`) 
            // VALUES ('".$company_name."', '".$company_username."', '".$company_email."', '".$company_password."')";
            $sql = "INSERT INTO `developing_company` (`name`, `username`, `email`, `password`) 
            VALUES ('$company_name', '$company_username', '$company_email', '$company_password')";
            if(mysqli_query($conn, $sql)){
                header("Location: login.php");
  		        exit();
            }else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }else{
            print_r($error_array_company);
        }
    }
    
    
    
    /*************************************************************/
    /********************** COMPANY LOGIN ************************/
    /*************************************************************/
 
    
    
    if(isset($_POST['login_button'])){
        
      $error_array = array();    
      $log_email = filter_var($_POST['log_email'],FILTER_SANITIZE_EMAIL);
      $log_password = $_POST['log_password'];

      $_SESSION['email'] = $log_email;

      $check_database_query = mysqli_query($conn,"SELECT * FROM `developing_company` WHERE email = '$log_email'");
      $check_email_query = mysqli_num_rows($check_database_query);
      
      if($check_email_query>0){
          $row = mysqli_fetch_assoc($check_database_query);
          $registered_password = $row['password'];
      }
      
      if($log_password === $registered_password){
          $user_id = $row['id'];
          $_SESSION['id'] = $user_id;
          setcookie('user_email',$row['email'],time() + 60*60*24*15, "/");
          setcookie('user_password',$row['password'],time() + 60*60*24*15, "/");
          header("Location: dashboard.php");
          exit();
      }

      else {
        array_push($error_array, "Email or password is incorrect");
        print_r($error_array);
      }
    }
    
    
    
    /*************************************************************/
    /***************** EMPLOYEE REGISTRATION *********************/
    /*************************************************************/
 
    
        
    if(isset($_POST['register_emp'])){
        
        $emp_name = $_POST['name'];
        $emp_contact = $_POST['contact_no'];
        $emp_email = $_POST['email'];
        $emp_password = $_POST['password'];
        $emp_comp_id = $_SESSION['id'];
        $error_array_emp = array();
        
        $check_emp_query = mysqli_query($conn, "SELECT email FROM `employee` WHERE email = '$emp_email'");
        $num_row3 = mysqli_num_rows($check_emp_query);
        if($num_row3>0){
            array_push($error_array_emp, "This email is already registered.");
        }
        
        if(empty($error_array_emp)){
            $sql_emp_reg = "INSERT INTO `employee` (`name`, `contact_no`, `email`, `password`, `company_id`) 
                            VALUES ('$emp_name', '$emp_contact', '$emp_email', '$emp_password', '$emp_comp_id')";
            if(mysqli_query($conn, $sql_emp_reg)){
                header("Location: remove_employee.php");
                exit();
            }else{
                echo "Error: " . $sql_emp_reg . "<br>" . mysqli_error($conn);
            }
        }else{
            print_r($error_array_emp);
        }
    }
    
    
    
    
    /*************************************************************/
    /********************* DEFINING ROLE *************************/
    /*************************************************************/
 
 
 
    
    if(isset($_POST['reg_role'])){
        
        $role_name = $_POST['role_name'];
        $role_comp_id = $_SESSION['id'];
        $error_array_role = array();
        
        $check_role_query = mysqli_query($conn, "SELECT * FROM `role` WHERE name = '$role_name' AND company_id = '$role_comp_id'");
        $num_row4 = mysqli_num_rows($check_role_query);
        if($num_row4>0){
            array_push($error_array_role, "You already have this role defined in your company.");
        }
        
        if(empty($error_array_role)){
            $sql_def_role = "INSERT INTO `role` (`name`, `company_id`)
            VALUES ('$role_name', '$role_comp_id')";
            if(mysqli_query($conn, $sql_def_role)){
                header("Location: define_role.php");
                exit();
            }else{
                echo "Error: " . $sql_def_role . "<br>" . mysqli_error($conn);
            }
        }else{
            print_r($error_array_role);
        }
        
    }
    
    
    
    /*************************************************************/
    /*********************** ADD PROJECT *************************/
    /*************************************************************/
    
    
    
    if(isset($_POST['reg_project'])){
        
        $project_name = $_POST['project_name'];
        $client_name = $_POST['client_name'];
        $specifics = $_POST['specifics'];
        $start_date = $_POST['start_date'];
        $delivery_date =$_POST['estimated_delivery_date'];
        $project_comp_id = $_SESSION['id'];
        $error_array_project = array();
        
        $check_project_query = mysqli_query($conn, "SELECT * FROM `project` WHERE name = '$project_name' AND company_id = '$project_comp_id'");
        $num_row5 = mysqli_num_rows($check_project_query);
        if($num_row5>0){
            array_push($error_array_project, "You already have this name assigned to a project.");
        }
        
        if(empty($error_array_project)){
            $sql_client_id_query = "SELECT id FROM `client_company` WHERE name = '$client_name'";
            $result = mysqli_query($conn, $sql_client_id_query);
            $row1 = mysqli_fetch_assoc($result);
            $client_id = $row1['id'];
            $sql_reg_project = "INSERT INTO `project` (`name`, `client_id`, `specifics`, `start_date`, `estimated_delivery_date`, `company_id`)
            VALUES ('$project_name', '$client_id', '$specifics', '$start_date', '$delivery_date', '$project_comp_id')";
            if(mysqli_query($conn, $sql_reg_project)){
                $_SESSION['last_project_id'] = mysqli_insert_id($conn);
                header("Location: existing_project.php?q=success");
                exit();
            }else{
                echo "Error: " . $sql_reg_project . "<br>" . mysqli_error($conn);
            }
        }else{
            print_r($error_array_project);
        }
        
    }
        
    
    
    
    /*************************************************************/
    /******************** TASK ASSIGNMENT ************************/
    /*************************************************************/
    
    
    
    
    if(isset($_POST['assign_task'])){
        
        $task_name = $_POST['task_name'];
        $task_desc = $_POST['task_desc'];
        $associated_project_id = $_POST['associated_project_id'];
        $task_deadline = $_POST['task_deadline'];
        $role_name = $_POST['role_name'];
        $comp_id = $_SESSION['id'];
        $role_id = "";
        $project_id = "";
        $error_array_task = array();
        
        $sql_role_id_query = mysqli_query($conn, "SELECT * FROM `role` WHERE name = '$role_name' AND company_id = '$comp_id'");
        $num_rows9 = mysqli_num_rows($sql_role_id_query);
        if($num_rows9>0){
            $row5 = mysqli_fetch_assoc($sql_role_id_query);
            $role_id = $row5['id'];
        }else{
            array_push($error_array_task, "You don't have this task catagory defined in your roles");
        }
        
        $sql_project_id_query = mysqli_query($conn, "SELECT id FROM `project` WHERE id = '$associated_project_id' AND company_id = '$comp_id'");
        $num_rows10 = mysqli_num_rows($sql_project_id_query);
        if($num_rows10>0){
            $row6 = mysqli_fetch_assoc($sql_project_id_query);
            $project_id = $row6['id'];
        }else{
            array_push($error_array_task, "You don't have any project under specified name");
        }
        
        if(empty($error_array_task)){
            $sql_assign_task_query = mysqli_query($conn, "INSERT INTO `task` (`name`, `description`, `project_id`, `role_id`, `timeline`) 
                                    VALUES ('$task_name', '$task_desc', '$project_id', '$role_id', '$task_deadline')");
            if($sql_assign_task_query){
                $_SESSION['project_id'] = $_POST['associated_project_id'];
                header("Location: define_task.php");
                exit();
            }else{
                echo "Error: " . $sql_assign_task_query . "<br>" . mysqli_error($conn);
            }
        }else{
            print_r($error_array_task);
        }
        
    }
    
    
    
    
    /*************************************************************/
    /************** CLIENT COMPANY REGISTRATION ******************/
    /*************************************************************/
    
    
    if(isset($_POST['register_client_company'])){
        
        $client_comp_name = $_POST['client_comp_name'];
        $client_comp_contact = $_POST['client_comp_contact'];
        $client_comp_email = $_POST['client_comp_email'];
        $client_comp_password = $_POST['client_comp_password'];
        $comp_id = $_SESSION['id'];
        $error_array_client_comp = array();
        
        $check_client_comp_query = mysqli_query($conn, "SELECT name FROM `client_company` WHERE name = '$client_comp_name'");
        $num_row6 = mysqli_num_rows($check_client_comp_query);
        if($num_row6>0){
            array_push($error_array_client_comp, "This name is already registered in our database.");
        }
        
        if(empty($error_array_client_comp)){
            $client_comp_reg_query = mysqli_query($conn, "INSERT INTO `client_company` (`name`, `contact`, `email`, `password`, `company_id`) 
                                    VALUES ('$client_comp_name', '$client_comp_contact', '$client_comp_email', '$client_comp_password', '$comp_id')");
            if($client_comp_reg_query){
                header("Location: existing_client.php");
                exit();
            }else{
                echo "Error:" . mysqli_error($conn);
            }
        }else{
            print_r($error_array_client_comp);
        }
        
    }
    
    
    // if(isset($_POST['register_client_company'])){
        
    //     $client_comp_name = $_POST['client_comp_name'];
    //     $client_comp_contact =$_POST['client_comp_contact'];
    //     $error_array_client_comp = array();
        
    //     $check_client_comp_query = mysqli_query($conn, "SELECT name FROM `client_company` WHERE name = '$client_comp_name'");
    //     $num_row6 = mysqli_num_rows($check_client_comp_query);
    //     if($num_row6>0){
    //         array_push($error_array_client_comp, "This name is already registered in our database.");
    //     }
        
    //     if(empty($error_array_client_comp)){
    //         $client_comp_reg_query = mysqli_query($conn, "INSERT INTO `client_company` (`name`, `contact`) 
    //                                 VALUES ('$client_comp_name', '$client_comp_contact')");
    //         if($client_comp_reg_query){
    //             header("Location: client_company_users.php");
    //             exit();
    //         }else{
    //             echo "Error:" . mysqli_error($conn);
    //         }
    //     }else{
    //         print_r($error_array_client_comp);
    //     }
        
    // }
    
    
    
    
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
                header("Location: client_company_users.php");
                exit();
            }else{
                echo "Error:" . mysqli_error($conn);
            }
        }else{
            print_r($error_array_client_user_reg);
        }
        
    }
    
    
    
    /*************************************************************/
    /**************** ASSIGN TEAM MEMBERS ROLES ******************/
    /*************************************************************/
    
    
    
    
   if(isset($_POST['assign_role'])){
       
       $member_role = array();
       $project_id = $_POST['project_id'];
       $member_role = $_POST['member_role'];
       $team_company_id = $_SESSION['id'];
       
       $member_and_role = serialize($member_role);
       $sql_assign_role_query = mysqli_query($conn, "INSERT INTO `team` (`member_and_role`, `project_id`, `company_id`) 
                                VALUES ('$member_and_role', '$project_id', '$team_company_id')");
                                
        if($sql_assign_role_query){
            header("Location: view_team.php");
            exit();
        }
        else{
            echo "Error:" . $sql_assign_role_query . "<br>" . mysqli_error($conn);
        }
   }
   
   
   
   
   
   if(isset($_POST['remove_role_button'])){
       $role_id = $_POST['role_id'];
       $remove_role_query = mysqli_query($conn, "DELETE FROM `role` WHERE id = '$role_id'");
       if($remove_role_query){
           header("Location: define_role.php");
           exit();
       }else{
           echo "ERROR" . $remove_role_query . mysqli_error($conn);
       }
   }
   
   
   
   
   
   
   
   if(isset($_POST['remove_emp_button'])){
       $emp_id = $_POST['emp_id'];
       $remove_employee_query = mysqli_query($conn, "DELETE FROM `employee` WHERE id = '$emp_id'");
       if($remove_employee_query){
           header("Location: remove_employee.php");
           exit();
       }else{
           echo "ERROR" . $remove_employee_query . mysqli_error($conn);
       }
   }
   
   
   
   
   if(isset($_POST['unset_session'])){
       unset($_SESSION['last_project_id']);
       header("Location: existing_project.php");
       exit();
   }
   
   
   
   
   if(isset($_POST['different_project'])){
       unset($_SESSION['last_project_id']);
       $_SESSION['project_id'] = $_POST['project_id'];
       header("Location: create_team.php");
       exit();
   }
   
   
   
   
   
   
   if(isset($_POST['different_task_project'])){
       unset($_SESSION['last_project_id']);
       header("Location: define_task.php");
       exit();
   }
   
   
   
   
   
   
   
   if(isset($_POST['set_session'])){
       $_SESSION['last_project_id'] = $_POST['last_project_id'];
       header("Location: create_team.php");
       exit();
   }
   
   
   
   
   
   
   
   
   if(isset($_POST['team_members'])){
       if(!empty($_SESSION['last_project_id'])){
           $project_id = $_SESSION['last_project_id'];
       }
       else{
           $project_id = $_POST['project_id'];
       }
       $team_members = array();
       $comp_id = $_SESSION['id'];
       $team_members = serialize($_POST['member_id']);
      
       $sql_team_query = mysqli_query($conn, "INSERT INTO `team_members` (`members`, `project_id`, `company_id`) VALUES ('$team_members', '$project_id', '$comp_id')");
       if($sql_team_query){
        //     echo $project_id;
          header("Location: view_team.php");
          exit();
       }else{
           echo "Error:" . $sql_team_query . "<br>" . mysqli_error($conn);
       }
   }
   
   
   
   
   
   
   if(isset($_POST['select_project'])){
       unset($_SESSION['last_project_id']);
       $_SESSION['project_id'] = $_POST['project_id'];
       header("Location: define_task.php");
       exit();
   }
   
   
   
   
   
   
    if(isset($_POST['select_project_assign'])){
       unset($_SESSION['last_project_id']);
       $_SESSION['project_id'] = $_POST['project_id'];
       header("Location: assign_task.php");
       exit();
   }
   
   

?>




































