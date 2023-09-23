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
<title> Facture Export</title>
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
<input type="button" id="printButton" onclick="tableToExcel('example', 'W3C Example Table')" value="Export To Excel">
<?php
$tm=0;
$month=date("m"); 
$date = $_POST['datesearch'];
$date1 = $_POST['datesearch1'];
$result = ("SELECT patient.id,patient.names,patient.lname,patient.dob,patient.gender,patient.affiliate_number,patient.category,patient.affectation,patient.affiliate_names,patient.afilliate_lastname,patient.insurance,patient.familycode,patient.pagenumber,
consomation.consultatiobn,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,consomation.consommable,consomation.UPcons,consomation.Qcons,consomation.actemedicale,consomation.upacte,consomation.qtyacte,
consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,consomation.hospitalization,consomation.uphospitalizations,consomation.qtyhoapitalization,consomation.ambullance,consomation.upambullance,
consomation.qtyambullance,consomation.datecunsuption,patient.null_tm,consomation.postedesante
FROM consomation JOIN  patient ON consomation.id=patient.id WHERE datecunsuption >= '$date' AND datecunsuption <='$date1'
 UNION ALL SELECT up_pid,up_pname,up_plname,up_pdob,up_pgender,up_afnumber,up_pcateg,affectation,up_afnme,up_aflname,up_insurance,up_famcode,up_pagenumber,
			up_consom_sonsultation,up_cons_medicaments,up_cons_upmedic,up_cons_qytmedic as qtymedicamnet,up_consomable AS consommable,up_upcons AS UPcons,up_qtycons as Qcons,up_acte AS actemedicale,up_upacte as upacte,up_qtyacte as qtyacte,up_exame as examenmedicale,up_upexame as upexamen,up_qtyexame qtyexamen,up_hospita as hospitalization,
			up_uphospita AS uphospitalizations,up_qtyhosp AS qtyhoapitalization,up_ambul AS ambullance,up_upambul AS upambullance,up_qtyambul AS qtyambullance,datecunsuption,null_tm,postedesante FROM consomation_upload WHERE datecunsuption >= '$date' AND datecunsuption <='$date1'");

 

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
          <td><table cellpadding="" id="example" cellspacing="" border="0" class="altrowstable">
              <tr>
			<th>ID</th>
			<th>First Name </th>
			<th>Last  Name</th>
			<th>DOB</th>	
			<th>Gender</th>
			<th>AFFILLIATION NUMBER</th>
			<th>Category</th>
			<th>Affectation</th>
			<th>Affilliate Name</th>
			<th>Affilliate Lastname</th>
			<th>Insurance</th>
    		<th>Family Code</th>
			<th>pagenumber</th>
			<th>Consultation</th>
			<th>Medicament</th>
			<th>UP medicaments</th>
			<th>QTY Medicament</th>
			<th>Consommable</th>
			<th>UP Consommable</th>
			<th>QTY Consommable</th>
			<th>Acte Medicale</th>
			<th>UP Acte</th>
			<th>QTY Acte</th>
			<th>Examen Medicale</th>
			<th>UP Examen</th>
			<th>QTY Examen</th>
			<th>Hospita lisation</th>
			<th>UP Hosp</th>
			<th>QTY Hosp</th>
			<th>Ambullance</th>
			<th>UP Ambul</th>
			<th>QTY Ambul</th>
			<th>Date</th>
			<th>Nul TM</th>
			<th>Branch</th>

			
			  
		<?php
			while ($row = mysqli_fetch_assoc($result))
{
		?>
			
				<tr>
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['names'];?></td>
						<td><?php echo $row['lname'];?></td>
						<td><?php echo $row['dob'];?></td>
						<td><?php echo $row['gender'];?></td>
						<td><?php echo $row['affiliate_number'];?></td>
						<td><?php echo $row['category'];?></td>
						<td><?php echo $row['affectation'];?></td>
						<td><?php echo $row['affiliate_names'];?></td>
						<td><?php echo $row['afilliate_lastname'];?></td>
						<td><?php echo $row['insurance'];?></td>
						<td><?php echo $row['familycode'];?></td>
						<td><?php echo $row['pagenumber'];?></td>
						<td><?php echo $row['consultatiobn'];?></td>
						<td><?php echo $row['medicament'];?></td>
						<td><?php echo $row['upmedicamnet'];?></td>
						<td><?php echo $row['qtymedicamnet'];?></td>
						<td><?php echo $row['consommable'];?></td>
						<td><?php echo $row['UPcons'];?></td>
						<td><?php echo $row['Qcons'];?></td>
						<td><?php echo $row['actemedicale'];?></td>
						<td><?php echo $row['upacte'];?></td>
						<td><?php echo $row['qtyacte'];?></td>
						<td><?php echo $row['examenmedicale'];?></td>
						<td><?php echo $row['upexamen'];?></td>
						<td><?php echo $row['qtyexamen'];?></td>
             			<td><?php echo $row['hospitalization'];?></td>
						<td><?php echo $row['uphospitalizations'];?></td>
						<td><?php echo $row['qtyhoapitalization'];?></td>
             			<td><?php echo $row['ambullance'];?></td>
						<td><?php echo $row['upambullance'];?></td>
						<td><?php echo $row['qtyambullance'];?></td>
						<td><?php echo $row['datecunsuption'];?></td>
						<td><?php echo $row['null_tm'];?></td>
						<td><?php echo $row['postedesante'];?></td>
              </tr>
			  	
<?php 

} 
;
?>

			
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
