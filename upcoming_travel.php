<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
<title>INDIGO:UPCOMING TRAVEL</title>
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
<h1>UPCOMING TRAVELS</h1>
</div>
<?php
include "connection.php";
$temp=$_SESSION['userid'];

//$sql = "SELECT * FROM flight INNER JOIN booking on flight.fid=booking.fid INNER JOIN TICKET ON ticket.bid=booking.bid  WHERE BOOKING_STATUS IN ('CANCEL','COMPLETED') HAVING flight.fid IN (SELECT FID FROM BOOKING WHERE UID= '".$temp."')";
$sql = "SELECT * FROM flight INNER JOIN booking on flight.fid=booking.fid INNER JOIN TICKET ON ticket.bid=booking.bid  WHERE BOOKING.BOOKING_STATUS = 'ACTIVE' AND BOOKING.UID = '".$temp."' HAVING flight.fid IN (SELECT FID FROM BOOKING WHERE UID= '".$temp."')";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table class='table table-hover table-striped' style='backdrop-filter:blur(50px);'>
        <tr>
        <th>Ticket ID</th>
        <th>Flight ID</th>
        <th>Departure Date</th>
        <th>Departure Time</th>
        <th>Arrival Date</th>
        <th>Arrival Time</th>
        <th>Duration</th>
        <th>Price per person</th>
        <th>Booking ID</th>
        <th>Booking Status</th>
        <th>Flight Status</th>
        <th></th>
        <th></th>
        </tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>
          <td>".$row["TID"]."</td>
          <td>".$row["FID"]."</td>
          <td>".$row["DEPARTURE_DATE"]."</td>
          <td>".$row["DEPARTURE_TIME"]."</td>
	        <td>".$row["ARRIVAL_DATE"]."</td>
          <td>".$row["ARRIVAL_TIME"]."</td>
          <td>".$row["DURATION"]."</td>
          <td>".$row["PRICE_PER_PERSON"]."</td>
          <td>".$row["BID"]."</td>
          <td>".$row["BOOKING_STATUS"]."</td>
          <td>".$row["FLIGHT_STATUS"]."</td>";
    echo "<td>
          <form method='post' action='display_cancel.php'>
          <input type ='hidden' name='bid' value='".$row['BID']."'>
          <input type ='hidden' name='d_date' value='".$row['DEPARTURE_DATE']."'>
          <input type ='hidden' name='d_time' value='".$row['DEPARTURE_TIME']."'>
          <input type='submit' style='background-color:#0086b3;color:white;' value='Cancel'>
          </form>
          </td>
          <td>
                <form method='post' action='print.php'>
                <input type ='hidden' name='bid' value='".$row['BID']."'>
                <input type ='hidden' name='tid' value='".$row['TID']."'>
                <input type ='hidden' name='fid' value='".$row['FID']."'>
                <input type='submit' style='background-color:#0086b3;color:white;' value='ticket'>
                </form>
                </td> </tr>";
        }
  echo "</table>";
}
else {
  echo "<br><h1>Oops... You do not have upcoming travel.</h1>";
}
$conn->close();
?>
</div></div>
<div id="mySidenav" class="sidenav">
  <a href="account.php">MY ACCOUNT</a>
  <a href="flight_search_form.php">BOOK A FLIGHT</a>
  <a href="upcoming_travel.php">UPCOMING TRAVEL</a>
  <a href="travel_history.php">VIEW TRAVEL HISTORY</a>
  <a href="logout.php">LOG OUT</a>
</div>
</center>
</body>
</html>
