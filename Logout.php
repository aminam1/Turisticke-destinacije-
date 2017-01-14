<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   
   echo 'Obrisali ste sesiju!';
   header('Refresh: 2; URL = index.php');
?>