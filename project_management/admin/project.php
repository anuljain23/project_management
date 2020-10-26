<?php

    require 'auth.php';
    $id = $_SESSION['id'];
    
?>

<html>
    
    <body>
        <h2>Add Project</h2>
        <form action="action.php" method="POST">
            <label>Name:</label>
            <input type="text" name="project_name" required><br><br>
            <label>Client Name:</label>
            <input type="text" name="client_name" required><br><br>
            <label>Specifics:</label>
            <input type="text" name="specifics" required><br><br>
            <label>Start-Date:</label>
            <input type="date" name="start_date" required><br><br>
            <label>Delivery-Date:</label>
            <input type="date" name="estimated_delivery_date" required><br><br>
            <input type="submit" name="reg_project" value="Submit"><br><br>
        </form>
        <a href="employee_reg.php" role="button">Go Back!</a>
    </body>
    
</html>