

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
    if(!$_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Stock"){
      header('Location: logout');
	}
include_once('connect_db.php');

$id=$_GET[id];

$query1=("SELECT consommables.id,consommables.name_consommable,consomable_mvt.request_qty,consomable_mvt.idmvt,consomable_mvt.dist_quantity,consomable_mvt.qntity,
			consomable_mvt.remain,consomable_mvt.movment,consomable_mvt.bdate FROM consomable_mvt JOIN consommables ON consomable_mvt.id= consommables.id where idmvt='$id'");
$query2=mysqli_fetch_assoc($query1);

?>
      
       

</head>
<body>
	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar1.php"); ?>
	
	<!-- MAIN CONTENT -->
	
		<div class="page-full-width cf">
<form method="post" action="save_auth_consumable.php">
<div style=" width:45%;height:300px; position:absolute; top:53px;left:20%;border-color:FFFFFF; background:#fff5ee" >
<h1 align="center"> Authorize Consumable For Distribution</h1><hr></hr>
<table>
<tr><td><strong> </strong></td><td><input size="50px" type="text" value="<?php echo $query2['idmvt']; ?>" name="id" required aria-required="true" aria-describedby="name-format" style="display:none"></td></tr>
<tr><td><strong>Conusumable Name </strong></td><td><input size="50px" type="text" name="prodname" id="prodname"  value="<?php echo $query2['name_consommable']; ?>" required aria-required="true" aria-describedby="name-format" readonly></td></tr>
<tr><td><strong>Requested</strong></th><td> <input size="50px" type="text" name="requested" id="requested" value="<?php echo $query2['request_qty']; ?>" required aria-required="true" aria-describedby="name-format" readonly></td></tr>
<tr><td><strong>Rest</strong></th><td> <input size="50px" type="text" name="rest" id="rest" required aria-required="true" aria-describedby="name-format" readonly></td></tr>
<tr><td><strong>Availble Quantity </strong></td><td><input size="50px" type="text" name="avquantity" id="avquantity" value="<?php echo $query2['qntity']; ?>" readonly required aria-required="true" aria-describedby="name-format"  autocomplete="off"></td></tr>
<tr><td><strong>Authorize </strong></td><td><input size="50px" type="text" name="authorizec" id="request" required aria-required="true" aria-describedby="name-format" autofocus autocomplete="off" autofocus ></td></tr>

</table>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="savemed" value="Authorize Consumable">
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


