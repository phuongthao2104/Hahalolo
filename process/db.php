<?php
   $host='localhost';
   $username='root';
   $password='';
   $dbname = "db_hahalolo";
 
    $conn=mysqli_connect($host,$username,$password,$dbname);
    if(!$conn){
        die('Could not Connect MySql Sever');
    }

?>