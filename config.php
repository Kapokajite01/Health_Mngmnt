<?php

/* Database Connection */

 $sDbHost = 'localhost';
 $sDbName = 'dirskhpe_rangiro';
 $sDbUser = 'root';
 $sDbPwd  = 'fidele';

$dbConn = mysqli_connect ($sDbHost, $sDbUser, $sDbPwd) or die ('MySQL connect failed. ' . mysqli_error());
mysqli_select_db($sDbName,$dbConn) or die('Cannot select database. ' . mysqli_error());

?>
