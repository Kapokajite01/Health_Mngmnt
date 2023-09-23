<?php
header('Content-Type: text/html; charset=ISO-8859-1');

error_reporting(0);
    session_start();
$_SESSION['redirect'] = '';
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Family_planning"){
      header('Location: logout');
	}
	
include_once('connect_db.php');
$postedesante = $_SESSION['sess_postdsante'];
$_SESSION['labsaved'] = "No";
?>
<style>

body {
  font-family: "Lato", sans-serif;
}

h2 {
  color: #000;
  text-align: center;
  font-size: 2em;
  margin: 20px 0;
}

.warpper {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.tab {
  cursor: pointer;
  padding: 10px 20px;
  margin: 0px 2px;
  background: #32557f;
  display: inline-block;
  color: #fff;
  border-radius: 3px 3px 0px 0px;
  box-shadow: 0 0.5rem 0.8rem #00000080;
}

.panels {
  background: #fff;
  box-shadow: 0 2rem 2rem #00000080;
  min-height: 200px;
  width: 100%;
  max-width:  80%;
  border-radius: 3px;
  overflow: hidden;
  padding: 20px;
}

.panel {
  display: none;
  animation: fadein 0.8s;
}

@keyframes fadein {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.panel-title {
  font-size: 1.5em;
  font-weight: bold;
}

.radio {
  display: none;
}

#one:checked ~ .panels #one-panel,
#two:checked ~ .panels #two-panel,
#three:checked ~ .panels #three-panel {
  display: block;
}

#one:checked ~ .tabs #one-tab,
#two:checked ~ .tabs #two-tab,
#three:checked ~ .tabs #three-tab {
  background: #fff;
  color: #000;
  border-top: 3px solid #32557f;
}

View Compiled

</style>
<html>

	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
		<link rel="stylesheet" href="cssauto/style.css" />
<script type="text/javascript" src="jsauto/jquery.min.js"></script>
<script type="text/javascript" src="jsauto/script.js"></script>
</head>

<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
 <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 
   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script> 

</head>
<div id="top-bar">
		
		<div class="page-full-width cf" >

			<ul id="nav" class="fl" >
	
				<li class="v-sep"><a href="family_palnning" class="round button dark menu-user image-left"><strong>Logged in as &nbsp;&nbsp;&nbsp;[<?php echo $name.'&nbsp;&nbsp;&nbsp;'.$lname;?>]</strong></a>
					<ul>
					<li><a href="logout" class="round button dark menu-user image-left"><strong>Log out</strong></a></li>

					</ul> 

								
	<li class="v-sep"><a href="family_palnning" class="round button dark menu-user image-left"> <strong>Consultation  Report </strong></a>
<ul>
		<li class="v-sep"><a href="family_palnning" class=" stock-tab" onClick=window.open("consultationReport","Ratting","width=1200,height=1800,left=200,scrollbars=yes,toolbar=0,status=0,"); value="MEDICINES"><strong>Consultation report </strong></a></li>
					</ul> 
				


				</li>
					<li class="v-sep"><a href="family_palnning" class="round button dark menu-user image-left"><strong>Incomes Report</strong></a>
					</li>
				
			</ul> <!-- end nav -->

					
			<form action="#" method="POST" id="search-form" class="fr">
				<fieldset>
                                    <a href="logout" class="round button dark menu-logoff image-left" style="background-color: #cc0000">Log out</a>
				</fieldset>
			</form>
		</div> <!-- end full-width -->	
	
	</div>
<div class="warpper">
  <input class="radio" id="one" name="group" type="radio" checked>
  <input class="radio" id="two" name="group" type="radio">
  <input class="radio" id="three" name="group" type="radio">
   <?php
  if(isset($_POST['search'])){
	  $insurancenmber = $_POST['country_id'];
$sqlresult = ("select id,affiliate_number,names,lname,affiliate_names,afilliate_lastname,dob,date,patient_id,status,cas,time_reception,origine,branch from patient JOIN consultation ON consultation.patient_id = patient.id WHERE affiliate_number = '$insurancenmber'   and (status ='Planning'  or  origine ='Planning')  GROUP BY patient_id order by  date,consultation_id ");
  }
  else{
	$sqlresult = ("select id,affiliate_number,names,lname,affiliate_names,afilliate_lastname,dob,date,patient_id,status,cas,time_reception,origine,branch from patient JOIN consultation ON consultation.patient_id = patient.id   and (status ='Planning'  or  origine ='Planning')  GROUP BY patient_id order by date,consultation_id ");
    }
	$result = mysqli_query($conn, $sqlresult);
	$MYCOSNULTA= mysqli_num_rows($result);

	// Appointment
	  if(isset($_POST['searchcon'])){
	  $insurancenmber = $_POST['country_id'];
$sqlresultAPP = ("select * FROM patient_reserv WHERE patientID = '$insurancenmber'");
  }
  else{
$sqlresultAPP = ("select * FROM patient_reserv ORDER BY dateAppointment ,timeAppointmennt ");
    }
	$resultAPP = mysqli_query($conn, $sqlresultAPP);
	$APPNUMBER = mysqli_num_rows($resultAPP );
?>
  <div class="tabs">
    <label class="tab" id="one-tab" for="one"><h1><strong>Family Planning [ <?php echo $MYCOSNULTA;?> ] </strong></h1></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label class="tab" id="two-tab" for="two"><h1><strong>Appointment [ <?php echo $APPNUMBER+0 ;?> ]</strong></h1></label>
  </div>

  <div class="panels">
    <div class="panel" id="one-panel">
      <p>	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
 <!-- end content-module-heading -->
					
				



  
<body>
    						<div class="content-module-main cf" style="width:50%;margin-left:15%;">

				<form method="POST" action="">
                <div class="label_div"><strong>Number To Search:</strong> </div>
                <div class="input_container">
                    <input type="text" id="country_id" name="country_id" onkeyup="autocomplet()" autocomplete="off" required aria-required='true' aria-describedby='name-format' placeholder="Search Insurance Number">
                   &nbsp;&nbsp;&nbsp;&nbsp; <ul id="country_list_id"></ul><input type="submit" name="search" value="SEARCH"></div></div>
	</div>	</div>	
	<?PHP
	  $key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
function my_encrypt($data, $key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

	if ($result->num_rows > 0) {
		?>
	 <table align="center" style="width:50%;margin-left:25%;">

				<tr><th>No</th><th>Affiliation Number</th><th>Beneficiary Names</th><th>Age</th><th>Results</th><th>Date of Reception</th><th>Select</th></tr>
				<?php 
	
			while($rowval = mysqli_fetch_assoc($result)) {
				$cas= $rowval['cas'];
				$status = $rowval ['status'];
				$origine = $rowval ['origine'];
				$branch = $rowval['branch'];
				$plainID = $rowval['affiliate_number'];
			 $affnumber = $rowval['id'];
			 $encrypteld2 = my_encrypt($plainID, $key);
			 $affnumber = my_encrypt($affnumber, $key);
			 

			if($status == 'Laboratoire'){
			?>	
	<tr  bgcolor="#eedfb5">
	<td><?php echo ++$i;?>&nbsp;&nbsp;&nbsp;</td>
	<td><?php echo $rowval['affiliate_number'];?></td>
	<td><?php echo $rowval['names'].'&nbsp;&nbsp;&nbsp;'.$rowval['lname'];?></td>
	<td><?php echo $rowval['dob'];?></td>
	<td align="center"><img src="images/update-icon.png" width="24" height="24" border="0" /></td>
	<td><strong><?php echo $newDate = date("d/m/Y", strtotime($rowval['date']));?></td>
	<?php 
	if($branch != ''){
	?>
	<td><a href = "laplanning?affid=<?php echo urlencode($affnumber); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>&amp;dtconsult=<?php echo urlencode($rowval['time_reception']); ?>"><font color="#CD5C5C"><strong>Redirected</font></a></td>
	<?php
	}
	else{
		
	?>
	<td><a href = "laplanning?affid=<?php echo urlencode($affnumber); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>&amp;dtconsult=<?php echo urlencode($rowval['time_reception']); ?>">Select</a></td>
	<?php
	}
	?>
	</tr>
<?php
}
			if($status == 'Planning'  ){
				
		
		
	?>	
	<tr bgcolor="#BDB76B">
	<td><strong><?php echo ++$i;?>&nbsp;&nbsp;&nbsp;</td>
	<td><strong><?php echo $rowval['affiliate_number'];?></td>
	<td><strong><?php echo $rowval['names'].'&nbsp;&nbsp;&nbsp;'.$rowval['lname'];?></td>
	<td><strong><?php echo $rowval['dob'];?></td>
	<td  align="center"><strong><img src="images/delete-icon.jpg" width="24" height="24" border="0" /></td>
	<td><strong><?php echo $newDate = date("d/m/Y", strtotime($rowval['date']));?></td>
		<?php 
	if(($cas =='') AND ($branch!='Redcted'))
	{
	?>
	<td><strong><a href = "orientationsplanning?affid=<?php echo urlencode($affnumber); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>&amp;dtconsult=<?php echo urlencode($rowval['time_reception']); ?>"> Select</a></td>
	<?php
	}
	else
	{
		if($branch == 'Redcted')
		{
		?>
		<td><strong><a href = "orientationsPlaRed?affid=<?php echo urlencode($affnumber); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>&amp;dtconsult=<?php echo urlencode($rowval['time_reception']); ?>"><font color="#CD5C5C"><strong>Redirected</font></a></td>
	
	<?php
		}
		else if ($branch == 'RedAndAdded')
		{
		?>
		<td><strong><a href = "nplanning1?affid=<?php echo urlencode($affnumber); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>&amp;dtconsult=<?php echo urlencode($rowval['time_reception']); ?>"><font color="#CD5C5C"><strong>Redirected</font></a></a></td>
	
	<?php
		}
		else if($origine == 'Planning')
		{
		?>
		<td><strong><a href = "nplanning?affid=<?php echo urlencode($affnumber); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>&amp;dtconsult=<?php echo urlencode($rowval['time_reception']); ?>">Select</a></td>
	
	<?php
		}
		else if($origine == 'Laboratoire')
		{
		if($branch ==''){
			?>
		<td><strong><a href = "nplanning1?affid=<?php echo urlencode($affnumber); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>&amp;dtconsult=<?php echo urlencode($rowval['time_reception']); ?>"><font color="black"><strong>Select</font></a></td>
			
		<?php	
		}
		else{
		?>

<td><strong><a href = "nplanning1?affid=<?php echo urlencode($affnumber); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>&amp;dtconsult=<?php echo urlencode($rowval['time_reception']); ?>">Select</a></td>
<?php		
			
		}
		}
		else
		{
		?>	
			
	<td><strong><a href = "orientationsplanning?affid=<?php echo urlencode($affnumber); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>&amp;dtconsult=<?php echo urlencode($rowval['time_reception']); ?>"> Select</a></td>
		
<?php		
		}
	}
	
	?>
	</tr>
<?php
	
}
			if($status == 'Results'){
	?>	
	<tr bgcolor="#FFFFFF">
	<td><strong><?php echo ++$i;?>&nbsp;&nbsp;&nbsp;</td>
	<td><strong><?php echo $rowval['affiliate_number'];?></td>
	<td><strong><?php echo $rowval['names'].'&nbsp;&nbsp;&nbsp;'.$rowval['lname'];?></td>
	<td><strong><?php echo $rowval['dob'];?></td>
	<td  align="center"><strong><img src="images/yes.png" width="24" height="24" border="0" /></td>
	<td><strong><?php echo $newDate = date("d/m/Y", strtotime($rowval['date']));?></td>
	<td>
	<strong><a href = "consultation_planning?affid=<?php echo urlencode($affnumber); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>&amp;dtconsult=<?php echo urlencode($rowval['time_reception']); ?>">Select</a>
	
	
	</td>
	</tr>
<?php
	
}			
			}
?><tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>

				


	</table><?PHP
	}
	ELSE{
				$msg = "<h1 align='center'><font color='red'> No Patient in Consultation</font></h1>";

	}
	?>			</form>
	
	</div><?php echo $msg;?><br><br><br>	</div></p>
    </div>
    <div class="panel" id="two-panel">
      <p>	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
 <!-- end content-module-heading -->
					
				



 
<body>
    						<div class="content-module-main cf" style="width:50%;margin-left:15%;">

				<form method="POST" action="">
                <div class="label_div"><strong>Number To Search:</strong> </div>
                <div class="input_container">
                    <input type="text" id="country_id" name="country_id" onkeyup="autocomplet()" autocomplete="off" required aria-required='true' aria-describedby='name-format' placeholder="Search Insurance Number">
                   &nbsp;&nbsp;&nbsp;&nbsp; <ul id="country_list_id"></ul><input type="submit" name="searchcon" value="SEARCH"></div></div>
	</div>	</div>	
	<?PHP
	if ($resultAPP->num_rows > 0) {
		?>
	 <table align="center" style="width:50%;margin-left:25%;border: 1px solid black;">

				<tr><th>No</th><th>Number</th><th>NAME</th><th>Age</th><th>Date</th><th>TIME</th><th>Reason</th><th>Select</th></tr>
				<?php 
	$today = date("Y-m-d");
			while($rowAPP = mysqli_fetch_assoc($resultAPP)) {
				$thedate = $rowAPP ['dateAppointment '];
				?>	
	<tr bgcolor="white">
	<td><strong><?php echo ++$iJKL;?>&nbsp;&nbsp;&nbsp;</td>
	<td><strong><?php echo $rowAPP['patientID'];?></strong></td>
	<td><strong><?php echo $rowAPP['patientFname'].'    '. $rowAPP['patientLname'];?></strong></td>
	<td><strong><?php echo $rowAPP['Dob'];?></strong></td>
	<td><strong><?php echo $newDate = date("d/m/Y", strtotime($rowAPP['dateAppointment']));?></strong></td>
	<td><strong><?php echo $rowAPP['timeAppointmennt'];?></strong></td>
	<td><strong><p><?php echo $rowAPP['appointmentReason'];?></p></strong></td>
	<td><a href = "patientConsultation?affid=<?php echo urlencode($rowAPP['oatientReservID']); ?>">Select</a></td>
	</tr>
<?php
				
}
?>

				


	</table><?PHP
	}
	ELSE{
				$msg = "<h1 align='center'><font color='red'> No Appointment</font></h1>";

	}
	?>			</form>
	
	</div><?php echo $msg;?><br><br><br>	</div></p>
    </div>
    <div class="panel" id="three-panel">
      <div class="panel-title">Title3</div>
      <p>Content3</p>
    </div>
  </div>
</div>
<div id="footer">
		<p><strong><font color="white"><strong>Powed By Vision Soft Ltd .</strong></font></strong></p>
	
	</div>				
</html>
