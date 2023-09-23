<?php
error_reporting(0);
include_once('connect_db.php');
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];

    if(!$_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Stock"){
      header('Location: logout');
	}
    $id = $_POST["id"];
if (isset($_POST["savemed"])) {
$query1=("select * from medicine_mvt where idmvt='$id'");
$query2=mysqli_fetch_assoc($query1);
   $authorize = $_POST['authorize'];
   $aut=$query2['authorize'];
   $newauth=$aut+$authorize;
   $dist= $query2['dist_quantity'];
   $newfix=$query2['fixed_quantity'];
   $rem= $query2['remain'];
   $newrem=$rem-$authorize;
   $newdist=$dist+$authorize;
   $date1=$query2['bdate'];
   $id1= $query2['id'];
$sql="update medicine_mvt set authorize = '$authorize',dist_quantity='$newdist',fixed_quantity='$newfix', 
remain='$newrem',actionb = 'Authorize', adate = CURDATE() where idmvt='$id'";
 ($sql);
 $sql1="update prodicts set dist_quantity='$newdist',qtity='$newfix',remain='$newrem' where id='$id1'";
 ($sql1);

	if($sql){
		$sql1=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Authorized Medicine',now())");
	header("location:authorize_medicine?vals=$date1");
	echo "Saved";		
	}
	if(!$sql){
	echo " Not Authorized";		
	}

}
?>