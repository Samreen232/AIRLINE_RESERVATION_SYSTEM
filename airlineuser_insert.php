<?php
include "connection.php";

$uid= $_POST['uid'];
$name= $_POST['name'];
$dob= $_POST['dob'];
$gender= $_POST['gender'];
$address= $_POST['address'];
$emailid= $_POST['emailid'];
$phone= $_POST['phoneno'];
$password= $_POST['password-user'];

$sql = "SELECT * FROM airlineuser WHERE UID = '$uid' ";
$result = $conn->query($sql);
if($result->num_rows==1){
	echo '<script type="text/javascript">alert("USERNAME already exists");window.location=\'register.html\';</script>';
}
else{

	$sql= "INSERT INTO airlineuser (UID, NAME, DOB, GENDER, ADDRESS, EMAIL_ID, PHONE_NO, PASSWORD)
			VALUES ('$uid', '$name', '$dob', '$gender', '$address', '$emailid', '$phone', '$password')";

	if($conn->query($sql) === TRUE){
		header("Location: http://localhost/airline-database/login.html");
	}
	else{
		echo '<script type="text/javascript">alert("Email-id already exists");window.location=\'register.html\';</script>';
	}

}

$conn->close();
?>
