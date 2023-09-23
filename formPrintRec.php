<?php
error_reporting(0);
session_start();
	$userid = $_SESSION['sess_user_id'];
 $userid;
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username'])){
		if(($role!="Receptionist") or ($role!="Mutuelle"))
		{
      header('Location: logout');
		}
	}
    include_once('connect_db.php');
	
$affnumber = $_GET['affnumber']; 
$affid = $_GET['affid'];
$dtconsult = $_GET['dtconsult'];
$patientnumber = $_GET['affnumber'];
$dt = $_GET['dtconsult'];
$filenumber = $_GET['filenumber'];
//Patient Identification

$patient ="SELECT * FROM patient WHERE id = '$patientnumber'";
$result = mysqli_query($conn, $patient);
while($rowPAT = mysqli_fetch_assoc($result)) {
	$fname = $rowPAT['names'];
	$lname = $rowPAT['lname'];
    $affiliate_number = $rowPAT['affiliate_number'];
    $gender = $rowPAT['gender'];
    $insurance = $rowPAT['insurance'];
    $dob = $rowPAT['dob'];
    $category = $rowPAT['category'];
    $fcode = $rowPAT['familycode'];
    $province = $rowPAT['province'];
    $district = $rowPAT['district'];
    $sector = $rowPAT['sector'];
    $cell = $rowPAT['cell'];
    $afname = $rowPAT['affiliate_names'];
    $aflname = $rowPAT['afilliate_lastname'];
    $afectation = $rowPAT['affectation'];
    $Nofiche = $rowPAT['policeno'];
}

//Consultation
$resultpa = ("select consultatiobn,datecunsuption FROM  consomation_consom   where id ='$patientnumber'");
$pat = mysqli_query($conn, $resultpa);
while ($rowconsult = mysqli_fetch_assoc($pat)) {
$consultation = $rowconsult['consultatiobn'];	
$dateconsum = $rowconsult['datecunsuption'];	
}

//Examens


	$labo  = ("select examenmedicale,qtyexamen,upexamen,results,exam_No from  consomation_consom  WHERE id = '$patientnumber'  and examenmedicale !=''");
$labores = mysqli_query($conn, $labo);
if ($labores->num_rows > 0) {
while ($rowlab = mysqli_fetch_assoc($labores)) {
$numberexamen[] = $rowlab['exam_No'];	
$exemens[] = $rowlab['examenmedicale'];	
$qtties[] = $rowlab['qtyexamen'];	
$prices[] = $rowlab['upexamen'];	
$reslt[] = $rowlab['results'];	

}

$ntable = COUNT($exemens);
}

//Medicines
$medi  = ("select medicament,upmedicamnet,qtymedicamnet from  consomation_consom  WHERE id = '$patientnumber' and medicament !=''");
$labores = mysqli_query($conn, $medi);
if ($labores->num_rows > 0) {
while ($rowlab = mysqli_fetch_assoc($labores)) {
$medicament[] = $rowlab['medicament'];	
$upmedicamnet[] = $rowlab['upmedicamnet'];	
$qtymedicamnet[] = $rowlab['qtymedicamnet'];	
}
$nomed = COUNT($medicament);
}
//Consommables
$labo  = ("select consommable,UPcons,Qcons from  consomation_consom  WHERE id = '$patientnumber' and consommable !=''");
$labores = mysqli_query($conn, $labo);
if ($labores->num_rows > 0) {
while ($rowlab = mysqli_fetch_assoc($labores)) {
$consommable[] = $rowlab['consommable'];	
$UPcons[] = $rowlab['UPcons'];	
$Qcons[] = $rowlab['Qcons'];	
}
$nocons= COUNT($consommable);
}
//Actes
$labo  = ("select actemedicale,upacte,qtyacte from  consomation_consom  WHERE id = '$patientnumber'  and actemedicale !=''");
$labores = mysqli_query($conn, $labo);
if ($labores->num_rows > 0) {
while ($rowlab = mysqli_fetch_assoc($labores)) {
$actemedicale[] = $rowlab['actemedicale'];	
$upacte[] = $rowlab['upacte'];	
$qtyacte[] = $rowlab['qtyacte'];	
}
$noact= COUNT($actemedicale);
}
//Hospitalizations
$labo  = ("select hospitalization,uphospitalizations,qtyhoapitalization from  consomation_consom  WHERE id = '$patientnumber' and hospitalization !=''");
$labores = mysqli_query($conn, $labo);
if ($labores->num_rows > 0) {

while ($rowlab = mysqli_fetch_assoc($labores)) {
$hospitalization[] = $rowlab['hospitalization'];	
$uphospitalizations[] = $rowlab['uphospitalizations'];	
$qtyhoapitalization[] = $rowlab['qtyhoapitalization'];	
}
$nohosp= COUNT($hospitalization);
}




$diagonstic="SELECT comment FROM doctor_comments WHERE patient_id = '$patientnumber' and type='Diagnostic Diferenciel'";
$ndiagnostic = mysqli_query($conn, $diagonstic);

while($rowdi = mysqli_fetch_assoc($ndiagnostic)){
	$mdiagnostic =  $rowdi['comment'];
}
$nurse="SELECT *  FROM users where id = '4'";
$nurseres = mysqli_query($conn, $nurse);

while($rownurse = mysqli_fetch_assoc($nurseres)){
	$Nmane =  $rownurse['first_name'];
	$lNmane =  $rownurse['last_name'];
}

$Uname = $_SESSION['sess_username'];
$nursenm="SELECT user  FROM consomation_consom WHERE id = '$patientnumber' LIMIT 1";
$nursenmres = mysqli_query($conn,$nursenm);

while($rownurnmse = mysqli_fetch_assoc($nursenmres)){
    $userid =  $rownurnmse['user'];
}
$userident = ("SELECT id,first_name,last_name FROM users WHERE id = '$userid'");
$resultUSER = mysqli_query($conn, $userident);
while($rownurnmse = mysqli_fetch_assoc($resultUSER)){
    $nURSENAME =  $rownurnmse['first_name'];
    $nURSEid =  $rownurnmse['id'];
    $nURSElname=  $rownurnmse['last_name'];
    
}
?>
<!DOCTYPE html>
<html lang="en" >

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <title>Patient File</title>
  
  
  
      <style>
      body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
   table-layout: fixed;
    width: 70%;
}
page[size="A4"] {  
  width: 21cm;
  height: 27cm; 
}
page[size="A4"][layout="portrait"] {
  width: 27cm;
  height: 10cm;  
}
@media print {
  body, page {
margin-left:auto; 
    margin-right:auto;
    box-shadow: 0;
  }
}

    </style>
    <script src="PDFJs/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
    <script src="PDFJs/jspdf.min.js"></script>
   <body class="form">	  <page size="A4">
       <input type="button" id="create_pdf" value="Print File" onClick="printpage()">

	<table style=" width:90%;margin-left:3%; margin-right:5%;"  height="15%">
<tr><td colspan="4"><font size="1.5"><strong>
Kulu SOCIAL SECURITY BOARD (RSSB) <BR>
Communuty Based Health Insurance (CBHI) <BR>
Tel: 4044<br>

HEALTH CARE INVOICE/FACTURE POUR SOINS DE SANTE No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> <?php

$sql = ("SELECT consomation.consid,patient.id AS pid,consomation.consid,datecunsuption,names FROM  consomation_consom  JOIN  patient ON consomation.id=patient.id WHERE insurance='MUTUELLE' and MONTH(datecunsuption)= MONTH(CURDATE())and YEAR(datecunsuption)= YEAR(CURDATE()) and consid < $affid GROUP BY pid,names,datecunsuption ORDER BY datecunsuption ASC,consid ASC  ");

$resultNumber = mysqli_query($conn, $sql);
/*$Idsisp = mysqli_fetch_row($resultNumber);
echo $affid.'/'.$Idsisp[1].'/';
*/

 $filenumber = $resultNumber->num_rows;
  echo $filenumber + 1;
 
 
 
 ?></strong>

  <fieldset>
    <legend><strong>I. HEALTH FACILITY INFORMATION/ INFORMATION SUR LA FORMATION SANITAIRE:</strong></legend>
    Health facility name/Nom de la formation sanitaire:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> CENTRE DE SANTE Kulu</strong><BR>
    District name/Nom du District:&nbsp;&nbsp;&nbsp;&nbsp; <strong>Kulu DISTRICT</strong>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	ID Number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> <?PHP echo $affiliate_number?></strong><br>
	Type of health facility/Type de formation sanitaire: <strong>HV/CS <input type="checkbox" name="HV/CS" value="HV/CS"  checked>
                                                         HP/PS<input type="checkbox" name="HP/PS" value="HP/PS"></strong>
  </fieldset>
  <fieldset>
 <legend> <strong>II. PATIENT INFORMATION/INFORMATION SUR LE PATIENT</strong></legend>
  
  Name Head of the Household/Nom du chef de menage:<strong> <?php  echo $afname .'&nbsp;'.$aflname ?></strong>

  &nbsp;&nbsp;
	ID No:&nbsp; <strong><?php echo $fcode;?></strong><BR>
	
	 Application Number (if no ID):<BR>
	 
	 Beneficiaty name/Nom du beneficiaire:&nbsp;<strong><?php echo $fname.'&nbsp;&nbsp;'.$lname;?> </strong>
	 
	 &nbsp;&nbsp;D Number(If exists):................<BR>
	Catchment area/ Zone de rayonnement: <strong> <?php if ($district=='Kulu '){ if (($cell=='BUGINA') OR ($cell=='RUHINGO')){echo 'Z<input type="checkbox" name="z" value="z" checked>&nbsp; HZ<input type="checkbox" name="HZ" value="HZ">&nbsp;HD<input type="checkbox" name="hd" value="hd"></strong>';}else{echo 'Z<input type="checkbox" name="z" value="z">&nbsp;HZ<input type="checkbox" name="HZ" value="HZ" checked>&nbsp;HD<input type="checkbox" name="hd" value="hd"></strong>';}}else{echo 'Z<input type="checkbox" name="z" value="z">&nbsp;HZ<input type="checkbox" name="HZ" value="HZ" >&nbsp;HD<input type="checkbox" name="hd" value="hd"checked></strong>';}?>	&nbsp;&nbsp;
	Telephone number/Numero de telephone: ...............<BR>
	Sex/Sexe: &nbsp;&nbsp;<strong> 
	                                                 <?php if ($gender== 'MALE')
													 {
														 echo 'Male<input type="checkbox" checked>  Female<input type="checkbox">';
														 }
													 if ($gender== 'FEMALE')
													 {
														 echo 'Male<input type="checkbox">Female<input type="checkbox" checked>';
														 }?></strong>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ubudehe category/Categorie Ubudehe(1,2,3 or 4):&nbsp <strong><input type="text" name="pin" maxlength="1" size="1" style="border:1px solid #black; background-color:white;"  value="<?php echo $category;?>"></strong><BR>
	Age: &nbsp;&nbsp;&nbsp;<strong><?php echo $dob;?></strong>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	Prisonner/Prisonnier:&nbsp <strong>YES<input type="checkbox" name="YES" value="YES"> &nbsp NO<input type="checkbox" name="NO" value="NO" checked></strong><BR>
	
	 
	 
  </fieldset>
  <fieldset>
  <legend><strong>III. DETAILS OF MEDICAL CARE RECEIVED/;DETAILS DES SOINS RECUS</strong></legend>
  Type of medical visit/ Type de visite medicale: &nbsp;&nbsp;&nbsp Outpatient. Ambulatoire<input type="checkbox" name="Outpatient" value="Outpatient">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
    Inpatient/Hospitalisation<input type="checkbox" name="Hospitalisation" value="Hospitalisation"><BR>
	Disease episode/Episode de la maladie:<BR>
	New case/ Nouveaux cas<input type="checkbox" name="case" value="case"> 


    Occupational disease/Maladie professionelle<input type="checkbox" name="disease" value="disease"><br>
	Road traffic accident. Accident de la circulation<input type="checkbox" name="accident" value="accident">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
	  	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp
	 Work accident/Accident de travail <input type="checkbox" name="accident" value="accident">
	 	  	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     Other/Autre<input type="checkbox" name="Other" value="Other"><BR>
	<strong>DIAGNOSIS/DIAGNOSTIC:</strong>&nbsp;&nbsp;<span align="justify"><strong><?php echo $mdiagnostic;?></strong></span>
	</font></td></tr></table>
	<table style=" width:90%;margin-left:3%; margin-right:5%;" CELLSPACING=0 frame="box"  height="15%">
	<tr><td></td><td style="border: 1px solid black;"><font size="1"><strong>Descripion</td><td style="border: 1px solid black;"><font size="1.5"><strong>QTY /day</td><td style="border: 1px solid black;"><font size="1.5"><strong>Unit   cost /day</td><td style="border: 1px solid black;"><font size="1.5"><strong>Total</td></tr>
	<tr><td></td><td style="border: 1px solid black;"><font size="1.5">Consultation</td><td colspan="3" style="border: 1px solid black;"><font size="0.5"><?php echo $consultation;?></strong></td></tr>
	
<?php
$examens[0]= 'Laboratory tests/Examens de laboratoire';
if($ntable){
for($i=0; $i< $ntable ; $i++)
{
		$totexamen[$i] = $qtties[$i]*$prices[$i];
	$totalex = $totalex + $totexamen[$i];
	?>
	<tr><td><font size="1"><strong><?php echo  $examens[$i];?></td><td style="border: 1px solid black;"><font size="0.5"><?php echo $i+1?>.&nbsp;&nbsp;&nbsp;<?php echo $exemens[$i].'<strong>['.$numberexamen[$i].']-'.$reslt[$i].'</strong>';?></font></td><td style="border: 1px solid black;"><font size="0.5"><?php echo $qtties[$i]?></font></td><td style="border: 1px solid black;"><font size="0.5"><?php echo $prices[$i]?></font></td><td style="border: 1px solid black;"><strong><font size="0.5"><?php echo $totexamen[$i]?></font></strong></td></tr>
	
	<?php
}
?>
<tr><td><hr style="border: 1px solid black;"></td><td><hr style="border: 1px solid black;"></td><td><hr style="border: 1px solid black;"></td><td><hr style="border: 1px solid black;"></td><td ><hr style="border: 1px solid black;"></td></tr>
<?php
}



//Hospitalizations
if($nohosp){
$Hospitaldescr[0] = 'Hospitalization/Hospitalisation    From/Du To/Au';
for($ihosp=0; $ihosp< $nohosp ; $ihosp++)
{
		$tothosp[$ihosp] = $qtyhoapitalization[$ihosp]*$uphospitalizations[$ihosp];
	$totalhosp = $totalhosp + $tothosp[$ihosp];
	?>
	<tr>
	
	<td style="border: 0px "><font size="1"><strong><?php echo $Hospitaldescr[0];?></td><td  style="border: 1px solid black;"><font size="0.5"><?php echo $ihosp+1?>&nbsp;&nbsp;&nbsp;<?php echo $hospitalization[$ihosp]?></td><td  style="border: 1px solid black;"><font size="0.5"><?php echo $qtyhoapitalization[$ihosp]?></td><td  style="border: 1px solid black;"><font size="0.5"><?php echo $uphospitalizations[$ihosp]?></td><td  style="border: 1px solid black;"><font size="0.5"><?php echo $tothosp[$ihosp]?></td></tr>
	
	<?php
}
?>

<tr><td><hr style="border: 1px solid black;"></td><td><hr style="border: 1px solid black;"></td><td><hr style="border: 1px solid black;"></td><td><hr style="border: 1px solid black;"></td><td ><hr style="border: 1px solid black;"></td></tr>	
<?php
}
//Consommables and medical acte
$consoactes[0]='Medical procedures & consumbles/ actes & consommables medicaux:'; 
for($iC=0; $iC<$nocons ; $iC++)
{
	$totconsommle[$iC] = $Qcons[$iC]*$UPcons[$iC];
	$totalcons = $totalcons + $totconsommle[$iC];
	?>
<tr>
<?php 
if(!empty($consoactes[$iC])){
echo '<td><font size="1"><strong>'.$consoactes[$iC].'</td>';	
	
}
else{
echo '<td></td>';	
	
	
}
?>

<td  style="border: 1px solid black;"><font size="0.5"><?php echo $iC+1?>.&nbsp;&nbsp;&nbsp;<font size="0.5"><?php echo $consommable[$iC]?></td><td   style="border: 1px solid black;"><font size="0.5"><?php echo $Qcons[$iC]?></td><td  style="border: 1px solid black;"><strong><font size="0.5"><?php echo $UPcons[$iC];?></strong></td><td style="border: 1px solid black;"><strong><font size="0.5"><?php echo number_format($totconsommle[$iC],1);?></strong></td></tr>	
	
<?php	
}
?>
<tr><td><font color="black"><hr style="border: 1px solid black;"></td><td><hr style="border: 1px solid black;"></td><td><hr style="border: 1px solid black;"></td><td><hr style="border: 1px solid black;"></td><td ><hr style="border: 1px solid black;"></td></tr>	

<?php

for($iact=0; $iact<$noact ; $iact++)
{
	$totactemed[$iact] = $qtyacte[$iact]*$upacte[$iact];
	$totalact = $totalact + $totactemed[$iact];
	?>
<tr><td  style="border: 0px"></td><td  style="border: 1px solid black;"><strong><font size="1"><?php echo $iact+1?>.&nbsp;&nbsp;&nbsp;<font size="0.5"><?php echo $actemedicale[$iact]?></td><td  style="border: 1px solid black;"><font size="0.5"><?php echo $upacte[$iact];?></td><td  style="border: 1px solid black;"><strong><font size="0.5"><?php echo $qtyacte[$iact]?></strong></td><td  style="border: 1px solid black;"><strong><font size="0.5"><?php echo number_format($totactemed[$iact],1);?></strong></td></tr>	
	
<?php	
}
//MedidinesS
if($nomed){
$medicinesscr[0] = 'Medicines/Medicaments(Form/Forme & dosage):';
for($iM=0; $iM<$nomed ; $iM++)
{
	$totmed[$iM] = $qtymedicamnet[$iM]*$upmedicamnet[$iM];
	$totalmed = $totalmed + $totmed[$iM];
	?>
<tr><td  style="border: 0px "><strong><font size="0.5"><?php echo $medicinesscr[$iM];?></td><td  style="border: 1px solid black;"><font size="0.5"><?php echo $iM+1?>.&nbsp;&nbsp;&nbsp;<font size="0.5"><?php echo $medicament[$iM]?></td><td  style="border: 1px solid black;" ><font size="0.5"><?php echo $qtymedicamnet[$iM]?></td><td  style="border: 1px solid black;"><strong><font size="0.5"><?php echo $upmedicamnet[$iM];?></strong></td><td  style="border: 1px solid black;"><strong><font size="0.5"><?php echo number_format($totmed[$iM],1);?></font></strong></td></tr>	
	
<?php	
}

}
?>
	

	<tr><td  style="border: 1px solid black;"><strong><font size="1">Ambulance Date:</td><td colspan="4" style="border: 1px solid black;"><strong><font size="1">
	<?php
	// Ambulance
$ambulan  = ("select ambullance,upambullance,qtyambullance  from  consomation_consom  WHERE id = '$patientnumber' and ambullance !=''");
$ambulres = mysqli_query($conn, $ambulan);
if ($ambulres->num_rows > 0) {

while ($rowambres = mysqli_fetch_assoc($ambulres)) {
$ambulance = $rowambres['ambullance'];	
$upambullance = $rowambres['upambullance'];	
$qtyambullance = $rowambres['qtyambullance'];	
}
}
else{
$ambulance = '';	
$upambullance = 0;	
$qtyambullance = 0;	
	
}

$totambu = $upambullance*$qtyambullance;
echo number_format($totambu,1);
?>	
</strong>	<font size="0.5"></td></tr>
	<tr><td  style="border: 1px solid black;"><strong><font size="1">Other/Autre(to specify/a specifier):</td><td colspan="4" style="border: 1px solid black;"><font size="0.5"></strong></td></tr>
	
	
	</table>
	   <table border='0' align="center">
	  <tr>
	  <th  style="border: 1px solid black;"> <font size="1.5">Total amount billed/Montant total facture(100%) </th>  <th  style="border: 1px solid black;">  <font size="1.5"><?php $gotal = $consultation+$totalmed+$totalcons+$totalact+$totalex+$totalhosp+$totambu; echo number_format($gotal,1);  ?></strong>Rwf  </th> </tr>
	  <tr><th  style="border: 1px solid black;"><font size="1.5"> Patient contribution/Ticket maoderateur(200 Rwf/0 Rwf)</th>  <th  style="border: 1px solid black;"><strong> <font size="1"><?php if($insurance=='MUTUELLE'){	if($category==1){	$tm = 0;}else{	$tm = 200;	}
}
if($insurance=='RAMA/RSSB'){
$tm=$gotal -($gotal*0.85);	
}if($insurance=='MMI'){

$tm=$gotal -($gotal*0.9);	
	
}if($insurance=='MEDIPLA'){

$tm=$gotal -($gotal*0.85);	

}if($insurance=='RADIANT'){

$tm=$gotal -($gotal*0.85);	

}if($insurance=='NO INSURANCE'){

$tm=$gotal -($gotal*1);	
	
}
echo number_format($tm,1);  
?>Rwf</strong>
	  </th>
	  </tr>
	  <tr>
	  <th  style="border: 1px solid black;"><font size="1.5">
	  Amount to be paide by RSSB-CBHI/Montant a payer par RSSB-CBHI
	  </th>
	   <th  style="border: 1px solid black;"><font size="1.5">
	  &nbsp;&nbsp;<?php  echo number_format($gotal-$tm,1);  ?></strong>Rwf
	  </th>
	  </tr>
  </table><div  align = "center" style ="margin-right: 150px;"><font size="1.5"><strong>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DATE:&nbsp;&nbsp;<strong><?php echo $dtconsom =date("d/m/Y", strtotime($dateconsum));
 ;?></strong></div>
  
 <table style=" width:90%;margin-left:3%; margin-right:5%;"><tr><td><strong>

Beneficiary name& signature/Nom et signature du beneficiaire:&nbsp;&nbsp;&nbsp;<strong><?php echo $fname.'&nbsp;&nbsp;'.$lname;?> </strong><br><br>
 Nurse name & sgnature/ Nom et signature infirmier(ere)traitant:&nbsp;&nbsp;&nbsp;<strong><?php echo $nURSENAME.'&nbsp;&nbsp;'.$nURSElname;?> </strong><div align='center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
		$selectfile = ("SELECT sigature from signatures WHERE patient_id = '$nURSEid'");
	        $resultsign = mysqli_query($conn, $selectfile);      

        while($rowsign = mysqli_fetch_assoc( $resultsign )) {
				 $signature = $rowsign['sigature'];
?>				
				<img src="sigantures/<?php echo  $signature;?>" width="125" height="75" border="0" />
				<?php
				}
				?>

</div>
</td><td><strong>
<p> Health facility Stamp/Cachet du CS/PS   <br><br>
  
  Approval of CBHI Verification agent/Approbation du Verificateur <BR>
  Stamp/Cachet
</p></td></tr>
 	</td></tr></table> 
</feild>
</div></page>
</form>
<script type="text/javascript">
function printpage() {
document.getElementById('create_pdf').style.visibility="hidden";
}
</script>
<script>
    (function () {
        var
         form = $('.form'),
         cache_width = form.width(),
         a4 = [595.28, 841.89]; // for a4 size paper width and height

        $('#create_pdf').on('click', function () {
            $('body').scrollTop(0);
            createPDF();
        });
        //create pdf
        function createPDF() {
            getCanvas().then(function (canvas) {
                var
                 img = canvas.toDataURL("image/png"),
                 doc = new jsPDF({
                     unit: 'px',
                     format: 'A4'
                 });
                doc.addImage(img, 'JPEG', 2, 20);
                doc.save('bhavdip-html-to-pdf.pdf');
                form.width(cache_width);
            });
        }

        // create canvas object
        function getCanvas() {
            form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
            return html2canvas(form, {
                imageTimeout: 2000,
                removeContainer: true
            });
        }

    }());
</script>
<script>
    (function ($) {
        $.fn.html2canvas = function (options) {
            var date = new Date(),
            $message = null,
            timeoutTimer = false,
            timer = date.getTime();
            html2canvas.logging = options && options.logging;
            html2canvas.Preload(this[0], $.extend({
                complete: function (images) {
                    var queue = html2canvas.Parse(this[0], images, options),
                    $canvas = $(html2canvas.Renderer(queue, options)),
                    finishTime = new Date();

                    $canvas.css({ position: 'absolute', left: 0, top: 0 }).appendTo(document.body);
                    $canvas.siblings().toggle();

                    $(window).click(function () {
                        if (!$canvas.is(':visible')) {
                            $canvas.toggle().siblings().toggle();
                            throwMessage("Canvas Render visible");
                        } else {
                            $canvas.siblings().toggle();
                            $canvas.toggle();
                            throwMessage("Canvas Render hidden");
                        }
                    });
                    throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />", 4000);
                }
            }, options));

            function throwMessage(msg, duration) {
                window.clearTimeout(timeoutTimer);
                timeoutTimer = window.setTimeout(function () {
                    $message.fadeOut(function () {
                        $message.remove();
                    });
                }, duration || 2000);
                if ($message)
                    $message.remove();
                $message = $('<div ></div>').html(msg).css({
                    margin: auto,
                    padding: 10,
                    background: "#000",
                    opacity: 0.7,
                    position: "fixed",
                    top: 3,
                    right: 20,
                    fontFamily: 'Tahoma',
                    color: '#fff',
                    fontSize: 8,
                    borderRadius: 8,
                    width: 'auto',
                    height: 'auto',
                    textAlign: 'center',
                    textDecoration: 'none'
                }).hide().fadeIn().appendTo('body');
            }
        };
    })(jQuery);
</script>
</body>