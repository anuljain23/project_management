<?php
    
    
    require 'auth.php';
    $id = $_SESSION['id'];

?>

<html>
    <body>
        <form action="member_role.php" method="POST">
            <h2>Select the project</h2>
            <select name="project">
                <?php
                    $sql_query = mysqli_query($conn, "SELECT * FROM `project` WHERE company_id = '$id'");
                    while($row = mysqli_fetch_assoc($sql_query)){
                        echo "<option value='".$row['id']."'>".$row['name']."</option>";
                    }
                ?>
            </select><br><br>
                <?php
                    $sql_query = mysqli_query($conn, "SELECT * FROM `employee` WHERE company_id = '$id'");
                    while($row = mysqli_fetch_assoc($sql_query)){
                        echo "<input type='checkbox' name='member_id[]' value='".$row['id']."'>".$row['name']."<br><br>";
                    }
                ?>
            <br>
            <input type="submit" name="team_members" value="Submit">
        </form>
    </body>
</html>






































<!--<html>-->
    
<!--    <body>-->
<!--        <h2>Select Team for your project</h2>-->
<!--        <form method="POST" action="script.php">-->
<!--            <label>Project Name:</label>-->
<!--            <input type="text" name="project_name" required>-->
<!--            <select name="team_members_id" id="mySelect">-->
                <?php
                    //$sql_query = mysqli_query($conn, "SELECT * FROM `employee` WHERE company_id = '$id'");
                    //while($row = mysqli_fetch_assoc($sql_query)){
                    //    echo "<option value='".$row['name']."'onclick='selectedMembers(\"".$row['name']."\",".$row['id'].");'>".$row['name']."</option>";
                    //}
                //?>
        <!--    </select><br><br>-->
        <!--    <input type="button" onclick="send_to_php();" value="Send to php">-->
        <!--    <input type="submit" name="create_team" value="Create Team" onclick="send_to_php();"><br><br>-->
            
        <!--</form>-->
        <!--<div id="team_members"></div>-->
        <!--<div id="assigned_role"></div> -->
        
        
        <!--<script>-->
        
            
        <!--    var mid = Array();-->
        <!--    var members = Array();-->
        <!--    var empId = Array();-->
        <!--    var x = 0;-->
            
        <!--    function selectedMembers(name,id){-->
                
        <!--        members[x] = name;-->
        <!--        mid[x] = id;-->
        <!--        x++;-->
        <!--        let m = "<h2>Selected members are: </h2><br><br>";-->
        <!--        for (let y=0; y<members.length; y++){-->
        <!--            empId[y] = mid[y];-->
        <!--            m += `${members[y]}-->
        <!--            <br><br>`;-->
        <!--            document.getElementById("team_members").innerHTML = m;-->
        <!--        }-->
        <!--        var z = document.getElementById("mySelect");-->
        <!--        z.remove(z.selectedIndex);-->
                
        <!--    }-->
            
            
        <!--    function send_to_php(){-->
        <!--        var data = JSON.stringify(empId);-->
        <!--        var xmlhttp = new XMLHttpRequest();  -->
        <!--        xmlhttp.open("POST", "script.php", true);-->
        <!--        xmlhttp.onreadystatechange = function () { -->
        <!--        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) { -->
        <!--            result.innerHTML = this.responseText; -->
        <!--            } -->
        <!--        }; -->
        <!--        xmlhttp.setRequestHeader("Content-Type", "application/json");-->
        <!--        xmlhttp.send(data);-->
        <!--    }-->
            
            
        <!--</script>-->
        
<!--    </body>-->
    
<!--</html>-->