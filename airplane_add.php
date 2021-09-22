<?php
session_start();
include "connection.php";

$AID= $_POST['aid'];
$MODEL= $_POST['model'];
$CAPACITY= $_POST['capacity'];

$sql = "SELECT * FROM airplane where AID ='$AID'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
	echo '<script type="text/javascript">alert("ENTER UNIQUE AID");window.location=\'airplane_add.html\';</script>';
}
else{

    $sql = "INSERT INTO airplane (AID,MODEL,CAPACITY) VALUES('$AID','$MODEL','$CAPACITY')";
    $result = $conn->query($sql);

    if ($result==false) {
        echo '<script type="text/javascript">alert("FAILED TO INSERT");window.location=\'airplane_add.html\';</script>';
    }
    else{
		echo '<script type="text/javascript">alert("NEW AIRPLANE ADDED!");window.location=\'airplane_add.html\';</script>';
    }
    }
$conn->close();
?>
