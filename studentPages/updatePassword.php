<?php
session_start();
    echo "good";
    $currentPassword=$_POST['currentPassword'];
    $newPassword=$_POST['newPassword'];
    $confirmPassword=$_POST["confirmPassword"];

    echo $currentPassword;
    $currentEmail=$_SESSION["username"];
    $sql="select * from student_group where password='".$currentPassword."' and email_id='".$currentEmail."'";
    echo $sql;
    $res=mysqli_query($mysqli,$sql);
    echo mysqli_num_rows($res);
    if(mysqli_num_rows($res)==0)
    {
        $_SESSION["invalidPassword"]=10;
        header("location:/projectApprovalSystem/studentPages/changePassword.php");
        return;
    }
    $sql="update student_group set password='".$newPassword."' where email_id='".$currentEmail."'";
    $res=mysqli_query($mysqli,$sql);
    if(mysqli_affected_rows($mysqli)==0)
    {
        $_SESSION["invalidPassword"]=-1;
        header("location:/projectApprovalSystem/studentPages/changePassword.php");
    }
    else
    {
        $_SESSION["invalidPassword"]=1;
                header("location:/projectApprovalSystem/studentPages/changePassword.php");
    }
?>