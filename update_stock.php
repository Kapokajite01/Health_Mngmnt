

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

$query1=("select * from prodicts where id='$id'");
$result = mysqli_query($conn, $query1);
			while($query2 = mysqli_fetch_assoc($result)) {
 $producname = $query2['product_name'];
	$priceproduct = $query2['pprice'];		
			}

if(isset($_POST['update']))
{ 
	$prodname= $_POST['prodname'];
	$pcost= $_POST['upcost'];
	$scost= $pcost+($pcost*0.2);

$sql="update prodicts set product_name= '$prodname',pprice='$pcost',unit_price = '$scost' where id='$id'";
$udateproduct = mysqli_query($conn, $sql);

if($udateproduct){
	$sqllog=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Edited Medicine',now())");
$logs  = mysqli_query($conn, $sqllog);

	echo "Updated Successfuly";
}
header("location:manage_medicines");

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
<table><tr><td><strong>Drug Name </strong></td><td><input type="text" name="prodname" value="<?php echo $producname ; ?>" required aria-required="true" aria-describedby="name-format"></td></tr>
<tr><td><strong>Unit Purchase Price</strong></th><td> <input type="text" name="upcost" value="<?php echo $priceproduct; ?>" required aria-required="true" aria-describedby="name-format"></td></tr>
</table>
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


