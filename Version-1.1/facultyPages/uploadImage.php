<?php
include "../db.php";
session_start();
$username=$_SESSION["username"];
$facultyCode=$username["code"];
if(isset($_POST["submit"]))
{
	$file_name=$_FILES["file"]["name"];
	$file_type=$_FILES["file"]["type"];
	$file_size=$_FILES["file"]["size"];
	$file_tem_loc=$_FILES["file"]["tmp_name"];
	$file_store="..\\image\\".$file_name;
	
	move_uploaded_file($file_tem_loc, $file_store);
	
	$sql="update faculty set image='".$file_name."' where code='".$facultyCode."'";
	$res=mysqli_query($mysqli,$sql);
	if(mysqli_affected_rows($mysqli)>0)
	{
		echo "upload successful";
		    $query = "select * from faculty where email_id='".$_SESSION["username"]["email_id"]."'";
    $result = mysqli_query($mysqli,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count>0)
    {
    	echo "hdadsad";
    $_SESSION["username"]=$row;
	}
	header("location:/projectApprovalSystem/facultyPages/uploadImagePage.php");
	}
	else
	{
		echo "upload failed";
	}

}

?>