<?php
include "../db.php";
session_start();
// $username=$_SESSION["username"];
// $facultyCode=$username["code"];
if(isset($_POST["submit"]))
{
	$groupCode=$_SESSION["groupCode"];
	$sql="select code from student where group_code=$groupCode";
//	echo $sql;
	$res=mysqli_query($mysqli,$sql);
	$i=1;
	while($row=mysqli_fetch_array($res))
	{
	$file_name=$_FILES["file".$i]["name"];
//	echo $file_name;
	$file_type=$_FILES["file".$i]["type"];
	$file_size=$_FILES["file".$i]["size"];
	$file_tem_loc=$_FILES["file".$i]["tmp_name"];
	$file_store="../image/".$file_name;
	
	//move_uploaded_file($file_tem_loc, $file_store);
	copy($file_tem_loc, $file_store);
	$sql="update student set profile_picture='".$file_name."' where code='".$row["code"]."'";
	$res2=mysqli_query($mysqli,$sql);
	if(mysqli_affected_rows($mysqli)>0)
	{
		echo "upload successful";
	}
	else
	{
		echo "upload unsuccessful";
	}
	// $sql="update student set image='".$file_name."' where code='".$facultyCode."'";
	// $res=mysqli_query($mysqli,$sql);
	// if(mysqli_affected_rows($mysqli)>0)
	// {
	// 	echo "upload successful";
	// 	    $query = "select * from faculty where email_id='".$_SESSION["username"]["email_id"]."'";
 //    $result = mysqli_query($mysqli,$query);
 //    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 //    $count=mysqli_num_rows($result);
 //    if($count>0)
 //    {
 //    	echo "hdadsad";
 //    $_SESSION["username"]=$row;
	// }
	// header("location:/projectApprovalSystem/facultyPages/uploadImagePage.php");
	// }
	// else
	// {
	// 	echo "upload failed";
	// }
	$i=$i+1;
	}
	header("location:/projectApprovalSystem/studentPages/uploadImagePage.php");

}

?>