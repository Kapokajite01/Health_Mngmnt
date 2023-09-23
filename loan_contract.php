<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Loan Contract</title>
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
include'mydb_connection/my_dbconnection.php';
include('mydb_connection/my_connect_db.php');
error_reporting(0);
session_start();
$travck = $_SESSION['idtrack'];
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
	if($termtype == 'Year'){
		$Y =$term;
				$term1 = $term*12;	
				$Y = $term;
	}
	if($termtype == 'Month'){
		$Y =$term;
				$term1 = $term;	
				$Y = $term;
	}

}
}

            $monthly_payment = (($intrate /(100 * 12)) * $amount) / (1 - pow(1 + $intrate / 1200,  (-$term1)));

?>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    
	
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      
      <!-- partial -->
      <div class="main-panel">
	          <div class="content-wrapper">
<br><br>
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
										
											<div class="card">
                    <div class="card-body"> <form method="POST" action="">
												<table  width="90%"  border="5px" style="margin-left:5%;margin-right:10px;" >

                   <tr><td style="padding:60px"> <div width="40%"><h1 align="center" ><i><strong>LOAN AGREEMENT</i></strong></h1><hr>
                      <p class="card-description" align="justify">
                       This loan agreement is made on the day of &nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo date("d/m/Y");?></strong>&nbsp;&nbsp;&nbsp;&nbsp; by and among &nbsp;&nbsp;&nbsp;,
					   a Partnership organized under the laws of the Republic of Kulu  <strong>(hereinafter known as “Borrower”) <?php echo $name.'&nbsp;'.$lastname;?></strong>  having acount number&nbsp;<strong> <?php echo $accountnumber;?></strong>&nbsp;&nbsp;and &nbsp;&nbsp;<strong> <strong>(hereinafter known as “Lender”)</strong> CITY BANK Ltd.</strong>, &nbsp;&nbsp;&nbsp;organized under the laws of The republic of Kulu.
					   Borrower and Lender shall collectively be known herein as “the Parties”. In determining the rights and duties of the Parties under the Loan Agreement, the entire document must be read as a whole.
                      </p>
                           <p class="card-description" align="justify">
							The Borrower and Lender, hereby further set forth their rights and obligations to one another under the Loan Agreement and agreed to be legal bound as follows:
							</p>   
														<h4><strong>Loan Payment Terms: </strong></h4>

                           <p class="card-description" align="justify">
							Borrower to pay <strong><?php echo  number_format($monthly_payment,2);?> Rwf</strong> to Lender every month for &nbsp;<strong><?php echo  $Y.'&nbsp;'.$termtype?>(s)</strong> . First payment shall be due on 1st day of the next month  of the month of execution of this agreement and continue each month 
							on the monthly anniversary thereafter until the Loan Balance, including principal and accrued interest, is paid in full or demand for payment in full is made by Lender. 
							In cases where a payment due date is the 29th, 30th and 31st of a month and said month contains a shorter number of days, then the due date shall be the last date of the month. 
							Demand by Lender: This is a “demand” loan agreement under which borrower is required to pay back in full the entire outstanding Loan Balance within 15 days of receiving a written 
							demand from Lender or full repayment of the Loan Balance. Delivery of the written notice by Lender to Borrower via U.S. Postal Service Certified Mail shall constitute prima facie 
							evidence of delivery.
							</p>
																					<h4><strong>Method of Payment:</strong> </h4>
							                           <p class="card-description" align="justify">

							The Borrower shall make all payments called for under this loan agreement by deducting on his monthly salary on behalf of <strong>CITY BANK Ltd.</strong>
							</p>
														<h4><strong>Default: </strong></h4>
														
														
							  <p class="card-description" align="justify">
								
						<strong>The occurrence of any of the following events shall constitute a Default by the borrower of the terms of this loan agreement:</strong><br>
						•	Borrower’s failure to pay any amount due as principal or interest on the date required under the loan agreement,<br>
						•	Borrower seeks an order of relief under the Federal Bankruptcy laws,<br>
						•	Borrower becomes insolvent,<br>
						
						</p>
							<h4><strong>Exclusive Jurisdiction for Suit in Case of Breach:  </strong></h4>
							  <p class="card-description" align="justify">

						The parties, by entering into this agreement, submit to Jurisdiction in the Republic of Kulu for adjudication of any disputes and/or claims between the parties under this agreement.
						Furthermore the parties hereby agree that the Republic of Kulu shall have exclusive jurisdiction over any disputes between the parties relatives to this agreement, whether said disputes sound in contract, tort or other areas of the law. .</p> 
					  
					<h4><strong>State Law:  </strong></h4>
					  
										  <p class="card-description" align="justify">
		  
					  This agreement shall be interpreted under, and governed by, the laws of the Republic Of Kulu.<br>
					  IN WITNESS WHEREOF and acknowledging acceptance and agreement of the foregoing, Borrower and Lender affix their signatures here.
					  
					  
					  
					  </p>	  <hr>
		 <table align="center" width="100%">
		 <tr><td><h4>Borrower(s)	</h4></td><td><h4>Lender On  behalf of <STRONG>CITY BANK<STRONG></h4></td></tr>
	
		 <tr><td><hr></td><td><hr></td></tr>
		 <tr><td></td><td><strong>Loan Officer</strong></td></tr>
		 <tr><td><strong><?php echo $name.'&nbsp;'.$lastname;?></strong></td><td><strong>Mugabo paul</strong></td></tr>
		 <tr><td>___________________________________________________<br>Siganture	</td><td>Siganture<br>_______________________________________________<STRONG></td></tr>
		 <tr><td><hr></td><td><hr></td></tr>
		 <tr><td></td><td><strong>Branch Manager</strong></td></tr>
		 <tr><td></td><td><strong>Kalisa POST NOM COMPTABLE</strong></td></tr>
		  <tr><td>	</td><td>Siganture<br>_______________________________________________<STRONG></td></tr>
		 <tr><td></td><td></td></tr>
		 </table>
		
															  
	  </p>
					  
					 <br><br> 
<i class="fa fa-print"></i><input name="myprint" type="submit" value="Print" id="printButton" onClick="printpage()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="fa fa-file-pdf-o"></i><input type="button" onclick="tableToExcel('example', 'W3C Example Table')" value="Export To PDF">
                    </div></table></form>
                  </div>
											
											<!-- /.row -->
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
         <!-- container-scroller -->
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
	alert("<?php echo "You have sent Print Contract command Don't Click Cancel";
$update = "UPDATE loan_details SET contract_print = 'Contract printed',date_print = Now() where loan_tracknumber = '$travck'";
	 $resultupdate = $conn_db->query($update);?>");
window.print();
}
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
font-family:Oswald, sans-serif; /*Oswald is available from 
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
	
	</style>	
</html>