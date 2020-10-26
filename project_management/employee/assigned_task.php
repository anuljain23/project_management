<?php

    require 'auth.php';
    $emp_id = $_SESSION['emp_id'];
    $emp_comp_id = $_SESSION['emp_comp_id'];
    $team = array();
    $assigned_role = array();
    
    $sql_team_query = mysqli_query($conn, "SELECT * FROM `team` WHERE company_id = '$emp_comp_id'");
    while($row = mysqli_fetch_assoc($sql_team_query)){
        $member_and_role = unserialize($row['member_and_role']);
        foreach($member_and_role as $member => $roles){
            if($member == $emp_id){
                array_push($team, $row['id']);
            }
        }
    }
    
?>

<html>
    <body>
        <h2>Your project(s):</h2>
    </body>
</html>

<?php
    
    foreach($team as $team_id){
        $sql_project_query = mysqli_query($conn, "SELECT * FROM `team` WHERE id = '$team_id'");
        while($row2 = mysqli_fetch_assoc($sql_project_query)){
            $member_and_role = unserialize($row2['member_and_role']);
            $project_id = $row2['project_id'];
            $sql_project_details_query = mysqli_query($conn, "SELECT * FROM `project` WHERE id = '$project_id'");
            while($row3 = mysqli_fetch_assoc($sql_project_details_query)){
                echo $row3['name'] ."<br>". $row3['specifics'] ." <br>". $row3['estimated_delivery_date'] ."<br>";
                foreach($member_and_role as $member => $roles){
                    $sql_employee_query = mysqli_query($conn, "SELECT `name` FROM `employee` WHERE id = '$member'");
                    if($sql_employee_query){
                        $row4 = mysqli_fetch_assoc($sql_employee_query);
                        echo "<strong>".$row4['name']."</strong>&nbsp&nbsp&nbsp&nbsp";
                    }
                }echo "<br>";
            }
        }echo "<br>";
    }
    
?>

        <h2>You have been assigned the following task(s):</h2>
        
<?php

    foreach($team as $team_id){
        $sql_team_query = mysqli_query($conn, "SELECT * FROM `team` WHERE id = '$team_id'");
        if($sql_team_query){
            $row5 = mysqli_fetch_assoc($sql_team_query);
            $member_and_role = unserialize($row5['member_and_role']);
            $project_id = $row5['project_id'];
            $sql_project_name_query = mysqli_query($conn, "SELECT `name` FROM `project` WHERE id = '$project_id'");
            if($sql_project_name_query){
                $row7 = mysqli_fetch_assoc($sql_project_name_query);
                $project_name = $row7['name'];
            }
            foreach($member_and_role as $member => $roles){
                if($member == $emp_id){
                    foreach($roles as $role_index => $role_id){
                        $sql_role_task_query = mysqli_query($conn, "SELECT * FROM `task` WHERE role_id = '$role_id'");
                        if($sql_role_task_query){
                            $row6 = mysqli_fetch_assoc($sql_role_task_query);
                            $task_name = $row6['name'];
                            $task_desc = $row6['description'];
                            $task_date = $row6['timeline'];
                        }
                        if(!empty($task_name)){
                            echo $task_name."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$task_desc."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspfor&nbsp<strong>".$project_name."</strong> project&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTimeline&nbsp".$task_date."<br>";
                        }
                    }
                }
            }
        }
    }

?>
        
        
        
        
        
        
        