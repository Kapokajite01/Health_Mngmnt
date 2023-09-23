<?php 
error_reporting(0);
session_start();
include('mydb_connection/my_connect_db.php');
include'mydb_connection/My_dbinsert.php';
include'mydb_connection/my_dbconnection.php';
$uname = $_SESSION['uname'];
$userid = $_SESSION['userid'];
if(!$userid){
	header('location:logout');
}
$resultusers = "select * from users_table WHERE id = '$userid'";
$result16r = $conn_db->query($resultusers);
if ($result16r->num_rows > 0) {
while($rowval = $result16r->fetch_assoc()) {
$_SESSION['account'] = $rowval['telephone'];
$_SESSION['role'] = $rowval['role'];
$_SESSION['lname'] = $rowval['lname'];
$_SESSION['fname'] = $rowval['First_Nmae'];
$email = $rowval['email'];	
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];	
$account = $_SESSION['account'];
$role = $_SESSION['role'];
}
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$idnumber = $_POST['idnumber'];
$telephone = $_POST['telephone'];
$DOBDay = $_POST['DOBDay'];
$DOBMonth = $_POST['DOBMonth'];
$DOBYear = $_POST['DOBYear'];
$dateofbirth = $DOBYear.'-'.$DOBMonth.'-'.$DOBDay;

$palcebirth = $_POST['palcebirth'];
$gender = $_POST['gender'];
$status = $_POST['status'];
$provinceName = $_POST['provinceName'];
$disrictName = $_POST['disrictName'];
$sectorName = $_POST['sectorName'];
$cellName = $_POST['cellName'];
$village = $_POST['village'];
$randomid = mt_rand(100000,999999); 
$insertncust= " INSERT INTO customers (id,names,lname,id_number,telephone,gender,dob,placebirth,province,district,sector,cell,village,affiliate_number) VALUES ('','$firstname','$lastname','$idnumber','$telephone','$gender','$dateofbirth','$palcebirth','$provinceName','$disrictName','$sectorName','$cellName','$village','$randomid')";
$newcusinserted = $conn->query($insertncust);
if($newcusinserted ){
echo "<script>alert('New Cusomer Saved Successfully')</script>";
echo "<script>window.location='account_check';</script>";
}

?>