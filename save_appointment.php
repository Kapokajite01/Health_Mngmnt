<?php
//error_reporting(0);
session_start();
include('connect_db.php');
	$userid = $_SESSION['sess_user_id'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username'])  or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')){
		if(($role!="Receptionist") or ($role!="Mutuelle"))
		{
      header('Location: logout');
		}
	}
	
$myusername=$_SESSION['sess_username'];
$postedesante = $_SESSION['sess_postdsante'];
	$patientID= $_POST['patient_id'];
	$fname = addslashes($_POST["patient_name"]);
	$lname =addslashes($_POST["patient_lname"]);
	$gender=$_POST["gender"];
	$telephone = $_POST['telephone'];
	$patientAge=$_POST['patientAge'];
	$province = $_POST['provinceName'];
	$district=$_POST['districtName'];
	$sector=$_POST['sectorName'];
	$cell=$_POST['cellName'];
	$dobage = $_POST['dobage'];
	$insurance= $_POST['insurancename'];
	$department = $_POST['departname'];
	$appointmentdate = $_POST['appointmentdate'];
	$apointmenttime = $_POST['apointmenttime'];
	$doctor = $_POST['doctor'];
	$doctorname = $_POST['doctorname'];
	$appreason = $_POST['appreason'];
 $sql = "INSERT INTO patient_reserv " . "(patientID,patientFname,patientLname,gender,telephone,province,district,sector,cell,Dob,insurance,department,dateAppointment,timeAppointmennt,doctid,doctorName,appointmentReason,user ) " . "VALUES('$patientID','$fname','$lname','$gender','$telephone','$province','$district','$sector','$cell','$dobage','$insurance','$department','$appointmentdate','$apointmenttime','$doctor','$doctorname','$appreason','$userid')";
$resultsave = mysqli_query($conn, $sql);
if($resultsave)
			{
echo "<script>alert('Appointment record inserted successfully...');</script>";
echo "<script>window.location='viewappointmentpending';</script>";
			
}
else{
	echo "Not Saved";
}
?>