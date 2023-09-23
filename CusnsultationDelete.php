<?php
error_reporting(0);
session_start();
include_once('connect_db.php');
	$userid = $_SESSION['sess_user_id'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username'])  or ($_SESSION['dirskhpe_kibingo'] !='dirskhpe_kibingo')){
		if(($role!="Receptionist"))
		{
      header('Location: logout');
		}
	}
    include_once('connect_db.php');

	if($_POST['check']){
		
	$checkbox = $_POST['check'];
	$numberChecks = count($checkbox);
	for($ijk=0;$ijk<$numberChecks;$ijk++){
	$del_id = $checkbox[$ijk]; 
	$deletion = mysqli_query($conn,"DELETE FROM consultation  WHERE consultation_id='".$del_id."'");
   }
	echo "<script>alert('$numberChecks  Selection(s) Deleted Successfully')</script>";
echo "<script>window.location='m_reception';</script>";	
	
	}
	else{

echo "<script>alert('No selection')</script>";

echo "<script>window.location='m_reception';</script>";	
  
  }		

?>
