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
 <link rel="stylesheet" href="cssauto/style.css" />
<script type="text/javascript" src="jsauto/jquery.min.js"></script>
<script type="text/javascript" src="jsauto/script.js"></script>
</head>

<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
 <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 
   <script type="text/javascript">  <script src="jquery-ui.min1.js"></script> 

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

					<li><a href="search_patient">Edit Record</a></li>
					<li><a href="edit_patient">Edit Patient</a></li>

				</ul>
                                
                                 
			</div> <!-- end side-menu -->
			<div class="content-module-main cf">
				<form method="POST" action="">
							<h1 align="center"><strong></strong><hr></hr> </h1>
								<table style="width:600px; margin-left:150px; float:left;" border="0" cellspacing="0" cellpadding="0">
						  <tr><td><div class="label_div"></div>
                <div class="input_container">
                    <input type="text" id="country_id" name="country_id" onkeyup="autocomplet()" autocomplete="off" required aria-required='true' aria-describedby='name-format' placeholder="Search Insurance Number">
                   &nbsp;&nbsp;&nbsp;&nbsp; <ul id="country_list_id"></ul><input type="submit" name="search" value="Search Patient" ></td>
						  <td></td></tr>
						  <tr><td></td><td></td><td> </table></form>

						  
<?php
$myid=$_POST['pitentid'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$fnumnber=$_POST['afnumber'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$fcat=$_POST['familycat'];
$prov=$_POST['province'];
$district=$_POST['district'];
$sector=$_POST['sector'];
$afname=$_POST['afname'];
$flname=$_POST['aflastname'];
$affectation=$_POST['affectation'];
$insur=$_POST['insurance'];
$consult=$_POST['consultation'];
$famcode=$_POST['hfamilycode'];
$date=$_POST['date'];

$sql="update patient set
 names = '$fname',
 lname = '$lname',
 gender = '$gender',
 dob = '$dob',
 category = '$fcat',
 province = '$prov',
 district = '$district',
 sector = '$sector',
 affiliate_number = '$fnumnber',
 affiliate_names = '$afname',
 afilliate_lastname = '$flname',
 affectation = '$affectation',
 insurance = '$insur',
 familycode='$famcode',
 consultatiom = '$consult',
 names = '$fname'
 where id='$myid'";
mysqli_query($conn, $sql)
?>						  
						 
						  		
                     </div>  
						  <?php
if (isset($_POST['search'])) {
 include_once('connect_db.php');
$afnumber=$_POST['country_id'];
$result = ("SELECT id,names,lname,gender,dob,category,province,district,sector,affiliate_number,affiliate_names,
afilliate_lastname,affectation,insurance,familycode,consultatiom,date from patient WHERE affiliate_number  = '$afnumber' GROUP  BY affiliate_number,names,lname"); 
$resultselect = mysqli_query($conn, $result);
if ($resultselect->num_rows > 0) {
echo "<table class='blueTable'>";
         echo "<tr><th>Names</th><th>affiliate_number</th><th>gender</th>
		 <th>dob</th><th>Category</th><th>province</th><th>District</th><th>Sector</th><th>Affilitate names</th>
		 <th>affectation</th><th>Insurance</th><th>Family code</th><th>Edit</th</tr>";
        while($row = mysqli_fetch_assoc( $resultselect )) {
                $num++;
                echo "<tr>";
				echo '<td>' . $row['names'] .' '. $row['lname'] .'</td>';
				echo '<td>' . $row['affiliate_number'] . '</td>';
				echo '<td>' . $row['gender'] . '</td>';
				echo '<td>' . $row['dob'] . '</td>';
				echo '<td>' . $row['category'] . '</td>';
				echo '<td>' . $row['province'] . '</td>';
				echo '<td>' . $row['district'] . '</td>';
				echo '<td>' . $row['sector'] . '</td>';
				echo '<td>' . $row['affiliate_names'] .'    '. $row['afilliate_lastname'] .'</td>';
				echo '<td>' . $row['affectation'] . '</td>';
				echo '<td>' . $row['insurance'] . '</td>';
				echo '<td>' . $row['familycode'] . '</td>';

				?>

				<td><a href="edit_patient1?id=<?php echo $row['id']?>"><img src="images/update-icon.png" width="24" height="24" border="0" /></a></td>
			<?php
		 } 
        echo "</tr></table>";
}
else{
	echo "<h1 align='center'><font color='red'> Patient Not Found</font></h1>";
}
}
?> 					</div> <!-- end content-module-main -->
							

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
  font-size: 17px;
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
  width: 80%;
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


