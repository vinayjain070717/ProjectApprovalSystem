<?php
include 'header.php';
include 'sidebar.php';
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
                            <form action="/projectApprovalSystem/facultyPages/uploadImage.php" id="frmFileUpload" method="post" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" class="form-control" id="file" name="file" placeholder="Upload File" value="Upload File">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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