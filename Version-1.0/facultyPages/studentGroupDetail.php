<?php 
include "../db.php";
include 'header.php';
include 'sidebar.php';

// $groupCode=$_SESSION["groupCode"];
// $sql="select * from student where group_code='".$groupCode."'";
// $res=mysqli_query($mysqli,$sql);
//print_r($row["mobile_number"]);
$username=$_SESSION["username"];
$facultyCode=$username["code"];
$sql="select * from student_group where faculty_code='".$facultyCode."'";
$res=mysqli_query($mysqli,$sql);
$numberOfRows=mysqli_num_rows($res);
// print_r($numberOfRows);
// print_r($row);

?>
  <section class="content">
        <div class="container-fluid">
            <div class='form-row'>
                <?php
                $i=1;
                while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
                {
                ?>
                <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                    <div class="card" style="height:auto;">
                        <div class="header bg-blue-grey" style="text-align: center;">
                            <h3>GROUP <?php echo $i; ?></h3>
                        </div>
                        <div class="body">
                        	<table class="table borderless">
                        		<tr class="table-primary">
                        			<td>Group Code</td>
                        			<td>
                                    <?php
                                    print_r($row["code"]);
                                    ?>         
                                    </td>
                        		</tr>
                                <tr class="table-primary">
                                    <td>Email Id</td>
                                    <td>
                                    <?php
                                    print_r($row["email_id"]);
                                    ?>         
                                    </td>
                                </tr>
                                <tr class="table-primary">
                                    <td>Number Of Student in Group</td>
                                    <td>
                                    <?php
                                    print_r($row["number_of_student"]);
                                    ?>         
                                    </td>
                                </tr>

                        	</table>
                        </div>
                    </div>
                </div>
                <?php
                $i=$i+1;
                }
                ?>
			</div>
		</div>
  </section>

<?php
include 'footer.html';
?>