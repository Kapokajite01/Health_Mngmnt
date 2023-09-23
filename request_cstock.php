

<!DOCTYPE html>

<html lang="en">
<head>
		<meta char-set="utf-8" http-equiv="content-type" content="text/html;">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">
        
	 <?php
session_start();
 $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Pharmacist"){
      header('Location: logout');
    }
include_once('connect_db.php');

$id=$_GET[id];

$query1=("select * from consommables where id='$id'");
$query2=mysqli_fetch_assoc($query1);

if(isset($_POST['update']))
{
	$prodname= $_POST['name_consommable'];
	$pcost= $_POST['upcost'];
	$scost= $pcost* 1.2;

$sql="update prodicts set product_name= '$prodname',pprice='$pcost',unit_price = '$scost' where id='$id'";
($sql);
if($sql){
	echo "Updated Successfuly";
}
header("location:purchase_consumable.php");

}
?>
       

</head>
<body>
	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar1.php"); ?>
	
	<!-- MAIN CONTENT -->
	
		<div class="page-full-width cf">
<form method="post" action="save_reqconsumable.php">
<div style=" width:45%;height:300px; position:absolute; top:53px;left:20%;border-color:FFFFFF; background:#fff5ee" >
<h1 align="center"> Request Consumable For Distribution</h1><hr></hr>
<table>
<tr><td><strong> </strong></td><td><input size="50px" type="text" value="<?php echo $query2['id']; ?>" name="id" required aria-required="true" aria-describedby="name-format" style="display:none"></td></tr>
<tr><td><strong>Consumable Name </strong></td><td><input size="50px" type="text" name="prodname" id="prodname"  value="<?php echo $query2['name_consommable']; ?>" required aria-required="true" aria-describedby="name-format" readonly></td></tr>
<tr><td><strong>Rest</strong></th><td> <input size="50px" type="text" name="rest" id="rest" required aria-required="true" aria-describedby="name-format" readonly></td></tr>
<tr><td><strong>Availble Quantity </strong></td><td><input size="50px" type="text" name="avquantity" id="avquantity" value="<?php echo $query2['reamin']; ?>" readonly required aria-required="true" aria-describedby="name-format"  autocomplete="off"></td></tr>
<tr><td><strong>Request </strong></td><td><input size="50px" type="text" name="request" id="request" required aria-required="true" aria-describedby="name-format" autofocus onkeyup="summed1();" autocomplete="off" autofocus onkeyup="summed1();"></td></tr>

</table>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="savemed" value="Request">
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
      var txtFirstNumberValue = document.getElementById('avquantity').value;
      var txtSecondNumberValue = document.getElementById('request').value;
	  var resvalue=parseFloat(txtFirstNumberValue);
      var result = parseFloat(txtFirstNumberValue) - parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('rest').value = result;
		 if(result <= 0){
         document.getElementById('request').value = txtFirstNumberValue;
	     document.getElementById('rest').value = 0;
		 
		 }
      }
}
</script>
</html>


