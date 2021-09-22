
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

                <form action="change_delay2.php" method="post" class="formst">
                    <div class="row mb-3 formele">
                        <label class="col-sm-2 col-form-label labeltxt">FID</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="fid" required>
                        </div>
                    </div>

                    <div class="col-sm-2 row mb-3 float-left">
                        <button type="submit" value="submit" class="btn btn-outline-dark btn-lg but">MODIFY</button>
                    </div>
                  </form>
                  <a href="admin_menu.html"><button type="button" class="btn btn-outline-dark mt-2 but">BACK TO MENU</button></a>
              </div>
          </div>
</center>
<div id="mySidenav" class="sidenav">
  <a href="admin_bk_search.html">VIEW BOOKINGS</a>
  <a href="admin_ps_search.html">VIEW PASSENGERS</a>
  <a href="flight_add.html">ADD FLIGHT</a>
  <a href="flight_delete.html">DELETE FLIGHT</a>
  <a href="airplane_add.html">ADD AIRPLANE</a>
  <a href="airplane_delete.html">DELETE AIRPLANE</a>
  <a href="change_flight.php">CHANGE FLIGHT</a>
  <a href="change_delay1.php">MODIFY FLIGHT TIMINGS</a>
  <a href="admin_logout.php">LOGOUT</a>
</div>
</body>
</html>
