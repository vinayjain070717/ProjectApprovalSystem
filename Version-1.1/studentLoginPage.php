<?php
include "db.php";
session_start();
if(isset($_SESSION["currentEmail"]) && !empty($_SESSION["currentEmail"]))
{
$currentEmail=$_SESSION["currentEmail"];
$sql="select is_email_verified from student_group where email_id='".$currentEmail."'";
$res=mysqli_query($mysqli,$sql);
if(mysqli_num_rows($res)==0)
{
    header("location:/projectApprovalSystem/studentR.html");
    return;
}
while($row=mysqli_fetch_array($res))
{
    $isEmailVerified=$row["is_email_verified"];
    break;
}
if($isEmailVerified==="N")
{
    header("location:/projectApprovalSystem/emailVerification.php");
    return;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Approval System</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="/projectApprovalSystem/assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <link href="/projectApprovalSystem/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main css -->
    <link rel="stylesheet" href="/projectApprovalSystem/assets/registration_css/style.css">
    <style type="text/css">
        .invalid
        {
            border:1px solid #e62727;
        }

    </style>
    <script type="text/javascript">
        function formValidation()
        {
        console.log("hey");
        var groupId=$("#groupId").val();
        var password=$("#password").val();


        var errors=0;
        $("#groupId").removeClass("invalid");
        $("#password").removeClass("invalid");
        if(groupId==0)
             {
                errors++;
                $("#groupId").addClass("invalid");
             }
        if(password==0)
             {
                errors++;
                $("#password").addClass("invalid");
             }

             if(errors)
             {
                return false;
             }

            return true;
        }
    </script>

</head>
<body>
    <div class="main">
<video  playsinline autoplay muted loop style="  position: fixed;right: 0;bottom: 0;min-width: 100%;min-height: 100%;">
        <source src="1.mp4" type="video/mp4">
  </video>
        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="login-container">
                <div class="signup-content">
                    <form method="POST" action="/projectApprovalSystem/studentLogin.php" id="signup-form" class="signup-form" onsubmit="return formValidation()" >
                        <div class="form-title">
                        <h1 style='text-align: center;'>Login</h1>
                        <h6 style="text-align: center;color: red;">
                            <?php
                            if(!empty($_SESSION["invalid"]))
                            {
                                echo $_SESSION["invalid"];
                            }
                            ?>
                        </h6>
                    </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="emailId" id="emailId" placeholder="Email Id"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign In"/>
                        </div>
                    </form>
                    <p style='text-align: center;color: black;'>
                        Don't have account ? <a href="/projectApprovalSystem/studentRegistrationPage.html" class="loginhere-link">Register here</a>
                        <br>
                        Email Not Verified ? <a href="/projectApprovalSystem/emailVerificationPage.php" class="loginhere-link">Verify Here </a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="/projectApprovalSystem/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/projectApprovalSystem/assets/js/main.js"></script>
</body>
</html>
