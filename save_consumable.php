<?php
error_reporting(0);
include_once('connect_db.php');
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];
//error_reporting(0);
if (isset($_POST["savemed"])) {
    // extract data from form; store in variable
    $idc1 = $_POST["id"];
    $upc1 = $_POST["pprice"];
    $qtc1 = $_POST["quantity"];
	$origine = $_POST['origine'];
	$result = ("SELECT * FROM consommables where id = $idc1")or die(mysql_error());
	while($row = mysqli_fetch_assoc( $result )) {
	$oldquantityc = $row['qntity'];
	$newquantityc = $oldquantityc+$qtc1;
	$destqtyc= $row['dist_quantity'];
	$remainc=$newquantityc-$destqtyc;

	}

$insertc = ("insert into consomable_mvt(id,origine,qtytin,bying_price,dist_quantity,qntity,remain,movment,bdate)values ('$idc1','$origine','$qtc1','$upc1','$destqtyc','$newquantityc','$remainc','Purchase',CURDATE())");
	$sql="update consommables set qntity = '$newquantityc' ,reamin='$remainc', purchase= 'Today', date = CURDATE() where id='$idc1'";
		($sql);
	if(($insertc)AND($sql)) {
		$sql1=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Purchased Consumable',now())");
	header("location:purchase_consumable");
	}
	if((!$insertc)AND (!$sql)){
	echo "Not Saved";	}
}
?>