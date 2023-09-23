
<?php
error_reporting(0);
session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}
?>
<!DOCTYPE html>
<?php
//error_reporting(0);
$npatinumber = $_GET['patientnumber'];
$ndt = $_GET['datecons'];
//echo $npatinumber;
if($npatinumber){
$patinumber = $npatinumber ;	
}
else{
$patinumber=$_GET['id'];
}
if($ndt){
$dt= $ndt;	
}
else{
$dt = $_POST['date'];

}
$tm=0;
$today = date("Y-m-d");
include_once('connect_db.php');
$resultg = ("SELECT * FROM patient WHERE id = '$patinumber'"); 
$resultselectg = mysqli_query($conn, $resultg);
        while($rowg = mysqli_fetch_assoc( $resultselectg )) {
                $affnumber = $rowg['affiliate_number'];
                $fname = $rowg['names'];
				$lname = $rowg['lname'];
				$consultatiom  = $rowg['consultatiom'];
			 }
?>
			
<html lang="en">
<head>
<link rel="stylesheet" href="cssauto/style.css" />
<script type="text/javascript" src="jsauto/jquery.min.js"></script>
<script type="text/javascript" src="jsauto/script.js"></script>
   <link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
   <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 
   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>
	<meta charset="utf-8">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">

	 
       

</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	

<div class="side-menu fl">

				<h3>Quick Links</h3>
				<ul>

					<li><a href="search_patient">Edit Record</a></li>
					<li><a href="edit_patient">Edit Patient</a></li>

				</ul>
                  umtoni ange
					uwera adeline
                                 
			</div> <!-- end side-menu -->
			<?php echo '<h1>Names :'.$fname.' '.$lname.'</h1>';
echo '<h1>Affilliation Number :'.$affnumber.'</h1>';
echo '<h1>Consultation :'.$consultatiom.'</h1>';
echo '<h1>Date :'.$dt.'</h1>';

?>
					<form method="POST" action="">




</form>
					<form method="POST" action="">
					
					<input type="text" name="patientid" value="<?php echo $patinumber;?>" Style="display:none" >
								<table style="width:600px; margin-left:150px; float:left;" border="0" cellspacing="0" cellpadding="0">
						  <tr><td><div class="input_container">
                    <input type="text" id="country_id" name="searc" value="<?php echo $affnumber;?>"  Style="display:none" onkeyup="autocomplet()" autocomplete="off" required aria-required='true' aria-describedby='name-format' placeholder="Search Insurance Number">
                   &nbsp;&nbsp;&nbsp;&nbsp; <ul id="country_list_id"></ul>               </div></td>
						  <td><input type="text" name ="date" id="datesearch" size="30" placeholder="Enter Date of Consumption" value="<?php echo $dt;?>"  Style="display:none"  required aria-required='true' aria-describedby='name-format' autocomplete='off'></td>
						  <td>'</td></tr>
						  <tr><td></td><td></td><td> </table>
						  
						  
						  
						  			<script>
$(document).ready(function () {
    $("#sbmt").toggle();
    $("#chk").change(function () {
        $("#sbmt").toggle();
    });
});
</script>

Remove all    <input type="checkbox" id="chk" />
<input type="submit" name="RemoveAll" id="sbmt" value="Remove All" >
						  </form>
					  
			<div class="content-module-main cf">
			
</div>	</div>
				
			<?php	if (isset($_POST['search'])) {
				$number=$_POST['patientid'];
				$dt=$_POST['date'];
				$result = ("SELECT patient.names,patient.lname,patient.affiliate_number,consomation.consid,consomation.id,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,consomation.datecunsuption 
FROM consomation JOIN patient on patient.id= consomation.id where medicament!='' AND consomation.id ='$number'") ;
$resultselect = mysqli_query($conn, $result);	

$resultcons = ("SELECT patient.names,patient.lname,patient.affiliate_number,consomation.consid,consomation.id,consomation.consommable,consomation.Qcons,consomation.UPcons,consomation.datecunsuption 
FROM consomation JOIN patient on patient.id= consomation.id where consommable!='' AND  consomation.id ='$number'");

$resultselectacte = ("SELECT patient.names,patient.lname,patient.affiliate_number,consomation.consid,consomation.id,consomation.actemedicale,consomation.upacte,consomation.qtyacte,consomation.datecunsuption 
FROM consomation JOIN patient on patient.id= consomation.id where actemedicale!='' AND  consomation.id ='$number'") ;

$resulthp = ("SELECT patient.names,patient.lname,patient.affiliate_number,consomation.consid,consomation.id,consomation.hospitalization,consomation.uphospitalizations,consomation.qtyhoapitalization,consomation.datecunsuption 
FROM consomation JOIN patient on patient.id= consomation.id where hospitalization!='' AND  consomation.id ='$number'") ; 

$resultlab = ("SELECT patient.names,patient.lname,patient.affiliate_number,consomation.consid,consomation.id,consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,consomation.datecunsuption 
FROM consomation JOIN patient on patient.id= consomation.id where examenmedicale!='' AND consomation.id ='$number'"); 
			}
			else{
				
$result = ("SELECT patient.names,patient.lname,patient.affiliate_number,consomation.consid,consomation.id,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,consomation.datecunsuption 
FROM consomation JOIN patient on patient.id= consomation.id where medicament!='' AND consomation.id ='$patinumber'") ;
$resultselect = mysqli_query($conn, $result);	

$resultcons = ("SELECT patient.names,patient.lname,patient.affiliate_number,consomation.consid,consomation.id,consomation.consommable,consomation.Qcons,consomation.UPcons,consomation.datecunsuption 
FROM consomation JOIN patient on patient.id= consomation.id where consommable!='' AND  consomation.id ='$patinumber'");		

$resultselectacte = ("SELECT patient.names,patient.lname,patient.affiliate_number,consomation.consid,consomation.id,consomation.actemedicale,consomation.upacte,consomation.qtyacte,consomation.datecunsuption 
FROM consomation JOIN patient on patient.id= consomation.id where actemedicale!='' AND  consomation.id ='$patinumber'") ;	
				
$resultlab = ("SELECT patient.names,patient.lname,patient.affiliate_number,consomation.consid,consomation.id,consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,consomation.datecunsuption 
FROM consomation JOIN patient on patient.id= consomation.id where examenmedicale!='' AND consomation.id ='$patinumber'");

$resulthp = ("SELECT patient.names,patient.lname,patient.affiliate_number,consomation.consid,consomation.id,consomation.hospitalization,consomation.uphospitalizations,consomation.qtyhoapitalization,consomation.datecunsuption 
FROM consomation JOIN patient on patient.id= consomation.id where hospitalization!='' AND  consomation.id ='$patinumber'") ; 

			}
echo '<hr><h1>Medicines</h1>';
if ($resultselect->num_rows > 0) {
	
echo "<table class='blueTable'>";
         echo "<tr><th>No</th><th>medicine</th><th>price</th><th>Quantity</th><th>Date Consumption</th><th>Edit</th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_assoc( $resultselect )) {
                $num++;
                // echo out the contents of each row into a table
                echo "<tr>";
				echo '<td width="">' . ++$yhu. '</td>';
				echo '<td width="">' . $row['medicament'] . '</td>';
				echo '<td>' . $row['upmedicamnet'] . '</td>';
				echo '<td>' . $row['qtymedicamnet'] . '</td>';
				echo '<td>' . $row['datecunsuption'] . '</td>';

				?>

				<td><a href="edit_medicine1?consid=<?php echo $row['consid']?> &pid=<?php echo $row['id']?>&consdate=<?php echo $row['datecunsuption']?>"><img src="images/update-icon.png" width="14" height="14" border="0" /></a></td>
				<td><a href="delete_medicine1?consid=<?php echo $row['consid']?> &pid=<?php echo $row['affiliate_number']?>&consdate=<?php echo $row['datecunsuption']?>"><img src="images/delete-icon.jpg" width="14" height="14" border="0" /></a></td>

			<?php
		 } 			echo '</tr></table>';

			}
			else{
					echo "<h1 align='center'><font color='red'> No Medicine</font></h1>";

			}
			echo '<hr>';
			echo '<hr><h1>Consumables</h1>';

			
$resultselectcons = mysqli_query($conn, $resultcons);	
if ($resultselectcons->num_rows > 0) {

echo "<table class='blueTable'>";
         echo "<tr><th>No</th><th>Consomable</th><th>price</th><th>Quantity</th><th>Date Consumption</th><th>Edit</th><th>Delete</th</tr>";

        // loop through results of database query, displaying them in the table
        while($rowcons= mysqli_fetch_assoc( $resultselectcons )) {
               // echo out the contents of each row into a table
                echo "<tr>";
				echo '<td width="">' . ++$numcons .'</td>';
				echo '<td width="">' . $rowcons['consommable'] . '</td>';
				echo '<td>' . $rowcons['UPcons'] . '</td>';
				echo '<td>' . $rowcons['Qcons'] . '</td>';
				echo '<td>' . $rowcons['datecunsuption'] . '</td>';

				?>

				<td><a href="edit_consumable1?consid=<?php echo $rowcons['consid']?>"><img src="images/update-icon.png" width="14" height="14" border="0" /></a></td>
				<td><a href="delete_consumable1?consid=<?php echo $rowcons['consid']?>"><img src="images/delete-icon.jpg" width="14" height="14" border="0" /></a></td>
			<?php
		 }
		 echo '</tr></table>';
}		 			

		else{
					echo "<h1 align='center'><font color='red'> No Consumable</font></h1>";

			}
			echo '<hr>';
						echo '<hr><h1>Medical Act</h1>';

			
$resultselectacte = mysqli_query($conn, $resultselectacte);	
if ($resultselectcons->num_rows > 0) {

echo "<table class='blueTable'>";
         echo "<tr><th>No</th><th>Acte Medical</th><th>price</th><th>Quantity</th><th>Date Consumption</th><th>Edit</th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($rowacte = mysqli_fetch_assoc( $resultselectacte )) {
                // echo out the contents of each row into a table
                echo "<tr>";
				echo '<td width="">' . ++$numcac .'</td>';
				echo '<td width="">' . $rowacte['actemedicale'] . '</td>';
				echo '<td>' . $rowacte['upacte'] . '</td>';
				echo '<td>' . $rowacte['qtyacte'] . '</td>';
				echo '<td>' . $rowacte['datecunsuption'] . '</td>';

				?>

				<td><a href="edit_act1?consid=<?php echo $rowacte['consid']?>"><img src="images/update-icon.png" width="14" height="14" border="0" /></a></td>
				<td><a href="delete_act1?consid=<?php echo $rowacte['consid']?>"><img src="images/delete-icon.jpg" width="14" height="14" border="0" /></a></td>
			<?php
		 
			}
					  			echo '</tr></table>';

}
			else{
					echo "<h1 align='center'><font color='red'> No Medica Act</font></h1>";

			}
			echo '<hr>';
									echo '<hr><h1>Labolatory Tests</h1>';

			
$resultselectlab = mysqli_query($conn, $resultlab);	
if ($resultselectlab->num_rows > 0) {

echo "<table class='blueTable'>";
         echo "<tr><th>No</th><th>Test</th><th>price</th><th>Quantity</th><th>Date Consumption</th><th>Edit</th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($rowlab = mysqli_fetch_assoc( $resultselectlab )) {
                echo "<tr>";
				echo '<td width="">' . ++$numlab .'</td>';
				echo '<td width="">' . $rowlab['examenmedicale'] . '</td>';
				echo '<td>' . $rowlab['upexamen'] . '</td>';
				echo '<td>' . $rowlab['qtyexamen'] . '</td>';
				echo '<td>' . $rowlab['datecunsuption'] . '</td>';

				?>

				<td><a href="edit_labtest1?consid=<?php echo $rowlab['consid']?>"><img src="images/update-icon.png" width="14" height="14" border="0" /></a></td>
				<td><a href="delete_labtest1?consid=<?php echo $rowlab['consid']?>"><img src="images/delete-icon.jpg" width="14" height="14" border="0" /></a></td>
			<?php
		 }
					  			echo '</tr></table>';
}else{
					echo "<h1 align='center'><font color='red'> No Labolatory Test</font></h1>";

			}
			echo '<hr>';
									echo '<hr><h1>Hospitalization </h1>';
		 
$resultselecthp = mysqli_query($conn, $resulthp);	
if ($resultselecthp->num_rows > 0) {

echo "<table class='blueTable'>";
         echo "<tr><th>No</th><th>Hospitalization</th><th>price</th><th>Quantity</th><th>Date Consumption</th><th>Edit</th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($rowhp = mysqli_fetch_assoc( $resultselecthp )) {
                $num++;
                // echo out the contents of each row into a table
                echo "<tr>";
				echo '<td width="">' . ++$numhp .'</td>';
				echo '<td width="">' . $rowhp['hospitalization'] . '</td>';
				echo '<td>' . $rowhp['uphospitalizations'] . '</td>';
				echo '<td>' . $rowhp['qtyhoapitalization'] . '</td>';
				echo '<td>' . $rowhp['datecunsuption'] . '</td>';

				?>

				<td><a href="edit_hopsitalitation1.php?consid=<?php echo $rowhp['consid']?>"><img src="images/update-icon.png" width="14" height="14" border="0" /></a></td>
				<td><a href="delete_hopsitalitation1.php?consid=<?php echo $rowhp['consid']?>"><img src="images/delete-icon.jpg" width="14" height="14" border="0" /></a></td>
			<?php
		 } 
		 					  			echo '</tr></table>';
}
else{
						echo "<h1 align='center'><font color='red'> No Medica Act</font></h1>";

}

					echo '<hr>';
 
		 
		 
			

        	?>					 
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
<!-- FOOTER -->
	<div id="footer">

		<p>Powed By Vision Soft Ltd .</p>
	</div> <!-- end footer -->
</body>
<style>
input#bigbutton {
width:500px;
background: #3e9cbf; /*the colour of the button*/
padding: 8px 14px 10px; /*apply some padding inside the button*/
border:1px solid #3e9cbf; /*required or the default border for the browser will appear*/
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
/*style the text*/
font-size:1.5em;
font-family:Oswald, sans-serif; /*Oswald is available from http://www.google.com/webfonts/specimen/Oswald*/
letter-spacing:.1em;
text-shadow: 0 -1px 0px rgba(0, 0, 0, 0.3); /*give the text a shadow - doesn't appear in Opera 12.02 or earlier*/
color: #fff;
/*use box-shadow to give the button some depth - see cssdemos.tupence.co.uk/box-shadow.htm#demo7 for more info on this technique*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
/*give the corners a small curve*/
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
}
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 0px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 10px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 0px solid #ccc;
  border-top: none;
}
.verticalLine {
  border-left: thick solid #ff0000;
}


table.blueTable {
  border: 0px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 40%;
  text-align: left;
  border-collapse: collapse;
  margin: 0 auto;
}
table.blueTable td, table.blueTable th {
  border: 0px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 13px;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #FFFFFF;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444;
}
table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}
</style>
</html>



</html>


