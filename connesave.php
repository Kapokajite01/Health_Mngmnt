<?php

$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'fidele';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }