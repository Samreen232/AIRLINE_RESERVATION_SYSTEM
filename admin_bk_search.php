<!DOCTYPE html>
<html lang="en">
<head>
<title>INDIGO: VIEW BOOKINGS</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="back_gnd.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<div class="container" p-5>
<div class=".jumbotron p-3 mb-3 text-black box">
<h1>BOOKINGS</h1>
</div>

<?php
include "connection.php";

$fid=$_POST['fid'];

$sql="SELECT * FROM BOOKING WHERE FID='$fid' and BOOKING_STATUS IN ('ACTIVE','COMPLETED')";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table class='table table-hover table-striped' style='backdrop-filter:blur(30px);'><tr class='formele'><th>Booking ID</th><th>User ID</th><th>Booking Date</th><th>Booking Time</th>
  <th>No Of Passengers</th><th>Booking Status</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["BID"]."</td><td>".$row["UID"]."</td><td>".$row["BOOKING_DATE"]."</td>
	<td>".$row["BOOKING_TIME"]."</td><td>".$row["NOP"]."</td><td>".$row["BOOKING_STATUS"]."</td></tr>";
  }
  echo "</table><a href='admin_bk_search.html'><button type='button' class='btn btn-outline-dark float-left but'>BACK TO MENU</button></a>";
}
else {
  echo "<br>NO RECORD FOUND<br><a href='admin_bk_search.html'><button type='button' class='btn btn-outline-dark float-left but'>GO BACK</button></a>";
}
$conn->close();
?>
</div>
</div>
</center>
</body>
</html>
