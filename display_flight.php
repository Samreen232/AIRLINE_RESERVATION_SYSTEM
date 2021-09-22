<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>INDIGO:FLIGHTS</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="bck_gnd_user.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<div class="container" p-5>
<div class=".jumbotron p-3 mb-3 text-black">
<h1><b>FLIGHTS AVAILABLE</b></h1>
</div>
<?php
$departure= $_POST['departure'];
$arrival= $_POST['arrival'];
$departuredate= $_POST['departuredate'];
$passenger= $_POST['passenger'];

$sql = "SELECT * FROM flight where departure_place='$departure' and arrival_place='$arrival' and departure_date='$departuredate'
 and seats_available >= '$passenger' and flight_status in ('ONTIME','DELAYED')";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table class='table table-hover table-striped' style='backdrop-filter:blur(100px);'>
				<tr class='formele'>
						<th><b>FID</b></th>
						<th><b>From</b></th>
						<th><b>Departure Date</b></th>
						<th><b>Departure Time</b></th>
						<th><b>To</b></th>
						<th><b>Arrival Date</b></th>
  					<th><b>Arrival Time</b></th>
						<th><b>Duration</b></th>
						<th><b>Price per person</b></th>
						<th></th>
				</tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>
					<td><b>".$row["FID"]."</b></td>
					<td><b>".$row["DEPARTURE_PLACE"]."</b></td>
					<td><b>".$row["DEPARTURE_DATE"]."</b></td>
					<td><b>".$row["DEPARTURE_TIME"]."</b></td>
					<td><b>".$row["ARRIVAL_PLACE"]."</b></td>
					<td><b>".$row["ARRIVAL_DATE"]."</b></td>
					<td><b>".$row["ARRIVAL_TIME"]."</b></td>
					<td><b>".$row["DURATION"]."</b></td>
					<td><b>".$row["PRICE_PER_PERSON"]."</b></td>";
	echo "<td>
					<form method='post' action='book_flight.php'>
					<input type ='hidden' name='fid' value='".$row['FID']."'>
					<input type ='hidden' name='nop' value='$passenger'>
					<input type='submit' value='Book Now'>
					</form>
				</td> </tr>";
  }
  echo "</table><a href='flight_search_form.php' style='color:black;'><button type='button' class='btn btn-outline-dark but'>GO BACK</button></a>";
}
else {
	echo"<script>window.alert('No flights Available')</script>";
?>
<meta http-equiv="Refresh" content="0; url=http://localhost/airline-database/flight_search_form.php">
<?php
}
$conn->close();
?>
