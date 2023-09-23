<?php 
include_once('connect_db.php');
	session_start();
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];
	$sql=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Logout',now())");
	session_destroy();
	header('Location: index');
?>