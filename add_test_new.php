<?php
session_start();

include_once('connect_db.php');
  $user=$_SESSION['sess_username'];
if(isset($_POST['gotoadd']))
{
	$patientID = $_POST['patientid'];
	$mydate = $_POST['mydate'];
	$nid1 = $_POST['ex1'];
	$examen1 = $_POST['eex1'];
	$id1 = $_POST['id1'];
	$upexamen1 = $_POST['upex1'];
	$quantexamen1 = $_POST['qex1'];
	$sql1 = ("SELECT  examen_id  FROM consom_labs WHERE examen_id= '$nid1' AND YEAR(time_test)= YEAR(CURDATE())");
$result1 = mysqli_query($conn, $sql1);
$num_rows1 = mysqli_num_rows($result1);
$num_rows1 = $num_rows1+1;



$test1 = "INSERT INTO consom_labs(lbaconsid,patient_id,examen_id,examen,examen_qty,examen_price,user,time_test,Noexamen) VALUES('','$patientID','$nid1','$examen1','$quantexamen1','$upexamen1','$user','$mydate','$num_rows1')";
$inserttEST1 = mysqli_query($conn, $test1);

if ($inserttEST1){
			echo "<script>alert('New Test Added')</script>";
echo "<script>window.location='labtests_new';</script>";
	}
	}	

?>