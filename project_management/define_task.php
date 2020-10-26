<?php
    
    require 'auth.php';
	include 'header.php';
	$id = $_SESSION['id'];
	$project_id = $_SESSION['last_project_id'];
	if(isset($_SESSION['project_id']) && !empty($_SESSION['project_id'])){
        $project_id = $_SESSION['project_id'];
    }
    else if(isset($_SESSION['last_project_id']) && !empty($_SESSION['last_project_id'])){
        $project_id = $_SESSION['last_project_id'];
    }
    $sql_project_query = mysqli_query($conn, "SELECT `name` FROM `project` WHERE id = $project_id");
    if($sql_project_query){
        $row1 = mysqli_fetch_assoc($sql_project_query);
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
                                        View Tasks
                                    </div>
                                </div>
                                <div class="page-title-actions button-position">
                                    <div class="d-inline-block dropdown">
                                        <button type="button" class="mb-2 mr-2 btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg-task"
                                            <?php if(empty($project_id)){echo "disabled";}?>
                                        >
                                                <i class="material-icons metismenu-icon">folder_special</i>
                                            <span class="title-position">Define Task</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="page-title-actions margin-unset">
                                    <div class="d-inline-block dropdown">
                                        <button type="button" class="mb-2 mr-2 btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg-project">
                                                <i class="material-icons metismenu-icon">folder_special</i>
                                            <span class="title-position">Select Project</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                            
                            
                            
                            
                            <?php
                                $sql_task_query = mysqli_query($conn, "SELECT * FROM `task` WHERE project_id = '$project_id'");
                                if(!empty($row1['name'])){
                            ?>
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title"><?=$row1['name'];?></h5>
                                                <div class="table-responsive">
                                                    <?php
                                                        $num_row = mysqli_num_rows($sql_task_query);
                                                        if($num_row>0){
                                                    ?>
                                                    <table class="mb-0 table">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Description</th>
                                                            <th>Catagory</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $i = 1;
                                                            while($row2 = mysqli_fetch_assoc($sql_task_query)){
                                                                $role_id = $row2['role_id'];
                                                                $sql_role_query = mysqli_query($conn, "SELECT `name` FROM `role` WHERE id = '$role_id'");
                                                                if($sql_role_query){
                                                                    $row3 = mysqli_fetch_assoc($sql_role_query);
                                                                }
                                                                echo "  <tr>
                                                                            <th scope='row'>".$i."</th>
                                                                            <td class='cell-pad'>".$row2['name']."</td>
                                                                            <td class='cell-pad'>".$row2['description']."</td>
                                                                            <td class='cell-pad'>".$row3['name']."</td>
                                                                        </tr>";
                                                                $i++;
                                                            }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                        }else{
                                                    ?>
                                                                <div class="card-body">
                                                                <!--<h5 class="card-title">Project Not selected</h5>-->
                                                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                                    <h5>No task Defined yet!</h5>
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    You haven't created any task for the above project!
                                                                </div>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
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
                    <h5>Select a project to view its defined tasks</h5><br>
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
                            <input type="submit" class="btn btn-primary" name="select_project" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>





<div class="modal fade bd-example-modal-lg-task" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <h5><?=$row1['name'];?></h5>
                    <div class="tab-content">
                        <div class="main-card mb-3 card">
                            <div class="card-body"><h5 class="card-title">Tasks</h5>
                                <form action="action.php" method="POST">
                                    <div class="position-relative row form-group">
                                        <label for="task_name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input name="task_name" id="task_name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="position-relative row form-group">
                                        <label for="task_desc" class="col-sm-2 col-form-label">Task Description</label>
                                        <div class="col-sm-10">
                                            <textarea name="task_desc" id="task_desc" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="position-relative row form-group">
                                        <div class="col-sm-10">
                                            <?php
                                                if(isset($_SESSION['last_project_id']) && !empty($_SESSION['last_project_id'])){
                                                    $project_id = $_SESSION['last_project_id'];
                                                }
                                                else if(isset($_SESSION['project_id']) && !empty($_SESSION['project_id'])){
                                                    $project_id = $_SESSION['project_id'];
                                                }
                                                    $sql_project_query = mysqli_query($conn, "SELECT * FROM `project` WHERE id = '$project_id'");
                                                    while($row3 = mysqli_fetch_assoc($sql_project_query)){
                                                        ?>
                                                        <input type="hidden" name="associated_project_id" value="<?=$project_id;?>">
                                                        <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="position-relative row form-group"><label for="role_name" class="col-sm-2 col-form-label">Task Catagory</label>
                                        <div class="col-sm-10">
                                            <select name="role_name" id="role_name" class="form-control">
                                                <?php
                                                    $sql_role_query = mysqli_query($conn, "SELECT * FROM `role` WHERE company_id = '$id' ORDER BY name");
                                                    while($row2 = mysqli_fetch_assoc($sql_role_query)){
                                                        echo "<option value='".$row2['name']."'>".$row2['name']."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="position-relative row form-group"><label for="task_deadline" class="col-sm-2 col-form-label">Timeline</label>
                                        <div class="col-sm-10">
                                            <input name="task_deadline" id="task_deadline" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" name="assign_task" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    unset($_SESSION['project_id']);
?>
