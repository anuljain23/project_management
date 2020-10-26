<?php

	require 'auth.php';
	include 'header.php';
	$id = $_SESSION['id'];
	$sql_team_query = mysqli_query($conn, "SELECT * FROM `team_members` WHERE company_id = '$id'");

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
                                        View Teams
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <div class="d-inline-block dropdown">
                                        <form action="create_team.php" method="POST">
                                            <button type="submit" class="mb-2 mr-2 btn btn-success">
                                                    <i class="fas fa-users size-icon"></i>
                                                <span class="title-position">Create Team</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                         <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Teams</h5>
                                        <div class="table-responsive">
                                            <table class="mb-0 table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Team Members</th>
                                                    <th>Project</th>
                                                    <th>Specifics</th>
                                                    <th>Delivery Date<th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $i = 1;
                                                    while($row = mysqli_fetch_assoc($sql_team_query)){
                                                        $members = unserialize($row['members']);
                                                        $cur_project_id = $row['project_id'];
                                                        $sql_project_query = mysqli_query($conn, "SELECT * FROM `project` WHERE id = '$cur_project_id'");           
                                                        while($row2 = mysqli_fetch_assoc($sql_project_query)){
                                                            echo "  <tr>
                                                                        <th scope='row'>".$i."</th>
                                                                        <td class='cell-pad'>";
                                                                        
                                                                        foreach($members as $member){
                                                                            $sql_emp_query = mysqli_query($conn, "SELECT `name` FROM `employee` WHERE id = '$member'");           
                                                                            while($row3 = mysqli_fetch_assoc($sql_emp_query)){
                                                                                echo "<strong>".$row3['name']."</strong><br><br>";
                                                                            }
                                                                        }
                                                                        
                                                                        echo "</td>
                                                                        <td class='cell-pad'>".$row2['name']."</td>
                                                                        <td class='cell-pad'>".$row2['specifics']."</td>
                                                                        <td class='cell-pad'>".$row2['estimated_delivery_date']."</td>
                                                                    </tr>";
                                                        }
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