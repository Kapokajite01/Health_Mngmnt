<?php
error_reporting(0);
    session_start();
	$_SESSION['date']=$_POST['datesearch'];
	$_SESSION['date1']=$_POST['datesearch1'];
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or ($role!="Manager")){
      header('Location: logout');
	  
	}
include_once('connect_db.php');
$modid=$_GET[modid];
$result = ("SELECT verificationID,consid FROM verification WHERE verificationID='$modid'");
$query=mysqli_fetch_assoc($result);
$vid=$query['verificationID'];
$consid= $query['consid'];
/*echo "Good";
echo $vid.'<br>';
echo $consid;*/
$sql="delete from consomation where consid='$consid'";
($sql);
$sql1="delete from verification where verificationID='$vid'";
($sql1);
header("location:modifications1");
?>


