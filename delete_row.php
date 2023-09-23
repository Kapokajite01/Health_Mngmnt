<?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!$_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}
include_once('connect_db.php');
$id=$_GET[id];
$sql="delete from consomations where consid='$id'";
($sql);
//$rows=mysql_fetch_assoc($result);
header("location:modifications");
?>


