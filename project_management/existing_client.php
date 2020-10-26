<?php
    
    require 'auth.php';
	include 'header.php';
	$id = $_SESSION['id'];
	$existing_client_query = mysqli_query($conn,"SELECT DISTINCT * FROM `client_company` WHERE company_id = '$id' ORDER BY name");
	

?>




                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="material-icons icon-gradient bg-mean-fruit">free_breakfast
                                        </i>
                                    </div>
                                    <div>
                                        Existing Clients
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <div class="d-inline-block dropdown">
                                        <button type="button" class="mb-2 mr-2 btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                <i class="material-icons metismenu-icon">group_add</i>
                                            <span class="title-position">Add New Client</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Clients</h5>
                                        <div class="table-responsive">
                                            <table class="mb-0 table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>E-mail</th>
                                                    <th>Contact</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $i = 1;
                                                    while($row = mysqli_fetch_assoc($existing_client_query)){
                                                        
                                                        
                                                        
                                                            echo "  <tr>
                                                                        <th scope='row'>".$i."</th>
                                                                        <td class='cell-pad'>".$row['name']."</td>
                                                                        <td class='cell-pad'>".$row['email']."</td>
                                                                        <td class='cell-pad'>".$row['contact']."</td>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Register New client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <!--<h5 class="card-title">New Client</h5>-->
                    <form action="action.php" method="POST">
                        <div class="position-relative row form-group"><label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="client_comp_name" id="name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label for="contact" class="col-sm-2 col-form-label">Contact No.</label>
                            <div class="col-sm-10">
                                <input name="client_comp_contact" id="contact" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="client_comp_email" id="email" type="email" class="form-control">
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input name="client_comp_password" id="password" type="password" class="form-control">
                            </div>
                        </div>
                        
                        <!--<div class="position-relative row form-check">-->
                        <!--    <div class="col-sm-10 offset-sm-2">-->
                        <!--        <input type="submit" name="register_client_company" class="btn btn-secondary" value="Submit">-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="register_client_company" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
