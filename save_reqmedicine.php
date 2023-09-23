<?php
session_start();
include_once('connect_db.php');
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Pharmacist"){
      header('Location: logout');
    }
    $id = $_POST["id"];
if (isset($_POST["savemed"])) {
$query1=("select * from prodicts where id='$id'");
$query2=mysqli_fetch_assoc($query1);
	$req=$query2['request_qty'];
	$qtyrequest =$_POST["request"];
	$dist= $query2['dist_quantity'];
	$block= $query2['qtity'];
	$rem= $query2['remain'];
	$requested = $query2['requested'];
$insert = ("insert into medicine_mvt(id,request_qty,dist_quantity,fixed_quantity,remain,action,bdate)values ('$id','$qtyrequest','$dist','$block','$rem','Request',CURDATE())");
$sql="update prodicts set request_qty = '$qtyrequest', action = 'Requested', date = CURDATE() where id='$id'";
 ($sql);
	if($insert){
			$sql=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Requested Medicine',now())");

	header("location:request_medicine");
	echo "Saved";		
	}
	if(!$insert){
	echo " Not Saved";		
	}
	echo $dist;


}
?>