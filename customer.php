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
	$key1="asdasasdasdy@&!123365454478";
$encrypted = $_GET['yHHg089765Dsdfs'];
$encrypted = preg_replace('/\s+/', '+', $encrypted);
$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key1), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key1))), "\0");
$travck = $decrypted;
$amortization = "SELECT first_name,last_name,gender,id_number,province,telephone,district,sector,cell,village,loan_tracknumber, loan_account,loan_status,branch,loan_term_type,loan_term_number,loan_interest,time_application,first_payment,loan_type,loan_amount, MONTH(time_application) AS TM FROM loan_personalinfo INNER JOIN  loan_details ON loan_personalinfo.loan_id = loan_details.loan_tracknumber WHERE loan_tracknumber = '$travck'";
$resultamort = $conn_db->query($amortization);
if ($resultamort->num_rows > 0) {
while($rowsborowers = $resultamort->fetch_assoc()) {
	$accountnumber = $rowsborowers['loan_account'];
	$name = $rowsborowers['first_name'];
	$lastname =  $rowsborowers['last_name'];
	$gender= $rowsborowers['gender'];
	$province = $rowsborowers['province'];
	$district =$rowsborowers['district'];
	$sector =$rowsborowers['sector'];
	$amount = $rowsborowers['loan_amount'];
	$intrate =$rowsborowers['loan_interest'];
	$term =$rowsborowers['loan_term_number'];
	$termtype =$rowsborowers['loan_term_type'];
	$firstpymt =$rowsborowers['first_payment'];

}
}

?>
<?php include'left_commercial_amortizations.php';?>

    
<div id="form-wrapper">
		        <h2>  Customer's Information</h2><hr>

<?php
echo'<table class="blueTable"  align="center" style="width:35%"><tr><td>';
echo '<h4>Account Number :'.$accountnumber.'</h4>';	
echo '<h4>Account Names :'.$name.' &nbsp;'.$lastname.'</h4>';	
echo '<h4>Gender :'.$gender.'</h4>';	
echo '<h4>Adress :'.$province.'&nbsp; -&nbsp;'.$district.'&nbsp; -&nbsp;'.$sector.'</h4></td></tr></table>';?><hr>
        <h2>Loan Information</h2><hr>
        <form id="calculate-loan" method="post" action="">

            <table class="blueTable"  align="center" style="width:25%;border:0px;" >
                <tbody>
                    
     <tr>
                        <td><h4>Initial Value :&nbsp;&nbsp;<?php echo number_format($amount); ?></h4><input type="text" id="vehicle_value" name="vehicle_value" value="<?php echo $amount ?>"  style="display:none">
                    <h4>Interest Rate:&nbsp;&nbsp;<?php echo $intrate; ?>%<input type="text" id="interest_rate" name="interest_rate" value="<?php echo $intrate;?>"  style="display:none"></h4>
					 <h4>Term:&nbsp;&nbsp;<?php echo $term.'&nbsp;'.$termtype; ?>(s)<input type="text" step="1" id="months" name="months" value="<?php echo $term ;?>"  style="display:none"><input type="text" id="termtype" name="termtype" value="<?php echo $termtype; ?>" style="display:none"></h4>
                   <h4>First Payment:&nbsp;&nbsp;<?php echo $firstpymt; ?></h4><input type="text" id="first_payment" name="first_payment" value="<?php echo $firstpymt;?>" style="display:none"></td>
                    </tr>
                    <tr>
                    <td><input type="submit" name="submit" id="bigbutton" value="Amortization"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div><hr>
     <?php 
    if(isset($_POST['submit'])) {
		$mmonth= $_POST['months'];
		$termtype= $_POST['termtype'];
		if($termtype == 'Year'){
		$mmonth = $mmonth*12;	
		}
    ?>
        <h2>  Repayments Information</h2><hr>
        <?php
            $balance = (float) $_POST['vehicle_value'];
            $monthly_payment = (($_POST['interest_rate'] /(100 * 12)) * $_POST['vehicle_value']) / (1 - pow(1 + $_POST['interest_rate'] / 1200,  (-$mmonth)));
        ?>
                <table class="blueTable"  align="center" style="width:25%;border:0px;" >
                <tbody>
                    
     <tr>
                        <td>
            <h4>Total Payments: <?php echo number_format($monthly_payment * $mmonth, 2); ?></h4>
            <h4>Monthly Payment: <?php echo number_format($monthly_payment, 2); ?></h4>
            <h4>Total Interest: <?php echo number_format($monthly_payment * $mmonth - $balance, 2); ?></h4>
        </td></tr></table><hr>
                <table class="blueTable" id ="example" align="center" style="width:45%;border:0px;" >
            <tbody>
                <tr>
                    <th>Month</th>
                    <th>Date</th>
                    <th>Initial</th>
                    <th>Principal</th>
                    <th>Interest</th>
                    <th>Payment</th>
                    <th>Balance</th>
                </tr>
                <?php
                for($month = 0; $month < (int)$mmonth; $month++) {
                    $interest = $balance * $_POST['interest_rate'] / 1200;
                    $principal = $monthly_payment - $interest;
                    $nextbalnce = $balance -$principal;
                ?>
                <tr>
                    <td align="center"><?php echo $month +1;?></td>
                    <td><?php $date = $firstpymt;
$date = strtotime(date("Y-m-d", strtotime($date)) . " +$month month");
$date = date("Y-m-d",$date);
echo $date ?></td>
                    <td><?php echo number_format($balance, 2) ?></td>
                    <td><?php echo number_format($principal, 2) ?></td>
                    <td><?php echo number_format($interest, 2) ?></td>
                    <td><?php echo number_format($monthly_payment, 2) ?></td>
                    <td><?php echo number_format($nextbalnce, 2) ?></td>
                </tr>
                <?php
                    $balance -= $principal;
                }
                ?>
            </tbody>
        </table>
    <?php } ?>
	
	<hr>
	<i class="fa fa-print"></i><input name="print" type="button" value="Print" id="printButton" onClick="printpage()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="fa fa-table"></i><input type="button" onclick="tableToExcel('example', 'W3C Example Table')" value="Export To Excel">

	
	<hr>
<br>


<!-- END BODY -->




				

			</div> <!-- /panel-body -->		

		</div> <!-- /panel -->		
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
  <script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
window.print();
document.getElementById('printButton').style.visibility="visible";  
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
<style>
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
  width: 55%;
  text-align: left;
  border-collapse: collapse;
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