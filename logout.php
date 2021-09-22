<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);

   echo '<script type="text/javascript">alert("Logging out!");window.location=\'index2.html\';</script>';
   
?>
