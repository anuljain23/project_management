<?php
    
    require 'auth.php';
	include 'header.php';
	$id = $_SESSION['id'];
	$existing_projects_query = mysqli_query($conn, "SELECT * FROM `project` WHERE company_id = '$id' ORDER BY name");
	if(isset($_GET['q'])){
	    if($_GET['q']==='success'){
	        $last_project_id = $_SESSION['last_project_id'];
	        ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Project Added successfully!</h4>
                <p>Do you want to crate team for the <strong>project</strong> now!!!</p>
                <form method="POST" action="action.php">
                    <input type="hidden" name="last_project_id" value="<?=$last_project_id;?>">
                    <button class="mb-2 mr-2 btn btn-info" name="set_session">
                        Create Team
                    </button>
                    <button class="mb-2 mr-2 btn btn-secondary" name="unset_session">
                        Later
                    </button>
                </form>
            </div>
	    <?php
	        
	    }
	}

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
                                        Existing Project
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <div class="d-inline-block dropdown">
                                        <button type="button" class="mb-2 mr-2 btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                <i class="material-icons metismenu-icon">folder_special</i>
                                            <span class="title-position">Add Project</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                   


                        <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Projects</h5>
                                        <div class="table-responsive">
                                            <table class="mb-0 table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Client</th>
                                                    <th>Specifics</th>
                                                    <th>Start Date</th>
                                                    <th>Delivery Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $i = 1;
                                                    while($row = mysqli_fetch_assoc($existing_projects_query)){
                                                        $client_id = $row['client_id'];
                                                        $sql_client_query = mysqli_query($conn, "SELECT `name` FROM `client_company` WHERE id = '$client_id'");        
                                                        if($sql_client_query){
                                                            $row2 = mysqli_fetch_assoc($sql_client_query);
                                                        }
                                                        echo "  <tr>
                                                                    <th scope='row'>".$i."</th>
                                                                    <td class='cell-pad'>".$row['name']."</td>
                                                                    <td class='cell-pad'>".$row2['name']."</td>
                                                                    <td class='cell-pad'>".$row['specifics']."</td>
                                                                    <td class='cell-pad'>".$row['start_date']."</td>
                                                                    <td class='cell-pad'>".$row['estimated_delivery_date']."</td>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--<div class="tab-content">-->
                    <!--<div class="main-card mb-3 card">-->
                        <div class="card-body">
                            <!--<h5 class="card-title">New Project</h5>-->
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
                                
                                <!--<div class="position-relative row form-check">-->
                                <!--    <div class="col-sm-10 offset-sm-2">-->
                                <!--        <input type="submit" name="reg_project" class="btn btn-secondary" value="Submit">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" name="reg_project" value="Submit">
                                </div>
                            </form>
                        </div>
                    <!--</div>-->
                <!--</div>-->
            </div>
            
        </div>
    </div>
</div>


