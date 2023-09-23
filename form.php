<?php
error_reporting(0);
session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username'])  or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')){
		if(($role!="Receptionist") or ($role!="Mutuelle"))
		{
      header('Location: logout');
		}
	}
    include_once('connect_db.php');
	

$affnumber = $_GET['affnumber'];
$dtconsult = $_GET['dtconsult'];
$patientnumber = $_GET['affnumber'];
$dt = $_GET['dtconsult'];
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
$resultpa = ("select consultatiobn,datecunsuption FROM consomation_consom  where id ='$patientnumber'");
$pat = mysqli_query($conn, $resultpa);
while ($rowconsult = mysqli_fetch_assoc($pat)) {
$consultation = $rowconsult['consultatiobn'];	
$dateconsum = $rowconsult['datecunsuption'];	
}

//Examens
if($thisstatu == 'Completed' )
{
$labo  = ("select examenmedicale,qtyexamen,upexamen from consomation_consom WHERE id = '$patientnumber' and datecunsuption = '$dtconsult' and examenmedicale !=''");
$labores = mysqli_query($conn, $labo);
while ($rowlab = mysqli_fetch_assoc($labores)) {
$exemens[] = $rowlab['examenmedicale'];	
$qtties[] = $rowlab['qtyexamen'];	
$prices[] = $rowlab['upexamen'];	

}
}
else{
$labo  = ("select examen,examen_qty,examen_price,results,Noexamen from consom_labs WHERE patient_id = '$patientnumber'");
$labores = mysqli_query($conn, $labo);
while ($rowlab = mysqli_fetch_assoc($labores)) {
$exemens[] = $rowlab['examen'];	
$qtties[] = $rowlab['examen_qty'];	
$prices[] = $rowlab['examen_price'];	
$results[] = $rowlab['results'];
$Noexamen[] = $rowlab['Noexamen'];	
}
}
$ntable = COUNT($exemens);
//Medicines
$medi  = ("select medicament,upmedicamnet,qtymedicamnet from consomation_consom WHERE id = '$patientnumber' and medicament !=''");
$labores = mysqli_query($conn, $medi);
while ($rowlab = mysqli_fetch_assoc($labores)) {
$medicament[] = $rowlab['medicament'];	
$upmedicamnet[] = $rowlab['upmedicamnet'];	
$qtymedicamnet[] = $rowlab['qtymedicamnet'];	
}
$nomed = COUNT($medicament);
//Consommables
$labo  = ("select consommable,UPcons,Qcons from consomation_consom WHERE id = '$patientnumber' and consommable !=''");
$labores = mysqli_query($conn, $labo);
while ($rowlab = mysqli_fetch_assoc($labores)) {
$consommable[] = $rowlab['consommable'];	
$UPcons[] = $rowlab['UPcons'];	
$Qcons[] = $rowlab['Qcons'];	
}
$nocons= COUNT($consommable);

//Actes
$labo  = ("select actemedicale,upacte,qtyacte from consomation_consom WHERE id = '$patientnumber'  and actemedicale !=''");
$labores = mysqli_query($conn, $labo);
while ($rowlab = mysqli_fetch_assoc($labores)) {
$actemedicale[] = $rowlab['actemedicale'];	
$upacte[] = $rowlab['upacte'];	
$qtyacte[] = $rowlab['qtyacte'];	
}
$noact= COUNT($actemedicale);

//Hospitalizations
$labo  = ("select hospitalization,uphospitalizations,qtyhoapitalization from consomation_consom WHERE id = '$patientnumber' and hospitalization !=''");
$labores = mysqli_query($conn, $labo);
while ($rowlab = mysqli_fetch_assoc($labores)) {
$hospitalization[] = $rowlab['hospitalization'];	
$uphospitalizations[] = $rowlab['uphospitalizations'];	
$qtyhoapitalization[] = $rowlab['qtyhoapitalization'];	
}
$nohosp= COUNT($hospitalization);

$palainte="SELECT * FROM doctor_comments WHERE  	patient_id = '$patientnumber' and type='Plainte'";
$doctpl = mysqli_query($conn, $palainte);

while($rowpl = mysqli_fetch_assoc($doctpl)){
	$plainte =  $rowpl['comment'];
}

$etgeneral="SELECT * FROM doctor_comments WHERE patient_id = '$patientnumber' and type='Etat Gneneral'";
$docegen = mysqli_query($conn, $etgeneral);

while($roweg = mysqli_fetch_assoc($docegen)){
	$Etatgeneral =  $roweg['comment'];
}

$antecedent="SELECT * FROM doctor_comments WHERE patient_id = '$patientnumber' and type='Antecedent'";
$anteced = mysqli_query($conn, $antecedent);

while($rowant = mysqli_fetch_assoc($anteced)){
	$antedent =  $rowant['comment'];
}
$examenpysique="SELECT * FROM doctor_comments WHERE patient_id = '$patientnumber' and type='Examen Physique'";
$ephysique = mysqli_query($conn, $examenpysique);

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
  margin-bottom: 0.0cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="portrait"] {
  width: 26.7cm;
  height: 21cm;  
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
    </style>
    <script src="PDFJs/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
    <script src="PDFJs/jspdf.min.js"></script>
   <body class="form">	  <page size="A4">
       <input type="button" id="create_pdf" value="Print File">

	<table>
<tr><td colspan="4"><strong>
Kulu SOCIAL SECURITY BOARD (RSSB) <BR>
Communuty Based Health Insurance (CBHI) <BR>
Tel: 4044</strong><br>

HEALTH CARE INVOICE/FACTURE POUR SOINS DE SANTE No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> <?php echo $Nofiche ;?></strong>

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
	Catchment area/ Zone de rayonnement: <strong> <?php if ($district=='Kulu'){ if ($sector=='SHANGI'){echo 'Z<input type="checkbox" name="z" value="z" checked>&nbsp; HZ<input type="checkbox" name="HZ" value="HZ">&nbsp;HD<input type="checkbox" name="hd" value="hd"></strong>';}else{echo 'Z<input type="checkbox" name="z" value="z">&nbsp;HZ<input type="checkbox" name="HZ" value="HZ" checked>&nbsp;HD<input type="checkbox" name="hd" value="hd"></strong>';}}else{echo 'Z<input type="checkbox" name="z" value="z">&nbsp;HZ<input type="checkbox" name="HZ" value="HZ" >&nbsp;HD<input type="checkbox" name="hd" value="hd"checked></strong>';}?>	&nbsp;&nbsp;
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
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ubudehe category/Categorie Ubudehe(1,2,3 or 4):&nbsp <strong><input type="text" name="pin" maxlength="2" size="2" style="border:1px solid #black; background-color:white;"  value="<?php echo $category;?>"></strong><BR>
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
	<strong>DIAGNOSIS/DIAGNOSTIC</strong>
	</td></tr>
	  <tr><th colspan="2"  style="border: 1px solid black;">Description</th><th  style="border: 1px solid black;"><table><tr><th><font size="0.5"> Quantity/Days </th> <th> <font size="0.5">Unitcost/Days</th><th><font size="0.5"> Total cost</th></tr></table></tr>
	 <tr><td  style="border: 1px solid black;">Consultation</td><td colspan="3"  style="border: 1px solid black;"><table><tr><td><strong><font size="0.5"><?php echo $consultation;?></strong></td></tr></table></td></tr>
	<tr><td  style="border: 1px solid black;">Laboratory tests/Examens de laboratoire</td><td colspan="3"  style="border: 1px solid black;"><table ><?php
for($i=0; $i< $ntable ; $i++)
{
		$totexamen[$i] = $qtties[$i]*$prices[$i];
	$totalex = $totalex + $totexamen[$i];
	?>
	<tr><td><font size="0.5"><?php echo $i+1?>&nbsp;&nbsp;&nbsp;<?php echo $exemens[$i]?></font></td><td><font size="0.5"><?php echo $qtties[$i]?></font></td><td><font size="0.5"><?php echo $prices[$i]?></font></td><td><strong><font size="0.5"><?php echo $totexamen[$i]?></font></strong></td></tr>
	
	<?php
}
	?></table></td></tr>
<tr><td  style="border: 1px solid black;"> Hospitalization/Hospitalisation &nbsp;&nbsp; From/Du To/Au</td><td colspan="3"  style="border: 1px solid black;"><table><?php
for($ihosp=0; $ihosp< $nohosp ; $ihosp++)
{
		$tothosp[$ihosp] = $qtyhoapitalization[$ihosp]*$uphospitalizations[$ihosp];
	$totalhosp = $totalhosp + $tothosp[$ihosp];
	?>
	<tr><td><font size="0.5"><?php echo $i+1?>&nbsp;&nbsp;&nbsp;<?php echo $hospitalization[$nohosp]?></td><td><font size="0.5"><?php echo $qtyhoapitalization[$i]?></td><td><font size="0.5"><?php echo $uphospitalizations[$i]?></td><td><font size="0.5"><?php echo $tothosp[$i]?></td></tr>
	
	<?php
}
	?></table></td></tr>
	
	  <tr><td  style="border: 1px solid black;"> Medical procedures &  consumbles/ actes  & consommables medicaux:</td><td colspan="3"  style="border: 1px solid black;"><table ><?php
for($iC=0; $iC<$nocons ; $iC++)
{
	$totconsommle[$iC] = $Qcons[$iC]*$UPcons[$iC];
	$totalcons = $totalcons + $totconsommle[$iC];
	?>
<tr><td><font size="0.5"><?php echo $iC+1?></td><td><font size="0.5"><?php echo $consommable[$iC]?></td><td align="center"><font size="0.5"><?php echo $Qcons[$iC]?></td><td><strong><font size="0.5"><?php echo $UPcons[$iC];?></strong></td><td><strong><font size="0.5"><?php echo number_format($totconsommle[$iC],1);?></strong></td></tr>	
	
<?php	
}
?>
<?php
for($iact=0; $iact<$noact ; $iact++)
{
	$totactemed[$iact] = $qtyacte[$iact]*$upacte[$iact];
	$totalact = $totalact + $totactemed[$iact];
	?>
<tr><td><font size="0.5"><?php echo $iact+1?></td><td><font size="0.5"><?php echo $actemedicale[$iact]?></td><td align="center"><font size="0.5"><?php echo $qtyacte[$iact]?></td><td><strong><font size="0.5"><?php echo $upacte[$iact];?></strong></td><td><strong><font size="0.5"><?php echo number_format($totactemed[$iact],1);?></strong></td></tr>	
	
<?php	
}
?></table></td></tr >
		  <tr border="1"><td  style="border: 1px solid black;"> Medicines/Medicaments(Form/Forme & dosage):</td><td colspan="3"  style="border: 1px solid black;"><table  style="border: 0px solid white;"><?php
for($iM=0; $iM<$nomed ; $iM++)
{
	$totmed[$iM] = $qtymedicamnet[$iM]*$upmedicamnet[$iM];
	$totalmed = $totalmed + $totmed[$iM];
	?>
<tr><td><font size="0.5"><?php echo $iM+1?></td><td><font size="0.5"><?php echo $medicament[$iM]?></td><td align="center"><font size="0.5"><?php echo $qtymedicamnet[$iM]?></td><td><strong><font size="0.5"><?php echo $upmedicamnet[$iM];?></strong></td><td><strong><font size="0.5"><?php echo number_format($totmed[$iM],1);?></strong></td></tr>	
	
<?php	
}
?></table></td></tr>
<tr><td  style="border: 1px solid black;"> Ambulance Date:</td><td colspan="3"  style="border: 1px solid black;"></td></tr>
<tr><td  style="border: 1px solid black;"> Other/Autre(to specify/a specifier):</td><td colspan="3"  style="border: 1px solid black;"></td></tr></table>
<table style="border:0px;margin-left:auto;margin-right:auto;" width="75%">
<tr><td colspan="2">  	 
  <table border='0'>
	  <tr>
	  <th  style="border: 1px solid black;"> Total amount billed/Montant total facture(100%) </th>  <th  style="border: 1px solid black;">  <?php $gotal = $consultation+$totalmed+$totalcons+$totalact+$totalex+$totalhosp; echo number_format($gotal,1);  ?></strong>Rwf  </th> </tr>
	  <tr><th  style="border: 1px solid black;"> Patient contribution/Ticket maoderateur(200 Rwf/0 Rwf)</th>  <th  style="border: 1px solid black;"><strong> <?php if($insurance=='MUTUELLE'){	if($category==1){	$tm = 0;}else{	$tm = 200;	}
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
	  <th  style="border: 1px solid black;">
	  Amount to be paide by RSSB-CBHI/Montant a payer par RSSB-CBHI
	  </th>
	   <th  style="border: 1px solid black;">
	  &nbsp;&nbsp;<?php  echo number_format($gotal-$tm,1);  ?></strong>Rwf
	  </th>
	  </tr>
  </table><div align="right"> DATE:&nbsp;&nbsp;<strong><?php echo $dtconsom =date("d/m/Y", strtotime($dateconsum));
 ;?></strong></div><br>
  
  


Beneficiary name& signature/Nom et signature du beneficiaire:&nbsp;&nbsp;&nbsp;<strong><?php echo $fname.'&nbsp;&nbsp;'.$lname;?> </strong><br>
 Nurse name & sgnature/ Nom et signature infirmier(ere)traitant
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp
 Approval of CBHI Verification agent/Approbation du Verificateur CBHI <BR>
 Health facility stamp/Cachet du CS/PS 
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  
 CBHI stamp/Cachet
 	</td></tr></table> 
</feild>
</div></page>
</form>
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
                     format: 'a4'
                 });
                doc.addImage(img, 'JPEG', 20, 20);
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
                    top: 10,
                    right: 10,
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