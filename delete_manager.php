<?php
 error_reporting(0);
 session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];
    if(!($_SESSION['sess_username']) or ($_SESSION['sess_postdsante'] !='Kulu') or ($role!="Admin")){
      header('Location: logout');
    }
include_once('connect_db.php');
$id=$_GET[manager_id];
$sql="delete from users where id='$id'";
$delte = mysqli_query($conn, $sql);

$sqlins=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Deleted User Manager',now())");	
 mysqli_query($conn, $sqlins);

header("location:admin_manager");
?>


