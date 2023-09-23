<?php
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];

  if((!$_SESSION['sess_username']) or ($role!="Manager")){
		if($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')
		{
      header('Location: logout');
		}
	 }
include_once('connect_db.php');
$id=$_GET[id];
$sql="delete from examens where id='$id'";
mysqli_query($conn, $sql);
//$rows=mysql_fetch_assoc($result);
header("location:manage_lab_test");
?>


