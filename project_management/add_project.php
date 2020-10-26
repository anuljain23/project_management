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
                                        <i class="material-icons icon-gradient bg-mean-fruit">folder_special
                                        </i>
                                    </div>
                                    <div>
                                        New Project
                                    </div>
                                </div>
                            </div>
                        </div>



                            <div class="tab-content">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">New Project</h5>
                                        <form action="action.php" method="POST">
                                            <div class="position-relative row form-group"><label for="name" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input name="project_name" id="name" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="client_name" class="col-sm-2 col-form-label">Client Name</label>
                                                <div class="col-sm-10">
                                                    <select name="client_name" id="client_name" class="form-control">
                                                        <option value="null">Select an option</option>
                                                        <?php
                                                            $sql_client_query = mysqli_query($conn, "SELECT * FROM `client_company`");
                                                            while($row = mysqli_fetch_assoc($sql_client_query)){
                                                                echo "<option value='".$row['name']."'>".$row['name']."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="specifics" class="col-sm-2 col-form-label">Specifics</label>
                                                <div class="col-sm-10">
                                                    <textarea name="specifics" id="specifics" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="start_date" class="col-sm-2 col-form-label">Start-Date</label>
                                                <div class="col-sm-10">
                                                    <input name="start_date" id="start_date" type="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="estimated_delivery_date" class="col-sm-2 col-form-label">Delivery-Date</label>
                                                <div class="col-sm-10">
                                                    <input name="estimated_delivery_date" id="estimated_delivery_date" type="date" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <input type="submit" name="reg_project" class="btn btn-secondary" value="Submit">
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