<?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}
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
						  <td><input type="submit" name="search" value="Search Consumable" ></td></tr>
						  <tr><td></td><td></td><td> </form>
						  <?php
if (isset($_POST['search'])) {
 include_once('connect_db.php');
$dt=$_POST['date'];
$number=$_POST['searc'];
$result = ("SELECT patient.names,patient.lname,patient.affiliate_number,consomation.consid,consomation.id,consomation.consommable,consomation.Qcons,consomation.UPcons,consomation.datecunsuption 
FROM consomation JOIN patient on patient.id= consomation.id where consommable!='' AND datecunsuption='$dt' AND affiliate_number='$number'");
$resultselect = mysqli_query($conn, $result);	
echo "<table border='1'>";
         echo "<tr><th>Names</th><th>Consomable</th><th>Unitprice</th><th>Quantity</th><th>Date Consumption</th><th>Edit</th><th>Delete</th</tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_assoc( $resultselect )) {
                $num++;
                // echo out the contents of each row into a table
                echo "<tr>";
				echo '<td width="">' . $row['names'] .' '. $row['lname'] .'</td>';
				echo '<td width="">' . $row['consommable'] . '</td>';
				echo '<td>' . $row['UPcons'] . '</td>';
				echo '<td>' . $row['Qcons'] . '</td>';
				echo '<td>' . $row['datecunsuption'] . '</td>';

				?>

				<td><a href="edit_consumable1?consid=<?php echo $row['consid']?>"><img src="images/update-icon.png" width="24" height="24" border="0" /></a></td>
				<td><a href="delete_consumable1?consid=<?php echo $row['consid']?>"><img src="images/delete-icon.jpg" width="24" height="24" border="0" /></a></td>
			<?php
		 } 
        // close table>
		$result1 = ("SELECT up_pname,up_plname,up_afnumber,up_id,up_pid,up_consomable,up_upcons,up_qtycons,datecunsuption
FROM consomation_upload where up_consomable != '' AND datecunsuption='$dt' AND up_afnumber='$number'") 
                or die(mysql_error());

        // loop through results of database query, displaying them in the table
        while($row1 = mysqli_fetch_assoc( $result1 )) {
                $num++;
                // echo out the contents of each row into a table
                echo "<tr>";
				echo '<td width="">' . $row1['up_pname'] .' '. $row1['up_plname'] .'</td>';
				echo '<td width="">' . $row1['up_consomable'] . '</td>';
				echo '<td>' . $row1['up_upcons'] . '</td>';
				echo '<td>' . $row1['up_qtycons'] . '</td>';
				echo '<td>' . $row1['datecunsuption'] . '</td>';

				?>

				<td><a href="edit_cconsumable1.php?consid=<?php echo $row1['up_id']?>"><img src="images/update-icon.png" width="24" height="24" border="0" /></a></td>
				<td><a href="delete_cconsumable1.php?consid=<?php echo $row1['up_id']?>"><img src="images/delete-icon.jpg" width="24" height="24" border="0" /></a></td>
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


