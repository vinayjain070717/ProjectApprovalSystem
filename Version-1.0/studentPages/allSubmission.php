<?php
//session_start();
include 'header.php';
include 'sidebar.php';
$groupCode=$_SESSION["groupCode"];
$sql="select * from student_file where group_code='".$groupCode."'";
$res=mysqli_query($mysqli,$sql);

?>


   <section class="content">
        <div class="container-fluid">
        	            <div class='form-row'>
                <div class="col-lg-2"></div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="padding-left: 20px;padding-right: 20px;">
                        <div class="header">
                            <h2 style="text-align: center;">
                                All Submissions
                            </h2>
                            </div>
                        <div class="body">
                            <table class="table" style="border: 1px solid black;">
                                <thead>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Comment</th>
                                    <th>Date Of Creation</th>
                                    <th>Time Of Creation</th>
                                    <th>File Name</th>
                                </thead>
                                <tbody>
                                <?php
                                while($row=mysqli_fetch_array($res))
                                {
                                ?>
                                    <tr>
                                        <td><?php echo $row["code"];?></td>
                                        <td><?php echo $row["title"];?></td>
                                        <td><?php echo $row["comment"];?></td>
                                        <td><?php echo $row["date_of_creation"];?></td>
                                        <td><?php echo $row["time_of_creation"];?></td>
                                        <td><?php echo $row["file"];?></td>
                                    </tr>
                                    <?php
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
include "footer.html";
?>