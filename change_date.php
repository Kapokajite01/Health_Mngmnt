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
	

<div class="side-menu fl">
				
				<h3>Quick Links</h3>
				<ul>

					<li><a href="edit_record.php">Edit Record</a></li>
					<li><a href="edit_patient.php">Edit Patient</a></li>

				</ul>
                                
                                 
			</div> <!-- end side-menu -->
			<div class="content-module-main cf">
				<form method="POST" action="">
							<h1 align="center"><strong></strong><hr></hr> </h1>
								<table style="width:600px; margin-left:150px; float:left;" border="0" cellspacing="0" cellpadding="0">
						  <tr><td><input type="text" name ="searc" size="30" placeholder="Enter Insurance Number" required aria-required='true' aria-describedby='name-format'></td>
						  <td><input type="text" name ="date" id="datesearch" size="30" placeholder="Enter Date of Consumption" required aria-required='true' aria-describedby='name-format'></td>
						  <td><input type="submit" name="search" value="Search Date Consumption" ></td></tr>
						  <tr><td></td><td></td><td> </form>
						  <?php
if (isset($_POST['search'])) {
 include_once('connect_db.php');
$dt=$_POST['date'];
$number=$_POST['searc'];
$result = ("SELECT patient.names,patient.lname,patient.affiliate_number,consomation.consid,consomation.id,consomation.consultatiobn,consomation.datecunsuption ,consomation.postedesante
FROM consomation JOIN patient on patient.id= consomation.id WHERE datecunsuption='$dt' AND affiliate_number LIKE '%$number%' GROUP BY affiliate_number"); 
$resultselect = mysqli_query($conn, $result);
echo "<table border='1'>";
         echo "<tr><th>Names</th><th>Branche</th><th>Date Consumption</th><th>Edit</th</tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_assoc( $resultselect )) {
                $num++;
                // echo out the contents of each row into a table
                echo "<tr>";
				echo '<td width="">' . $row['names'] .' '. $row['lname'] .'</td>';
				echo '<td width="">' . $row['postedesante'] . '</td>';
				echo '<td>' . $row['datecunsuption'] . '</td>';

				?>

				<td><a href="change_date1?consid=<?php echo $row['consid']?>"><img src="images/update-icon.png" width="24" height="24" border="0" /></a></td>
			<?php
		 } 
        $result1 = ("SELECT up_pname,up_plname,up_afnumber,up_id,up_pid,postedesante,datecunsuption 
FROM consomation_upload WHERE up_afnumber LIKE '%$number%' and datecunsuption ='$dt' group by up_afnumber") 
                or die(mysql_error());

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_assoc( $result1 )) {
                $num++;
                // echo out the contents of each row into a table
                echo "<tr>";
				echo '<td width="">' . $row['up_pname'] .' '. $row['up_plname'] .'</td>';
				echo '<td width="">' . $row['postedesante'] . '</td>';
				echo '<td>' . $row['datecunsuption'] . '</td>';
				?>

				<td><a href="change_ddate1?consid=<?php echo $row['up_id']?>"><img src="images/update-icon.png" width="24" height="24" border="0" /></a></td>
			<?php
		 } 
        // close table>
        echo "</table>";
}

?> </td></tr>
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


