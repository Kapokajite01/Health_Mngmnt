<?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}
include_once('connect_db.php');
?>

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
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}
$id=$_GET['consid'];

$query1=("select id,hospitalization,uphospitalizations,qtyhoapitalization,datecunsuption from consomation where consid='$id'");
$resultselect= mysqli_query($conn, $query1);
  while($query2 = mysqli_fetch_assoc( $resultselect )) {
	$hospid = $query2['id'];
		$datdhosp = $query2['datecunsuption'];  
		$hospitalization = $query2['hospitalization'];  
		$qtyhoapitalization = $query2['qtyhoapitalization'];  

	  
  }
?>
       

</head>
<body>
	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar1.php"); 
		 include_once("tpl/top_bar.php"); 

	?>
	
	<!-- MAIN CONTENT -->
	
		<div class="page-full-width cf">
<form method="post" action="">
<h1 align="center"> <font color="red">Do you want to Delete Hospitalization?</font></h1>

<div  style="  display: block;  margin-left: auto;  margin-right: auto;  width: 40%;" align="justify"><STRONG>- HOSPITALIZATION :</strong> <?php echo $hospitalization; ?><br><br>
 <strong> - Quantity : </strong><?php echo $qtyhoapitalization;?></div>
  
<table><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" size="50" name="consid"value="<?php echo $id; ?>"  style="display:none"required="required"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="id"value="<?php echo $hospid; ?>"  style="display:none"required="required" ></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="date"value="<?php echo $datdhosp; ?>" style="display:none" required="required" ></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="submit" name="update" value="Yes"></td><td><input type="submit" name="cancel" value="No"></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr></table>
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
<?php

if(isset($_POST['update']))
{   $id=$_POST['consid'];
	$prodname= $_POST['prodname'];
	$pcost= $_POST['pcost'];
	$qty= $_POST['qty'];

$sql="update consomation set hospitalization = '', uphospitalizations='',qtyhoapitalization = '' where consid='$id'";
mysqli_query($conn, $sql);
$sql1=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Edited Lab Test',now())");
echo "<script>alert('Hospitalization  Deleted Successfully')</script>";
					    echo "<script>window.location='edit_medicine?patientnumber= $hospid&tdat=$datdhosp';</script>";
}
if(isset($_POST['cancel']))
{
echo "<script>alert('Canceled')</script>";
 echo "<script>window.location='edit_medicine?patientnumber= $hospid&tdat=$datdhosp';</script>";	
}
?>
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


