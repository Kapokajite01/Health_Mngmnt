<html>

<?php
include_once('connect_db.php');
  
if(isset($_POST['gotoadd']))
{
	$patientID = $_POST['patientid'];
	$mydate = $_POST['mydate'];
	$hosp1 = $_POST['ex1'];
	$hhosp1 = $_POST['hhosp1'];
	$uphosp1 = $_POST['uphosp1'];
	$qhosp1 = $_POST['days'];
	$fHate = $_POST['qhosp1'];
	$lhosp2 = $_POST['qhosp2'];

$insert = ("INSERT INTO temp_hospitlzation (temp_hospId,patient_id ,temphospdescr,quantity,price,firstHosp,lastHost,date) VALUES('','$patientID','$hhosp1','$qhosp1','$uphosp1','$fHate','$lhosp2','$mydate')");
$resultED = mysqli_query($conn, $insert);
	
	if ($resultED){
			echo "<script>alert('New Hospitalization  Added')</script>";
echo "<script>window.location='hospitalizations';</script>";
	}
		
}
?>
