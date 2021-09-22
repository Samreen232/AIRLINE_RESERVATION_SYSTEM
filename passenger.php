<?php
session_start();
include "connection.php";

 $name= $_POST['name'];
 $dob= $_POST['dob'];
 $gender= $_POST['gender'];
 $age= $_POST['age'];
 $address= $_POST['address'];
 $emailid= $_POST['emailid'];
 $phoneno= $_POST['phoneno'];
 $bid= $_SESSION['bid'];

 for($i=0;$i<count($name);$i++)
 {
     $sql= "INSERT INTO passenger (BID, NAME, DOB, AGE, GENDER, ADDRESS, EMAIL_ID, PHONE_NO)
     		     VALUES ('$bid','$name[$i]','$dob[$i]','$age[$i]','$gender[$i]','$address[$i]','$emailid[$i]','$phoneno[$i]')";

    if($conn->query($sql) === TRUE){
          //echo"<script> window.alert('Passenger Inserted successfully') </script>";
    ?>
          <meta http-equiv="Refresh" content="0; url=http://localhost/airline-database/paymentdetails.html">
          <?php
        }

     else{
     echo "error";
     echo "Error: " . $sql . "<br>" . $conn->error;
     echo '<script type="text/javascript">alert("BOOKING FAILED");window.location=\'mainmenu.html\';</script>';
   }
  }
  ?>
