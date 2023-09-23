<?php
//error_reporting (0);
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = 'fidele';
         $dbname = 'dirskhpe_rangiro';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   
         if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
         }

?>
