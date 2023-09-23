<?php
error_reporting(0);

session_start();
$userid = $_SESSION['userid'];
if(!$userid){
	header('location:logout');
}
include('mydb_connection/my_connect_db.php');
include'mydb_connection/my_dbconnection.php';
  $account = $_SESSION['account'];
if(isset($_POST['datedisplay'])){
	$from = $_POST['datesearch'];
	$to = $_POST['datesearch1'];
	$branch = $_POST['branch'];
	$loantype = $_POST['loantype'];
	if($branch == 'All' and $loantype == 'All'){
$borrowers = "SELECT first_name,last_name,id_number,telephone,district,sector,cell,village,loan_tracknumber, loan_account,loan_status,branch,loan_term_type,loan_term_number,loan_interest,time_application,first_payment,loan_type,loan_amount, MONTH(time_application) AS TM FROM loan_personalinfo INNER JOIN  loan_details ON loan_personalinfo.loan_id = loan_details.loan_tracknumber WHERE time_application >= '$from' and time_application <= '$to' ORDER  BY time_application";
	}
	if($branch != 'All' and $loantype != 'All'){
$borrowers = "SELECT first_name,last_name,id_number,telephone,district,sector,cell,village,loan_tracknumber, loan_account,loan_status,branch,loan_term_type,loan_term_number,loan_interest,time_application,first_payment,loan_type,loan_amount, MONTH(time_application) AS TM FROM loan_personalinfo INNER JOIN  loan_details ON loan_personalinfo.loan_id = loan_details.loan_tracknumber WHERE time_application >= '$from' and time_application <= '$to'  and loan_type= '$loantype'  and branch= '$branch' ORDER  BY time_application";
	}
		if($branch = 'All' and $loantype != 'All'){
$borrowers = "SELECT first_name,last_name,id_number,telephone,district,sector,cell,village,loan_tracknumber, loan_account,loan_status,branch,loan_term_type,loan_term_number,loan_interest,time_application,first_payment,loan_type,loan_amount, MONTH(time_application) AS TM FROM loan_personalinfo INNER JOIN  loan_details ON loan_personalinfo.loan_id = loan_details.loan_tracknumber WHERE time_application >= '$from' and time_application <= '$to'  and loan_type= '$loantype'  ORDER  BY time_application";
	}
		if($branch != 'All' and $loantype = 'All'){
$borrowers = "SELECT first_name,last_name,id_number,telephone,district,sector,cell,village,loan_tracknumber, loan_account,loan_status,branch,loan_term_type,loan_term_number,loan_interest,time_application,first_payment,loan_type,loan_amount, MONTH(time_application) AS TM FROM loan_personalinfo INNER JOIN  loan_details ON loan_personalinfo.loan_id = loan_details.loan_tracknumber WHERE time_application >= '$from' and time_application <= '$to'  and branch= '$branch' ORDER  BY time_application";
	}
}
else{
	$borrowers = "SELECT first_name,last_name,id_number,telephone,loan_tracknumber,district,sector,cell,village, loan_account,loan_status,branch,loan_term_type,loan_term_number,loan_interest,time_application,first_payment,loan_type,loan_amount, MONTH(time_application) AS TM FROM loan_personalinfo INNER JOIN  loan_details ON loan_personalinfo.loan_id = loan_details.loan_tracknumber WHERE MONTH(time_application) = MONTH(CURRENT_DATE())and YEAR(time_application) = YEAR(CURRENT_DATE()) ORDER  BY time_application";

}

$resultborrowers = $conn_db->query($borrowers);
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
 
 
													
<?php include'left_connect.php';?>

<script type="text/javascript">
$(document).ready(function(){
      $('#txtInput').bind("cut copy paste",function(e) {
          e.preventDefault();
      });
    });
</script>
<script>
function myFunction() {
  window.print();
}
</script>
<script>
var tableToExcel = (function() {
var uri = 'data:application/vnd.ms-excel;base64,'
, template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
return function(table, name) {
if (!table.nodeType) table = document.getElementById(table)
var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
window.location.href = uri + base64(format(template, ctx))
}
})()
</script>
<script type="text/javascript">

function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
		document.getElementById("loantype").disabled = false;
		document.getElementById('loantype').style.display="inline";
		document.getElementById('selcttypelable').style.display="none";
		document.getElementById('yesCheck').style.display="none";

    }
    else {
		document.getElementById("loantype").disabled = true;
		document.getElementById('loantype').style.display="none";
		
	}

}

function yesnoCheck1() {
    if (document.getElementById('yesCheck1').checked) {
		document.getElementById("branch").disabled = false;
		document.getElementById('branch').style.display="inline";
		document.getElementById('selcttypelable1').style.display="none";
		document.getElementById('yesCheck1').style.display="none";

    }
    else {
		document.getElementById("branch").disabled = true;
		document.getElementById('branch').style.display="none";
		
	}

}
</script>
<div class="row">
	<div class="col-md-12">
		
				
		<div class="panel panel-default">
		<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
   <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 

   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script><br><br>
   <form action="" method ="POST">
<input type="text" name="datesearch" id="datesearch" placeholder="Start Date" required aria-required='true' aria-describedby='name-format'placeholder="From">
<input type="text" name="datesearch1" id="datesearch1" placeholder="End Date" required aria-required='true' aria-describedby='name-format'placeholder="To">
<input type="submit" class="button" name="datedisplay" value="Submit"><br><br>
<span id="selcttypelable"><strong>Ckeck Loan Type</strong></span>&nbsp;<input type="checkbox" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck"><select class="js-select2" name="loantype" id="loantype"  style="border-color:black;display:none"  Required disabled>
							<option value="">SELECT LOAN TYPE</option>
							<option value= "All" >All</option>
							<option value= "Advance Salary" >Advance Salary</option>
							<option value= "Commercial Loan" >Commerical Loan</option>
							<option value= "Investment Group" >Investment Group Loan/ Cooperatives</option>
						</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="selcttypelable1"><strong>Ckeck Branch</strong></span>&nbsp;<input type="checkbox" onclick="javascript:yesnoCheck1();" name="yesno1" id="yesCheck1"><select  name="branch"   id="branch"  style="border-color:black;display:none" Required disabled>
							<option value="">SELECT BRANCH</option>
							<option value= "All" >All</option>
							<option value= "NYARUGENGE" >NYARUGENGE</option>
							<option value= "RWAMAGANA" >RWAMAGANA</option>
							<option value= "MUSANZE" >MUSANZE</option>
							<option value= "MUHANGA" >MUHANGA</option>
							<option value= "HUYE" >HUYE</option>
							<option value= "GICUMBI" >GICUMBI</option>
							<option value= "BUGESERA" >BUGESERA</option>
							<option value= "RULINDO" >RULINDO</option>
						</select>
<br><br>
<table class="blueTable" id ="example" align="center" style="width:85%">
<tr><th>No</th>
<th><strong>Loan Track Number</strong></th>
<th><strong>Account Number</strong></th>
<th><strong>Names</strong></th>
<th><strong>Loan Type</strong></th>
<th><strong>Branch</strong></th>
<th><strong>Amount</strong></th>
<th><strong>Term(s)</strong></th>
<th><strong>Interest Rate</strong></th>
<th><strong>Time Application</strong></th>
<tr>
<?php

 if ($resultborrowers->num_rows > 0) {
while($rowsborowers= $resultborrowers->fetch_assoc()) {
	$i++;
	
	?>
<tr><td><?php echo $i;?></td>
<td style='mso-number-format:"\@"'><?php echo $rowsborowers['loan_tracknumber'];?></td>
<td style='mso-number-format:"\@"'><?php echo $rowsborowers['loan_account'];?></td>
<td><?php echo $rowsborowers['first_name'].'&nbsp;&nbsp;'.$rowsborowers['last_name'];?></td>
<td><?php echo $rowsborowers['loan_type'];?></td>
<td style='mso-number-format:"\@"'><?php echo $rowsborowers['branch'];?></td>
<td style='mso-number-format:"\@"'><?php echo $rowsborowers['loan_amount'];?></td>
<td><?php echo $rowsborowers['loan_term_number'].'&nbsp;&nbsp;'.$rowsborowers['loan_term_type'].'(s)';?></td>
<td><?php echo $rowsborowers['loan_interest'].'%';?></td>
<td><?php echo $rowsborowers['time_application'];?></td>




</tr>
  <?php $totalamount = $totalamount + $rowsborowers['loan_amount']; }?>
<tr><td colspan="6"><h5 align="right"><strong>Total  Loans  Registered </td><td colspan="4" style=" text-indent: 10%;"><h5><strong><?php echo number_format($totalamount);?></h5></strong></td></tr>
<?php }?> 
</table></form><hr>
<button class="fa fa-print" onclick="myFunction()"></i><strong>Print</strong></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="fa fa-table" onclick="tableToExcel('example', 'W3C Example Table')">  <strong>Export To Excel</strong></button>
</div> <!-- /col-md-12 -->	
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

   

<style>
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