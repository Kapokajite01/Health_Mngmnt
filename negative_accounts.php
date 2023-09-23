<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Audit </title>
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
   <link rel="shortcut icon" href="images/favicon.png" />

<!--===============================================================================================-->
<!--===============================================================================================-->
		<meta name="description" content="Mailbox with some customizations as described in docs" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	
 <script type="text/javascript" src="date_time.js"></script>
 <script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 500) {
          val.value = val.value.substring(0, 500);
        } else {
          $('#charNum').text(500 - len);
        }
      };
    </script>
 
<?php
error_reporting(0);
session_start();
	
include'mydb_connection/my_dbconnection.php';
include('mydb_connection/my_connect_db.php');
$userid = $_SESSION['userid'];
if(!$userid){
	header('location:logout');
}
?>
<body>
  <?php include 'left_auditor.php';?>
    <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
     
      <!-- partial -->
<div class="main-content">
				<div class="main-content-inner">
				
					<div class="page-content">
						<!-- /.ace-settings-container -->

						<!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<div class="tabbable">
										
											
											

								
													
											<?php require_once 'includes/headeraudit.php'; ?>

<?php 
$userid = $_SESSION['userid'];
$sql = "SELECT * FROM users_table WHERE id = {$userid}";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();
?>
<script type="text/javascript">
$(document).ready(function(){
      $('#txtInput').bind("cut copy paste",function(e) {
          e.preventDefault();
      });
    });
</script>
<?php 
$branch = $_POST['branchname'];

if(isset($_POST['subbutton'])){
$auditrecors = "SELECT clinet_id,client_account,client_firstname,client_lastname,cl_account_type,account_atatus,last_audit_balance,Auditname,variance,SUM(deposit) AS totdeposits,SUM(withdrawl) AS totwithdrawala,current_balance  FROM clients  JOIN account_audit ON clients.clinet_id = account_audit.cl_id WHERE current_balance < 0  AND Auditname = '$branch' GROUP BY client_account";
	
}
else{
$auditrecors = "SELECT clinet_id,client_account,client_firstname,client_lastname,cl_account_type,account_atatus,last_audit_balance,Auditname,variance,SUM(deposit) AS totdeposits,SUM(withdrawl) AS totwithdrawala,current_balance  FROM clients  JOIN account_audit ON clients.clinet_id = account_audit.cl_id WHERE current_balance < 0 GROUP BY client_account";
}
?>
				</div>
			<?php 
				$didorr = $_GET['error_get_last'];
				if  ($didorr==1){
				echo "<h4 id='test'><font color='Red'> Previous Record Was Not Saved Try Again</font></h4>";	
				}
				?>
				
				<form action="" method="POST">
	      

<div class="form-group">
	        	<Strong><font size="5"><i>Branch: </i></font></strong>&nbsp;&nbsp;
                             <?php

  $status = "SELECT DISTINCT Auditname from clients";
?>

    <select  id = "branchname"  name = "branchname" style="border-color:black"  onchange='CheckColors(this.value);changetextbox();' required><option value=""><strong>Select Branch<strong></option>

      <?php
	  $resultstatus= $conn_db->query($status);
if ($resultstatus->num_rows > 0) {
while($row1 = $resultstatus->fetch_assoc()) {
            echo '<option value="' . $row1['Auditname'] . '">' . $row1['Auditname'] . '</option>';
        }
}
      ?>
    </select>&nbsp;&nbsp;<button type="submit" name="subbutton" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off">Submit</button>
                         </div>
				
	        </div>
	       	<div align="center"></div>

               <!-- /form-group-->	
<!-- /form-group-->
       <!-- /form-group-->
                <!-- /form-Directorate-->				
	        
			
			
	      
	      <div class="form-group" align="center">
		  	        

	        
	      </div>
	      <!-- /modal-footer -->
     	</form>
				<hr>
				
<table class="blueTable" id ="example" align="center" style="width:90%;border:0px;" >
<tr>
<th>No</th>
<th>Names</th>
<th>Account Number</th>
<th>Type of Deposit</th>
<th>Status </th>
<th>Inventory Balance of the Year 2017</th>
<th>Totol Deposists of the year 2018</th>
<th>Total Withdrawals of the year 2018 </th>
<th>Balance Of The Inventory</th>
<th>Cumulative Balance</th>
<th>Balance of The Deposit Card  Dec 2018</th>
<th>Variance of Inventory</th>
<th>Balance Jone 2019</th>
<th>Comment</th>
</tr>

 <tbody>
 
 <?PHP 
$resultAUDIT = $conn_db->query($auditrecors);
if ($resultAUDIT->num_rows > 0) {
while($rowaudit = $resultAUDIT->fetch_assoc()) {
$INVBALANCE = $rowaudit['totdeposits']- $rowaudit['totwithdrawala'];
$cumulbalance=$rowaudit['last_audit_balance']+$INVBALANCE;
$varianceondeposit=$rowaudit['current_balance']-$cumulbalance;
$totlastinventory = $totlastinventory +$rowaudit['last_audit_balance'];
$mytotdeposits = $mytotdeposits + $rowaudit['totdeposits'];
$mytotwithdraws = $mytotwithdraws +$rowaudit['totwithdrawala'];
$varianceinv =$rowaudit['variance'];
$totINVBALANCE = $totINVBALANCE +$INVBALANCE;
$totalcumulariv = $totalcumulariv +$cumulbalance;
$totcumulbalance = $totcumulbalance +$rowaudit['current_balance'];
$totvarianceondeposit = $totvarianceondeposit + $rowaudit['current_balance'];
$totvarianceinv = $totvarianceinv + $varianceinv;
$totcurbalance = $totcurbalance + $rowaudit['current_balance'];
	?>
<tr>
<td><?php echo ++$i;?></td>
<td><?php echo  $rowaudit['client_firstname'].'&nbsp;&nbsp;'.$rowaudit['client_lastname'];?></td>
<td><?php echo  $rowaudit['client_account'];?></td>
<td><?php echo  $rowaudit['cl_account_type'];?></td>
<td><?php echo  $rowaudit['account_atatus'];?></td>
<td><?php echo  number_format($rowaudit['last_audit_balance']);?></td>
<td><?php echo  number_format($rowaudit['totdeposits']);?></td>
<td><?php echo  number_format($rowaudit['totwithdrawala']);?></td>
<td><?php echo  number_format($INVBALANCE);?></td>
<td><?php echo  number_format($cumulbalance);?></td>
<td><?php echo  number_format($rowaudit['current_balance']);?></td>
<td><?php echo  number_format($varianceinv);?></td>
<td><?php echo  number_format($rowaudit['current_balance']);?></td>
<td><p><?php 
$clNo= $rowaudit['clinet_id'];
$clcomment = "SELECT * FROM audit_comment where client_number = '$clNo'";
$resultCOMENT = $conn_db->query($clcomment);
if ($resultCOMENT->num_rows > 0) {
while($rowCOM = $resultCOMENT->fetch_assoc()) {
echo  '<P> <strong>'.$rowCOM['comment'].'</strong></P>';

}
}
?></td>
</tr>
<?PHP
}

}

?>				
<tr>
<td colspan="5" align="center"><strong>Totals</strong></td>
<td><strong><?php echo  number_format($totlastinventory);?></strong></td>
<td><strong><?php echo  number_format($mytotdeposits);?></td>
<td><strong><?php echo  number_format($mytotwithdraws);?></td>
<td><strong><?php echo  number_format($totINVBALANCE);?></td>
<td><strong><?php echo  number_format($totalcumulariv);?></td>
<td><strong><?php echo  number_format($totvarianceondeposit);?></td>
<td><strong><?php echo  number_format($totvarianceinv);?></td>
<td><strong><?php echo  number_format($totcurbalance);?></td>
<td></td>
</tr>				
				
				
				
				
				
			</tbody>	</table>
				<hr>
	<i class="fa fa-print"></i><input name="print" type="button" value="Print" id="printButton" onClick="printpage()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="fa fa-table"></i><input type="button" onclick="tableToExcel('example', 'W3C Example Table')" value="Export To Excel">
				<div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog" style="width:100%">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="submitBrandForm" action="php_action/save_record" method="POST">
	      
	      <div class="modal-body">

	      	<div id="add-brand-messages"> <h3>Add New record</h3></div>
<div class="form-group">
	        	<label for="firstname" class="col-sm-3 control-label">Account Number: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="acnumber" placeholder="Account Number" name="acnumber" autocomplete="off" required>
				    </div>
	        </div>
	        <div class="form-group">
	        	<label for="firstname" class="col-sm-3 control-label">First Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" autocomplete="off" required>
				    </div>
	        </div> 
			
               <div class="form-group">
	        	<label for="lastname" class="col-sm-3 control-label">Last Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->	
<div class="form-group">
	        	<label for="rol" class="col-sm-3 control-label">Type of Depostit: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="rol" name="typedeposit" required>
				      	<option value="">~~SELECT Type~~</option>
				      	<option value="Diposit">Deposit</option>
				      	<option value="loandeposit">Loan Disbursement </option>
				      </select>
				    </div>
	        </div><!-- /form-group-->
        <div class="form-group">
	        	<label for="rol" class="col-sm-3 control-label">Status: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="rol" name="accstatus" required>
				      	<option value="">~~SELECT Status~~</option>
				      	<option value="Active">Active</option>
				      	<option value="Dormant">Dormant</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->
                <!-- /form-Directorate-->				
	         <div class="form-group">
	        	<label for="lastname" class="col-sm-3 control-label"> Inventory Year 2017 </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="number" class="form-control" id="lastname" placeholder="2017 Inventory" name="inventory2017" autocomplete="off" required>
				    </div>
	        </div> <div class="form-group">
	        	<label for="lastname" class="col-sm-3 control-label"> Year 2018 Deposits </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="number" class="form-control" id="lastname" placeholder="2018 Deposits" name="deposit2018" autocomplete="off" required>
				    </div>
	        </div><div class="form-group">
	        	<label for="lastname" class="col-sm-3 control-label"> Year 2018 Withdrawals </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="number" class="form-control" id="lastname" placeholder="2018 Withdrawals" name="widhdraws2018" autocomplete="off" required>
				    </div>
	        </div><hr>
<div class="form-group">
	        	<label for="lastname" class="col-sm-3 control-label"> Balance Deposit Card December 2018</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="number" class="form-control" id="lastname" placeholder="Balance Deposit Card December 2018" name="baldep2018" autocomplete="off" required>
				    </div>
	        </div>
			<div class="form-group">
	        	<label for="lastname" class="col-sm-3 control-label"> Balance on June 2019</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="number" class="form-control" id="lastname" placeholder="Balance on June 2019" name="bal2019" autocomplete="off" required>
				    </div>
	        </div>
			<div class="form-group">
	        	<label for="lastname" class="col-sm-3 control-label"> Comment Maximum Characters 500</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				       <textarea  name='mytxtarea' id="field" onkeyup="countChar(this)" rows="5" cols="30"required aria-required="true"></textarea>
					   <div id="charNum" style="margin-left: 55%"></div ><div style="margin-left: 55%"><strong>Characters Remain</strong></div>
				    </div>
	        </div>
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
		  	        <button type="submit" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off">Save Record</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>

			</div> <!-- /panel-body -->		

		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->	
</div></div></div> <!-- /row-->

		
													
													
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
#test{
    animation: Test 1s infinite;
}
@keyframes Test{
    0%{opacity: 1;}
    50%{opacity: 0;}
    100%{opacity: 1;}
}
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
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 35%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 0px solid #AAAAAA;
  padding: 8px 5px;
}
table.blueTable tbody td {
  font-size: 16px;
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