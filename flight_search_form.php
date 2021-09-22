<?php
$b_date=date('Y-m-d');
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="150">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 ,shrink-to-fit = no">
        <title>INDIGO : SEARCH FLIGHTS </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="bck_gnd_user.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <body>

        <center>
        <div class="col-sm-6">
        <div class="container">
        <div class=".jumbotron p-3 mb-3 text-black box">
        <h1>FLIGHT SEARCH</h1>
        </div>
				<form action="display_flight.php" method="post" class="formst">
				<div class="row mb-3 formele">
	      <label class="col-sm-5 col-form-label labeltxt">FROM</label>
	      <div class="col-sm-5">
              <input type="text" class="form-control" name="departure" list="depcity" required>
            <datalist id="depcity">
                <option value="CHENNAI">
                <option value="HYDERABAD">
                <option value="MUMBAI">
                <option value="BANGALORE">
                <option value="DELHI">
            </datalist>
	    </div>
	    </div>
	    <div class="row mb-3 formele">
	    <label class="col-sm-5 col-form-label labeltxt">TO</label>
	    <div class="col-sm-5">
            <input type="text" class="form-control" name = "arrival" list="arrcity" required >
          <datalist id="arrcity">
              <option value="CHENNAI">
              <option value="HYDERABAD">
              <option value="MUMBAI">
              <option value="BANGALORE">
              <option value="DELHI">
              <option value="ABU DHABI">
              <option value="TORONTO">
              <option value="LONDON">
              <option value="SINGAPORE">
              <option value="MALAYSIA">
              <option value="CHICAGO">
          </datalist>
	    </div>
	    </div>
        <script>
         var today = new Date().toISOString().split('T')[0];
         document.getElementsByName("departuredate")[0].setAttribute('min', today);
        </script>
	    <div class="row mb-3 formele">
	    <label class="col-sm-5 col-form-label labeltxt">DEPARTURE DATE</label>
	    <div class="col-sm-5">

	     <input type="date" class="form-control" name = "departuredate" required value=<?php echo $b_date?> min=<?php echo $b_date?>>

        </div>
	    </div>
	    <div class="row mb-3 formele">
	    <label class="col-sm-5 col-form-label labeltxt">NUMBER OF PASSENGER(S)</label>
	    <div class="col-sm-5">
	     <input type="number" class="form-control" name = "passenger" required value="1">
	    </div>
	    </div>
			<div class="col-sm-2 row mb-3 float-left"><br>
	    <button type="submit" value = "submit" class="btn btn-lg btn-outline-dark but">SEARCH FOR FLIGHTS</button>
	    </div>
	</form><br>
	</div>
	</div>
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
