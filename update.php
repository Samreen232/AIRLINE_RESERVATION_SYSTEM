<?php
session_start();
include "connection.php";

$fid = $_SESSION['FID'];
$DEP_DATE= $_POST['dep_date'];
$DEP_TIME= $_POST['dep_time'];
$ARR_DATE= $_POST['arr_date'];
$ARR_TIME= $_POST['arr_time'];
$FL_ST="DELAYED";

$sql = "SELECT * FROM FLIGHT WHERE FID= '$fid' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($ARR_DATE<$DEP_DATE OR ($ARR_DATE==$DEP_DATE AND $ARR_TIME<=$DEP_TIME)) {
      echo '<script type="text/javascript">alert("ENTER VALID DEPARTURE AND ARRIVAL DATE AND TIME");window.location=\'change_delay1.php\';</script>';
  }

  else if($DEP_DATE<date('Y-m-d') OR ($DEP_DATE==date('Y-m-d') AND $DEP_TIME<date('h:i:s'))){
      echo '<script type="text/javascript">alert("ENTER VALID DEPARTURE AND ARRIVAL DATE AND TIME");window.location=\'change_delay1.php\';</script>';
  }

  else if($ARR_DATE<$row['ARRIVAL_DATE'] OR ($ARR_DATE==$row['ARRIVAL_DATE'] AND $ARR_TIME<=$row['ARRIVAL_TIME'])){
    echo '<script type="text/javascript">alert("ENTER VALID DEPARTURE AND ARRIVAL DATE AND TIME");window.location=\'change_delay1.php\';</script>';
  }

  else{
   $sql = "UPDATE FLIGHT SET DEPARTURE_DATE='$DEP_DATE',ARRIVAL_DATE='$ARR_DATE',DEPARTURE_TIME='$DEP_TIME',ARRIVAL_TIME='$ARR_TIME',FLIGHT_STATUS ='$FL_ST' WHERE FID='$fid'";
   if($conn->query($sql)==true){
    echo '<script type="text/javascript">alert("FLIGHT MODIFIED");window.location=\'change_delay1.php\';</script>';
}
}

$conn->close();
?>
