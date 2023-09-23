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
 <script>
      function countChar1(val) {
        var len = val.value.length;
        if (len >= 100) {
          val.value = val.value.substring(0, 100);
        } else {
          $('#charNum1').text(100 - len);
        }
      };
    </script>
 <link href="jquery-uidate.css" rel="stylesheet" type="text/css"/>  
   <script src="jquery-ui.min1date.js"></script> 
   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

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
<body onload="scrollToBottom ();">
  <?php include 'left_auditor.php';?>
    <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
     
      <!-- partial -->

<!-- Trigger/Open The Modal -->

<!-- The Modal -->

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
/*if(gtrfEEESskljH){
$accountnumber= $_GET['gtrfEEESskljH'];	
}
else if($_POST['country_id']){
	$accountnumber = $_POST['country_id'];
}*/
	$clnumber = $_GET['clinetnmbrn'];
$selectdate = "SELECT dat_opn FROM account_audit WHERE cl_id = '$clnumber' ORDER BY account_aud_id  DESC LIMIT 1";
$resultDATE = $conn_db->query($selectdate);
if ($resultDATE->num_rows > 0) {
while($rowDAT = $resultDATE->fetch_assoc()) {
	$LASTDATE=$rowDAT['dat_opn'];
}
}

$auditrecors = "SELECT client_account,client_firstname,client_lastname,mytimr,description,deposit,withdrawl,current_balance,dat_opn  FROM clients  JOIN account_audit ON clients.clinet_id = account_audit.cl_id  WHERE clinet_id = '$clnumber' order by dat_opn";

$resultAUDIT = $conn_db->query($auditrecors);
if ($resultAUDIT->num_rows > 0) {
while($rowaudit = $resultAUDIT->fetch_assoc()) {
$currbalance = number_format($rowaudit['current_balance']);
	
}

}

?>	
		<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
   <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 

   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>

				</div>
<?php
	
$customer = "select * from clients WHERE clinet_id = '$clnumber'";
$resultcustomert = $conn_db->query($customer);
if ($resultcustomert->num_rows > 0) {
while($rowval = $resultcustomert->fetch_assoc()) {
	$accountnumber = $rowval['client_account'];
	$firstname = $rowval['client_firstname'];
	$lastname = $rowval['client_lastname'];
	$account_type= $rowval['account_type'];
	$account_atatus = $rowval['account_atatus'];
	$lastaudit = $rowval['last_audit'];
	$branch = $rowval['Auditname'];
	$variance = $rowval['variance'];
}
echo "<p>";
echo'<table class="blueTable" id ="example" align="center"><tr><td>';
echo '<h4><strong>Account Number :'.$accountnumber.'</h4>';	
echo '<h4>Names :'.$firstname.' &nbsp;'.$lastname.'</h4>';	
echo '<h4>Account Type :'.$account_type.'</h4>';
if(($account_atatus =='ACTIVE') or($account_atatus== 'active')){	
echo '<h4><font color="green">Account Status :'.$account_atatus.'</font></h4>';	
}
else if($account_atatus == 'DORMANT'){
echo '<h4><font color="red">Account Status :'.$account_atatus.'</font></h4>';	
}
else{
echo '<h4><font color="green">Account Status :'.$account_atatus.'</font></h4>';	
	
}
echo '<h4>Last Audit Balance :'.number_format($lastaudit).'</h4>';	
echo '<h4> Branch :&nbsp;'.$branch.'</h4></td></tr>';	

}
else{
		echo "<h4><font color='red'>Account Does not Exist!!!</font></h4>";

}
;?>
</table><br>
<?php 
if($resultcustomert->num_rows > 0) {
					echo '<button id="myBtn"class="btn btn-default button1"><i class="glyphicon glyphicon-plus-sign"></i>   Add  New Record </button>';
}
else{
					echo '<a href="New_record" ><button class="btn btn-default button1" data-toggle="modal" > <i class="glyphicon glyphicon-plus-sign"></i><strong> Try Search Again </strong></button></a>';
	
}

?>
				<hr>
	<table class="blueTable" id ="example" align="center" style="width:50%;border:0px;" >
<tr>
<th>Itariki</th>
<th>No JD</th>
<th>Impamvu</th>
<td align="center" ><strong>Abikijwe</strong></td>
<td align="center"><strong>Abikujwe</strong></td>
<td align="center"><strong>Asigaye</strong></td>
</tr>

 <tbody>
 
 <?PHP 
$resultAUDIT = $conn_db->query($auditrecors);
if ($resultAUDIT->num_rows > 0) {
while($rowaudit = $resultAUDIT->fetch_assoc()) {
	$mydeposits = number_format($rowaudit['deposit']);
	$mywithdrowals = number_format($rowaudit['withdrawl']);
	$originalDate = $rowaudit['dat_opn'];
$newDate = date("d/m/Y", strtotime($originalDate));
?>
<tr>
<td><p><?php echo  $newDate;?></p></td>
<td><?php echo ++$i;?></td>
<td align="justify" cellspacing="40"><p><?php echo  $rowaudit['description'];?></p></td>
<td align="center"><?php if($mydeposits == 0){echo'-';}else{ echo $mydeposits;}?></td>
<td align="center"><?php if($mywithdrowals == 0){echo'-';}else{ echo $mywithdrowals;}?></td>
<td align="center"><?php echo  number_format($rowaudit['current_balance']);?></td>
</tr>
<?PHP
$totaldeposits = $totaldeposits+$rowaudit['deposit'];
$totalwithdrawals = $totalwithdrawals + $rowaudit['withdrawl'];
}

}
?>				
<tr>
<td colspan="3" align="center"><strong>Totals</strong></td>
<td align="right" cellspacing="10"><strong><?php echo  number_format($totaldeposits);?></td>
<td align="right" cellspacing="10"><strong><?php echo  number_format($totalwithdrawals);?></td>
<td align="right" cellspacing="10">-</td>
</tr>				
				
	<?php
	$comment = "select * from audit_comment WHERE client_number = '$clnumber' order by  	audit_comment_id DESC";
$resultcoment = $conn_db->query($comment);
if ($resultcoment->num_rows > 0) {
while($rowcomment = $resultcoment->fetch_assoc()) {
$acccomment = $rowcomment['comment'];
}

}

?>	
				
				
				
			</tbody>	</table>	
	
					<button type="button" class="btn btn-success dropdown-toggle btn-sm" id="addcoment" style="float: center; " onclick="myFunction() ">Add Comment</button>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm"  id="removecomment" style="float: center; display:none" onclick="myFunctionremove() ">Hide Comment</button><br><hr>
<div id="divcomments" style="display:none">
	<table class="blueTable"  align="center" style="width:20%;border:0px;"><tr><td align="center"><div class="form-group">
	<form method="POST" name="mycommentform" id="mycommentform"  Action="php_action/savecomment">
	<input type="text" name="clientNo" value="<?php echo $clnumber;?>"  style="display:none" required>
	<label for="lastname" class="col-sm-3 control-label"><strong><font size="4px">Variance: </font></strong></label><input type="text" name="variance" onkeyup="format(this)"  onkeypress="return isNumberKey(event);" value="<?php echo $variance;?>" required><br><br>
			    <div class="col-sm-8">
				       <textarea  name='commentfield' id="commentfield" onkeyup="countChar(this)" rows="5" cols="30"required aria-required="true" disabled ><?php if($acccomment){echo $acccomment;};?></textarea>
					   <div id="charNum" style="margin-left: 55%"></div ><div style="margin-left: 55%"><strong>Characters Remain</strong></div>
				    </div>
					
		  	        <button type="submit" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off">Save Comment</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</form>
	        </div>	</td></tr></table>	</div>
				
				
	<table class="blueTable" id ="example" align="center" style="width:20%;border:0px;" >
<tr>
<th>No</th>
<th>Comments</th>
<th>time</th>
</tr>

 <tbody>

<hr>
	<i class="fa fa-print"></i><input name="print" type="button" value="Print" id="printButton" onClick="printpage()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="fa fa-table"></i><input type="button" onclick="tableToExcel('example', 'W3C Example Table')" value="Export To Excel">
				<div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog" style="width:100%">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	
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
  <div id="myModal" class="modal">
currbalance
  <!-- Modal content -->
  <div class="modal-content">
   <form class="form-horizontal" id="myform" name="myform" action="php_action/save_audit" method="POST">
	      	      <div class="modal-body">
	      	<strong> <h3 align="center">Add New Record</h3></strong><hr>
			 <input type="text" class="form-control" id="myuserid" name="myuserid" value="<?php echo $userid;?>" autocomplete="off" required style="display:none;">
			 <input type="text" class="form-control" id="clientnumber" name="clientnumber" value="<?php echo $clnumber;?>" autocomplete="off" required  style="display:none;">
<div class="form-group">
<input type="text" name="lastdate" id="lastdate" value="<?php echo $LASTDATE;?>">
	        	<label for="firstname" class="col-sm-3 control-label"><strong>Account Number:</strong> </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="acnumber" placeholder="Account Number" name="acnumber" value="<?php echo $accountnumber;?>" autocomplete="off" required readonly>
				    </div>
	        </div>
			               <div class="form-group">
	        	<label for="lastname" class="col-sm-3 control-label"><strong>Last Balance: </strong></label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="lastaud_balance" placeholder="Balance" name="lastaud_balance" value="<?php echo number_format($totaldeposits+$lastaudit-$totalwithdrawals);?>" autocomplete="off" required>
				    </div>
	        </div>
	        <div class="form-group">
	        	<label for="firstname" class="col-sm-3 control-label"><strong>Date: </strong></label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" name="datesearch" id="datesearch"  autocomplete="off" required aria-required='true' aria-describedby='name-format'placeholder="Date of Operation" class="form-control datepicker" onchange="CompareDate()">
				    </div>
	        </div> 
 <!-- /form-group-->	
<div class="form-group">
	        	<label for="rol" class="col-sm-3 control-label"><strong>Type of Operation:</strong> </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="typeopn" name="typeopn" onchange="enabledisabletext()" required>
				      	<option value="">~~SELECT Type~~</option>
				      	<option value="Diposit">Deposit</option>
				      	<option value="Withdrawal">Withdrawal </option>
				      </select>
				    </div>
	        </div><!-- /form-group-->
       			
	         <div class="form-group">
	        	<label for="lastname" class="col-sm-3 control-label"><strong> Deposit </strong></label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" step="any" class="form-control" id="deposit" placeholder="Deposit" name="deposit" onkeyup="adddeposit();format(this)" onkeypress="return isNumberKey(event);" autocomplete="off" required disabled>
				    </div>
	        </div> <div class="form-group">
	        	<label for="lastname" class="col-sm-3 control-label"><strong> Withdrawal</strong></label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="withdrawal" placeholder="Withdrawal" name="withdrawal" onkeyup="substrwithdrawal();format(this)" onkeypress="return isNumberKey(event);" autocomplete="off" required disabled>
				    </div>
	        </div><div class="form-group">
	        	<label for="lastname" class="col-sm-3 control-label"><strong> New Balance</strong> </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="currbalance" placeholder="Current Balance" name="currbalance" onClick="format(this)" readonly autocomplete="off" required>
				    </div>
	        </div><hr>

			
			<div class="form-group">
	        	<label for="lastname" class="col-sm-3 control-label"> <strong>Description </strong></label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				       <textarea  name='description' id="field" onkeyup="countChar1(this)" rows="5" cols="30"required aria-required="true"></textarea>
					   <div id="charNum1" style="margin-left: 55%"></div ><div style="margin-left: 55%"><strong>Characters Remain</strong></div>
				    </div>
	        </div>
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
		  	        <button type="submit" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off">Save Record</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	        <button type="button" class="close">Close</button>
	        
	      </div>
	      <!-- /modal-footer -->
     	</form>
  </div>

</div>
          <div class="container-fluid clearfix">
		  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"><strong>Copyright © 2019</strong>
              <a href="http://www.qloan.rw" target="_blank"><strong>Q-loan</a>. All rights reserved.</strong></span>
             <span class="text-muted d-block text-right "><strong><i>Your satisfaction is our duty</i></strong>            </span>
          </div>
        </footer><!-- container-scroller -->

</body>

<script src="assets/plugins/ckeditor/adapters/jquery.js"></script>
<script src="assets/dist/js/pass_up.js"></script>

		<script src="assets/js/bootstrap.min.js"></script>


		

		 <script src="jquery-1.5.js"></script>
<script>
function myFunction() {
  var x1 = document.getElementById("divcomments");
  var remx1 = document.getElementById("removecomment");
  var addx1 = document.getElementById("addcoment");

  if (x1.style.display === "none") {
    x1.style.display = "block";
	document.mycommentform.commentfield.disabled=false;

  } 
  if (remx1.style.display === "none") {
    remx1.style.display = "block";
    addx1.style.display = "none";

  } 
}
</script>

<script>
function myFunctionremove() {
  var x1 = document.getElementById("divcomments");
  var remx1 = document.getElementById("removecomment");
  var addx1 = document.getElementById("addcoment");

  
    remx1.style.display = "none";
    x1.style.display = "none";
    addx1.style.display = "block";


}
</script>
<script>
function format(input) {
  var nStr = input.value + '';  
  nStr = nStr.replace(/\,/g, "");
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';  
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  input.value = x1 + x2;
}


</script>
	 <script>
function adddeposit() 
{
  var priceadd = document.getElementById("lastaud_balance").value;
  priceadd = priceadd.replace(",","");
  var newStr = priceadd.replace(/,/g, '');
  var deposits = document.getElementById("deposit").value;
    deposits = deposits.replace(",","");
  var newDeposit= deposits.replace(/,/g, '');

  var addcurrbalance = parseFloat(newStr) + parseFloat(newDeposit);
  if (!isNaN(addcurrbalance))
    document.getElementById("currbalance").value = addcurrbalance
}
function substrwithdrawal() 
{
  var price = document.getElementById("lastaud_balance").value;
   price = price.replace(",","");
   var newStrprice = price.replace(/,/g, '');
  
  var withdraw = document.getElementById("withdrawal").value;
      withdraw = withdraw.replace(",","");
  var newWithdraw= withdraw.replace(/,/g, '');

  var withdrawcurrbalance = parseFloat(newStrprice) - parseFloat(newWithdraw);
  if (!isNaN(withdrawcurrbalance))
    document.getElementById("currbalance").value = withdrawcurrbalance
}
</script>
<script language="javascript">
function enabledisabletext()
{
	if(document.myform.typeopn.value=='Diposit')
	{
		adddeposit();
	document.myform.withdrawal.disabled=true;
	document.myform.deposit.disabled=false;
	document.myform.deposit.focus();
	}
	else if(document.myform.typeopn.value=='Withdrawal')
	{
		substrwithdrawal();
	document.myform.withdrawal.disabled=false;
	document.myform.deposit.disabled=true;
	document.myform.withdrawal.focus();
	}
	else{
	document.myform.withdrawal.disabled=true;
	document.myform.deposit.disabled=true;
		
	}
}
</script>
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

scrollingElement = (document.scrollingElement || document.body)
function scrollToBottom () {
   scrollingElement.scrollTop = scrollingElement.scrollHeight;
}
</script>  
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
  <SCRIPT language=Javascript>
      
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }
      
   </SCRIPT>
 <script type="text/javascript"language="javascript">  
       function CompareDate() {  
	   var opndt = document.getElementById('typeopn');
    var date1 = new Date('<?php echo $LASTDATE;?>');
    var date2 = new Date(opndt);
    if(date1 < date2){
     alert(date2);
    }
    else
     alert(date2);
        }  
 
    </script>
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 35%;
    top: 0;
    width: 40%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
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