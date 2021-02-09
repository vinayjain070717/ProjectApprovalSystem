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
                            <h2 style="text-align: center;">
                                SUBMISSION FORM
                            </h2>
                            </div>
                        <div class="body">
                            <form action="/projectApprovalSystem/studentPages/submission.php" id="frmFileUpload" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-3">
                                  <h4>File Type</h4>
                              </div>
                              <div class="col-md-9">
                                    <select name="fileType" class="show-tick">
                                        <option>File Type</option>
                                        <option value='Synopsis'>Synopsis</option>
                                        <option value="Srs">Srs</option>
                                        <option value="Project_Report">Project Report</option>
                                    </select>
                                </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="comment" name="comment" placeholder="Comment">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                <input type="submit" class="btn btn-primary" name="submit" id="submit" value="submit" style="padding-top: 10px;padding-bottom: 10px;padding-left: 30px;padding-right: 30px;font-size: 15px; ">
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