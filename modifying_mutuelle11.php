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
include_once('connect_db.php');
if (isset($_POST["comment"])) {
	session_start();
$date =$_SESSION['dt'];
$date1 =$_SESSION['dt1'];
$consid = $_POST['consid'];
$pid = $_POST['pid'];
$cons=300;
$date = $_POST['date'];
$insnumber = $_POST['insumber'];
$lab= $_POST['lab'];
$pricelab= $_POST['pricelab'];
$qtylab= $_POST['qtylab1'];
$acte= $_POST['actes'];
$priceacte= $_POST['priceacte'];
$qtyacte= $_POST[qtyeacte];
$cons=$_POST['cons'];
$pricecons= $_POST['pricecons'];
$qtycons= $_POST['qtycons'];
$medicament = $_POST['medicine'];
$pricemed= $_POST['pricemedicine'];
$qtymed= $_POST['qtymedicine']; 
$comment= $_POST['comments'];
$insert3 = ("INSERT INTO consomation(consid,id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,actemedicale,upacte,qtyacte,examenmedicale,upexamen,qtyexamen,datecunsuption,comments,date_comment)VALUES('$consid','$pid','$consu','$medicament','$pricemed','$qtymed','$cons','$pricecons','$qtycons','$acte','$priceacte','$qtyacte','$lab','$pricelab','$qtylab','$date','','')");
}
?>
<body>
<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
<input type="button" onclick="tableToExcel('example', 'W3C Example Table')" value="Export To Excel">
<?php
$date=$_POST['datesearch'];
$date1=$_POST['datesearch1'];
$newdate=date("d/m/Y", strtotime($date));
$newdate1=date("d/m/Y", strtotime($date1));
$tm=0;
$month=date("m"); 
$result = ("SELECT patient.id as pid,patient.names,patient.afilliate_lastname,patient.lname,patient.affiliate_names,patient.familycode,patient.affectation,patient.insurance,patient.dob,patient.category,patient.gender,
patient.affiliate_number,consomation.consid,consomation.consultatiobn,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,(consomation.upmedicamnet*consomation.qtymedicamnet) 
as totmedicament,consomation.consommable,consomation.UPcons,consomation.Qcons,(consomation.UPcons*consomation.Qcons) as totconsommables,consomation.actemedicale,consomation.upacte,consomation.qtyacte,(consomation.upacte*consomation.qtyacte) AS totacte,consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,(consomation.qtyexamen*consomation.upexamen) as totexamens,consomation.datecunsuption FROM consomation JOIN  patient ON consomation.id=patient.id where consid < $consid AND insurance='MUTUELLE' and datecunsuption >= '$date' and datecunsuption <= '$date1' and comments = '' ORDER BY datecunsuption DESC,consid DESC");

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
                <td width="393"><strong>DETAILED CONSUMPTIONS FOR MUTUELLE DE SATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FROM:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $newdate; ?>&nbsp;&nbsp;TO :&nbsp;&nbsp;&nbsp;<?php echo $newdate1; ?></strong></td><td></td>
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
			<th>BENEFICARY_AFFILLIATION NUMBER</th>
			<th>BENEFICIARY'S NAMES</th>
			<th>COST FOR CONSULT</th>
    		<th>LABORATORY TEST</th>
    		<th>QTY</th>
    		<th>UP</th>
    		<th>Total</th>
    		<th>Medical Act</th>
    		<th>QTY</th>
    		<th>UP</th>
    		<th>TOTAL</th>
    		<th>PROCIDURES AND MATERIALS</th>
    		<th>QTY</th>
    		<th>UP</th>
    		<th>TOTAL</th>
    		<th>Drugs</th>
    		<th>QTY</th>
    		<th>UP</th>
    		<th>MODIFY</th>
			</tr>
			  
		<?php
		$tm=0;
		$previous = ''; 
$previous1 = '';
$previous2 = ''; 
$previous3 = ''; 
$previous4 = '';
$previous28 = ''; 
$previous38 = ''; 
			while ($row = mysqli_fetch_assoc($result))
{
$originalDate = $row['datecunsuption'];
$newDate = date("d-m-Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row['datecunsuption']));
?>
			
				<tr>
				<td><?php $current = $row['pid'];
						  if ($current != $previous4) {
							$tm=$tm+1;

						  echo '<strong>'.$tm.'</strong>';	
						  }
						  $previous4 = $current;?></td>
						<td width="60px"><?php $current1 = $row['pid'];
						  if ($current1 != $previous1) {
							echo'<strong>'.$newDate.'</strong>';	
						  }
						  $previous1 = $current1;?></td>
						<td width="60px"><?php $current2 = $row['pid'];
						  if ($current2 != $previous2) {
							 echo '<strong>'.$row['affiliate_number'].'</strong>';
						  }
						  $previous2 = $current2;?></td>
						<td><?php $current3 = $row['pid'];
						  if ($current3 != $previous3) {
							 echo  '<strong>'.$row['names'].' '.$row['lname'].'</strong>';
						  }
						  $previous3 = $current3;?></td>
						<td><?php $current5 = $row['pid'];
						  if ($current5 != $previous5) {
							 echo '<strong>'.$row['consultatiobn'].'</strong>';
						  }
						  $previous5 = $current5;?></td>
						<td><?php echo $row['examenmedicale'];?></td>
						<td><?php 
						if($row['qtyexamen']==0){
						echo"";}
							else{
						echo $row['qtyexamen'];}?></td>
						<td><?php 
						if($row['upexamen']==0){
						echo"";}
							else{
							echo $row['upexamen'];
						}				
						?></td>
						<td><?php if($row['totexamens']==0){
							echo "";
						}
							else{echo'<strong>'. number_format((float)$row['totexamens'], 1).'<strong>';}?></td>
						<td><?php echo $row['actemedicale'];?></td>
						<td><?php if($row['qtyacte']==0){
							echo"";
						}else{echo $row['qtyacte'];}?></td>
						<td><?php if($row['upacte']==0){
							echo "";
						} else{echo $row['upacte'];}?></td>
						<td><?php if($row['totacte']==0){
							echo "";
						} else{echo'<strong>'. number_format((float)$row['totacte'], 1).'</strong>';}?></td>
						<td><?php echo $row['consommable'];?></td>
						<td><?php if($row['Qcons']==0){
							echo "";
						}  else{ echo $row['Qcons'];}?></td>
						<td><?php if($row['UPcons']==0){
							echo "";
						}else{echo $row['UPcons'];}?></td>
						<td><?php if($row['totconsommables']==0){
						echo "";}
							else{echo'<strong>'. number_format((float)$row['totconsommables'], 1).'</strong>';}?></td>
						<td><?php echo $row['medicament'];?></td>
						<td><?php if($row['qtymedicamnet']==0){
							echo "";
						} 
						else{echo $row['qtymedicamnet'];}?></td>
						<td><?php if($row['upmedicamnet']==0){
							echo "";
						}
						else{	echo $row['upmedicamnet'];}?></td>
						
				<td><a href="modify?id=<?php echo $row['consid']?>"><img src="images/update-icon.png" width="24" height="24" border="0" /></a></td>


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
