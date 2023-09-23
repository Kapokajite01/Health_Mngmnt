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
<!DOCTYPE html>
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
</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	
 <!-- end side-menu -->
			<div class="content-module-main cf">
				<table>
				
				<tr><th>Consommations</th><th>Tarif Medicaments</th><th>Tarif Consomables</th><th>Tarif Actes Medicales</th><th>Tarif Examens</th><th>Tarif  Hospitalisations</th></tr>
				
				<tr><td> <table border= "5"><tr><td><a href="import_export_consommations">Import  Facture</a></tr></td></table></td>
				<td> <table border= "5"><tr><td><a href="import_export_medicaments">Import  Tarif Medicaments</a></tr></td></table> </td>
				<td> <table border= "5"><tr><td><a href="import_export_consomables">Import  Tarif Consomables</a></tr></td></table> </td>
				<td> <table border= "5"><tr><td><a href="import_export_actes">Import  Tarif  Actes Medicales</a></tr></td></table> </td>
				<td> <table border= "5"><tr><td><a href="import_export_tests">Import  Tarif Examens</a></tr></td></table> </td>
				<td> <table border= "5"><tr><td><a href="import_export_hospitalizations">Import  Tarif Hospitalisations</a></tr></td></table> </td></tr>
				<tr><td><table border="5">
				<tr><td><strong>Uploads</strong></td><td><strong>Number</strong></td><td><strong>Last Upload</strong></td><td><strong> Origine</strong></td><td><strong> DELETE</strong></td></tr>
				<?php 
				
				$sresult = ("SELECT up_level,up_time,origine FROM consomation_upload GROUP BY up_level ORDER BY up_id DESC");
while ($srow = mysqli_fetch_assoc($sresult))
{
$tt = $srow['up_level'];

?><tr>
<td><?php echo 'Upload'.++$J;?></td><td><?php 
$results= ("select distinct up_pid from consomation_upload  where up_level = '$tt'");
$num_rows = mysql_num_rows($results );
 echo $num_rows;
;?> </td>
<td><?php echo $srow["up_time"];?> </td><td><?php echo $srow["origine"];?> </td><td><a href="" onclick="window.open('delete_consomations?delconsid=<?php echo $srow["up_level"]?>','popup','width=1000,toolbar=1,resizable=1,scrollbars=yes,height=500,top=200,left=400'); return false;"><strong>DELETE</strong></td>
</tr>

<?php 

} 

?></table></td>
				<td> <table border= "5">
				<tr><td><strong>Uploads</strong></td><td><strong>Number</strong></td><td><strong>Last Upload</strong></td></tr>
				<?php 
				
				$sresult1 = ("SELECT id,date FROM prodicts GROUP BY date ORDER BY id DESC");
while ($srow1 = mysqli_fetch_assoc($sresult1))
{
$tt = $srow1['date'];

?><tr>
<td><?php echo 'Upload'.++$s;?></td><td><?php 
$results1= ("select distinct id from prodicts  where date = '$tt'");
$num_rows1 = mysql_num_rows($results1 );
 echo $num_rows1;
;?> </td>
<td><?php echo $srow1["date"];?> </td></tr>

<?php 

} 

?></table> </td>
				<td> <table border= "5">
				<tr><td><strong>Uploads</strong></td><td><strong>Number</strong></td><td><strong>Last Upload</strong></td></tr>
				<?php 
				
				$sresult1 = ("SELECT id,date FROM consommables GROUP BY date ORDER BY id DESC");
while ($srow1 = mysqli_fetch_assoc($sresult1))
{
$tt = $srow1['date'];

?><tr>
<td><?php echo 'Upload'.++$ss;?></td><td><?php 
$results1= ("select distinct id from consommables  where date = '$tt'");
$num_rows1 = mysql_num_rows($results1 );
 echo $num_rows1;
;?> </td>
<td><?php echo $srow1["date"];?> </td></tr>

<?php 

} 

?></table>  </td>
				<td> <table border= "5">
				<tr><td><strong>Uploads</strong></td><td><strong>Number</strong></td></tr>
				<?php 
				
				$sresults1 = ("SELECT id FROM actes");

?><tr>
<td><?php echo 'Upload'.++$sss;?></td><td><?php 
$num_rows1 = mysql_num_rows($sresults1 );
 echo $num_rows1;
;?> </td>
</tr>

</table> </td>
				<td>  <table border= "5">
				<tr><td><strong>Uploads</strong></td><td><strong>Number</strong></td></tr>
				<?php 
				
				$sresultsh1 = ("SELECT id FROM examens");

?><tr>
<td><?php echo 'Upload'.++$shss;?></td><td><?php 
$num_rowsh1 = mysql_num_rows($sresultsh1 );
 echo $num_rowsh1;
;?> </td>
</tr>

</table> </td>
				<td> <table border= "5">
				<tr><td><strong>Uploads</strong></td><td><strong>Number</strong></td></tr>
				<?php 
				
				$sresultshh1 = ("SELECT id FROM hospitalisation");

?><tr>
<td><?php echo 'Upload'.++$shhss;?></td><td><?php 
$num_rowshh1 = mysql_num_rows($sresultshh1 );
 echo $num_rowshh1;
;?> </td>
</tr>

</table>  </td></tr>
				
				
				
				
				
				</table>
	  
						 
						  		
                     </div>   
					</div> <!-- end content-module-main -->
							

				</div> <!-- end content-module -->
				
				
		
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
<!-- FOOTER -->
	<div id="footer">

		<p>Powed By Vision Soft Ltd .</p>
	</div> <!-- end footer -->
</body>

</html>


