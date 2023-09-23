<?php
error_reporting(0);
session_start();
$track = $_SESSION['idtrack'];
include('mydb_connection/my_connect_db.php');
include'mydb_connection/my_dbconnection.php';
$approve = "SELECT loan_account,loan_amount ,province,district,sector,cell,loan_type,village,loan_term_number,loan_term_type,first_name,last_name,telephone,gender,date_of_birth,place_of_birth,martial_satus from  loan_details JOIN loan_personalinfo ON loan_details.loan_tracknumber = loan_personalinfo.loan_id  WHERE loan_tracknumber = '$track'";
 $resultscore = $conn_db->query($approve);
if ($resultscore->num_rows > 0) {

while ($rowval =  $resultscore->fetch_assoc()) {
$account = $rowval['loan_account'];	
$amount = $rowval['loan_amount'];	
$type = $rowval['loan_term_type'];	
$term = $rowval['loan_term_number'];
$firstname = $rowval['first_name'];
$lastname = $rowval['last_name'];
$telephone = $rowval['telephone'];
$gender = $rowval['gender'];
$dob = $rowval['date_of_birth'];
$pbirth = $rowval['place_of_birth'];
$stattus = $rowval['martial_satus'];
$province = $rowval['province'];
$district = $rowval['district'];
$sector = $rowval['sector'];
$cell = $rowval['cell'];
$village = $rowval['village'];
}
}
 
 $employment = "select * from loan_applicant_employer WHERE loan_id = $track";
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
 $history = "select * from credit_history WHERE loan_id = $track";
$result11 = $conn_db->query($history);
if ($result11->num_rows > 0) {
while($rowhist = $result11->fetch_assoc()) {
	$lastamount  = $rowhist['Amount'];
	$last_payment = $rowhist['last_payment'];
	$type = $rowhist['type'];
	}
}

 $incomes = "select * from incomes WHERE loan_id = $track";
$result11 = $conn_db->query($incomes);
if ($result11->num_rows > 0) {
while($rowhist = $result11->fetch_assoc()) {
	$incometype = $rowhist['income_type'];
	$incomeamount = $rowhist['income_amount'];
	}
}

$refference = "select * from applicanr_refference WHERE loan_id = $track";
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
	}
}	
 $attcmt="SELECT * from myfiles  WHERE loan_id = $track";
if ($attcmt=mysqli_query($con,$attcmt))
  {
 $num_rowsatt = mysqli_num_rows($attcmt);
  }	
  
 $average = $_SESSION['average'];
 $hqaverage = $_SESSION['hqaverage'] ;
 $ovaverage = $_SESSION['ovaverage'];
?>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />

<body style="background-color: #273746">
<div align="center" >
<form method="POST" ACTION="">
				<h1><font color="white">	LOAN Review </font> <img src="img/approval.jpg" alt="Smiley face" height="42" width="42"> </h1><hr>
				<h4 style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;"><strong><u>Personal Information</u> </strong></h4>
				<table width="45%" style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;">
				<tr><td><strong>Loan Account</strong></td><td>-&nbsp;&nbsp;<?php echo $account;?></td></tr>
				<tr><td><strong>Account Names</strong></td><td>-&nbsp;&nbsp;<?php echo $firstname;?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lastname;?></td></tr>
				<tr><td><strong>Loan Amount</strong></td><td>-&nbsp;&nbsp;<?php echo number_format($amount);?></td></tr>
				<tr><td><strong>Loan Term</strong></td><td>-&nbsp;&nbsp; <?php echo $term*12;?>&nbsp;&nbsp; <?php echo $type;?>(s)</td></tr>
				<tr><td><strong>Telephone number</strong></td><td>-&nbsp;&nbsp; <?php echo $telephone*12;?></td></tr>
				<tr><td><strong>Gender</strong></td><td>-&nbsp;&nbsp; <?php echo $gender?></td></tr>
				<tr><td><strong>Date of Birth</strong></td><td>-&nbsp;&nbsp; <?php echo $dob;?></td></tr>
				<tr><td><strong>Place of Birth</strong></td><td>-&nbsp;&nbsp; <?php echo $pbirth;?></td></tr>
				<tr><td><strong>Martial status</strong></td><td>-&nbsp;&nbsp; <?php echo $stattus;?></td></tr>
				</table><hr>
				
				<h4 style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;"><strong><u>Current Address</u> </strong></h4>
				<table width="45%" style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;">
				<tr><td><strong>Province</strong></td><td>-&nbsp;&nbsp;<?php echo $province;?></td></tr>
				<tr><td><strong>District</strong></td><td>-&nbsp;&nbsp;<?php echo $district;?></td></tr>
				<tr><td><strong>Sector</strong></td><td>-&nbsp;&nbsp;<?php echo $sector;?></td></tr>
				<tr><td><strong>Cell </strong></td><td>-&nbsp;&nbsp;<?php echo $cell;?></td></tr>
				<tr><td><strong>Village</strong></td><td>-&nbsp;&nbsp; <?php echo $village?></td></tr>
				</table><hr>
								<h4 style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;"><strong><u>Employment</u> </strong></h4>

				<table width="45%" style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;">

<tr><td><strong>Employer :</strong>&nbsp;&nbsp;<?php echo $employer;?></td><tr>
<tr><td><strong>Employer's Activity :</strong></span>&nbsp;&nbsp;<?php echo $empactivity;?></td><tr>
<tr><td><strong>Employer's Telephone  :</strong></span>&nbsp;&nbsp;<?php echo $emptelephone;?></td><tr>
<tr><td><strong>Job Position  :</strong></span>&nbsp;&nbsp;<?php echo $empposition;?></td><tr>
<tr><td><strong>Province :</strong></span>&nbsp;&nbsp;<?php echo $empprovince;?></td><tr>
<tr><td><strong>District :</strong></span>&nbsp;&nbsp;<?php echo $empdistrict;?></td><tr>
<tr><td><strong>Sector:</strong></span>&nbsp;&nbsp;<?php echo $empsector;?><tr>
<tr><td><strong>Cell:</strong></span>&nbsp;&nbsp;<?php echo $empcell;?><tr>
<tr><td><strong>Village:</strong></span>&nbsp;&nbsp;<?php echo $empvillage;?><tr>
</table><hr>
<h4 style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;"><strong><u>Repayment History</u> </strong></h4>

<table width="45%" style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;">
<tr><td><strong>Amount :</strong></span>&nbsp;&nbsp;<?php echo $lastamount;?></td><tr>
<tr><td><strong>Payement</span>&nbsp;&nbsp;<?php echo $last_payment;?></td><tr>
<tr><td><strong>Category  :</strong></span>&nbsp;&nbsp;<?php echo $type;?></td><tr>
</table><hr>
<h4 style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;"><strong><u>Incomes</u> </strong></h4>

<table width="45%" style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;">
<tr><td><strong>Type</span>&nbsp;&nbsp;<?php echo $incometype;?></td><tr>
<tr><td><strong>Amount  :</strong></span>&nbsp;&nbsp;<?php echo $incomeamount;?></td><tr>
</table><hr>
<h4 style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;"><strong><u>Attachments &nbsp;&nbsp;[<?php echo $num_rowsatt;?>]</u> </strong></h4>
<table width="45%" style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;">
<tr><td>
	 <?php
	 

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_array( $attcmt )) {
             
                // echo out the contents of each row into a table
              $filename = $row['file_name'];
                ?><img src="img/attACHMENT.png" width="15" height="15"/>
				<a href="/qloan/files/sdjklnkjbnkbsfs$#hgsd/<?=$filename ;?>"><?=$filename ;?></a> <br><HR>
			<?php
		 }
          if(!$filename ){
			  echo "<h5><Strong>No Attachment !!!</h5></strong>";
		  }


		 ?>
		
      </td></tr></table><hr>
	  
	  
<h4 style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;"><strong><u>Comments</u> </strong></h4>

<table width="45%" style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;">
<td><?php 
$commercomm = "select comment,time_comment,First_Nmae,lname,role  from loan_comments JOIN users_table ON users_table.id = loan_comments.commentetor WHERE loan_id = $track ORDER BY comment_id DESC";
$result113 = $conn_db->query($commercomm);
if ($result113->num_rows > 0) {
while($row = $result113->fetch_assoc()) {

		 ?> <strong>Commented By:&nbsp;&nbsp;<?php echo $row['First_Nmae'];?>&nbsp;&nbsp;<?php echo $row['lname'];?> &nbsp;&nbsp;[<?php echo $row['role'];?>] ON &nbsp;&nbsp;<?php echo $row['time_comment'];?></strong>
		 <p> <?php echo $row['comment'];?></p>
	  


<?php
echo'<hr>';
}?>
 
	  <?php
} ?></td></tr>
</table>
<h4 style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;"><strong><u>Coraterals</strong></span></u> </strong></h4>
<table width="45%" style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;">

<tr><td><strong><strong>No</strong></td><td><strong>Type </strong></td><td><strong><span>Value</span></strong></td><td><strong><span>Market Value</span></strong></td><tr>
<tr><td><strong>1</th><td><?php echo $refname1;?></td><td><?php echo $refadd1;?></td><td><?php echo $refphone1;?></td><tr>
<tr><td><strong>2</th><td><?php echo $refname2;?></td><td><?php echo $refadd2;?></td><td><?php echo $refphone2;?></td><tr>
<tr><td><strong>3</th><td><?php echo $refname3;?></td><td><?php echo $refadd3;?></td><td><?php echo $refphone3;?></td><tr>
</table><hr>	   
<h4 style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;"><strong><u>Refferences</strong></span></u> </strong></h4>
<table width="45%" style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;">

<tr><td><strong><strong>No</strong></td><td><strong>Names</strong></td><td><strong><span>Addres</span></strong></td><td><strong><span>Telephones</span></strong></td><tr>
<tr><td><strong>1</th><td><?php echo $refname1;?></td><td><?php echo $refadd1;?></td><td><?php echo $refphone1;?></td><tr>
<tr><td><strong>2</th><td><?php echo $refname2;?></td><td><?php echo $refadd2;?></td><td><?php echo $refphone2;?></td><tr>
<tr><td><strong>3</th><td><?php echo $refname3;?></td><td><?php echo $refadd3;?></td><td><?php echo $refphone3;?></td><tr>
</table><hr>
<h4 style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;"><strong><u>Score(s)</strong></span></u> </strong></h4>
 <?php 

		$score = "SELECT  * FROM score_table WHERE track_number = '$track'";
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
	<table width="45%" style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;"><tr><td>
      <div class="content-wrapper">

	
<strong><h5 align='left'><STRONG>  Q-Loan Scored  &nbsp;&nbsp; <?php echo $totscoreperc;?>% </STRONG></h5>

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
</div></td></tr></table>
	<table width="45%" style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;"><tr><td>
	
	     <div class="content-wrapper">

	
<h5 align='left'><strong>  Credit Credit Committee Scored  &nbsp;&nbsp; <?php echo $average;?>% </strong></h5>

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
</div>
	
	</td></tr></table>
		<table width="45%" style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;"><tr><td>

	      <div class="content-wrapper">

	
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
</div>
	</td></tr></table>
	
	
			<table width="45%" style="font-family:Georgia, Garamond, Serif;color:white;font-style:italic;"><tr><td>

	      <div class="content-wrapper">

	
<h5 align='left'><strong>  Overall  Scored  &nbsp;&nbsp; <?php echo $ovaverage;?>% </strong></h5>


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
	</td></tr></table>

				<input type="submit" name="approve" value="Approve"><input type="submit" name="cancel" value="Cancel">
				</form>
				</div>
				<br><br><br><br>

</body>
<?PHP
if(isset($_POST['approve'])){
	$update = "UPDATE loan_details SET loan_status = 'Approved',date_approval = Now() where loan_tracknumber = '$track'";
	 $resultupdate = $conn_db->query($update);

	if($resultupdate){
	$_SESSION['redirect'] = 'yes';

		?>
		<script>
		alert('Loan Approved for Contract Generation');
        </script>
		<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
</script>
		
<script type='text/javascript'>
         self.close();
    </script>
	<?php
	}
}
if(isset($_POST['cancel'])){
	?>
		<script>
		alert('Your Canceled ');
        </script>
		<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
</script>
<script type='text/javascript'>
         self.close();
    </script>
	<?php
}
?>