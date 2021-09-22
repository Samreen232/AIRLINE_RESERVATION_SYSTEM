<!DOCTYPE html>
<html lang="en">
<head>
<title>INDIGO: VIEW PASSENGERS</title>
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
<h1>PASSENGERS</h1>
</div>


<?php
include "connection.php";

$fid=$_POST['fid'];

$sql="SELECT * FROM PASSENGER WHERE BID IN(SELECT BID FROM BOOKING WHERE FID='$fid')";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table class='table table-hover table-striped' style='backdrop-filter:blur(30px);'><tr class='formele'><th>Name</th><th>Date of birth</th><th>Gender</th><th>Address</th>
  <th>Email ID</th><th>Phone No</th><th>Booking ID</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["NAME"]."</td><td>".$row["DOB"]."</td><td>".$row["GENDER"]."</td>
	<td>".$row["ADDRESS"]."</td><td>".$row["EMAIL_ID"]."</td><td>".$row["PHONE_NO"]."</td><td>".$row["BID"]."</td></tr>";
  }
  echo "</table><a href='admin_ps_search.html'><button type='button' class='btn btn-outline-dark float-left but'>BACK TO MENU</button></a>";
}
else {
  echo "<br>NO RECORD FOUND<br><a href='admin_ps_search.html'><button type='button' class='btn btn-outline-dark float-left but'>BACK TO MENU</button></a>";
}
$conn->close();
?>
</div>
</div>
</center>
</body>
</html>
