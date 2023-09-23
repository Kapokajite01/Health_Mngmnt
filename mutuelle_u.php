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
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or ($role!="Mutuelle")){
      header('Location: logout');
	}
include_once('connect_db.php');
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
window.print();
document.getElementById('printButton').style.visibility="visible";  
}
</script>
<?php
error_reporting(0);

?>
<body>
<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
<input type="button" onclick="tableToExcel('example', 'W3C Example Table')" value="Export To Excel">
<?php
$tm=0;
$month=date("m"); 
$result = ("SELECT patient.id as pid,patient.names,patient.afilliate_lastname,patient.lname,patient.affiliate_names,patient.familycode,patient.affectation,patient.insurance,patient.dob,patient.category,patient.gender,
patient.affiliate_number,consomation.consid,consomation.consultatiobn,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,sum(consomation.upmedicamnet*consomation.qtymedicamnet) 
as totmedicament,consomation.consommable,consomation.UPcons,consomation.Qcons,sum(consomation.UPcons*consomation.Qcons) as totconsommables,consomation.actemedicale,consomation.upacte,consomation.qtyacte,sum(consomation.upacte*consomation.qtyacte) AS totacte,consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,consomation.datecunsuption FROM consomation JOIN  patient ON consomation.id=patient.id where insurance='MUTUELLE' and MONTH(datecunsuption)= MONTH(CURDATE()) GROUP BY pid,datecunsuption ORDER BY datecunsuption DESC,consid DESC");

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
                      
                  <strong>Ministry of Health</strong><br />
                  <strong>Kigali City</strong> <br />
                  <strong>Gasabo District</strong><br/>
                  <strong>Kacyiru Health Center</strong><br/>
                  
              </div><hr></td>
        </tr>
        <tr>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
			  <form method="POST" action="mutuelle_u1.php">
                <td width="45"></td>
                <td width="393"><strong>MUTUELLE DE SANTE FOR:&nbsp;&nbsp;&nbsp;&nbsp; <?php echo date('F') ?> <?php echo date('Y') ?></strong></td>
                <td width="41"><input type="text" name="datesearch" id="datesearch" placeholder="Start Date" required aria-required='true' aria-describedby='name-format'placeholder="Start Date"></td>
				<td></td>
                <td width="116"><input type="text" name="datesearch1" id="datesearch1" placeholder="End Date" required aria-required='true' aria-describedby='name-format'placeholder="End Date"></td>
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
			<th>MEMBER'S CATEGORY</th>
			<th>BENEFICARY_AFFILLIATION NUMBER</th>
			<th>AGE</th>
			<th>GENDER</th>
			<th>BENEFICIARY'S NAMES</th>
			<th>HEAD HOUSE HOLDER'S NAMES</th>
			<th>FAMILY'S CODE</th>
			<th>COST FOR CONSULT</th>
    		<th>COST FOR LABORATORY TEST</th>
			<th>COST FOR PROCIDURE AND MATERIALS</th>
			<th>COST FOR OTHER CONSUMABLES</th>
			<th>COST FOR DRUGS</th>
			<th>TOTAL AMOUNT 100%</th>
			<th>CO-PAYMENT (-200)</th>
			<th>AMOUNT AFTER VERIFICATION</th>

			</tr>
			  
		<?php
			while ($row = mysqli_fetch_assoc($result))
{
$originalDate = $row['datecunsuption'];
$newDate = date("d/m/Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row['datecunsuption']));
$totals= $row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament'];
$verified=($row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament'])-200;
?>
			
				<tr>
				<td><?php 
							$tm=$tm+1;
						 echo $tm; ?></td>
						<td width="60px"><?php echo $newDate;?></td>
						<td><?php echo $row['category'];?></td>
						<td width="60px"><?php echo $row['affiliate_number'];?></td>
						<td><?php echo $row['dob'];?></td>
						<td><?php echo $row['gender'];?></td>
						<td><?php echo $row['names'].' '.$row['lname'];?></td>
						<td><?php echo $row['affiliate_names'].' '.$row['afilliate_lastname'];?></td>
						<td><?php echo $row['familycode'];?></td>
						<td><?php echo $row['consultatiobn'];?></td>
						<td><?php echo number_format((float)$row['totexamens'], 1);?></td>
						<td><?php echo number_format((float)$row['totacte'], 1);?></td>
						<td><?php echo number_format((float)$row['totconsommables'], 1);?></td>
						<td><?php echo number_format((float)$row['totmedicament'], 1);?></td>
						<td><?php echo number_format((float)$totals, 1);?></td>
						<td>200</td>
						<td><?php echo number_format((float)$verified,1);?></td>



              </tr>
			  	
<?php 
$total_consult=$total_consult+$row['consultatiobn'];
$total_acte=$total_acte+$row['totacte'];
$total_lab=$total_lab+$row['totexamens'];
$total_consumable=$total_consumable+$row['totconsommables'];
$total_medicine=$total_medicine+$row['totmedicament'];
$total_onehparcent=$total_onehparcent+$totals;
$total_coopymt=$total_coopymt+200;
$total_verified=$total_verified+$verified;
} 
;
?>
<tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
<th>TOTALS</th>
<th><?php echo number_format((float)$total_consult,1);?></th>
<th><?php echo number_format((float)$total_lab,1);?></th>
<th><?php echo number_format((float)$total_acte,1);?></th>
<th><?php echo number_format((float)$total_consumable,1);?></th>
<th><?php echo number_format((float)$total_medicine,1);?></th>
<th><?php echo number_format((float)$total_onehparcent,1);?></th>
<th><?php echo number_format((float)$total_coopymt,1);?></th>
<th><?php echo number_format((float)$total_verified,1);?></th>
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
