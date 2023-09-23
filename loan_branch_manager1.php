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
 
 <?php
error_reporting(0);
session_start();
$account = $_SESSION['account'];

$idtrack = $_GET['idtrack'];
$_SESSION['idtrack'] = $idtrack;
 $connect = mysql_connect("localhost","root","%9,l6rTDZ=k1"); 
mysql_select_db("dirskhpe_rangiro",$connect);
  
 $attcmt=mysql_query( "SELECT * from myfiles  WHERE loan_id = $idtrack");
 $num_rowsatt = mysql_num_rows($attcmt);

 $details = mysql_query("select * from loan_details WHERE loan_tracknumber = $idtrack");
while ($rowval = mysql_fetch_array($details)) {
$tracknumber = $rowval['loan_tracknumber'];	
$account = $rowval['loan_account'];	
$loan_amount = $rowval['loan_amount'];	
$term = $rowval['loan_term'];
$branch = $rowval['branch'];
}

 $personal = mysql_query("select * from loan_personalinfo WHERE loan_id = $idtrack");
while ($rowper = mysql_fetch_array($personal)) {
$firstname = $rowper['first_name'];	
$lastname = $rowper['last_name'];	
$telephone = $rowper['telephone'];	
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
$employment = mysql_query("select * from loan_applicant_employer WHERE loan_id = $idtrack");
while ($rowemp = mysql_fetch_array($employment)) {
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

$history = mysql_query("select * from credit_history WHERE loan_id = $idtrack");
while ($rowhist= mysql_fetch_array($history)) {
	$lastamount  = $rowhist['Amount'];
	$last_payment = $rowhist['last_payment'];
	$type = $rowhist['type'];
	}
	

$refference = mysql_query("select * from applicanr_refference WHERE loan_id = $idtrack");
while ($rowref= mysql_fetch_array($refference)) {
	$refname1  = $rowref['reff_name1'];
	$refadd1 = $rowref['reff_address1'];
	$refphone1 = $rowref['reff_telephone1'];
	$refname2  = $rowref['reff_name2'];
	$refadd2= $rowref['reff_address2'];
	$refphone2 = $rowref['reff_telephone2'];
	$refname3  = $rowref['reff_name3'];
	$refadd3= $rowref['reff_address3'];
	$refphone3 = $rowref['reff_telephone3'];
	}
 $commercomm = mysql_query("select * from loan_comments WHERE loan_id = $idtrack ORDER BY comment_id DESC");
while ($rowcomm= mysql_fetch_array($commercomm)) {
	$commercialcomments  = $rowcomm['comment'];
	}
	
	
$score = mysql_query("SELECT  * FROM score_table where track_number = '$idtrack'" );
while($rowscore = mysql_fetch_array($score)){
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
 ?>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="#">
          <img src="images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="img/qloan.png" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item active">
            <a href="#" class="nav-link">
              <i class="mdi mdi-elevation-rise"></i>Reports</a>
          </li>
          <li class="nav-item active">
            <a href="#" class="nav-link">
              <i class="mdi mdi-elevation-rise"></i><strong>Score</strong></a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
         
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text"><strong>Hello, <?php echo  $fname.'&nbsp;&nbsp;&nbsp;&nbsp;'.$lname?>!</strong></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
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
              <a class="dropdown-item mt-2">
                Manage Account
              </a>
              
              <a class="dropdown-item">
                Check My Evaluation
              </a>
              <a href="logout" class="dropdown-item">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
       
      </div>
	  
    </nav>
	
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li>
              
              <button class="button">Application Review </button>
               
          </li>
          <li class="nav-item">
            <div class="nav-link" href="#">
              <span class="menu-title"><strong>Commercial Officer</strong></span>   
            </div>
          </li>
		  <li class="nav-item" onclick="document.getElementById('attachments').style.display = 'none';document.getElementById('refferences').style.display = 'none';document.getElementById('personalinfo').style.display = 'block';document.getElementById('employmentinfo').style.display = 'none';document.getElementById('credithistory').style.display = 'none'; document.getElementById('incomes').style.display = 'none';document.getElementById('comment').style.display = 'none';">
           <div class="nav-link" href="#">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand1"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Credit Manager</strong></span>   
            </div>
          </li>
		  <li class="nav-item" onclick="document.getElementById('attachments').style.display = 'none';document.getElementById('refferences').style.display = 'none';document.getElementById('personalinfo').style.display = 'none';document.getElementById('employmentinfo').style.display = 'block';document.getElementById('credithistory').style.display = 'none'; document.getElementById('incomes').style.display = 'none';document.getElementById('comment').style.display = 'none';">
           <div class="nav-link" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="ui-basic">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Branch Manager</strong></span>
            </div>
            
          </li>
		
		  <li class="nav-item" onclick="document.getElementById('attachments').style.display = 'none';document.getElementById('refferences').style.display = 'block';document.getElementById('personalinfo').style.display = 'none';document.getElementById('employmentinfo').style.display = 'none';document.getElementById('credithistory').style.display = 'none'; document.getElementById('incomes').style.display = 'none';document.getElementById('comment').style.display = 'none';">
            <div class="nav-link" href="#">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Head Office</strong></span>   
            </div>
          </li>
		  <li class="nav-item" onclick="document.getElementById('attachments').style.display = 'none';document.getElementById('refferences').style.display = 'block';document.getElementById('personalinfo').style.display = 'none';document.getElementById('employmentinfo').style.display = 'none';document.getElementById('credithistory').style.display = 'none'; document.getElementById('incomes').style.display = 'none';document.getElementById('comment').style.display = 'none';">
            <div class="nav-link" href="#">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Advance Salary</strong></span>   
            </div>
          </li>
		  <li class="nav-item" onclick="document.getElementById('attachments').style.display = 'none';document.getElementById('refferences').style.display = 'block';document.getElementById('personalinfo').style.display = 'none';document.getElementById('employmentinfo').style.display = 'none';document.getElementById('credithistory').style.display = 'none'; document.getElementById('incomes').style.display = 'none';document.getElementById('comment').style.display = 'none';">
            <div class="nav-link" href="#">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Commercial loan</strong></span>   
            </div>
          </li>		  <li class="nav-item" onclick="document.getElementById('attachments').style.display = 'none';document.getElementById('refferences').style.display = 'block';document.getElementById('personalinfo').style.display = 'none';document.getElementById('employmentinfo').style.display = 'none';document.getElementById('credithistory').style.display = 'none'; document.getElementById('incomes').style.display = 'none';document.getElementById('comment').style.display = 'none';">
            <div class="nav-link" href="#">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Investment Loan</strong></span>   
            </div>
          </li>	
 <li class="nav-item" onclick="document.getElementById('attachments').style.display = 'none';document.getElementById('refferences').style.display = 'block';document.getElementById('personalinfo').style.display = 'none';document.getElementById('employmentinfo').style.display = 'none';document.getElementById('credithistory').style.display = 'none'; document.getElementById('incomes').style.display = 'none';document.getElementById('comment').style.display = 'none';">
            <div class="nav-link" href="#">
              &nbsp;<i class="fa fa-check-circle" style="font-size:18px;color:green;display:none" id ="fafaloand"></i>&nbsp;&nbsp;
              <span class="menu-title"><strong>Statistics</strong></span>   
            </div>
          </li>				  
        </ul>
      </nav>
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
										
											
											

											<div id="faq-list-1" class="panel-group accordion-style1 accordion-style2">
												<div class="panel panel-default">
													
												          <table><tr><td><img src="img/profile_avatar.png" style="float:left;width:250px;height:250px; border-radius: 50%;padding: 20px 40px;  margin: 10px;" /></td><td>

				
				<br><span><strong>Account Number :</strong></span>&nbsp;&nbsp;<?php echo $account;?>
				<br><span><strong>Account Name :</strong>&nbsp;&nbsp;<?php echo $firstname;?>&nbsp;&nbsp;<?php echo $lastname;?>
				<br><span><strong>Track Number  :</strong>&nbsp;&nbsp;<?php echo $tracknumber;?>
				<br><span><strong>Branch  :</strong>&nbsp;&nbsp;<?php echo $branch;?>
				<br><span><strong>Amount  :</strong>&nbsp;&nbsp;<?php echo $loan_amount;?>
				<br><span><strong>Term  :</strong>&nbsp;&nbsp;<?php echo $term*12.;?> Months
				
				
</td></tr>

</table>
<hr>
<table align="center">
<tr><th></th><th><span><strong><h4 align='center'><STRONG> Personal Information</STRONG></h4></strong></th><tr>
<tr><td></td><td><span><strong>Names  :</strong></span>&nbsp;&nbsp;<?php echo $firstname;?>&nbsp;&nbsp;<?php echo $lastname;?></td><tr>
<tr><td></td><td><span><strong>Telephone Number :</strong></span>&nbsp;&nbsp;<?php echo $telephone;?></td><tr>
<tr><td></td><td><span><strong>Date of Birth :</strong></span>&nbsp;&nbsp;<?php echo $dob;?></td><tr>
<tr><td></td><td><span><strong>Place of Birth:</strong></span>&nbsp;&nbsp;<?php echo $placebirth;?></td><tr>
<tr><td></td><td><span><strong>Gender :</strong></span>&nbsp;&nbsp;<?php echo $gender;?></td><tr>
<tr><td></td><td><span><strong>Martial Status :</strong></span>&nbsp;&nbsp;<?php echo $status;?></td><tr>
</table><hr>
<table align="center">
<tr><th></th><th><span><strong><h4 align='center'> <STRONG>Siblings</STRONG></h4></strong></th><tr>

<tr><td></td><td><span><strong>Relationship :</strong></span>&nbsp;&nbsp;<?php echo $status;?></td><tr>
<tr><td></td><td><span><strong>Sibling's Names  :</strong></span>&nbsp;&nbsp;<?php echo $siblfirstname;?>&nbsp;&nbsp;<?php echo $sibllastname;?></td><tr>
<tr><td></td><td><span><strong>Sibling's Telephone Number :</strong></span>&nbsp;&nbsp;<?php echo $sibltele;?></td><tr>
<tr><td></td><td><span><strong>Sibling's Date of Birth :</strong></span>&nbsp;&nbsp;<?php echo $siblid;?></td><tr>
<tr><td></td><td><span><strong>Sibling's Place of Birth:</strong></span>&nbsp;&nbsp;<?php echo '';?><tr>
</table><hr>
<table align="center">
<tr><th></th><th><span><strong><h4 align='center'><STRONG> Currrent Address</STRONG></h4></strong></th><tr>

<tr><td></td><td><span><strong>Province :</strong></span>&nbsp;&nbsp;<?php echo $province;?></td><tr>
<tr><td></td><td><span><strong>District  :</strong></span>&nbsp;&nbsp;<?php echo $district;?></td><tr>
<tr><td></td><td><span><strong>Sector :</strong></span>&nbsp;&nbsp;<?php echo $sector;?></td><tr>
<tr><td></td><td><span><strong>cell :</strong></span>&nbsp;&nbsp;<?php echo $cell;?></td><tr>
<tr><td></td><td><span><strong>Village:</strong></span>&nbsp;&nbsp;<?php echo $village;?><tr>
</table><hr>
<table align="center">
<tr><th></th><th><span><strong><h4 align='center'><STRONG> Employment</STRONG></h4></strong></th><tr>

<tr><td></td><td><span><strong>Employer :</strong></span>&nbsp;&nbsp;<?php echo $employer;?></td><tr>
<tr><td></td><td><span><strong>Employer's Activity :</strong></span>&nbsp;&nbsp;<?php echo $empactivity;?></td><tr>
<tr><td></td><td><span><strong>Employer's Telephone  :</strong></span>&nbsp;&nbsp;<?php echo $emptelephone;?></td><tr>
<tr><td></td><td><span><strong>Job Position  :</strong></span>&nbsp;&nbsp;<?php echo $empposition;?></td><tr>
<tr><td></td><td><span><strong>Province :</strong></span>&nbsp;&nbsp;<?php echo $empprovince;?></td><tr>
<tr><td></td><td><span><strong>District :</strong></span>&nbsp;&nbsp;<?php echo $empdistrict;?></td><tr>
<tr><td></td><td><span><strong>Sector:</strong></span>&nbsp;&nbsp;<?php echo $empsector;?><tr>
<tr><td></td><td><span><strong>Cell:</strong></span>&nbsp;&nbsp;<?php echo $empcell;?><tr>
<tr><td></td><td><span><strong>Village:</strong></span>&nbsp;&nbsp;<?php echo $empvillage;?><tr>
</table><hr>
<table align="center">
<tr><th></th><th><span><strong><h4 align='center'><STRONG> Payment History</STRONG></h4></strong></th><tr>

<tr><td></td><td><span><strong>Amount :</strong></span>&nbsp;&nbsp;<?php echo $lastamount;?></td><tr>
<tr><td></td><td><span><strong>Payement</span>&nbsp;&nbsp;<?php echo $last_payment;?></td><tr>
<tr><td></td><td><span><strong>Category  :</strong></span>&nbsp;&nbsp;<?php echo $type;?></td><tr>
</table><hr>
<table align="center">
<tr><th></th><th><span><strong><h4 align='center'> <STRONG>Incomes</STRONG></h4></strong></th><tr>

<tr><td></td><td><span><strong>Amount :</strong></span>&nbsp;&nbsp;<?php echo $lastamount;?></td><tr>
<tr><td></td><td><span><strong>Payement</span>&nbsp;&nbsp;<?php echo $last_payment;?></td><tr>
<tr><td></td><td><span><strong>Category  :</strong></span>&nbsp;&nbsp;<?php echo $type;?></td><tr>
</table><hr>
<span id="atta" style="background-color: #fff; border: none;color: #667482;padding: 0px 0px;text-align: left;text-decoration: none;font-size: 16px;margin: 0px 0px;cursor: pointer;"><strong>Attachments[<?php echo $num_rowsatt;?>]</strong></span>

 <div id="attchmt">
	 <table>
	 <?php
	 

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $attcmt )) {
                $num++;
                // echo out the contents of each row into a table
              $filename = $row['file_name'];
                ?><tr><td><img src="img/attACHMENT.png" width="15" height="15"/></td>
				<td><a href="/qloan/files/sdjklnkjbnkbsfs$#hgsd/<?=$filename ;?>"><?=$filename ;?></a></td>
			<?php
		 } 
		 echo '</tr></table>';
        // close table>
        
?>               </div><hr>

<table align="center">
<tr><th></th><th><span><strong><h4 align='center'><STRONG> Refferences</STRONG></h4></strong></th><tr>

<tr><th>No</th><th>Names</th><th><span>Addres</th><th><span>Telephones</th><tr>
<tr><td>1</th><td><?php echo $refname1;?></td><td><?php echo $refadd1;?></td><td><?php echo $refphone1;?></td><tr>
<tr><td>2</th><td><?php echo $refname2;?></td><td><?php echo $refadd2;?></td><td><?php echo $refphone2;?></td><tr>
<tr><td>3</th><td><?php echo $refname3;?></td><td><?php echo $refadd3;?></td><td><?php echo $refphone3;?></td><tr>
</table><hr>

<table align="center">
<strong><h4 align='left'><STRONG>  Comments </STRONG></h4>


<tr><td>
<?php
$commercomm = mysql_query("select comment,time_comment,First_Nmae,lname,role  from loan_comments JOIN users_table ON users_table.id = loan_comments.commentetor WHERE loan_id = $idtrack ORDER BY comment_id DESC"  );
while ($row = mysql_fetch_array($commercomm)) {
		 ?> <strong>Commented By:&nbsp;&nbsp;<?php echo $row['First_Nmae'];?>&nbsp;&nbsp;<?php echo $row['lname'];?> &nbsp;&nbsp;[<?php echo $row['role'];?>] ON &nbsp;&nbsp;<?php echo $row['time_comment'];?></strong><br>
		  <?php echo $row['comment'];?><hr>
	   
	   <?php
	   }
	   ?></td><tr>
</table><hr>

<table align="center">
 
 <?php
error_reporting(0);
session_start();
$account = $_SESSION['account'];

$idtrack = $_GET['idtrack'];
$_SESSION['idtrack'] = $idtrack;
 $connect = mysql_connect("localhost","root","%9,l6rTDZ=k1"); 
mysql_select_db("dirskhpe_rangiro",$connect);
  
 	
$score = mysql_query("SELECT  * FROM score_table where track_number = '$idtrack'" );
while($rowscore = mysql_fetch_array($score)){
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
 ?>

							
					
	          <div class="content-wrapper">

	
<strong><h4 align='left'><STRONG>  Q-Loan Scored  &nbsp;&nbsp; <?php echo $totscoreperc;?>% </STRONG></h4>

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
  ?>
</div><button type="button" class="btn btn-success dropdown-toggle btn-sm" id = "view" style="float: center; margin-left: 3%;" onClick=window.open("details","Ratting","width=450,height=500,left=450,top=380,toolbar=0,status=0,"); accesskey="1">Score Details</button>
<hr>   

   </div>
          </div>
		  <ul>
  
       					<button type="button" class="btn btn-success dropdown-toggle btn-sm" id = "view" style="float: center; margin-left: 3%;" onClick=window.open("comments","Ratting","width=800,height=500,left=450,top=80,toolbar=0,status=0,"); accesskey="1">Comment</button>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                           </div>
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