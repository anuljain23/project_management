<?php

    require 'auth.php';
    $id = $_SESSION['id'];
    
?>

<html>
    <body>
        <h2>Catagorize tasks for your project</h2>
        <form method="POST" action="action.php">
            <label>Name:</label>
            <input type="text" name="task_name" required><br><br>
            <label>Description:</label>
            <input type="text" name="task_desc" required><br><br>
            <label>Project Name:</label>
            <input type="text" name="associated_project_name" required><br><br>
            <label>Submission Date:</label>
            <input type="date" name="task_deadline" required><br><br>
            <label>Task Catagory:</label>
            <input type="text" name="role_name" required><br><br>
            <input type="submit" name="assign_task" value="Assign"><br><br>
        </form>
        <a href="team.php" role="button">Allocate team for the project</a>
    </body>
</html>