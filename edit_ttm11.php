<?php
error_reporting(0);
session_start();
    session_start();
	$role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
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
	
<?php

if(isset($_POST['update']))
{   $id=$_POST['id'];
	$date=$_POST['date'];
		$patm = $_POST['workingday'];

$sql="update consomation_upload set null_tm = '$patm' where up_pid ='$id'";
($sql);
$sql1=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Edited Lab Test',now())");
header("location:edit_cconsultation11");

}
?>

<div class="side-menu fl">
				
				<h3>Quick Links</h3>
				<ul>

					<li><a href="search_patient">Edit Record</a></li>
					<li><a href="edit_patient">Edit Patient</a></li>

				</ul>
                                
                                 
			</div> <!-- end side-menu -->
			<div class="content-module-main cf">
				<form method="POST" action="">
							<h1 align="center"><strong></strong><hr></hr> </h1>
								<table style="width:600px; margin-left:150px; float:left;" border="0" cellspacing="0" cellpadding="0">
						 <tr><td></td><td></td><td><?php
 include_once('connect_db.php');
$id=$_POST['id'];
$date=$_POST['date'];
		 
		 $result1 = ("SELECT up_pname,up_plname,up_afnumber,up_id,up_pid,up_insurance AS insurance,up_ambul AS amb,up_consom_sonsultation,datecunsuption 
FROM consomation_upload WHERE up_pid ='$id' GROUP BY up_pid") 
                or die(mysql_error());
  echo "<table border='1'>";
         echo "<tr><th>Names</th><th>Consultation</th></th><th>Date Consumption</th><th>Edit</th</tr>";
        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_assoc( $result1 )) {
         $ambul = $query2['amb'];
$insur = $query2['insurance'];

$nulltm = $query2['null_tm'];

	if($nulltm == 'Yes'){
	$ticketmod = 0;		
	}

	else{
	$ticketmod =200;	
	}
	if($ambul == 'yes'){
		$modticket = 2400;
	}
	else{
		$modticket =0;
	}
$originalDate = $query2['datecunsuption'];
$newDate = date("d/m/Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($query2['datecunsuption']));
if($insur == 'RAMA/RSSB' OR $insur== 'MEDIPLA' OR $insur=='RADIANT' OR $insur=='MMI'){
		
		$ticketmod = $totals*0.15;
	}
	if($insur == 'NO INSURANCE'){
		
		$ticketmod = $totals*1;
	}
	$ticketmod1 = $ticketmod+$modticket;
                // echo out the contents of each row into a table
                echo "<tr>";
				echo '<td width="">' . $row['up_pname'] .' '. $row['up_plname'] .'</td>';
				echo '<td width="">' . $ticketmod1 . '</td>';
				echo '<td>' . $row['datecunsuption'] . '</td>';
$myid=$row['id'];
echo $myid;
				?>

				<td><a href="edit_ttm1?consid=<?php echo $row['up_pid']?>"><img src="images/update-icon.png" width="24" height="24" border="0" /></a></td>
			<?php
		 } 
        // close table>
        echo "</table>";

?> </td></tr>
						  </table>
						  
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


