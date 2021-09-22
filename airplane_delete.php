<?php
session_start();
include "connection.php";

$AID= $_POST['aid'];

$sql = "SELECT * FROM airplane where AID ='$AID'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
		$sql = "SELECT * FROM flight where AID ='$AID' and FLIGHT_STATUS IN ('ONTIME','DELAYED')";
		$result = $conn->query($sql);
		if ($result->num_rows >= 1){
			echo '<script type="text/javascript">alert("AIRPLANE CANT BE DELETED HAS ONGOING FLIGHTS");window.location=\'airplane_delete.html\';</script>';
		}
		else {
			$sql = "DELETE FROM AIRPLANE WHERE AID='$AID'";
		    $result = $conn->query($sql);

		    if ($result==false) {
		        echo '<script type="text/javascript">alert("FAILED TO DELETE");window.location=\'airplane_delete.html\';</script>';
		    }
		    else{
				echo '<script type="text/javascript">alert("AIRPLANE DELETED!");window.location=\'airplane_delete.html\';</script>';
		    }
	}
		}

else{
			echo '<script type="text/javascript">alert("Airplane with AID: '.$AID.' does not exist!");window.location=\'airplane_delete.html\';</script>';
    }
$conn->close();
?>
