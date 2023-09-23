<?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!$_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}

//$rows=mysql_fetch_assoc($result);
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
	<?php include_once("tpl/top_bar10.php"); ?>
	
<!-- end side-menu -->
			<div class="content-module-main cf"><div align = "center"><h1> Enter Dates To delete</h1><hr>
			<form method = "POST" target="_blank" action="">
			
			<input type="text" name="datesearch" id="datesearch" placeholder="Start Date" required aria-required='true' aria-describedby='name-format'placeholder="Start Date">

			<input type="text" name="datesearch1" id="datesearch1" placeholder="End Date" required aria-required='true' aria-describedby='name-format'placeholder="End Date">
			<select name="postdsante" required>
									<option value="">----SELECT BRANCH-----</option>
									<option>CENTRE DE SANTE Kulu</option>
									<option>POSTE DE SANTE KABUGA</option>
									<option></option>

									</select>
			<input type="submit" class="btn btn-primary" name = "deletedata"  value="Delete Data">
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
<?php
if(isset($_POST['deletedata'])){
	include_once('connect_db.php');

$start_date =$_POST['datesearch'];
$end_date = $_POST['datesearch1'];
$branch = $_POST['postdsante'];
$sql="delete from consomation where datecunsuption >= '$start_date' AND datecunsuption<='$end_date' AND postedesante = '$branch'";
($sql);

$sql1="delete from consomation_upload where datecunsuption >= '$start_date' AND datecunsuption<='$end_date' AND postedesante = '$branch'";
($sql1);
      header('Location: manager');

}

?>
</html>


