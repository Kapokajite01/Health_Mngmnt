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

<!--===============================================================================================-->
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
$_SESSION['redirect'] = '';
include('mydb_connection/my_connect_db.php');
include'mydb_connection/my_dbconnection.php';
$track =rand();
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
$resultwait= "SELECT DISTINCT loan_id FROM loan_details where loan_status = 'Approved'  and contract_print = 'Contract printed'";
if ($resultwait=mysqli_query($con,$resultwait))
  {
$numrowapp1= mysqli_num_rows($resultwait);
  }  
$resultdeny = "SELECT DISTINCT loan_id FROM loan_details where loan_status = 'Deny'";
if ($resultdeny=mysqli_query($con,$resultdeny))
  {
$numrowdeny= mysqli_num_rows($resultdeny);
  }
  $key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
 
function my_encrypt($data, $key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}
?>
<?php include'left_commercial.php';?><br><br>
						<div class="tabbable">
										
											
											

											<div id="faq-list-1" class="panel-group accordion-style1 accordion-style2">
												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-1-1" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed" style="background-color: #1abc9c">
															<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>
                                                       <h5><i><strong>Waiting for Approval  &nbsp;&nbsp;<?php if ($num_rows>0){echo '<strong><font color="tomato">['. $num_rows.']</font></strong>';}else{echo '<strong>['. $num_rows.']</strong>'; }?></strong></i></h5>
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-1-1">
							<table id='blueTable' class='table table-striped  table-hover' >
                

				<?php

$results = "SELECT 	first_name,last_name,loan_details.loan_id,loan_details.loan_account,loan_details.loan_amount,loan_details.loan_type,loan_details.loan_status,loan_details.branch,loan_details.time_application,loan_details.loan_term_type,loan_details.loan_term_number,loan_details.loan_interest,loan_details.branch,loan_details.loan_tracknumber  FROM loan_details JOIN  loan_personalinfo ON loan_details.loan_tracknumber= loan_personalinfo.loan_id where loan_status ='' AND loan_status != 'Closed' order by time_application";
if ($results=mysqli_query($con,$results))
  {
echo "<thead class=''thead-dark'><tr><th ><strong>No</th><th><strong> Names </th><th><strong>Account Number</th><th><strong>Loan Type</th><th><strong>Amount</th><th><strong>Term</th><th><strong>Rate</th><th><strong>Branch</th><th><strong>Attachments</th><th><strong>Time Application</th><th><strong>Q-Loan Score</th><th><strong>view</th></tr></thead>";
				for($i == 0 ; $i<=2; $i++){ 
					while ($Row = mysqli_fetch_row($results)){
					
					$track = $Row[13];
	
?>
    <tr>
	<td> <strong><?php echo ++$i;?></td>
	<td><strong> <?php echo $Row[0] ?></strong></td>
	<td> <?php echo  $Row[3];?> </td>
	<td> <?php echo  $Row[5];?> </td>
	<td><strong> <?php echo  number_format($Row[4]);?> </strong></td>
	<td> <?php echo  $Row[10].'&nbsp'.$Row[9];?>(s)</td>
	<td> <?php echo  $Row[11];?>%</td>
	<td> <?php echo  $Row[12];?></td>
	<td> <?php 
	$attachments = "SELECT  loan_id FROM myfiles where loan_id = $track";
if ($attachments=mysqli_query($con,$attachments))
  {
$num_attac = mysqli_num_rows($attachments);
  }
	echo $num_attac;
	?>
	 File(s)</td>
	<?php echo 	"<td> $Row[8]</td>";?>
	<td>
		<?php 
		$score = "SELECT  * FROM score_table where track_number = '$track'";
		$totscoreperc=0;
		if ($score=mysqli_query($con,$score))
  {
		while($rowscore = mysqli_fetch_row($score)){
			$sduration= $rowscore[2];
			$shistory= $rowscore[3];
			$scustduration= $rowscore[4];
			$sage= $rowscore[6];
			$sgender= $rowscore[7];
			$sstatus= $rowscore[8];
			$sactivity= $rowscore[9];
			$totscore = $sduration+$shistory+$scustduration+$sage+$sgender+$sstatus+$sactivity;
			$totscoreperc = $totscore/7;
			$totscoreperc = $totscoreperc/3;
			$totscoreperc = round ($totscoreperc);
		}
  }
		?>
		

<span><strong>Scored &nbsp;&nbsp; <?php echo $totscoreperc;?>%</strong></span>

<div class="progress">
   <?php 
   
   if($totscoreperc <50){
   
   echo "<div class='progress-bar progress-bar-danger  progress-bar-striped' role='progressbar'
  aria-valuenow=$totscoreperc aria-valuemin='0' aria-valuemax='100' style='width:$totscoreperc%'>
    
  </div>";
   }
if($totscoreperc1 == 0){
   
   echo "<div class='progress-bar progress-bar-danger  progress-bar-striped' role='progressbar'
  aria-valuenow=0 aria-valuemin='0' aria-valuemax='100' style='width:0%'>
    
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
</div>
	</td>

<td><strong><a class="label label-sm label-success" href="loan_commercial?be449d079b4596e7=<?php 
$token = $Row[13];
$cipher_method = 'aes-128-ctr';
  $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
  $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));
  $crypted_token = openssl_encrypt($token, $cipher_method, $enc_key, 0, $enc_iv) . "0YdDR6[sFLhd" . bin2hex($enc_iv);
  unset($token, $cipher_method, $enc_key, $enc_iv);
echo $crypted_token;




?>"<img src="images/mycommentt.jpg"  width="10" height="10" border="0"  />View</a></td></tr>
	<?php
}
mysqli_free_result($results);
}


}
 

echo"</table>"; 
 ?>	
		
		</div>
			</div>
												
												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-1-2" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed" >
															<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

															<h5><i><strong>For Review by Credit Board &nbsp;&nbsp;<?php if ($numrowscm>0){echo '<strong><font color="tomato">['. $numrowscm.']</font></strong>';}else{echo '<strong>['. $numrowscm.']</strong>'; }?></strong></i></h5>
														</a>
													</div>

													<div class="panel-collapse collapse"  id="faq-1-2">
														<div class="panel-body">
															<div id="faq-list-nested-1" class="panel-group accordion-style1 accordion-style2">
																<div class="panel panel-default">
																	<div class="panel-heading">
															
									                                
							<table id='dynamic-table' class='table table-striped  table-hover'>
                

				<?php

$result11 = "SELECT first_name,last_name,loan_details.loan_id,loan_details.loan_account,loan_details.loan_amount,loan_details.loan_type,loan_details.loan_status,loan_details.branch,loan_details.time_application,loan_details.loan_term_type,loan_details.loan_term_number,loan_details.loan_interest,loan_details.branch,loan_details.loan_tracknumber  FROM loan_details JOIN  loan_personalinfo ON loan_details.loan_tracknumber= loan_personalinfo.loan_id where loan_status ='Sent To Credit Manager' order by time_application ";
echo "<tr><th ><strong>No</th><th><strong> Names</th><th><strong>Account Number</th><th><strong>Loan Type</th><th><strong>Amount</th><th><strong>Term</th><th><strong>Rate</th><th><strong>Branch</th><th><strong>Attachments</th><th><strong>Time Application</th><th><strong>Q-Loan Score</th><th><strong>view</th></tr>";
				if ($result11=mysqli_query($con,$result11))
  {
		while($Row1 = mysqli_fetch_row($result11)){
					$track1 = $Row1[13];
	$password_plain =$Row1[13];
$password_encrypted = my_encrypt($password_plain, $key);
	?>
    <tr>
	<td> <strong><?php echo ++$j;?></td>
<td><strong> <?php echo $Row1[0].'&nbsp;&nbsp;'.$Row1[1] ?></strong></td>
	<td> <?php echo  $Row1[3];?> </td>
	<td> <?php echo  $Row1[5];?> </td>
	<td><strong> <?php echo  number_format($Row1[4]);?> </strong></td>
	<td> <?php echo  $Row1[10].'&nbsp'.$Row1[9];?>(s)</td>
	<td> <?php echo  $Row1[11];?>%</td>
	<td> <?php echo  $Row1[12];?></td>
	<td> <?php 
	$attachments = "SELECT  loan_id FROM myfiles where loan_id = '$track1'";
	if ($attachments=mysqli_query($con,$attachments))
  {
	$num_attac = mysqli_num_rows($attachments);
	  
  }
	echo $num_attac;
	?>
	 File(s)</td>
	
	<?php echo 	"<td> $Row1[8]</td>";?>
<td>
		<?php $score1 = "SELECT  * FROM score_table where track_number = '$track1'";
		$totscoreperc1=0;
		if ($score1=mysqli_query($con,$score1))
  {
		while($rowscore1 = mysqli_fetch_array($score1)){
			$sduration1= $rowscore1['score_duration'];
			$shistory1= $rowscore1['score_hostory'];
			$scustduration1= $rowscore1['score_cust_duration'];
			$sage1= $rowscore1['score_age'];
			$sgender1= $rowscore1['score_gender'];
			$sstatus1= $rowscore1['score_stauts'];
			$sactivity1= $rowscore1['score_activity'];
			$totscore1 = $sduration1+$shistory1+$scustduration1+$sage1+$sgender1+$sstatus1+$sactivity1;
			$totscoreperc1 = $totscore1/7;
			$totscoreperc1 = round ($totscoreperc1);
		}
  }
		?>



	<?php
$board= "SELECT  * FROM users_table WHERE role = 'Credit Committee' OR role = 'Credit Manager'";
 $resultboard = $conn_db->query($board);
if ($resultboard->num_rows > 0) {
	$totdeccredit=0;
	$hqaver =0;
	 $numrowscre= mysqli_num_rows($resultboard);

while($rowboard = $resultboard->fetch_assoc()) {
	$name = $rowboard['First_Nmae'];
	$lname = $rowboard['lname'];
	$uid = $rowboard['id'];
	
	
	$selectdecision = "SELECT *  FROM decisions where decider_id = '$uid' AND loan_id ='$track1'" ;
	$resuldeci = $conn_db->query($selectdecision);
if ($resuldeci->num_rows > 0) {
	
while($rowdecis = $resuldeci->fetch_assoc()) {
	$creditcommitteescore=0;
$cudecision = $rowdecis['decision'];
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
$totdeccredit = $totdeccredit+$creditcommitteescore;
}



}

}
$avecredit = $totdeccredit/$numrowscre;

// SELECT SCORE FOR HQ
$boardhq= "SELECT  * FROM users_table WHERE role = 'Branch Manager' OR role = 'Head Office Committee'";
 $resultboard = $conn_db->query($boardhq);
if ($resultboard->num_rows > 0) {
	$hqscore = 0;
	 $numrowshq= mysqli_num_rows($resultboard);

while($rowboard = $resultboard->fetch_assoc()) {
	$name = $rowboard['First_Nmae'];
	$lname = $rowboard['lname'];
	$uid = $rowboard['id'];
	$hqcommitteescore =0;
	
	
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
$hqscore = $hqscore + $hqcommitteescore;
$hqaver = $hqscore / $numrowshq;
}
}
$overallaverage= ($totscoreperc1 +$avecredit)/3;
$overallaverage = round($overallaverage);



?>
 		
	<span><strong>Scored &nbsp;&nbsp; <?php echo $overallaverage;?>%</strong></span>

<div class="progress">
   <?php 
   
   if($overallaverage <50){
   
   echo "<div class='progress-bar progress-bar-danger  progress-bar-striped' role='progressbar'
  aria-valuenow=$overallaverage aria-valuemin='0' aria-valuemax='100' style='width:$overallaverage%'>
    
  </div>";
   }
if($overallaverage == 0){
   
   echo "<div class='progress-bar progress-bar-danger  progress-bar-striped' role='progressbar'
  aria-valuenow=0 aria-valuemin='0' aria-valuemax='100' style='width:0%'>
    
  </div>";
   }    
if($overallaverage >=50 AND $overallaverage <75){
   
   echo "<div class='progress-bar progress-bar-warning   progress-bar-striped' role='progressbar'
  aria-valuenow=$overallaverage aria-valuemin='0' aria-valuemax='100' style='width:$overallaverage%'>
    
  </div>";
   }  
if($overallaverage >=75){
   
   echo "<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar'
  aria-valuenow=$overallaverage aria-valuemin='0' aria-valuemax='100' style='width:$overallaverage%'>
    
  </div>";
   }     
  ?>
</div>
	
	
	
	</td>
	
	
	
<td><strong><a class="label label-sm label-success" href="loan_ccommercial1?eb803838609d2516b=<?php echo $password_encrypted;?>"<img src="images/mycommentt.jpg"  width="10" height="10" border="0"  />View</a></td></tr>
	<?php
}
}


echo"</table>"; 
 ?>	
																	</div>

																</div>

															</div>
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-1-3" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

															<h5><i><strong>For Approval by Head Office &nbsp;&nbsp;<?php if ($numrowsbm>0){echo '<strong><font color="tomato">['. $numrowsbm.']</font></strong>';}else{echo '<strong>['. $numrowsbm.']</strong>'; }?></strong></i></h5>
														
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-1-3">
														<div class="panel-body">
								
								<table id='dynamic-table' class='table table-striped  table-hover'>
                

				<?php
$result22 = "SELECT first_name,last_name,loan_details.loan_id,loan_details.loan_account,loan_details.loan_amount,loan_details.loan_type,loan_details.loan_status,loan_details.branch,loan_details.time_application,loan_details.loan_term_type,loan_details.loan_term_number,loan_details.loan_interest,loan_details.branch,loan_details.loan_tracknumber  FROM loan_details JOIN  loan_personalinfo ON loan_details.loan_tracknumber= loan_personalinfo.loan_id where loan_status ='Sent To Branch Manager' ORDER BY time_application ";
echo "<tr><th ><strong>No</th><th><strong> Names</th><th><strong>Account Number</th><th><strong>Loan Type</th><th><strong>Amount</th><th><strong>Term</th><th><strong>Rate</th><th><strong>Branch</th><th><strong>Attachments</th><th><strong>Time Application</th><th><strong>Q-Loan Score</th><th><strong>view</th></tr>";
				if ($result22=mysqli_query($con,$result22))
  {
		while($Row2 = mysqli_fetch_row($result22)){
					$track2 = $Row2[13];
	$password_plain2 =$Row2[13];
$encrypted2 = my_encrypt($password_plain2, $key);
	?>
		<td> <strong><?php echo ++$jk;?></td>
	<td><strong> <?php echo $Row2[0].'&nbsp;&nbsp;'.$Row2[1] ?></strong></td>
	<td> <?php echo  $Row2[3];?> </td>
	<td> <?php echo  $Row2[5];?> </td>
	<td><strong> <?php echo  number_format($Row2[4]);?> </strong></td>
	<td> <?php echo  $Row2[10].'&nbsp'.$Row2[9];?>(s)</td>
	<td> <?php echo  $Row2[11];?>%</td>
	<td> <?php echo  $Row2[12];?></td>
	<td> <?php 
	$attachmentss = "SELECT  loan_id FROM myfiles where loan_id = '$track2'";
	if ($attachmentss=mysqli_query($con,$attachmentss))
  {
	$num_attacs = mysqli_num_rows($attachmentss);
	  
  }
	echo $num_attacs;
	?>
	 File(s)</td>
	
	<?php echo 	"<td> $Row2[8]</td>";?>

		<?php $score2 = "SELECT  * FROM score_table where track_number = '$track2'";
		$totscoreperc2=0;
		if ($score2=mysqli_query($con,$score2))
  {
		while($rowscore2 = mysqli_fetch_array($score2)){
			$sduration2= $rowscore2['score_duration'];
			$shistory2= $rowscore2['score_hostory'];
			$scustduration2= $rowscore2['score_cust_duration'];
			$sage2= $rowscore2['score_age'];
			$sgender2= $rowscore2['score_gender'];
			$sstatus2= $rowscore2['score_stauts'];
			$sactivity2= $rowscore2['score_activity'];
			$totscore2 = $sduration2+$shistory2+$scustduration2+$sage2+$sgender2+$sstatus2+$sactivity2;
			$totscoreperc2 = $totscore2/7;
			$totscoreperc2 = round ($totscoreperc2);
		}
  }
		?>

	<td>


	<?php
$board2= "SELECT  * FROM users_table WHERE role = 'Credit Committee' OR role = 'Credit Manager'";
 $resultboard2 = $conn_db->query($board2);
if ($resultboard2->num_rows > 0) {
	$totdeccredit2=0;
	 $numrowscre2= mysqli_num_rows($resultboard2);

while($rowboard2 = $resultboard2->fetch_assoc()) {
	$name = $rowboard2['First_Nmae'];
	$lname = $rowboard2['lname'];
	$uid2 = $rowboard2['id'];
	
	
	$selectdecision2 = "SELECT *  FROM decisions where decider_id = '$uid2' AND loan_id ='$track2'" ;
	$resuldeci2 = $conn_db->query($selectdecision2);
if ($resuldeci2->num_rows > 0) {
	
while($rowdecis2 = $resuldeci2->fetch_assoc()) {
	$creditcommitteescore2=0;
$cudecision2 = $rowdecis2['decision'];
if($cudecision2 == 'Approved'){
$creditcommitteescore2 = $creditcommitteescore2 + 95;
}
if($cudecision2 == 'Pended'){
$creditcommitteescore2 = $creditcommitteescore2 + 55;
}
if($cudecision2 == 'Denied'){
$creditcommitteescore2 = $creditcommitteescore2 + 5;
}
}
$totdeccredit2 = $totdeccredit2+$creditcommitteescore2;
}



}

}
$avecredit2 = $totdeccredit2/$numrowscre2;
$avecredit2 = round($avecredit2);


// SELECT SCORE FOR HQ
$boardhq1= "SELECT  * FROM users_table WHERE role = 'Branch Manager' OR role = 'Head Office Committee'";
 $resultboard1 = $conn_db->query($boardhq1);
if ($resultboard1->num_rows > 0) {
	$hqscore11 = 0;
	 $numrowshq1= mysqli_num_rows($resultboard1);

while($rowboard1 = $resultboard1->fetch_assoc()) {
	$name = $rowboard1['First_Nmae'];
	$lname = $rowboard1['lname'];
	$uid11 = $rowboard1['id'];
	
	$selectdecision11 = "SELECT *  FROM hq_decisions where decider_id = '$uid11' AND loan_id ='$track2' " ;
	$resuldeci11 = $conn_db->query($selectdecision11);
if ($resuldeci11->num_rows > 0) {
while($rowdecis11 = $resuldeci11->fetch_assoc()) {
$cudecision11 = $rowdecis11['decision'];

}

}
else{
$cudecision11 = 'No Decision';	
}
if($cudecision11 == 'No Decision'){
	$hqcommitteescore11 =  0;
}
if($cudecision11 == 'Approved'){
		$hqcommitteescore11 =  95;
}
if($cudecision11 == 'Pended'){
		$hqcommitteescore11 = 55;
}
if($cudecision11 == 'Denied'){
		$hqcommitteescore11 = 5;
}
$hqscore11 = $hqscore11+$hqcommitteescore11;
}
$hqaverage = $hqscore11/$numrowshq1;
$hqaverage = round($hqaverage);
}
$overallaverage3= ($totscoreperc2 +$avecredit2+ $hqaverage)/3;
$overallaverage3 = round($overallaverage3);




?>
 		
	<span><strong>Scored &nbsp;&nbsp; <?php echo $overallaverage3;?>%</strong></span>

<div class="progress">
   <?php 
   
   if($overallaverage3 <50){
   
   echo "<div class='progress-bar progress-bar-danger  progress-bar-striped' role='progressbar'
  aria-valuenow=$overallaverage3 aria-valuemin='0' aria-valuemax='100' style='width:$overallaverage3%'>
    
  </div>";
   }
if($overallaverage3 == 0){
   
   echo "<div class='progress-bar progress-bar-danger  progress-bar-striped' role='progressbar'
  aria-valuenow=0 aria-valuemin='0' aria-valuemax='100' style='width:0%'>
    
  </div>";
   }    
if($overallaverage3 >=50 AND $overallaverage3 <75){
   
   echo "<div class='progress-bar progress-bar-warning   progress-bar-striped' role='progressbar'
  aria-valuenow=$overallaverage3 aria-valuemin='0' aria-valuemax='100' style='width:$overallaverage3%'>
    
  </div>";
   }  
if($overallaverage3 >=75){
   
   echo "<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar'
  aria-valuenow=$overallaverage3 aria-valuemin='0' aria-valuemax='100' style='width:$overallaverage3%'>
    
  </div>";
   }     
  ?>
</div>
	
	
	
	</td>
	
	
	
<td><strong><a class="label label-sm label-success" href="loan_ccommercial1?eb803838609d2516b=<?php echo $encrypted2;?>"<img src="images/mycommentt.jpg"  width="10" height="10" border="0"  />View</a></td></tr>
	<?php
}
  }
echo"</table>"; 
 ?>	
							
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-1-4" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

                                                       <h5><strong>For Contract Generation &nbsp;&nbsp;<?php if ($numrowapp>0){echo '<strong><font color="tomato">['. $numrowapp.']</font></strong>';}else{echo '<strong>['. $numrowapp.']</strong>'; }?>
                                                      - Waiting For Repayment &nbsp;&nbsp;<?php if ($numrowapp1>0){echo '<strong><font color="tomato">['. $numrowapp1.']</font></strong>';}else{echo '<strong>['. $numrowapp1.']</strong>'; }?></strong></h5>
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-1-4">
														<div class="panel-body">
																						<table id='dynamic-table' class='table table-striped  table-hover'>

								<?php

$result33 = "SELECT first_name,last_name,loan_details.loan_id,loan_details.loan_account,loan_details.loan_amount,loan_details.loan_type,loan_details.loan_status,loan_details.branch,loan_details.time_application,loan_details.loan_term_type,loan_details.loan_term_number,loan_details.loan_interest,loan_details.branch,loan_details.loan_tracknumber,loan_details.contract_print  FROM loan_details JOIN  loan_personalinfo ON loan_details.loan_tracknumber= loan_personalinfo.loan_id where loan_status = 'Approved' ORDER BY date_approval ";
echo "<tr><th ><strong>No</th><th><strong> Names</th><th><strong>Account Number</th><th><strong>Loan Type</th><th><strong>Amount</th><th><strong>Term</th><th><strong>Rate</th><th><strong>Branch</th><th><strong>Attachments</th><th><strong>Time Application</th><th><strong>Q-Loan Score</th><th><strong>Status</th><th><strong>view</th></tr>";
				if ($result33=mysqli_query($con,$result33))
  {
		while($Row3 = mysqli_fetch_row($result33)){
					$track3 = $Row3[13];
					  $token = $track3;
$satus = $Row3[1];
  $cipher_method = 'aes-128-ctr';
  $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
  $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));
  $crtoken = openssl_encrypt($token, $cipher_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
  unset($token, $cipher_method, $enc_key, $enc_iv);
	
	?>

   <tr> <td> <strong><?php echo ++$jh;?></td>
	<td><strong> <?php echo $Row3[0].'&nbsp;&nbsp;'.$Row3[1] ?></strong></td>
	<td> <?php echo  $Row3[3];?> </td>
	<td> <?php echo  $Row3[5];?> </td>
	<td><strong> <?php echo  number_format($Row3[4]);?> </strong></td>
	<td> <?php echo  $Row3[10].'&nbsp'.$Row3[9];?>(s)</td>
	<td> <?php echo  $Row3[11];?>%</td>
	<td> <?php echo  $Row3[12];?></td>
	<td> <?php 
	$attachmentss3 = "SELECT  loan_id FROM myfiles where loan_id = '$track3'";
	if ($attachmentss3=mysqli_query($con,$attachmentss3))
  {
	$num_attacs3 = mysqli_num_rows($attachmentss3);
	  
  }
	echo $num_attacs3;
	?> File(s)
	</td>
	
	<?php echo 	"<td> $Row3[8]</td>";?>
	
	<?php $score2 = "SELECT  * FROM score_table where track_number = '$track3'";
		$totscoreperc2=0;
		if ($score2=mysqli_query($con,$score2))
  {
		while($rowscore2 = mysqli_fetch_array($score2)){
			$sduration2= $rowscore2['score_duration'];
			$shistory2= $rowscore2['score_hostory'];
			$scustduration2= $rowscore2['score_cust_duration'];
			$sage2= $rowscore2['score_age'];
			$sgender2= $rowscore2['score_gender'];
			$sstatus2= $rowscore2['score_stauts'];
			$sactivity2= $rowscore2['score_activity'];
			$totscore2 = $sduration2+$shistory2+$scustduration2+$sage2+$sgender2+$sstatus2+$sactivity2;
			$totscoreperc2 = $totscore2/7;
			$totscoreperc2 = round ($totscoreperc2);
		}
  }
		?>

	<td>


	<?php
$board2= "SELECT  * FROM users_table WHERE role = 'Credit Committee' OR role = 'Credit Manager'";
 $resultboard2 = $conn_db->query($board2);
if ($resultboard2->num_rows > 0) {
	$totdeccredit2=0;
	 $numrowscre2= mysqli_num_rows($resultboard2);

while($rowboard2 = $resultboard2->fetch_assoc()) {
	$name = $rowboard2['First_Nmae'];
	$lname = $rowboard2['lname'];
	$uid2 = $rowboard2['id'];
	
	
	$selectdecision2 = "SELECT *  FROM decisions where decider_id = '$uid2' AND loan_id ='$track3'" ;
	$resuldeci2 = $conn_db->query($selectdecision2);
if ($resuldeci2->num_rows > 0) {
	
while($rowdecis2 = $resuldeci2->fetch_assoc()) {
	$creditcommitteescore2=0;
$cudecision2 = $rowdecis2['decision'];
if($cudecision2 == 'Approved'){
$creditcommitteescore2 = $creditcommitteescore2 + 95;
}
if($cudecision2 == 'Pended'){
$creditcommitteescore2 = $creditcommitteescore2 + 55;
}
if($cudecision2 == 'Denied'){
$creditcommitteescore2 = $creditcommitteescore2 + 5;
}
}
$totdeccredit2 = $totdeccredit2+$creditcommitteescore2;
}



}

}
$avecredit2 = $totdeccredit2/$numrowscre2;
$avecredit2 = round($avecredit2);


// SELECT SCORE FOR HQ
$boardhq1= "SELECT  * FROM users_table WHERE role = 'Branch Manager' OR role = 'Head Office Committee'";
 $resultboard1 = $conn_db->query($boardhq1);
if ($resultboard1->num_rows > 0) {
	$hqscore11 = 0;
	 $numrowshq1= mysqli_num_rows($resultboard1);

while($rowboard1 = $resultboard1->fetch_assoc()) {
	$name = $rowboard1['First_Nmae'];
	$lname = $rowboard1['lname'];
	$uid11 = $rowboard1['id'];
	
	$selectdecision11 = "SELECT *  FROM hq_decisions where decider_id = '$uid11' AND loan_id ='$track3' " ;
	$resuldeci11 = $conn_db->query($selectdecision11);
if ($resuldeci11->num_rows > 0) {
while($rowdecis11 = $resuldeci11->fetch_assoc()) {
$cudecision11 = $rowdecis11['decision'];

}

}
else{
$cudecision11 = 'No Decision';	
}
if($cudecision11 == 'No Decision'){
	$hqcommitteescore11 =  0;
}
if($cudecision11 == 'Approved'){
		$hqcommitteescore11 =  95;
}
if($cudecision11 == 'Pended'){
		$hqcommitteescore11 = 55;
}
if($cudecision11 == 'Denied'){
		$hqcommitteescore11 = 5;
}
$hqscore11 = $hqscore11+$hqcommitteescore11;
}
$hqaverage = $hqscore11/$numrowshq1;
$hqaverage = round($hqaverage);
}
$overallaverage3= ($totscoreperc2 +$avecredit2+ $hqaverage)/3;
$overallaverage3 = round($overallaverage3);




?>
 		
	<span><strong>Scored &nbsp;&nbsp; <?php echo $overallaverage3;?>%</strong></span>

<div class="progress">
   <?php 
   
   if($overallaverage3 <50){
   
   echo "<div class='progress-bar progress-bar-danger  progress-bar-striped' role='progressbar'
  aria-valuenow=$overallaverage3 aria-valuemin='0' aria-valuemax='100' style='width:$overallaverage3%'>
    
  </div>";
   }
if($overallaverage3 == 0){
   
   echo "<div class='progress-bar progress-bar-danger  progress-bar-striped' role='progressbar'
  aria-valuenow=0 aria-valuemin='0' aria-valuemax='100' style='width:0%'>
    
  </div>";
   }    
if($overallaverage3 >=50 AND $overallaverage3 <75){
   
   echo "<div class='progress-bar progress-bar-warning   progress-bar-striped' role='progressbar'
  aria-valuenow=$overallaverage3 aria-valuemin='0' aria-valuemax='100' style='width:$overallaverage3%'>
    
  </div>";
   }  
if($overallaverage3 >=75){
   
   echo "<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar'
  aria-valuenow=$overallaverage3 aria-valuemin='0' aria-valuemax='100' style='width:$overallaverage3%'>
    
  </div>";
   }     
  ?>
</div>
	
	
	
	</td>
	 <?php 
	  if($Row3[14] =='Contract printed'){
			echo "<td bgcolor='black'> <strong><font color='white'>Waiting For Repayment</font></strong></td>";	  
		  
	  }
	  else{
 	echo "<td  bgcolor='#E9967A'> <strong>Print Contract</strong></td>";	  
 
	  }
	 ?>
	
	

<td><strong><a class="label label-sm label-success" href="loan_commercial_print?eeefXZA5432Tgfeeekl=<?php echo $crtoken;?>"<img src="images/mycommentt.jpg"  width="10" height="10" border="0" />View</a></td></tr>
	<?php
}}

echo"</table>"; 
 ?>	
					
														
	
												
										</div>
											
											
												<!-- /.tab-content -->
										</div><!-- /.tabbable -->
									</div><!-- /.col -->
<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-1-5" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

															<h5><i><strong>Denials &nbsp;&nbsp;<?php if ($numrowdeny>0){echo '<strong><font color="tomato">['. $numrowdeny.']</font></strong>';}else{echo '<strong>['. $numrowdeny.']</strong>'; }?></strong></i></h5>
														
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-1-5">
														<div class="panel-body">
								
								<table id='dynamic-table' class='table table-striped  table-hover'>

								<?php

$result44 = "SELECT first_name,last_name,loan_details.loan_id,loan_details.loan_account,loan_details.loan_amount,loan_details.loan_type,loan_details.loan_status,loan_details.branch,loan_details.time_application,loan_details.loan_term_type,loan_details.loan_term_number,loan_details.loan_interest,loan_details.branch,loan_details.loan_tracknumber  FROM loan_details JOIN  loan_personalinfo ON loan_details.loan_tracknumber= loan_personalinfo.loan_id  where loan_status ='Deny' ORDER BY loan_id DESC";
echo "<tr><th ><strong>No</th><th><strong> Names</th><th><strong>Account Number</th><th><strong>Loan Type</th><th><strong>Amount</th><th><strong>Term</th><th><strong>Rate</th><th><strong>Branch</th><th><strong>Attachments</th><th><strong>Time Application</th><th><strong>Q-Loan Score</th><th><strong>view</th></tr>";
				if ($result33=mysqli_query($con,$result44 ))
  {
		while($Row3 = mysqli_fetch_row($result33)){
					$track3 = $Row3[13];
					  $token = $track3;

  $cipher_method = 'aes-128-ctr';
  $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
  $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));
  $crtoken = openssl_encrypt($token, $cipher_method, $enc_key, 0, $enc_iv) . "6d95a75dbf3" . bin2hex($enc_iv);
  unset($token, $cipher_method, $enc_key, $enc_iv);
	?>
    <tr>
<td> <strong><?php echo ++$h;?></td>
	<td><strong> <?php echo $Row3[0].'&nbsp;&nbsp;'.$Row3[1] ?></strong></td>
	<td> <?php echo  $Row3[3];?> </td>
	<td> <?php echo  $Row3[5];?> </td>
	<td><strong> <?php echo  number_format($Row3[4]);?> </strong></td>
	<td> <?php echo  $Row3[10].'&nbsp'.$Row3[9];?>(s)</td>
	<td> <?php echo  $Row3[11];?>%</td>
	<td> <?php echo  $Row3[12];?></td>
	<td> <?php 
	$attachmentss3 = "SELECT  loan_id FROM myfiles where loan_id = '$track3'";
	if ($attachmentss3=mysqli_query($con,$attachmentss3))
  {
	$num_attacs3 = mysqli_num_rows($attachmentss3);
	  
  }
	echo $num_attacs3;
	?> File(s)
	</td>
	
	<?php echo 	"<td> $Row3[8]</td>";?>
	
	<?php $score2 = "SELECT  * FROM score_table where track_number = '$track3'";
		$totscoreperc2=0;
		if ($score2=mysqli_query($con,$score2))
  {
		while($rowscore2 = mysqli_fetch_array($score2)){
			$sduration2= $rowscore2['score_duration'];
			$shistory2= $rowscore2['score_hostory'];
			$scustduration2= $rowscore2['score_cust_duration'];
			$sage2= $rowscore2['score_age'];
			$sgender2= $rowscore2['score_gender'];
			$sstatus2= $rowscore2['score_stauts'];
			$sactivity2= $rowscore2['score_activity'];
			$totscore2 = $sduration2+$shistory2+$scustduration2+$sage2+$sgender2+$sstatus2+$sactivity2;
			$totscoreperc2 = $totscore2/7;
			$totscoreperc2 = round ($totscoreperc2);
		}
  }
		?>

	<td>


	<?php
$board2= "SELECT  * FROM users_table WHERE role = 'Credit Committee' OR role = 'Credit Manager'";
 $resultboard2 = $conn_db->query($board2);
if ($resultboard2->num_rows > 0) {
	$totdeccredit2=0;
	 $numrowscre2= mysqli_num_rows($resultboard2);

while($rowboard2 = $resultboard2->fetch_assoc()) {
	$name = $rowboard2['First_Nmae'];
	$lname = $rowboard2['lname'];
	$uid2 = $rowboard2['id'];
	
	
	$selectdecision2 = "SELECT *  FROM decisions where decider_id = '$uid2' AND loan_id ='$track3'" ;
	$resuldeci2 = $conn_db->query($selectdecision2);
if ($resuldeci2->num_rows > 0) {
	
while($rowdecis2 = $resuldeci2->fetch_assoc()) {
	$creditcommitteescore2=0;
$cudecision2 = $rowdecis2['decision'];
if($cudecision2 == 'Approved'){
$creditcommitteescore2 = $creditcommitteescore2 + 95;
}
if($cudecision2 == 'Pended'){
$creditcommitteescore2 = $creditcommitteescore2 + 55;
}
if($cudecision2 == 'Denied'){
$creditcommitteescore2 = $creditcommitteescore2 + 5;
}
}
$totdeccredit2 = $totdeccredit2+$creditcommitteescore2;
}



}

}
$avecredit2 = $totdeccredit2/$numrowscre2;
$avecredit2 = round($avecredit2);


// SELECT SCORE FOR HQ
$boardhq1= "SELECT  * FROM users_table WHERE role = 'Branch Manager' OR role = 'Head Office Committee'";
 $resultboard1 = $conn_db->query($boardhq1);
if ($resultboard1->num_rows > 0) {
	$hqscore11 = 0;
	 $numrowshq1= mysqli_num_rows($resultboard1);

while($rowboard1 = $resultboard1->fetch_assoc()) {
	$name = $rowboard1['First_Nmae'];
	$lname = $rowboard1['lname'];
	$uid11 = $rowboard1['id'];
	
	$selectdecision11 = "SELECT *  FROM hq_decisions where decider_id = '$uid11' AND loan_id ='$track3' " ;
	$resuldeci11 = $conn_db->query($selectdecision11);
if ($resuldeci11->num_rows > 0) {
while($rowdecis11 = $resuldeci11->fetch_assoc()) {
$cudecision11 = $rowdecis11['decision'];

}

}
else{
$cudecision11 = 'No Decision';	
}
if($cudecision11 == 'No Decision'){
	$hqcommitteescore11 =  0;
}
if($cudecision11 == 'Approved'){
		$hqcommitteescore11 =  95;
}
if($cudecision11 == 'Pended'){
		$hqcommitteescore11 = 55;
}
if($cudecision11 == 'Denied'){
		$hqcommitteescore11 = 5;
}
$hqscore11 = $hqscore11+$hqcommitteescore11;
}
$hqaverage = $hqscore11/$numrowshq1;
$hqaverage = round($hqaverage);
}
$overallaverage3= ($totscoreperc2 +$avecredit2+ $hqaverage)/3;
$overallaverage3 = round($overallaverage3);




?>
 		
	<span><strong>Scored &nbsp;&nbsp; <?php echo $overallaverage3;?>%</strong></span>

<div class="progress">
   <?php 
   
   if($overallaverage3 <50){
   
   echo "<div class='progress-bar progress-bar-danger  progress-bar-striped' role='progressbar'
  aria-valuenow=$overallaverage3 aria-valuemin='0' aria-valuemax='100' style='width:$overallaverage3%'>
    
  </div>";
   }
if($overallaverage3 == 0){
   
   echo "<div class='progress-bar progress-bar-danger  progress-bar-striped' role='progressbar'
  aria-valuenow=0 aria-valuemin='0' aria-valuemax='100' style='width:0%'>
    
  </div>";
   }    
if($overallaverage3 >=50 AND $overallaverage3 <75){
   
   echo "<div class='progress-bar progress-bar-warning   progress-bar-striped' role='progressbar'
  aria-valuenow=$overallaverage3 aria-valuemin='0' aria-valuemax='100' style='width:$overallaverage3%'>
    
  </div>";
   }  
if($overallaverage3 >=75){
   
   echo "<div class='progress-bar progress-bar-success progress-bar-striped' role='progressbar'
  aria-valuenow=$overallaverage3 aria-valuemin='0' aria-valuemax='100' style='width:$overallaverage3%'>
    
  </div>";
   }     
  ?>
</div>
	
	
	
	</td>

<td><strong><a class="label label-sm label-success" href="denied_applications?8693d9a0b05c8569=<?php echo $crtoken;?>"<img src="images/mycommentt.jpg"  width="10" height="10" border="0" />View</a></td></tr>
	<?php
}}

echo"</table>"; 
 ?>	
							
														</div>
													</div>
												</div>
								</div>
								</div><!-- /.row -->

								
								<!-- /.col -->
						</div><br><br><br><br><br><!-- /.row -->
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

</html>