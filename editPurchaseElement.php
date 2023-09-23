 <script type="text/javascript">
    function deleteConfirm(){
        var result = confirm("Do you really want to Edit ?");
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
$key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
 $encrypted = $patientnumber;
 $encrypted = preg_replace('/\s+/', '+', $encrypted);
 
	
   function my_decrypt($data, $key) {
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}


$decrypted = my_decrypt($encrypted, $key);
$selectElmt = mysqli_query($conn,"SELECT medicine_id,quantity_in,buying_price,product_name  FROM medicine_mvt JOIN prodicts ON prodicts.id = medicine_mvt.medicine_id  WHERE idmvt = '$decrypted'");
while($rowElmt = mysqli_fetch_array($selectElmt))
{
	$elmntName =  $rowElmt['product_name'];
	$quantity_in  =  $rowElmt['quantity_in'];
	$buying_price =  $rowElmt['buying_price'];
}	
	
	
	if(isset($_POST['update'])){
		$MedicineName = $_POST['MedicineName'];
		$unitPrice = $_POST['unitPrice'];
		$quantity = $_POST['quantity'];
	$UpdateElmt = mysqli_query($conn,"UPDATE medicine_mvt SET quantity_in = '$quantity',buying_price ='$unitPrice' WHERE idmvt = '$decrypted'");
	/*if($insertOrder){
		$selectLastId = mysqli_query($conn,"SELECT orderId FROM Orders  order by orderId DESC LIMIT 1");
	$row = mysqli_fetch_row($selectLastId);
	$orderNumber =  $row[0];
			$updateProducts = mysqli_query($conn,"UPDATE prodicts SET  Noumber  = '$orderNumber'");
	}*/

	
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
	        <button type="submit" name="update" class="btn btn-success"  style="float:right;"> <i class="glyphicon glyphicon-ok-sign"></i> Edit</button>
	   </td><td></td></tr></table>     
		</form>
	      </div>