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

if(isset($_POST['EDITappointment'])){
$recordID = addslashes($_POST['recordId']);	
$MYPAID = addslashes($_POST['patient_id']);	
$MYPNAME = addslashes($_POST['patient_name']);
$MYPLNAME = addslashes($_POST['patient_lname']);
$gender = addslashes($_POST['gender']);
$TELEPHONE = addslashes($_POST['telephone']);
$provinceName = addslashes($_POST['provinceName']);
$districtName = addslashes($_POST['districtName']);
$sectorName = addslashes($_POST['sectorName']);
$cellName = addslashes($_POST['cellName']);
$dobage = addslashes($_POST['dobage']);
$insurancename = addslashes($_POST['insurancename']);
$department = addslashes($_POST['departname']);
$MYAPTMENTDATE = addslashes($_POST['appointmentdate']);
$MYAPTIME= addslashes($_POST['apointmenttime']);
$doctoorID = $_POST['doctor'];
$MYDOCNAME = addslashes($_POST['doctorname']);
$MYREASON = addslashes($_POST['appreason']);
$Myupdate = mysqli_query($conn,"UPDATE patient_reserv SET patientID  ='$MYPAID',patientFname='$MYPNAME',patientLname ='$MYPLNAME',gender  ='$gender',telephone  ='$TELEPHONE',province ='$provinceName',district ='$districtName',sector ='$sectorName',cell ='$cellName',Dob ='$dobage',insurance ='$insurancename',department ='$department',dateAppointment ='$MYAPTMENTDATE',timeAppointmennt='$MYAPTIME',doctid ='$doctoorID',doctorName='$MYDOCNAME',appointmentReason='$MYREASON'  WHERE oatientReservID = '$recordID'");

if($Myupdate)
			{
echo "<script>alert('Appointment record updated successfully...');</script>";
echo "<script>window.location='viewappointmentpending';</script>";
			}
}

?>