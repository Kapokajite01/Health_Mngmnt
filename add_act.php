<html>

<?php
error_reporting(0);
include_once('connect_db.php');
  
if(isset($_POST['gotoadd']))
{
	$patientID = $_POST['patientid'];
	$mydate = $_POST['mydate'];
	$act1 = $_POST['act1'];
	$aact1 = $_POST['aact1'];
	$nidc1 = $_POST['nidc1'];
	$upacte1 = $_POST['upacte1'];
	$qacte1 = $_POST['qacte1'];
$insert = ("INSERT INTO temp_actemed (tempact_Id,patient_id ,acte_description,quantity,price,date) VALUES('','$patientID','$aact1','$qacte1','$upacte1','$mydate')");
$resultED = mysqli_query($conn, $insert);
	
	if ($resultED){
			echo "<script>alert('New Medical Act  Added')</script>";
echo "<script>window.location='medicalacts';</script>";
	}
		
}
?>
