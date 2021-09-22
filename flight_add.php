<?php
session_start();
include "connection.php";

$FID= $_POST['fid'];
$AID= $_POST['aid'];
$FTYPE= $_POST['ftype'];
$DEP_PLACE= $_POST['dep_place'];
$DEP_DATE= $_POST['dep_date'];
$DEP_TIME= $_POST['dep_time'];
$ARR_PLACE= $_POST['arr_place'];
$ARR_DATE= $_POST['arr_date'];
$ARR_TIME= $_POST['arr_time'];
$DURATION= $_POST['duration'];
$NOS= $_POST['nos'];
$PPP= $_POST['ppp'];
$FSTS = "ONTIME";

date_default_timezone_set('Asia/Kolkata');

$sql = "SELECT * FROM AIRPLANE where AID = $AID ";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $capacity = $row["CAPACITY"];

    $sql = "SELECT * FROM flight where FID ='$FID'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
    	echo '<script type="text/javascript">alert("ENTER UNIQUE FID");window.location=\'flight_add.html\';</script>';
    }
    else{
        if ($ARR_DATE<$DEP_DATE OR ($ARR_DATE==$DEP_DATE AND $ARR_TIME<=$DEP_TIME)) {
            echo '<script type="text/javascript">alert("1ENTER VALID DEPARTURE AND ARRIVAL DATE AND TIME");window.location=\'flight_add.html\';</script>';
        }
    else if($DEP_DATE<date('Y-m-d') OR ($DEP_DATE==date('Y-m-d') AND $DEP_TIME<date('h:i:s'))){
            echo '<script type="text/javascript">alert("2ENTER VALID DEPARTURE AND ARRIVAL DATE AND TIME");window.location=\'flight_add.html\';</script>';
        }
        else if($NOS > $capacity){
            echo '<script type="text/javascript">alert("BEYOND AIRPLANES CAPACITY");window.location=\'flight_add.html\';</script>';
        }
        else{

        $sql = "INSERT INTO flight (FID,AID,TYPE,DEPARTURE_PLACE,DEPARTURE_DATE,DEPARTURE_TIME,ARRIVAL_PLACE,
                ARRIVAL_DATE,ARRIVAL_TIME,DURATION,
                SEATS_AVAILABLE,PRICE_PER_PERSON,FLIGHT_STATUS) VALUES
                ('$FID','$AID','$FTYPE','$DEP_PLACE','$DEP_DATE','$DEP_TIME',
                '$ARR_PLACE','$ARR_DATE','$ARR_TIME','$DURATION','$NOS','$PPP','$FSTS')";
        $result = $conn->query($sql);
        if ($result==false) {
            echo '<script type="text/javascript">alert("FAILED TO INSERT");window.location=\'flight_add.html\';</script>';
        }
        else{
    		echo '<script type="text/javascript">alert("NEW FLIGHT ADDED!");window.location=\'flight_add.html\';</script>';
        }
        }
        }
    }

else{
    echo '<script type="text/javascript">alert("GIVEN AID DOESNT EXIST");window.location=\'flight_add.html\';</script>';
}

$conn->close();
?>
