<?php 
   session_start();
   session_destroy();
   header("location: /Hahalolo/process/login.php");
?>