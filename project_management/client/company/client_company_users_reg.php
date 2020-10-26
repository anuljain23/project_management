<html>
    
    <body>
        <h1>Register your users for project</h1>
        <h2>Fill in the user's details</h2>
        <form action="action.php" method="POST">
            <label>Company Name:</label>
            <input type="text" name="client_company_name" required><br><br>
            <label>User Name:</label>
            <input type="text" name="client_user_name" required><br><br>
            <label>Contact No.:</label>
            <input type="text" name="client_user_contact" required><br><br>
            <label>Assigned Project Name:</label>
            <input type="text" name="assigned_project_name" required><br><br>
            <label>Email:</label>
            <input type="email" name="client_user_email" required><br><br>
            <label>Password:</label>
            <input type="password" name="client_user_password" required><br><br>
            <input type="submit" name="register_client_user" value="Register"><br><br>
        </form>
        
        <a href="view_projects.php">View all the projects</a>
        
    </body>
    
</html>