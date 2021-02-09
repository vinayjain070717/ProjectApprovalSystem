<?php 
include 'header.php';
include 'sidebar.php';
$groupCode=$_SESSION["groupCode"];

$sql="select f.* from faculty as f inner join student_group as sg on sg.faculty_code=f.code and sg.code='".$groupCode."'";
$res=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($res,MYSQLI_ASSOC);

?>

  <section class="content">
        <div class="container-fluid">
            <div class='form-row'>
                <div class="col-lg-2"></div>
            	<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="height:auto;">
                        <div class="header bg-blue-grey" style="text-align: center;">
                            <img src="/projectApprovalSystem/image/<?php echo $row["image"]; ?>" width="120" height="150" style="border: 5px solid black" />
                                <br/>
                        </div>
                        <div class="body">
                            <table class="table borderless" style="text-align: center;">
                                <tr class="table-primary">
                                    <td>First Name</td>
                                    <td>
                                    <?php
                                    echo $row["first_name"];
                                    ?>
                                    </td>
                                </tr>
                                <tr class="table-secondary">
                                    <td>Last Name</td>
                                    <td>
                                        <?php
                                        echo $row["last_name"];
                                        ?>
                                    </td>
                                </tr>
                                <tr class="table-success">                             
                                    <td>mobile number</td>
                                    <td>
                                        <?php
                                        echo $row["mobile_number"];
                                        ?>                                        
                                    </td>
                                </tr>
                                <tr class="table-success">                             
                                    <td>Email Id</td>
                                    <td>
                                        <?php
                                        echo $row["email_id"];
                                        ?>                                        
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>

			</div>
		</div>
  </section>

<?php
include 'footer.html';
?>