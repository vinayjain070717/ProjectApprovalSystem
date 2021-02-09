<?php
// session_start();
include 'header.php';
include 'sidebar.php';
$groupCode=$_SESSION["groupCode"];
$sql="select * from student where group_code='".$groupCode."'";
$res=mysqli_query($mysqli,$sql);
$numberOfRows=mysqli_num_rows($res);
echo $numberOfRows;
?>


   <section class="content">
        <div class="container-fluid">
        	            <div class='form-row'>
                <div class="col-lg-2"></div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="padding-left: 20px;padding-right: 20px;">
                        <div class="header">
                            <h2>
                                Upload Image
                            </h2>
                            </div>
                        <div class="body">
                            <form action="/projectApprovalSystem/studentPages/uploadImage.php" id="frmFileUpload" method="post" enctype="multipart/form-data">
                                <?php
                                $i=1;
                                while($i<=$numberOfRows)
                                {
                                ?>
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <h4>Student <?php echo $i; ?></h4>
                                                <input type="file" class="form-control" id="file<?php echo $i;?>" name="file<?php echo $i;?>" placeholder="Upload File" value="Upload File">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $i++;
                                }
                                ?>
                                <div class="row">
                                    <div class="col-lg-12 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group" style="text-align: center;">
                                                <input type="submit" class="btn btn-primary" name="submit" id="submit" value="upload" style="padding-top: 10px;padding-bottom: 10px;padding-left: 30px;padding-right: 30px;font-size: 15px; ">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2"></div>
            </div>
		</div>
  </section>


<?php
include "footer.html";
?>