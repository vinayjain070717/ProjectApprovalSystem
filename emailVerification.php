<?php
include 'db.php';
session_start();
if(!isset($_SESSION["verificationToken"]))
{
	$_SESSION["invalidToken"]="session expire please click on refresh button";
	header("location:/projectApprovalSystem/emailVerificationPage.php");
}
$token=$_SESSION["verificationToken"];
$emailVerificationCode=$_POST["emailVerificationCode"];
$currentEmail=$_SESSION["currentEmail"];

//echo $token;
//echo $emailVerificationCode;
if($token==$emailVerificationCode)
{
	echo "1";
	$sql="update student_group set is_email_verified='Y' where email_id='".$currentEmail."'";
	if(mysqli_query($mysqli,$sql)===TRUE)
	{
		header("location:studentLoginPage.php");
	}
}
else
{
	$_SESSION["invalidToken"]="Invalid Verification Code. Email Not verified";
	echo "email not verified";
	header("location:/projectApprovalSystem/emailVerificationPage.php");
}



?>