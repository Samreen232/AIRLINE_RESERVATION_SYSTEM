<?php
include "connection.php";
$bid = $_POST['bid'];
$d_date = $_POST['d_date'];
$d_time = $_POST['d_time'];
date_default_timezone_set('Asia/Kolkata');
$d_date_time=strtotime("$d_time $d_date");
$curr_date_time = time();
if ( ($d_date_time-$curr_date_time) < 14400 ){ //less than 4 hours
  echo '<script type="text/javascript">
        alert("Cancellation can not be done");
        window.location=\'upcoming_travel.php\';
        </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>INDIGO:CANCELLATION</title>
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
      <div class=".jumbotron pt-1 pl-5 pb-5 mb-3 text-black box">
        <h1 style="float:left;"><b>CANCELLATION</b></h1>
      </div>
<?php
$sql="SELECT * FROM TICKET WHERE BID= '".$bid."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$fare=$row["TOTAL_AIRFARE"];
$fee= 0.25 * $fare;
$refund= 0.75 * $fare;
$sql="SELECT * FROM PAYMENT WHERE BID= '".$bid."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$credit_card=$row["CREDIT_CARD_NO"];
echo"
<div style='backdrop-filter:blur(70px);padding:10px;border:2px solid black;border-radius:15px;'>
<p style='margin-bottom:2%;float:left;width:100%;'>
<p style='float:left;clear:left;font-size: 150%;'><b>  BOOKING ID:</b></p><p style='float:right;font-size: 150%;'><b>".$bid."</b></p>
<p style='float:left;clear:left;font-size: 150%;'><b>  TOTAL AIRFARE:</b></p><p style='float:right;font-size: 150%;'><b>₹".$fare."</b></p>
<p style='float:left;clear:left;font-size: 150%;'><b>  CANCELLATION FEE:</b></p><p style='float:right;font-size: 150%;'><b>₹".$fee."</b></p>
<p style='float:left;clear:left;font-size: 150%;'><b>  REFUND AMOUNT:</b></p><p style='float:right;font-size: 150%;'><b>₹".$refund."</b></p>
</p>
";
?>
<br><br><br><br><br><br><br><br><br>
<hr style='border-bottom:2px solid black'>
<form method='post' action='cancel_flight.php'>
<input type ='hidden' name='bid' value='<?php echo "$bid";?>'/>
<input type='submit' style='background-color:#0086b3;color:white;' value='Cancel'>
</form>
<br>
<a href="upcoming_travel.php"><button style="background-color:#0086b3;color:white;">Don't Cancel</button>
</div>
</center>
</body>
</html>
