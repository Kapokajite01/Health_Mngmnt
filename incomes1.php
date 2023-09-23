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


$date = $_POST['datesearch'];
$date1 = $_POST['datesearch1'];
$result = ("SELECT patient.id AS Pid,patient.names,patient.lname,patient.insurance,patient.category,patient.affiliate_number,patient.gender,patient.dob,patient.affiliate_names,patient.afilliate_lastname,patient.familycode,consomation.consultatiobn,consomation.datecunsuption,sum(consomation.upmedicamnet*consomation.qtymedicamnet)as totmedicament,sum(consomation.UPcons*consomation.Qcons) as totconsommables,
 sum(consomation.upacte*consomation.qtyacte) AS totacte,sum(consomation.uphospitalizations*consomation.qtyhoapitalization)AS tot_hosp,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,sum(consomation.upambullance*consomation.qtyambullance) AS amtambul,patient.null_tm,consomation.postedesante,consomation.comments
 FROM consomation JOIN  patient ON consomation.id=patient.id WHERE datecunsuption >= '$date' and datecunsuption <= '$date1' GROUP BY patient.id,datecunsuption ORDER BY datecunsuption");
$resultselect = mysqli_query($conn, $result);
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

 

      <table width="595" border="0" cellspacing="0" cellpadding="0"  style="align:center;">

       

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

			  <form method="POST" action="incomes1">


                <td width="393" colspan="9"><strong>INCOMES AND TICKET MODERATEUR &nbsp;&nbsp; FROM &nbsp;&nbsp;  <?php echo $newDate = date("d/m/Y", strtotime($date));?>&nbsp;&nbsp; TO &nbsp;&nbsp;  <?php echo $newDate = date("d/m/Y", strtotime($date1));?></strong></td>

                <td width="41"></td>

				<td></td>

                <td width="116"></td>


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
			<th> NAMES</th>
			<th>AGE</th>
			<th>GENDER</th>
			<th>INSURANCE</th>
			<th>ME<BR> MBER'S<BR>  CATE<BR> GORY</th>
			<th>TICKET <BR> MODERA<BR> TEUR</th>
			<th>FICHE<BR>  DE <BR>REFE<BR> RENCE</th>
			<th>FICHE<BR>  DE <BR>CONSU<BR> LTA<BR> TION</th>
			<th>PHOTO<BR> COPY</th>
			<th>TOTAL</th>
		<?php

			while ($row = mysqli_fetch_assoc($resultselect))
{
	$ij++;
		$ambul = $row['amb'];
$insur = $row['insurance'];
$comments = $row['comments'];
$nulltm = $row['null_tm'];
$CATEG = $row['category'];
	if($nulltm == 'Yes' OR $CATEG ==1){
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
$originalDate = $row['datecunsuption'];
$newDate = date("d/m/Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row['datecunsuption']));
$totals= $row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament']+$row['tot_hosp']+$row['amtambul'];
if($insur == 'RAMA/RSSB' OR $insur== 'MEDIPLA' OR $insur=='RADIANT' OR $insur=='MMI'){
		$ticketmod = $totals*0.15;
	}
	if($insur == 'NO INSURANCE'){
		$ticketmod = $totals*1;
}
if($comments=='photocopy'){
$ticketmod=0;	
}
	$ticketmod1 = $ticketmod+$modticket;
$verified=($row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament']+$row['tot_hosp']+$row['amtambul'])-$ticketmod1;
?>
				<tr>
				<td><?php 
						$tm=$tm+1;
						 echo $tm; ?></td>
						<td width="60px"><?php echo $newDate;?></td>
		<td><?php echo $row['names'].' '.$row['lname'];?></td>
						<td><?php echo $row['dob'];?></td>
						<td><?php echo $row['gender'];?></td>
						<td><?php echo $row['insurance'];?></td>
						<td><?php echo $CATEG;?></td>
						<td><?php $timoder = $ticketmod1; 
						$thistm[$ij]= $timoder;
						$tickmtoatal = $tickmtoatal+ $thistm[$ij];
						echo number_format((float) $thistm[$ij], 1);
						?></td>
						<td><?php 
						$idpref =  $row['Pid'];
						$fichetr = 0;
						$otherSelect = "SELECT fiche_transfert  FROM other_consumables WHERE patient_id = '$idpref'LIMIT 1";
						$resultsOTHER = mysqli_query($conn, $otherSelect);
						while ($rowOTHER = mysqli_fetch_assoc($resultsOTHER)){
						$fichetra[$ij]= $rowOTHER['fiche_transfert'];						
						}
						$fichtrtoatal = $fichtrtoatal+ $fichetra[$ij];
						 $fichetr = $fichetra[$ij];
						 if($fichetr){
						 echo $fichetr ;
						 } 
						 else
						 {
						 echo 0;
						 }

						?> </td>
						<td><?php 
						$otherSelect1 = "SELECT fiche_consultation  FROM other_consumables WHERE patient_id = '$idpref'LIMIT 1";
						$resultsOTHER1 = mysqli_query($conn, $otherSelect1);
						while ($rowOTHER1 = mysqli_fetch_assoc($resultsOTHER1)){
						$fichetra1[$ij1]= $rowOTHER1['fiche_consultation'];						
						}
							$ficheconsl[$ij1]= $fichetra1[$ij1];
							$ficheconsult = $ficheconsult +$ficheconsl[$ij1];
							echo $ficheconsl[$ij1];
					
						?></td>
						<td><?php 
						$idFPHOTOCOPY=  $row['Pid'];
						$FICHECONSelect = "SELECT photocopy,num_pcopy  FROM other_consumables WHERE patient_id = '$idFPHOTOCOPY' LIMIT 1";
						$resultsPHOTOCOPY = mysqli_query($conn, $FICHECONSelect);
						while ($rowpc= mysqli_fetch_assoc($resultsPHOTOCOPY)){
							$photocop[$ij]= $rowpc['photocopy'] * $rowpc['num_pcopy'];
							$totalphotocopy = $totalphotocopy + $photocop[$ij];
							$photocpy =  $photocop[$ij];
							
						}
						if($photocpy > 0){
						echo $photocpy;	
						}
						else{
							echo 0;
							
							
						}
						?></td>						<td><strong><?php 
						$total[$ij]=$thistm[$ij]+$fichetra[$ij]+$ficheconsl[$ij1]+$photocop[$ij];
						echo number_format((float) $total[$ij], 1);
						$ttoatal = $ttoatal+$total[$ij];
						?> </strong></td>

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

<tr><th colspan="7">TOTALS</th>

<th><strong><?php echo number_format($tickmtoatal,1);?></strong></th>
<th><strong><?php echo number_format($fichtrtoatal,1);?></strong></th>
<th><strong><?php echo number_format($ficheconsult,1);?></strong></th>
<th><strong><?php echo number_format($totalphotocopy,1);?></strong></th>
<th><strong><?php echo number_format($ttoatal,1);?></strong></th>
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

