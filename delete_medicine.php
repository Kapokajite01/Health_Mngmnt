<?php
error_reporting(0);
 include_once('connect_db.php');
session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}

$id=$_GET[consid];

$query1=("update consomation set medicament ='', upmedicamnet ='' ,qtymedicamnet='' where consid='$id'");
header('Location: edit_medicine.php');
?>