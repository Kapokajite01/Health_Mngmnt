<?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Receptionist"){
      header('Location: logout');
    include_once('connect_db.php');
	}
include_once('connect_db.php');

?>
<html>
<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
   <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 

   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>
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
$today = date("Y-m-d");
$newdate=date("d/m/Y");
$result = ("SELECT id,names,affiliate_number,lname,carnet,phtocopy,transfert,consultatiom,insurance,date,gtal,copayment from patient where date='$today'");
$sumconsult=0;
$sumcarnet=0;
$sumphotocopy=0;
$sumtransfer=0;
$sumcopeymt=0;
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
                  
              </div>
		  <hr></td>
        </tr>
        <tr>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
			  <form method="POST" action="report_reception1.php">
                <td width="45"></td>
                <td width="393"><strong>All PATIENT CARED ON :&nbsp;&nbsp <?php echo $newdate; ?> </strong></td>
                <td><input type="text" name="datesearch" id="datesearch" required aria-required='true' aria-describedby='name-format' placeholder="Start Date" /></td>
                <td><input type="text" name="datesearch1" id="datesearch1" required aria-required='true' aria-describedby='name-format' placeholder="End Date" /></td>
                <td><input type="submit" name="submit" value="display"></td>
				</form>
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
			<th>BENEFICIARY'S NAMES</th>
			<th>AFFILLIATION NUMBER</th>
			<th>INSURANCE</th>
			<th> CONSULT</th>
			<th> CARNET</th>
			<th> PHOTOCOPY</th>
			<th> FICHE</th>
			<th>Copayment</th>
		  
		<?php
			while ($row = mysqli_fetch_assoc($result))
{

$date=$row[date];
$newDate=date("d/m/Y", strtotime($date));
?>
			
				<tr>
				<td><?php 
							$tm=$tm+1;
						 echo $tm; ?></td>
						<td><?php echo $newDate;?></td>
						<td><?php echo $row['names'].'&nbsp;&nbsp;'.$row['lname'];?></td>
						<td width="60px"><?php echo $row['affiliate_number'];?></td>
						<td><?php echo $row['insurance'];?></td>
						<td><?php echo $row['consultatiom'];?></td>
						<td><?php echo $row['carnet'];?></td>
						<td><?php echo $row['phtocopy'];?></td>
						<td><?php echo $row['transfert'];?></td>
						<td><?php echo $row['copayment'];?></td>
 
 </tr>
			  	
<?php 
$sumconsult=$sumconsult+$row['consultatiom'];
$sumcarnet=$sumcarnet+$row['carnet'];
$sumphotocopy=$sumphotocopy+$row['phtocopy'];
$sumtransfer=$sumtransfer+$row['transfert'];
$sumcopeymt=$sumcopeymt+$row['transfert'];
} 
;
?>
              <tr>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th>TOTALS</th>
			<th><?php echo $sumconsult;?></th>
			<th><?php echo $sumcarnet;?></th>
			<th><?php echo $sumphotocopy;?></th>
			<th><?php echo $sumtransfer;?></th>
			<th><?php echo number_format((float)$sumcopeymt, 2);?></th>

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
</html>
