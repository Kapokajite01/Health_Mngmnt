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
	
	
if (isset($_POST["savemed"])) {
    // extract data from form; store in variable
    $id = $_POST["id"];
    $purchprice = $_POST["pprice"];
    $quantity = $_POST["quantity"];
	$origine = $_POST['origine'];
	$result = ("SELECT * FROM prodicts where id = $id")or die(mysql_error());
	while($row = mysqli_fetch_assoc( $result )) {
	$oldquantity = $row['qtity'];
	$newquantity = $oldquantity+$quantity;
	$destqty= $row['dist_quantity'];
	$remain=$newquantity-$destqty;
	}
$insert = ("insert into medicine_mvt(id,origine,quantity,buying_price,dist_quantity,fixed_quantity,remain,action,bdate)values ('$id','$origine','$quantity','$purchprice','$destqty','$newquantity','$remain','Purchase',CURDATE())");
$sql="update prodicts set qtity = '$newquantity', remain = '$remain', purchase='Today', date = CURDATE() where id='$id'";
 ($sql);
	if(($insert)&&($sql)){
		$sql1=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Purchased Medicine',now())");
	header("location:purchase_medicine");
	}
	if(!$insert){
	echo " Not Saved";		
	}


}
?>