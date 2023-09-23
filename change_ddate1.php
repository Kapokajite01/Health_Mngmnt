
<!D<?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}
include_once('connect_db.php');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">

	 
       
<style type="text/css" title="currentStyle">
			@import "media/css/themes/smoothness/jquery-ui-1.7.2.custom.css";
		</style>
	<script src="media/js/jquery-1.8.2.min.js"></script>
        <script src="media/js/jquery-ui.js" type="text/javascript"></script>
	</head>
   <link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
   <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 

   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>
	<?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}
$id=$_GET[consid];

$query1=("select up_pid,up_pname,up_plname,up_afnumber,postedesante,datecunsuption from consomation_upload where up_id='$id'");
$query2=mysqli_fetch_assoc($query1);

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
<form method="post" action="change_ddate11.php">
<table><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" size="50" name="consid"value="<?php echo $id; ?>" required="required" style="display:none"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="id"value="<?php echo $query2['up_pid']; ?>" required="required" style="display:none"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="date"value="<?php echo $query2['datecunsuption']; ?>" required="required" style="display:none"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><strong>Insurance number </strong></td><td><strong><?php echo $query2['up_afnumber']; ?></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><strong>Name </strong></td><td><strong><?php echo $query2['up_pname'].$query2['up_plname']; ?></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><strong>Date of prescription </strong></td><td><strong><?php echo $query2['datecunsuption']; ?></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><strong>Change Date To </strong></td><td><input type="text" name ="ndate" id="datesearch" size="30" placeholder="Enter Date of Consumption" required aria-required='true' aria-describedby='name-format'></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="submit" name="update" value="Change Date"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></tr></table>
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


