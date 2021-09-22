<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="200">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ,shrink-to-fit = no">
    <title>INDIGO : USER PROFILE </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="bck_gnd_user.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <center>
    <div class="col-sm-6">
    <div class="container">
    <div class=".jumbotron p-3 mb-2 text-black box">
    <h1>USER PROFILE</h1>
    </div>
    <?php
    session_start();
    include "connection.php";
    $UID= $_SESSION['userid'];
    $sql = "SELECT * FROM AIRLINEUSER WHERE UID= '$UID' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $a = $row['GENDER'];
    	echo"
              <form method='post' action='updateaccount.php' class='formst'>
              <div class=\"row mb-3 formele\">
                  <label class=\"col-sm-2 col-form-label labeltxt\">USERNAME</label>
                  <div class=\"col-sm-5\">
                      <input type=\"text\" class=\"form-control\" name=\"uid\" required value='".$row['UID']."' >
                  </div>
              </div>
              <div class=\"row mb-3 formele\">
                  <label class=\"col-sm-2 col-form-label labeltxt\">PASSWORD</label>
                  <div class=\"col-sm-5\">
                      <input type=\"password\" class=\"form-control\" name=\"password-user\" required value='".$row['PASSWORD']."'>
                  </div>
              </div>
              <div class=\"row mb-3 formele\">
                  <label class=\"col-sm-2 col-form-label labeltxt\">NAME</label>
                  <div class=\"col-sm-5\">
                      <input type=\"text\" class=\"form-control\" name=\"name\" required value='".$row['NAME']."'>
                  </div>
              </div>
              <div class=\"row mb-3 formele\">
                  <label class=\"col-sm-2 col-form-label labeltxt\">DOB</label>
                  <div class=\"col-sm-5\">
                      <input type=\"date\" class=\"form-control\" name=\"dob\" required value='".$row['DOB']."'>
                  </div>
              </div>
              <div class=\"row mb-3 formele\">
                  <label class=\"col-sm-2 col-form-label labeltxt\">GENDER</label>
                  <div class=\"col-sm-5\">
                      <select class=\"form-select\" name=\"gender\" required >
                        <option value='".$row['GENDER']."' selected>$a</option>
                          <option value=\"M\">MALE</option>
                          <option value=\"F\">FEMALE</option>
                          <option value=\"T\">TRANSGENDER</option>
                      </select>
                  </div>
              </div>
              <div class=\"row mb-3 formele\">
                  <label class=\"col-sm-2 col-form-label labeltxt\">ADDRESS</label>
                  <div class=\"col-sm-5\">
                      <input type=\"text\" class=\"form-control\" name=\"address\" required value='".$row['ADDRESS']."'>
                  </div>
              </div>
              <div class=\"row mb-3 formele\">
                  <label class=\"col-sm-2 col-form-label labeltxt\">EMAIL-ID</label>
                  <div class=\"col-sm-5\">
                      <input type=\"email\" class=\"form-control\" name=\"emailid\" required value='".$row['EMAIL_ID']."'>
                  </div>
              </div>
              <div class=\"row mb-3 formele\">
                  <label class=\"col-sm-2 col-form-label labeltxt\">MOBILE</label>
                  <div class=\"col-sm-5\">
                      <input type=\"text\" class=\"form-control\" name=\"phoneno\" required maxlength=\"10\" value='".$row['PHONE_NO']."'>
                  </div>
              </div>

              <div class=\"col-sm-2 row mb-3 float-left\">
                  <button type=\"submit\" name=\"SAVE\" class=\"btn btn-outline-dark btn-lg but\">SAVE</button>
              </div>
          </form>";
    $conn->close();
    ?>
  </div>
</div>
<div id="mySidenav" class="sidenav">
  <a href="account.php">MY ACCOUNT</a>
  <a href="flight_search_form.php">BOOK A FLIGHT</a>
  <a href="upcoming_travel.php">UPCOMING TRAVEL</a>
  <a href="travel_history.php">VIEW TRAVEL HISTORY</a>
  <a href="logout.php">LOG OUT</a>
</div>
</body>
</html>
