<?php 
session_start();
include'mydb_connection/my_dbconnection.php';

$uname = $_SESSION['uname'];
$userid = $_SESSION['userid'];
if(!$userid){
	header('location:logout');
}
$resultusers = "select * from users_table WHERE id = '$userid'";
$result16r = $conn_db->query($resultusers);
if ($result16r->num_rows > 0) {
while($rowval = $result16r->fetch_assoc()) {
$_SESSION['account'] = $rowval['telephone'];
$_SESSION['role'] = $rowval['role'];
$_SESSION['lname'] = $rowval['lname'];
$_SESSION['fname'] = $rowval['First_Nmae'];
$email = $rowval['email'];	
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];	
$account = $_SESSION['account'];
$role = $_SESSION['role'];
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Loan Amortization</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
		<meta name="description" content="Mailbox with some customizations as described in docs" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	<body class="no-skin" oncontextmenu="return false">
	
 <script type="text/javascript" src="date_time.js"></script>
 
 
<?php
error_reporting(0);
session_start();
include'mydb_connection/my_dbconnection.php';
include('mydb_connection/my_connect_db.php');
$account = $_SESSION['account'];

?>
													
<?php include'left_connection.php';?>

<?php 
/*$user_id = $_SESSION['userId'];
$sql = "SELECT * FROM users WHERE user_id = {$user_id}";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();*/
?>
<script type="text/javascript">
$(document).ready(function(){
      $('#txtInput').bind("cut copy paste",function(e) {
          e.preventDefault();
      });
    });
</script>
<div class="row">

	<div class="col-md-12">
		<a href="javascript: void(0)" class="btn btn-success dropdown-toggle btn-sm"  aria-haspopup="true" aria-expanded="false" onclick="popup01('calculations')">Check Repayment &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
				
		<br><br><div class="panel panel-default">
			<div class="panel-heading">
				 <!-- /panel-heading -->

			<div class="panel-body">

<!--<font size="-1" color="#000000">This <b>mortgage calculator</b> can be used to figure out monthly payments of a home mortgage loan,
 based on the home's sale price, the term of the loan desired, buyer's down payment percentage, and the loan's interest rate.
  This calculator factors in PMI (Private Mortgage Insurance) for loans where less than 20% is put as a down payment. Also taken
   into consideration are the town property taxes, and their effect on the total monthly mortgage payment.<br></font>-->

<form method="POST"  action="">
<table id='dynamic-table' class='table table-striped  table-hover'>
    <tr valign="top">
    </tr>
      <tr valign="top" bgcolor="#eeeeee">
        <td align="center" ><strong><i>Enter Account Number:</i></strong><input type="text" size="20" name="mytracknumber" required></td>
    </tr>
       
    
    
    <tr valign="center" bgcolor="#eeeeee">
        <td align="center" colspan="2"><input type="submit"  id="bigbutton" name="bigbutton" value="CHECK"></td>
    </tr>

</table>
</form>

<!-- END BODY -->




				

			</div> <!-- /panel-body -->		
		</div> <!-- /panel -->		
<?php
if(isset($_POST['bigbutton'])){
	$accountnumber = $_POST['mytracknumber'];
	
$customer = "select * from customers WHERE affiliate_number = '$accountnumber'";
$resultcustomert = $conn_db->query($customer);
if ($resultcustomert->num_rows > 0) {
while($rowval = $resultcustomert->fetch_assoc()) {
	$accountnumber = $rowval['affiliate_number'];
	$firstname = $rowval['names'];
	$lastname = $rowval['lname'];
	$gender= $rowval['gender'];
	$province = $rowval['province'];
	$district =$rowval['district'];
	$sector =$rowval['sector'];
}
echo "<br>";
echo'<table class="blueTable" id ="example" align="center"><tr><td>';
echo '<h3>Account Number :'.$accountnumber.'</h3>';	
echo '<h3>Names :'.$firstname.' &nbsp;'.$lastname.'</h3>';	
echo '<h3>Gender :'.$gender.'</h3>';	
echo '<h3>Adress :'.$province.'&nbsp; -&nbsp;'.$district.'&nbsp; -&nbsp;'.$sector.'</h3></td></tr></table>';	

}
else{
		echo "<h1><font color='red'>Account Does not Exist!!!</font></h1>";

}
echo "<br>";	
	
	
	
	$amortization = "SELECT first_name,last_name,id_number,telephone,district,sector,cell,village,loan_tracknumber, loan_account,loan_status,branch,loan_term_type,loan_term_number,loan_interest,time_application,first_payment,loan_type,loan_amount, MONTH(time_application) AS TM FROM loan_personalinfo INNER JOIN  loan_details ON loan_personalinfo.loan_id = loan_details.loan_tracknumber WHERE loan_account = '$accountnumber'";
$resultamort = $conn_db->query($amortization);
if ($resultamort->num_rows > 0) {
echo'<table class="blueTable" id ="example" align="center" style="width:85%"> <tr><th>No</th><th>Loan Type</th><th>Branch</th><th>Amount</th><th>Status</th><th>First Payment</th><th>Term</th><th>Last Payment</th><th>Interest Rate </th><th>Monthly <br>Payment</th><th> Action</th></tr>';
while($rowsborowers = $resultamort->fetch_assoc()) {
	$ki = $ki+1;
	$key1="asdasasdasdy@&!123365454478";
$mystring =$rowsborowers['loan_tracknumber'];
$myidamorti = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key1), $mystring, MCRYPT_MODE_CBC, md5(md5($key1))));
?>
<tr><td><?php echo $ki;?></td>
<td><?php echo $rowsborowers['loan_type'];?></td>
<td style='mso-number-format:"\@"'><?php echo $rowsborowers['branch'];?></td>
<td align="right"><?php echo number_format($rowsborowers['loan_amount']);?></td>
<td><?php echo $rowsborowers['loan_status'];?></td>
<td><?php echo $rowsborowers['first_payment'];?></td>
<td><?php echo $rowsborowers['loan_term_number'].'&nbsp;&nbsp;'.$rowsborowers['loan_term_type'].'(s)';?></td>
<td><?php
 $DT = $rowsborowers['first_payment'];
 $nmbr = $rowsborowers['loan_term_number'];
 $tp = $rowsborowers['loan_term_type'];
 if($tp == 'Year'){
     $date = strtotime(date("Y-m-d", strtotime($DT)) . " +".$nmbr." year");
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
     $date = strtotime(date("Y-m-d", strtotime($DT)) . " +".$nmbr." month");
	 	 $nmbr =$nmbr;
 }
if($tp == 'Week'){
     $date = strtotime(date("Y-m-d", strtotime($DT)) . " +".$nmbr." week");
 }

    $date = date("Y-m-d",$date);
 echo $date;
 ?></td>
 <td><?php 
  echo $rowsborowers['loan_interest'].'%';?></td>
<td align="right"><?php 

            $monthly_payment = (($rowsborowers['loan_interest'] /(100 * 12)) * $rowsborowers['loan_amount']) / (1 - pow(1 + $rowsborowers['loan_interest'] / 1200,  (-($nmbr))));
$monthly_payment= round($monthly_payment);
echo number_format($monthly_payment);
?></td>
<td> <a href="customer?yHHg089765Dsdfs=<?php echo $myidamorti ;?>">Details</a></td>




</tr>
  <?php 
  
  $totalamount = $totalamount + $rowsborowers['loan_amount'];
$totamontlypaymet = $totamontlypaymet + $monthly_payment;
  }?>



<?php

echo'</table>';
}
else{
	echo "<h1><font color='red'>No Loan Contracted!!!</font></h1>";
}
}

?>	</div> <!-- /col-md-12 -->	
</div> <!-- /row-->

		
													
													
													<!-- /.col -->
								</div><!-- /.row -->

								
								<!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
		<!-- /.main-content -->
     
        <!--  ends -->
        <!-- partial:partials/_footer.html -->
         <!--  ends -->
        <!-- partial:../../partials/_footer.html -->
        
        <!-- partial -->
      <!-- main-panel ends -->
    <!-- page-body-wrapper ends -->
  </div>  </div>
          <div class="container-fluid clearfix">
		  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"><strong>Copyright © 2019</strong>
              <a href="http://www.qloan.rw" target="_blank"><strong>Q-loan</a>. All rights reserved.</strong></span>
             <span class="text-muted d-block text-right "><strong><i>Your satisfaction is our duty</i></strong>            </span>
          </div>
        </footer><!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>
<script src="assets/plugins/ckeditor/ckeditor.js"></script>

<script src="assets/plugins/ckeditor/adapters/jquery.js"></script>
<script src="assets/dist/js/pass_up.js"></script>

<script src="assets/js/jquery-2.1.4.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>


		

		 <script src="jquery-1.5.js"></script>
<Script>
function popup01(url) 
{
 var width  = 1200;
 var height = 1000;
 var left   = (screen.width  - width)/2;
 var top    = (screen.height - height)/2;
 var params = 'width='+width+', height='+height;
 params += ', top='+top+', left='+left;
 params += ', directories=no';
 params += ', location=no';
 params += ', menubar=no';
 params += ', resizable=no';
 params += ', scrollbars=no';
 params += ', status=no';
 params += ', toolbar=no';
 newwin=window.open(url,'windowname5', params);
 if (window.focus) {newwin.focus()}
 return false;
}
// -->
</script>	   
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
/***SET THE BUTTON'S HOVER AND FOCUS STATES***/
input#bigbutton:hover, input#bigbutton:focus {
color:#dfe7ea;
/*reduce the size of the shadow to give a pushed effect*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
}

form-submit-button {

background: #0066A2;

color: white;

border-style: outset;

border-color: #0066A2;

height: 20px;

width: 50px;

font: bold 15px arial, sans-serif;

text-shadow:none;

}


i.fa.fa-print{
    margin-right: 5px;
}
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
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
  border: 1px solid #ccc;
  border-top: none;
}
.verticalLine {
  border-left: thick solid #ff0000;
}


table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 55%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
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