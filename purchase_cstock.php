

<!DOCTYPE html>

<html lang="en">
<head>
		<meta char-set="utf-8" http-equiv="content-type" content="text/html;">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	
	<link rel="stylesheet" href="css/style.css">
      
	
	
	 <?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if((!$_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or ($role!="pharmacy")){
      header('Location: logout');
	}
include_once('connect_db.php');

$id=$_GET[id];

$query1=("select * from consommables where id='$id'");
$query2=mysqli_fetch_assoc($query1);

?>
       

</head>
<body>
	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar1.php"); ?>
	
	<!-- MAIN CONTENT -->
	
		<div class="page-full-width cf">
<form method="post" action="save_consumable.php">
<div style=" width:45%;height:300px; position:absolute; top:53px;left:20%;border-color:FFFFFF; background:#fff5ee" >
<h1 align="center"> Purchase Consumable</h1><hr></hr>

<table>
<tr><td><strong> </strong></td><td><input size="50px" type="text" value="<?php echo $query2['id']; ?>" name="id" required aria-required="true" aria-describedby="name-format" style="display:none" ></td></tr>
<tr><td><strong> Origine </strong></td><td><input size="50px" type="text" name="origine" id="origine" required aria-required="true" aria-describedby="name-format"></td></tr>
<tr><td><strong>Consumable Name </strong></td><td><input size="50px" type="text" name="prodname" id="prodname"  value="<?php echo $query2['name_consommable']; ?>" required aria-required="true" aria-describedby="name-format" readonly></td></tr>
<tr><td><strong>Purchase Price </strong></td><td><input size="50px" type="text" name="pprice" id= "pprice" value="<?php echo $query2['purchaseprice']; ?>" required aria-required="true" aria-describedby="name-format" readonly></td></tr>
<tr><td><strong>Quantity </strong></td><td><input size="50px" type="text" name="quantity" id="quantity" required aria-required="true" aria-describedby="name-format" autofocus onkeyup="summed1();" autocomplete="off"></td></tr>
<tr><td><strong>Total Price</strong></th><td> <input size="50px" type="text" name="total" id="total" required aria-required="true" aria-describedby="name-format" readonly></td></tr>
</table>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="savemed" value="Purchase">
</form>
</div>
		
		
		</div>   
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
<!-- FOOTER -->
	<div id="footer">
<br><br><br><br><br><br><br><br><br><br>
		<p>Powed By Vision Soft Ltd .</p>
	</div> <!-- end footer -->
</body>
<script>
function summed1() {
      var txtFirstNumberValue = document.getElementById('pprice').value;
      var txtSecondNumberValue = document.getElementById('quantity').value;
      var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('total').value = result;
      }
}
</script>
</html>


