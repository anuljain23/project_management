<?php

	require 'auth.php';
	include 'header.php';
	$id = $_SESSION['id'];
    
    if(isset($_SESSION['last_project_id']) && !empty($_SESSION['last_project_id'])){
        $project_id = $_SESSION['last_project_id'];
    }
    else if(isset($_SESSION['project_id']) && !empty($_SESSION['project_id'])){
        $project_id = $_SESSION['project_id'];
    }
    $sql_project_query = mysqli_query($conn, "SELECT `name` FROM `project` WHERE id = '$project_id'");
    if($sql_project_query){
        $row2 = mysqli_fetch_assoc($sql_project_query);
    }
    $sql_team_member_query = mysqli_query($conn, "SELECT * FROM `team_members` WHERE project_id = '$project_id'");
    $num_row_team = mysqli_num_rows($sql_team_member_query);
    if($sql_team_member_query){
        $row = mysqli_fetch_assoc($sql_team_member_query);
        $members = unserialize($row['members']);
    }
                                        
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
                                        Assign Task
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
                        
                       <?php
                            if(!empty($project_id)){
                        ?>
                            <div class="tab-content">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title"><?=$row2['name'];?></h5>
                                        <form action="action.php" method="POST">
                                            <input type="hidden" name="project_id" value=<?=$project_id;?>>
                                            <?php
                                                if($num_row_team<=0){
                                            ?>
                                                    <div class="card-body">
                                                        <!--<h5 class="card-title">Project Not selected</h5>-->
                                                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                            <h5>Team not created</h5>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            You haven't created a team for this project. Please create a team first!
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                                    foreach($members as $member){
                                                        $sql_query = mysqli_query($conn, "SELECT * FROM `employee` WHERE id = '$member'");
                                                        while($row3 = mysqli_fetch_assoc($sql_query)){
                                                            $sql_role_query = mysqli_query($conn, "SELECT * FROM `role` WHERE company_id = '$id'");
                                                ?>          
                                                            <div class="main-card mb-3 card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><?=$row3['name'];?></h5>
                                                                    <div class="position-relative form-group">
                                                                        <div>
                                                                            <?php
                                                                                while($row4 = mysqli_fetch_assoc($sql_role_query)){
                                                                            ?>
                                                                                    <div class="custom-checkbox custom-control custom-control-inline padded" id="<?=$row3['id']?>">
                                                                                        <input type="checkbox" id="<?php echo $row3['id']."_".$row4['id'];?>" class="custom-control-input" name="member_role[<?php echo $selected;?>][]" value="<?php echo $row1['id'];?>">                                                   
                                                                                        <label class="custom-control-label" for="<?php echo $row3['id']."_".$row4['id'];?>">
                                                                                            <?=$row4['name'];?>
                                                                                        </label>
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
                                                    }
                                            ?>
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <?php
                                                        if(!empty($members)){
                                                    ?>
                                                        <input type="submit"  name="assign_role" class="btn btn-secondary" value="Assign Roles">
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }else{
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







                                        <!--<form action="action.php" method="POST">-->
                                            
                                            
                                            <?php
                                                // echo "<input type='hidden' name='project_id' value='".$_POST['project']."'>";
                                                // foreach($_POST['member_id'] as $selected_id){
                                                //     echo "<input type='hidden' name='member_ids[]' value='".$selected_id."'>";
                                                // }
                                            
                                                // foreach($_POST['member_id'] as $selected){
                                                //     $sql_query = mysqli_query($conn, "SELECT * FROM `employee` WHERE id = '$selected' AND company_id = '$id' ORDER BY name");
                                                //     while($row = mysqli_fetch_assoc($sql_query)){
                                                //         $sql_role_query = mysqli_query($conn, "SELECT * FROM `role` WHERE company_id = '$id' ORDER BY name");
                                            ?>
                                                        <!--<div class="main-card mb-3 card">-->
                                                        <!--    <div class="card-body">-->
                                                        <!--        <h5 class="card-title"><?//=$row['name'];?></h5>-->
                                                        <!--        <div class="position-relative form-group">-->
                                                        <!--            <div>-->
                                                                        <?php
                                                                            // while($row1 = mysqli_fetch_assoc($sql_role_query)){
                                                                        ?>
                                                                            <!--<div class="custom-checkbox custom-control custom-control-inline padded" id="-->
                                                                            <?//=$row['id']?>">
                                                                                <!--<input type="checkbox" id="<?php //echo $row['id']."_".$row1['id'];?>" class="custom-control-input" -->
                                                                                        <!--name="member_role[<?php //echo $selected;?>][]" value="<?php //echo $row1['id'];?>">                                                   -->
                                                                                <!--<label class="custom-control-label" for="<?php //echo $row['id']."_".$row1['id'];?>">-->
                                                                                    <?//=$row1['name'];?>
                                                                            <!--    </label>-->
                                                                            <!--</div>-->
                                                                        <?php
                                                                            // }
                                                                        ?>
                                                        <!--            </div>-->
                                                        <!--        </div>-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                    <?php
                                                //     }
                                                // }
                                            ?>
                                            
                                            <!--<div class="position-relative row form-check">-->
                                            <!--    <div class="col-sm-10 offset-sm-2">-->
                                            <!--        <input type="submit" -->
                                                                        <?php
                                                                                // if(!isset($_POST['team_members'])){
                                                                                //     echo "disabled";
                                                                                // }
                                                                        ?>
                                                            <!--name="assign_role" class="btn btn-secondary" value="Assign Roles">-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</form>-->


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
                            <input type="submit" class="btn btn-primary" name="select_project_assign" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>


<?php
    unset($_SESSION['project_id']);
?>


