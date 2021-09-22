<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>INDIGO:TICKET</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <center>
    <br><br>
    <h1>E-TICKET</h1>
    <div class="container">
    <div class=".jumbotron pt-1 pl-5 pb-5 mb-3 bg-info text-white">
    <h1 style="float:left;">IndiGo</h1>
    <p style="float:right;padding:1%;">Toll free: 0452-10881089</p>
    </div>
    <hr style="border-top:2px solid #0086b3;">
    <div>
      <img src="logo.png" alt="INDIGO LOGO" style="float:left;width:15%">

<?php
$my_bid=$_POST['bid'];
$latest_id=$_POST['tid'];
$my_fid=$_POST['fid'];

//user and booking details
$sql="SELECT * FROM BOOKING WHERE BID= '".$my_bid."'";
$result_bk = $conn->query($sql);
if ($result_bk->num_rows > 0) {
  while($row = $result_bk->fetch_assoc()) {
    echo "<p style='float:right;clear:right;'>Booking ID:".$row['BID']."</p>";
    echo "<p style='float:right;clear:right;'>User ID:".$row['UID']."</p>";
    echo "<p style='float:right;clear:right;'>Booking Date:".$row['BOOKING_DATE']."</p></div><br><br>";
  }
}
else{
  echo "ERROR";
}


//flight details
$sql="SELECT * FROM FLIGHT WHERE FID= '".$my_fid."'";
$result_fl = $conn->query($sql);
if ($result_fl->num_rows > 0) {
  echo "<br><br><br>
  <h4 style='float:left;'>Flight Details</h4>
  <br><br>
  <div style='margin-bottom:2%;'>
  <table style='float:left;width:100%;table-layout:fixed;'>
  <tr style='border-bottom:0.5px solid #0086b3;'>
  <th>Flight ID</th>
  <th>From</th>
  <th>To</th>
  <th>Arrival Date</th>
  <th>Arrival Time</th>
  <th>Departure Date</th>
  <th>Departure Time</th>
  </tr>";
  while($row = $result_fl->fetch_assoc()) {
    echo "<tr><th></th></tr>
    <tr>
    <td>".$row["FID"]."</td>
    <td>".$row['DEPARTURE_PLACE']."</td>
    <td>".$row['ARRIVAL_PLACE']."</td>
    <td>".$row["ARRIVAL_DATE"]."</td>
    <td>".$row["ARRIVAL_TIME"]."</td>
    <td>".$row["DEPARTURE_DATE"]."</td>
    <td>".$row["DEPARTURE_TIME"]."</td>
    </tr>
    </table>
    <br><br>";
  }
  echo "<hr style='border-top:2px solid #0086b3;'></div>";

}
else{
  echo "ERROR";
}

//Passenger Details
$sql="SELECT * FROM PASSENGER WHERE BID= '".$my_bid."'";
$result_ps = $conn->query($sql);
if ($result_ps->num_rows > 0) {
  echo "
  <h4 style='float:left;'>Passenger Details</h4>
  <br><br>
  <table style='margin-bottom:2%;float:left;width:100%;table-layout:fixed;'>
  <tr style='border-bottom:0.5px solid #0086b3;'>
  <th>Name</th>
  <th>Gender</th>
  <th>Age</th>
  <th>Address</th>
  <th>Contact No</th>
  </tr>";
  while($row = $result_ps->fetch_assoc()) {
    echo "<tr><th></th></tr>
    <tr>
    <td>".$row['NAME']."</td>
    <td>".$row['GENDER']."</td>
    <td>".$row['AGE']."</td>
    <td>".$row["ADDRESS"]."</td>
    <td>".$row["PHONE_NO"]."</td>
    </tr>";
  }
  echo "
  <tr style='border-bottom:2px solid #0086b3;'><th></th><th></th><th></th><th></th><th></th></tr>
  </table>";
}
else{
  echo "ERROR";
}


//ticket and payment details
$sql="SELECT * FROM TICKET WHERE TID= '".$latest_id."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "
  <h4 style='float:left'>Ticket Details</h4>
  <br><br>
  <table style='margin-bottom:2%;float:left;width:100%;table-layout:fixed;'>
  <tr style='border-bottom:0.5px solid #0086b3;'>
  <th>TID</th>
  <th>BID</th>
  <th>T_DATE</th>
  <th>T_TIME</th>
  </tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><th></th></tr>
    <tr>
    <td>".$row["TID"]."</td>
    <td>".$row["BID"]."</td>
    <td>".$row["T_DATE"]."</td>
    <td>".$row["T_TIME"]."</td>
    </tr>
    <tr style='border-bottom:2px solid #0086b3;'><th></th><th></th><th></th><th></th></tr>
    </table>
    <h4 style='float:left'>Payment Details</h4><br>
    <p style='float:left;clear:left'>AIRFARE:</p><p style='float:right;'>₹".$row["AIRFARE"]."</p>
    <p style='float:left;clear:left;'>TAX:</p><p style='float:right;'>".$row["TAX"]."%</p>
    <p style='float:left;clear:left;'>TOTAL_AIRFARE:</p><p style='float:right;'>₹".$row["TOTAL_AIRFARE"]."</p>
    ";
  }
  echo "
  <br><br>
 <hr style='border-top:2px solid black;clear:both;'>
 </div></center>";
}
else {
  echo "ERROR";
}
 $conn->close();

 ?>

 <div class="container">
     <h4 style='float:left'>Important information</h4>
     <br><br>
     <p >Please do reach airport 2 hour prior to departure time for a hassle free travel.</p>
     <p >Boarding gates close 45 minutes prior to scheduled departure time .</p>
     <p >Check in counters close 45 minutes prior to scheduled departure time .</p>
     <p >Check in baggage allowance : 15 kg</p>
     <p >Hand baggage allowance : 7kg</p>
     <hr style='border-top:2px solid black;clear:both;'>
 <center>
 <p style="clear:both;">..............HAVE A WONDERFUL JOURNEY...........</p>
 <button style="background-color:#0086b3;color:white;" onclick="window.print()">Print</button>
 <a href="mainmenu.html"><button style="background-color:#0086b3;color:white;">Menu</button></a>
</center>
</div>
 </body>
 </html>
