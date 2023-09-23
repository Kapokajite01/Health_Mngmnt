<?php
error_reporting(0);
session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
	$postedesante = $_SESSION['sess_postdsante'];
	$user=$_SESSION['sess_username'];

     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="CPN"){
      header('Location: logout');
	}
	
include_once('connect_db.php');

$_SESSION['consultation']=$_POST["consultation"];
	$_SESSION['pid']= $_POST["p_id"];
$pid=$_SESSION['pid'];
	$num=$_SESSION['num'];
	$ins=$_SESSION['ins'];
    $myndate = $_POST['thisdate'];
	$patient = $_POST["p_id"];	
	$destination = $_POST['destination'];
	$cas = $_POST['cas'];

	$_SESSION['fichetrasnfert'] =$_POST['List1'];
$_SESSION['fichedeconsultation']=$_POST['List3'];
$_SESSION['nulltm']=$_POST['List4'];
$ins=$_SESSION['ins'];

		$UPDATEstatus= "UPDATE consultation SET status  = 'Laboratoire',origine = 'CPN' WHERE  	patient_id   ='$patient' and time_reception = '$myndate'"; 
		mysqli_query($conn,$UPDATEstatus);
		/*$UPDATEcas= "UPDATE patient SET cas  = '$cas' WHERE  	id   ='$patient'"; 
		mysqli_query($conn,$UPDATEcas);*/

		echo "<script>alert('Patient Saved and Sent to Laboratory')</script>";
echo "<script>window.location='cprenatale';</script>";			
				

				
	
		?>