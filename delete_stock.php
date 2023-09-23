<?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
     if((!$_SESSION['sess_username']) or ($role!="Manager")){
		if($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')
		{
      header('Location: logout');
		}
	 }
include_once('connect_db.php');
$id=$_GET[id];
$sql="delete from prodicts where id='$id'";
mysqli_query($conn, $sql);

//$rows=mysql_fetch_assoc($result);
header("location:manage_medicines");
?>


