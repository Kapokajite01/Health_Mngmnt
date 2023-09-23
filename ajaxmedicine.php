<?php
include("dbconnection.php");
$sqlmedicine ="SELECT * FROM prodicts WHERE id='$_GET[medicineid]'";
$qsqlmedicine = mysqli_query($con,$sqlmedicine);
$rsmedicine = mysqli_fetch_array($qsqlmedicine);
echo $rsmedicine['unit_price'];
?>