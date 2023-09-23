<?php
//error_reporting(0);
session_start();
include_once('connect_db.php');
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username'])  or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')){
		if(($role!="Receptionist") or ($role!="Mutuelle"))
		{
      header('Location: logout');
		}
	}
$PatientId = $_POST['patientNumber'];
$destination = $_POST['destination'];
$treatement = $_POST['textarea'];
$insertCosult =mysqli_query($conn, "INSERT INTO  patientconsult(PatientID,doctorID,treatement,time_consultation)VALUES('','','',Now())");
if($destination =='Laboratoire'){
		$insconsult =  mysqli_query($conn,"INSERT INTO consultation(consultation_id,patient_id ,status,origine,time_reception ) VALUES('','$curbigid','$destination','Reservation',Now())");
	echo "<script>alert('Patient Sent to Laboratory')</script>";
echo "<script>window.location='patientLabtests';</script>";
}
if($destination =='Prescription'){
		$insconsult =  mysqli_query($conn,"INSERT INTO consultation(consultation_id,patient_id ,status,origine,time_reception ) VALUES('','$curbigid','$destination','Reservation',Now())");
	echo "<script>alert('Prescriptions')</script>";
echo "<script>window.location='patientPrescriptions';</script>";
}
?>