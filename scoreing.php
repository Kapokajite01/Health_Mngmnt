<?php
error_reporting(0);
include('mydb_connection/my_connect_db.php');
$tracknumber = $_POST['tracknumber'];

$payhistory  = $_POST['lastpayment'];
$contractudration = $_POST['contractduration'];
$custduration = $_POST['duration'];
$sdate = $_POST['dateofbirth'];
$edate = date("Y/m/d");
$date_diff = abs(strtotime($edate) - strtotime($sdate));
$years = floor($date_diff / (365*60*60*24));
$gender = $_POST['gender'];
$status = $_POST['status'];
$activity = $_POST['emplactivity'];

if($custduration == 'new'){
$scorecustduration = 35;	
}
if($custduration == 'old'){
$scorecustduration = 75;	
}
if($custduration == 'elder'){
$scorecustduration = 95;	
}
if($payhistory =='Very Good'){
$scorehist = 100;
}
if($payhistory =='Good'){
$scorehist = 95;
}
if($payhistory =='Moderate'){
$scorehist = 50;
}
if($payhistory =='Bad'){
$scorehist = 15;
}
if($payhistory =='Very Bad'){
$scorehist = 0;
}
if($contractudration =='tooshort'){
$scoreduration = 5;
}
if($contractudration =='short'){
$scoreduration = 30;
}
if($contractudration =='medium'){
$scoreduration = 60;
}
if($contractudration =='long'){
$scoreduration = 95;
}
if($contractudration =='Undefined'){
$scoreduration = 100;
}
if($years <21){
$maturuty ="Minor";
$scoreafge = 0;
}
if($years >=21 AND $years <25){
$scoreafge = 30;
}
if($years >=25 AND $years <40){
$scoreafge = 70;
}
if($years >=40){
$scoreafge = 90;
}
if($gender == 'Mr'){
	$scoregen = 45;
}
if($gender == 'Mrs' or $gender == 'Miss'){
	$scoregen = 55;
}
if($status == 'Single'){
	$scorestatus = 35;
}
if($status == 'Married' OR $status == 'Divorced' OR $status == 'Widowed'){
	$scorestatus = 55;
}
if($activity == 'Government'){
	$scoreactivity = 100;
}
if($activity == 'NGO'){
	$scoreactivity = 75;
}
if($activity == 'Private'){
	$scoreactivity = 25;
}
$score= mysql_query(" INSERT INTO score_table (score_id,track_number,score_duration,score_hostory,score_cust_duration,score_matirity,score_age,score_gender,score_stauts,score_activity) VALUES ('','$tracknumber','$scoreduration','$scorehist','$scorecustduration','$maturuty','$scoreafge','$scoregen','$scorestatus','$scoreactivity')");
?>
