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
<head>
<title> Report</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
$date = $_POST['datesearch'];
$date1 = $_POST['datesearch1'];
$result = ("SELECT patient.names,patient.lname,patient.insurance,patient.category,patient.policeno,patient.affiliate_number,patient.gender,patient.dob,patient.affiliate_names,patient.afilliate_lastname,patient.familycode,consomation.consultatiobn,consomation.datecunsuption,sum(consomation.upmedicamnet*consomation.qtymedicamnet)as totmedicament,sum(consomation.UPcons*consomation.Qcons) as totconsommables,
 sum(consomation.upacte*consomation.qtyacte) AS totacte,sum(consomation.uphospitalizations*consomation.qtyhoapitalization)AS tot_hosp,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,sum(consomation.upambullance*consomation.qtyambullance) AS amtambul,patient.null_tm,consomation.postedesante
 FROM consomation JOIN  patient ON consomation.id=patient.id  WHERE policeno = 'hosp' AND datecunsuption >= '$date' and datecunsuption <= '$date1'  GROUP BY affiliate_number,datecunsuption ORDER BY datecunsuption");
$resultselect = mysqli_query($conn, $result);

 /*
 
$result1 = ("SELECT patient.names,patient.lname,patient.insurance,patient.category,patient.affiliate_number,patient.gender,patient.dob,patient.affiliate_names,patient.afilliate_lastname,patient.familycode,consomation.consultatiobn,consomation.datecunsuption,sum(consomation.upmedicamnet*consomation.qtymedicamnet)as totmedicament,sum(consomation.UPcons*consomation.Qcons) as totconsommables,
 sum(consomation.upacte*consomation.qtyacte) AS totacte,sum(consomation.uphospitalizations*consomation.qtyhoapitalization)AS tot_hosp,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,sum(consomation.upambullance*consomation.qtyambullance) AS amtambul,patient.null_tm,consomation.postedesante
 FROM consomation JOIN  patient ON consomation.id=patient.id WHERE insurance='MUTUELLE' and postedesante = 'POSTE DE SANTE KABUGA'  AND datecunsuption >= '$date' and datecunsuption <= '$date1'  GROUP BY affiliate_number,datecunsuption
  UNION ALL SELECT up_pname AS names,up_plname AS lname,up_insurance,up_pcateg as category,up_afnumber AS affiliate_number,up_pgender AS gender,up_pdob AS dob,up_afnme AS affiliate_names,up_aflname as afilliate_lastname,up_famcode as familycode,up_consom_sonsultation AS consultatiobn,datecunsuption,sum(up_cons_upmedic*up_cons_qytmedic)as totmedicament,sum(up_upcons*up_qtycons) as totconsommables,
 sum(up_upacte*up_qtyacte) AS totacte,sum(up_uphospita*up_qtyhosp)AS tot_hosp,sum(up_upexame*up_qtyexame) as totexamens,sum(up_upambul*up_qtyambul) AS amtambul,null_tm,postedesante
 FROM  consomation_upload  WHERE up_insurance='MUTUELLE' and postedesante = 'POSTE DE SANTE KABUGA' AND datecunsuption >= '$date' and datecunsuption <= '$date1'  GROUP BY affiliate_number,datecunsuption ORDER BY datecunsuption ");

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
  
       
          <td width="45">
		           <div  align="CENTER"><strong>HOSPITALIZATION IN Kulu HEALTH CENTER</strong></div>
          
     </div>
          <td height="20"></td>
        </tr>
        <tr>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td><table cellpadding="" id="example" cellspacing="" border="0" class="altrowstable">
              <tr>
			<th>No</th>
			<th>DATE </th>
			<th>BENEFICIARY'S NAMES</th>
			<th>BENEFICARY AFFILLIATION NUMBER</th>
			<th>AGE</th>
			<th>GENDER</th>
			<th>INSURANCE</th>
			<th>COST FOR CONSULT</th>
    		<th>COST FOR LABORATORY TEST</th>
			<th>COST FOR MEDICAL MAGING</th>
			<th>COST FOR HOSPITALIZATION</th>
			<th>COST FOR PROCIDURE AND MATERIALS</th>
			<th>COST FOR OTHER CONSUMABLES</th>
			<th>COST FOR DRUGS</th>
			<th>TOTAL AMOUNT</th>
			<th>DETERRENT FEES</th>
			<th>TOTAL AMOUNT TO BE PAID</th>

			
			  
		<?php
			while ($row = mysqli_fetch_assoc($resultselect))
{
	$ambul = $row['amtambul'];
	$categ = $row['category'];
	$date = $row['datecunsuption'];

$nulltm = $row['null_tm'];

	if(($nulltm == 'Yes' or $categ == 1) AND ($date >='2017-10-26')){
	$ticketmod = 0;		
	}
	else if(($nulltm == 'Yes') AND ($date < '2017-10-26')){
	$ticketmod = 0;		
	}

	else{
	$ticketmod =200;	
	}
	if($ambul != 0){
		$modticket = $ambul/10;
	}
	else{
		$modticket =0;
	}
	$ticketmod1 = $ticketmod+$modticket;
$originalDate = $row['datecunsuption'];
$newDate = date("d/m/Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row['datecunsuption']));
$totals= $row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament']+$row['tot_hosp']+$row['amtambul'];
$verified=($row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament']+$row['tot_hosp']+$row['amtambul'])-$ticketmod1;
?>
			
				<tr>
				<td><?php 
							$tm=$tm+1;
						 echo $tm; ?></td>
						<td width="60px"><?php echo $newDate;?></td>
		<td><?php echo $row['names'].' '.$row['lname'];?></td>
						<td width="60px"><?php echo  $row['affiliate_number'];?></td>
						<td><?php echo $row['dob'];?></td>
						<td><?php echo $row['gender'];?></td>
						<td><?php echo $row['insurance'];?></td>
						<td><?php echo $row['consultatiobn'];?></td>
						<td><?php echo number_format((float)$row['totexamens'], 1);?></td>
						<td><?php echo 0;?></td>
						<td><?php echo number_format((float)$row['tot_hosp'], 1);?></td>
						<td><?php echo number_format((float)$row['totacte'], 1);?></td>
						<td><?php echo number_format((float)$row['totconsommables'], 1);?></td>
						<td><?php echo number_format((float)$row['totmedicament'], 1);?></td>
						<td><?php echo number_format((float)$totals, 1);?></td>
						<td><?php echo $ticketmod1; ?></td>
						<td><?php echo number_format((float)$verified,1);?></td>
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
		$ambul1 = $row1['amtambul'];

$nulltm1 = $row1['null_tm'];

	if($nulltm1== 'Yes'){
	$ticketmod1 = 0;		
	}

	else{
	$ticketmod1 =200;	
	}
	if($ambul1 != 0){
		$modticket1 = $ambul1/10;
	}
	else{
		$modticket1 =0;
	}
	$ticketmod11 = $ticketmod1+$modticket1;
$originalDate = $row1['datecunsuption'];
$newDate = date("d/m/Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row['datecunsuption']));
$totals1= $row1['consultatiobn']+$row1['totexamens']+$row1['totacte']+$row1['totconsommables']+$row1['totmedicament']+$row1['tot_hosp']+$row1['amtambul'];
$verified1=($row1['consultatiobn']+$row1['totexamens']+$row1['totacte']+$row1['totconsommables']+$row1['totmedicament']+$row1['tot_hosp']+$row1['amtambul'])-$ticketmod11;
?>
	<tr>
				<td><?php 
							$tm=$tm+1;
						 echo $tm; ?></td>
						<td width="60px"><?php echo $newDate;?></td>
		<td><?php echo $row1['names'].' '.$row1['lname'];?></td>
						<td width="60px"><?php echo $row1['affiliate_number'];?></td>
						<td><?php echo $row1['dob'];?></td>
						<td><?php echo $row1['gender'];?></td>
						<td><?php echo $row1['consultatiobn'];?></td>
						<td><?php echo number_format((float)$row1['totexamens'], 1);?></td>
						<td><?php echo 0;?></td>
						<td><?php echo number_format((float)$row1['tot_hosp'], 1);?></td>
						<td><?php echo number_format((float)$row1['totacte'], 1);?></td>
						<td><?php echo number_format((float)$row1['totconsommables'], 1);?></td>
						<td><?php echo number_format((float)$row1['totmedicament'], 1);?></td>
						<td><?php echo number_format((float)$totals1, 1);?></td>
						<td><?php echo $ticketmod11; ?></td>
						<td><?php echo number_format((float)$verified1,1);?></td>
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
$total_coopymt1=$total_coopymt1+$ticketmod11;
$total_verified1=$total_verified1+$verified1;
} 
;
?>

<tr>
<th colspan="7">TOTALS</th>
<th><?php echo number_format((float)$total_consult +$total_consult1,1);?></th>
<th><?php echo number_format((float)$total_lab+$total_lab1,1);?></th>
<th><?php echo number_format((float)0,1);?></th>
<th><?php echo number_format((float)$total_hospitalisation+$total_hospitalisation1,1);?></th>
<th><?php echo number_format((float)$total_acte+$total_acte1,1);?></th>
<th><?php echo number_format((float)$total_consumable+$total_consumable1,1);?></th>
<th><?php echo number_format((float)$total_medicine+$total_medicine1,1);?></th>
<th><?php echo number_format((float)$total_onehparcent+$total_onehparcent1,1);?></th>
<th><?php echo number_format((float)$total_coopymt+$total_coopymt1,1);?></th>
<th><?php echo number_format((float)$total_verified+$total_verified1,1);?></th>
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
  <br><br><br><br>
   <div><table><tr><td></td><td></td><td><strong></strong></td><td></td><td></td><td></td><td></td><td></td></tr></table></div>

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
