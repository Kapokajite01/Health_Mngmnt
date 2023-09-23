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
$query1=("select * from consomable_mvt where idmvt='$id'");
$query2=mysqli_fetch_assoc($query1);
   $authorize = $_POST['authorizec'];
   $aut=$query2['authorize'];
   $newauth=$authorize+$aut;
   $dist= $query2['dist_quantity'];
   $newfix=$query2['qntity'];
   $rem= $query2['remain'];
   $newrem=$rem-$authorize;
   $newdist=$dist+$authorize;
   $date1=$query2['bdate'];
   $id1= $query2['id'];
   echo" <br>Authorize". $authorize;
   echo" <br>Distribution". $dist;
   echo" <br>New Dist".$newdist;
   echo" <br>Fixe". $newfix;
   echo" <br>Total". $authorize;
$sql="update consomable_mvt set authorize = '$authorize',dist_quantity='$newdist',qntity='$newfix', 
	remain='$newrem',movmentb = 'Authorize', adate = CURDATE() where idmvt='$id'";
	($sql);
 $sql1="update consommables set dist_quantity='$newdist',qntity ='$newfix', reamin='$newrem' where id='$id1'";
 ($sql1);

	if(($sql) AND ($sql1)){
		$sql1=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Authorized Consumables',now())");
	header("location:authorize_consumable?vals=$date1");
	echo "Saved";		
	}
	if(!$sql){
	echo " Error Not Authorized";		
	}
}
?>