<?php
include 'db.php';
session_start();
unset($_SESSION["invalid"]);
if(isset($_POST['submit']))
  {
    $email_id=$_POST['emailId'];
    $password=$_POST['password'];
   //echo $query;
    //;exit;
    $query="select * from student_group where email_id='".$email_id."' AND password='".$password."'";
    $result = mysqli_query($mysqli,$query);
    $count=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    print_r($row);
    echo $row["code"];
    $_SESSION["groupCode"]=$row["code"];

    if($count==1)
    {
    $_SESSION["username"]=$email_id;    
    header('location:/projectApprovalSystem/studentPages/homePage.php');
    } 
    else
    {
    $_SESSION["invalid"]="Invalid Credentials";
    header('location:/projectApprovalSystem/studentLoginPage.php');    
}
}
else
{
    header("location:/projectApprovalSystem/studentLoginPage.php");
}
?>
