<?php
    
    require 'auth.php';
	include 'header.php';
	$id = $_SESSION['id'];
	$remove_employee_query = mysqli_query($conn, "SELECT * FROM `employee` WHERE company_id = '$id' ORDER BY name");
	
?>
                
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="material-icons icon-gradient bg-mean-fruit">people
                                        </i>
                                    </div>
                                    <div>
                                        Employee Management
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <div class="d-inline-block dropdown">
                                        <button type="button" class="mb-2 mr-2 btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                <i class="material-icons metismenu-icon">person_add</i>
                                            <span class="title-position">Add Employee</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                            
                            
                            
                            
                        <!--<button type="button" class="mb-2 mr-2 btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">-->
                        <!--    Add Employee-->
                        <!--</button>    -->
                            
                            
                            
                            
                            
                            
                            
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Employees</h5>
                                        <div class="table-responsive">
                                            <table class="mb-0 table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>E-mail</th>
                                                    <th>Contact</th>
                                                    <th>Remove</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $i = 1;
                                                    while($row = mysqli_fetch_assoc($remove_employee_query)){
                                                        echo "  <tr>
                                                                    <th scope='row'>".$i."</th>
                                                                    <td>".$row['name']."</td>
                                                                    <td>".$row['email']."</td>
                                                                    <td>".$row['contact_no']."</td>
                                                                    <td><form action='action.php' method='POST'>
                                                                            <input type='hidden' name='emp_id' value='".$row['id']."'>
                                                                            <input type='submit' value='Remove' name='remove_emp_button' class='mb-2 mr-2 btn btn-danger'>
                                                                        </form>
                                                                    </td>
                                                                </tr>";
                                                        $i++;
                                                    }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                            
                            


<?php

	include 'footer.php';

?>





<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Register New Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--<div class="tab-content">-->
                    <!--<div class="main-card mb-3 card">-->
                        <div class="card-body">
                            <!--<h5 class="card-title">New Registration</h5>-->
                            <form action="action.php" method="POST">
                                <div class="position-relative row form-group"><label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input name="name" id="name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="position-relative row form-group"><label for="contact" class="col-sm-2 col-form-label">Contact No.</label>
                                    <div class="col-sm-10">
                                        <input name="contact_no" id="contact" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="position-relative row form-group"><label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input name="email" id="email" type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="position-relative row form-group"><label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input name="password" id="password" type="password" class="form-control">
                                    </div>
                                </div>
                                
                                <!--<div class="position-relative row form-check">-->
                                <!--    <div class="col-sm-10 offset-sm-2">-->
                                <!--        <input type="submit" name="register_emp" class="btn btn-secondary" value="Submit">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" name="register_emp" value="Submit">
                                </div>
                            </form>
                        </div>
                    <!--</div>-->
                <!--</div>-->
            </div>
            
        </div>
    </div>
</div>


