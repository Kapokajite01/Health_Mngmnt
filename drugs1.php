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
$k = $_POST['datesearch'];
$k1 = $_POST['datesearch1'];
$drug = $_POST['Patient_ID'];
$category = $_POST['category'];
if($category == 'All'){
$result = ("SELECT patient.id as pid,patient.pagenumber as pn,patient.names,patient.afilliate_lastname,patient.lname,patient.affiliate_names,patient.familycode,patient.affectation,patient.insurance,patient.dob,patient.category,patient.gender,
patient.affiliate_number AS afnumber,patient.null_tm,consomation.consid,consomation.consultatiobn,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,sum(consomation.upmedicamnet*consomation.qtymedicamnet) 
as totmedicament,consomation.consommable,consomation.UPcons,consomation.Qcons,sum(consomation.UPcons*consomation.Qcons) as totconsommables,consomation.actemedicale,consomation.upacte,consomation.qtyacte,sum(consomation.upacte*consomation.qtyacte) AS totacte,
consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,consomation.hospitalization,consomation.uphospitalizations,consomation.qtyhoapitalization,
sum(consomation.uphospitalizations*consomation.qtyhoapitalization)AS tot_hosp,consomation.datecunsuption,consomation.ambullance,consomation.upambullance,consomation.qtyambullance,sum(consomation.upambullance*consomation.qtyambullance) AS amtambul,consomation.comments  
FROM consomation JOIN  patient ON consomation.id=patient.id where medicament !='' and medicament = '$drug'  and datecunsuption >='$k' and datecunsuption <='$k1'   GROUP BY afnumber,datecunsuption ORDER BY datecunsuption DESC,consid DESC");

}
else{
$result = ("SELECT patient.id as pid,patient.pagenumber as pn,patient.names,patient.afilliate_lastname,patient.lname,patient.affiliate_names,patient.familycode,patient.affectation,patient.insurance,patient.dob,patient.category,patient.gender,
patient.affiliate_number AS afnumber,patient.null_tm,consomation.consid,consomation.consultatiobn,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,sum(consomation.upmedicamnet*consomation.qtymedicamnet) 
as totmedicament,consomation.consommable,consomation.UPcons,consomation.Qcons,sum(consomation.UPcons*consomation.Qcons) as totconsommables,consomation.actemedicale,consomation.upacte,consomation.qtyacte,sum(consomation.upacte*consomation.qtyacte) AS totacte,
consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,consomation.hospitalization,consomation.uphospitalizations,consomation.qtyhoapitalization,
sum(consomation.uphospitalizations*consomation.qtyhoapitalization)AS tot_hosp,consomation.datecunsuption,consomation.ambullance,consomation.upambullance,consomation.qtyambullance,sum(consomation.upambullance*consomation.qtyambullance) AS amtambul,consomation.comments  
FROM consomation JOIN  patient ON consomation.id=patient.id where medicament !='' and medicament = '$drug'  and datecunsuption >='$k' and datecunsuption <='$k1'   and category = '$category' GROUP BY afnumber,datecunsuption ORDER BY datecunsuption DESC,consid DESC");
	
	
}
$resultselect = mysqli_query($conn, $result);




/*
$result1 = ("SELECT patient.id as pid,patient.pagenumber as pn,patient.names,patient.afilliate_lastname,patient.lname,patient.affiliate_names,patient.familycode,patient.affectation,patient.insurance,patient.dob,patient.category,patient.gender,
patient.affiliate_number AS afnumber,patient.null_tm,consomation.consid,consomation.consultatiobn,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,sum(consomation.upmedicamnet*consomation.qtymedicamnet) 
as totmedicament,consomation.consommable,consomation.UPcons,consomation.Qcons,sum(consomation.UPcons*consomation.Qcons) as totconsommables,consomation.actemedicale,consomation.upacte,consomation.qtyacte,sum(consomation.upacte*consomation.qtyacte) AS totacte,
consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,consomation.hospitalization,consomation.uphospitalizations,consomation.qtyhoapitalization,
sum(consomation.uphospitalizations*consomation.qtyhoapitalization)AS tot_hosp,consomation.datecunsuption,consomation.ambullance,consomation.upambullance,consomation.qtyambullance,sum(consomation.upambullance*consomation.qtyambullance) AS amtambul,consomation.comments  
FROM consomation JOIN  patient ON consomation.id=patient.id where insurance='MUTUELLE' and postedesante = 'POSTE DE SANTE' and MONTH(datecunsuption)= MONTH(CURDATE())  GROUP BY afnumber,datecunsuption ORDER BY datecunsuption DESC,consid DESC");

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
                <tr><td>  <strong>ADMINISTRATIVE  SECTION</strong>:&nbsp;&nbsp;&nbsp;&nbsp;Kulu</td></tr>
        </tr>
        <tr>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
			 
                <td width="45"></td>
				<td></td>
								<td></td><td></td><td></td>
                <td width="116"></td>
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
			<th>NAMES</th>
			<th>AFFILLIATION NUMBER</th>
			<th>CATEGORY</th>
			<th>GENDER</th>
			<th>DRUG DESCRIPTION</th>
    		<th>QUANTITY</th>
			<th>UNIT PRICE</th>
			<th>TOTAL</th>


			
			  
		<?php
			while ($row = mysqli_fetch_assoc($resultselect))
{
		$ambul = $row['amb'];

$nulltm = $row['null_tm'];

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
	$ticketmod1 = $ticketmod+$modticket;
$originalDate = $row['datecunsuption'];
$newDate = date("d/m/Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row['datecunsuption']));
$total = $row['qtymedicamnet']*$row['upmedicamnet'];
?>
			
				<tr>
				<td><?php 
							$tm=$tm+1;
						 echo $tm; ?></td>
						<td width="60px"><?php echo $newDate;?></td>
						<td><?php echo $row['names'].' '.$row['lname'];?></td>
						<td width="60px"><?php echo $row['afnumber'];?></td>
						<td><?php echo $row['category'];?></td>
						<td><?php echo $row['gender'];?></td>
						<td><?php echo $row['medicament'];?></td>
						<td><?php echo $row['qtymedicamnet'];?></td>
						<td><?php echo $row['upmedicamnet'];?></td>
						<td><strong><?php echo $total;?></strong></td>
						
              </tr>
			  	
<?php 
$totqt = $totqt + $row['qtymedicamnet'];
$total_consult=$total_consult+$total;

} 
;
?>

<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th>TOTALS</th>
<th><?php echo $totqt;?></th>
						<td><?php echo $row['upmedicamnet'];?></td>
<th><?php echo $total_consult;?></th>
</tr>
			<!--<tr>
			<th></th>
			<th> </th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th> </th>
			<th>POSTE DE SANTE</th>
			<th></th>
    		<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>

			</tr>-->
			<?php/*
			while ($row1 = mysqli_fetch_assoc($result1))
{
		$ambul = $row1['amb'];

$nulltm = $row1['null_tm'];

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
	$ticketmod1 = $ticketmod+$modticket;
$originalDate = $row1['datecunsuption'];
$newDate = date("d/m/Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row1['datecunsuption']));
$totals1= $row1['consultatiobn']+$row1['totexamens']+$row1['totacte']+$row1['totconsommables']+$row1['totmedicament']+$row1['tot_hosp']+$row1['amtambul'];
$verified1=($row1['consultatiobn']+$row1['totexamens']+$row1['totacte']+$row1['totconsommables']+$row1['totmedicament']+$row1['tot_hosp']+$row1['amtambul'])-$ticketmod1;
*/?>
	<!--<tr>
				<td><?php /*
							$tm=$tm+1;
						 echo $tm; ?></td>
						<td width="60px"><?php echo $newDate;?></td>
						<td><?php echo $row1['category'];?></td>
						<td width="60px"><?php echo $row1['afnumber'];?></td>
						<td><?php echo $row1['dob'];?></td>
						<td><?php echo $row1['gender'];?></td>
						<td><?php echo $row1['names'].' '.$row1['lname'];?></td>
						<td><?php echo $row1['affiliate_names'].' '.$row1['afilliate_lastname'];?></td>
						<td><?php echo $row1['familycode'];?></td>
						<td><?php echo $row1['consultatiobn'];?></td>
						<td><?php echo number_format((float)$row1['totexamens'], 1);?></td>
						<td><?php echo 0;?></td>
						<td><?php echo number_format((float)$row1['tot_hosp'], 1);?></td>
						<td><?php echo number_format((float)$row1['amtambul'], 1);?></td>
						<td><?php echo number_format((float)$row1['totacte'], 1);?></td>
						<td><?php echo number_format((float)$row1['totconsommables'], 1);?></td>
						<td><?php echo number_format((float)$row1['totmedicament'], 1);?></td>
						<td><?php echo number_format((float)$totals1, 1);?></td>
						<td><?php echo $ticketmod1; ?></td>
						<td><?php echo number_format((float)$verified1,1);*/?></td>
              </tr>
<?php /*
$total_consult1=$total_consult1+$row1['consultatiobn'];
$total_acte1=$total_acte1+$row1['totacte'];
$total_lab1=$total_lab1+$row1['totexamens'];
$total_consumable1=$total_consumable1+$row1['totconsommables'];
$total_medicine1=$total_medicine1+$row1['totmedicament'];
$total_hospitalisation1= $total_hospitalisation1+$row1['tot_hosp'];
$total_onehparcent1=$total_onehparcent1+$totals1;
$tot_amt1 = $tot_amt1+$row1['amtambul'];
$total_coopymt1=$total_coopymt1+$ticketmod1;
$total_verified1=$total_verified1+$verified1;
} 
;*/
?>
<!--<tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
<th>TOTALS POSTE DE SANTE</th>
<th><?php //echo number_format((float)$total_consult1,1);?></th>
<th><?php //echo number_format((float)$total_lab1,1);?></th>
<th><?php //echo number_format((float)0,1);?></th>
<th><?php //echo number_format((float)$total_hospitalisation1,1);?></th>
<th><?php //echo number_format((float)$tot_amt1,1);?></th>
<th><?php //echo number_format((float)$total_acte1,1);?></th>
<th><?php //echo number_format((float)$total_consumable1,1);?></th>
<th><?php //echo number_format((float)$total_medicine1,1);?></th>
<th><?php //echo number_format((float)$total_onehparcent1,1);?></th>
<th><?php //echo number_format((float)$total_coopymt1,1);?></th>
<th><?php //echo number_format((float)$total_verified1,1);?></th>
</tr>

<tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
<th>GRAND TOTALS</th>
<th><?php //echo number_format((float)$total_consult+$total_consult1,1);?></th>
<th><?php //echo number_format((float)$total_lab+$total_lab1,1);?></th>
<th><?php //echo number_format((float)0,1);?></th>
<th><?php //echo number_format((float)$total_hospitalisation+$total_hospitalisation1,1);?></th>
<th><?php //echo number_format((float)$tot_amt+$tot_amt1,1);?></th>
<th><?php //echo number_format((float)$total_acte+$total_acte1,1);?></th>
<th><?php //echo number_format((float)$total_consumable+$total_consumable1,1);?></th>
<th><?php //echo number_format((float)$total_medicine+$total_medicine1,1);?></th>
<th><?php //echo number_format((float)$total_onehparcent+$total_onehparcent1,1);?></th>
<th><?php //echo number_format((float)$total_coopymt+$total_coopymt1,1);?></th>
<th><?php //echo number_format((float)$total_verified+$total_verified1,1);?></th>
</tr>-->
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
