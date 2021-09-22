<?php
session_start();
$UID=$_SESSION['userid'];
$FID=$_SESSION['fid_chosen'];
$BID=$_SESSION['bid'];
$NOP=$_SESSION['no_of_pass'];
$b_date=date('Y-m-d');
$date = strtotime($b_date.' -2 year');
$date = date('Y-m-d', $date);

?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="refresh" content="300">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 ,shrink-to-fit = no">
	<title>INDIGO : SEARCH FLIGHTS </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="bck_gnd_user.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function addRow(tableID,tagName){
	var table = document.getElementById(tableID).getElementsByTagName(tagName)[0];
	var rowCount = table.rows.length;
  var nop = '<?php echo $NOP; ?>';
	if(rowCount < nop){
		var row = table.insertRow(rowCount);
		var colCount = table.rows[0].cells.length;
		for(var i=0; i <colCount; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
		}

		var rowCount2 = table.rows.length;
		if(rowCount2==nop){
			//alert("Maximum Passenger limit reached");
	        document.getElementById("submit_button").disabled=false;
	        document.getElementById("add_button").disabled=true;
		}
	}
}
</script>
</head>
<body>
	<div class="container-lg" p-5>
	<div class=".jumbotron  p-3 mb-4 text-black" >
	<h1>PASSENGER DETAILS</h1>
	</div>
<form method="post" action="passenger.php" class="formst" style="padding:2px;">
<table align="left" class='table table-hover table-striped table-responsive' style='backdrop-filter:blur(70px);' id="passengerTable">
  <thead>
  <tr class='formele'>
  	<th><label>Name</label></th>
    <th><label>Date of Birth</label></th>
    <th><label>Gender</label></th>
	<th><label>Age</label></th>
    <th><label>Address</label></th>
    <th><label>Email ID</label></th>
    <th><label>Phone Number</label></th>
  </tr>
</thead>
<tbody>
<tr>
	<td><input type="text" name = "name[]" required > </td>
	<td><input type="date" name = "dob[]" required value=<?php echo $date?> max= <?php echo $date?> > </td>
	<td><select  name="gender[]" required>
		<option selected>SELECT GENDER</option>
		<option value="Male">MALE</option>
		<option value="Female">FEMALE</option>
		<option value="Transgender">TRANSGENDER</option> </select></td>
	<td><input type="number" name = "age[]" required min="2" value="2"> </td>
	<td><input type="text" name = "address[]" required > </td>
	<td><input type="email" name = "emailid[]" required></td>
	<td><input type="text" name = "phoneno[]" required maxlength="10"></td>
</tr> </tbody></table>
<!--<input type="button" value="Add Passenger" id="add_button" onClick="addRow('passengerTable', 'tbody')" />
  <input type="submit" id="submit_button" value="SUBMIT" disabled>-->
	<center>

	<?php
		if($NOP==1){
			echo '<button style="background-color:#0052cc;color:white;float:left;" id="add_button" onClick="addRow(\'passengerTable\', \'tbody\')" disabled>Add Passenger</button>';
			echo "<button type='submit' id='submit_button' style='background-color:#0052cc;color:white;' >Payment</button>";
		}
		else{
		   echo '<button style="background-color:#0052cc;color:white;float:left;" id="add_button" onClick="addRow(\'passengerTable\', \'tbody\')">Add Passenger</button>';
		   echo '<button type="submit" id="submit_button" style="background-color:#0052cc;color:white;" disabled>Payment</button>';
	   }
	   ?>
</center>
<br>
</form>
</body>
</html>
