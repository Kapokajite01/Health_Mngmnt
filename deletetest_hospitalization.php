
<?php
error_reporting(0);
    session_start();
	$_SESSION['rediredted']= 'No';
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Receptionist"){
      header('Location: logout');
	}
include_once 'connect_db.php';
$numbertest = $_GET['affideleTE'];
$resultret = ("SELECT * FROM consomation_consom WHERE consid = '$numbertest'");
$pat = mysqli_query($conn, $resultret);
while ($row = mysqli_fetch_assoc($pat)) {
$actemed = $row['hospitalization'];
$qty = $row['uphospitalizations'];
$price = $row['qtyhoapitalization'];
}
if(isset($_POST['deletetest'])){
	$testdelete = mysqli_query($conn,"UPDATE consomation_consom SET hospitalization   = '', qtyhoapitalization = '', uphospitalizations = ''   WHERE consid='".$numbertest."'");
	if($testdelete){
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

}

?>
 <script type="text/javascript">
    function deleteConfirm(){
        var result = confirm("Do you really want to delete records?");
        if(result){
            return true;
        }else{
            return false;
        }
    }
	

</script>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<title>Return Patient</title>
</head>
<body>
<div align="center">
<form method="post" action=""  onsubmit="return deleteConfirm();">
				<p><strong>You are about to delete :</strong></p><hr>
				<table>
	<table>
	<tr><td><label>Hospitalization</label> </td><td>&nbsp;&nbsp;<?php echo $actemed;?></td></tr>	
	<?php 
	if($qty)
	{
	?>
	<tr><td><label>Quantity</label> </td><td>&nbsp;&nbsp;<?php echo $qty?></td></tr>
<?php 
	}
	else{
		
?>	
	<tr><td><label><font color="red">Quantity</font></label> </td><td>&nbsp;&nbsp;<font color="red">No value<//font></td></tr>
<?php
		}
?>
	<tr><td><label>Price</label> </td><td>&nbsp;&nbsp;<?php echo $price;?></td></tr>	
	</table>

<input type="submit" name="deletetest" value=" Delete">
	</form></div>