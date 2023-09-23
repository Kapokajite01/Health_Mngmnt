 <script type="text/javascript">
    function deleteConfirm(){
        var result = confirm("By Deleteing this amount it will be reduced from total quantity where it had impact before !");
        if(result){
            return true;
        }else{
            return false;
        }
    }
	

</script>
<?php
error_reporting(0);
    session_start();
	$_SESSION['rediredted']= 'No';
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Pharmacist"){
      header('Location: logout');
	}
	include_once('connect_db.php');

$patientnumber = $_GET['elementId'];
$medicneID = $_GET['WXN6Y2I1R2xCVm5'];
$key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
 $encrypted = $patientnumber;
 $encrypted = preg_replace('/\s+/', '+', $encrypted);
 
	
   function my_decrypt($data, $key) {
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}


$decrypted = my_decrypt($encrypted, $key);

$selectElmt = mysqli_query($conn,"SELECT medicine_id,quantity_in,buying_price,product_name,prodicts.remain FROM medicine_mvt JOIN prodicts ON prodicts.id = medicine_mvt.medicine_id  WHERE idmvt = '$decrypted'");
while($rowElmt = mysqli_fetch_array($selectElmt))
{
	$elmntName =  $rowElmt['product_name'];
	$quantity_in  =  $rowElmt['quantity_in'];
	$remain  =  $rowElmt['remain'];
	$buying_price =  $rowElmt['buying_price'];
	$medicine_id  = $rowElmt['medicine_id'];
	$qtity = $rowElmt['qtity'];
}	
	
	
	if(isset($_POST['Delete'])){
		$MedicineName = $_POST['MedicineName'];
		$unitPrice = $_POST['unitPrice'];
		$quantity = $_POST['quantity'];
		$exQuantity = $_POST['exQuantity'];
		$MedicineId = $_POST['MedicineId'];
		if($exQuantity > $quantity){
			$exQuantity=$exQuantity-$quantity;
	$UpdateElmt = mysqli_query($conn,"INSERT INTO medicine_mvt 
	(medicine_id,initial_quantity,quantity_in,buying_price,quantityout,sellingprice,fixed_quantity,remain,action,adate,orderId)
	VALUES('$medicneID','$remain','','','$quantity','$buying_price','$exQuantity','$exQuantity','Purchase Canceled',Now(),'')");
	/*if($UpdateElmt)
	{
	$update = "UPDATE prodicts SET pprice = '$unitPrice',qtity ='$quantity',remain   ='$exQuantity' WHERE id = '$MedicineId'";
$updatereq = mysqli_query($conn,$update);
	}*/
		}
	else{
		?>
	<script>	
	alert('That quantity does not exist');	
	</script>
	<?php
		
		
	}
	

	
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
	


?>
 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<title>Return Patient</title>
</head>
<body><br><br><br><br><br><br>
        <form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:250px;"  onsubmit="return deleteConfirm();">
<table><tr>
	       <td>
	        	Medicine:</td>
				<td>				    
<input type="text" class="form-control" id="MedicineName" placeholder="Medicine Name" name="MedicineName" value="<?php echo $elmntName; ?>" style="width:350px" readonly>
</td>
				   
</tr>
<tr>
	       <td>
	        	Quantity:</td>
				<td>				    
<input type="text" class="form-control" id="quantity" placeholder="quantity " name="quantity" style="width: 40%;" value="<?php echo $quantity_in; ?>" autocomplete="off" required>
<input type="text" class="form-control" id="av Quantity" placeholder="vQuantity " name="exQuantity" style="width: 40%;" value="<?php echo $remain; ?>" autocomplete="off" required>
<input type="text" class="form-control" id="av Quantity" placeholder="vQuantity " name="MedicineId" style="width: 40%;" value="<?php echo $medicine_id ; ?>" autocomplete="off" required>
</td>
				   
</tr>
<tr>
	       <td>
	        	Unit Price:</td>
				<td>				    
<input type="text" class="form-control" id="unitPrice" placeholder="Unit price " name="unitPrice"  style="width: 40%;" value="<?php echo $buying_price; ?>" autocomplete="off" required>
</td>
				   
</tr>
<tr><td>
			
	
			<br><br>
	<button type="submit" name="Delete" class="btn btn-danger"  style="float:right;"> <i class="glyphicon glyphicon-ok-sign"></i> Delete</button>
	   </td><td></td></tr></table>     
		</form>
	      </div>