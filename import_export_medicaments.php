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
       <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
 
</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php 
	include_once("tpl/top_bar10.php"); 
	require_once 'db-config.php';
//quire_once 'upload-file.php';
?>	
<!-- end side-menu -->
			<div class="content-module-main cf"><div align = "center"><h1>Import Tarif Medicaments</h1><hr>
			
			<form id="uploadexcelfile" name="uploadexcelfile" action = 'upload_medicaments.php' enctype="multipart/form-data" method="post" align="center">
<table style="width:100%;"> 
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td></td><td></td><td><input type="file" name="file" id="excelupload"></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td></td><td></td><td><input type="submit" name="submit" value="Import file"></td></tr></table>
</form>
						  
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


