<?php
session_start();
include "connection.php";

$UID= $_POST['uid'];
$password= $_POST['password-user'];
$_SESSION['userid']=$UID;
$_SESSION["password"]=$password;

//changing flights status to landed
$sql="UPDATE FLIGHT SET FLIGHT_STATUS='LANDED' WHERE ((ARRIVAL_DATE=CURRENT_DATE AND ARRIVAL_TIME<=CURRENT_TIME) OR (ARRIVAL_DATE<CURRENT_DATE)) AND FLIGHT_STATUS IN('ONTIME', 'DELAYED')";
$conn->query($sql);

//changing booking status to completed
$sql="UPDATE FLIGHT,BOOKING SET BOOKING.BOOKING_STATUS='COMPLETED' WHERE BOOKING.FID=FLIGHT.FID AND
FLIGHT.FLIGHT_STATUS='LANDED' AND BOOKING.BOOKING_STATUS='ACTIVE'";
$conn->query($sql);

//adding flight tuples after flight landed
$sql="SELECT * FROM FLIGHT WHERE FLIGHT_STATUS='LANDED'AND FLIGHT_STATUS<>'COMPLETED' ";
$result=$conn->query($sql);
if($result->num_rows>0){
while($row = $result->fetch_assoc()){
	$old_fid=$row['FID'];
	$old_aid=$row['AID'];
	$sql1="SELECT * FROM AIRPLANE WHERE AID= '$old_aid'";
	$result1=$conn->query($sql1);
	$row1 = $result1->fetch_assoc();
	$sa=$row1["CAPACITY"];

	$old_dd=$row["DEPARTURE_DATE"];
	$date=strtotime($old_dd);
	$date = strtotime("+1 weeks", $date);
	$new_dd=date('Y-m-d', $date);

	$old_ad=$row["ARRIVAL_DATE"];
	$date=strtotime($old_ad);
	$date = strtotime("+1 weeks", $date);
	$new_ad=date('Y-m-d', $date);

	$f='F';
	$random_fid=mt_rand(101,999);
	$new_fid=$f."".$random_fid;

	$sql3 = " SELECT * FROM flight WHERE FID = '".$new_fid."' ";
	$result3 = $conn->query($sql3);
	while($result3->num_rows > 0){
			$random_fid=mt_rand(101,999);
 			$new_fid=$f."".$random_fid;
	    $result3 = $conn->query($sql3);
	}
echo $new_fid;
	$new_aid=$row['AID'];
	$new_type=$row['TYPE'];
	$new_dp=$row['DEPARTURE_PLACE'];
	$new_dt=$row['DEPARTURE_TIME'];
	$new_ap=$row['ARRIVAL_PLACE'];
	$new_at=$row['ARRIVAL_TIME'];
	$new_dn=$row['DURATION'];
	$new_ppp=$row['PRICE_PER_PERSON'];
	$new_sts='ONTIME';

	$sql2 = "INSERT INTO flight (FID, AID, TYPE, DEPARTURE_PLACE, DEPARTURE_DATE, DEPARTURE_TIME, ARRIVAL_PLACE,
					ARRIVAL_DATE, ARRIVAL_TIME, DURATION, SEATS_AVAILABLE, PRICE_PER_PERSON, FLIGHT_STATUS) VALUES
					('$new_fid', '$new_aid', '$new_type', '$new_dp','$new_dd', '$new_dt','$new_ap', '$new_ad', '$new_at',
					'$new_dn', '$sa', '$new_ppp', '$new_sts')";
	$result2=$conn->query($sql2);
	if(!$result2){
		echo 'ERROR';
	}
	$sql4="UPDATE FLIGHT SET FLIGHT_STATUS='COMPLETED' WHERE FID='$old_fid'";
	$result4=$conn->query($sql4);
}
}
$sql = "SELECT * FROM airlineuser where UID='$UID' and PASSWORD='$password'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
	echo '<script type="text/javascript">alert("Successful login");window.location=\'mainmenu.html\';</script>';
}
else{
		echo '<script type="text/javascript">alert("Wrong Username or Password");window.location=\'login.html\';</script>';
}
$conn->close();
?>
