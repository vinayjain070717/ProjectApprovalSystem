<?php 
include "../db.php";
// session_start();
// exit;
include 'header.php';
include 'sidebar.php';


$abc=$_SESSION["username"];
$sql="select s.* from student_group as s inner join faculty as f where f.code=s.faculty_code and s.faculty_code='".$abc["code"]."'";
$res=mysqli_query($mysqli,$sql);
// while($row=mysqli_fetch_array($res))
// {
// 	//print_r($row["code"]);
// 	$sql2="select * from student_file where group_code='".$row["code"]."'";
// 	$res2=mysqli_query($mysqli,$sql2);
// 	// while($row2=mysqli_fetch_array($res2))
// 	// {
// 	// 	print_r($row2);
// 	// }
// }

?>

  <section class="content">
        <div class="container-fluid">
        <div class='form-row'>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="padding-left: 20px;padding-right: 20px;">
                        <div class="header">
                            <h2 style="text-align: center;">
                                All Submissions
                            </h2>
                            </div>
                        <div class="body">
                        	<table class="table">
                        		<thead>
                        			<th>S.No</th>
                        			<th>Group Email</th>
                        			<th>Title</th>
                        			<th>Comment</th>
                        			<th >Date of Creation</th>
                        			<th >Time Of Creation</th>
                        			<th>File Type</th>
                        			<th class="col-lg-1">File Name</th>
                        			<th class="col-lg-2">Approval</th>
                        		</thead>
								<tbody>
                                <?php
                                while($row=mysqli_fetch_array($res))
								{
									$i=1;
									$sql2="select * from student_file where group_code='".$row["code"]."'";
									$res2=mysqli_query($mysqli,$sql2);
                                while($row2=mysqli_fetch_array($res2))
                                {
                                ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $row["email_id"];?></td>
                                        <td><?php echo $row2["title"];?></td>
                                        <td><?php echo $row2["comment"];?></td>
                                        <td><?php echo $row2["date_of_creation"];?></td>
                                        <td><?php echo $row2["time_of_creation"];?></td>
                                        <td><?php echo $row2["file_type"];?></td>
                                        <td><a href="/projectApprovalSystem/facultyPages/downloadFile.php?filename=<?php echo $row2["file"]; ?>"><?php echo $row2["file"];?></a></td>
                                        <td><button class="btn btn-success" type="button" name="approve" >Approve</button>
                                        	&nbsp;
                                        	<button class="btn btn-danger" type="button">Reject</button>
                                        </td>
                                    </tr>
                                    <?php
                                    $i=$i+1;
                                }
                            }
                                    ?>
                                </tbody>
                              	</table>

                        </div>
                        </div>
                        </div>
                        </div>        	
		</div>
  </section>

<?php
include 'footer.html';
?>