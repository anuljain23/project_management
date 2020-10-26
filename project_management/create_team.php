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
                                        <i class="fas fa-users icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>
                                        Create Teams
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <div class="d-inline-block dropdown">
                                        <button type="button" class="mb-2 mr-2 btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg-project">
                                                <i class="material-icons metismenu-icon">folder_special</i>
                                            <span class="title-position">Select Project</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                            <div class="tab-content">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Create Team</h5>
                                        <form action="action.php" method="POST">
                                            <div class="position-relative row form-group">
                                                <label for="project" class="col-sm-2 col-form-label">Project</label>
                                                <div class="col-sm-10">
                                                    <?php
                                                        if(isset($_SESSION['last_project_id']) && !empty($_SESSION['last_project_id'])){
                                                            $project_id = $_SESSION['last_project_id'];
                                                            
                                                            $sql_project_query = mysqli_query($conn, "SELECT * FROM `project` WHERE id = '$project_id'");
                                                            while($row3 = mysqli_fetch_assoc($sql_project_query)){
                                                                ?>
                                                                <input name="project" id="project" type="text" class="form-control" disabled value="<?=$row3['name'];?>">
                                                                <?php
                                                            }
                                                        }
                                                        else if(isset($_SESSION['project_id']) && !empty($_SESSION['project_id'])){
                                                            $project_id = $_SESSION['project_id'];
                                                            
                                                            $sql_project_query = mysqli_query($conn, "SELECT * FROM `project` WHERE id = '$project_id'");
                                                            while($row4 = mysqli_fetch_assoc($sql_project_query)){
                                                                ?>
                                                                <input name="project" id="project" type="text" class="form-control" disabled value="<?=$row4['name'];?>">
                                                                <?php
                                                                
                                                            }
                                                        }
                                                        else{
                                                    ?>
                                                            <div class="card-body">
                                                                <!--<h5 class="card-title">Project Not selected</h5>-->
                                                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                                    <h5>Project Not Selected</h5>
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    Please select a project to continue!
                                                                </div>
                                                            </div>
                                                        <?php
                                                            }
                                                        ?>
                                                </div>
                                            </div>
                                            
                                            <?php
                                                if(!empty($project_id)){
                                            ?>
                                            <div class="main-card mb-3 card">
                                                <div class="card-body"><h5 class="card-title">Select Employees</h5>
                                                    <div class="position-relative form-group">
                                                        <div>
                                                            <input type="hidden" name="project_id" value="<?=$project_id;?>">
                                                            <?php 
                                                                $sql_member_query = mysqli_query($conn,"SELECT * FROM `employee` WHERE company_id = '$id'");                        
                                                                while($row2 = mysqli_fetch_assoc($sql_member_query)){
                                                            ?>
                                                                    <div class="custom-checkbox custom-control">
                                                                        <input type="checkbox" id="team_member<?=$row2['id'];?>" class="custom-control-input" name="member_id[]" value="<?php echo $row2['id'];?>">
                                                                        <label class="custom-control-label" for="team_member<?=$row2['id'];?>">
                                                                            <?php echo $row2['name'];?>
                                                                        </label><br><br>
                                                                    </div>
                                                            <?php
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <input type="submit" name="team_members" class="btn btn-secondary" value="Submit">
                                                </div>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    
                    
                    
<?php

	include 'footer.php';

?>





<div class="modal fade bd-example-modal-lg-project" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Select Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <h5>Select a project</h5><br>
                    <form action="action.php" method="POST">
                        <div class="position-relative row form-group">
                            <label for="name" class="col-sm-2 col-form-label">Project</label>
                            <div class="col-sm-10">
                                <select name="project_id" id="project_id" class="form-control">
                                    <?php
                                        $sql_project_query = mysqli_query($conn, "SELECT * FROM `project` WHERE company_id = '$id' ORDER BY name");
                                        while($row2 = mysqli_fetch_assoc($sql_project_query)){
                                            echo "<option value='".$row2['id']."'>".$row2['name']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="different_project" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>



<?php
    unset($_SESSION['last_project_id']);
    unset($_SESSION['project_id']);
?>


