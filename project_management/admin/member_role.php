<?php

    require 'auth.php';
    $id = $_SESSION['id'];
    if(!isset($_POST['team_members'])){
        header("Location: team.php");
        exit();
    }
    
?>

<html>
    <body>
        <h2>Assign Roles to your team</h2>
        <form action="action.php" method="POST">
            <?php
                echo "<input type='hidden' name='project_id' value='".$_POST['project']."'>";
                foreach($_POST['member_id'] as $selected_id){
                    echo "<input type='hidden' name='member_ids[]' value='".$selected_id."'>";
                    echo $selected;
                }
            
                foreach($_POST['member_id'] as $selected){
                    $sql_query = mysqli_query($conn, "SELECT * FROM `employee` WHERE id = '$selected' AND company_id = '$id'");
                   
                    while($row = mysqli_fetch_assoc($sql_query)){
                        echo "<h3>".$row['name']."</h3>";
                        $sql_role_query = mysqli_query($conn, "SELECT * FROM `role` WHERE company_id = '$id'");
                        
                        while($row1 = mysqli_fetch_assoc($sql_role_query)){
                            echo "<input type='checkbox' name='member_role[".$selected."][]' value='".$row1['id']."'>".$row1['name']."&nbsp&nbsp";
                        }
                    }
                }
            ?>
            <br><br><br><input type="submit" value="Assign Role" name="assign_role">
        </form>
    </body>
</html>