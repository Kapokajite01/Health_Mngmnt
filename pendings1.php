
<?php
error_reporting(0);
include_once('connect_db.php');
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];
      if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}
else{
	$sql=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Deleted Pendings',now())");
	}

$datesearch = $_POST['datesearch'];
if(isset($_POST['submit'])){
	$deletependings = ("delete FROM consultation  WHERE time_reception < '$datesearch'");
	$resultselect = mysqli_query($conn, $deletependings);

	if($resultselect){
		echo "<script>alert('Old Pendings  Deleted Successfully')</script>";
					    echo "<script>window.location='pendings?patientnumber= $mediid&tdat=$datecon';</script>";
	}
}

?>

