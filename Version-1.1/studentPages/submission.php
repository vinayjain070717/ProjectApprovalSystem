<?php
include "../db.php";
session_start();

if(isset($_POST["submit"]))
{
	$title=$_POST["title"];
	$file_name=$_FILES["file"]["name"];
	$file_type=$_FILES["file"]["type"];
	$file_size=$_FILES["file"]["size"];
	$file_tem_loc=$_FILES["file"]["tmp_name"];
	$file_store="../upload/".$file_name;
	$selectValue=$_POST["fileType"];
	$comment=$_POST["comment"];
	$path=getcwd();
	// echo $path;
	// echo $comment;
	// echo $selectValue;
	// echo $file_store;
	// // echo $title;
	// echo $file_name;
	// echo $file_store;
	$groupCode=$_SESSION["groupCode"];
	copy($file_tem_loc, $file_store);
	date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$sql="insert into student_file (file,comment,title,date_of_creation,time_of_creation,file_type,group_code) values('".$file_name."','".$comment."','".$title."','".$date."','".$time."','".$selectValue."','".$groupCode."')";
	echo $sql;
	$res=mysqli_query($mysqli,$sql);
	$affectedRows=mysqli_affected_rows($mysqli);
	if($affectedRows>=1)
	{
		header("location:/projectApprovalSystem/studentPages/submissionPage.php");
	}
	else
	{
		echo "unable to upload file";
	}
}

?>