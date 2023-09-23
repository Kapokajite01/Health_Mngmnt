<?php
error_reporting(0);
include_once('connect_db.php');
if (isset($_POST["comment"])) {
	session_start();
$date =$_SESSION['dt'];
$date1 =$_SESSION['dt1'];

$consid = $_POST['consid'];
$pid = $_POST['pid'];
$cons=300;
$date = $_POST['date'];
$insnumber = $_POST['insumber'];
$lab= $_POST['lab'];
$pricelab= $_POST['pricelab'];
$qtylab= $_POST['qtylab1'];
$acte= $_POST['actes'];
$priceacte= $_POST['priceacte'];
$qtyacte= $_POST[qtyeacte];
$cons=$_POST['cons'];
$pricecons= $_POST['pricecons'];
$qtycons= $_POST['qtycons'];
$medicament = $_POST['medicine'];
$pricemed= $_POST['pricemedicine'];
$qtymed= $_POST['qtymedicine']; 
$comment= $_POST['comments'];
$insert3 = ("INSERT INTO verification (consid,id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,actemedicale,upacte,qtyacte,examenmedicale,upexamen,qtyexamen,datecunsuption,comments,date_comment)VALUES('$consid','$pid','$consu','$medicament','$pricemed','$qtymed','$cons','$pricecons','$qtycons','$acte','$priceacte','$qtyacte','$lab','$pricelab','$qtylab','$date','$comment',CURDATE())");
$sql="update consomation set comments= '$comment',datecomented= CURDATE() where consid=$consid";
($sql);
header("location:verification_mutuelle11");

}
?>