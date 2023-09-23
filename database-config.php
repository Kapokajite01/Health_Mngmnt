<?php
   // define database related variables
   $database = 'dirskhpe_rangiro';
   $host = 'localhost';
   $user = 'root';
   $pass = 'fidele';

   // try to conncet to database
   $dbh = new PDO("mysqli:dbname={$database};host={$host};port={3306}", $user, $pass);

   if(!$dbh){

      echo "unable to connect to database";
   }
   
?>