
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
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];
	
    if((!$_SESSION['sess_username']) or ($role!="Manager")){
		if($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')
		{
      header('Location: logout');
		}
	 }
include_once('connect_db.php');

$id=$_GET[id];

$query1=("select * from consommables where id='$id'");
$result = mysqli_query($conn, $query1);
while($query2 = mysqli_fetch_assoc($result)) {
$consumablename = $query2['name_consommable'];	
$consumableunitprice= $query2['purchaseprice'];			
}

if(isset($_POST['update']))
{
	$prodname= $_POST['prodname'];
	$scost= $_POST['pcost'];
	$pcost= $scost +($scost*0.2);

$sql="update consommables set name_consommable = '$prodname', purchaseprice='$scost',unit_price = '$pcost' where id='$id'";
$udate = mysqli_query($conn, $sql);
if($udate){
$sqlog=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Updated Consumable',now())");
mysqli_query($conn, $sqlog);
header("location:manage_consumable");
}

}
?>
       

</head>
<body>
	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar1.php"); ?>
	
	<!-- MAIN CONTENT -->
	
		<div class="page-full-width cf">
<form method="post" action="">
<div style=" width:35%;height:300px; position:absolute; top:53px;left:30%;border-color:FFFFFF; background:#fff5ee" >
<table><tr><td><strong>Consumable Name </strong></td><td><input type="text" name="prodname"value="<?php echo $consumablename; ?>" required="required"></td></tr>
<tr><td><strong>Unit Purchase Price</strong></td><td> <input type="text" name="pcost" value="<?php echo $consumableunitprice; ?>" required="required"></td></tr></table>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="update" value="Update">
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
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function validate(field) {
var valid = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
var ok = "yes";
var temp;
for (var i=0; i<field.value.length; i++) {
temp = "" + field.value.substring(i, i+1);
if (valid.indexOf(temp) == "-1") ok = "no";
}
if (ok == "no") {
alert("N'utilisez pas les carateres speciaux");
field.value='';
field.focus();
field.select();
   }
}
//  End -->
</script>
</html>


