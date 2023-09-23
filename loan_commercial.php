<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Loan Review</title>
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
 
 <script type="text/javascript" src="date_time.js"></script>
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

<?php
error_reporting(0);
session_start();
include('mydb_connection/my_connect_db.php');
include'mydb_connection/my_dbconnection.php';
$track =rand();
$branch = $_POST['branch'];
$amount = $_POST['loanamount'];
$term = $_POST['loanterm'];
$purpose =$_POST['purpose'];
$result = "SELECT DISTINCT loan_id FROM loan_details where loan_status ='' AND loan_status != 'Closed' order by loan_id";
if ($result=mysqli_query($con,$result))
  {
$num_rows = mysqli_num_rows($result);
  }

$resultcm = "SELECT DISTINCT loan_id FROM loan_details where loan_status ='Sent To Credit Manager'";
if ($resultcm=mysqli_query($con,$resultcm))
  {
$numrowscm = mysqli_num_rows($resultcm);
  }

$resultbm = "SELECT DISTINCT loan_id FROM loan_details where loan_status ='Sent To Branch Manager'";
if ($resultbm=mysqli_query($con,$resultbm))
  {
$numrowsbm= mysqli_num_rows($resultbm);
  }
$resultappr = "SELECT DISTINCT loan_id FROM loan_details where loan_status = 'Approved'";
if ($resultappr=mysqli_query($con,$resultappr))
  {
$numrowapp= mysqli_num_rows($resultappr);
  }
  
$resultdeny = "SELECT DISTINCT loan_id FROM loan_details where loan_status = 'Deny'";
if ($resultdeny=mysqli_query($con,$resultdeny))
  {
$numrowdeny= mysqli_num_rows($resultdeny);
  }
?>
<?php include'left_commercial.php';?>
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
 <?php
error_reporting(0);
session_start();

$userid = $_SESSION['userid'];
$crypted_token=  $_GET['be449d079b4596e7'];
$crypted_token = preg_replace('/\s+/', '+', $crypted_token);

list($crypted_token, $enc_iv) = explode("0YdDR6[sFLhd", $crypted_token);;
  $cipher_method = 'aes-128-ctr';
  $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
  $token = openssl_decrypt($crypted_token, $cipher_method, $enc_key, 0, hex2bin($enc_iv));
  unset($crypted_token, $cipher_method, $enc_key, $enc_iv);
 $idtrack =  $token;
$_SESSION['idtrack'] = $idtrack;
include('mydb_connection/my_connect_db.php');
include'mydb_connection/my_dbconnection.php';
  
 $attcmt="SELECT * from myfiles  WHERE loan_id = $idtrack";
if ($attcmt=mysqli_query($con,$attcmt))
  {
 $num_rowsatt = mysqli_num_rows($attcmt);
  }
$details = "SELECT * from loan_details  where loan_tracknumber = '$idtrack'";
if ($details=mysqli_query($con,$details))
  {
	  while ($rowval = mysqli_fetch_row($details)) {
$loan_amount = $rowval[3];	
$termnmbr = $rowval[11];
$termype = $rowval[10];
if($termype == 'Year'){
	 $nmbr =$termnmbr*12;
 }
 else{
	$nmbr =  $termnmbr;
 }
$termRATE = $rowval[12];
  $monthlypymt = (($termRATE /(100 * 12)) * $loan_amount) / (1 - pow(1 + $termRATE / 1200,  (-($nmbr))));

}
  }
 $personal = "SELECT * FROM loan_personalinfo  WHERE loan_id = $idtrack";
$result = $conn_db->query($personal);
if ($result->num_rows > 0) {
    // output data of each row
while($rowper = $result->fetch_assoc()) {
$firstname = $rowper['first_name'];
$lastname = $rowper['last_name'];	
$telephone = $rowper['telephone'];	
$idnumber = $rowper['id_number'];	
$dob = $rowper['date_of_birth'];	
$placebirth = $rowper['place_of_birth'];	
$gender = $rowper['gender'];	
$status = $rowper['martial_satus'];	
$siblfirstname = $rowper['sibling_first_name'];
$sibllastname = $rowper['sibling_last_name'];
$sibltele = $rowper['sibling_telephone'];
$province = $rowper['province'];
$district = $rowper['district'];
$sector = $rowper['sector'];
$cell = $rowper['cell'];
$village = $rowper['village'];

    }
} 
$siblings = "SELECT * FROM siblings  WHERE loan_id = $idtrack";
$resultsiblings = $conn_db->query($siblings);

 
 
 $employment = "select * from loan_applicant_employer WHERE loan_id = $idtrack";
$result1 = $conn_db->query($employment);
if ($result1->num_rows > 0) {
while($rowemp = $result1->fetch_assoc()) {
	$employer = $rowemp['applicant_employer_name'];
	$empactivity = $rowemp['applicant_employer_Activity'];
	$empposition = $rowemp['applicant_position'];
	$emptelephone = $rowemp['applicant_position'];
	$empprovince = $rowemp['applicant_employer_province'];
	$empdistrict= $rowemp['applicant_employer_district'];
	$empsector = $rowemp['applicant_employer_sector'];
	$empcell = $rowemp['applicant_employer_cell'];
	$empvillage = $rowemp['applicant_employer_village'];
	$emptelephone = $rowemp['applicant_employer_telephone'];
	$empstart = $rowemp['date_start_employment'];
}
}
$history = "select * from credit_history WHERE loan_id = $idtrack";
$result11 = $conn_db->query($history);

$incomes = "select * from incomes WHERE loan_id = $idtrack";
$resultincomes11 = $conn_db->query($incomes);

$coraterals = "select * from coraterals WHERE loan_id = $idtrack";
$resultcoraterals11 = $conn_db->query($coraterals);



$refference = "select * from applicanr_refference WHERE loan_id = $idtrack";
$result12 = $conn_db->query($refference);
if ($result12->num_rows > 0) {
while($rowref = $result12->fetch_assoc()) {
	$refname1  = $rowref['reff_name1'];
	$refadd1 = $rowref['reff_address1'];
	$refphone1 = $rowref['reff_telephone1'];
	$refname2  = $rowref['reff_name2'];
	$refadd2= $rowref['reff_address2'];
	$refphone2 = $rowref['reff_telephone2'];
	$refname3  = $rowref['reff_name3'];
	$refadd3= $rowref['reff_address3'];
	$refphone3 = $rowref['reff_telephone3'];
	$attachment1 = $rowref['attacment1'];
	$attachment2 = $rowref['attachment2'];
	$attachment3 = $rowref['attachment3'];
	$vattachment1 = strstr($attachment1, '_');
	$vattachment1 = ltrim($vattachment1, '_'); 
	$vattachment2 = strstr($attachment2, '_');
	$vattachment2 = ltrim($vattachment2, '_'); 
	$vattachment3 = strstr($attachment3, '_');
	$vattachment3 = ltrim($vattachment3, '_'); 
	}
}

	
$score = "SELECT  * FROM score_table where track_number = '$idtrack'" ;
 $result14 = $conn_db->query($score);
if ($result14->num_rows > 0) {
while($rowscore = mysqli_fetch_array($score)){
			$sduration= $rowscore['score_duration'];
			$shistory= $rowscore['score_hostory'];
			$scustduration= $rowscore['score_cust_duration'];
			$sage= $rowscore['score_age'];
			$sgender= $rowscore['score_gender'];
			$sstatus= $rowscore['score_stauts'];
			$sactivity= $rowscore['score_activity'];
			$totscore = $sduration+$shistory+$scustduration+$sage+$sgender+$sstatus+$sactivity;
			$totscoreperc = $totscore/7;
			$totscoreperc = round ($totscoreperc);
		}
} 
 ?>
<body>
<?php 
$redirect = $_SESSION['redirect'];
if($redirect == 'yes'){
    $_SESSION['redirect'] = '';

echo "<script>
setTimeout(function () {
   window.location.href= 'commercial_loan_inbox';
}, 1000);
</script>";
	
}
?>
<form  method="POST" action="">
<p>
<table class="blueTable" align="center">
<tr><td style=" text-indent: 30%;"><i>Account Number :&nbsp;&nbsp;</i><strong><?php echo $account;?></font></strong></td><tr>
<tr><td style=" text-indent: 30%;"><i>Names  :&nbsp;&nbsp;</i><strong><?php echo $firstname;?>&nbsp;&nbsp;<?php echo $lastname;?></strong></td><tr>
<tr><td style=" text-indent: 30%;"><i>ID Number :&nbsp;&nbsp;</i><strong><?php echo $idnumber;?></strong></td><tr>
<tr><td style=" text-indent: 30%;"><i>Address :&nbsp;&nbsp;</i><strong><?php echo $province .'&nbsp;/&nbsp;'.$district.'&nbsp;/&nbsp;'.$sector.'&nbsp;/&nbsp;'.$cell.'&nbsp;/&nbsp;'.$village;?></strong></td><tr>
<tr><td style=" text-indent: 30%;"><i>Loan Amount :&nbsp;&nbsp;</i><span id="loanmountlabel"><strong><?php echo  number_format($loan_amount);?></strong></span><input type="text" name="changeamount" id="changeamount"  style=" width:100px; height: 25px;display:none;" value="<?php echo $loan_amount;?>"  onkeyup="summed1();"></td><tr>
<tr><td style=" text-indent: 30%;"><i>Duration :&nbsp;&nbsp;</i><span id="loandurationlabel"><strong><?php echo $termnmbr?></span> <input type="text" name="loanduation"  id="loanduation"  style=" width:40px; height: 25px;display:none" value="<?php echo $termnmbr;?>" onkeyup="summed1();"><?php echo $termype;?>(s)<input type="text" name="loanntype" id="loanntype" value="<?php echo $termype;?>" style="display:none"></strong></td><tr>
<tr><td style=" text-indent: 30%;"><i>Rate :&nbsp;&nbsp;</i><span id="ratelabel"><strong><?php echo $termRATE;?></span><input type="text" name="loanrate" id="loanrate"  style=" width:40px; height: 25px;display:none" value="<?php echo $termRATE;?>" onkeyup="summed1();">%</strong></td><tr>
<tr><td style=" text-indent: 30%;"><i>Monthly Payment  :&nbsp;&nbsp;</i><span id="monthlylabel"><strong><?php echo number_format($monthlypymt,2) ;?></span><input type="text" id="montlypymt" name="montlypymt"style=" width:90px; height: 25px;display:none" readonly/></strong></td><tr>
<tr><td style=" text-indent: 30%;"></td><tr>
</table></p></form><hr>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'perinsfo')"><strong>Personal Information</strong></button>
  <button class="tablinks" onclick="openCity(event, 'Siblings')"><strong>Siblings</strong></button>
  <button class="tablinks" onclick="openCity(event, 'Address')"><strong>Current Addres</strong></button>
  <button class="tablinks" onclick="openCity(event, 'Employment')"><strong>Employemnt</strong></button>
  <button class="tablinks" onclick="openCity(event, 'Payhistory')"><strong>Payment History</strong></button>
   <button class="tablinks" onclick="openCity(event, 'Incomes')"><strong>Incomes</strong></button>
   <button class="tablinks" onclick="openCity(event, 'Refferences')"><strong>Reeferences</strong></button>
   <button class="tablinks" onclick="openCity(event, 'Attachment')"><strong>Attachment</strong></button>
   <button class="tablinks" onclick="openCity(event, 'Comments')"><strong>Comments</strong></button>
   <button class="tablinks" onclick="openCity(event, 'coraterals')"><strong>Coraterals</strong></button>

</div>



<div id="perinsfo" class="tabcontent" >
<span><strong><h4> <STRONG>Personal Information</STRONG></h4></span>
<table class="blueTable" align="center">

<tr><td style=" text-indent: 30%;"><span><strong>Names  :</strong></span>&nbsp;&nbsp;<?php echo $firstname;?>&nbsp;&nbsp;<?php echo $lastname;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>ID Number :</strong></span>&nbsp;&nbsp;<?php echo $idnumber;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>Telephone Number :</strong></span>&nbsp;&nbsp;<?php echo $telephone;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>Date of Birth :</strong></span>&nbsp;&nbsp;<?php echo $dob;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>Place of Birth:</strong></span>&nbsp;&nbsp;<?php echo $placebirth;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>Gender :</strong></span>&nbsp;&nbsp;<?php echo $gender;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>Martial Status :</strong></span>&nbsp;&nbsp;<?php echo $status;?></td><tr>
</table><hr></div>

<div id="Siblings" class="tabcontent">
<span><strong><h4> <STRONG>Siblings</STRONG></h4></strong></span>
<table class="blueTable" align="center">
<tr><th>No</th><th><strong>Relationship</strong></th><th><strong>First Name</strong></th><th><strong>Last Name</strong></th><th><strong>ID Number</strong></th><th><strong>telephone</strong></th><th><strong>Address</strong></th><tr>
<?php

 if ($resultsiblings->num_rows > 0) {
while($rowsibling = $resultsiblings->fetch_assoc()) {
	$i++;
	?>
<tr><td><?php echo $i;?></td><td><?php echo $rowsibling['sibling_type'];?></td><td><?php echo $rowsibling['sibling_firtsname'];?></td><td><?php echo $rowsibling['sibling_lastname'];?></td><td><?php echo $rowsibling['sibling_idnumber'];?></td><td><?php echo $rowsibling['sibling_phone'];?></td><td><?php echo $rowsibling['sibling_adress'];?></td></tr>
  <?php  }
}?> 
</table><hr>
</div>

<div id="Address" class="tabcontent">
<span><strong><h4><STRONG> Currrent Address</STRONG></h4></strong>
<table class="blueTable" align="center">
<tr><td style=" text-indent: 30%;"><span><strong>Province :</strong></span>&nbsp;&nbsp;<?php echo $province;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>District  :</strong></span>&nbsp;&nbsp;<?php echo $district;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>Sector :</strong></span>&nbsp;&nbsp;<?php echo $sector;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>cell :</strong></span>&nbsp;&nbsp;<?php echo $cell;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>Village:</strong></span>&nbsp;&nbsp;<?php echo $village;?><tr>
</table><hr>
</div>


<div id="Employment" class="tabcontent">
<span><strong><h4><STRONG> Employment</STRONG></h4></strong></span>
<table class="blueTable" align="center">
<tr><td style=" text-indent: 30%;"><span><strong>Employer :</strong></span>&nbsp;&nbsp;<?php echo $employer;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>Employer's Activity :</strong></span>&nbsp;&nbsp;<?php echo $empactivity;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>Employer's Telephone  :</strong></span>&nbsp;&nbsp;<?php echo $emptelephone;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>Job Position  :</strong></span>&nbsp;&nbsp;<?php echo $empposition;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>Province :</strong></span>&nbsp;&nbsp;<?php echo $empprovince;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>District :</strong></span>&nbsp;&nbsp;<?php echo $empdistrict;?></td><tr>
<tr><td style=" text-indent: 30%;"><span><strong>Sector:</strong></span>&nbsp;&nbsp;<?php echo $empsector;?><tr>
<tr><td style=" text-indent: 30%;"><span><strong>Cell:</strong></span>&nbsp;&nbsp;<?php echo $empcell;?><tr>
<tr><td style=" text-indent: 30%;"><span><strong>Village:</strong></span>&nbsp;&nbsp;<?php echo $empvillage;?><tr>
</table><hr>
</div>



<div id="Payhistory" class="tabcontent">
<span><strong><h4><STRONG> Previous Loans Contracted</STRONG></h4></strong></span>

<table class="blueTable" align="center" style="width:30%">
<tr><th>No</th><th> Amount</th><th>Payment Type</th></tr>
<?php

if ($result11->num_rows > 0) {
while($rowhist = $result11->fetch_assoc()) {
	$k++;
	?>
	<tr><td><?php echo $k;?></td><td><?php echo  number_format($rowhist['Amount']);?></td><td><?php echo $rowhist['type_pymt'];?></td></tr>
<?php
	}
}
else{
		echo "<tr><td colspan='3'><h4 align='center'><font color='red'>  No Loan contracted before!!!!</font></h4></td></tr>";

}	
?>
</table><hr>
</div>
<div id="Incomes" class="tabcontent">
<span><strong><h4> <STRONG>Incomes</STRONG></h4></strong></span>
<table class="blueTable" align="center" style="width:30%">
<tr><th>No</th><th>Income Type</th><th> Amount</th></tr>
<?php

if ($resultincomes11->num_rows > 0) {
while($rowincome = $resultincomes11->fetch_assoc()) {
	$s++;
	$sumamount =$sumamount +$rowincome['income_amount'];
	?>
	<tr><td><?php echo $s;?></td><td><?php echo $rowincome['income_type'];?></td><td><?php echo  number_format($rowincome['income_amount']);?></td></tr>
<?php
	}?>
		<tr><td></td><td bgcolor="black"><font color="white" size="5"><strong>Total Incomes</font></strong></td><td bgcolor="black"><font color="white" size="5"><strong><?php echo  number_format($sumamount);?></strong></font></td></tr>
<?php
}
else{
	echo "<tr><td colspan='3'><h4 align='center'><font color='red'>  No Income!!!!</font></h1></td></tr>";
}	
?></table>
<hr>
</div>
<div id="Attachment" class="tabcontent">


<span><strong><h4><strong>Attachments[<?php echo $num_rowsatt;?>]</strong></span>

 <div id="attchmt">
 <hr>
 <table class="blueTable" align="center" >
	 <?php
	 

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_array( $attcmt )) {
             $g++;
                // echo out the contents of each row into a table
              $filename = $row['file_name'];
			$vfilename = strstr($filename, '_');
			$vfilename = ltrim($vfilename, '_'); 
                ?><tr><td><?php echo $g?></td><td><img src="img/attACHMENT.png" width="15" height="15"/>
				<?php echo "<a class='result' href='files/sdjklnkjbnkbsfs/$filename' target=_new data-linkId='$id'>
										$vfilename
									</a>";?> </td></tr>
			<?php
		 }
          if(!$filename ){
			  echo "<h4><Strong><font color='red'>No Attachment !!!</font></h4></strong>";
		  }


		 ?>
		
        </table>
              </div>
<hr>
</div>
<div id="Refferences" class="tabcontent">
<span><strong><h4><STRONG> Refferences</STRONG></h4></strong></span>
<table class="blueTable" align="center">
<tr><th style=" text-indent: 30%;"><strong>No</strong></th><th><strong>Names</strong></th><th><strong><span>Addres</span></strong></th><th><strong><span>Telephones</span></strong></th><th><strong><span>Recommandations</span></strong></th><tr><hr>
<tr><td style=" text-indent: 30%;">1</th><td><?php echo $refname1;?></td><td><?php echo $refadd1;?></td><td><?php echo $refphone1;?></td><td><img src="img/attACHMENT.png" width="15" height="15"/>
				<?php echo "<a class='result' href='files/sdjklnkjbnkbsfs/$attachment1' target=_new data-linkId='$id'>
										$vattachment1
									</a>";?></td><tr>
<tr><td style=" text-indent: 30%;">2</th><td><?php echo $refname2;?></td><td><?php echo $refadd2;?></td><td><?php echo $refphone2;?></td><td><img src="img/attACHMENT.png" width="15" height="15"/>
				<?php echo "<a class='result' href='files/sdjklnkjbnkbsfs/$attachment2' target=_new data-linkId='$id'>
										$vattachment2
									</a>";?></td><tr>
<tr><td style=" text-indent: 30%;">3</th><td><?php echo $refname3;?></td><td><?php echo $refadd3;?></td><td><?php echo $refphone3;?></td><td><img src="img/attACHMENT.png" width="15" height="15"/>
				<?php echo "<a class='result' href='files/sdjklnkjbnkbsfs/$attachment3' target=_new data-linkId='$id'>
										$vattachment3
									</a>";?></td><tr>
</table><hr>
</div>
<div id="Comments" class="tabcontent">
<span><h4> <STRONG>Comments</STRONG></h4></span>
<table class="blueTable" align="center">

<?php 
$commercomm = "select comment,time_comment,First_Nmae,lname,role  from loan_comments JOIN users_table ON users_table.id = loan_comments.commentetor WHERE loan_id = $idtrack ORDER BY comment_id DESC";
$result113 = $conn_db->query($commercomm);
if ($result113->num_rows > 0) {
while($row = $result113->fetch_assoc()) {
$role = $row['role'];

		 ?> <tr><td style="width:25%"><strong>Commented By:&nbsp;&nbsp;<?php echo $row['First_Nmae'];?>&nbsp;&nbsp;<?php echo $row['lname'];?> &nbsp;&nbsp;[<?php echo $row['role'];?>] <br>ON &nbsp;&nbsp;<?php echo $row['time_comment'];?><hr></strong></td>
		 <td><p> <?php echo $row['comment'];?></p></td></tr>
	   
	   <?php


}
 }
 else{
	echo "<tr><td colspan='2'><h4 align='center'><font color='red'>  Not Commented!!!!</font></h4></td></tr>";
 }
	   ?></table><br>
	          					<button type="button" class="btn btn-success dropdown-toggle btn-sm" id = "view" style="float: center; margin-left: 3%;" onClick=window.open("comments","Ratting","width=800,height=500,left=450,top=80,toolbar=0,status=0,"); accesskey="1">Add New Comment</button>

	   

</div>
<div id="coraterals" class="tabcontent">
<span><strong><h4> <STRONG>Coraterals</STRONG></h4></strong></span>
<table class="blueTable" align="center" style="width:30%">
<tr><th>No</th><th>Corateral Type</th><th> Amount</th><th> Attachments</th></tr>
<?php

if ($resultcoraterals11->num_rows > 0) {
while($rowcorateral = $resultcoraterals11->fetch_assoc()) {
	$s++;
	$sumcorateral =$sumcorateral +$rowcorateral['corateral_value'];
	$corfilename = $rowcorateral['attacment'];
				$vcorfilename = strstr($corfilename, '_');
			$vcorfilename = ltrim($vcorfilename, '_'); 
	?>
	<tr><td><?php echo $s;?></td><td><?php echo $rowcorateral['corateral_type'];?></td><td><?php echo  number_format($rowcorateral['corateral_value']);?></td><td><img src="img/attACHMENT.png" width="15" height="15"/>
				<?php echo "<a class='result' href='files/sdjklnkjbnkbsfs/$corfilename' target=_new data-linkId='$id'>
										$vcorfilename
									</a>";?></td></tr>
<?php
	}?>
		<tr><td></td><td bgcolor="black"><font color="white" size="5"><strong>Total Coraterals</font></strong></td><td colspan="2" bgcolor="black"><font color="white" size="5"><strong><?php echo  number_format($sumcorateral);?></strong></font></td></tr>
<?php
}
else{
	echo "<tr><td colspan='4'><h4 align='center'><font color='red'>  No  Corateral!</font></h4></td></tr>";
}	
?></table><hr>
</div>
 <?php 

		$score = "SELECT  * FROM score_table WHERE track_number = '$idtrack'";
		$totscoreperc = 0;
 $resultscore = $conn_db->query($score);
if ($resultscore->num_rows > 0) {
while($rowscore = $resultscore->fetch_assoc()) {
			$sduration= $rowscore['score_duration'];
			$shistory= $rowscore['score_hostory '];
			$scustduration= $rowscore[''];
			$sage= $rowscore['score_age'];
			$sgender= $rowscore['score_gender'];
			$sstatus= $rowscore['score_stauts'];
			$sactivity= $rowscore['score_activity'];
			$totscore = $totscore+$sduration+$shistory+$scustduration+$sage+$sgender+$sstatus+$sactivity;
			$totscoreperc = $totscore/7;
			$totscoreperc = round ($totscoreperc);
		}
  }
	?>
      <div class="content-wrapper">

	
<strong><h4 align='left'><STRONG>  Q-Loan Scored  &nbsp;&nbsp; <?php echo $totscoreperc;?>% </STRONG></h4>

<span><strong>Scored &nbsp;&nbsp; <?php echo $totscoreperc;?>%</strong></span>

<div class="progress">
   <?php 
   
   if($totscoreperc <50){
   
   echo "<div class='progress-bar progress-bar-danger  progress-bar-striped' role='progressbar'
  aria-valuenow=$totscoreperc aria-valuemin='0' aria-valuemax='100' style='width:$totscoreperc%'>
    
  </div>";
   } 
if($totscoreperc >=50 AND $totscoreperc <75){
   
   echo "<div class='progress-bar progress-bar-warning   progress-bar-striped' role='progressbar'
  aria-valuenow=$totscoreperc aria-valuemin='0' aria-valuemax='100' style='width:$totscoreperc%'>
    
  </div>";
   }  
if($totscoreperc >=75){
   
   echo "<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar'
  aria-valuenow=$totscoreperc aria-valuemin='0' aria-valuemax='100' style='width:$totscoreperc%'>
    
  </div>";
   }     
  ?></div>
</div>





<div align="center"><a href="javascript: void(0)" class="btn btn-success dropdown-toggle btn-sm"  aria-haspopup="true" aria-expanded="false" onclick="popup('details')">Score Details</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            Action
                          </button>
                          <div class="dropdown-menu">
                            

                           <button class="dropdown-item"  onclick="myFunction()">
                              <i class="fa fa-check text-success fa-fw"></i><a href="javascript: void(0)"  style="text-decoration: none;" onclick="popup01('forward_to_credit_committee')">Send To Credit Committee</a></button>

                             <button class="dropdown-item" >
                              <i class="fa fa-times text-danger fa-fw"></i><a href="javascript: void(0)"  style="text-decoration: none;" onclick="popup01('close')">Close Application </a></button>						  
                          </div>

</div>

<br><br>
<?php 

$scorecredit= "SELECT  * FROM users_table WHERE role = 'Credit Committee' OR role = 'Credit Manager'";
$resultscore = $conn_db->query($scorecredit);
if ($resultscore->num_rows > 0) {
 $numrowshq= mysqli_num_rows($resultscore);

  }
     $average= $creditcommitteescore/$numrowshq;
	 $average = round ($average);
	 $_SESSION['average'] = $average;

	?>
      <div class="content-wrapper">

	<?php
$board= "SELECT  * FROM users_table WHERE role = 'Credit Committee' OR role = 'Credit Manager'";
 $resultboard = $conn_db->query($board);
if ($resultboard->num_rows > 0) {
	 $numrowscre= mysqli_num_rows($board);

while($rowboard = $resultboard->fetch_assoc()) {
	$name = $rowboard['First_Nmae'];
	$lname = $rowboard['lname'];
	$uid = $rowboard['id'];
	
	
	$selectdecision = "SELECT *  FROM decisions where decider_id = '$uid' AND loan_id ='$idtrack' " ;
	$resuldeci = $conn_db->query($selectdecision);
if ($resuldeci->num_rows > 0) {
while($rowdecis = $resuldeci->fetch_assoc()) {
$cudecision = $rowdecis['decision'];

}
}
else{
	$cudecision = 'No Decision';	

}

if($cudecision == 'No Decision'){
	$creditcommitteescore = $creditcommitteescore + 0;
}
if($cudecision == 'Approved'){
$creditcommitteescore = $creditcommitteescore + 95;
}
if($cudecision == 'Pended'){
$creditcommitteescore = $creditcommitteescore + 55;
}
if($cudecision == 'Denied'){
$creditcommitteescore = $creditcommitteescore + 5;
}
}

}
     $average= $creditcommitteescore/$numrowshq;
	 $average = round ($average);
	 $_SESSION['average'] = $average;
?>
<h5 align='left'><strong>  Credit Committee Scored  &nbsp;&nbsp; <?php echo $average;?>% </strong></h5>

<span><strong>Scored &nbsp;&nbsp; <?php echo $average;?>%</strong></span>

<div class="progress">
   <?php 
   if($average <50){
   
   echo "<div class='progress-bar progress-bar-danger  progress-bar-striped' role='progressbar'
  aria-valuenow=$average aria-valuemin='0' aria-valuemax='100' style='width:$average%'>
    
  </div>";
   } 
if($average >=50 AND $average <75){
   
   echo "<div class='progress-bar progress-bar-warning   progress-bar-striped' role='progressbar'
  aria-valuenow=$average aria-valuemin='0' aria-valuemax='100' style='width:$average%'>
    
  </div>";
   }  
if($average >=75){
   
   echo "<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar'
  aria-valuenow=$average aria-valuemin='0' aria-valuemax='100' style='width:$average%'>
    
  </div>";
   }     
  ?></div>
  
<?php
$boardhq= "SELECT  * FROM users_table WHERE role = 'Branch Manager' OR role = 'Head Office Committee'";
 $resultboard = $conn_db->query($boardhq);
if ($resultboard->num_rows > 0) {
while($rowboard = $resultboard->fetch_assoc()) {
	$name = $rowboard['First_Nmae'];
	$lname = $rowboard['lname'];
	$uid = $rowboard['id'];
	
	
	$selectdecision = "SELECT *  FROM hq_decisions where decider_id = '$uid' AND loan_id ='$idtrack' " ;
	$resuldeci = $conn_db->query($selectdecision);
if ($resuldeci->num_rows > 0) {
while($rowdecis = $resuldeci->fetch_assoc()) {
$cudecision = $rowdecis['decision'];

}

}
else{
$cudecision = 'No Decision';	
}
if($cudecision == 'No Decision'){
	$hqcommitteescore = $hqcommitteescore + 0;
}
if($cudecision == 'Approved'){
		$hqcommitteescore = $hqcommitteescore + 95;
}
if($cudecision == 'Pended'){
		$hqcommitteescore = $hqcommitteescore + 55;
}
if($cudecision == 'Denied'){
		$hqcommitteescore = $hqcommitteescore + 5;
}
}
}
$hqscorecredit= "SELECT  * FROM users_table WHERE role = 'Head Office Committee' OR role = 'Branch Manager'";
$hqresultscore = $conn_db->query($hqscorecredit);
if ($hqresultscore->num_rows > 0) {
 $numrowshq= mysqli_num_rows($hqresultscore);

  }
$hqaverage= $hqcommitteescore/$numrowshq;
	 $hqaverage = round ($hqaverage);
	 $_SESSION['hqaverage'] = $hqaverage;

?>
<h5 align='left'><strong>  Head Office  Credit Committee Scored  &nbsp;&nbsp; <?php echo $hqaverage;?>% </strong></h5>

<span><strong>Scored &nbsp;&nbsp; <?php echo $hqaverage;?>%</strong></span>

<div class="progress">
   <?php 
   if($hqaverage <50){
   
   echo "<div class='progress-bar progress-bar-danger  progress-bar-striped' role='progressbar'
  aria-valuenow=$hqaverage aria-valuemin='0' aria-valuemax='100' style='width:$hqaverage%'>
    
  </div>";
   } 
if($hqaverage >=50 AND $hqaverage <75){
   
   echo "<div class='progress-bar progress-bar-warning   progress-bar-striped' role='progressbar'
  aria-valuenow=$hqaverage aria-valuemin='0' aria-valuemax='100' style='width:$hqaverage%'>
    
  </div>";
   }  
if($hqaverage >=75){
   
   echo "<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar'
  aria-valuenow=$hqaverage aria-valuemin='0' aria-valuemax='100' style='width:$hqaverage%'>
    
  </div>";
   }     
  ?></div>
  <?php  
  $ovtotal= $totscoreperc+$average+$hqaverage;
  $ovaverage = $ovtotal/3;
  $ovaverage = round($ovaverage);
  $_SESSION['ovaverage']=$ovaverage;
?>
	
<h5 align='left'><strong>  Overall Scored  &nbsp;&nbsp; <?php echo $ovaverage;?>% </strong></h5>

<span><strong>Scored &nbsp;&nbsp; <?php echo $ovaverage;?>%</strong></span>

<div class="progress">
   <?php 
   if($ovaverage <50){
   
   echo "<div class='progress-bar progress-bar-danger  progress-bar-striped' role='progressbar'
  aria-valuenow=$ovaverage aria-valuemin='0' aria-valuemax='100' style='width:$ovaverage%'>
    
  </div>";
   } 
if($ovaverage >=50 AND $ovaverage <75){
   
   echo "<div class='progress-bar progress-bar-warning   progress-bar-striped' role='progressbar'
  aria-valuenow=$ovaverage aria-valuemin='0' aria-valuemax='100' style='width:$ovaverage%'>
    
  </div>";
   }  
if($ovaverage >=75){
   
   echo "<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar'
  aria-valuenow=$ovaverage aria-valuemin='0' aria-valuemax='100' style='width:$ovaverage%'>
    
  </div>";
   }     
  ?></div>
</div>

					   </div>          </div> </div></div> </div>  
					   
					   
					   
					   <script type="text/javascript">
<!--
function popup(url) 
{
 var width  = 450;
 var height = 500;
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


function popup01(url) 
{
 var width  = 850;
 var height = 300;
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

			
					<!-- /.page-content -->
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
              <a href="http://www.qloan.rw" target="_blank"><strong>Q-loan</a></strong></span>
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
 <script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>  
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
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
	
	</style>	
</html>