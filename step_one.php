<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Loan Initialization</title>
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
      <head>  


 <link rel="stylesheet" href="css/bootstrap.min.css" />  
    <script src="js/jquery11.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	
	
	
	
	
	<style>
.errors
{
	color:#FF0000;
}

</style>


</head>

<body>


<?php
error_reporting(0);
session_start();
include'mydb_connection/my_dbconnection.php';
$userid = $_SESSION['userid'];
$role = $_SESSION['role'];
if(!$userid){
	header('location:logout');
}
$myuser = "select * from customers WHERE id = '$userid'";
$resultcheckuser = $conn_db->query($myuser);
if ($resultcheckuser->num_rows > 0) {
while($rowval = $resultcheckuser->fetch_assoc()) {
$email = $rowval['email'];	
$fname = $rowval['First_Nmae'];	
$lname = $rowval['lname'];	
	
	
}
}
$myaccount  = $_POST['accontnumber'];;
$customer = "select * from customers WHERE affiliate_number = '$myaccount'";
$resultcustomer= $conn_db->query($customer);
if ($resultcustomer->num_rows > 0) {
while($rowcust = $resultcustomer->fetch_assoc()) {
$firstname = $rowcust['names'];	
$lastname = $rowcust['lname'];	
$id_number = $rowcust['id_number'];	
$telephone = $rowcust['telephone'];	
$placebirth = $rowcust['placebirth'];	
$gender = $rowcust['gender'];	
$provinceNMe = $rowcust['province'];	
$districtNMe = $rowcust['district'];	
$sectorNme = $rowcust['sector'];	
$cellNme = $rowcust['cell'];	
$villageNme = $rowcust['village'];	
$DOB = $rowcust['dob'];	
$yearDOB = substr($DOB, 0, 4);
$monthDOB = substr($DOB, 7,7 );
$dayDOB = substr($DOB, 8,10 );

}
}
$track =rand();
$branch = $_POST['branch'];
$amount = $_POST['loanamount'];
$loantype =$_POST['loantype'];
$years =$_POST['years'];
$motnh =$_POST['months'];
$week =$_POST['weeks'];
$firstpay =$_POST['firstpayment'];
if($years !=''){
	$loan_term_type = "Year";	
	$loan_term_rate = 18;
	$loan_term_duration = $years ;
}
if($motnh !=''){
	$loan_term_type = "Month";	
	$loan_term_rate = 16;
	$loan_term_duration = $motnh ;
}
if($week !=''){
	$loan_term_type = "Week";	
	$loan_term_rate = 14;
	$loan_term_duration = $week ;
}
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM province";
$results = $db_handle->runQuery($query);

$query1 ="SELECT * FROM district";
$results1 = $db_handle->runQuery($query1);

$query2 ="SELECT * FROM sector";
$results2 = $db_handle->runQuery($query2);

$query3 ="SELECT * FROM cells";
$results3 = $db_handle->runQuery($query3);

?>
<script>
function yirmibes() {
  num1 = document.getElementById("firstNumber").value;
  document.getElementById("result").value = (num1 / 100) * 25;
}

function elli() {
  num1 = document.getElementById("firstNumber").value;
  document.getElementById("result").value = (num1 / 100) * 50;
}

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
<style>
body {margin:0;font-family:Arial}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

.dddropdown {
  float: left;
  overflow: hidden;
}

.dddropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dddropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dddropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dddropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dddropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dddropdown:hover .dddropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dddropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dddropdown {float: none;}
  .topnav.responsive .dddropdown-content {position: relative;}
  .topnav.responsive .dddropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>

	<script>

function Validate()
{
	var firstname = document.getElementById('firstname').value;
	var firstnameError = document.getElementById('firstnameError');
	var lastname = document.getElementById('lastname').value;
	var lastnameError = document.getElementById('lastnameError');
	var idnumber = document.getElementById('idnumber').value;
	var idnumberError = document.getElementById('idnumberError');
	var telephone = document.getElementById('telephone').value;
	var telephoneError = document.getElementById('telephoneError');
	var DOBDay = document.getElementById('DOBDay').value;
	var DOBDayError = document.getElementById('DOBDayError');
	var DOBMonth = document.getElementById('DOBMonth').value;
	var DOBMonthError = document.getElementById('DOBMonthError');
	var DOBYear = document.getElementById('DOBYear').value;
	var DOBYearError = document.getElementById('DOBYearError');	
	var palcebirth = document.getElementById('palcebirth').value;
	var palcebirthError = document.getElementById('palcebirthError');
	var gender = document.getElementById('gender').value;
	var genderError = document.getElementById('genderError');
	var status = document.getElementById('status').value;
	var statusError = document.getElementById('statusError');
	var provincelist = document.getElementById('provincelist').value;
	var provincelistError = document.getElementById('provincelistError');
	var disrict_liste = document.getElementById('disrict_liste').value;
	var disrict_listeError = document.getElementById('disrict_listeError');
	var sector_list = document.getElementById('sector_list').value;
	var sector_listError = document.getElementById('sector_listError');
	var cell_list = document.getElementById('cell_list').value;
	var cell_listError = document.getElementById('cell_listError');
	var village = document.getElementById('village').value;
	var villageError = document.getElementById('villageError');
	if (firstname == '')
	{

	firstnameError.innerHTML = "First Name Required !";
}
	if (lastname == '')
	{

	lastnameError.innerHTML = "Lastname Name Required !";
}
	if (idnumber == '')
	{

	idnumberError.innerHTML = "ID Number Required !";
}
	if (telephone == '')
	{

	telephoneError.innerHTML = "Telephone Number Required !";
}
	if (DOBDay == '')
	{

	DOBDayError.innerHTML = "Day  Required !";
}	
if (DOBMonth == '')
	{

	DOBMonthError.innerHTML = "Month  Required !";
}
if (DOBYear == '')
	{

	DOBYearError.innerHTML = "Year  Required !";
}
	if (palcebirth == '')
	{

	palcebirthError.innerHTML = "Place Of Birth Required !";
}
	if (gender == '')
	{

	genderError.innerHTML = "Gender Required !";
}
if (status == '')
	{

	statusError.innerHTML = "Status Required !";
}
if (provincelist == '')
	{

	provincelistError.innerHTML = "Province  Required !";
}
if (disrict_liste == '')
	{

	disrict_listeError.innerHTML = "District  Required !";
}
if (sector_list == '')
	{

	sector_listError.innerHTML = "Sector  Required !";
}
if (cell_list == '')
	{

	cell_listError.innerHTML = "Cell  Required !";
}
if (village == '')
	{

	villageError.innerHTML = "Village  Required !";
}
//-------------------------------------------------------------------------------------------
if (firstname != '')
	{
	firstnameError.innerHTML = "";
}
if (lastname != '')
	{
	lastnameError.innerHTML = "";
}
	if (idnumber != '')
	{
	idnumberError.innerHTML = "";
}

if (telephone != '')
	{
	telephoneError.innerHTML = "";
}
if (DOBDay != '')
	{
	DOBDayError.innerHTML = "";
}
if (DOBMonth != '')
	{
	DOBMonthError.innerHTML = "";
}
if (DOBYear != '')
	{
	DOBYearError.innerHTML = "";
}

if (palcebirth != '')
	{
	palcebirthError.innerHTML = "";
}
if (gender != '')
	{
	genderError.innerHTML = "";
}
if (status != '')
	{
	statusError.innerHTML = "";
}
if (provincelist != '')
	{
	provincelistError.innerHTML = "";
}
if (disrict_liste != '')
	{
	disrict_listeError.innerHTML = "";
}
if (sector_list != '')
	{
	sector_listError.innerHTML = "";
}
if (cell_list != '')
	{
	cell_listError.innerHTML = "";
}
if (village != '')
	{
	villageError.innerHTML = "";
}
if(firstname != ''&& lastname != ''&& idnumber != ''&& telephone != ''&& palcebirth != ''&& gender != ''&& status != ''&& provincelist != ''&& sector_list != ''&& cell_list != ''&& village != ''&& DOBDay != '' && DOBMonth != '' && DOBYear != '')

{
myFunction1();
document.getElementById('fafaloand1').style.display = 'block';
}
}


</script>	
		
<script>

function showline2() {
	   document.getElementById('type2Error').style.display = "block";
   document.getElementById('type2').style.display = "block";
   document.getElementById('type2').disabled = false;
   document.getElementById('fname2Error').style.display = "block";
   document.getElementById('fname2').style.display = "block";
   document.getElementById('fname2').disabled = false;
   document.getElementById('lname2Error').style.display = "block";
   document.getElementById('lname2').style.display = "block";
   document.getElementById('lname2').disabled = false;
   document.getElementById('sblidnumber2Error').style.display = "block";
   document.getElementById('sblidnumber2').style.display = "block";
   document.getElementById('sblidnumber2').disabled = false;
   document.getElementById('siblingtelephone2Error').style.display = "block";
   document.getElementById('siblingtelephone2').style.display = "block";
   document.getElementById('siblingtelephone2').disabled = false;
   document.getElementById('address2Error').style.display = "block";
   document.getElementById('address2').style.display = "block";
   document.getElementById('address2').disabled = false;
   document.getElementById('active2').style.display = "block";
   document.getElementById('remove2').style.display = "block";
	var type2 = document.getElementById('type2').value;
	var other2 = document.getElementById('other2').value;
	var type2Error = document.getElementById('type2Error');
	var fname2 = document.getElementById('fname2').value;
	var fname2Error = document.getElementById('fname2Error');
	var lname2 = document.getElementById('lname2').value;
	var lname2Error = document.getElementById('lname2Error');
	var sblidnumber2 = document.getElementById('sblidnumber2').value;
	var sblidnumber2Error = document.getElementById('sblidnumber2Error');
	var siblingtelephone2 = document.getElementById('siblingtelephone2').value;
	var siblingtelephone2Error = document.getElementById('siblingtelephone2Error');		
	var address2 = document.getElementById('address2').value;
	var address2Error = document.getElementById('address2Error');
if (type2 == '')
	{

	type2Error.innerHTML = "Required !";
}

if (fname2 == '')
	{

	fname2Error.innerHTML = "Required !";
}
if (lname2 == '')
	{

	lname2Error.innerHTML = "Required !";
}
if (sblidnumber2 == '')
	{

	sblidnumber2Error.innerHTML = "Required !";
}
if (siblingtelephone2 == '')
	{

	siblingtelephone2Error.innerHTML = "Required !";
}
if (address2== '')
	{

	address2Error.innerHTML = "Required !";
}
}
function showline3() {
	var type3 = document.getElementById('type3').value;
	var other3 = document.getElementById('other3').value;
	var type3Error = document.getElementById('type3Error');
	var fname3 = document.getElementById('fname3').value;
	var fname3Error = document.getElementById('fname3Error');
	var lname3 = document.getElementById('lname3').value;
	var lname3Error = document.getElementById('lname3Error');
	var sblidnumber3 = document.getElementById('sblidnumber3').value;
	var sblidnumber3Error = document.getElementById('sblidnumber3Error');
	var siblingtelephone3 = document.getElementById('siblingtelephone3').value;
	var siblingtelephone3Error = document.getElementById('siblingtelephone3Error');		
	var address3 = document.getElementById('address3').value;
	var address3Error = document.getElementById('address3Error');

   document.getElementById('type3Error').style.display = "block";
   document.getElementById('type3').style.display = "block";
   document.getElementById('type3').disabled = false;
   document.getElementById('fname3Error').style.display = "block";
   document.getElementById('fname3').style.display = "block";
   document.getElementById('fname3').disabled = false;
   document.getElementById('lname3Error').style.display = "block";
   document.getElementById('lname3').style.display = "block";
   document.getElementById('lname3').disabled = false;
   document.getElementById('sblidnumber3Error').style.display = "block";
   document.getElementById('sblidnumber3').style.display = "block";
   document.getElementById('sblidnumber3').disabled = false;
   document.getElementById('siblingtelephone3Error').style.display = "block";
   document.getElementById('siblingtelephone3').style.display = "block";
   document.getElementById('siblingtelephone3').disabled = false;
   document.getElementById('address3Error').style.display = "block";
   document.getElementById('address3').style.display = "block";
   document.getElementById('address3').disabled = false;
    document.getElementById('active3').style.display = "block";
   document.getElementById('remove3').style.display = "block";
	if (type3 == '')
	{

	type3Error.innerHTML = "Required !";
}
if (other3 == '')
	{

	other3Error.innerHTML = "Required !";
}
if (fname3 == '')
	{

	fname3Error.innerHTML = "Required !";
}
if (lname3 == '')
	{

	lname3Error.innerHTML = "Required !";
}
if (sblidnumber3 == '')
	{

	sblidnumber3Error.innerHTML = "Required !";
}
if (siblingtelephone3 == '')
	{

	siblingtelephone3Error.innerHTML = "Required !";
}
if (address3== '')
	{

	address3Error.innerHTML = "Required !";
}
}
function showline4() {
     document.getElementById('type4Error').style.display = "block";
     document.getElementById('type4').style.display = "block";
     document.getElementById('type4').style.display = "block";
     document.getElementById('type4').disabled = false;
   document.getElementById('fname4Error').style.display = "block";
   document.getElementById('fname4').style.display = "block";
   document.getElementById('fname4').disabled = false;
   document.getElementById('lname4Error').style.display = "block";
   document.getElementById('lname4').style.display = "block";
   document.getElementById('lname4').disabled = false;
   document.getElementById('sblidnumber4Error').style.display = "block";
   document.getElementById('sblidnumber4').style.display = "block";
   document.getElementById('sblidnumber4').disabled = false;
   document.getElementById('siblingtelephone4Error').style.display = "block";
   document.getElementById('siblingtelephone4').style.display = "block";
   document.getElementById('siblingtelephone4').disabled = false;
   document.getElementById('address4Error').style.display = "block";
   document.getElementById('address4').style.display = "block";
   document.getElementById('address4').disabled = false;
   document.getElementById('active4').style.display = "block";
   document.getElementById('remove4').style.display = "block";
	var type4 = document.getElementById('type4').value;
	var other4 = document.getElementById('other4').value;
	var type4Error = document.getElementById('type4Error');
	var fname4 = document.getElementById('fname4').value;
	var fname4Error = document.getElementById('fname4Error');
	var lname4 = document.getElementById('lname4').value;
	var lname4Error = document.getElementById('lname4Error');
	var sblidnumber4 = document.getElementById('sblidnumber4').value;
	var sblidnumber4Error = document.getElementById('sblidnumber4Error');
	var siblingtelephone4 = document.getElementById('siblingtelephone4').value;
	var siblingtelephone4Error = document.getElementById('siblingtelephone4Error');		
	var address4 = document.getElementById('address4').value;
	var address4Error = document.getElementById('address4Error');
if (type4 == '')
	{

	type4Error.innerHTML = "Required !";
}
if (other4 == '')
	{

	other4Error.innerHTML = "Required !";
}
if (fname4 == '')
	{

	fname4Error.innerHTML = "Required !";
}
if (lname4 == '')
	{

	lname4Error.innerHTML = "Required !";
}
if (sblidnumber4 == '')
	{

	sblidnumber4Error.innerHTML = "Required !";
}
if (siblingtelephone4 == '')
	{

	siblingtelephone4Error.innerHTML = "Required !";
}
if (address4== '')
	{

	address4Error.innerHTML = "Required !";
}
}
function showline5() {
    document.getElementById('type5Error').style.display = "block";
    document.getElementById('type5').style.display = "block";
    document.getElementById('type5').disabled = false;
   document.getElementById('fname5Error').style.display = "block";
   document.getElementById('fname5').style.display = "block";
   document.getElementById('fname5').disabled = false;
   document.getElementById('lname5Error').style.display = "block";
   document.getElementById('lname5').style.display = "block";
   document.getElementById('lname5').disabled = false;
   document.getElementById('sblidnumber5Error').style.display = "block";
   document.getElementById('sblidnumber5').style.display = "block";
   document.getElementById('sblidnumber5').disabled = false;
   document.getElementById('siblingtelephone5Error').style.display = "block";
   document.getElementById('siblingtelephone5').style.display = "block";
   document.getElementById('siblingtelephone5').disabled = false;
   document.getElementById('address5Error').style.display = "block";
   document.getElementById('address5').style.display = "block";
   document.getElementById('address5').disabled = false;
   document.getElementById('active5').style.display = "block";
   document.getElementById('remove5').style.display = "block";
	var type5 = document.getElementById('type5').value;
	var other5 = document.getElementById('other5').value;
	var type5Error = document.getElementById('type5Error');
	var fname5 = document.getElementById('fname5').value;
	var fname5Error = document.getElementById('fname5Error');
	var lname5 = document.getElementById('lname5').value;
	var lname5Error = document.getElementById('lname5Error');
	var sblidnumber5= document.getElementById('sblidnumber5').value;
	var sblidnumber5Error = document.getElementById('sblidnumber5Error');
	var siblingtelephone5 = document.getElementById('siblingtelephone5').value;
	var siblingtelephone5Error = document.getElementById('siblingtelephone5Error');		
	var address5 = document.getElementById('address5').value;
	var address5Error = document.getElementById('address5Error');

	if (type5 == '')
	{

	type5Error.innerHTML = "Required !";
}
if (other5 == '')
	{

	other5Error.innerHTML = "Required !";
}
if (fname5 == '')
	{

	fname5Error.innerHTML = "Required !";
}
if (lname5 == '')
	{

	lname5Error.innerHTML = "Required !";
}
if (sblidnumber5 == '')
	{

	sblidnumber5Error.innerHTML = "Required !";
}
if (siblingtelephone5 == '')
	{

	siblingtelephone5Error.innerHTML = "Required !";
}
if (address5== '')
	{

	address5Error.innerHTML = "Required !";
}
}

function hideline2() {
   document.getElementById('type2Error').style.display = "none";
   document.getElementById('type2').style.display = "none";
   document.getElementById('type2').disabled=true;
   document.getElementById('type2').value='';
   document.getElementById('other2Error').style.display = "none";
   document.getElementById('other2').style.display = "none";
   document.getElementById('other2').disabled=true;
   document.getElementById('other2').value='';
   document.getElementById('fname2Error').style.display = "none";
   document.getElementById('fname2').style.display = "none";
   document.getElementById('fname2').disabled=true;
   document.getElementById('fname2').value='';
   document.getElementById('lname2Error').style.display = "none";
   document.getElementById('lname2').style.display = "none";
   document.getElementById('lname2').disabled=true;
   document.getElementById('lname2').value='';
   document.getElementById('sblidnumber2Error').style.display = "none";
   document.getElementById('sblidnumber2').style.display = "none";
   document.getElementById('sblidnumber2').disabled=true;
   document.getElementById('sblidnumber2').value='';
   document.getElementById('siblingtelephone2Error').style.display = "none";
   document.getElementById('siblingtelephone2').style.display = "none";
   document.getElementById('siblingtelephone2').disabled=true;
   document.getElementById('siblingtelephone2').value='';
   document.getElementById('address2Error').style.display = "none";
   document.getElementById('address2').style.display = "none";
   document.getElementById('address2').disabled=true;
   document.getElementById('address2').value='';
   document.getElementById('active2').style.display = "none";
   document.getElementById('remove2').style.display = "none";
}
function hideline3() {
     document.getElementById('type3Error').style.display = "none";
     document.getElementById('type3').style.display = "none";
     document.getElementById('type3').disabled=true;
     document.getElementById('type3').value='';
   document.getElementById('other3Error').style.display = "none";
   document.getElementById('other3').style.display = "none";
   document.getElementById('other3').disabled=true;
   document.getElementById('other3').value='';
   document.getElementById('fname3').style.display = "none";
   document.getElementById('fname3Error').style.display = "none";
   document.getElementById('fname3').disabled=true;
   document.getElementById('fname3').value='';
   document.getElementById('lname3').style.display = "none";
   document.getElementById('lname3Error').style.display = "none";
   document.getElementById('lname3').disabled=true;
   document.getElementById('lname3').value='';
   document.getElementById('sblidnumber3').style.display = "none";
   document.getElementById('sblidnumber3Error').style.display = "none";
   document.getElementById('sblidnumber3').disabled=true;
   document.getElementById('sblidnumber3').value='';
   document.getElementById('siblingtelephone3').style.display = "none";
   document.getElementById('siblingtelephone3Error').style.display = "none";
   document.getElementById('siblingtelephone3').disabled=true;
    document.getElementById('siblingtelephone3').value='';
   document.getElementById('address3').style.display = "none";
   document.getElementById('address3Error').style.display = "none";
   document.getElementById('address3').disabled=true;
    document.getElementById('address3').value='';
   document.getElementById('active3').style.display = "none";
   document.getElementById('remove3').style.display = "none";
}
function hideline4() {
       document.getElementById('type4Error').style.display = "none";
       document.getElementById('type4').style.display = "none";
       document.getElementById('type4').disabled=true;
       document.getElementById('type4').value='';
   document.getElementById('other4Error').style.display = "none";
   document.getElementById('other4').style.display = "none";
   document.getElementById('other4').disabled=true;
   document.getElementById('other4').value='';
   document.getElementById('fname4Error').style.display = "none";
   document.getElementById('fname4').style.display = "none";
   document.getElementById('fname4').disabled=true;
   document.getElementById('fname4').value='';
   document.getElementById('lname4Error').style.display = "none";
   document.getElementById('lname4').style.display = "none";
   document.getElementById('lname4').disabled=true;
   document.getElementById('lname4').value='';
   document.getElementById('sblidnumber4Error').style.display = "none";
   document.getElementById('sblidnumber4').style.display = "none";
   document.getElementById('sblidnumber4').disabled=true;
   document.getElementById('sblidnumber4').value='';
   document.getElementById('siblingtelephone4Error').style.display = "none";
   document.getElementById('siblingtelephone4').style.display = "none";
   document.getElementById('siblingtelephone4').disabled=true;
   document.getElementById('siblingtelephone4').value='';
   document.getElementById('address4Error').style.display = "none";
   document.getElementById('address4').style.display = "none";
   document.getElementById('address4').disabled=true;
   document.getElementById('address4').value='';
   document.getElementById('active4').style.display = "none";
   document.getElementById('remove4').style.display = "none";
}
function hideline5() {
       document.getElementById('type5Error').style.display = "none";
       document.getElementById('type5').style.display = "none";
       document.getElementById('type5').disabled=true;
       document.getElementById('type5').value='';
   document.getElementById('other5Error').style.display = "none";
   document.getElementById('other5').style.display = "none";
   document.getElementById('other5').disabled=true;
   document.getElementById('other5').value='';
   document.getElementById('fname5Error').style.display = "none";
   document.getElementById('fname5').style.display = "none";
   document.getElementById('fname5').disabled=true;
   document.getElementById('fname5').value='';
   document.getElementById('lname5Error').style.display = "none";
   document.getElementById('lname5').style.display = "none";
   document.getElementById('lname5').disabled=true;
   document.getElementById('lname5').value='';
   document.getElementById('sblidnumber5Error').style.display = "none";
   document.getElementById('sblidnumber5').style.display = "none";
   document.getElementById('sblidnumber5').disabled=true;
   document.getElementById('sblidnumber5').value='';
   document.getElementById('siblingtelephone5Error').style.display = "none";
   document.getElementById('siblingtelephone5').style.display = "none";
   document.getElementById('siblingtelephone5').disabled=true;
   document.getElementById('siblingtelephone5').value='';
   document.getElementById('address5Error').style.display = "none";
   document.getElementById('address5').style.display = "none";
   document.getElementById('address5').disabled=true;
   document.getElementById('address5').value='';
   document.getElementById('active5').style.display = "none";
   document.getElementById('remove5').style.display = "none";
}

</script>
	
<script type="text/javascript" src="js/jqueryother.min"></script>   
<script type="text/javascript">  
//other type1 
$(document).ready(function() {   
$('#type1').change(function(){   
if($('#type1').val() === 'Other')   
   {   
   $('#other1').show(); 
   $('#type1').hide(); 
    document.getElementById('other1').disabled = false;
   }   
else 
   {   
   $('#other1').hide(); 
    document.getElementById('other1').disabled = true;
   
   }   
});   
}); 

//other type2 
$(document).ready(function() {   
$('#type2').change(function(){   
if($('#type2').val() === 'Other')   
   {   
   $('#other2').show(); 
   $('#type2').hide(); 
    document.getElementById('other2').disabled = false;
   }   
else 
   {   
   $('#other2').hide(); 
    document.getElementById('other2').disabled = true;
   
   }   
});   
}); 

//other type3 
$(document).ready(function() {   
$('#type3').change(function(){   
if($('#type3').val() === 'Other')   
   {   
   $('#other3').show(); 
   $('#type3').hide(); 
    document.getElementById('other3').disabled = false;
   }   
else 
   {   
   $('#other3').hide(); 
    document.getElementById('other3').disabled = true;
   
   }   
});   
}); 


//other type4 
$(document).ready(function() {   
$('#type4').change(function(){   
if($('#type4').val() === 'Other')   
   {   
   $('#other4').show(); 
   $('#type4').hide(); 
    document.getElementById('other4').disabled = false;
   }   
else 
   {   
   $('#other4').hide(); 
    document.getElementById('other4').disabled = true;
   
   }   
});   
}); 

//other type5 
$(document).ready(function() {   
$('#type5').change(function(){   
if($('#type5').val() === 'Other')   
   {   
   $('#other5').show(); 
   $('#type5').hide(); 
    document.getElementById('other5').disabled = false;
   }   
else 
   {   
   $('#other5').hide(); 
    document.getElementById('other5').disabled = true;
   
   }   
});   
});  
</script> 
<script>
function Validatetype()
{
	var type1 = document.getElementById('type1').value;
	var other1 = document.getElementById('other1').value;
	var type1Error = document.getElementById('type1Error');
	var fname1 = document.getElementById('fname1').value;
	var fname1Error = document.getElementById('fname1Error');
	var lname1 = document.getElementById('lname1').value;
	var lname1Error = document.getElementById('lname1Error');
	var sblidnumber1 = document.getElementById('sblidnumber1').value;
	var sblidnumber1Error = document.getElementById('sblidnumber1Error');
	var siblingtelephone1 = document.getElementById('siblingtelephone1').value;
	var siblingtelephone1Error = document.getElementById('siblingtelephone1Error');		
	var address1 = document.getElementById('address1').value;
	var address1Error = document.getElementById('address1Error');
//--------------------------line2	
var type2 = document.getElementById('type2').value;
	var other2 = document.getElementById('other2').value;
	var type2Error = document.getElementById('type2Error');
	var fname2 = document.getElementById('fname2').value;
	var fname2Error = document.getElementById('fname2Error');
	var lname2 = document.getElementById('lname2').value;
	var lname2Error = document.getElementById('lname2Error');
	var sblidnumber2 = document.getElementById('sblidnumber2').value;
	var sblidnumber2Error = document.getElementById('sblidnumber2Error');
	var siblingtelephone2 = document.getElementById('siblingtelephone2').value;
	var siblingtelephone2Error = document.getElementById('siblingtelephone2Error');		
	var address2 = document.getElementById('address2').value;
	var address2Error = document.getElementById('address2Error');
//--------------------------line3	
var type3 = document.getElementById('type3').value;
	var other3 = document.getElementById('other3').value;
	var type3Error = document.getElementById('type3Error');
	var fname3 = document.getElementById('fname3').value;
	var fname3Error = document.getElementById('fname3Error');
	var lname3 = document.getElementById('lname3').value;
	var lname3Error = document.getElementById('lname3Error');
	var sblidnumber3 = document.getElementById('sblidnumber3').value;
	var sblidnumber3Error = document.getElementById('sblidnumber3Error');
	var siblingtelephone3 = document.getElementById('siblingtelephone3').value;
	var siblingtelephone3Error = document.getElementById('siblingtelephone3Error');		
	var address3 = document.getElementById('address3').value;
	var address3Error = document.getElementById('address3Error');
//--------------------------line4	
var type4 = document.getElementById('type4').value;
	var other4 = document.getElementById('other4').value;
	var type4Error = document.getElementById('type4Error');
	var fname4 = document.getElementById('fname4').value;
	var fname4Error = document.getElementById('fname4Error');
	var lname4 = document.getElementById('lname4').value;
	var lname4Error = document.getElementById('lname4Error');
	var sblidnumber4 = document.getElementById('sblidnumber4').value;
	var sblidnumber4Error = document.getElementById('sblidnumber4Error');
	var siblingtelephone4 = document.getElementById('siblingtelephone4').value;
	var siblingtelephone4Error = document.getElementById('siblingtelephone4Error');		
	var address4 = document.getElementById('address4').value;
	var address4Error = document.getElementById('address4Error');
//--------------------------line5	
var type5 = document.getElementById('type5').value;
	var other5 = document.getElementById('other5').value;
	var type5Error = document.getElementById('type5Error');
	var fname5 = document.getElementById('fname5').value;
	var fname5Error = document.getElementById('fname5Error');
	var lname5 = document.getElementById('lname5').value;
	var lname5Error = document.getElementById('lname5Error');
	var sblidnumber5= document.getElementById('sblidnumber5').value;
	var sblidnumber5Error = document.getElementById('sblidnumber5Error');
	var siblingtelephone5 = document.getElementById('siblingtelephone5').value;
	var siblingtelephone5Error = document.getElementById('siblingtelephone5Error');		
	var address5 = document.getElementById('address5').value;
	var address5Error = document.getElementById('address5Error');
if (type1 == '')
	{

	type1Error.innerHTML = "Required !";
}
if (other1 == '')
	{

	other1Error.innerHTML = "Required !";
}
if (fname1 == '')
	{

	fname1Error.innerHTML = "Required !";
}
if (lname1 == '')
	{

	lname1Error.innerHTML = "Required !";
}
if (sblidnumber1 == '')
	{

	sblidnumber1Error.innerHTML = "Required !";
}
if (siblingtelephone1 == '')
	{

	siblingtelephone1Error.innerHTML = "Required !";
}
if (address1 == '')
	{

	address1Error.innerHTML = "Required !";
}
if (type1 != '')
	{

	type1Error.innerHTML = "";
}
else 
	{

	type1Error.innerHTML = "Required";
}
if (other1 != '')
	{

	other1Error.innerHTML = "";
}
else 
	{

	other1Error.innerHTML = "Required";
}
if (fname1 != '')
	{

	fname1Error.innerHTML = "";
}
else 
	{

	fname1Error.innerHTML = "Required";
}
if (lname1 != '')
	{

	lname1Error.innerHTML = "";
}
else 
	{

	lname1Error.innerHTML = "Required";
}

if (sblidnumber1 != '')
	{

	sblidnumber1Error.innerHTML = "";
}
else 
	{

	sblidnumber1Error.innerHTML = "Required";
}
if (siblingtelephone1 != '')
	{

	siblingtelephone1Error.innerHTML = "";
}
else 
	{

	siblingtelephone1Error.innerHTML = "Required";
}
if (address1 != '')
	{

	address1Error.innerHTML = "";
}
else 
	{

	address1Error.innerHTML = "Required";
}
//-------------------------------line2
	
if (type2 != '')
	{

	type2Error.innerHTML = "";
}
if (other2 != '')
	{

	other2Error.innerHTML = "";
}
if (fname2 != '')
	{

	fname2Error.innerHTML = "";
}
if (lname2 != '')
	{

	lname2Error.innerHTML = "";
}
if (sblidnumber2 != '')
	{

	sblidnumber2Error.innerHTML = "";
}
if (siblingtelephone2 != '')
	{

	siblingtelephone2Error.innerHTML = "";
}
if (address2 != '')
	{

	address2Error.innerHTML = "";
}

//-------------------------------line3

if (type3 != '')
	{

	type3Error.innerHTML = "";
}
if (other3 != '')
	{

	other3Error.innerHTML = "";
}
if (fname3 != '')
	{

	fname3Error.innerHTML = "";
}
if (lname3 != '')
	{

	lname3Error.innerHTML = "";
}
if (sblidnumber3 != '')
	{

	sblidnumber3Error.innerHTML = "";
}
if (siblingtelephone3 != '')
	{

	siblingtelephone3Error.innerHTML = "";
}
if (address3 != '')
	{

	address3Error.innerHTML = "";
}
//-------------------------------line4
	
if (type4 != '')
	{

	type4Error.innerHTML = "";
}
if (other4 != '')
	{

	other4Error.innerHTML = "";
}
if (fname4 != '')
	{

	fname4Error.innerHTML = "";
}
if (lname4 != '')
	{

	lname4Error.innerHTML = "";
}
if (sblidnumber4 != '')
	{

	sblidnumber4Error.innerHTML = "";
}
if (siblingtelephone4 != '')
	{

	siblingtelephone4Error.innerHTML = "";
}
if (address4 != '')
	{

	address4Error.innerHTML = "";
}

//-------------------------------line5
	
if (type5 != '')
	{

	type5Error.innerHTML = "";
}
if (other5 != '')
	{

	other5Error.innerHTML = "";
}
if (fname5!= '')
	{

	fname5Error.innerHTML = "";
}
if (lname5 != '')
	{

	lname5Error.innerHTML = "";
}
if (sblidnumber5 != '')
	{

	sblidnumber5Error.innerHTML = "";
}
if (siblingtelephone5 != '')
	{

	siblingtelephone5Error.innerHTML = "";
}
if (address5 != '')
	{

	address5Error.innerHTML = "";
}



}
</script>
<body>
<style>
.errors
{
	color:#FF0000;
}

</style>


</head>

<body>
  
    
 <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-left navbar-brand-wrapper d-flex align-items-top justify-content-left">
          <img src="images/logo.jpg" />

      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center" width="100%"><h5><strong>[<?php echo $role;?>]</strong></h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="topnav" id="myTopnav" align="">
  <div class="dddropdown">
    <button class="dropbtn">Products 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dddropdown-content">
      <a href="#">All</a>
      <a href="#">Advance Salary</a>
      <a href="#">Commerical Loan</a>
      <a href="#">Investment Group Loan/ Cooperatives</a>
    </div>
  </div> 
    <div class="dddropdown">
    <button class="dropbtn">Loan 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dddropdown-content">
      <a href="#">In Process</a>
      <a href="#">Approved</a>
      <a href="#">Denied</a>
    </div>
  </div>

  <div class="dddropdown">
    <button class="dropbtn">Financial Information 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dddropdown-content">
      <a href="#">Incomes</a>
      <a href="#">Expenditures</a>
      <a href="#">Others</a>
    </div>
  </div>
  <div class="dddropdown">
    <button class="dropbtn">Customers 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dddropdown-content">
      <a href="search_customer">Search Customer</a>
    </div>
  </div> 
  <div class="dddropdown">
    <button class="dropbtn">Reports 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dddropdown-content">
      <a href="#">Annual Reports</a>
      <a href="#">Monthly Reports</a>
      <a href="#">Daily</a>
    </div>
  </div>
  <div class="dddropdown">
    <button class="dropbtn">Satistics 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dddropdown-content">
      <a href="#">Loan Types</a>
      <a href="#">Periode</a>
      <a href="#">Location</a>
      <a href="#">Score</a>
    </div>
  </div>
  
</div>

 <li class="nav-item dropdown d-none d-xl-inline-block" style= "float:right; display:block;">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text"><strong><font color="white">Hello, <?php echo  $fname.'&nbsp;&nbsp;&nbsp;&nbsp;'.$lname?>!</strong></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown" >
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a  href = "my_settings" target="_blank" class="dropdown-item mt-2">
                Manage Security
              </a>
                           <a href="logout" class="dropdown-item">
                Sign Out
              </a>
            </font></div>
          </li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  
<a href ="logout"><span><strong><font color="#D2691E">LOGOUT</font></strong></span></a>		  
      </div>
	  
    </nav>
	
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar"><br><br>
        <ul class="nav">
          <li>
              
              <button class="button">Application Steps 
               
          </li>
		          <li class="nav-item">
          <a href="commercial_loan_inbox">  <div class="nav-link" >
              <span class="menu-title"><strong><font size="3px">Dashboard </font></strong></span>   
            </div></a>
          </li>
          <li class="nav-item">
            <div class="nav-link" href="#">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;" id ="fafaloand"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Loan Details</strong></span>   
            </div>
          </li>
		  <li class="nav-item" onclick="document.getElementById('sibling').style.display = 'none';document.getElementById('coraterals').style.display = 'none';document.getElementById('attachments').style.display = 'none';document.getElementById('refferences').style.display = 'none';document.getElementById('personalinfo').style.display = 'block';document.getElementById('employmentinfo').style.display = 'none';document.getElementById('credithistory').style.display = 'none'; document.getElementById('incomes').style.display = 'none';document.getElementById('comment').style.display = 'none';">
           <div class="nav-link" href="#">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand1"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Applicant Details</strong></span>   
            </div>
          </li>
		  <li class="nav-item" onclick="document.getElementById('sibling').style.display = 'block';document.getElementById('coraterals').style.display = 'none';document.getElementById('attachments').style.display = 'none';document.getElementById('refferences').style.display = 'none';document.getElementById('personalinfo').style.display = 'none';document.getElementById('employmentinfo').style.display = 'none';document.getElementById('credithistory').style.display = 'none'; document.getElementById('incomes').style.display = 'none';document.getElementById('comment').style.display = 'none';">
           <div class="nav-link" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="ui-basic">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Siblings</strong></span>
            </div>
            
          </li>
		  <li class="nav-item" onclick="document.getElementById('sibling').style.display = 'none';document.getElementById('coraterals').style.display = 'none';document.getElementById('attachments').style.display = 'none';document.getElementById('refferences').style.display = 'none';document.getElementById('personalinfo').style.display = 'none';document.getElementById('employmentinfo').style.display = 'block';document.getElementById('credithistory').style.display = 'none'; document.getElementById('incomes').style.display = 'none';document.getElementById('comment').style.display = 'none';">
           <div class="nav-link" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="ui-basic">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Employment Details</strong></span>
            </div>
            
          </li>

		  <li class="nav-item" onclick="document.getElementById('sibling').style.display = 'none';document.getElementById('coraterals').style.display = 'none';document.getElementById('attachments').style.display = 'none';document.getElementById('refferences').style.display = 'none';document.getElementById('personalinfo').style.display = 'none';document.getElementById('employmentinfo').style.display = 'none';document.getElementById('credithistory').style.display = 'block'; document.getElementById('incomes').style.display = 'none';document.getElementById('comment').style.display = 'none';">
            <div  class="nav-link" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="ui-basic">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Credit History</strong></span>
            </div>
            
          </li>
         
            
         
		  <li class="nav-item" onclick="document.getElementById('sibling').style.display = 'none';document.getElementById('coraterals').style.display = 'none';document.getElementById('attachments').style.display = 'none';document.getElementById('refferences').style.display = 'none';document.getElementById('personalinfo').style.display = 'none';document.getElementById('employmentinfo').style.display = 'none';document.getElementById('credithistory').style.display = 'none'; document.getElementById('incomes').style.display = 'block';document.getElementById('comment').style.display = 'none';">
            <div class="nav-link" href="#">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Monthly Income</strong></span>   
            </div>
          </li>
		   <li class="nav-item" onclick="document.getElementById('sibling').style.display = 'none';document.getElementById('coraterals').style.display = 'none';document.getElementById('attachments').style.display = 'block';document.getElementById('refferences').style.display = 'none';document.getElementById('personalinfo').style.display = 'none';document.getElementById('employmentinfo').style.display = 'none';document.getElementById('credithistory').style.display = 'none'; document.getElementById('incomes').style.display = 'none';document.getElementById('comment').style.display = 'none';">
            <div class="nav-link" href="#">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Attachments</strong></span>   
            </div>
          </li>

		   <li class="nav-item" onclick="document.getElementById('sibling').style.display = 'none';document.getElementById('coraterals').style.display = 'block';document.getElementById('refferences').style.display = 'none';document.getElementById('attachments').style.display = 'none';document.getElementById('personalinfo').style.display = 'none';document.getElementById('employmentinfo').style.display = 'none';document.getElementById('credithistory').style.display = 'none'; document.getElementById('incomes').style.display = 'none';document.getElementById('comment').style.display = 'none';">
            <div class="nav-link" href="#">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Coraterals</strong></span>   
            </div>
          </li>
		  <li class="nav-item" onclick="document.getElementById('sibling').style.display = 'none';document.getElementById('coraterals').style.display = 'none';document.getElementById('attachments').style.display = 'none';document.getElementById('refferences').style.display = 'block';document.getElementById('personalinfo').style.display = 'none';document.getElementById('employmentinfo').style.display = 'none';document.getElementById('credithistory').style.display = 'none'; document.getElementById('incomes').style.display = 'none';document.getElementById('comment').style.display = 'none';">
            <div class="nav-link" href="#">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Refferences</strong></span>   
            </div>
          </li>
		 		  <li class="nav-item" onclick="document.getElementById('comment').style.display = 'block';document.getElementById('sibling').style.display = 'none';document.getElementById('coraterals').style.display = 'none';document.getElementById('attachments').style.display = 'none';document.getElementById('refferences').style.display = 'none';document.getElementById('personalinfo').style.display = 'none';document.getElementById('employmentinfo').style.display = 'none';document.getElementById('credithistory').style.display = 'none'; document.getElementById('incomes').style.display = 'none';">
            <div class="nav-link" href="#">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Comments</strong></span>   
            </div>
          </li>
        </ul>
      </nav>
	  <div class="main-panel">
	          <div class="content-wrapper">
<div class="main-content" align="center">
				<div class="main-content-inner">
				
					<div class="page-content">
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
             <div class="col-12 grid-margin">
			 
                  <form class="form-sample" method="POST" action="save_application" enctype="multipart/form-data"id="myCoolForm">
					<input type="text" name="loantermtype" value="<?php echo $loan_term_type ;?>" style="display:none" required>
					<input type="text" name="loantermrate" value="<?php echo $loan_term_rate;?>" style="display:none" required>
					<input type="text" name="loantermduration" value="<?php echo $loan_term_duration;?>" style="display:none" required>
	<strong>Accoount Number *&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="accountnumber"  style="border:1px solid #000000" value="<?php if($myaccount){echo $myaccount;} else{echo "";}?>" placeholder="Your account number supposed here" required   autocomplete="off" readonly required>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Accoount Name *&nbsp;&nbsp;&nbsp;&nbsp; </strong></span><input type="text" name="accountname"  size="45px" style="border:1px solid #000000" value="<?php echo $firstname ;?> &nbsp;&nbsp;<?php echo $lastname ;?>"placeholder="Your account number supposed here" required  autocomplete="off"  style="border-color:black"><br><br>
				<strong>Track Number *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="tracknumber"  style="border:1px solid #000000" value="<?php echo $track;?>" placeholder="Your account number supposed here" required   autocomplete="off" readonly required>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Branch *&nbsp;&nbsp;&nbsp;&nbsp; </strong></span><input type="text" name="branch"  size="45px" style="border:1px solid #000000" value="<?php echo $branch ;?>" placeholder="Your account number supposed here" required  autocomplete="off" readonly><br><br>
			<strong>Amount *&nbsp;&nbsp;&nbsp;&nbsp; </strong></span><input type="text" name="loanamount"  style="border:1px solid #000000"  value="<?php echo $amount;?>" placeholder="Your account number supposed here" required   autocomplete="off" readonly><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Term *&nbsp;&nbsp;&nbsp;&nbsp; </strong></span><input type="text" name="term"  style="border:1px solid #000000" align="center" size="3px" value="<?php echo $loan_term_duration;?>" placeholder="Your account number supposed here" required   autocomplete="off" readonly> <strong><?php echo $loan_term_type;?>(s)</strong><input type="text" name="loanamount"  style="border:1px solid #000000; display:none" size="6px"  value="<?php echo $amount;?>" placeholder="Your account number supposed here" required   autocomplete="off" readonly>
				<input type="text" name="loantype"  size="30px" value="<?php echo $loantype;?>" style="display:none" placeholder="Your account number supposed here" required   autocomplete="off" readonly><input type="text" name="duration" value="<?php echo $duration;?>" style="display:none;">
				<hr>
				<div class="card-body" id = "personalinfo"align="center">

                    <p class="card-description" align="left">
                      <strong>Personal information</strong><hr>
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">First Name</label>
                          <div class="col-sm-9"><span id="firstnameError" class="errors"></span>
                            <input type="text" class="form-control" id = "firstname" name = "firstname" style="border-color:black" value="<?php echo $firstname;?>" placeholder=" First Name"/>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                     
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Name</label>
                          <div class="col-sm-9"><span id="lastnameError" class="errors"></span>
                            <input type="text" class="form-control" id = "lastname" name = "lastname" style="border-color:black" value="<?php echo $lastname;?>" placeholder=" Last Name" /><span id="reqlastname" class="reqError" requ></span>
                          </div>
                        </div>
                      </div>
                      
                    </div>
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">ID Number</label>
                          <div class="col-sm-9"><span id="idnumberError" class="errors"></span>
                            <input type="text" class="form-control" Value="<?php echo $id_number;?>" id = "idnumber" name= "idnumber" style="border-color:black"  placeholder=" ID Number"> <span id="reqtelephone" class="reqError" requ></span>
                          </div>
                        </div>
                      </div>
                      
                    </div>
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Telephone</label>
                          <div class="col-sm-9"><span id="telephoneError" class="errors"></span>
                            <input type="text" class="form-control" id = "telephone" name= "telephone" style="border-color:black" Value="<?PHP echo $telephone;?>" placeholder=" Telephone"> <span id="reqtelephone" class="reqError" requ></span>
                          </div>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date of Birth</label>
                          <div class="col-sm-9">
						 <table class="table table-bordered">
						 <tr><td><span id="DOBDayError" class="errors"></span></td><td><span id="DOBMonthError" class="errors"></span></td><td><span id="DOBYearError" class="errors"></span></td></tr>
						 
						 <tr><td> <select name="DOBDay" id="DOBDay" >
<option value="<?php echo $dayDOB ;?>"><?php echo $dayDOB ;?></option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select></td><td>
						  
<select name="DOBMonth" id="DOBMonth">
<option value="<?php echo $monthDOB ;?>"><?php echo $monthDOB ;?></option>
<option value="01">January</option>
<option value="02">Febuary</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select></td><td>

<select name="DOBYear" id="DOBYear">
<option value="<?php echo $yearDOB ;?>"><?php echo $yearDOB ;?></option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
<option value="1909">1909</option>
<option value="1908">1908</option>
<option value="1907">1907</option>
<option value="1906">1906</option>
<option value="1905">1905</option>
<option value="1904">1904</option>
<option value="1903">1903</option>
<option value="1902">1902</option>
<option value="1901">1901</option>
<option value="1900">1900</option>
</select></td></tr></table>


                          </div>
                        </div>
                      </div>
                      
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Place of Birth</label>
                          <div class="col-sm-9"><span id="palcebirthError" class="errors"></span>
                            <input type="text" class="form-control" id = "palcebirth" name = "palcebirth" style="border-color:black" value="<?php echo $placebirth;?>" placeholder="Place of Birth"/><span id="reqpalcebirth" class="reqError" requ></span>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-9"><span id="genderError" class="errors"></span>
                            <?php

  $gender = "SELECT * from gender_customization";
?>

    <select class="form-control" id = "gender"  name = "gender" style="border-color:black"value="<?php echo $gender;?>" required>

      <?php
	  $resultgender= $conn_db->query($gender);
if ($resultgender->num_rows > 0) {
while($row = $resultgender->fetch_assoc()) {
            echo '<option value="' . $row['gender_name'] . '">' . $row['gender_name'] . '</option>';
        }
}
      ?>
    </select>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Civil Status</label>
                          <div class="col-sm-9"><span id="statusError" class="errors"></span>
                             <?php

  $status = "SELECT * from status_customization";
?>

    <select class="form-control" id = "status"  name = "status" style="border-color:black"  value="<?php echo $status;?>" onchange='CheckColors(this.value);changetextbox();' required>

      <?php
	  $resultstatus= $conn_db->query($status);
if ($resultstatus->num_rows > 0) {
while($row1 = $resultstatus->fetch_assoc()) {
            echo '<option value="' . $row1['status_name'] . '">' . $row1['status_name'] . '</option>';
        }
}
      ?>
    </select>

                          </div>
						  
                        </div>
                      </div>
                      
                    </div>
					<div class="row" id="spouse" style="display:none">
                      <div class="col-md-6">
					                            <label class="col-sm-3 col-form-label" id ="married" style="display:none" ><font color="green">Married To:</font></label>
					                            <label class="col-sm-3 col-form-label" id ="divorced" style="display:none" ><font color="green">Divorced with :</font></label>
					                            <label class="col-sm-3 col-form-label" id ="widowed" style="display:none" ><font color="green">Widow of:</font></label>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><font color ="green">First Name</font></font></label>
                          <div class="col-sm-9"><span id="spousenameError" class="errors"></span>
                            <input type="text" class="form-control" id = "spousename"  name = "spousename"  style="border-color:black"     placeholder=" Parthner's First Name" />
                          </div>
                        </div>
<div class="form-group row">
                          <label class="col-sm-3 col-form-label"><font color ="green">Last  Name</font></label>
                          <div class="col-sm-9"><span id="spouselastnameError" class="errors"></span>
                            <input type="text" class="form-control" id = "spouselastname"  name = "spouselastname"  style="border-color:black"    placeholder=" Parthner's Last Name"/>
                          </div>
                        </div>
<div class="form-group row">
                          <label class="col-sm-3 col-form-label"><font color ="green">Telephone </font></label>
                          <div class="col-sm-9"><span id="spousetelephoneError" class="errors"></span>
                            <input type="text" class="form-control" id = "spousetelephone"  name = "spousetelephone"  style="border-color:black"     placeholder=" Parthner's Telephone"/>
                          </div>
                        </div>
                      </div>
                      
                    </div>
					<hr>
                    <p class="card-description" align="left">
                      Permanent Address
                    </p><hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Province</label>
                          <div class="col-sm-9"><span id="provincelistError" class="errors"></span>
							<select class="form-control" id="provincelist" name="provincelist" style="border-color:black" onChange="getDistrict(this.value);SelectedTextValue(this);" value="<?php echo $provinceNMe;?>"><span id="reqProvince" class="reqError" requ></span>
<?php
foreach($results as $province) {
?>
<option value="<?php echo $province["Province_id"]; ?>"><?php echo $province["province_name"]; ?></option>
<?php
}
?>
			  </select><input name="provinceName" type="text" id="txtContent" value="<?php echo $provinceNMe;?>"  style="display:none" required/>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">District</label>
                          <div class="col-sm-9"><span id="disrict_listeError" class="errors"></span>
                           <select class="form-control" id="disrict_liste" name="district" style="border-color:black" onChange="getSector(this.value);SelectedTextValue1(this);" value="<?php echo $districtNMe;?>"> <span id="reqDistrict" class="reqError" requ></span>
<option value="<?php echo $districtNMe;?>"><?php echo  $districtNMe;?></option>
</select>			 <input name="disrictName" type="text" id="txtContent1"value="<?php echo $districtNMe;?>" style="display:none" required/>

                          </div>
                        </div>
                      </div>
                     
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Sector</label>
                          <div class="col-sm-9"><span id="sector_listError" class="errors"></span>
 <select class="form-control"id="sector_list"  name="sector" style="border-color:black" onChange="getCell(this.value);SelectedTextValue2(this);" value="<?php echo $sectorNme;?>" ><span id="reqSector" class="reqError" requ></span>
<option value="<?php echo $sectorNme;?>"><?php echo  $sectorNme;?></option>

</select>   <input name="sectorName" type="text" id="txtContent2" value="<?php echo $sectorNme;?>" style="display:none"  required/>                       </div>
                        </div>
						</div>
						<br><br><br>
						
                      </div>
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Cell</label>
                          <div class="col-sm-9"><span id="cell_listError" class="errors"></span>
 <select class="form-control"id="cell_list" name="cell" style="border-color:black" onChange="SelectedTextValue3(this);"  value="<?php echo $sectorNme;?>"><span id="reqCell" class="reqError" requ></span>
<option value="<?php echo $cellNme;?>"><?php echo  $cellNme;?></option>
</select><input name="cellName" type="text" id="txtContent3" value="<?php echo $cellNme;?>" style="display:none"  required/> 

                          </div>
                        </div>
						</div>
						<br><br><br>
						
                      </div>
					  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Village</label>
                          <div class="col-sm-9"><span id="villageError" class="errors"></span>
                            <input type="text"  name = "village" id = "village" style="border-color:black" class="form-control"  value="<?php echo $villageNme;?>"><span id="reqVillagre" class="reqError" requ></span>
                          </div>
                        </div>
						</div>
						<br><br><br>
						
                      </div><hr>
                 <button type="button" class="btn btn-success dropdown-toggle btn-sm"  style="float: center;" onclick="Validate();">Next</button>
					<hr>
					
					
					</div>
									<div class="card-body" id = "sibling" style="display:none" align="center">
					<p class="card-description" align="left">
                      <strong>Siblings</strong><hr>
                    </p>

<table border='0' id="dynamic_field">  
				<tr><th>Sibing Type</th><th>Sibing First Name</th><th>Sibing Last Name</th><th>Sibing ID</th><th>Sibing Telephone</th><th>Sibing Address</th><th>Add</th><th>Remove</th></tr>
                                                     
									<tr>  
                                         <td> 
										 <span id="type1Error" class="errors"></span> <span id="other1Error" class="errors"></span>
										 
										 						<select class="form-control" name="type[]" id = "type1" style="border-color:black" required>
						<option value="">Sibling</option>
						<option value="Wife">Wife</option>
						<option value="Husband">Husband</option>
						<option value="Parent">Parent</option>
						<option value="Brother">Brother</option>
						<option value="Sister">Sister</option>
						<option value="Other">Other</option></select><input type="text" name ="other1" id ="other1" class="form-control" placeholder="Specify Other Type" style="display: none;" disabled required></td>
										<td><span id="fname1Error" class="errors"></span><input type="text" name="fname[]" id="fname1" placeholder="Sibling First Name" class="form-control name_list" required /></td> 
										<td><span id="lname1Error" class="errors"></span><input type="text" name="lname[]" id="lname1" placeholder="Sibling Last Name" class="form-control name_list" required/></td>  
										<td><span id="sblidnumber1Error" class="errors"></span><input type="text" name="sblidnumber[]" id="sblidnumber1" placeholder="Sibling ID No" class="form-control name_list" required/></td>  
										<td><span id="siblingtelephone1Error" class="errors"></span><input type="text" name="siblingtelephone[]" id="siblingtelephone1" placeholder="Sibling Telephone" class="form-control name_list" required/></td>  
										<td><span id="address1Error" class="errors"></span><input type="text" name="address[]" id="address1" placeholder="Sibling Address" class="form-control name_list" required/></td>  
   										  <td><input type="button" name="active1" id="active1" value="Add More" class="btn btn-success" onclick="showline2()" ></td>
   										  <td></td></tr>
                                      										 
                                        
									<tr>  
                                         <td><span id="type2Error" class="errors"></span> <span id="other2Error" class="errors"></span>
										 <select class="form-control" name="type[]" id="type2" style="display:none" disabled required>
						<option value="">Sibling</option>
						<option value="Wife">Wife</option>
						<option value="Husband">Husband</option>
						<option value="Parent">Parent</option>
						<option value="Brother">Brother</option>
						<option value="Sister">Sister</option>
						<option value="Other">Other</option></select><input type="text" name ="other2" id ="other2" class="form-control" placeholder="Specify Other Type" style="display: none;" disabled required></td>
										<td><span id="fname2Error" class="errors"></span><input type="text" name="fname[]" id="fname2"  placeholder="Sibling First Name" class="form-control name_list"  disabled required  style="display: none"/></td> 
										 <td><span id="lname2Error" class="errors"></span><input type="text" name="lname[]" id="lname2"  placeholder="Sibling Last Name" class="form-control name_list"  disabled required style="display: none"/></td> 
										 <td><span id="sblidnumber2Error" class="errors"></span><input type="text" name="sblidnumber[]" id="sblidnumber2"  placeholder="Sibling ID No" class="form-control name_list"  disabled required style="display: none"/></td> 
										 <td><span id="siblingtelephone2Error" class="errors"></span><input type="text" name="siblingtelephone[]" id="siblingtelephone2"   placeholder="Sibling ID No" class="form-control name_list"  disabled required style="display: none"/></td> 
										 <td><span id="address2Error" class="errors"></span><input type="text" name="address[]"  id="address2" placeholder="Sibling Address" class="form-control name_list"  disabled required  style="display: none" /></td> 
   										  <td><input type="button" name="active2" id="active2" value="Add More" class="btn btn-success" onclick="showline3()" style="display: none"></td>
   										  <td><input type="button" name="remove2" id="remove2" value="Remove" class="btn btn-danger btn_remove" onclick="hideline2()" style="display: none"></td></tr>
                                      										 
                                        
                                    	<tr>  
                                         <td><span id="type3Error" class="errors"></span> <span id="other3Error" class="errors"></span>
										 <select class="form-control" name="type[]" id="type3" disabled required style="display:none">
						<option value="">Sibling</option>
						<option value="Wife">Wife</option>
						<option value="Husband">Husband</option>
						<option value="Parent">Parent</option>
						<option value="Brother">Brother</option>
						<option value="Sister">Sister</option>
						<option value="Other">Other</option></select><input type="text" name ="other3" id ="other3" class="form-control" placeholder="Specify Other Type" style="display: none;" disabled required>
										 </td>
										<td><span id="fname3Error" class="errors"></span><input type="text" name="fname[]" id="fname3"  placeholder="Sibling First Name" class="form-control name_list" disabled required   style="display: none"/></td> 
										 <td><span id="lname3Error" class="errors"></span><input type="text" name="lname[]" id="lname3"  placeholder="Sibling Last Name" class="form-control name_list" disabled required  style="display: none"/></td> 
										 <td><span id="sblidnumber3Error" class="errors"></span><input type="text" name="sblidnumber[]" id="sblidnumber3"  placeholder="Sibling ID No" class="form-control name_list" disabled required  style="display: none"/></td> 
										 <td><span id="siblingtelephone3Error" class="errors"></span><input type="text" name="siblingtelephone[]" id="siblingtelephone3"   placeholder="Sibling ID No" class="form-control name_list" disabled required  style="display: none"/></td> 
										 <td><span id="address3Error" class="errors"></span><input type="text" name="address[]"  id="address3" placeholder="Sibling Address" class="form-control name_list" disabled required   style="display: none" /></td> 
   										  <td><input type="button" name="active3" id="active3" value="Add More" class="btn btn-success" onclick="showline4()" style="display: none"></td>
   										  <td><input type="button" name="remove3" id="remove3" value="Remove" class="btn btn-danger btn_remove" onclick="hideline3()" style="display: none"></td>
                                      										 
                                        
                                    </tr>
<tr>  
                                         <td><span id="type4Error" class="errors"></span> <span id="other4Error" class="errors"></span>
										 <select class="form-control" name="type[]" id="type4" disabled required  style="display:none">
						<option value="">Sibling</option>
						<option value="Wife">Wife</option>
						<option value="Husband">Husband</option>
						<option value="Parent">Parent</option>
						<option value="Brother">Brother</option>
						<option value="Sister">Sister</option>
						<option value="Other">Other</option></select><input type="text" name ="other4" id ="other4" class="form-control" placeholder="Specify Other Type" style="display: none;" disabled required>
										 </td>
										<td><span id="fname4Error" class="errors"></span><input type="text" name="fname[]" id="fname4"  placeholder="Sibling First Name" class="form-control name_list" disabled required   style="display: none"/></td> 
										 <td><span id="lname4Error" class="errors"></span><input type="text" name="lname[]" id="lname4"  placeholder="Sibling Last Name" class="form-control name_list" disabled required  style="display: none"/></td> 
										 <td><span id="sblidnumber4Error" class="errors"></span><input type="text" name="sblidnumber[]" id="sblidnumber4"  placeholder="Sibling ID No" class="form-control name_list" disabled required  style="display: none"/></td> 
										 <td><span id="siblingtelephone4Error" class="errors"></span><input type="text" name="siblingtelephone[]" id="siblingtelephone4"   placeholder="Sibling ID No" class="form-control name_list" disabled required  style="display: none"/></td> 
										 <td><span id="address4Error" class="errors"></span><input type="text" name="address[]"  id="address4" placeholder="Sibling Address" class="form-control name_list" disabled required   style="display: none" /></td> 
   										  <td><input type="button" name="active4" id="active4" value="Add More" class="btn btn-success" onclick="showline5()" style="display: none"></td>
   										  <td><input type="button" name="remove4" id="remove4" value="Remove" class="btn btn-danger btn_remove" onclick="hideline4()" style="display: none"></td></tr>
                                      										 
                                        
                                    </tr>	
<tr>  <tr>
                                         <td><span id="type5Error" class="errors"></span> <span id="other5Error" class="errors"></span>
										 <select class="form-control" name="type[]" id="type5" disabled required style="display:none">
						<option value="">Sibling</option>
						<option value="Wife">Wife</option>
						<option value="Husband">Husband</option>
						<option value="Parent">Parent</option>
						<option value="Brother">Brother</option>
						<option value="Sister">Sister</option>
						<option value="Other">Other</option></select><input type="text" name ="other5" id ="other5" class="form-control" placeholder="Specify Other Type" style="display: none;" disabled required>
										 </td>
										<td><span id="fname5Error" class="errors"></span><input type="text" name="fname[]" id="fname5"  placeholder="Sibling First Name" class="form-control name_list" disabled required   style="display: none"/></td> 
										 <td><span id="lname5Error" class="errors"></span><input type="text" name="lname[]" id="lname5"  placeholder="Sibling Last Name" class="form-control name_list" disabled required  style="display: none"/></td> 
										 <td><span id="sblidnumber5Error" class="errors"></span><input type="text" name="sblidnumber[]" id="sblidnumber5"  placeholder="Sibling ID No" class="form-control name_list" disabled required  style="display: none"/></td> 
										 <td><span id="siblingtelephone5Error" class="errors"></span><input type="text" name="siblingtelephone[]" id="siblingtelephone5"   placeholder="Sibling ID No" class="form-control name_list" disabled required  style="display: none"/></td> 
										 <td><span id="address5Error" class="errors"></span><input type="text" name="address[]"  id="address5" placeholder="Sibling Address" class="form-control name_list" disabled required   style="display: none" /></td> 
   										 <td><input type="button" name="active5" id="active5" value="Add More" class="btn btn-success" onclick="showline6()" style="display: none"></td>
   										  <td><input type="button" name="remove5" id="remove5" value="Remove" class="btn btn-danger btn_remove" onclick="hideline5()" style="display: none"></td>
                                      										 
                                        
                                    </tr>	
<tr>  
                                         							
								   
                               </table> 			<button type="button" class="btn btn-success dropdown-toggle btn-sm"  style="float: left;" onclick="myFunction()">Back</button>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm"  style="float: center; " onclick="Validatetype();myFunction2() ">Next</button><br><hr>
          </div>
				<div class="card-body" id = "employmentinfo" style="display:none" align="center">

                    <p class="card-description" align="left">
                      <strong>Employment Details</strong><hr>
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Employer's Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="employernames" class="form-control" style="border-color:black"/>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Employer's activity</label>
                          <div class="col-sm-9">
                            <?php

  $query11 = "SELECT * from activity_custom";
?>

    <select class="form-control" id = "emplactivity"  name = "emplactivity" style="border-color:black" required><option value=""><strong>Select Employer's Activity<strong></option>

      <?php
	  $resultactivity= $conn_db->query($query11);
if ($resultactivity->num_rows > 0) {
while($row11 = $resultactivity->fetch_assoc()) {
            echo '<option value="' . $row11['activity_name'] . '">' . $row11['activity_name'] . '</option>';
        }
}
      ?>
    </select>
                          </div>
                        </div>
                      </div>
                      
                    </div>
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"> Position</label>
                          <div class="col-sm-9">
                            <input type="text" name="position" class="form-control" style="border-color:black" />

                          </div>
                        </div>
                      </div>
                    </div>
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contract Termination Date</label>
                          <div class="col-sm-9">
						  <input type="checkbox" name="Undefined" value="Undefined" onclick="var input = document.getElementById('datesearch1'); if(this.checked){input.disabled=true; input.focus();}else{ input.disabled = false;}"> Undefined
                            <input type="text" class="form-control" style="border-color:black" id="datesearch1" name ="terminationdate" placeholder="Contract Termination Date   [YY-MM-DD]" required >
							
                          </div>
                        </div>
                      </div>
                      
                    </div>
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Employer's Adress</label>
                          <div class="col-sm-9">
                            <select class="form-control" id="provincelist1" name="emplprovince" style="border-color:black" onChange="getDistrict1(this.value);sSelectedTextValue(this);"><option value="" >Select Employment Province</option><span id="reqProvince" class="reqError" requ></span>
<?php
foreach($results as $province) {
?>
<option value="<?php echo $province["Province_id"]; ?>"><?php echo $province["province_name"]; ?></option>
<?php
}
?>
			  </select> <input name="employerProvinceName" type="text" id="ttxtContent"  style="display:none" required/>
			  <select class="form-control" id="disrict_liste1" name="cat_id11" style="border-color:black" onChange="getSector1(this.value); sSelectedTextValue1(this);" > <span id="reqDistrict" class="reqError" requ></span>
<option value="">Select Employment Disrict</option>
</select><input name="employerDistrictName" type="text" id="ttxtContent1"  style="display:none" required/>
<select  class="form-control" id="sector_list1"  name="cat_id2" style="border-color:black" onChange="getCell1(this.value);sSelectedTextValue2(this);" ><span id="reqSector" class="reqError" requ></span>
<option value="">Select Employment Sector</option>
</select>   <input name="employerSectorName" type="text" id="ttxtContent2"  style="display:none" required/>
<select class="form-control" id="cell_list1" name="cat_id3" style="border-color:black" onChange="sSelectedTextValue3(this);" ><span id="reqCell" class="reqError" requ></span>
<option value="">Select Employment Cell</option>
</select>   <input name="employerCellName" type="text" id="ttxtContent3" style="display:none" required/> 
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Employer's telephone</label>
                          <div class="col-sm-9">
                            <input type="text" name = "employtelephone" class="form-control" style="border-color:black"/>

                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date of start of employment</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" style="border-color:black" id="datesearch" name ="datestart" placeholder="From" aria-describedby='name-format'>

                          </div>
                        </div>
                      </div>
                      
                    </div><hr>
                                                    
					<button type="button" class="btn btn-success dropdown-toggle btn-sm"  style="float: left;" onclick="myFunctionb()">Back</button>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm"  style="float: center; " onclick="myFunction222()">Next</button><br><hr>
            </div>

					<!--End employment-->	
					<div class="card-body" id = "credithistory" style="display:none"align="center">

                    <p class="card-description" align="left">
                      <strong>Credit History</strong><hr>
                    </p>
					                    <div class="row">

                    <div class="container">
    <div class="form-group">
            <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field1">  
                    <tr><td align="center">Amount Borrowed</td><th> Payment Type</th><th>Action</th></tr>
                        <td align="center"><input type="text" name="amountcrhist[]" id="firstNumber" onkeyup="format(this)" placeholder="Amount Borrowed"style="width: 35%;  padding: 12px 20px; margin: 8px 0;border-color:black" required /></td>  
                       <td>
						<select class="form-control" name="typepymt[]" style="width: 45%; border-color:black" required>
						<option value="">Payment Type</option>
						<option value="Very Good">Very Good</option>
						<option value="Good">Good</option>
						<option value="Moderate">Moderate</option>
						<option value="Very Bad">Very Bad</option>
						</td>  
                        <td><button type="button" name="add1" id="add1" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table>  
            </div>
    </div> 
</div></div>
                   
                   <hr>
                                   
					<button type="button" class="btn btn-success dropdown-toggle btn-sm"  style="float: left" onclick="myFunction001()">Back</button>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm"  style="float: center" onclick="myFunction3()">Next</button><br><hr>
            </div>


<div class="card-body" id = "incomes" style="display:none"align="center">

                    <p class="card-description" align="left">
                      <strong>Incomes</strong><hr>
                    </p>
                    
                   
                    <div class="row">
                     <div class="container">
    <div class="form-group">
            <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field2">  
				<tr><td align="center">Amount </td><th> Income Type</th><th>Action</th></tr>
                    <tr>
                        <td align="center"><input type="text" name="incomeamount[]" id="firstNumber" onkeyup="format(this)" placeholder="Income Amount" style="width: 35%;  padding: 12px 20px; margin: 8px 0;border-color:black" required /></td>  
                       <td>
						<select class="form-control" name="typeincome[]" style="width: 40%; border-color:black" required>
						<option value="">  Income Type</option>
						<option value="Montly Salary">Montly Salary</option>
						<option value="Commercial Activities">Commercial Activities</option>
						<option value="Additional Activity">Additional Activity</option>
						<option value="Grant">Grant</option>
						</td>  
                        <td><button type="button" name="add2" id="add2" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table>  
            </div>
    </div> 
</div>
                    </div>
                  
                   
                     <hr>             
					<button type="button" class="btn btn-success dropdown-toggle btn-sm"  style="float: left; " onclick="myFunction003()">Back</button>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm"  style="float: center;" onclick="myFunction4()">Next</button><br><hr>
            </div>
			<div class="card-body" id = "attachments" style="display:none"align="center">

                    <p class="card-description" align="left">
                      <strong>Add Required Attachment(s) </strong><hr>
                    </p>
                    
                   
                    <div class="row">
                      <div class="input_fields_wrap">
                        <div style = "display: none" ><input type="file" name="attachment" value="Attach File" id="first_attach">
						<a href="#" class="remove_field"  style="color:red;"><img src="img/delattach.png.png" width="15" height="15"/><strong> Remove File 1</strong></a>
						</div>
                    </div>
                    </div>
                  					<a class="add_field_button" style="float:left"><strong><img src="img/attACHMENT.png" style="float: center; " width="35" height="35"/><font size="3">Add_File</strong></a></font><br><br><br>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm"  style="float: left;" onclick="myFunction0031()">Back</button>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm"  style="float: center;" onclick="myFunction41()">Next</button><br><hr>
            </div>
			
			<!-- End attachments-->

			
			<div class="card-body" id = "coraterals" style="display:none"align="center">

                    <p class="card-description" align="left">
                      <strong>Coraterals </strong><hr>
                    </p>
                    
                   
                    <div class="row">
                      <div class="container">
    <div class="form-group">
            <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field3" width="50%">  
				<tr><td align="center"><strong>Corateral's Value</strong></td><td><strong>Corateral's Type</strong></td><td><strong>Documents</strong></td><td><strong>Action</strong></td></tr>
                    <tr>
                        <td align="center"><input type="text" name="corateral[]"  id="firstNumber" onkeyup="format(this)" placeholder="Corateral Amount" style="width: 35%;  padding: 12px 20px; margin: 8px 0;border-color:black"required /></td>  
                       <td>
						<select class="form-control" name="typecorateral[]" style="width: 40%; border-color:black" required>
						<option value="">-- Select Corateral Type--</option>
						<option value="Building">Building</option>
						<option value="Land">Land</option>
						<option value="Furniture">Furniture</option>
						</td> 
                       <td>
					<input name='files[]' type='file'/>
						</td>  						
                        <td><button type="button" name="add3" id="add3" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table>  
            </div>
    </div> 
</div>
                    </div>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm"  style="float: left;" onclick="myFunction00312()">Back</button>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm"  style="float: center;" onclick="myFunction411()">Next</button><br><hr>
            </div>
			
<div class="card-body" id = "refferences" style="display:none"align="center">

                    <p class="card-description" align="left">
                      <strong>Refferences</strong><hr>
                    </p>
					<h5><u> Refference 1.</u></h5>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Names</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"name ="referencename1" style="border-color:black" />
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="refferenceaddres1" style="border-color:black" />
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="refferencenumber1" style="border-color:black"/>
                          </div>
                        </div>
                      </div>
                      
                    </div>
					 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Recommandation </label>
                          <div class="col-sm-9">
                            <input name='files[]' type='file'/>
                          </div>
                        </div>
                      </div>
                      
                    </div>
					<h5> <u> Refference 2.</u></h5>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Names</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="referencename2" style="border-color:black"/>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"  name="refferenceaddres2" style="border-color:black" />
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"  name="refferencenumber2"style="border-color:black" />
                          </div>
                        </div>
                      </div>
                      
                    </div>
										 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Recommandation </label>
                          <div class="col-sm-9">
                            <input name='files[]' type='file'/>
                          </div>
                        </div>
                      </div>
                      
                    </div>
					<h5><u> Refference 3.</u></h5>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Names</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name= "referencename3" style="border-color:black" />
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"name="refferenceaddres3" style="border-color:black" />
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"  name="refferencenumber3" style="border-color:black"/>
                          </div>
                        </div>
                      </div>
                      
                    </div> 					 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Recommandation </label>
                          <div class="col-sm-9">
                            <input name='files[]' type='file'/>
                          </div>
                        </div>
                      </div>
                      
                    </div>  <hr>                               
					<button type="button" class="btn btn-success dropdown-toggle btn-sm"   style="float: left; " onclick="myFunction004()">Back</button>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm"   style="float: center; " onclick="myFunction42()">Next</button><br><hr>
            </div>
			<div class="card-body" id = "comment" style="display:none" align="center" >
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Comments</label>
	<div class="form-group">
					
                     <textarea name="mytxtarea"  style="border:0;"class="editbox"id="editbox" required></textarea>  
					</div>
                      </div>
                      
                      <hr>                             
					<button type="button" class="btn btn-success dropdown-toggle btn-sm" id = "back" style="float: left;" onclick="myFunction005()">Back</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;	<input type="checkbox" name="confirmation"  id="confirmation"  onclick="activation()" required>	
						<span style="color:red">Do you want to save information ?</span>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm" id = "view" style="float: center;">View</button>
					<br><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="bigbutton" name="bigbutton" type="submit" value="Save" style="display:none" /><hr>
            </div>
              </div>
            </div>
                  </form>

          </div>
        </div> </div> </div> </div>
		
<style type="text/css">
			.reqError{
				color: #ff0000; /*Red Color*/
				font-weight: bold;
			}
		</style>
		<script>
function activation(){
var check = document.getElementById('confirmation');
var btn = document.getElementById('bigbutton');	
var view = document.getElementById('view');	
var back = document.getElementById('back');	
if(check.checked){
btn.style.display='inline';	
back.style.display='none';	
view.style.display='none';	
}
else{
btn.style.display='none';	
back.style.display='inline';	
view.style.display='inline';
}
}
function getDistrict(val) {
	$.ajax({
	type: "POST",
	url: "getDistrict.php",
	data:'disrict_id='+val,
	success: function(data){
		$("#disrict_liste").html(data);
		getSector();

	}
	});
}
function getDistrict1(val) {
	$.ajax({
	type: "POST",
	url: "getDistrict1.php",
	data:'disrict_id1='+val,
	success: function(data){
		$("#disrict_liste1").html(data);
		getSector();

	}
	});
}

function getSector(val) {
	$.ajax({
	type: "POST",
	url: "getSector.php",
	data:'sector_id='+val,
	success: function(data){
		$("#sector_list").html(data);
				getCell();

	}
	});
}
function getSector1(val) {
	$.ajax({
	type: "POST",
	url: "getSector1.php",
	data:'sector_id1='+val,
	success: function(data){
		$("#sector_list1").html(data);
				getCell();

	}
	});
}
function getCell(val) {
	$.ajax({
	type: "POST",
	url: "getCell.php",
	data:'cell_id='+val,
	success: function(data){
		$("#cell_list").html(data);
	}
	});
}
function getCell1(val) {
	$.ajax({
	type: "POST",
	url: "getCell1.php",
	data:'cell_id1='+val,
	success: function(data){
		$("#cell_list1").html(data);
	}
	});
}

</script>
<script type="text/javascript">  
  
 function changetextbox() { 
var selectedvalue = document.getElementById("status").value; 
if (selectedvalue === "noy")  
  
{  
 document.getElementById("spousename").disabled = '';  
       document.getElementById("spouselastname").disabled = '';  
       document.getElementById("spousetelephone").disabled = ''; 
	   

  
 } else {  
  
       document.getElementById("spousename").disabled = 'true';  
    document.getElementById("spouselastname").disabled = 'true';  
    document.getElementById("spousetelephone").disabled = 'true';     
  
 }
 } </script>
<script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('spouse');
 var mar =document.getElementById('married');
 var divor =document.getElementById('divorced');
 var wido =document.getElementById('widowed');
 if(val=='Married'||val=='Divorced'||val=='Widowed'){
	 if(val=='Married'){
   element.style.display='block';
   mar.style.display='block';
   divor.style.display='none';
   wido.style.display='none';

	 }
	 if(val=='Divorced'){
   element.style.display='block';
   divor.style.display='block';
   mar.style.display='none';
     wido.style.display='none';

	 }
     if(val=='Widowed'){
   element.style.display='block';
   wido.style.display='block';
   divor.style.display='none';
   mar.style.display='none';

	 }	 
 }
 else  
   element.style.display='none';
}

</script> 
<script>
function myFunction1() {
  var x1 = document.getElementById("sibling");
  var x2 = document.getElementById("personalinfo");
  if (x1.style.display === "none") {
    x1.style.display = "block";
	x2.style.display = "none";

  } else {
    x1.style.display = "none";
  }
}
function myFunction2() {
  var x112 = document.getElementById("employmentinfo");
  var x212 = document.getElementById("sibling");
  if (x112.style.display === "none") {
    x112.style.display = "block";
	x212.style.display = "none";

  } else {
    x112.style.display = "none";
  }
}

function myFunction222() {
  var x112 = document.getElementById("credithistory");
  var x212 = document.getElementById("employmentinfo");
  if (x112.style.display === "none") {
    x112.style.display = "block";
	x212.style.display = "none";

  } else {
    x112.style.display = "none";
  }
}





function myFunction3() {
  var x113 = document.getElementById("incomes");
  var x213 = document.getElementById("credithistory");
  if (x113.style.display === "none") {
    x113.style.display = "block";
	x213.style.display = "none";

  } else {
    x113.style.display = "none";
  }
}


function myFunction4() {
  var x116 = document.getElementById("attachments");
  var x216 = document.getElementById("incomes");
  if (x116.style.display === "none") {
    x116.style.display = "block";
	x216.style.display = "none";

  } else {
    x116.style.display = "none";
  }
}


function myFunction41() {
  var x116 = document.getElementById("coraterals");
  var x216 = document.getElementById("attachments");
  if (x116.style.display === "none") {
    x116.style.display = "block";
	x216.style.display = "none";

  } else {
    x116.style.display = "none";
  }
}

function myFunction411() {
  var x116 = document.getElementById("refferences");
  var x216 = document.getElementById("coraterals");
  if (x116.style.display === "none") {
    x116.style.display = "block";
	x216.style.display = "none";

  } else {
    x116.style.display = "none";
  }
}
function myFunction42() {
  var x116 = document.getElementById("comment");
  var x216 = document.getElementById("refferences");
  if (x116.style.display === "none") {
    x116.style.display = "block";
	x216.style.display = "none";

  } else {
    x116.style.display = "none";
  }
}
function myFunction() {
  var x11 = document.getElementById("personalinfo");
  var x22 = document.getElementById("sibling");
  if (x11.style.display === "none") {
	x11.style.display = "block";
	x22.style.display = "none";

  } else {
    x22.style.display = "none";
  }
}
function myFunctionb() {
  var x11 = document.getElementById("sibling");
  var x22 = document.getElementById("employmentinfo");
  if (x11.style.display === "none") {
	x11.style.display = "block";
	x22.style.display = "none";

  } else {
    x22.style.display = "none";
  }
}


function myFunction001() {
  var x10 = document.getElementById("employmentinfo");
  var x20 = document.getElementById("credithistory");
  if (x10.style.display === "none") {
	x10.style.display = "block";
	x20.style.display = "none";

  } else {
    x20.style.display = "none";
  }
}
function myFunction002() {
  var x120 = document.getElementById("credithistory");
  var x220 = document.getElementById("employmentinfo");
  if (x120.style.display === "none") {
	x120.style.display = "block";
	x220.style.display = "none";

  } else {
    x220.style.display = "none";
  }
}


function myFunction003() {
  var x120 = document.getElementById("credithistory");
  var x220 = document.getElementById("incomes");
  if (x120.style.display === "none") {
	x120.style.display = "block";
	x220.style.display = "none";

  } else {
    x220.style.display = "none";
  }
}
function myFunction0031() {
  var x120 = document.getElementById("incomes");
  var x220 = document.getElementById("attachments");
  if (x120.style.display === "none") {
	x120.style.display = "block";
	x220.style.display = "none";

  } else {
    x220.style.display = "none";
  }
}
function myFunction00312() {
  var x120 = document.getElementById("attachments");
  var x220 = document.getElementById("coraterals");
  if (x120.style.display === "none") {
	x120.style.display = "block";
	x220.style.display = "none";

  } else {
    x220.style.display = "none";
  }
}
function myFunction004() {
  var x120 = document.getElementById("coraterals");
  var x220 = document.getElementById("refferences");
  if (x120.style.display === "none") {
	x120.style.display = "block";
	x220.style.display = "none";

  } else {
    x220.style.display = "none";
  }
}

function myFunction005() {
  var x120 = document.getElementById("refferences");
  var x220 = document.getElementById("comment");
  if (x120.style.display === "none") {
	x120.style.display = "block";
	x220.style.display = "none";

  } else {
    x220.style.display = "none";
  }
}
</script>

	<style type="text/css">
			.reqError{
				color: #ff0000; /*Red Color*/
				font-weight: bold;
			}
		</style>
		<script type="text/javascript">
			//function to check validation (Required field)
			function checkReqFields(){
				var returnValue;
				var fname=document.getElementById("fname").value;
				var lastname=document.getElementById("lname").value;
				var Telephone=document.getElementById("telephone").value;
				var dob=document.getElementById("datesearch").value;
				var pob=document.getElementById("palcebirth").value;
				var gen=document.getElementById("gender").value;
				var status=document.getElementById("status").value;
				var child=document.getElementById("childr").value;
				var province = document.getElementById('provincelist').value;
				returnValue=true;
				if(fname.trim()==""){
					document.getElementById("reqTxtName").innerHTML="* First Name is required.";
					returnValue=false;
				}
				if(lastname.trim()==""){
					document.getElementById("reqlastname").innerHTML="* Last Name is required.";
					returnValue=false;
				}
				if(gen.trim()==""){
					document.getElementById("reqTxtAddress").innerHTML="* Gender is required.";
					returnValue=false;
				}
				if(Telephone.trim()==""){
					document.getElementById("reqtelephone").innerHTML="* Telephone is required.";
					returnValue=false;
				}
				if(dob.trim()==""){
					document.getElementById("reqdatesearch").innerHTML="* Date of Birth is required.";
					returnValue=false;
				}
				if(pob.trim()==""){
					document.getElementById("reqpalcebirth").innerHTML="* Place of Birth is required.";
					returnValue=false;
				}
				if(status.trim()==""){
					document.getElementById("reqstatus").innerHTML="* Martial Satus is required.";
					returnValue=false;
				}
				if(province.trim()==""){
					document.getElementById("reqProvince").innerHTML="* Province is required.";
					returnValue=false;
				}
				
			else{
				myFunction1();
				 var xfafaloand = document.getElementById("fafaloand1");
				  	xfafaloand.style.display = "block";


				}			
				}
		</script>
		<script>
            jQuery(document).ready(function() {
                jQuery("#submit").click(function(e) {
                    var sen_email = jQuery('.sen_email').val();
                    var rec_email = jQuery('.rec_email').val();
                    if (sen_email == "") {
                        alert('Sender\'s Email Address cannot be empty.');
                         e.preventDefault();
                    }
                    if (rec_email == "") {
                        alert('Receiver\'s Email Address cannot be empty.');
                         e.preventDefault();
                    }
                   /* var attach = jQuery('#first_attach').val();
                    if (attach == "") {
                        alert('Atleast one attachment is required!!!');
                        e.preventDefault();
                    }*/
                    
                });
                // Code for creating more attachment file
                // Maximum attachment allowed
                var max_fields = 11;
                //Fields wrapper
                var wrapper = $(".input_fields_wrap");
                // Add button ID
                var add_button = $(".add_field_button");
                // Initlal attachment field count
                var x = 1;

                // Add attachment field on per click
                $(add_button).click(function(e) {
                    e.preventDefault();
                    // Max attachment allowed
                    if (x < max_fields) {
                        // Attachment increment
                        x++;
						y = x-1;
                        $(wrapper).append('<div style = " margin-left:85px"><input type="file" name="attachment' + x + '"/><a href="#" class="remove_field"  style="color:red;"><img src="img/delattach.png.png" width="15" height="15"/><strong> Remove File'+y+'</strong></a></div>'); //add attachment
                        if (x == max_fields) {
                            // Hide add more attachment link
                            $(".add_field_button").hide();
                        }
						
                    }

                });
                // Remove attachment on per click
                $(wrapper).on("click", ".remove_field", function(e) { //user click on to remove attachment
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;

                    if (x < max_fields) {
                        // Show add more attachment link when field < max_fields
                        $(".add_field_button").show();
                    }
                })
            });
        </script>
		 <script src="jquery-1.5.js"></script>
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
	   <script type="text/javascript">
        function SelectedTextValue(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("txtContent").value = selectedText;
				document.getElementById("txtContent1").value = "";
				document.getElementById("txtContent2").value = "";
				document.getElementById("txtContent3").value = "";
            }
            else {
                document.getElementById("txtContent").value = "";
				document.getElementById("txtContent1").value = "";
				document.getElementById("txtContent2").value = "";
				document.getElementById("txtContent3").value = "";

            }
        }
    </script>
	
	   <script type="text/javascript">
        function sSelectedTextValue(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("ttxtContent").value = selectedText;
				document.getElementById("ttxtContent1").value = "";
				document.getElementById("ttxtContent2").value = "";
				document.getElementById("ttxtContent3").value = "";
            }
            else {
                document.getElementById("ttxtContent").value = "";
				document.getElementById("ttxtContent1").value = "";
				document.getElementById("ttxtContent2").value = "";
				document.getElementById("ttxtContent3").value = "";

            }
        }
    </script>
	   <script type="text/javascript">
        function SelectedTextValue1(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("txtContent1").value = selectedText;
				document.getElementById("txtContent2").value = "";
				document.getElementById("txtContent3").value = "";
            }
            else {
                document.getElementById("txtContent1").value = "";
				document.getElementById("txtContent2").value = "";
				document.getElementById("txtContent3").value = "";
            }
        }
    </script>

	   <script type="text/javascript">
        function sSelectedTextValue1(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("ttxtContent1").value = selectedText;
				document.getElementById("ttxtContent2").value = "";
				document.getElementById("ttxtContent3").value = "";
            }
            else {
                document.getElementById("ttxtContent1").value = "";
				document.getElementById("ttxtContent2").value = "";
				document.getElementById("ttxtContent3").value = "";
            }
        }
    </script>
	   <script type="text/javascript">
        function SelectedTextValue2(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("txtContent2").value = selectedText;
				document.getElementById("txtContent3").value = "";

            }
            else {
                document.getElementById("txtContent2").value = "";
				document.getElementById("txtContent3").value = "";

            }
        }
    </script>
	   <script type="text/javascript">
        function sSelectedTextValue2(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("ttxtContent2").value = selectedText;
				document.getElementById("ttxtContent3").value = "";

            }
            else {
                document.getElementById("ttxtContent2").value = "";
				document.getElementById("ttxtContent3").value = "";

            }
        }
    </script>
	   <script type="text/javascript">
        function SelectedTextValue3(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("txtContent3").value = selectedText;
            }
            else {
                document.getElementById("txtContent3").value = "";
            }
        }
    </script>
	   <script type="text/javascript">
        function sSelectedTextValue3(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("ttxtContent3").value = selectedText;
            }
            else {
                document.getElementById("ttxtContent3").value = "";
            }
        }
    </script>

<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
      $('#add3').click(function(){  
           i++;  
           $('#dynamic_field3').append('<tr id="row'+i+'" class="dynamic-added"><td align="center"><input type="text" name="corateral[]" placeholder="Corateral Amount" id="firstNumber" onkeyup="format(this)" style="width: 35%;  padding: 12px 20px; margin: 8px 0;border-color:black"required /></td><td><select class="form-control" name="typecorateral[]" style="width: 40%;border-color:black" required><option value=""> Corateral Type</option><option value="Building">Building</option><option value="Land">Land</option><option value="Furniture">Furniture</option></td> <td><input name="files[]" type="file"/></td>  <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X Remove</button></td></tr>');  
      });
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                  	i=1;
                  	$('.dynamic-added').remove();
                  	$('#add_name')[0].reset();
    				        alert('Record Inserted Successfully.');
                }  
           });  
      });
    });  

</script>
	
<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
      $('#add2').click(function(){  
           i++;  
           $('#dynamic_field2').append('<tr id="row'+i+'" class="dynamic-added"><td align="center"><input type="text" name="incomeamount[]" id="firstNumber" onkeyup="format(this)" placeholder="Income Amount" style="width: 35%;  padding: 12px 20px; margin: 8px 0;border-color:black" required /></td><td><select class="form-control" name="typeincome[]" style="width: 40%; border-color:black"  required><option value="">Income Type</option><option value="Montly Salary">Montly Salary</option><option value="Commercial Activities">Commercial Activities</option><option value="Additional Activity">Additional Activity</option><option value="Grant">Grant</option></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X Remove</button></td></tr>');  
      });
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                  	i=1;
                  	$('.dynamic-added').remove();
                  	$('#add_name')[0].reset();
    				        alert('Record Inserted Successfully.');
                }  
           });  
      });
    });  

</script>


	<script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "/addmore.php";
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"> <td>dfgdgfdgfdgfdgd</td></tr><tr id="row'+i+'" class="dynamic-added"><td><select class="form-control" name="type[]" style="border-color:black" required><option value="">Sibling</option><option value="Wife">Wife</option><option value="Husband">Husband</option><option value="Parent">Parent</option><option value="Brother">Brother</option><option value="Sister">Sister</option><option value="Other">Other</option></td> <td><input type="text" name="fname[]" placeholder="Sibling First Name" class="form-control name_list" required /></td><td><input type="text" name="lname[]" placeholder="Sibling Last Name" class="form-control name_list"  size="35"required /></td> <td><input type="text" name="sblidnumber[]" placeholder="Sibling ID No" class="form-control name_list" required/></td><td><input type="text" name="siblingtelephone[]" placeholder="Sibling Telephone" class="form-control name_list" required/></td><td><input type="text" name="address[]" placeholder="Sibling Address" class="form-control name_list" required/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X Remove</button></td></tr>');  
      });
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                  	i=1;
                  	$('.dynamic-added').remove();
                  	$('#add_name')[0].reset();
    				        alert('Record Inserted Successfully.');
                }  
           });  
      });
    });  

</script>

<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
      $('#add1').click(function(){  
           i++;  
           $('#dynamic_field1').append('<tr id="row'+i+'" class="dynamic-added"><td align="center"><input type="text" name="amountcrhist[]"  id="firstNumber" onkeyup="format(this)" placeholder="Amount Borrowed" style="width: 35%;  padding: 12px 20px; margin: 8px 0;border-color:black" required /></td><td><select class="form-control" name="typepymt[]" style="width: 45%; border-color:black" required><option value=""> Payment Type</option><option value="Very Good">Very Good</option><option value="Good">Good</option><option value="Moderate">Moderate</option><option value="Very Bad">Very Bad</option></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X Remove</button></td></tr>');  
      });
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                  	i=1;
                  	$('.dynamic-added').remove();
                  	$('#add_name')[0].reset();
    				        alert('Record Inserted Successfully.');
                }  
           });  
      });
    });  

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
