 <script type="text/javascript">
    function deleteConfirm(){
        var result = confirm("Do you really want to add new Order?");
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
  

	if(isset($_POST['saveredirect'])){
		$newOrder = $_POST['newOrder'];
		$dateorder = $_POST['dateorder'];
		$supplier = $_POST['supplier'];
	$insertOrder = mysqli_query($conn,"INSERT INTO Orders (orderId,origine,dateOfOrder)VALUES('','$supplier','$dateorder')");
	if($insertOrder){
		$selectLastId = mysqli_query($conn,"SELECT orderId FROM Orders  order by orderId DESC LIMIT 1");
	$row = mysqli_fetch_row($selectLastId);
	$orderNumber =  $row[0];
			$updateProducts = mysqli_query($conn,"UPDATE prodicts SET  Noumber  = '$orderNumber'");
	}

	
	?>

<script type='text/javascript'>
 window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
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
<body>
<div align="center">
<form method="post" action=""  onsubmit="return deleteConfirm();">
				<h3> New Order</h3><hr>
<select class="box" name="newOrder" id="destination" required >
      <option value="">--New Order ----</option>
      <option value = 'Laboratoire'>New Order</option>

    </select><br>
	Date:<input type="date" name="dateorder" placeholder="Date of Order" required> 
	
	<br><br>
	Supplier:<input type="text" name="supplier" placeholder="Supplier" required> 
	
	<br><br>
	<input type="submit" name="saveredirect" value="Save Order">
	</form></div>