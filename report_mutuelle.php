<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
$sid=$_SESSION['staff_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
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
<?php
$tm=0;
$month=date("m"); 
$result = ("SELECT patient.id as pid,patient.names,patient.affiliate_names,patient.affectation,patient.insurance,patient.dob,patient.gender,patient.affiliate_number,consomation.consid,consomation.consultatiobn,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,sum(consomation.upmedicamnet*consomation.qtymedicamnet) as totmedicament,consomation.consommable,consomation.UPcons,consomation.Qcons,sum(consomation.UPcons*consomation.Qcons) as totconsommables,consomation.actemedicale,consomation.upacte,consomation.qtyacte,sum(consomation.upacte*consomation.qtyacte) AS totacte,consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,consomation.datecunsuption FROM consomation JOIN  patient ON consomation.id=patient.id where insurance='MUTUELLE' and MONTH(datecunsuption)= MONTH(CURDATE()) GROUP BY pid,datecunsuption ORDER BY datecunsuption DESC,consid DESC");
$previous = ''; 
$previous1 = '';
$previous2 = ''; 
$previous3 = ''; 
$previous4 = '';
$previous28 = ''; 
$previous38 = ''; 
$mypreviouscurrent = '';   
?>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
          <div align="right">
                      
                  <strong>Ministry of Health</strong><br />
                  <strong>Kigali City</strong> <br />
                  <strong>Gasabo District</strong><br/>
                  <strong>Kacyiru Health Center</strong><br/>
                  
              </div>
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
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="45"></td>
                <td width="393"><strong>MUTUELLE DE SANTE FOR:&nbsp;&nbsp;&nbsp;&nbsp; <?php echo date('F') ?> <?php echo date('Y') ?></strong></td>
                <td width="41"></td>
                <td width="116"></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td><table cellpadding="1" cellspacing="1" border="0" class="altrowstable">
              <tr>
			<th>No</th>
			<th>DATE </th>
			<th>MEMBER'S CATEGORY</th>
			<th>BENEFICARY_AFFILLIATION NUMBER</th>
			<th>BENEFICIARY'S AGE</th>
			<th>BENEFICARY'S GENDER</th>
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
$newDate = date("d-m-Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row['datecunsuption']));
?>
			
				<tr>
				<td><?php 
							$tm=$tm+1;
						 echo $tm; ?></td>
						<td width="60px"><?php echo $newDate;?></td>
						<td><?php ?></td>
						<td width="60px"><?php echo $row['affiliate_number'];?></td>
						<td><?php echo $row['dob'];?></td>
						<td><?php echo $row['gender'];?></td>
						<td><?php echo $row['names'];?></td>
						<td><?php echo $row['affiliate_names'];?></td>
						<td><?php echo $row['affiliate_names'];?></td>
						<td><?php echo $row['consultatiobn'];?></td>
						<td><?php echo number_format((float)$row['totexamens'], 1);?></td>
						<td><?php echo number_format((float)$row['totacte'], 1);?></td>
						<td><?php echo number_format((float)$row['totconsommables'], 1);?></td>
						<td><?php echo number_format((float)$row['totmedicament'], 1);?></td>
						<td><?php echo number_format((float)($row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament']));?></td>
						<td>-200</td>
						<td><?php echo number_format((float)($row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament'])-200);?></td>



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
</html>
