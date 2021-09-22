<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">
<head>
<title>INDIGO:TRAVEL HISTORY</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="bck_gnd_user.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="float-right">
<center>
<div class="container" p-5>
<div class=".jumbotron p-3 mb-3 text-black box">
<h1>TRAVEL HISTORY</h1>
</div>
<?php
include "connection.php";
$temp=$_SESSION['userid'];


$sql = "SELECT * FROM flight INNER JOIN booking on flight.fid=booking.fid WHERE BOOKING.BOOKING_STATUS IN ('CANCEL','COMPLETED') and BOOKING.UID = '".$temp."' HAVING flight.fid IN (SELECT FID FROM BOOKING WHERE UID= '".$temp."')";
//$sql = "SELECT * FROM flight INNER JOIN booking on flight.fid=booking.fid INNER JOIN TICKET ON ticket.bid=booking.bid  WHERE BOOKING_STATUS IN ('CANCEL','COMPLETED') HAVING flight.fid IN (SELECT FID FROM BOOKING WHERE UID= '".$temp."')";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table class='table table-hover table-striped' style='backdrop-filter:blur(70px);'><tr class='formele'><th>Flight ID</th><th>Departure Date</th><th>Departure Time</th><th>Arrival Date</th>
  <th>Arrival Time</th><th>Duration</th><th>Price per person</th><th>Booking ID</th><th>Booking Status</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["FID"]."</td><td>".$row["DEPARTURE_DATE"]."</td><td>".$row["DEPARTURE_TIME"]."</td>
	<td>".$row["ARRIVAL_DATE"]."</td><td>".$row["ARRIVAL_TIME"]."</td><td>".$row["DURATION"]."</td><td>".$row["PRICE_PER_PERSON"]."</td><td>".$row["BID"]."</td><td>".$row["BOOKING_STATUS"]."</td></tr>";
  }
  echo "</table>";
}
else {
  echo "<br><h1>Oops... You have not travelled with us before.</h1>";
}
$conn->close();
?>
</div>
<div id="mySidenav" class="sidenav">
  <a href="account.php">MY ACCOUNT</a>
  <a href="flight_search_form.php">BOOK A FLIGHT</a>
  <a href="upcoming_travel.php">UPCOMING TRAVEL</a>
  <a href="travel_history.php">VIEW TRAVEL HISTORY</a>
  <a href="logout.php">LOG OUT</a>
</div>
</div>

</center>
</body>
</html>
