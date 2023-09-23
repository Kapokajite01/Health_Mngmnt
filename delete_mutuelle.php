<?php
error_reporting(0);
    session_start();
    $role = $_SESSION['sess_userrole'];
		$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];
 
    if(!$_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Admin"){
      header('Location: logout');
    }
include_once('connect_db.php');
$id=$_GET[skeeper_Id];
$sql="delete from users where id='$id'";
($sql);
$sql=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Deleted User Mutuelle',now())");	
header("location:admin_mutuelle");
?>


