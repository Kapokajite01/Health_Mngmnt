<html>
  <head>
  <?php
error_reporting(0);
session_start();
include_once('connect_db.php');

    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Receptionist"){
      header('Location: logout');
	}
	$myuname=$_SESSION['sess_username'];
	
	
	
	
$numbeins= $_GET['affid'];
$NDATE= $_GET['CDATE'];

$tpatient = "SELECT names,lname,insurance FROM patient WHERE id ='$numbeins'";
	$resulttpatients= mysqli_query($conn, $tpatient);
	while($rowval = mysqli_fetch_assoc($resulttpatients)) {
	$fname = $rowval['names'];	
	$lname = $rowval['lname'];	
	$insurance = $rowval['insurance'];	
	$fcategory = $rowval['category'];	

	}

$consomation = "SELECT consultatiobn,datecunsuption  FROM consomation WHERE id ='$numbeins' AND datecunsuption = '$NDATE'";
	$resultconsomation= mysqli_query($conn, $consomation);
	while($rowcomn = mysqli_fetch_assoc($resultconsomation)) {
		$id = $rowcomn['id'];
		echo $id;
	$consulatation = $rowcomn['consultatiobn'];	
	$thdate = $rowcomn['datecunsuption'];	
	$newDate = date("d/m/Y", strtotime($thdate));
	$totambulance = $totambulance +($rowcomn['upambullance']*$rowcomn['qtyambullance']);
	
	}
?>
<div id="invoice-POS">
   <div id="mid" align="center">
      <div class="info">
       <a href="report_reception_print" style="text-decoration:none;"><font color="black"><p> 
    <strong>MINISTRY OF HEALTH</br>
			DD PROVINCE</br>
            Kulu DISTRICT</br>
            Kulu HEALTH CENETER</br></strong><hr>
       </font> </p></a>
      </div>
    </div>
	  <div id="mid" align="center">
       <p> 
    <strong>Names: &nbsp;&nbsp;<?php echo $fname.'&nbsp;&nbsp;'.$lname;	?></br>
			Insurance:&nbsp;&nbsp;<?php echo $insurance;?></br>
			<?php 
			if($consulatation){
				
			?>
            Consultation:&nbsp;&nbsp;<?php echo $consulatation;?></br>
            Ambulance:&nbsp;&nbsp;<?php echo $totambulance;?></br>
            Date:&nbsp;&nbsp;<?php echo $newDate;?></br>
			<?php
			}
			else{
			echo "<font color='red'> No Consumptions on this date</font>";
			}
			
			
			?>
        </p>
    </div>
	
	
	
	
	<!--End Invoice Mid-->
					<?php

$dugsresult = ("SELECT patient.id as pid,patient.names,patient.lname,patient.carnet,patient.phtocopy,patient.transfert,patient.affectation,patient.insurance,patient.dob,patient.gender,patient.affiliate_number,
consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,(consomation.upmedicamnet*consomation.qtymedicamnet) as totmedicament FROM consomation JOIN  patient ON consomation.id=patient.id WHERE medicament!='' and  consomation.id = '$numbeins' AND datecunsuption = '$NDATE'");
	$resultdrugs = mysqli_query($conn, $dugsresult);?>
    <div id="bot"  align="center">
<?php
if ($resultdrugs->num_rows > 0) {

?>
			            <u><h2 align="center"> Medicines</h2></u>
		<div id="table">
						<table>
							<tr class="tabletitle">
								<td class="tabletitle"style="font-family:MingLiU"><u><STRONG>MEDICINES</STRONG></u></td>
								<td class="Hours"style="font-family:MingLiU"><u><STRONG>QTY</STRONG></u></td>
								<td class="Rate"style="font-family:MingLiU"><u><STRONG>PRICE</STRONG></u></td>
								<td class="Rate"style="font-family:MingLiU"><u><STRONG>TOTAL</STRONG></u></td>
							</tr>
<?PHP 
$totalmedicines = 0;
while($row = mysqli_fetch_assoc($resultdrugs)) {
	$totmedi = round($row['totmedicament'],1);
	$totalmedicines = $totalmedicines+$totmedi;
	?>
							<tr class="service">
								<td class="tableitem" style="font-family:MingLiU"><p class="itemtext"><?php echo $row['medicament'];?></p></td>
								<td class="tableitem" style="font-family:MingLiU"><p class="itemtext"><?php echo $row['qtymedicamnet'];?></p></td>
								<td class="tableitem" style="font-family:MingLiU"><p class="itemtext"><?php echo number_format($row['upmedicamnet']);?></p></td>
								<td class="tableitem"style="font-family:MingLiU"><p class="itemtext"><strong><?php echo number_format($totmedi);?></strong></p></td>
							</tr>
<?PHP
}
?>
						<tr><td class="tableitem" colspan="3"style="font-family:MingLiU"><p class="itemtext"><strong>TOTAL MEDICINES</strong></p></td><td class="tableitem"  style="font-family:MingLiU"><p class="itemtext"><strong><?php echo $totalmedicines;?></strong></p></td></td>
						</table>
					</div>
					
					<?php
					
}
$consommables = ("SELECT patient.id as pid,patient.names,patient.lname,patient.carnet,patient.phtocopy,patient.transfert,patient.affectation,patient.insurance,patient.dob,patient.gender,patient.affiliate_number,
consomation.consommable,consomation.UPcons,consomation.Qcons,(consomation.UPcons*consomation.Qcons) as totCONS FROM consomation JOIN  patient ON consomation.id=patient.id WHERE consommable!=''  and  consomation.id = '$numbeins'  AND datecunsuption = '$NDATE'");
	$resultcons = mysqli_query($conn, $consommables);?>
    <div id="bot"  align="center">
<?php
if ($resultcons->num_rows > 0) {

?>            <u><h2 align="center"> Consommables</h2></u>

					<div id="table">
						<table>
							<tr class="tabletitle">
								<td class="tabletitle"style="font-family:MingLiU" ><u><STRONG>CONSOMMABLES</STRONG></u></td>
								<td class="Hours" style="font-family:MingLiU"><u><STRONG>QTY</STRONG></u></td>
								<td class="Rate" style="font-family:MingLiU"><u><STRONG>PRICE</STRONG></u></td>
								<td class="Rate" style="font-family:MingLiU"><u><STRONG>TOTAL</STRONG></u></td>
							</tr>
<?PHP 
$totalconsomabl = 0;
while($rowcons = mysqli_fetch_assoc($resultcons)) {
	$totCO= round($rowcons['totCONS'],1);
	$totalconsomabl = $totalconsomabl+$totCO;
	?>
							<tr class="service">
								<td class="tableitem" style="font-family:MingLiU"><p class="itemtext"><?php echo $rowcons['consommable'];?></p></td>
								<td class="tableitem" style="font-family:MingLiU"><p class="itemtext"><?php echo $rowcons['Qcons'];?></p></td>
								<td class="tableitem" style="font-family:MingLiU"><p class="itemtext"><?php echo number_format($rowcons['UPcons']);?></p></td>
								<td class="tableitem"style="font-family:MingLiU"><p class="itemtext"><strong><?php echo number_format($totCO);?></strong></p></td>
							</tr>
<?PHP
}
?>
						<tr><td class="tableitem" colspan="3"><p class="itemtext"  style="font-family:MingLiU"><strong>TOTAL CONSOMABLES</strong></p></td><td class="tableitem"  style="font-family:MingLiU"><p class="itemtext"><strong><?php echo number_format($totalconsomabl);?></strong></p></td></td>
						</table>
					</div>
					
					<?php
					
}

$actes = ("SELECT patient.id as pid,patient.names,patient.lname,patient.carnet,patient.phtocopy,patient.transfert,patient.affectation,patient.insurance,patient.dob,patient.gender,patient.affiliate_number,
consomation.actemedicale,consomation.upacte,consomation.qtyacte,(consomation.upacte*consomation.qtyacte) as totACT FROM consomation JOIN  patient ON consomation.id=patient.id WHERE actemedicale!='' and consomation.id = '$numbeins'  AND datecunsuption = '$NDATE'");
	$resultacte = mysqli_query($conn, $actes);?>
    <div id="bot"  align="center">
<?php
if ($resultacte->num_rows > 0) {

?>            <u><h2 align="center"> Actes Medicaux</h2></u>

					<div id="table">
						<table>
							<tr class="tabletitle">
								<td class="tabletitle"  style="font-family:MingLiU"><u><STRONG>ACTES MEDICAUX</STRONG></u></td>
								<td class="Hours"  style="font-family:MingLiU"><u><STRONG>QTY</STRONG></u></td>
								<td class="Rate"  style="font-family:MingLiU"><u><STRONG>PRICE</STRONG></u></td>
								<td class="Rate"  style="font-family:MingLiU"><u><STRONG>TOTAL</STRONG></u></td>
							</tr>
<?PHP 
$totalacte = 0;
while($rowacte = mysqli_fetch_assoc($resultacte)) {
	$totacte= round($rowacte['totACT'],1);
	$totalacte= $totalacte+$totacte;
	?>
							<tr class="service">
								<td class="tableitem"  style="font-family:MingLiU"><p class="itemtext"><?php echo $rowacte['actemedicale'];?></p></td>
								<td class="tableitem" style="font-family:MingLiU"><p class="itemtext"><?php echo $rowacte['qtyacte'];?></p></td>
								<td class="tableitem" style="font-family:MingLiU"><p class="itemtext"><?php echo number_format($rowacte['upacte']);?></p></td>
								<td class="tableitem" style="font-family:MingLiU"><p class="itemtext"><strong><?php echo number_format($totacte);?></strong></p></td>
							</tr>
<?PHP
}
?>
						<tr><td class="tableitem" colspan="3" style="font-family:MingLiU"><p class="itemtext"><strong>TOTAL ACTES MEDICAUX</strong></p></td><td class="tableitem"  style="font-family:MingLiU"><p class="itemtext"><strong><?php echo number_format($totalacte);?></strong></p></td></td>
						</table>
					</div>
					
					<?php
					
}



$examesn = ("SELECT patient.id as pid,patient.names,patient.lname,patient.carnet,patient.phtocopy,patient.transfert,patient.affectation,patient.insurance,patient.dob,patient.gender,patient.affiliate_number,
consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,(consomation.upexamen*consomation.qtyexamen) as totEX FROM consomation JOIN  patient ON consomation.id=patient.id WHERE examenmedicale!='' and  consomation.id = '$numbeins'  AND datecunsuption = '$NDATE'");
	$resultexamen = mysqli_query($conn, $examesn);?>
    <div id="bot"  align="center">
<?php
if ($resultexamen->num_rows > 0) {

?>            <u><h2 align="center"> Examens Medicaux</h2></u>

					<div id="table">
						<table>
							<tr class="tabletitle">
								<td class="tabletitle"  style="font-family:MingLiU"><u><STRONG>EXAMENS MEDICAUX</STRONG></u></td>
								<td class="Hours"  style="font-family:MingLiU"><u><STRONG>QTY</STRONG></u></td>
								<td class="Rate"  style="font-family:MingLiU"><u><STRONG>PRICE</STRONG></u></td>
								<td class="Rate"  style="font-family:MingLiU"><u><STRONG>TOTAL</STRONG></u></td>
							</tr>
<?PHP 
$totalexamen = 0;
while($rowexa = mysqli_fetch_assoc($resultexamen)) {
	$totEX= round($rowexa['totEX'],1);
	$totalexamen= $totalexamen+$totEX;
	?>
							<tr class="service">
								<td class="tableitem"  style="font-family:MingLiU"><p class="itemtext"><?php echo $rowexa['examenmedicale'];?></p></td>
								<td class="tableitem"  style="font-family:MingLiU"><p class="itemtext"><?php echo $rowexa['qtyexamen'];?></p></td>
								<td class="tableitem"  style="font-family:MingLiU"><p class="itemtext"><?php echo number_format($rowexa['upexamen']);?></p></td>
								<td class="tableitem"  style="font-family:MingLiU"><p class="itemtext"><strong><?php echo number_format($totEX);?></strong></p></td>
							</tr>
<?PHP
}
?>
						<tr><td class="tableitem" colspan="3"  style="font-family:MingLiU"><p class="itemtext"><strong>TOTAL EXAMENS MEDICAUX</strong></p></td><td class="tableitem"  style="font-family:MingLiU"><p class="itemtext"><strong><?php echo number_format($totalexamen);?></strong></p></td></td>
						</table>
					</div>
					
					<?php
					
}




$hospitalization = ("SELECT patient.id as pid,patient.names,patient.lname,patient.carnet,patient.phtocopy,patient.transfert,patient.affectation,patient.insurance,patient.dob,patient.gender,patient.affiliate_number,
consomation.hospitalization ,consomation.uphospitalizations,consomation.qtyhoapitalization,(consomation.uphospitalizations*consomation.qtyhoapitalization) as totHOSP FROM consomation JOIN  patient ON consomation.id=patient.id WHERE hospitalization !='' and  consomation.id = '$numbeins' AND datecunsuption = '$NDATE'");
	$resulthosp= mysqli_query($conn, $hospitalization);?>
    <div id="bot"  align="center">
<?php
if ($resulthosp->num_rows > 0) {

?>            <u><h2 align="center" > Hospitalization</h2></u>

					<div id="table">
						<table>
							<tr class="tabletitle">
								<td class="tabletitle" style="font-family:MingLiU"><u><STRONG>HOSPITALISATION </STRONG></u></td>
								<td class="Hours" style="font-family:MingLiU"><u><STRONG>QTY</STRONG></u></td>
								<td class="Rate" style="font-family:MingLiU"><u><STRONG>PRICE</STRONG></u></td>
								<td class="Rate" style="font-family:MingLiU"><u><STRONG>TOTAL</STRONG></u></td>
							</tr>
<?PHP 
$totalhospital =0;
while($rowhosp = mysqli_fetch_assoc($resulthosp)) {
	$totHOSP= round($rowhosp['totHOSP'],1);
	$totalhospital= $totalhospital+$totHOSP;
	?>
							<tr class="service">
								<td class="tableitem" style="font-family:MingLiU"><p class="itemtext"><?php echo $rowhosp['hospitalization'];?></p></td>
								<td class="tableitem" style="font-family:MingLiU"><p class="itemtext"><?php echo $rowhosp['qtyhoapitalization'];?></p></td>
								<td class="tableitem" style="font-family:MingLiU"><p class="itemtext"><?php echo number_format($rowhosp['uphospitalizations']);?></p></td>
								<td class="tableitem" style="font-family:MingLiU"><p class="itemtext"><strong><?php echo number_format($totHOSP);?></strong></p></td>
							</tr>
<?PHP
}
?>
						<tr><td class="tableitem" colspan="3" style="font-family:MingLiU"><p class="itemtext"><strong>TOTAL HOSPITALISATION </strong></p></td><td class="tableitem" style="font-family:MingLiU"><p class="itemtext"><strong><?php echo number_format($totalhospital);?></strong></p></td></td>
								
						
						
						
						</table>
					</div>

					
					<?php
					
}

 $mytotal = $totalmedicines+ $totalconsomabl+$totalacte+$totalexamen+$totalhospital+$totambulance+$consulatation;




		if($insurance =='MUTUELLE' AND $fcategory == 1){
	$ticketmod = 0;		
	}

	else{
	$ticketmod =200;	
	}
	
if($insurance == 'RAMA/RSSB' OR $insurance== 'MEDIPLA' OR $insurance=='RADIANT' OR $insurance=='MMI'){
		
		$ticketmod = $mytotal*0.15;
	}
	if($insurance == 'NO INSURANCE'){
		
		$ticketmod = $mytotal*1;
	}

$insured = $mytotal - $ticketmod;
 if($consulatation)
 {
?>
                     
						<div id="table">
						<font size="5"  style="font-family:MingLiU">Total: <?php echo number_format($mytotal);?></br>
						Insured :<?php echo number_format($insured,1);?></br>
						Copayment :<?php echo number_format($ticketmod,1);?></font>
						</div>	
<?php
 }
?> 

				</div><!--End InvoiceBot-->
				<br>
<input name="print" type="button" value="Print" id="printButton1" onClick="printpage()">
  </div><!--End Invoice-->
  <BR><BR><BR>
  <script type="text/javascript">
function printpage() {
document.getElementById('printButton1').style.visibility="hidden";

window.print();
document.getElementById('printButton1').style.visibility="hidden";
 
}
</script>
<style>
invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: 44mm;
  background: #FFF;
  
  
::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
p{
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}
 
#top, #mid,#bot{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}

#top{min-height: 100px;}
#mid{min-height: 80px;} 
#bot{ min-height: 50px;}

#top .logo{
  //float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
	background-size: 60px 60px;
}
.clientlogo{
  float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
	background-size: 60px 60px;
  border-radius: 50px;
}
.info{
  display: block;
  //float:left;
  margin-left: 0;
}
.title{
  float: right;
}
.title p{text-align: right;} 
table{
  width: 100%;
  border-collapse: collapse;
  font-family: MingLiU;
}
td{
  //padding: 5px 0 5px 15px;
  //border: 1px solid #EEE
}
.tabletitle{
  //padding: 5px;
  font-size: .5em;
  background: #EEE;
}
.service{border-bottom: 1px solid #EEE;}
.item{width: 14mm;}
.itemtext{font-size: .3em;font-family: "MingLiU", MingLiU, MingLiU;


}

#legalcopy{
  margin-top: 5mm;
}

  
  
}



</style>