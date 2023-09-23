
<?php
//error_reporting(0);
    session_start();
	$_SESSION['rediredted']= 'No';
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')){
      header('Location: logout');
	}
include_once 'connect_db.php';
$numbertest = $_GET['affideleTE'];
$rowid = $_GET['rowid'];
$medId = $_GET['medId'];
$resultret = ("SELECT * FROM temp_medicament WHERE temp_id='".$rowid."'");
$pat = mysqli_query($conn, $resultret);
while ($row = mysqli_fetch_assoc($pat)) {
$medic = $row['medicament_descript'];
$qty = $row['quantity'];
$price = $row['price'];
}
if(isset($_POST['deletetest'])){

	
$testdelete = mysqli_query($conn,"DELETE FROM temp_medicament WHERE temp_id='".$rowid."'");
	if($testdelete){
		
$thisMed = ("SELECT remain,pprice  FROM prodicts WHERE id='".$medId."'");
$patMed = mysqli_query($conn, $thisMed);
$dataMed = mysqli_fetch_array($patMed); 
	$byingPrice = $dataMed['pprice'];
    $newValue = $dataMed['remain']+$qty ;
$medMvmt  = ("SELECT initial_quantity,dist_quantity,fixed_quantity,remain   FROM medicine_mvt WHERE medicine_id ='".$medId."' order by idmvt DESC LIMIT 1");
$patMedMvt = mysqli_query($conn, $medMvmt);
$dataMedMvt = mysqli_fetch_array($patMedMvt); 
 $fixedqty = $dataMedMvt['fixed_quantity'];
 $dist_quantity  = $dataMedMvt['dist_quantity'];
 $nnewdistqty = $dist_quantity-$qty;
 echo "<br>Fixed qty MVT ".$fixedqty;
 $mvtRmain = $dataMedMvt['remain'];
  echo "<br>Remain qty MVT ".$mvtRmain;

 $newRmain = $mvtRmain + $qty;
  echo "<br>DISTRIBUTION  MVT".$nnewdistqty;

$insertMvt = ("INSERT INTO medicine_mvt (idmvt,medicine_id,initial_quantity,quantity_in ,buying_price,dist_quantity,fixed_quantity,remain,action,adate)
 VALUES('','$medId','$mvtRmain','$qty','$byingPrice','$nnewdistqty','$fixedqty','$newRmain','Returned',now())");
 $insertedMvt = mysqli_query($conn, $insertMvt);
 if($insertedMvt){
	 
$UpdteProd = mysqli_query($conn,"UPDATE prodicts SET dist_quantity ='$nnewdistqty', request_qty  = '$qty',remain = '$newRmain'  WHERE id ='".$medId."'");

 }
echo '<br> QTY'.$qty;
echo '<br> New VAL'.$insertMvt;
	?>	
		
	<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
</script>
<script type='text/javascript'>
         self.close();
    </script>
		
	<?php	
	}

}

?>
 <script type="text/javascript">
    function deleteConfirm(){
        var result = confirm("You delete records, The value returned to distribution stock?");
        if(result){
            return true;
        }else{
            return false;
        }
    }
	

</script>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<title>Return Patient</title>
</head>
<body>
<div align="center">
<form method="post" action=""  onsubmit="return deleteConfirm();">
				<p><strong>You are about to delete :</strong></p><hr>
				<table>
	<table>
	<tr><td><label>Medicine</label> </td><td>&nbsp;&nbsp;<?php echo $medic;?></td></tr>	
	<?php 
	if($qty)
	{
	?>
	<tr><td><label>Quantity</label> </td><td>&nbsp;&nbsp;<?php echo $qty?></td></tr>
<?php 
	}
	else{
		
?>	
	<tr><td><label><font color="red">Quantity</font></label> </td><td>&nbsp;&nbsp;<font color="red">No value<//font></td></tr>
<?php
		}
?>
	<tr><td><label>Price</label> </td><td>&nbsp;&nbsp;<?php echo $price;?></td></tr>	
	</table>

<input type="submit" name="deletetest" value=" Delete">
	</form></div>