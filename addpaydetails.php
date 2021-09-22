<?php
session_start();

include "connection.php";

$CCN= $_POST['ACCNO'];
$CVV= $_POST['CVV'];
$EXPDATEX= $_POST['EXPDATE'];
$day = 1;

$EXPDATEX = strftime("%F", strtotime($EXPDATEX."-".$day));
$EXPDATE = date("Y-m-t", strtotime($EXPDATEX ));

$UID=$_SESSION['userid'];
$TRANSSTS = "DUE";
$TRANSID = rand();
$BID=$_SESSION['bid'];
$CDATE = date('Y-m-d');
//$date1 = strtotime($EXPDATE);
//$date2 = strtotime($CDATE);

if($EXPDATE >= $CDATE){
    $sql = " SELECT * FROM payment WHERE trans_id = '".$TRANSID."' ";
    $result = $conn->query($sql);
    while($result->num_rows > 0){
        $TRANSID = rand();
        $result = $conn->query($sql);
    }
    $_SESSION['TRANSID']=$TRANSID;

    $sql= "INSERT INTO payment (TRANS_ID, UID,BID, CREDIT_CARD_NO, CVV, EXP_DATE, TRANS_STATUS)
    		VALUES ('$TRANSID', '$UID','$BID', '$CCN', '$CVV', '$EXPDATE', '$TRANSSTS')";

    if($conn->query($sql) === TRUE){
            	echo '<script type="text/javascript">alert("PROCEEDING TO PAYMENT PAGE");window.location=\'confirmpayment.php\';</script>';
    }

}
else{
echo '<script type="text/javascript">alert("PAYMENT FAILED (CARD EXPIRED)");window.location=\'paymentdetails.html\';</script>';
}
$conn->close();
?>
