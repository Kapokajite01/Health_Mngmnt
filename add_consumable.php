<html>

<?php
include_once('connect_db.php');
  
if(isset($_POST['gotoadd']))
{
	$patientID = $_POST['patientid'];
	$mydate = $_POST['mydate'];
	$cons1 = $_POST['cons1'];
	$ccons1 = $_POST['ccons1'];
	$nidc1 = $_POST['nidc1'];
	$upcons1 = $_POST['upcons1'];
	$qcosum1 = $_POST['qcosum1'];
$insert = ("INSERT INTO temp_consommable (temp_consId,patient_id ,consommable_id,cons_description,quantity,price,date) VALUES('','$patientID','$nidc1','$ccons1','$qcosum1','$upcons1','$mydate')");
$resultED = mysqli_query($conn, $insert);
	
	if ($resultED){
			echo "<script>alert('New Consumption Added')</script>";
echo "<script>window.location='consumptions';</script>";
	}
		
}
?>
