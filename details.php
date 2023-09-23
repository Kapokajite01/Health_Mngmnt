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
							<table  size = "100%">
									<tr><th> Item</th> <th>Score</th></tr>	
										<?php
										error_reporting(0);
session_start();
$track = $_SESSION['idtrack'];
 $average = $_SESSION['average'];
 $hqaverage = $_SESSION['hqaverage'] ;
 $ovaverage = $_SESSION['ovaverage'];
include'mydb_connection/my_dbconnection.php';
include('mydb_connection/my_connect_db.php');
$details = "SELECT * from score_table WHERE track_number = '$track'";
if ($details=mysqli_query($con,$details))
  {
	  while ($rowval = mysqli_fetch_row($details)) {
	echo '<tr><td><strong>Contract Duration</strong></td><td style="padding: 8px;">'.$rowval['2'].'</td></tr>';
	echo '<tr><td><strong>Previous LOan Contacted</strong></td><td  style="padding: 8px;">'.$rowval['3'].'</td></tr>';
	echo '<tr><td><strong>Duration in the Bank</strong></td><td  style="padding: 8px;">'.$rowval['4'].'</td></tr>';
	echo '<tr><td><strong>Age</strong></td><td  style="padding: 8px;">'.$rowval['6'].'</td></tr>';
	echo '<tr><td><strong>Gender</strong></td><td  style="padding: 8px;">'.$rowval['7'].'</td></tr>';
	echo '<tr><td><strong>Martial Status</strong></td><td  style="padding: 8px;">'.$rowval['8'].'</td></tr>';
	echo '<tr><td><strong>Employment Stability</strong></td><td  style="padding: 8px;">'.$rowval['9'].'</td></tr>';
$total = $rowval['2']+$rowval['3']+$rowval['4']+$rowval['6']+$rowval['7']+$rowval['8']+$rowval['9'];
}
}
 ?>
<tr><th>Qloan Score</th><th><?php echo round($total/7);?>%</th></tr>								
<tr><th>Credit Comittee Score</th><th><?php echo $average ;?>%</th></tr>									
<tr><th>Head Office Comittee Score</th><th><?php echo $hqaverage;?>%</th></tr>								
<tr><th>Overall Score</th><th><?php echo $ovaverage;?>%</th></tr></table>
</div>
</div>
			</div>
												