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
				
				<tr><td> <table border= "5"><tr><td><a href="myexport_consommations"> Export Facture</a></tr></td></table></td>
				<td> <table border= "5"><tr><td><a href="myexport_medicaments"> Export Tarif Medicaments</a></tr></td></table> </td>
				<td> <table border= "5"><tr><td><a href="myexport_consommables">Export Tarif Consomables</a></tr></td></table> </td>
				<td> <table border= "5"><tr><td><a href="myexport_actes">Export Tarif  Actes Medicales</a></tr></td></table> </td>
				<td> <table border= "5"><tr><td><a href="myexport_tests">Export Tarif Examens</a></tr></td></table> </td>
				<td> <table border= "5"><tr><td><a href="myexport_hospitalizations">Export Tarif Hospitalisations</a></tr></td></table> </td></tr>
				<tr><td><table border="5">
				

</table> </td>
				<td> <table border= "5">
				</td>
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


