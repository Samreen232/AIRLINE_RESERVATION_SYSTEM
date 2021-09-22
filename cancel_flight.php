<?php
session_start();
include "connection.php";
$bid= $_POST['bid'];
//echo $bid;
/*$bsts='CANCEL';*/
$sql = "DELETE FROM TICKET WHERE BID = '".$bid."' ";
if ($conn->query($sql) == true){
}
else{
  echo '<script type="text/javascript">
        alert("Cancellation can not be done");
        window.location=\'upcoming_travel.php\';
        </script>';
}

/*
$sql = "SELECT * FROM PASSENGER WHERE BID = '".$bid."' ";
$result = $conn->query($sql);
$a = $result->num_rows;

$sql = "UPDATE flight SET seats_available = seats_available + '$a' WHERE FID = (SELECT FID FROM BOOKING WHERE BID = '".$bid."')";
$conn->query($sql);
*/
$sql = " DELETE FROM PASSENGER WHERE BID = '".$bid."' ";
if ($conn->query($sql) == true){
}
else{
  echo '<script type="text/javascript">
        alert("Cancellation can not be done");
        window.location=\'upcoming_travel.php\';
        </script>';
}
$sql = " DELETE FROM PAYMENT WHERE BID = '".$bid."' ";
if ($conn->query($sql) == true){
}
else{
  echo '<script type="text/javascript">
        alert("Cancellation can not be done");
        window.location=\'upcoming_travel.php\';
        </script>';
}
/*$sql= "UPDATE BOOKING SET BOOKING_STATUS = '$bsts' where BID = '$bid' ";
if ($conn->query($sql) == true){
}
else{*/
echo '<script type="text/javascript">
              alert("Cancellation Successful");
              window.location=\'upcoming_travel.php\';
              </script>';
/*}
echo '<script type="text/javascript">
      alert("Cancellation Successful");
      window.location=\'upcoming_travel.php\';
      </script>';*/
$conn->close();
?>
