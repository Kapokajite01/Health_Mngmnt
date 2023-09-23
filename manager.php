<?php
error_reporting(0);
include_once('connect_db.php');
session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];
      if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}
else{
	$sql=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Login',now())");
	}
?>
<!DOCTYPE html>
<?php
$tm=0;
$month=date("m"); 
$sql = ("SELECT patient.names,patient.lname,patient.insurance,patient.category,patient.affiliate_number,patient.gender,patient.dob,patient.affiliate_names,patient.afilliate_lastname,patient.familycode,consomation.consultatiobn,consomation.datecunsuption,sum(consomation.upmedicamnet*consomation.qtymedicamnet)as totmedicament,sum(consomation.UPcons*consomation.Qcons) as totconsommables,
 sum(consomation.upacte*consomation.qtyacte) AS totacte,sum(consomation.uphospitalizations*consomation.qtyhoapitalization)AS tot_hosp,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,sum(consomation.upambullance*consomation.qtyambullance) AS amtambul,patient.null_tm,consomation.postedesante
 FROM consomation JOIN  patient ON consomation.id=patient.id WHERE  MONTH(datecunsuption)= MONTH(CURDATE())and YEAR(datecunsuption)= YEAR(CURDATE())GROUP BY affiliate_number,datecunsuption ");
$result = mysqli_query($conn, $sql);
$total_consult=0;
$total_acte=0;
$total_lab=0;
$total_consumable=0; 
$total_medicine=0;
$total_onehparcent=0;
$total_coopymt=0;
$total_verified=0;

?>
			
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">

	 
  		<?php
			while ($row = mysqli_fetch_assoc($result))
{
		$ambul = $row['amb'];

$nulltm = $row['null_tm'];
$insur = $row['insurance'];

	if($nulltm == 'Yes'){
	$ticketmod = 0;		
	}

	else{
	$ticketmod =200;	
	}
	if($ambul == 'yes'){
		$modticket = 2400;
	}
	else{
		$modticket =0;
	}
$originalDate = $row['datecunsuption'];
$newDate = date("d/m/Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row['datecunsuption']));
$totals= $row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament']+$row['tot_hosp']+$row['amtambul'];
	if($insur == 'RAMA/RSSB' OR $insur== 'MEDIPLA' OR $insur=='RADIANT' OR $insur=='MMI'){
		
		$ticketmod = $totals*0.15;
	}
	if($insur == 'NO INSURANCE'){
		
		$ticketmod = $totals*1;
	}
	$ticketmod1 = $ticketmod+$modticket;
$verified=($row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament']+$row['tot_hosp']+$row['amtambul'])-$ticketmod1;

$total_consult=$total_consult+$row['consultatiobn'];
$total_acte=$total_acte+$row['totacte'];
$total_lab=$total_lab+$row['totexamens'];
$total_consumable=$total_consumable+$row['totconsommables'];
$total_medicine=$total_medicine+$row['totmedicament'];
$total_hospitalisation= $total_hospitalisation+$row['tot_hosp'];
$total_onehparcent=$total_onehparcent+$totals;
$tot_amt = $tot_amt+$row['amtambul'];
$total_coopymt=$total_coopymt+$ticketmod1;
$total_verified=$total_verified+$verified;
}
 
?>

 

</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	

<div class="side-menu fl">
				
				<h3>Quick Links</h3>
				<ul>
					<li><a href="manage_medicines">Add/Edit Medicines</a></li>
					<li><a href="manage_consumable">Add/Edit Consumables</a></li>
					<li><a href="manage_act">Add/Edit Medical Acts</a></li>
					<li><a href="manage_lab_test">Add/Edit Lab Tests</a></li>
					<li><a href="manage_hospitalisation">Add/Edit Hospitalisation</a></li>
					<li><a href="search_patient">Edit Record</a></li>
					<li><a href="edit_patient">Edit Patient</a></li>
				</ul>
                                
                                 
			</div> <!-- end side-menu -->
			<div class="content-module-main cf">
				
							<h1 align="center"><strong> All Incomes  In  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo date(" F Y ");?></strong><hr></hr> </h1>
								<table style="width:600px; margin-left:150px; float:left;" border="0" cellspacing="0" cellpadding="0">
								  <tr>
									<td width="250" align="left">&nbsp;</td>
									<td width="150" align="left">&nbsp;</td><td width="250" align="left"></td><td></td>
								  </tr>
								  <tr>
									<td align="left"><strong>Incomes For Consultation</strong></td>
									<td align="left"><strong><?php echo number_format((float)$total_consult +$total_consult1,1);?></strong>&nbsp;</td><td align="left"><strong>Incomes For Consumables</strong></td>
									<td align="left"><?php echo '<strong>'.number_format((float)$total_consumable+$total_consumable1, 1).'</strong>';?></td>
								  </tr>
								  <tr>
									<td align="left">&nbsp;</td>
									<td align="left">&nbsp;</td>
								  </tr>
								  <tr>
									<td align="left"><strong>Hospitalisation</strong></td>
									<td align="left"><?php echo '<strong>'.number_format((float)$total_hospitalisation+$total_hospitalisation1,1).'</strong>';?></td><td align="left"><strong>Incomes For Medical Act</strong> </td><td align="right"><?php echo '<strong>'. number_format((float)$total_acte+$total_acte1,1).'</strong>';?></td>
								  </tr>
								  <tr>
									<td align="left"><strong>Ambullances</strong></td>
									<td align="left"><?php echo '<strong>'.number_format((float)$tot_amt+$tot_amt1,1).'</strong>';?></td><td align="left"><strong>Incomes For Laboratory Test</strong> </td><td align="right"><?php  echo '<strong>'. number_format((float)$total_lab+$total_lab1,1).'</strong>';?></td>
								  </tr>
								  <tr>
									<td align="left"><strong></strong></td>
									<td align="left"></td><td align="left"><strong><strong>Incomes For Medicines</strong></strong></td>
									<td align="left"><strong><?php echo number_format((float)$total_medicine+$total_medicine1,1);?></strong></td><td align="left"></td><td align="right"></td>
								  </tr>
								   <tr>
									<td align="left"><strong><hr></strong></td>
									<td align="left"><hr></td><td align="left"><strong><hr></strong></td>
									<td align="left"<hr></td><td align="left"></td><td align="right"><hr></td>
								  </tr>
								  
								  <tr>
									<td align="left"><strong>Insurances</strong></td>
									<td align="left"><strong><?php echo number_format((float)$total_verified+$total_verified1,1);?></strong></td><td align="left"><strong>Copayment</strong></td>
									<td align="left"><strong><?php echo number_format((float)$total_coopymt+$total_coopymt1,1);?><strong></td><td align="left"></td><td align="right"></td>
								  </tr>
			<tr>
									
								  </tr>					  <tr>
									<td align="left">&nbsp;</td>
									<td align="left">&nbsp;</td>
								  </tr>	
 <tr>
									<td align="left"><strong><hr></strong></td>
									<td align="left"><hr></td><td align="left"><strong><hr></strong></td>
									<td align="left"<hr></td><td align="left"></td><td align="right"><hr></td>
								  </tr>								  
								  <tr>
									<td align="left"> </td>
									<td align="left"> <h1><strong>Total Incomes &nbsp;&nbsp;</strong></td><td><h1><strong><?php echo number_format((float)$total_onehparcent+$total_onehparcent1,1);?></strong></h1></td><td></td> </tr>
						  </table>
                     </div>   
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
<!-- FOOTER -->
	<div id="footer">

		<p>Powed By Vision Soft Ltd .</p>
	</div> <!-- end footer -->
</body>

</html>


