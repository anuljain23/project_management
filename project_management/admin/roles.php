<?php

    require 'auth.php';
    $id = $_SESSION['id'];
    
?>

<html>
    
    <body>
        <h2>Define the domains in which your company works</h2>
        <form action="action.php" method="POST">
            <input type="text" name="role_name" required><br><br>
            <input type="submit" name="reg_role" value="Submit"><br><br>
        </form>
        <a href="employee_reg.php" role="button">Go Back!</a>
    </body>
    
</html>