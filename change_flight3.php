<?php

session_start();
include "connection.php";

$FID = $_SESSION['FID'];
$AID= $_POST['aid'];

$sql = "SELECT * FROM AIRPLANE where AID = '$AID' ";
$result_a = $conn->query($sql);

$sql = "SELECT * FROM FLIGHT WHERE FID= '$FID' ";
$result_f = $conn->query($sql);

if (($result_a->num_rows == 1) AND ($result_f->num_rows == 1)) {
  $sql="UPDATE FLIGHT SET AID='$AID' WHERE FID='$FID'";
  $result = $conn->query($sql);
  if($result == true){
    echo '<script type="text/javascript">alert("FLIGHT MODIFIED SUCCESSFULLY");window.location=\'change_flight.php\';</script>';
  }
  else{
    echo '<script type="text/javascript">alert("ERROR");window.location=\'change_flight.php\';</script>';
  }
}
elseif(($result_a->num_rows == 1) OR ($result_f->num_rows == 1)){
  if($result_a->num_rows == 1){
  echo '<script type="text/javascript">alert("Entered FID does not exist");window.location=\'change_flight.php\';</script>';
  }
  else {
    echo '<script type="text/javascript">alert("Entered AID does not exist");window.location=\'change_flight.php\';</script>';
  }
}
else{
  echo '<script type="text/javascript">alert("Entered AID and FID does not exist");window.location=\'change_flight.php\';</script>';
}

$conn->close();

?>
