<?php
session_start();
include "connection.php";


$_SESSION['fid_chosen']= $_POST['fid'];
$_SESSION['no_of_pass']= $_POST['nop'];
$fid= $_SESSION['fid_chosen'];
$uid=$_SESSION['userid'];
$nop=$_SESSION['no_of_pass'];
date_default_timezone_set('Asia/Kolkata');
$b_date=date('Y-m-d');
$b_time=date('H:i:s');
$bid= mt_rand(1001, 9999);
$bsts = 'PROGRESS';

$sql = " SELECT * FROM booking WHERE BID = '".$bid."' ";
$result = $conn->query($sql);
while($result->num_rows > 0){
    $bid= mt_rand(1001, 9999);
    $result = $conn->query($sql);
}
    $_SESSION['bid']=$bid;

    $sql= "INSERT INTO booking (BID, UID, FID, BOOKING_DATE, BOOKING_TIME, NOP,BOOKING_STATUS)
   VALUES ('$bid', '$uid', '$fid', '$b_date', '$b_time','$nop','$bsts')";

    if($conn->query($sql)==true){

    }
    else{
        echo '<script type="text/javascript">alert("Booking Failed");</script>';
        echo '<script type="text/javascript">window.location=\'display_flight.php\';</script>';
    }

    $sql= "UPDATE flight SET SEATS_AVAILABLE = SEATS_AVAILABLE - '$nop' where FID = '$fid' ";

    if($conn->query($sql)==true){
    }
    else{
        echo '<script type="text/javascript">alert("Booking Failed");</script>';
        echo '<script type="text/javascript">window.location=\'display_flight.php\';</script>';

    }

    echo '<script type="text/javascript">window.location=\'passenger_form.php\';</script>';

    $conn->close();
?>
