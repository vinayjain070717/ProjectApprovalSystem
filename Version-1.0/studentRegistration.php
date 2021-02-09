<?php
include 'db.php';
session_start();
$firstStudentFirstName=$_POST['firstStudentFirstName'];
$firstStudentLastName=$_POST['firstStudentLastName'];
$firstStudentMobileNumber=$_POST['firstStudentMobileNumber'];
$firstStudentRollNumber=$_POST['firstStudentRollNumber'];

if(isset($_POST['secondStudentCheckBox']))
{
$secondStudentFirstName=$_POST['secondStudentFirstName'];
$secondStudentLastName=$_POST['secondStudentLastName'];
$secondStudentMobileNumber=$_POST['secondStudentMobileNumber'];
$secondStudentRollNumber=$_POST['secondStudentRollNumber'];
}
if(isset($_POST['thirdStudentCheckBox']))
{
$thirdStudentFirstName=$_POST['thirdStudentFirstName'];
$thirdStudentLastName=$_POST['thirdStudentLastName'];
$thirdStudentMobileNumber=$_POST['thirdStudentMobileNumber'];
$thirdStudentRollNumber=$_POST['thirdStudentRollNumber'];
}
if(isset($_POST['fourthStudentCheckBox']))
{
$fourthStudentFirstName=$_POST['fourthStudentFirstName'];
$fourthStudentLastName=$_POST['fourthStudentLastName'];
$fourthStudentMobileNumber=$_POST['fourthStudentMobileNumber'];
$fourthStudentRollNumber=$_POST['fourthStudentRollNumber'];
}
//echo "1";
$year=$_POST['year'];
$semester=$_POST['semester'];
$section=$_POST['section'];
$department=$_POST['department'];
$emailId=$_POST['emailId'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$_SESSION["currentEmail"]=$emailId;
if(isset($_POST['submit']))
{
//echo "3";

	$k="select * from student_group where email_id='".$emailId."'";
	$resss=mysqli_query($mysqli,$k);
//	print_r($resss);
	if(mysqli_num_rows($resss)>0)
	{
//		echo "4";
		$sql="select is_email_verified from student_group where email_id='".$emailId."'";
		$res=mysqli_query($mysqli,$sql);
		if(mysqli_num_rows($resss)==0)
		{
		    header("location:studentRegistrationPage.html");
		    return;
		}
		while($row=mysqli_fetch_array($res))
		{
		    $isEmailVerified=$row["is_email_verified"];
		    break;
		}
		if($isEmailVerified==="N")
		{
		    header("location:emailVerification.php");
		    return;
		}
		else
		{
			header('location:studentLogin.php');
			return;
		}	
	}




echo "5";
	$numberOfStudents=0;
	if($_POST["firstStudentCheckBox"])
	{
		$numberOfStudents=$numberOfStudents+1;
	}
	if(isset($_POST["secondStudentCheckBox"]))
	{
		$numberOfStudents=$numberOfStudents+1;
	}
	if(isset($_POST["thirdStudentCheckBox"]))
	{
		$numberOfStudents=$numberOfStudents+1;
	}
    if(isset($_POST['fourthStudentCheckBox']))
	{
		$numberOfStudents=$numberOfStudents+1;
	}
	echo "6";
	//echo $numberOfStudents;
	$numberOfRowsInStudentGroup=0;
	$numberOfRowsInFaculty=0;
	$k="select * from faculty";
	$result=mysqli_query($mysqli,$k);
	echo "A";
	if(!$result)
	{
		echo "b";
		echo "no rows";
	}
	else
	{
		echo "C";
		echo mysqli_num_rows($result);
		$numberOfRowsInFaculty=mysqli_num_rows($result);
	}
	echo "D";
	$k="select * from student_group";
	$result=mysqli_query($mysqli,$k);
	if(!$result)
	{
		echo "E";
		echo "no rows";
	}
	else
	{
		echo "F";
	echo mysqli_num_rows($result)."\n";
	$numberOfRowsInStudentGroup=mysqli_num_rows($result);
	}

echo $numberOfRowsInFaculty;
echo $numberOfRowsInStudentGroup;
echo "good";
$a=$numberOfRowsInStudentGroup%$numberOfRowsInFaculty;
echo $a;
$sql="select code from faculty LIMIT $a,1";
$res=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($res);
$groupCode=$row["code"];

	$s="insert into student_group(email_id,password,number_of_student,is_email_verified,faculty_code) values('".$emailId."','".$password."','".$numberOfStudents."','N','".$groupCode."')";
	echo $s;
//	$res=$mysqli->query($s);
	if($mysqli->query($s))
	{
		echo "student group added";
	}
	else
	{
		echo "Error : ".$mysqli->error;
	}
	$m="SELECT `code` FROM `student_group` WHERE email_id='".$emailId."'";
	$res=mysqli_query($mysqli,$m);
	while($row=mysqli_fetch_array($res))
	{
		echo "8";
		//echo $row['code'];
		$groupCode=$row['code'];
		$passwordKey="ritik";
		if($numberOfStudents==4)
		{
			echo "4 vala chala";
			$p="insert into student(first_name,last_name,roll_number,mobile_number,year,section,semester,department,group_code) values('".$firstStudentFirstName."','".$firstStudentLastName."','".$firstStudentRollNumber."','".$firstStudentMobileNumber."','".$year."','".$section."','".$semester."','".$department."','".$groupCode."')";
			//echo $p;
			$ress=mysqli_query($mysqli,$p);
			//print_r($ress);
			$p="insert into student(first_name,last_name,roll_number,mobile_number,year,section,semester,department,group_code) values('".$secondStudentFirstName."','".$secondStudentLastName."','".$secondStudentRollNumber."','".$secondStudentMobileNumber."','".$year."','".$section."','".$semester."','".$department."','".$groupCode."')";
			$ress=mysqli_query($mysqli,$p);
			$p="insert into student(first_name,last_name,roll_number,mobile_number,year,section,semester,department,group_code) values('".$thirdStudentFirstName."','".$thirdStudentLastName."','".$thirdStudentRollNumber."','".$thirdStudentMobileNumber."','".$year."','".$section."','".$semester."','".$department."','".$groupCode."')";
			$ress=mysqli_query($mysqli,$p);
			$p="insert into student(first_name,last_name,roll_number,mobile_number,year,section,semester,department,group_code) values('".$fourthStudentFirstName."','".$fourthStudentLastName."','".$fourthStudentRollNumber."','".$fourthStudentMobileNumber."','".$year."','".$section."','".$semester."','".$department."','".$groupCode."')";
			$ress=mysqli_query($mysqli,$p);
			if($ress==TRUE) echo "student added";
			else
			{ 
				$error=TRUE;
				echo "Error : ".$mysqli->error;
			}
			if($error==TRUE) header("location:studentRegistrationPage.html");
			else header("location:/projectApprovalSystem/phpmailer/sendEmail.php");
		}
		if($numberOfStudents==3)
		{
			echo "3 vala chala";

			$p="insert into student(first_name,last_name,roll_number,mobile_number,year,section,semester,department,group_code) values('".$firstStudentFirstName."','".$firstStudentLastName."','".$firstStudentRollNumber."','".$firstStudentMobileNumber."','".$year."','".$section."','".$semester."','".$department."','".$groupCode."')";
			//echo $p;
			$ress=mysqli_query($mysqli,$p);
			//print_r($ress);
			$p="insert into student(first_name,last_name,roll_number,mobile_number,year,section,semester,department,group_code) values('".$secondStudentFirstName."','".$secondStudentLastName."','".$secondStudentRollNumber."','".$secondStudentMobileNumber."','".$year."','".$section."','".$semester."','".$department."','".$groupCode."')";
			$ress=mysqli_query($mysqli,$p);
			$p="insert into student(first_name,last_name,roll_number,mobile_number,year,section,semester,department,group_code) values('".$thirdStudentFirstName."','".$thirdStudentLastName."','".$thirdStudentRollNumber."','".$thirdStudentMobileNumber."','".$year."','".$section."','".$semester."','".$department."','".$groupCode."')";
			$ress=mysqli_query($mysqli,$p);
			if($ress==TRUE) echo "student added";
			else
			{ 
				$error=TRUE;
				echo "Error : ".$mysqli->error;
			}
			if($error==TRUE) header("location:studentRegistrationPage.html");
			else header("location:/projectApprovalSystem/phpmailer/sendEmail.php");
				//header("location:emailVerification.html");

		}
		if($numberOfStudents==2)
		{
			echo "2 vala chala";

			$p="insert into student(first_name,last_name,roll_number,mobile_number,year,section,semester,department,group_code) values('".$firstStudentFirstName."','".$firstStudentLastName."','".$firstStudentRollNumber."','".$firstStudentMobileNumber."','".$year."','".$section."','".$semester."','".$department."','".$groupCode."')";
			//echo $p;
			$ress=mysqli_query($mysqli,$p);
			$error=FALSE;
			if($ress==TRUE)
			{
				echo "student added";
			}
			else
			{
				$error=TRUE;
				echo "Error : ".$mysqli->error;
			}
			//print_r($ress);
			$p="insert into student(first_name,last_name,roll_number,mobile_number,year,section,semester,department,group_code) values('".$secondStudentFirstName."','".$secondStudentLastName."','".$secondStudentRollNumber."','".$secondStudentMobileNumber."','".$year."','".$section."','".$semester."','".$department."','".$groupCode."')";
			$ress=mysqli_query($mysqli,$p);
			if($ress==TRUE)
			{
				echo "student added";
			}
			else
			{
				$error=TRUE;
				echo "Error : ".$mysqli->error;
			}
			if($error==TRUE)
			{
				header("location:studentRegistrationPage.html");
			}
			else {
				header("location:/projectApprovalSystem/phpmailer/sendEmail.php");
				//header("location:emailVerification.html");
			}
		}




	}
}





?>