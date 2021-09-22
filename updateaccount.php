<?php
session_start();
include "connection.php";

$uid= $_SESSION['userid'];
$name= $_POST['name'];
$dob= $_POST['dob'];
$gender= $_POST['gender'];
$address= $_POST['address'];
$emailid= $_POST['emailid'];
$phone= $_POST['phoneno'];
$password= $_POST['password-user'];

$sql = "UPDATE airlineuser SET NAME='$name', DOB='$dob', GENDER='$gender', ADDRESS='$address', EMAIL_ID='$emailid', PHONE_NO='$phone', PASSWORD='$password' WHERE UID = '$uid'";

if($conn->query($sql)==false){
    echo $conn->error;
    echo '<script type="text/javascript">alert("UPDATION FAILED BECAUSE THIS MAILID IS ALREADY LINKED WITH AN ACCOUNT");window.location=\'account.php\';</script>';
}
else{
    echo '<script type="text/javascript">alert("PROFILE UPDATED");window.location=\'mainmenu.html\';</script>';
}

$conn->close();
?>
