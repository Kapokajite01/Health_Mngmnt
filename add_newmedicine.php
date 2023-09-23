<?php
error_reporting(0);
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Consultation"){
		 if($role!="Maternite") 
		 {
			if  ($role!="Family_planning")
			{
			if  ($role!="CPN")
			{
			      header('Location: logout');
			}
			}
		 
		 }
	}
include_once('connect_db.php');
$postedesante = $_SESSION['sess_postdsante'];
	
  
if(isset($_POST['gotoadd']))
{
	$patientID = $_POST['patientid'];
	$mydate = $_POST['mydate'];
	$avel1= $_POST['avel1'];
	$glstock= $_POST['totRequested'];
	$request = $_POST['requested'];
	$newstock = $_POST['totmed1'];
	$med1 = $_POST['med1'];
	$mmed1 = $_POST['mmed1'];
	$qmed1 = $_POST['qmed1'];
	$chekRest = $avel1 - $qmed1;
	$chekRequest = $request + $qmed1;
	$nid1 = $_POST['nid1'];
	$up1 = $_POST['up1'];
	$usage = $_POST['medusage'];
	$mmed1 = $mmed1.'  ['.$usage.'] ';
	$fixedqty = $_POST['fixedqty'];
	if(($chekRest == $newstock)and ($glstock == $chekRequest))
	{
$insert = ("INSERT INTO temp_medicament (temp_id,patient_id ,medicament_id,medicament_descript,quantity,price,date ) VALUES('','$patientID','$nid1','$mmed1','$qmed1','$up1','$mydate')");
$resultED = mysqli_query($conn, $insert);
	
	if ($resultED){
		
		$insertmvt = "INSERT INTO medicine_mvt (idmvt,medicine_id,initial_quantity,request_qty ,sellingprice,dist_quantity,fixed_quantity,remain,action,adate) VALUES('','$nid1','$avel1','$qmed1','$up1','$glstock','$fixedqty','$newstock','Request','$mydate')";
$insMvtRes = mysqli_query($conn,$insertmvt);
$UpdteProd = mysqli_query($conn,"UPDATE prodicts SET dist_quantity ='$glstock', request_qty  = '$qmed1',remain = '$newstock',date  = '$mydate' WHERE id= '$nid1'");
	if($insertmvt)
	{		
			echo "<script>alert('New Medicine Added')</script>";
echo "<script>window.location='medicines';</script>";
	}
	else{
	echo "<font color='red'>Medicine not Recorded Try again</font>";	
	}
	}	
	}
	else
	{
	?>
	<script> alert('Stock values not matching');</script>	
	<?php
	echo "<font color='red'>Medicine not Recorded Try again</font>";	

	}
		
}
?>
