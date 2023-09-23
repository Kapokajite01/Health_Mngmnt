<?php
session_start();
$uname = $_SESSION['uname'];
$role = $_SESSION['role'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];	
$userid = $_SESSION['userid'];
include('mydb_connection/my_connect_db.php');
if($_POST['mycaptcha'] == $_SESSION['my_captcha']){
	if($role == 'Commercial Officer'){
	header('location:commercial_loan_inbox');
	}
	else if($role=='Credit Manager'){
	header('location:q_loan_inbox');
		
	}
	else if( $role=='Credit Committee'){
	header('location:q_loan_inbox');
		
	}
	else if($role=='Branch Manager'){
	header('location:q_loan_headoffice');
		
	}
	else if($role=='Head Office Committee'){
	header('location:q_loan_headoffice');
		
	}
	else if($role=='Administrator'){
	header('location:admin_homepage');
		
	}
	else if($role=='CheifAuditor'){
	header('location:auditor_homepage');
		
	}
else if($role=='Auditor'){
	header('location:auditor_homepage');
		
	}
	else if(!$role){
		header('location:logout');
	
	}
	}
else {
	unset($_SESSION['my_captcha']);

header('location:authentication_check');

}
?>