<?php
include 'header.php';
include 'sidebar.php';
?>
  <section class="content">
    <style type="text/css">
        .is-invalid
        {
            border:1px solid red;
        }
    </style>
    <script>
        function validate()
        {    
            var currentPassword=$("#currentPassword").val();
            var newPassword=$("#newPassword").val();
            var confirmPassword=$("#confirmPassword").val();
                $("#currentPassword").removeClass("is-invalid");
                $("#newPassword").removeClass("is-invalid");
                $("#confirmPassword").removeClass("is-invalid");
            var error=0;
            if(currentPassword.length==0)
            {
                error++;
                $("#currentPassword").addClass("is-invalid");
            }
            if(newPassword.length==0)
            {
                error++;
                $("#newPassword").addClass("is-invalid");
            }
            if(confirmPassword.length==0)
            {
                error++;
                $("#confirmPassword").addClass("is-invalid");
            }
            if(newPassword!=confirmPassword)
            {
                error++;
                $("#newPassword").addClass("is-invalid");
                $("#confirmPassword").addClass("is-invalid");
            }
            if(error==0)
            {
                return true;
            }
            return false;
        }
    </script>
        <div class="container-fluid">
<div class="col-md-2 col-lg-2"></div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="card" style="height:auto;">
                        <div class="header">
                            <h1>
                                <center>Change password</center>
                            </h1>
                        </div>
                        <div class="body">
                            <h4>Please note that when changing your password, we ask you to set yourself a secure passowrd that contain both uppercase and lowecase letters as well as numbers. This is for your own safety.</h4>
                                <br/><br/>
                                    <h3 style="text-align: center;color: red;">
                                <?php
//                                echo $_SESSION["invalidPassword"];
                                if(!empty($_SESSION["invalidPassword"]))
                                {
                                    if($_SESSION["invalidPassword"]==10)
                                    {
                                        echo "current password is incorrect";
                                    }
                                    if($_SESSION["invalidPassword"]==-1)
                                    {
                                        echo "error in updating password";
                                    }
                                    if($_SESSION["invalidPassword"]==1)
                                    {   
                                        ?>
                                    </h3>
                                        <h3 style="text-align: center;color: green;">
                                        <?php
                                        echo "password changed successfuly";
                                    }
                                    
                                }
                                ?>
                                </h3>
                                <h3>
                                    <form method="POST" action="updatePassword.php" class="signup-form" onsubmit="return validate()">
                            <table class="table">
                                <tr class="row">
                                    <td></td>
                                    <td>Current Password</td>
                                    <td><input type="text" name="currentPassword" id="currentPassword"></td>
                                </tr>
                                <tr class="row"><td></td></tr>
                                <tr class="row">
                                    <td></td>
                                    <td>New Password</td>
                                    <td><input type="text" name="newPassword" id="newPassword"></td>
                                </tr>
                                <tr class="row"><td></td></tr>
                                <tr class="row">
                                    <td></td>
                                    <td>Confirm Password</td>
                                    <td><input type="text" name="confirmPassword" id="confirmPassword"></td>
                                </tr>
                                <tr class="row">
                                    <td colspan="3" align="center"><input type="submit" class="btn btn-primary" style="padding-left: 50px;padding-right: 50px;padding-top: 10px;padding-bottom: 10px;font-size: 30px;"></td>
                                </tr>
                            </table>
                        </form>
                        </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2"></div>
            </div>
        </section>
<?php
include "footer.html";
?>