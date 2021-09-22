<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="200">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ,shrink-to-fit = no">
    <title>INDIGO : MODIFY FLIGHT </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="back_gnd.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
  <center>
    <div class="col-sm-6">
        <div class="container">
            <div class=".jumbotron p-3 mb-2 text-black box">
                <h1>MODIFY FLIGHT TIMINGS</h1>
            </div>

    <?php
    session_start();
    include "connection.php";
    $FID= $_POST['fid'];
    $_SESSION['FID'] = $FID;
    $sql = "SELECT * FROM FLIGHT WHERE FID= '$FID' ";
    $result = $conn->query($sql);

    if($result->num_rows == 0){
    		echo '<script type="text/javascript">alert("FID DOES NOT EXIST");window.location=\'change_delay1.php\';</script>';
    }
    else{
    	$row = $result->fetch_assoc();

    	echo"
              <form method='post' action='update.php' class='formst'>
    	      <div class=\"row mb-3 formele\">
                            <label class=\"col-sm-2 col-form-label labeltxt\">DEPARTURE DATE</label>
                            <div class=\"col-sm-5\">
                                <input type=\"date\" class=\"form-control\" name=\"dep_date\" value='".$row['DEPARTURE_DATE']."' required>
                            </div>
                        </div>

                        <div class=\"row mb-3 formele\">
                            <label class=\"col-sm-2 col-form-label labeltxt\">DEPARTURE TIME</label>
                            <div class=\"col-sm-5\">
                                <input type=\"time\" class=\"form-control\" name=\"dep_time\" value='".$row['DEPARTURE_TIME']."' required>
                            </div>
                        </div>

                        <div class=\"row mb-3 formele\">
                            <label class=\"col-sm-2 col-form-label labeltxt\">ARRIVAL DATE</label>
                            <div class=\"col-sm-5\">
                                <input type=\"date\" class=\"form-control\" name=\"arr_date\" value='".$row['ARRIVAL_DATE']."' required>
                            </div>
                        </div>

                        <div class=\"row mb-3 formele\">
                            <label class=\"col-sm-2 col-form-label labeltxt\">ARRIVAL TIME</label>
                            <div class=\"col-sm-5\">
                                <input type=\"time\" class=\"form-control\" name=\"arr_time\" value='".$row['ARRIVAL_TIME']."' required>
                            </div>
                        </div>
                 <input type='submit' name=\"SubmitButton\" class='btn btn-outline-dark btn-lg but' value='MODIFY'>
                 </form>";
    }

    $conn->close();
    ?>
    <a href="change_delay1.php"><button type="button" class="btn btn-outline-dark mt-2 but">GO BACK</button></a>
</div>
</div>
</center>
</body>
</html>
