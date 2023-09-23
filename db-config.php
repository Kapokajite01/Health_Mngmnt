<?php

/************************ DATABASE CONNECTION  ****************************/

define ("HOSTNAME", "localhost"); // set database host
define ("USERNAME", "root"); // set database user
define ("PASSWORD","fidele"); // set database password
define ("DBNAME","dirskhpe_rangiro"); // set database name
define ("TABLENAME","consomation_upload"); // set table name to insert data

$connection = mysql_connect(HOSTNAME, USERNAME, PASSWORD) or die("Error : Connection Error ");
mysql_select_db(DBNAME, $connection) or die("Error : Database Not Found");

?>
