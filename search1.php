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
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$lname = $_SESSION['sess_lname'];
	$tel = $_SESSION['sess_phone'];
	$ins= $_SESSION['$ins'];
	$number=$_SESSION['$number'];
	$cons =$_SESSION['$cons'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or ($role!="Receptionist")){
      header('Location: logout');
	}
else{
	$sql=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Displayed Invoice Mutuelle',now())");
	}
?>
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
	border-color: #ffffff;
	border-collapse: collapse;
	empty-cells: hide;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #ffffff;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #ffffff;
	
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
<body>
<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
<?php
include_once('connect_db.php');
$patientid=$_POST['Patient_ID'];
$datesearch= $_POST['datesearch'];
$tm=0;
$month=date("m"); 
$result1 = ("SELECT names,lname,affiliate_number,insurance,consultatiom from patient where affiliate_number= '$patientid' ORDER BY id DESC");
while($row1 = mysqli_fetch_assoc( $result1 )) {
	$names=$row1['names'];
	$lnames=$row1['lname'];
	$insnumber=$row1['affiliate_number'];
	$assurance=$row1['insurance'];
	$consultation11=$row1['consultatiom'];
	if($assurance=='MUTUELLE'){
		$parc=1;	
	}
	if($assurance=='RAMA/RSSB'){
		$parc=0.85;			
	}
	if($assurance=='MMI'){
		$parc=0.9;	
		
	}
	if($assurance=='MEDIPLA'){
		$parc=0.85;	
	}
	if($assurance=='RADIANT'){
		$parc=0.85;			
	}
	if($assurance=='NO INSURANCE'){
		$parc=0;			
	}
}
$result = ("SELECT patient.id as pid,patient.names,patient.afilliate_lastname,patient.lname,patient.affiliate_names,patient.familycode,patient.affectation,patient.insurance,patient.dob,patient.category,patient.gender,
patient.affiliate_number,consomation.consid,consomation.consultatiobn,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,(consomation.upmedicamnet*consomation.qtymedicamnet) 
as totmedicament,consomation.consommable,consomation.UPcons,consomation.Qcons,(consomation.UPcons*consomation.Qcons) as totconsommables,consomation.actemedicale,consomation.upacte,consomation.qtyacte,(consomation.upacte*consomation.qtyacte) AS totacte,consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,(consomation.qtyexamen*consomation.upexamen) as totexamens,consomation.datecunsuption FROM consomation JOIN  patient ON consomation.id=patient.id WHERE affiliate_number= '$patientid' and datecunsuption='$datesearch'");
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
                      
                  <strong>MINISTRY OF HEALTH</strong><br />
                  <strong>SOUTHERN PROVINCE</strong><br />
                  <strong>BUGESERA DISTRICT</strong><br/>
				  <strong>RUHUHA HEALTH CENTER</strong><BR><BR><br/>
                  
              </div><hr></td>
        </tr>
        <tr>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
  
	            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="45"><strong>Names &nbsp;&nbsp;:&nbsp;<?php echo $names ;?> &nbsp;&nbsp;<?php echo $lnames;?></br>
		  Insurance &nbsp;&nbsp;:&nbsp;<?php echo $assurance;?></br>
		  Number&nbsp;&nbsp;:&nbsp;<?php echo $insnumber;?><br>
		  Consultion &nbsp;&nbsp;:&nbsp;<?php echo $consultation11 ;?></br>

		  <br>		  
		  </strong>
		</td>
        </tr>
        <tr>
          <td><table cellpadding="" id="example" cellspacing="" border="0" class="altrowstable">
              <tr>
			<th>Medicines</th>
			<th>UP</th>
			<th>Qty</th>
			<th>Tot</th>
			<th>Other Consum</th>
			<th>UP</th>
			<th>Qty</th>
			<th>Tot</th>
			<th>Medical Act</th>
			<th>UP</th>
			<th>Qty</th>
			<th>Tot</th>
			<th>Lab Test</th>
			<th>UP</th>
			<th>Qty</th>
			<th>Tot</th>
			</tr>
			  
		<?php
		$totalmedicines=0;
		$totconsomables=0;
		$totalact=0;
		$totaltest=0;
		$ref=0;
		$grandtotal=0;
		
			while ($row = mysqli_fetch_assoc($result))
{
	$med= $row['qtymedicamnet']*$row['upmedicamnet'];
	$consumabls=$row['UPcons']*$row['Qcons'];
	$acts=$row['qtyacte']*$row['upacte'];
	$test=$row['qtyexamen']*$row['upexamen'];
?>
			
				<tr>
				
						<td><?php echo $row['medicament'];?></td>
						<td><?php 
						if($row['upmedicamnet']==0){echo'';}else{echo $row['upmedicamnet'];}?></td>
						<td><?php if($row['qtymedicamnet']==0){echo '';} else{echo $row['qtymedicamnet'];}?></td>
						<td><strong><?php if($med==0){echo "";}else{echo $med;}?></strong></td>
						<td><?php echo $row['consommable'];?></td>
						<td><?php if($row['UPcons']==0){echo '';}else{echo $row['UPcons'];}?></td>
						<td><?php if($row['Qcons']==0){echo"";}else{ echo $row['Qcons'];}?></td>
						<td><strong><?php if($consumabls==0){echo '';} else{echo $consumabls;}?></strong></td>
						<td><?php if ($row['actemedicale']=='Reference'){echo '';} else{ echo $row['actemedicale'];}?></td>
						<td><?php if ($row['upacte']==0 OR $row['actemedicale']=='Reference'){echo "";} else{echo $row['upacte'];}
						if ($row['actemedicale']=='Reference')
						{
						$ref=100;
						$row['upacte']=0;						
						}
						
						?></td>
						<td><?php if($row['qtyacte']==0 OR $row['actemedicale']=='Reference'){echo'';}else{ echo $row['qtyacte'];}?></td>
						<td><strong><?php if ($acts==0){echo "";} else{ echo $acts;}?></strong></td>
						<td><?php echo $row['examenmedicale'];?></td>
						<td><?php if ($row['upexamen']==0){echo '';} else{ echo $row['upexamen'];}?></td>
						<td><?php if ($row['qtyexamen']==0){echo'';} else{ echo $row['qtyexamen'];}?></td>
						<td><strong><?php if ($test==0){echo '';} else{ echo $test;}?></strong></td>
              </tr>
			  	
<?php 
$totalmedicines=$totalmedicines+$med;
$totconsomables=$totconsomables+$consumabls;
$totalact=$totalact+$acts;
$totaltest=$totaltest+$test;
$consult= $row['consultatiobn'];
$grandtotal=$consult+$totalmedicines+$totconsomables+$totalact+$totaltest;
$insured= $grandtotal *$parc;
$copymt= $grandtotal *(1-$parc);
if($assurance=='MUTUELLE'){
		$insured=$grandtotal-200;
		$copymt	=200;	
	}
} 
$topay=$copymt+$ref;
;
?>

        <tr>
				
						<td><strong>Total Medicines</strong></td>
						<td><strong><?php echo $totalmedicines;?></strong></td>
						<td></td>
						<td> </td>
						<td><strong>Total Other Cons</strong></td>
						<td><strong><?php echo $totconsomables;?></strong></td>
						<td></td>
						<td></td>
						<td><strong>Total Acts</strong></td>
						<td><strong><?php echo $totalact;?></strong></td>
						<td></td>
						<td></td>
						<td><strong>Total Tests</strong></td>
						<td><strong><?php echo $totaltest;?></strong></td>
						<td></td>
						<td></td>
              </tr>  
			 
        </tr>
        
    </table></td>		  <input name="print" type="button" value="Print" id="printButton" onClick="printpage()">

  </tr>
</table><br><br>
<table><tr><td><strong>Reference.......................................</strong></td><td><?php echo $ref ?></td></tr>
<tr><td><strong>Copayment......................................</td><td><?php echo $copymt; ?></strong></td></tr>
<tr><td><strong>Insured.........................................</strong></td><td><?php echo $insured;?></td></tr>
<tr><td><strong>Grand Total..................................................</strong></td><td><?php echo $grandtotal ?></td></tr>
<tr><td><strong>Amount To Pay(Reference+&nbsp;Copayment).......</strong></td><td><?php echo $topay ?><br></td></tr>
<tr><td><strong>Cashier.............................................................</strong></td><td></td></tr></table>
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
