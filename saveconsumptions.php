

<?php
error_reporting(0);
session_start();
include_once('connect_db.php');
	$userid = $_SESSION['sess_user_id'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username'])  or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')){
		if(($role!="Receptionist") or ($role!="Mutuelle"))
		{
      header('Location: logout');
		}
	}
$_SESSION['tosave']= "";

    $role = $_SESSION['sess_userrole'];

	$name = $_SESSION['sess_name'];

	$tel= $_SESSION['sess_phone'];

	$lname = $_SESSION['sess_lname'];
	$postedesante = $_SESSION['sess_postdsante'];
$patientnumber = $_SESSION['patientnumb'];
$myndate = $_POST['thisdate'];
     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Receptionist"){

      header('Location: logout');

	}

include_once('connect_db.php');
$userid = $_SESSION['sess_username'];
$userident = ("SELECT id,first_name,last_name FROM users WHERE username = '$userid'");
$resultUSER = mysqli_query($conn, $userident);
while($rownurnmse = mysqli_fetch_assoc($resultUSER)){
    $nURSENAME =  $rownurnmse['first_name'];
    $nURSEid =  $rownurnmse['id'];
    $nURSElname=  $rownurnmse['last_name'];
    
}	

$resultpa = ("select id,names,lname,insurance,affiliate_number,consultatiom,category,consultatiom from patient where id ='$patientnumber' ");
$pat = mysqli_query($conn, $resultpa);
while ($rowval = mysqli_fetch_assoc($pat)) {
   $afnumber= $rowval['affiliate_number'];
   $patumber= $rowval['affiliate_number'];
   $firstname=  $rowval['names'];
   $lastname=  $rowval['lname'];
   $insurance=  $rowval['insurance'];
   $cosnult= $rowval['consultatiom'];
   $patinetid= $rowval['id'];
   $category = $rowval['category'];
   $consulta= $rowval['consultatiom'];
}



?>





	<!-- MAIN CONTENT -->

	<div id="content">

		

		<div class="page-full-width cf">



			 <!-- end side-menu -->

			



			

				<div class="content-module">				

					

					<div class="content-module-main cf">

		<div align="center">

		<form  method="POST" action="" >


		

		

		

		<div id="invoice-POS">

    

    <center id="top">



    </center><!--End InvoiceTop-->

    

    <div id="mid" align="center">

      <div class="info">

        <p> 

             <strong>MINISTRY OF HEALTH</strong><br />

                  <strong>DD PROVINCE</strong><br />

                  <strong>Kulu DISTRICT</strong><br/>

				  <strong>Kulu HEALTH CENTER</strong><br>
				  <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>

        </p><br>

      </div>

    </div><!--End Invoice Mid-->

    

    <div id="bot"  align="center">

NAME: <STRONG><?php echo $firstname.'&nbsp;&nbsp;'.$lastname;?></STRONG></BR>

INSURANCE : <STRONG> <?php echo $insurance;?></STRONG></BR>

INSURANCE No: <STRONG><?php echo  $afnumber;?></STRONG></BR>

CATEGORY: <STRONG><?php echo $category;?></STRONG></BR>

CONSULTATION: <STRONG><?php echo $cosnult;?></STRONG></BR>

DATE: <STRONG><?php echo date("d-m-Y", strtotime($myndate))?></STRONG></BR></BR>
<input type="text" name="patientID" value="<?php echo $_SESSION['patientnumb'];?>"  style="display:none"  required>
<input type="text" name="thisdate" value="<?php echo $myndate ;?>"   style="display:none"  required >
	<p>
	<?php
//Medicines	
$medi  = ("select consid,medicament,upmedicamnet,qtymedicamnet from consomation_consom WHERE id = '$patientnumber' and medicament!=''");
$labores = mysqli_query($conn, $medi);
if ($labores->num_rows > 0) {
while ($rowlab = mysqli_fetch_assoc($labores)) {
$idmedicament[] = $rowlab['consid'];	
$medicament[] = $rowlab['medicament'];	
$upmedicamnet[] = $rowlab['upmedicamnet'];	
$qtymedicamnet[] = $rowlab['qtymedicamnet'];	
}
$nomed = COUNT($medicament);
}
else{
$nomed=0;	
}

if($nomed >0)
{
?>
 <strong>Medicines </strong>
 <table style="width: 20%;">
 <tr><th>No</th><th> Medicine</th><th>Quantity</th><th>Price</th><th>Total</th></tr>
<?php
for($iM=0; $iM<$nomed ; $iM++)
{
		$totmed[$iM] = $qtymedicamnet[$iM]*$upmedicamnet[$iM];

?>
<tr><td><?php echo $iM +1;?></td><td><?php  echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($medicament[$iM]))));?></td><td><?php  echo number_format($qtymedicamnet[$iM]);?></td><td><?php  echo $upmedicamnet[$iM];?></td><td><strong><?php  echo $totmed[$iM];?></strong></td></tr>

<?php
	$totalmed = $totalmed + $totmed[$iM];	
	
}
?>
<tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo $totalmed;?></strong></td></tr>
</table>
<?php
}

//Consommables
$consom  = ("select consid,consommable,UPcons,Qcons from consomation_consom WHERE id = '$patientnumber' and consommable !=''");
$resconsm = mysqli_query($conn, $consom);
if ($resconsm->num_rows > 0) {
while ($rowconsom = mysqli_fetch_assoc($resconsm)) {
$IDconsommable[] = $rowconsom['consid'];	
$consommable[] = $rowconsom['consommable'];	
$UPcons[] = $rowconsom['UPcons'];	
$Qcons[] = $rowconsom['Qcons'];	
}
$nocons= COUNT($consommable);
}
else{
$nocons=0;	
	
}
 if($nocons > 0)
 {
	 ?>
 <strong>Consumables </strong>
 <table  style="width: 20%;">
 <tr><th>No</th><th> Consumable</th><th>Quantity</th><th>Price</th><th>Total</th></tr>	 
<?php	 
	for($iC=0; $iC<$nocons ; $iC++)
{
	$totconsommle[$iC] = $Qcons[$iC]*$UPcons[$iC];
	?>
<tr><td><?php echo $iC +1;?></td><td><?php  echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($consommable[$iC]))));?></td><td><?php  echo number_format($Qcons[$iC]);?></td><td><?php  echo $UPcons[$iC];?></td><td><strong><?php  echo $totconsommle[$iC];?></strong></td></tr>
	
	
	<?php
	$totalcons = $totalcons + $totconsommle[$iC];
	
	
}	
 
 
 ?>
 <tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo $totalcons;?></strong></td></tr>
</table>
<?php
 }
 //Actes
$actmed  = ("select consid,actemedicale,upacte,qtyacte from consomation_consom WHERE id = '$patientnumber'  and actemedicale !=''");
$actres = mysqli_query($conn, $actmed);
if ($actres->num_rows > 0) {
while ($rowact = mysqli_fetch_assoc($actres)) {
$idActemed[] = $rowact['consid'];	
$actemedicale[] = $rowact['actemedicale'];	
$upacte[] = $rowact['upacte'];	
$qtyacte[] = $rowact['qtyacte'];	
}
$noact= COUNT($actemedicale);
}
else
{
$noact=0;
}	
 if($noact > 0){
	 ?>
<strong>Medica Acts </strong>
 <table  style="width: 20%;">
 <tr><th>No</th><th> Medical Act</th><th>Quantity</th><th>Price</th><th>Total</th></tr>	 	 
	 
	 
	 <?php
 
 for($iact=0; $iact<$noact ; $iact++)
{
	$totactemed[$iact] = $qtyacte[$iact]*$upacte[$iact];
	?>
	<tr><td><?php echo $iact +1;?></td><td><?php  echo ucfirst(strtolower($actemedicale[$iact]));?></td><td><?php  echo number_format($qtyacte[$iact]);?></td><td><?php  echo $upacte[$iact];?></td><td><strong><?php  echo $totactemed[$iact];?></strong></td></tr>
	
	<?php
	$totalact = $totalact + $totactemed[$iact];
	
	
}


?>
 <tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo $totalact;?></strong></td></tr>
</table>

<?php
 }
// Examens

$labo  = ("select consid,examenmedicale,qtyexamen,upexamen,results,exam_No  from consomation_consom WHERE id = '$patientnumber'  and examenmedicale !=''");
$labores = mysqli_query($conn, $labo);
if ($labores->num_rows > 0) {
while ($rowlab = mysqli_fetch_assoc($labores)) {
$idExamens[]= $rowlab['consid'];
$exemens[] = $rowlab['examenmedicale'];	
$qtties[] = $rowlab['qtyexamen'];	
$prices[] = $rowlab['upexamen'];	
$Results[] = $rowlab['results'];	
$NumberEx[] = $rowlab['exam_No'];	

}
$ntable = COUNT($exemens);
}
else{
$ntable=0;	
}
if($ntable >0)
{
	?>
<strong>Examens </strong>
 <table  style="width: 20%;">
 <tr><th>No</th><th> Examens</th><th>Quantity</th><th>Price</th><th>Total</th></tr>	 	 
	<?php
for($i=0; $i< $ntable ; $i++)
{
	$totexamen[$i] = $qtties[$i]*$prices[$i];
	$totalex = $totalex + $totexamen[$i];
?>
<tr><td><?php echo $i+1?></td><td><?php echo ucfirst(strtolower($exemens[$i])) ?></td><td align="center"><?php echo $qtties[$i]?></td><td><?php echo $prices[$i];?></strong></td><td><strong><?php echo $totexamen[$i];?></strong></td></tr>	
	
<?php	

}
?>
<tr><td colspan="3" ><strong>Total </td><td><strong><?php echo $totalex;?></td></tr>

</table>
<?php
}	


//Hospitalizations
$hosp  = ("select consid,hospitalization,uphospitalizations,qtyhoapitalization,FdtHospitalisation,LdtHospitalisation from consomation_consom WHERE id = '$patientnumber'  and hospitalization !=''");
$hospres = mysqli_query($conn, $hosp);
if ($hospres->num_rows > 0) {
while ($rowhosp= mysqli_fetch_assoc($hospres)) {
$idHosp[] = $rowhosp['consid'];
$hospitalization[] = $rowhosp['hospitalization'];	
$uphospitalizations[] = $rowhosp['uphospitalizations'];	
$qtyhoapitalization[] = $rowhosp['qtyhoapitalization'];	
$FdtHospitalisation[] = $rowhosp['FdtHospitalisation'];	
$LdtHospitalisation[] = $rowhosp['LdtHospitalisation'];	
}
$nohosp= COUNT($hospitalization);
}
else{
$nohosp =0;	
	
}
if($nohosp >0)
{
	?>
	<strong>Hospitalizations </strong>
 <table  style="width: 20%;">
 <tr><th>No</th><th> Hospitalizations </th><th>Quantity</th><th>Price</th><th>Total</th></tr>	 
 
 <?php
	for($ih=0; $ih< $nohosp ; $ih++)
{
		$tothospitalisation[$ih] = $qtyhoapitalization[$ih]*$uphospitalizations[$ih];
		?>
	<tr><td><?php echo $ih +1;?></td><td><?php  echo ucfirst(strtolower($hospitalization[$ih]));?></td><td><?php  echo number_format($qtyhoapitalization[$ih]);?></td><td><?php  echo number_format ($uphospitalizations[$ih]);?></td><td><strong><?php  echo $tothospitalisation[$ih];?></strong></td></tr>
<?php
	$totalhosp = $totalhosp + $tothospitalisation[$ih];
	
}
?>
 <tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo $totalhosp;?></strong></td></tr>

<?php

}


?>
</table>
<?php

//Ambullance
$ambul  = ("select consid,ambullance ,upambullance ,qtyambullance from consomation_consom WHERE id = '$patientnumber'  and ambullance !=''");
$ambres = mysqli_query($conn, $ambul);
if ($ambres->num_rows > 0) {
while ($rowamb= mysqli_fetch_assoc($ambres)) {
$ambula = $rowamb['ambullance'];
$ambprice = $rowamb['qtyambullance'];	
$ambkm = $rowamb['upambullance'];	
}
}
else{
$ambula = '';	
$ambprice = 0;	
$ambkm = 0;		
}
if ($ambula !=''){
	
	 $ambAmount = $ambprice*$ambkm;
echo '<strong>Ambulance <strong>  :  '.number_format($ambAmount,1).'<br>';	
}


if($insurance=='RAMA/RSSB'){
$copymt=$ggrandtotal11 -($ggrandtotal11*0.85);	

}if($insurance=='MMI'){
$copymt=$ggrandtotal11 -($ggrandtotal11*0.9);	
	
}if($insurance=='MEDIPLA'){
$copymt=$ggrandtotal11 -($ggrandtotal11*0.85);	

}if($insurance=='RADIANT'){
$copymt=$ggrandtotal11 -($ggrandtotal11*0.85);	

}if($insurance=='NO INSURANCE'){
$copymt=$ggrandtotal11;	
	
}
if($insurance=='MUTUELLE' and $category != 1){
$copymt=200;	
}
if($insurance=='MUTUELLE' and $category == 1){
$copymt=0;	
}

$insured=$ggrandtotal11- $copymt;
?>

	
	
	
				

				  <u>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
<br>Grand total: <input type="text" name="ttl" style="border: none;border-color: transparent;font-weight:bold;" readOnly value=<?php echo $_POST['ttl']; ?>></BR>

Assurance: <input type="text" name="ttl2" style="border: none;border-color: transparent;font-weight:bold;" readOnly value=<?php echo $_POST['ttl2']; ?>></BR>

Ticket moderateur :<input type="text" name="ttl1" style="border: none;border-color: transparent;font-weight:bold;" readOnly value=<?php echo $_POST['ttl1'] ; ?>></BR>

</BR><STRONG>Cashier : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $name.'&nbsp;&nbsp;&nbsp;&nbsp;'.$lname;?></STRONG></BR>
<?php
			$selectfile = ("SELECT sigature from signatures WHERE patient_id = '$nURSEid'");
	        $resultsign = mysqli_query($conn, $selectfile);      

        while($rowsign = mysqli_fetch_assoc( $resultsign )) {
				$signature = $rowsign['sigature'];	
				echo '<img src="sigantures/'.$signature.'" width="85" height="25" border="0" />';
				}
				?>



				</div><!--End InvoiceBot-->

  </div>
  </div>
  </div>
  </div>
  </div>
<link rel="stylesheet" href="css/font-awesome.min.css">
<br><br>
  <div align="center">
  <table>
   <?php if($_POST['ttl1']>0)
   {   
   ?>
  <tr><td><input type="submit"  name="print" id="printButton1" onClick="printpage()" value="Print">
</td>
<td>
<input type="submit" name="save" id="bigbutton" value="Save">
</td>
<td>
<span id="imagespan"><a href="payment?payment=<?php echo $_POST['ttl1'];?>"><img src="images/MTNimage.png" width="64" height="64" border="0" /></a></span>
</td>
</tr>
<?php
   }
   else
   {
   
   ?>
  <tr><td><input type="submit"  name="print" id="printButton1" onClick="printpage1()" value="Print">
</td>
<td>
<input type="submit" name="save" id="bigbutton" value="Save">
</td>
<td>
</td>
</tr>
<?php 
   }
   ?>
</table>

</div>
<br><br><br><br>
		</form>

		</div>

		</div>

		</div>

		</div>
		<?php
	if (isset($_POST["save"])) {
		$patientnumber = $_POST['patientID'];
		$myndate = $_POST['thisdate'];
		
	$_SESSION['tosave'] = "Yes";
$resultpa = ("select id,names,lname,insurance,affiliate_number,consultatiom,category,consultatiom from patient where id ='$patientnumber' ");
$pat = mysqli_query($conn, $resultpa);
while ($rowval = mysqli_fetch_assoc($pat)) {
   $afnumber= $rowval['affiliate_number'];
   $patumber= $rowval['affiliate_number'];
   $firstname=  $rowval['names'];
   $lastname=  $rowval['lname'];
   $insurance=  $rowval['insurance'];
   $cosnult= $rowval['consultatiom'];
   $patinetid= $rowval['id'];
   $category = $rowval['category'];
   $consulta= $rowval['consultatiom'];
}

$mymaximum = MAX($nomed,$nocons,$noact,$ntable,$nohosp);
for($isave = 0; $isave< $mymaximum ; $isave++){
$insert1 = ("INSERT INTO consomation (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,actemedicale,upacte,qtyacte,examenmedicale,upexamen,qtyexamen,results,exam_No,hospitalization,uphospitalizations,qtyhoapitalization,FdtHospitalisation,LdtHospitalisation,datecunsuption,user,postedesante)
		     VALUES('$patientnumber','$cosnult','$medicament[$isave]', '$upmedicamnet[$isave]','$qtymedicamnet[$isave]','$consommable[$isave]','$UPcons[$isave]','$Qcons[$isave] ','$actemedicale[$isave]', '$qtyacte[$isave]','$upacte[$isave]','$exemens[$isave]','$prices[$isave]','$qtties[$isave]','$Results[$isave]','$NumberEx[$isave]','$hospitalization[$isave]','$uphospitalizations[$isave]','$qtyhoapitalization[$isave]','$FdtHospitalisation[$isave]','$LdtHospitalisation[$isave]','$myndate','$userid','$postedesante')");
$resultsave1 = mysqli_query($conn, $insert1);	
}
if($ambula != ''){
$insertAmbul = ("INSERT INTO consomation (id,consultatiobn,ambullance,upambullance,qtyambullance,datecunsuption,user,postedesante)
      VALUES('$patientnumber','$cosnult','$ambula','$ambkm','$ambprice','$myndate','$userid','$postedesante')");
                       $resultsaveAmb= mysqli_query($conn, $insertAmbul);
	
	}
if($resultsave1 OR $insertAmbul){
$deleteCONSULTAT = "DELETE from consultation WHERE  	patient_id   ='$patientnumber' "; 
mysqli_query($conn,$deleteCONSULTAT);
echo "<script>alert('Patient Saved and Sent to Cashier')</script>";


																																									
?>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
</script>
<script type='text/javascript'>
         self.close();
    </script>

<?php


}
else if (!empty($cosnult) OR ($cosnult != '0')) {

	$consult = ("INSERT INTO consomation (id,consultatiobn,datecunsuption,user,postedesante)VALUES('$patientnumber','$cosnult','$myndate','$userid','$postedesante')");

	                        $saveconsult= mysqli_query($conn, $consult);
							
	if($saveconsult)
	{
$deleteCONSULTAT = "DELETE from consultation WHERE  	patient_id   ='$patientnumber' "; 
mysqli_query($conn,$deleteCONSULTAT);
echo "<script>alert('Patient Saved and Sent to Cashier')</script>";
		?>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
</script>
<script type='text/javascript'>
         self.close();
    </script>

<?php
}
		}
else{
	
echo "<h3 align='center'><font color='red'>Consumptions Not saved</font></h3>";	
	
}
	}

?>

</div>	
<script>

    var childWindow = "";
    var newTabUrl="m_reception";

    function openNewTab(){
        childWindow = window.open(newTabUrl);
    }

    function refreshExistingTab(){
        newTabUrl.reload();;
    }

</script>	
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function preventBackspace(e) {
  var evt = e || window.event;
  if (evt) {
      var keyCode = evt.charCode || evt.keyCode;
      if (keyCode === 8 || keyCode === 46) {
          if (evt.preventDefault) {
              evt.preventDefault();
          } else {
              evt.returnValue = false;
          }
      }
  }
}
function calculatevalues() {
	var List1;
	if(document.getElementById("List1").checked)
	{
	 List1 = parseInt(document.getElementById("List1").value);
	}
	else{
	 List1 = 0;
		
	}
	var List2 = parseInt(document.getElementById("List2").value);
	
	if(document.getElementById("List3").checked)
	{
	 var List3 = parseInt(document.getElementById("List3").value);
	}
	else{
	 var List3 = 0;
		
	}
	var total = parseInt(document.getElementById("ttltemp").value);
	var tottickemod = document.getElementById("ttl1");
	var totalticketmod = parseInt(document.getElementById("ttl1temp").value);
	
	var hidden_field = parseInt(document.getElementById("hidden_field").value);
	var calcphtotcopy =  hidden_field * List2;
	var allval = total + calcphtotcopy + List1 + List3;
	var tottickmodval= totalticketmod + calcphtotcopy + List1 + List3;
	ttl.value =  allval;
	tottickemod.value=tottickmodval;
    
}

</script>
<script type="text/javascript">

total = 0;

List1 = 1;

List2 = 1;

List3 = 1;

List4 = 1;



function addUp(num, x)

	 {	

	 	if (x == "List1" && List1 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo + numo;

		 	document.patient.ttl.value = nwTemp;

			//copymt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List1 = 0;

			return List1;

		}

		if (x == "List1" && List1 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 - numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List1 = 1;

		}

		if (x == "List2" && List2 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo + numo;

		 	document.patient.ttl.value = nwTemp;

			//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List2 = 0;

			return List2;

		}

		if (x == "List2" && List2 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 - numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List2 = 1;

		}

		

		if (x == "List3" && List3 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo + numo;

		 	document.patient.ttl.value = nwTemp;

			//copymt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List3 = 0;

			return List3;

		}

		if (x == "List3" && List3 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 - numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List3 = 1;

		}

		

		if (x == "List4" && List4 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

			//copymt

			

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 - numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List4 = 0;

			return List4;

		}

		if (x == "List4" && List4 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo + numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List4 = 1;

		}

	}

	//for coopeymnt



</script>



<script type="text/javascript">

total = 0;

List1 = 1;

List2 = 1;

List3 = 1;

List4 = 1;



function addUp1(num, x)

	 {	

	 	if (x == "List1" && List1 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

			//copymt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 - numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List1 = 0;

			return List1;

		}

		if (x == "List1" && List1 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo + numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List1 = 1;

		}

		if (x == "List2" && List2 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

			//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 - numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List2 = 0;

			return List2;

		}

		if (x == "List2" && List2 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo + numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List2 = 1;

		}

		

		if (x == "List3" && List3 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

			//copymt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 - numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List3 = 0;

			return List3;

		}

		if (x == "List3" && List3 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo+numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List3 = 1;

		}

		

		if (x == "List4" && List4 == 1) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo + numo;

		 	document.patient.ttl.value = nwTemp;

			//copymt

			

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1 + numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List4 = 0;

			return List4;

		}

		if (x == "List4" && List4 == 0) {

			temp = document.patient.ttl.value;

		 	tempo = parseInt(temp);

		 	numo = parseInt(num);

			nwTemp = tempo - numo;

		 	document.patient.ttl.value = nwTemp;

				//copymnt

			temp1 = document.patient.ttl1.value;

		 	tempo1 = parseInt(temp1);

		 	numo1 = parseInt(num);

			nwTemp1 = tempo1- numo1;

		 	document.patient.ttl1.value = nwTemp1;

			List4 = 1;

		}

	}

	//for coopeymnt



</script>

				

 <script type="text/javascript">

function printpage() {
  var x = document.getElementById("printButton1");
  var x1 = document.getElementById("bigbutton");
    var x2 = document.getElementById("imagespan");

 x.style.display = "none";
 x1.style.display = "none";
 x2.style.display = "none";
alert('Printing Invoice');

window.print();
}
function printpage1() {
  var x = document.getElementById("printButton1");
  var x1 = document.getElementById("bigbutton");
1
 x.style.display = "none";
 x1.style.display = "none";
alert('Printing Invoice');

window.print();
}
</script>

 <script> 
   $(function() {
  var checkbox = $("#List2");
  var hidden = $("#hidden_field");
  hidden.hide();
  checkbox.change(function() {
    if (checkbox.is(':checked')) {
      hidden.show();
	  document.getElementById("hidden_field").disabled = false;
	  document.getElementById("hidden_field").value = "1";
    } else {
      hidden.hide();
	  document.getElementById("hidden_field").disabled = true;
	  	  document.getElementById("hidden_field").value = "";


    }
  });
});
</script> 
<style>
input[type="checkbox"][readonly] {
  pointer-events: none;
}
input#bigbutton {
width:100px;
background: #3e9cbf; /*the colour of the button*/
padding: 8px 14px 10px; /*apply some padding inside the button*/
border:1px solid #3e9cbf; /*required or the default border for the browser will appear*/
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
/*style the text*/
font-size:1.5em;
font-family:Oswald, sans-serif; /*Oswald is available from http://www.google.com/webfonts/specimen/Oswald*/
letter-spacing:.1em;
text-shadow: 0 -1px 0px rgba(0, 0, 0, 0.3); /*give the text a shadow - doesn't appear in Opera 12.02 or earlier*/
color: #fff;
/*use box-shadow to give the button some depth - see cssdemos.tupence.co.uk/box-shadow.htm#demo7 for more info on this technique*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
/*give the corners a small curve*/
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
}
/***SET THE BUTTON'S HOVER AND FOCUS STATES***/
input#bigbutton:hover, input#bigbutton:focus {
color:#dfe7ea;
/*reduce the size of the shadow to give a pushed effect*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
}


input#printButton1 {
width:100px;
background: #3e9cbf; /*the colour of the button*/
padding: 8px 14px 10px; /*apply some padding inside the button*/
border:1px solid #3e9cbf; /*required or the default border for the browser will appear*/
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
/*style the text*/
font-size:1.5em;
font-family:Oswald, sans-serif; /*Oswald is available from http://www.google.com/webfonts/specimen/Oswald*/
letter-spacing:.1em;
text-shadow: 0 -1px 0px rgba(0, 0, 0, 0.3); /*give the text a shadow - doesn't appear in Opera 12.02 or earlier*/
color: #fff;
/*use box-shadow to give the button some depth - see cssdemos.tupence.co.uk/box-shadow.htm#demo7 for more info on this technique*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
/*give the corners a small curve*/
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
}
/***SET THE BUTTON'S HOVER AND FOCUS STATES***/
input#printButton1:hover, input#printButton1:focus {
color:#dfe7ea;
/*reduce the size of the shadow to give a pushed effect*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
}
</style>
<style>
.container {
		width: 2%;
		margin: 0 auto;
		padding: 20px;
	}
* {
    font-size: 12px;
    font-family: 'Times New Roman';
	    margin: auto;

}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 100px;
    max-width: 100px;
}

td.quantity,
th.quantity {
    width: 60px;
	align:center
    max-width: 60px;
    word-break: break-all;
}

td.price,
th.price {
    width: 40px;
    max-width: 80px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 255px;
    max-width: 255px;
}

img {
    max-width: inherit;
    width: inherit;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}

</style>