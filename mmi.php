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
error_reporting(0);
include_once('connect_db.php');

session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];
  
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or ($role!="Manager")){
      header('Location: logout');
	}
else{
	$sql=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Displayed Invoice Mutuelle',now())");
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> Report</title>

</head>
<style type="text/css" media="print">
.hide{display:none}
</style>
<style type="text/css">
table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
	empty-cells: hide;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
	
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}
</style>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
document.getElementById('printButton1').style.visibility="hidden";

window.print();
document.getElementById('printButton').style.visibility="visible"; 
document.getElementById('printButton1').style.visibility="hidden";
 
}
</script>
<body>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
<input name="print" type="button" value="Print" id="printButton1" onClick="printpage()">
<input type="button" id="printButton" onclick="tableToExcel('example', 'W3C Example Table')" value="Export To Excel">
<?php
$tm=0;
$month=date("m"); 

$sql = ("SELECT patient.names,patient.lname,patient.insurance,patient.category,patient.affiliate_number,patient.gender,patient.dob,patient.affiliate_names,patient.afilliate_lastname,patient.familycode,patient.pagenumber,patient.affectation,consomation.consultatiobn,consomation.datecunsuption,sum(consomation.upmedicamnet*consomation.qtymedicamnet)as totmedicament,sum(consomation.UPcons*consomation.Qcons) as totconsommables,
 sum(consomation.upacte*consomation.qtyacte) AS totacte,sum(consomation.uphospitalizations*consomation.qtyhoapitalization)AS tot_hosp,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,sum(consomation.upambullance*consomation.qtyambullance) AS amtambul,patient.null_tm,consomation.postedesante
 FROM consomation JOIN  patient ON consomation.id=patient.id WHERE insurance='MMI' and MONTH(datecunsuption)= MONTH(CURDATE()) and YEAR(datecunsuption)= YEAR(CURDATE())  and comments != 'photocopy' GROUP BY affiliate_number,datecunsuption
 UNION ALL SELECT up_pname AS names,up_plname AS lname,up_insurance,up_pcateg as category,up_afnumber AS affiliate_number,up_pgender AS gender,up_pdob AS dob,up_afnme AS affiliate_names,up_aflname as afilliate_lastname,up_famcode as familycode,up_pagenumber AS pagenumber,affectation,up_consom_sonsultation AS consultatiobn,datecunsuption,sum(up_cons_upmedic*up_cons_qytmedic)as totmedicament,sum(up_upcons*up_qtycons) as totconsommables,
 sum(up_upacte*up_qtyacte) AS totacte,sum(up_uphospita*up_qtyhosp)AS tot_hosp,sum(up_upexame*up_qtyexame) as totexamens,sum(up_upambul*up_qtyambul) AS amtambul,null_tm,postedesante
 FROM  consomation_upload WHERE up_insurance='MMI' and MONTH(datecunsuption)= MONTH(CURDATE())and YEAR(datecunsuption)= YEAR(CURDATE()) GROUP BY affiliate_number,datecunsuption ORDER BY datecunsuption ");
$result = mysqli_query($conn, $sql);

 
/*
$result1 = ("SELECT patient.names,patient.lname,patient.insurance,patient.category,patient.affiliate_number,patient.gender,patient.dob,patient.affiliate_names,patient.afilliate_lastname,patient.familycode,patient.pagenumber,patient.affectation,consomation.consultatiobn,consomation.datecunsuption,sum(consomation.upmedicamnet*consomation.qtymedicamnet)as totmedicament,sum(consomation.UPcons*consomation.Qcons) as totconsommables,
 sum(consomation.upacte*consomation.qtyacte) AS totacte,sum(consomation.uphospitalizations*consomation.qtyhoapitalization)AS tot_hosp,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,sum(consomation.upambullance*consomation.qtyambullance) AS amtambul,patient.null_tm,consomation.postedesante
 FROM consomation JOIN  patient ON consomation.id=patient.id WHERE insurance='MMI' and postedesante = 'POSTE DE SANTE KABUGA' and MONTH(datecunsuption)= MONTH(CURDATE())GROUP BY affiliate_number,datecunsuption
 UNION ALL SELECT up_pname AS names,up_plname AS lname,up_insurance,up_pcateg as category,up_afnumber AS affiliate_number,up_pgender AS gender,up_pdob AS dob,up_afnme AS affiliate_names,up_aflname as afilliate_lastname,up_famcode as familycode,up_pagenumber AS pagenumber,affectation,up_consom_sonsultation AS consultatiobn,datecunsuption,sum(up_cons_upmedic*up_cons_qytmedic)as totmedicament,sum(up_upcons*up_qtycons) as totconsommables,
 sum(up_upacte*up_qtyacte) AS totacte,sum(up_uphospita*up_qtyhosp)AS tot_hosp,sum(up_upexame*up_qtyexame) as totexamens,sum(up_upambul*up_qtyambul) AS amtambul,null_tm,postedesante
 FROM  consomation_upload WHERE up_insurance='MMI' and postedesante = 'POSTE DE SANTE KABUGA' and MONTH(datecunsuption)= MONTH(CURDATE())GROUP BY affiliate_number,datecunsuption ORDER BY datecunsuption ");

 */
$total_consult=0;
$total_acte=0;
$total_lab=0;
$total_consumable=0; 
$total_medicine=0;
$total_onehparcent=0;
$total_coopymt=0;
$total_verified=0;
?>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
 
      <table width="595" border="0" cellspacing="0" cellpadding="0">
       
        <tr>
          <td height="30" align="center"><strong></strong></td>
        </tr>
        <tr>
          <td height="30" align="center">&nbsp;</td>
        </tr>
        <tr>
          <td align="right"></td>
        </tr>
        <tr>
          <td width="45">
		           <div align="left">
				   <table>
              <tr><td>  <strong>PROVINCE/:&nbsp;&nbsp;&nbsp;&nbsp;DD</strong></td></tr>
                <tr><td>  <strong>ADMINISTRATIVE  DISTRICT:&nbsp;&nbsp;&nbsp;&nbsp;Kulu</strong></td></tr>
                <tr><td>  <strong>ADMINISTRATIVE  SECTION:&nbsp;&nbsp;&nbsp;&nbsp;Kulu</strong></td></tr>
                <tr><td>  <strong>ADMINISTRATIVE  HEALTH FACILITY:&nbsp;&nbsp;&nbsp;&nbsp;Kulu</strong></td></tr>
        </tr>
        <tr>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
			  <form method="POST" action="mmi1">
                <td width="45"></td>
                <td width="393"><strong>MMI FOR:&nbsp;&nbsp;&nbsp;&nbsp; <?php echo date('F') ?> <?php echo date('Y') ?></strong></td>
                <td width="41"><input type="text" name="datesearch" id="datesearch" placeholder="Start Date" required aria-required='true' aria-describedby='name-format'placeholder="Start Date"  autocomplete="off"></td>
				<td></td>
                <td width="116"><input type="text" name="datesearch1" id="datesearch1" placeholder="End Date" required aria-required='true' aria-describedby='name-format'placeholder="End Date"  autocomplete="off"></td>
								<td></td>
                <td width="116"><input type="submit" name="submit" value="DISPLAY"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				</form>
	            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td><table cellpadding="" id="example" cellspacing="" border="0" class="altrowstable">
               <tr>
			<th>No</th>
			<th>DATE </th>
			<th>VOUCHER IDENTIFICATION</th>
			<th>BENEFICARY_AFFILLIATION NUMBER</th>
			<th>BENEFICIARY'S AGE</th>
			<th>BENEFICARY'S GENDER</th>
			<th>BENEFICIARY'S NAMES</th>
			<th>AFFILIATE'S NAMES</th>
			<th>AFFILIATE'S AFFECTATION</th>
			<th>COST FOR CONSULT</th>
    		<th>COST FOR LABORATORY TEST</th>
    		<th>COST FOR MEDICAL IMAGING</th>
    		<th>COST FOR HOSPITALIZATION</th>
			<th>COST FOR PROCIDURE AND MATERIALS</th>
			<th>COST FOR OTHER CONSUMABLES</th>
			<th>COST FOR MEDICINES</th>
			<th>TOTAL AMOUNT 100%</th>
			<th>TOTAL AMOUNT 85%</th>
			<th>TOTAL AMOUNT 15%)</th>
			</tr>
			
			
			

			
			  
		<?php
						while($row = mysqli_fetch_assoc($result)) {

		
$originalDate = $row['datecunsuption'];
$newDate = date("d/m/Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row['datecunsuption']));
$totals= $row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament']+$row['tot_hosp']+$row['amtambul'];
$ambul = $row['amb'];

$nulltm = $row['null_tm'];

	if($nulltm == 'Yes'){
	$ticketmod = 0;		
	}

	else{
	$ticketmod =$totals * 0.15;	
	}
	if($ambul == 'yes'){
		$modticket = 2400;
	}
	else{
		$modticket =0;
	}
	$ticketmod1 = $ticketmod+$modticket;
$verified=($row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament']+$row['tot_hosp']+$row['amtambul'])-$ticketmod1;
?>
			
				<tr>
				<td><?php 
							$tm=$tm+1;
						 echo $tm; ?></td>
						<td width="60px"><?php echo $newDate;?></td>
						<td><?php echo $row['pagenumber'];?></td>
						<td width="60px"><?php echo $row['affiliate_number'];?></td>
						<td><?php echo $row['dob'];?></td>
						<td><?php echo $row['gender'];?></td>
						<td><?php echo $row['names'].' '.$row['lname'];?></td>
						<td><?php echo $row['affiliate_names'].' '.$row['afilliate_lastname'];?></td>
						<td><?php echo $row['affectation'];?></td>
						<td><?php echo $row['consultatiobn'];?></td>
						<td><?php echo number_format((float)$row['totexamens'], 1);?></td>
						<td><?php echo 0;?></td>
						<td><?php echo number_format((float)$row['tot_hosp'], 1);?></td>
						<td><?php echo number_format((float)$row['totacte'], 1);?></td>
						<td><?php echo number_format((float)$row['totconsommables'], 1);?></td>
						<td><?php echo number_format((float)$row['totmedicament'], 1);?></td>
						<td><?php echo number_format((float)$totals, 1);?></td>
						<td><?php echo number_format((float)$verified,1);?></td>
						<td><?php echo number_format((float) $ticketmod1,1); ?></td>

              </tr>
			  	
<?php 
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
;
?>

			
			<?php
			while ($row1 = mysqli_fetch_assoc($result1))
{
		
$originalDate = $row1['datecunsuption'];
$newDate = date("d/m/Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row1['datecunsuption']));
$totals1= $row1['consultatiobn']+$row1['totexamens']+$row1['totacte']+$row1['totconsommables']+$row1['totmedicament']+$row1['tot_hosp']+$row1['amtambul'];
$ambul = $row1['amb'];

$nulltm = $row1['null_tm'];

	if($nulltm == 'Yes'){
	$ticketmod0 = 0;		
	}

	else{
	$ticketmod0 =$totals1 * 0.15;	
	}
	if($ambul == 'yes'){
		$modticket0 = 2400;
	}
	else{
		$modticket0 =0;
	}
	$ticketmod10 = $ticketmod0+$modticket0;
$verified1=($row1['consultatiobn']+$row1['totexamens']+$row1['totacte']+$row1['totconsommables']+$row1['totmedicament']+$row1['tot_hosp']+$row1['amtambul'])-$ticketmod10;
?>
			
				<tr>
				<td><?php 
							$tm=$tm+1;
						 echo $tm; ?></td>
						<td width="60px"><?php echo $newDate;?></td>
						<td><?php echo $row1['pagenumber'];?></td>
						<td width="60px"><?php echo $row1['affiliate_number'];?></td>
						<td><?php echo $row1['dob'];?></td>
						<td><?php echo $row1['gender'];?></td>
						<td><?php echo $row1['names'].' '.$row1['lname'];?></td>
						<td><?php echo $row1['affiliate_names'].' '.$row1['afilliate_lastname'];?></td>
						<td><?php echo $row1['affectation'];?></td>
						<td><?php echo $row1['consultatiobn'];?></td>
						<td><?php echo number_format((float)$row1['totexamens'], 1);?></td>
						<td><?php echo 0;?></td>
						<td><?php echo number_format((float)$row1['tot_hosp'], 1);?></td>
						<td><?php echo number_format((float)$row1['totacte'], 1);?></td>
						<td><?php echo number_format((float)$row1['totconsommables'], 1);?></td>
						<td><?php echo number_format((float)$row1['totmedicament'], 1);?></td>
						<td><?php echo number_format((float)$totals1, 1);?></td>
						<td><?php echo number_format((float)$verified1,1);?></td>
						<td><?php echo number_format((float) $ticketmod10,1); ?></td>

              </tr>
			  	
<?php 
$total_consult1=$total_consult1+$row1['consultatiobn'];
$total_acte1=$total_acte1+$row1['totacte'];
$total_lab1=$total_lab1+$row1['totexamens'];
$total_consumable1=$total_consumable1+$row1['totconsommables'];
$total_medicine1=$total_medicine1+$row1['totmedicament'];
$total_hospitalisation1= $total_hospitalisation1+$row1['tot_hosp'];
$total_onehparcent1=$total_onehparcent1+$totals1;
$tot_amt1 = $tot_amt1+$row1['amtambul'];
$total_coopymt1=$total_coopymt1+$ticketmod10;
$total_verified1=$total_verified1+$verified1;
} 
;
?>

</tr>
<tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
<th> TOTALS</th>
<th><?php echo number_format((float)$total_consult +$total_consult1,1);?></th>
<th><?php echo number_format((float)$total_lab+$total_lab1,1);?></th>
<th><?php echo number_format((float)0,1);?></th>
<th><?php echo number_format((float)$total_hospitalisation+$total_hospitalisation1,1);?></th>
<th><?php echo number_format((float)$total_acte+$total_acte1,1);?></th>
<th><?php echo number_format((float)$total_consumable+$total_consumable1,1);?></th>
<th><?php echo number_format((float)$total_medicine+$total_medicine1,1);?></th>
<th><?php echo number_format((float)$total_onehparcent+$total_onehparcent1,1);?></th>
<th><?php echo number_format((float)$total_verified+$total_verified1,1);?></th>
<th><?php echo number_format((float)$total_coopymt+$total_coopymt1,1);?></th>

</tr>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
<script>
var tableToExcel = (function() {
var uri = 'data:application/vnd.ms-excel;base64,'
, template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
return function(table, name) {
if (!table.nodeType) table = document.getElementById(table)
var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
window.location.href = uri + base64(format(template, ctx))
}
})()
</script>
</html>
