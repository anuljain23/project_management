<?php
    
    require 'auth.php';
	include 'header.php';
	$id = $_SESSION['id'];
	$view_employee_query = mysqli_query($conn, "SELECT * FROM `employee` WHERE company_id = '$id' ORDER BY name");
	
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
                                        View Employee
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                    
                    
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
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $i = 1;
                                                    while($row = mysqli_fetch_assoc($view_employee_query)){
                                                        echo "  <tr>
                                                                    <th scope='row'>".$i."</th>
                                                                    <td class='cell-pad'>".$row['name']."</td>
                                                                    <td class='cell-pad'>".$row['email']."</td>
                                                                    <td class='cell-pad'>".$row['contact_no']."</td>
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











<?php

	include 'footer.php';

?>