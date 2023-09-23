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
$date = $_POST['datesearch'];
$date1 = $_POST['datesearch1'];
$sql = ("SELECT patient.names,patient.lname,patient.insurance,patient.category,patient.affiliate_number,patient.gender,patient.dob,patient.affiliate_names,patient.afilliate_lastname,patient.familycode,consomation.consultatiobn,consomation.datecunsuption,sum(consomation.upmedicamnet*consomation.qtymedicamnet)as totmedicament,sum(consomation.UPcons*consomation.Qcons) as totconsommables,
 sum(consomation.upacte*consomation.qtyacte) AS totacte,sum(consomation.uphospitalizations*consomation.qtyhoapitalization)AS tot_hosp,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,sum(consomation.upambullance*consomation.qtyambullance) AS amtambul,patient.null_tm,consomation.postedesante
 FROM consomation JOIN  patient ON consomation.id=patient.id  WHERE insurance='MUTUELLE'  AND datecunsuption >= '$date' and datecunsuption <= '$date1'  GROUP BY patient.id,names,datecunsuption ORDER BY datecunsuption ASC,consid ASC");
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
<table width="70%" border="0" cellspacing="0" cellpadding="0">
  
       
          <td width="45">
		           <div  align="right"><strong>PERIOD:&nbsp;&nbsp;THE MONTH OF :<?php  echo date("F", strtotime($date1.'00:00:00'));?>&nbsp;&nbsp;&nbsp;&nbsp;YEAR:<?php echo date("Y", strtotime($date1.'00:00:00'));?></strong></div>
          <table>
                            <tr><td>  <strong>PROVINCE/:&nbsp;&nbsp;&nbsp;&nbsp;DD</strong></td></tr>
                <tr><td>  <strong>ADMINISTRATIVE  DISTRICT:&nbsp;&nbsp;&nbsp;&nbsp;Kulu</strong></td></tr>
                <tr><td>  <strong>ADMINISTRATIVE  SECTION:&nbsp;&nbsp;&nbsp;&nbsp;Kulu</strong></td></tr>
                <tr><td>  <strong>ADMINISTRATIVE  HEALTH FACILITY:&nbsp;&nbsp;&nbsp;&nbsp;Kulu</strong></td></tr>
				<tr><td>  <strong>CODE  HEALTH FACILITY:&nbsp;&nbsp;&nbsp;&nbsp;-</strong></td></tr>

				<tr><td><strong>SUMMARY OF VOUCHER FOR Kulu SOCIAL SECURITY BOARD(RSSB)/CBHI</strong></tr>

				</td>
     </div>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
			  <form method="POST" action="mutuelle_union1.php">
                <td width="45"></td>
                <td width="393"></td>
                <td width="41"></td>
				<td></td>
                <td width="116"></td>
								<td></td>
                <td width="116"><td>
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
			<th>ME MBER'S CATE GORY</th>
			<th>BENEFICIARY'S NAMES</th>
			<th>ID NUMBER APPLICATION NUMBER OF BENEFICIARY</th>
			<th>AGE</th>
			<th>BENE FICIARY'S GENDER</th>
			<th>HEAD HOUSE HOLDER'S NAMES</th>	
			<th>ID NUMBER/ APPLICATION NUMBER OF HOUSEHOLD</th>	
			<th>COST FOR CONSULT</th>
    		<th>COST FOR LABO RATORY TEST</th>
			<th>COST FOR MEDICAL IMAGING</th>
			<th>COST FOR HOSPI TALI ZATION</th>
			<th>COST FOR PRO CIDURE AND MATE RIALS</th>
			<th>COST FOR OTHER CONSU MABLES</th>
			<th>COST FOR AMBU LANCE</th>
			<th>COST FOR DRUGS</th>
			<th>TOTAL AMOUNT</th>
			<th>CO PAYMENT</th>
			<th>AMOUNT AFTER VERIFI CATION</th>

			<tr>
			<th></th>
			<th> </th>
			<th></th>
			<th></th>	
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th>100%</th>
    		<th>100%</th>
			<th>100%</th>
			<th>100%</th>
			<th>100%</th>
			<th>100%</th>
			<th>100%</th>
			<th>100%</th>
			<th>200</th>
			<th>TOTAL</th>
			  
		<?php
			while ($row = mysqli_fetch_assoc($result))
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
$totals= ROUND($row['consultatiobn'])+ROUND($row['totexamens'])+ROUND($row['totacte'])+ROUND($row['totconsommables'])+ROUND($row['totmedicament'])+ROUND($row['tot_hosp'])+ROUND($row['amtambul']);
$verified=$totals-$ticketmod1;
?>
			
				<tr>
				<td><?php 
							$tm=$tm+1;
						 echo $tm; ?></td>
						<td width="60px"><?php echo $newDate;?></td>
						<td><?php echo $row['category'];?></td>
							<td><?php echo $row['names'].' '.$row['lname'];?></td>
<td style='mso-number-format:"\@"'><?php echo  $row['affiliate_number'];?></td>
						<td><?php echo $row['dob'];?></td>
						<td><?php echo $row['gender'];?></td>
<td><?php echo $row['affiliate_names'].' '.$row['afilliate_lastname'];?></td>
												<td style='mso-number-format:"\@"'>   <?php 
						$string = $row['familycode'];

				
						echo $string;
						
						
						
						?> </td>	

						<td><?php echo number_format($row['consultatiobn']);?></td>
						<td><?php echo number_format(ROUND($row['totexamens']));?></td>
						<td><?php echo 0;?></td>
						<td><?php echo number_format(ROUND($row['tot_hosp']));?></td>
						<td><?php echo number_format(ROUND($row['totacte']));?></td>
						<td><?php echo number_format(ROUND($row['totconsommables']));?></td>
						<td><?php echo number_format(ROUND($row['amtambul']));?></td>
						<td><?php echo number_format(ROUND($row['totmedicament']));?></td>
						<td><?php echo number_format(ROUND($totals));?></td>
						<td><?php echo $ticketmod1; ?></td>
						<td><?php echo number_format(ROUND($verified));?></td>
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
<tr>
<th  colspan="9">TOTALS</th>
<th><?php echo number_format(ROUND($total_consult ));?></th>
<th><?php echo number_format(ROUND($total_lab));?></th>
<th><?php echo (0);?></th>
<th><?php echo number_format(ROUND($total_hospitalisation));?></th>
<th><?php echo number_format(ROUND($total_acte));?></th>
<th><?php echo number_format(ROUND($total_consumable));?></th>
<th><?php echo number_format(ROUND($tot_amt));?></th>
<th><?php echo number_format(ROUND($total_medicine));?></th>
<th><?php echo number_format(ROUND ($total_onehparcent));?></th>
<th><?php echo number_format(ROUND($total_coopymt));?></th>
<th><?php echo number_format(ROUND($total_verified));?></th>
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
   <div><table><tr><td>&nbsp;&nbsp;</td><td>&nbsp;&nbsp;</td><td><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><STRONG>Verifi&#233;&nbsp;&nbsp;&nbsp; par:<br>NOM TUTILAIRE &nbsp;&nbsp;&nbsp;POST NOM TUTILAIRE</STRONG></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><STRONG>Approuv&#233; par:<br> NOM COMPTABLE &nbsp;&nbsp;&nbsp; POST NOM COMPTABLE</STRONG></td></tr></table></div>

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
