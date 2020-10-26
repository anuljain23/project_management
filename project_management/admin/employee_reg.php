<?php

    require 'auth.php';
    $id = $_SESSION['id'];
    
?>
<html>
    
    <body>
        
        <h1>Register Your Employees Here!</h1>
        <form action="action.php" method="POST">
            <label>Name:</label>
            <input type="text" name="name" required><br><br>
            <label>Contact No.:</label>
            <input type="text" name="contact_no" required><br><br>
            <label>Email:</label>
            <input type="email" name="email" required><br><br>
            <label>Password:</label>
            <input type="password" name="password" required><br><br>
            <input type="submit" name="register_emp" value="Register"><br><br>
        </form>
        <a href="roles.php" role="button">Define your company's role</a><br><br>
        <a href="project.php" role="button">Add project</a><br><br>
        
    </body>
    
</html>