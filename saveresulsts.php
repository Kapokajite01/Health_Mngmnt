<?php
error_reporting(0);
    session_start();
	$userId = $_SESSION['sess_user_id'];
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Laboratory"){
      header('Location: logout');
	}
include_once('connect_db.php');
$postedesante = $_SESSION['sess_postdsante'];
$patientid = $_POST['p_id'];
$datecons = $_POST['thisdate'];
$number = $_POST['testid'];
$result = $_POST['result'];
$exnumber = $_POST['exnumber'];
$nresults = COUNT($result);
for($ires = 0; $ires < $nresults; $ires++){
	
$upresult0= "UPDATE consom_labs SET results  = '$result[$ires]',examen_id = '$exnumber[$ires]',technid = '$userId'  WHERE lbaconsid   ='$number[$ires]'"; 
		$inserted = mysqli_query($conn,$upresult0);	
	
}

if($inserted){
$UPDAline0= "UPDATE consultation SET status  = 'Results' WHERE  	patient_id   ='$patientid' and time_reception = '$datecons'"; 
		mysqli_query($conn,$UPDAline0);
				echo "<script>alert('Results  Saved sucessfully')</script>";
echo "<script>window.location='laboratory';</script>";
}
else{
			echo "<script>alert('No Result Saved')</script>";
echo "<script>window.location='laboratory';</script>";	
	
	
}
?>