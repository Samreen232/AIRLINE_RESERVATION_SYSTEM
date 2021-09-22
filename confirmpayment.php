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
<style media="screen">
    .p-box{
        margin-top: 100px;
        margin-bottom:100px;
        padding-top: 10px;
    }
    body{
        background-color: #dee9fb;
    }
    .box{
        border-radius: 25px;
        padding-top: 50px;
        padding-bottom: 50px;
        padding-right: 50px;
        padding-left: 50px;
    }
    .payhead{
        border-radius: 15px;
    }
</style>
</head>
<body>
<center>
<div class="box bg-white col-sm-10 m-3">
<div class="container" p-5 >
<div class=".jumbotron p-3 mb-3 bg-info text-white payhead">
<h1>PAYMENT</h1>
</div>
<?php
include "connection.php";

$temp1=$_SESSION['bid'];
$temp2=$_SESSION['TRANSID'];
$sql = "SELECT PRICE_PER_PERSON * NOP as a FROM flight INNER JOIN booking on flight.fid = booking.fid WHERE BID = '".$temp1."'";
$result2 = $conn->query($sql);
if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()){
        $airfare = $row["a"];
    }
}
$tax = 0.05;
$total_airfare = $tax * $airfare + $airfare ;

$sql = "SELECT * FROM payment INNER JOIN booking on payment.bid=booking.bid WHERE TRANS_STATUS = 'DUE' AND trans_id = '".$temp2."'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table class='table table-hover table-striped'><tr class='table-info'><th>Transaction ID</th><th>Booking ID</th><th>Username</th><th>Flight ID</th>
  <th>Booking Date</th><th>Booking Time</th><th>No Of Passengers</th><th>AIRFARE</th><th>TAX</th><th>TOTAL AIRFARE</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["TRANS_ID"]."</td><td>".$row["BID"]."</td><td>".$row["UID"]."</td>
	<td>".$row["FID"]."</td><td>".$row["BOOKING_DATE"]."</td><td>".$row["BOOKING_TIME"]."</td><td>".$row["NOP"]."</td>
    <td>".$airfare."</td><td>".$tax."</td><td>".$total_airfare."</td></tr>";
  }
  echo "</table>";
}
$conn->close();
?>

<a href = "ticket.php"><button type="submit"  class="btn btn-lg btn-success">CONFIRM PAYMENT </button></a>

</div>
</div>
</center>
</body>
</html>
