<?php
include "../db.php";
session_start();
    echo "good";
    $currentPassword=$_POST['currentPassword'];
    $newPassword=$_POST['newPassword'];
    $confirmPassword=$_POST["confirmPassword"];

    echo $currentPassword;
    $currentEmail=$_SESSION["username"]["email_id"];
    $sql="select * from faculty where password='".$currentPassword."' and email_id='".$currentEmail."'";
    echo $sql;
    $res=mysqli_query($mysqli,$sql);
    echo mysqli_num_rows($res);
    if(mysqli_num_rows($res)==0)
    {
        $_SESSION["invalidPassword"]=10;
        header("location:/projectApprovalSystem/facultyPages/changePassword.php");
        return;
    }
    $sql="update faculty set password='".$newPassword."' where email_id='".$currentEmail."'";
    $res=mysqli_query($mysqli,$sql);
    if(mysqli_affected_rows($mysqli)==0)
    {
        $_SESSION["invalidPassword"]=-1;
        header("location:/projectApprovalSystem/facultyPages/changePassword.php");
    }
    else
    {
        $_SESSION["invalidPassword"]=1;
                header("location:/projectApprovalSystem/facultyPages/changePassword.php");
    }
?>