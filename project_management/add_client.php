<?php
    
    require 'auth.php';
	include 'header.php';
	$id = $_SESSION['id'];
	
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
                            </div>
                        </div>
                   
                    
                    
                            <div class="tab-content">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">New Client</h5>
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
                                            
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <input type="submit" name="register_client_company" class="btn btn-secondary" value="Submit">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                         </div>
                        
                        
                        
<?php

	include 'footer.php';

?>