<?php
error_reporting(0);
session_start();
include_once('connect_db.php');
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Laboratory"){
      header('Location: logout');
    include_once('connect_db.php');
	}
$myusername=$_SESSION['sess_username'];
$postedesante = $_SESSION['sess_postdsante'];
 $key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
function my_encrypt($data, $key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

?>
<html>

</head>
<meta http-equiv="refresh" content="30"/>

<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
		<?php 
		include_once('lmmenup2.php');
		?>


	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					</div> <!-- end content-module-heading -->
					
				

				<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
  <?php
  if(isset($_POST['search'])){
	  $insurancenmber = $_POST['country_id'];
$sqlresult = ("select id,affiliate_number,names,lname,affiliate_names,afilliate_lastname,dob,date,patient_id,time_reception,origine,branch  from patient JOIN consultation ON consultation.patient_id = patient.id WHERE affiliate_number = '$insurancenmber'  AND status = 'LABORATOIRE'");
  }
  else{
	$sqlresult = ("select id,affiliate_number,names,lname,affiliate_names,afilliate_lastname,dob,date,patient_id,time_reception,origine,branch  from patient JOIN consultation ON consultation.patient_id = patient.id WHERE  status = 'LABORATOIRE'");
    }
	$result = mysqli_query($conn, $sqlresult);

?>  
<body>
    						<div class="content-module-main cf" style="width:50%;margin-left:15%;">

				<form method="POST" action="">
                <div class="label_div"><strong>Number To Search:</strong> </div>
                <div class="input_container">
                    <input type="text" id="country_id" name="country_id" onkeyup="autocomplet()" autocomplete="off" required aria-required='true' aria-describedby='name-format' placeholder="Search Insurance Number">
                   &nbsp;&nbsp;&nbsp;&nbsp; <ul id="country_list_id"></ul><input type="submit" name="search" value="SEARCH"></div></div>
	</div>	</div>	
	<?PHP
	if ($result->num_rows > 0) {?>
	 <table align="left" style="width:50%;margin-left:25%;">

				<tr><th>No</th><th>Affiliation Number</th><th>Beneficiary Names</th><th>Age</th><th>Date of Reception</th><th>Origine</th><th>Select</th></tr>
				<?php 
	
			while($rowval = mysqli_fetch_assoc($result)) {
				$affnumber = $rowval['id'];
				$branch = $rowval['branch'];
			 $affnumber = my_encrypt($affnumber, $key);

			?>	
	<tr>
	<td><strong><?php echo ++$i;?>&nbsp;&nbsp;&nbsp;</td>
	<td><strong><?php echo $rowval['affiliate_number'];?></td>
	<td><strong><?php echo $rowval['names'].'&nbsp;&nbsp;&nbsp;'.$rowval['lname'];?></td>
	<td><strong><?php echo $rowval['dob'];?></td>
	<td><strong><?php echo $rowval['time_reception'];?></td>
	<td><strong><?php echo $rowval['origine'];?></td>
	<td>
	<?php 
	if($branch !='')
	{
	?>
	<a href = "nlaboratory?affid=<?php echo urlencode($affnumber); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>&amp;LDTlab=<?php echo urlencode($rowval['time_reception']); ?>"><font color="#CD5C5C"><strong>Redirected</font></a>
	<?php
	}
	else
	{
	?>
	<a href = "nlaboratory?affid=<?php echo urlencode($affnumber); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>&amp;LDTlab=<?php echo urlencode($rowval['time_reception']); ?>">Select</a>
	<?php
	}
	?>
	
	</td>
	</tr>
<?php
}
echo "<tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>";		
	
?>

	</table><?PHP
	}
	ELSE{
				$msg = "<h1 align='center'><font color='red'> No Patient in Laboratory</font></h1>";

	}
	?>			</form>
	
	</div><?php echo $msg;?><br><br><br>	</div>	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<div id="footer">
		<p><strong>Powed By Vision Soft Ltd .</strong></p>
	
	</div>				
</html>