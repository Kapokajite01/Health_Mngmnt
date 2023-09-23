<?php
include("dbconnection.php");
$sqlmedicine ="SELECT * FROM actes WHERE id='$_GET[serviceid]'";
$qsqlmedicine = mysqli_query($con,$sqlmedicine);
$rsmedicine = mysqli_fetch_array($qsqlmedicine);
echo $rsmedicine['unit_price'];
?>