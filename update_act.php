<!DOCTYPE html>

<html lang="en">
<head>
		<meta char-set="utf-8" http-equiv="content-type" content="text/html;">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
		<link rel="stylesheet" href="css/cmxform.css">
	<script src="js/lib/jquery.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.hotkeys-0.7.9.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>

	<script src="js/script.js"></script>  
        <script src="js/date_pic/jquery.date_input.js"></script>  
        <script src="lib/auto/js/jquery.autocomplete.js "></script>  
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

$query1=("select * from actes where id='$id'");
$result = mysqli_query($conn, $query1);
while($query2 = mysqli_fetch_assoc($result)) {
	$actename = $query2['name_acte'];
	$acteprice = $query2['unit_price'];
	
}

if(isset($_POST['update']))
{
	$prodname= $_POST['prodname'];
	$cost= $_POST['cost'];
$sql="update actes set name_acte = '$prodname', unit_price = '$cost' where id='$id'";
mysqli_query($conn, $sql);
$sqllog=("INSERT INTO logs(id,name,lname,phone,action,time)VALUES('','$name','$lname','$tel','Updated Medical Act',now())");
mysqli_query($conn, $sqllog);

header("location:manage_act");

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
<table><tr><td> Medical Act </td><td><input type="text" name="prodname"value="<?php echo $actename ; ?>"></td></tr>
<tr><td>Unit Cost</td><td> <input type="text" name="cost" value="<?php echo $acteprice; ?>"></td></tr></table>
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

</html>


