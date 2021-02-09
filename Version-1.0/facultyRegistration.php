<?php 
session_start();
$_SESSION['message']='';
$mysqli = new mysqli("127.0.0.1", "root", "root", "project");
if ($_SERVER['REQUEST_METHOD']=='POST') 
{
   
    $first_name=$mysqli->real_escape_string($_POST['first_name']);
    $last_name=$mysqli->real_escape_string($_POST['last_name']);
    $email_id=$mysqli->real_escape_string($_POST['email_id']);
    $mobileNumber=$mysqli->real_escape_string($_POST["mobileNumber"]);
    $password=($_POST['password']);
    $password_key="afafadfadfads";
    
            $_SESSION['first_name']=$first_name;
          
            $sql="INSERT into faculty(first_name,last_name,email_id,password,password_key,mobile_number) VALUES('".$first_name."','".$last_name."','".$email_id."','".$password."','".$password_key."',$mobileNumber)";
            echo $sql;
            // if($mysqli->query($sql)==true)
            // {
            //     $_SESSION['message']="success";
            //     header("location:FacultyL.php");
            // }
            // else
            // {
            //     $_SESSION['message']="failed";
            // 
            if($mysqli->query($sql)===TRUE)
            {
                $_SESSION['message']="success";
                header("location:/projectApprovalSystem/facultyLogin.php");
            }
            else
            {
                $_SESSION['message']=$mysqli->error;
            }
     
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="/projectApprovalSystem/fonts/material-icon/css/material-design-iconic-font.min.css">

    <link href="/projectApprovalSystem/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="/projectApprovalSystem/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Main css -->
    <link rel="stylesheet" href="/projectApprovalSystem/assets/registration_css/style.css">

</head>
<body>

    <div class="main">

        <section class="signup">
<video  playsinline autoplay muted loop style="  position: fixed;right: 0;bottom: 0;min-width: 100%;min-height: 100%;">
        <source src="1.mp4" type="video/mp4">
  </video>
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="login-container">
                <div class="signup-content">
                     <form action="/projectApprovalSystem/facultyRegistration.php" method="post">
                            <div class="alert alert-error"><?= $_SESSION['message']?></div>
                        <div class="form-title">
                        <h1 style='text-align: center;'>REGISTRATION!!</h1>
                    </div>
                    
                        <div class="form-group">
                        	<div class="form-row">
                        		<div class='col-md-6'>
             <input type="text" class="form-input" name="first_name" id="first_name" placeholder="First Name" required /><span style="color:red"></span>
                        </div>
                        <div class='col-md-6'>
                            <input type="text" class="form-input" name="last_name" id="last_name" placeholder="Last Name" required/><span style="color:red"></span>
                        </div>
                    </div>
                </div>
             <div class="form-group">
                            <input type="text" class="form-input" name="email_id" id="email_id" placeholder="Email Id"/ required><span style="color:red"></span>
                        </div>
             <div class="form-group">
                            <input type="number" class="form-input" name="mobileNumber" id="mobileNumber" placeholder="Mobile Number" required/><span style="color:red"></span>
                        </div>
              <div class='form-row'>     
             <div class="form-group col-md-6">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password" required/><span style="color:red"></span>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
             <div class="form-group col-md-6">
                            <input type="password" class="form-input" name="confirmPassword" id="confirmPassword" placeholder="confimPassword" required/><span style="color:red"></span>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                    </div>
                         
                   
             <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a class="loginhere-link" href="/projectApprovalSystem/terms.html"> Terms and condition</a>   </label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
        </form>
        <p>Already Registered.<a class="loginhere-link" href="/projectApprovalSystem/facultyLogin.php">Login here</a></p>
</div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="/projectApprovalSystem/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/projectApprovalSystem/assets/js/main.js"></script>
</body>
</html>