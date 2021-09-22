<?php
   session_start();
   unset($_SESSION["auserid"]);
   unset($_SESSION["apassword"]);

   echo '<script type="text/javascript">alert("Logging out!");window.location=\'index2.html\';</script>';

?>
