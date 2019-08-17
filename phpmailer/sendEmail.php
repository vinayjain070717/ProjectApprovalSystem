<?php
session_start();
include '../db.php';
require 'PHPMailerAutoload.php';
require 'credential.php';
if(!isset($_SESSION["currentEmail"]))
{
$sql="select email_id from student_group order by code desc";

$res=mysqli_query($mysqli,$sql);
while($row=mysqli_fetch_array($res))
{
	// print_r($row);
	// print_r($row["email_id"]);
	$currentEmail=$row["email_id"];
	$_SESSION["currentEmail"]=$currentEmail;
	break;
}
}

$mail = new PHPMailer;

//$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;
//echo "************************************************".EMAIL."***********".PASS;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'Vinay Jain');
$mail->addAddress($_SESSION["currentEmail"]);     // Add a recipient
$mail->addReplyTo(EMAIL);
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$pin=mt_rand(10000,99999);
echo $pin;
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'Your pin for project Approval System is '.$pin;
$_SESSION["verificationToken"]=$pin;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    header("location:/projectApprovalSystem/emailVerificationPage.php");
}