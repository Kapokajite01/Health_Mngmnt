<?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!$_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}
include_once('connect_db.php');

?>
<div align="center">
<h1><font size="5px">Do You Want To Delete Uploaded?</font><?php echo $tm;?></h1>
<form method="POST" action = "">
<input type="submit"  name="delete"class="fsSubmitButton"img src="images.jpg" width="200" height="100" value="Delete"/>
<input type="submit" name="cancel" class="fsSubmitButton"img src="images.jpg" width="200" height="100" value="Cancel"/>
 </form>
 </div>
<style>
.fsSubmitButton
{
	border-top:		2px solid #a3ceda;
	border-left:		2px solid #a3ceda;
	border-right:		2px solid #4f6267;
	border-bottom:		2px solid #4f6267;
	padding:		10px 20px !important;
	font-size:		14px !important;
	background-color:	#c4f1fe;
	font-weight:		bold;
	color:			#2d525d;
}
</style>
<?php

if (isset($_POST["delete"])) {

$delid=$_GET[delconsid];
$sql="delete from consomation_upload where up_level='$delid'";
($sql);
echo "<script>
 window.opener.location.reload(true);
	window.close();	
	</script>";

}
if (isset($_POST["cancel"])) {
	echo "<script>
	window.close();	
	</script>";

}

?>

