<?php
session_start();
include "connection.php";

$FID= $_POST['fid'];

$sql = "SELECT * FROM flight where FID ='$FID'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {

	$sql = "SELECT * FROM booking where FID ='$FID' and BOOKING_STATUS = 'ACTIVE'";
	$result = $conn->query($sql);
	if ($result->num_rows >= 1){
		echo '<script type="text/javascript">alert("FLIGHT CANT BE DELETED HAS ONGOING BOOKINGS");window.location=\'flight_delete.html\';</script>';
	}
	else{
		$sql = "DELETE FROM FLIGHT WHERE FID='$FID'";
		$result = $conn->query($sql);

		if ($result==false) {
			echo '<script type="text/javascript">alert("FAILED TO DELETE");window.location=\'flight_delete.html\';</script>';
		}
		else{
			echo '<script type="text/javascript">alert("FLIGHT DELETED!");window.location=\'flight_delete.html\';</script>';
		}
	}

}
else{
			echo '<script type="text/javascript">alert("FLIGHT WITH FID '.$FID.' DOES NOT EXIST!");window.location=\'flight_delete.html\';</script>';
	}



$conn->close();
?>
