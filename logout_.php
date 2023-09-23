<?php 
	session_start();
$msg = $_SESSION['error'];
	header('Location: home');
?>