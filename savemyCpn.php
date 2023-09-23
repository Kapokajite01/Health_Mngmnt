<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
   <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
document.getElementById('save').style.visibility="hidden";

window.print();
document.getElementById('save').style.visibility="visible";
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

<?php
error_reporting(0);

session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
	$postedesante = $_SESSION['sess_postdsante'];
	$userid = $_SESSION['sess_user_id'];

     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="CPN"){
      header('Location: logout');
	}
include_once('connect_db.php');

if (isset($_POST["bigbutton"])) {

    $_SESSION['ourdate'] = $_POST['thisdate'];
     $myndate = $_SESSION['ourdate'];
    $_SESSION['consultation']=$_POST["consultation"];
	$_SESSION['destination'] = $_POST['destination'];
	$_SESSION['pid']= $_POST["p_id"];	
	$pid = $_SESSION['pid'];
	$_SESSION['names']=$_POST['name'];
	$_SESSION['lastname']=$_POST['lname'];
    $_SESSION['num'] = $_POST["number"];
	$_SESSION['ins']=$_POST['insurance'];	
	$_SESSION['plaintes'] = addslashes($_POST['plaintes']);
	$_SESSION['etatgeneral'] =  addslashes($_POST['etatgeneral']);
	$_SESSION['antecedent'] =  addslashes($_POST['antecedent']);
	$_SESSION['examensphysique'] =  addslashes($_POST['examensphysique']);
	$_SESSION['conduiteatenir'] =  addslashes($_POST['conduiteatenir']);
	$_SESSION['definitf'] =  addslashes($_POST['definitf']);
	$_SESSION['diffenrenciel'] =  addslashes($_POST['diffenrenciel']);
$_SESSION['fichetrasnfert'] =$_POST['List1'];
$_SESSION['fichedeconsultation']=$_POST['List3'];
$_SESSION['nulltm']=$_POST['List4'];
$ins=$_SESSION['ins'];
$postedesante = $_SESSION['sess_postdsante'];

$consultation=$_SESSION['consultation'];

$_SESSION['amt'] = 400;




$transfert = $_SESSION['amt'] *$km;

if($ins=='MUTUELLE'){
$parc=0;
}if($ins=='RAMA/RSSB'){
$parc=0.85;	
}if($ins=='MMI'){

$parc=0.9;
	
}if($ins=='MEDIPLA'){

$parc=0.85;	

}if($ins=='RADIANT'){

$parc=0.85;	

}if($ins=='NO INSURANCE'){

$parc=1;
	
}
$insured=$ggrandtotal*$parc;
$copymt=$ggrandtotal*(1-$parc);

if($ins=='MUTUELLE'){
$copymt=200;
$insured=$ggrandtotal-200;	
}
$myndate= $_SESSION['ourdate'];
 $consultation=$_SESSION['consultation'];
	$pid=$_SESSION['pid'];
	$num=$_SESSION['num'];
	$ins=$_SESSION['ins'];
	$number= $_SESSION['$number'];
	$user=$_SESSION['sess_username'];
    //$checkamb = $_SESSION['checkamb'];
	$km = $_SESSION['km'];
	$amt = $_SESSION['amt'];
	$dt = $_SESSION["date"];
	$postedesante = $_SESSION['sess_postdsante'];
	$palintes = $_SESSION['plaintes'];
	$etatgeneral = $_SESSION['etatgeneral'];
	$antecedent = $_SESSION['antecedent'];
	$examenpysique = $_SESSION['examensphysique'];
	$conduiteatenir = $_SESSION['conduiteatenir'];
	$definiti = $_SESSION['definitf'];
	$diffenrenciel = $_SESSION['diffenrenciel'];
	$destination = $_SESSION['destination'];
	$fichetransfert = $_SESSION['fichetrasnfert'];
	$ficheconsult = $_SESSION['fichedeconsultation'];
	$nulltm = $_SESSION['nulltm'];
		$checkamb = $_POST['checkamb'];

	//Medicaments
	$tempmedicine  = ("select * from temp_medicament WHERE patient_id  = '$pid' and date='$myndate'");
$temmed = mysqli_query($conn, $tempmedicine);
if ($temmed->num_rows > 0) {
while ($rowmed = mysqli_fetch_assoc($temmed)) {
$medicments[]= $rowmed['medicament_descript'];	
$medicament_id[]= $rowmed['medicament_id'];	
$qtymedicamen[] = $rowmed['quantity'];	
$pricemecamen[] = $rowmed['price'];	
	$totalmedic = $rowmed['quantity']*$rowmed['price'];

}
$nmedicamnets = COUNT($medicments);
}
else{
$nmedicamnets=0;
}
//Conosmmables
$tempconsum = ("select * from temp_consommable WHERE patient_id  = '$pid' and date='$myndate'");
$temcons= mysqli_query($conn, $tempconsum);
if ($temcons->num_rows > 0) {
while ($rowcons= mysqli_fetch_assoc($temcons)) {
$consomables[] = $rowcons['cons_description'];	
$qtyconsmble[] = $rowcons['quantity'];	
$pricecosnmble[] = $rowcons['price'];
}
$ncosnombles = COUNT($consomables);
}
else{
$ncosnombles=0;
}
//Medical Acte

$tempactemed = ("select * from temp_actemed WHERE patient_id  = '$pid' and date='$myndate'");
$actcons= mysqli_query($conn, $tempactemed);
if ($actcons->num_rows > 0) {
while ($rowmact= mysqli_fetch_assoc($actcons)) {
$actemedic[] = $rowmact['acte_description'];	
$qtymedacte[] = $rowmact['quantity'];	
$pricemedacte[] = $rowmact['price'];	
	
}
$nactes = COUNT($actemedic);
}
else{
$nactes=0;
}
//Examens
$labo  = ("select * from consom_labs WHERE patient_id = '$pid' AND time_test  = '$myndate'");
$labores = mysqli_query($conn, $labo);
if ($labores->num_rows > 0) {
while ($rowlab = mysqli_fetch_assoc($labores)) {
 $tempExamens[]= $rowlab['examen'];
$tempQty[] = $rowlab['examen_qty'];	
$tempPrice[] = $rowlab['examen_price'];
$reuslts[] = $rowlab['results'];
$ExamesNo[] = $rowlab['examen_id'];
	
}
$nexamens = count($tempExamens);
}
else{
$nexamens=0;
}

// Hospitalization

$temphospt = ("select * from temp_hospitlzation WHERE patient_id  = '$pid' and date='$myndate'");
$temphosp= mysqli_query($conn, $temphospt);
if ($temphosp->num_rows > 0) {
while ($rowhospt= mysqli_fetch_assoc($temphosp)) {
$hosptlstion[] = $rowhospt['temphospdescr'];	
$qtyhosp[] = $rowhospt['quantity'];	
$pricehosp[] = $rowhospt['price'];	
	
}
$nhospt = COUNT($hosptlstion);

}
else{
$nhospt=0;
}

$mymaximum = MAX($nmedicamnets,$ncosnombles,$nactes,$nhospt,$nexamens);

	$fichetransfert = $_SESSION['fichetrasnfert'];
	$ficheconsult = $_SESSION['fichedeconsultation'];
	$nulltm = $_SESSION['nulltm'];
	
for($ih=0; $ih < $mymaximum; $ih++){
	
$insert = ("INSERT INTO consomation_consom (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,actemedicale,upacte,qtyacte,examenmedicale,upexamen,qtyexamen,results,exam_No,hospitalization,uphospitalizations,qtyhoapitalization,datecunsuption,user,postedesante)
      VALUES('$pid','$consultation','$medicments[$ih]', '$pricemecamen[$ih]','$qtymedicamen[$ih]','$consomables[$ih]','$pricecosnmble[$ih]','$qtyconsmble[$ih]','$actemedic[$ih]', '$pricemedacte[$ih]','$qtymedacte[$ih]','$tempExamens[$ih]','$tempPrice[$ih]','$tempQty[$ih]','$reuslts[$ih]','$ExamesNo[$ih]','$hosptlstion[$ih]','$pricehosp[$ih]','$qtyhosp[$ih]',Now(),'$userid','$postedesante')");
                        $resultsave= mysqli_query($conn, $insert);

}

	

if($diffenrenciel){
$INSERTdiferenc = ("INSERT INTO doctor_comments (comment_if,patient_id,type,comment,Doctor,comment_time)VALUES('','$pid','Diagnostic Diferenciel ','$diffenrenciel','$userid','$myndate')");
$insertDD = mysqli_query($conn, $INSERTdiferenc);
}	
if($checkamb =='ambChecked' ){
		$amblnce = 'Ambullance';
		$ambukm = $_POST['ambullance'];

if($ins=='MUTUELLE'){
$amtkm = 400;
}	
if($ins=='RAMA/RSSB'){

$amtkm  = 625;
}
if($ins=='MMI'){

$amtkm  = 575;
	
}if($ins=='MEDIPLA'){

$amtkm  = 575;

}if($ins=='RADIANT'){
$amtkm  = 575;

}if($ins=='NO INSURANCE'){

$amtkm  = 920;
	
}
$insertAmbul = ("INSERT INTO consomation_consom (id,consultatiobn,ambullance,upambullance,qtyambullance,datecunsuption,user,postedesante)
      VALUES('$pid','$consultation','$amblnce','$amtkm','$ambukm',Now(),'$userid','$postedesante')");
                        $resultsaveAmb= mysqli_query($conn, $insertAmbul);
	
	}
	else{
		$amblnce = '';
		$ambukm = 0;
		$amtkm = 0;		
	}	
	if($resultsave or $insertAmbul){
			$deletemedictemp = " DELETE from temp_medicament WHERE patient_id  = '$pid' and date='$myndate' ";	
	                        $resultdELETE= mysqli_query($conn, $deletemedictemp);
							
	$deletemeCONSOM = " DELETE from temp_consommable WHERE patient_id  = '$pid' and date='$myndate' ";	
	                        $resultCONSdELETE= mysqli_query($conn, $deletemeCONSOM);
	$deletemeAMEDIC = " DELETE from temp_actemed WHERE patient_id  = '$pid' and date='$myndate' ";	
	                        $resultCONSdELETE= mysqli_query($conn, $deletemeAMEDIC);
	$deletehOSPIT= " DELETE from temp_hospitlzation WHERE patient_id  = '$pid' and date='$myndate' ";	
	                        $resultCONSdELETE= mysqli_query($conn, $deletehOSPIT);	
							
	$UPDATEstatus= "UPDATE consultation SET status  = 'Completed' WHERE  	patient_id   ='$pid' and time_reception = '$myndate'"; 
		mysqli_query($conn,$UPDATEstatus);
if(($fichetransfert) OR ($ficheconsult)OR ($nulltm)){
		$otherinsert= ("INSERT INTO other_consumables(other_id,patient_id,fiche_transfert,photocopy,fiche_consultation,tmoderateur,date)VALUES('','$pid','$fichetransfert','','$ficheconsult','$nulltm',Now())");
	     $saveOTHERS= mysqli_query($conn, $otherinsert);
		}
		echo "<script>alert('Patient Saved and Sent to Cashier')</script>";
echo "<script>window.location='cprenatale';</script>";	
		
							
	}
	
	
	else if (!empty($consultation) OR ($consultation != '0')) {
	$consult = ("INSERT INTO consomation_consom (id,consultatiobn,datecunsuption,user,postedesante)VALUES('$pid','$consultation',Now(),'$userid','$postedesante')");
	                        $saveconsult= mysqli_query($conn, $consult);
    				$UPDATEstatus= "UPDATE consultation SET status  = 'Completed' WHERE  	patient_id   ='$pid' and time_reception = '$myndate'"; 
		mysqli_query($conn,$UPDATEstatus);
		if(($fichetransfert) OR ($ficheconsult)OR ($nulltm)){
		$otherinsert= ("INSERT INTO other_consumables(other_id,patient_id,fiche_transfert,photocopy,fiche_consultation,tmoderateur,date)VALUES('','$pid','$fichetransfert','','$ficheconsult','$nulltm',Now())");
	     $saveOTHERS= mysqli_query($conn, $otherinsert);
		}
									
echo "<script>alert('Patient Saved and Sent to Cashier')</script>";
echo "<script>window.location='cprenatale';</script>";
        } 
	

	else{
		echo "<h1><font color='red'>No Data Recorded Try Again</font></h1>";
		}
		
}

?> 



	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			

			
				<div class="content-module">				
					
					<div class="content-module-main cf">
		<div align="center">
		<form id="patient" name="patient" method="POST" action="" >
	<table id="example" class="altrowstable" style="display:none">
		<tr><td>    <strong>MINISTRY OF HEALTH</strong><br />
                  <strong>EASTEN PROVINCE</strong><br />
                  <strong>Kulu DISTRICT</strong><br/>
				  <strong>Kulu HEALTH CENTER</strong></td></tr>
		<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
		<tr><td><strong>Date</strong></td><td><?php echo $myndate;?></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
		<tr><td><strong>Names</strong></td><td><input type="text" name="names" size="30" value="<?php echo $_SESSION['names'].'&nbsp;&nbsp;'.$_SESSION['lastname'];?>" style="border: 0px" readonly required aria-required="true" aria-describedby="name-format"></td><td><strong>Number</strong></td><td><input type="text" name="insurancm" value="<?php echo  $_SESSION['num'];?>" style="border:0px" readonly required aria-required="true" aria-describedby="name-format">
		</td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="patient_id" value="<?php echo $pid;?>" style="display:none"></td><td></td><td></td><td></td>
		<tr></tr><tr></tr>
		</tr><tr><td><strong>Insurance</strong></td><td><input type="text" name="insurance" value="<?php echo $_SESSION['ins'];?>" style="border: 0px" readonly required aria-required="true" aria-describedby="name-format"></td><td><strong>Consultation</strong></td><td><?php echo $_SESSION['consultation'];?>
		</td><td></td><td></td><td></td><td></td><td></td><td><input type="text" name="patient_id" value="<?php echo $pid;?>" style="display:none"></td><td></td><td></td><td></td>
		</tr>
		</table>
		<table cellpadding="2" cellspacing="2" border="0" class="altrowstable" style="display:none">
		<tr><td><strong>Medicines</strong></td><td><strong>Qty</strong></td><td><strong>UP</strong></td><td><strong>Total</strong></td><td><strong>Consumables</strong></td><td><strong>Qty</strong></td><td><strong>Up</strong></td><td><strong>Tot</strong></td><td><strong>Medical Acts</strong></td><td><strong>Qty</strong></td><td><strong>Up</strong></td><td><strong>Total</strong></td><td><strong>Lab Tests</strong></td><td><strong>Qty</strong></td><td><strong>Up</strong></td><td><strong>Total</strong></td><td></td><td><strong>Hospitalization</strong></td><td><strong>Qty</strong></td><td><strong>Up</strong></td><td><strong>Total</strong></td></tr>
		<tr><td> <?php echo $_SESSION['med1'];?></td><td><?php echo $_SESSION['qt1'];?></td><td><?php echo $_SESSION['up1'];?></td><td><strong><?php if($totmedic1==0){echo'';} else{echo $totmedic1;}?></strong></td><td><?php echo $_SESSION['cons1']?></td><td><?php echo $_SESSION['qcons1'];?></td><td><?php echo $_SESSION['upcons1'];?></td><td><strong><?php if($totcons1==0){echo'';} else{echo$totcons1;}?></strong></td><td> <?php echo $_SESSION['acte1'];?></td><td><?php echo $_SESSION['qacte1'];?></td><td><?php echo $_SESSION['upacte1'];?></td><td><strong><?php if($totacte1==0){echo'';} else{echo $totacte1;}?></strong></td><td><?php echo $_SESSION['ex1'];?></td><td><?php echo $_SESSION['qex1'];?></td><td><?php echo $_SESSION['upex1'];?></td><td><strong><?php if($totexamen1==0){echo'';} else{echo$totexamen1;}?></strong></td><td></td><td><?php echo $_SESSION['hosp1'];?></td><td><?php echo $_SESSION['qhosp1'];?></td><td><?php echo $_SESSION['uphosp1'];?></td><td><strong><?php if($tothosp1==0){echo'';} else{echo$tothosp1;}?></strong></td></tr>
		<tr><td> <?php echo $_SESSION['med2']?></td><td><?php echo $_SESSION['qt2'];?></td><td><?php echo $_SESSION['up2'];?></td><td><strong><?php if($totmedic2==0){echo'';} else{echo $totmedic2;}?></strong></td><td><?php echo $_SESSION['cons2']?></td><td><?php echo $_SESSION['qcons2'];?></td><td><?php echo $_SESSION['upcons2'];?></td><td><strong><?php if($totcons2==0){echo'';} else{echo$totcons2;}?></strong></td><td> <?php echo $_SESSION['acte2'];?></td><td><?php echo $_SESSION['qacte2'];?></td><td><?php echo $_SESSION['upacte2'];?></td><td><strong><?php if($totacte2==0){echo'';} else{echo $totacte2;}?></strong></td><td><?php echo $_SESSION['ex2'];?></td><td><?php echo $_SESSION['qex2'];?></td><td><?php echo $_SESSION['upex2'];?></td><td><strong><?php if($totexamen2==0){echo'';} else{echo$totexamen2;}?></strong></td><td></td><td><?php echo $_SESSION['hosp2'];?></td><td><?php echo $_SESSION['qhosp2'];?></td><td><?php echo $_SESSION['uphosp2'];?></td><td><strong><?php if($tothosp2==0){echo'';} else{echo$tothosp2;}?></strong></td></tr>
		<tr><td> <?php echo $_SESSION['med3']?></td><td><?php echo $_SESSION['qt3'];?></td><td><?php echo $_SESSION['up3'];?></td><td><strong><?php if($totmedic3==0){echo'';} else{echo $totmedic3;}?></strong></td><td><?php echo $_SESSION['cons3']?></td><td><?php echo $_SESSION['qcons3'];?></td><td><?php echo $_SESSION['upcons3'];?></td><td><strong> <?php if($totcons3==0){echo'';} else{echo$totcons3;}?></strong></td><td> <?php echo $_SESSION['acte3'];?></td><td><?php echo $_SESSION['qacte3'];?></td><td><?php echo $_SESSION['upacte3'];?></td><td><strong><?php if($totacte3==0){echo'';} else{echo $totacte3;}?></strong></td><td><?php echo $_SESSION['ex3'];?></td><td><?php echo $_SESSION['qex3'];?></td><td><?php echo $_SESSION['upex3'];?></td><td><strong><?php if($totexamen3==0){echo'';} else{echo$totexamen3;}?></strong></td><td></td><td><?php echo $_SESSION['hosp3'];?></td><td><?php echo $_SESSION['qhosp3'];?></td><td><?php echo $_SESSION['uphosp3'];?></td><td><strong><?php if($tothosp3==0){echo'';} else{echo$tothosp3;}?></strong></td></tr>
		<tr><td> <?php echo $_SESSION['med4']?></td><td><?php echo $_SESSION['qt4'];?></td><td><?php echo $_SESSION['up4'];?></td><td><strong><?php if($totmedic4==0){echo'';} else{echo $totmedic4;}?></strong></td><td><?php echo $_SESSION['cons4']?></td><td><?php echo $_SESSION['qcons4'];?></td><td><?php echo $_SESSION['upcons4'];?></td><td><strong><?php if($totcons4==0){echo'';} else{echo$totcons4;}?></strong></td><td> <?php echo $_SESSION['acte4'];?></td><td><?php echo $_SESSION['qacte4'];?></td><td><?php echo $_SESSION['upacte4'];?></td><td><strong><?php if($totacte4==0){echo'';} else{echo $totacte4;}?></strong></td><td><?php echo $_SESSION['ex4'];?></td><td><?php echo $_SESSION['qex4'];?></td><td><?php echo $_SESSION['upex4'];?></td><td><strong><?php if($totexamen4==0){echo'';} else{echo$totexamen4;}?></strong></td><td></td><td><?php echo $_SESSION['hosp4'];?></td><td><?php echo $_SESSION['qhosp4'];?></td><td><?php echo $_SESSION['uphosp4'];?></td><td><strong><?php if($tothosp4==0){echo'';} else{echo$tothosp4;}?></strong></td></tr>
		<tr><td> <?php echo $_SESSION['med5']?></td><td><?php echo $_SESSION['qt5'];?></td><td><?php echo $_SESSION['up5'];?></td><td><strong><?php if($totmedic5==0){echo'';} else{echo $totmedic5;}?></strong></td><td><?php echo $_SESSION['cons5']?></td><td><?php echo $_SESSION['qcons5'];?></td><td><?php echo $_SESSION['upcons5'];?></td><td><strong><?php if($totcons5==0){echo'';} else{echo$totcons5;}?></strong></td><td><?php echo $_SESSION['acte5'];?></td><td><?php echo $_SESSION['qacte5'];?></td><td><?php echo $_SESSION['upacte5'];?></td><td><strong><?php if($totacte5==0){echo'';} else{echo $totacte5;}?></strong></td><td><?php echo $_SESSION['ex5'];?></td><td><?php echo $_SESSION['qex2'];?></td><td><?php echo $_SESSION['upex5'];?></td><td><strong><?php if($totexamen5==0){echo'';} else{echo$totexamen5;}?></strong></td><td></td><td><?php echo $_SESSION['hosp5'];?></td><td><?php echo $_SESSION['qhosp5'];?></td><td><?php echo $_SESSION['uphosp5'];?></td><td><strong><?php if($tothosp5==0){echo'';} else{echo$tothosp5;}?></strong></td></tr>
		<tr><td> <?php echo $_SESSION['med6']?></td><td><?php echo $_SESSION['qt6'];?></td><td><?php echo $_SESSION['up6'];?></td><td><strong><?php if($totmedic6==0){echo'';} else{echo $totmedic6;}?></strong></td><td><?php echo $_SESSION['cons6']?></td><td><?php echo $_SESSION['qcons6'];?></td><td><?php echo $_SESSION['upcons6'];?></td><td><strong><?php if($totcons6==0){echo'';} else{echo$totcons6;}?></strong></td><td><?php echo $_SESSION['acte6'];?></td><td><?php echo $_SESSION['qacte6'];?></td><td><?php echo $_SESSION['upacte6'];?></td><td><strong><?php if($totacte6==0){echo'';} else{echo $totacte6;}?></strong></td><td><?php echo $_SESSION['ex6'];?></td><td><?php echo $_SESSION['qex6'];?></td><td><?php echo $_SESSION['upex6'];?></td><td><strong><?php if($totexamen6==0){echo'';} else{echo$totexamen6;}?></strong></td><td></td><td><?php echo $_SESSION['hosp6'];?></td><td><?php echo $_SESSION['qhosp6'];?></td><td><?php echo $_SESSION['uphosp6'];?></td><td><strong><?php if($tothosp6==0){echo'';} else{echo$tothosp6;}?></strong></td></tr>
		<tr><td> <?php echo $_SESSION['med7']?></td><td><?php echo $_SESSION['qt7'];?></td><td><?php echo $_SESSION['up7'];?></td><td><strong><?php if($totmedic7==0){echo'';} else{echo $totmedic7;}?></strong></td><td><?php echo $_SESSION['cons7']?></td><td><?php echo $_SESSION['qcons7'];?></td><td><?php echo $_SESSION['upcons7'];?></td><td><strong><?php if($totcons7==0){echo'';} else{echo$totcons7;}?></strong></td><td><?php echo $_SESSION['acte7'];?></td><td><?php echo $_SESSION['qacte7'];?></td><td><?php echo $_SESSION['upacte7'];?></td><td><strong><?php if($totacte7==0){echo'';} else{echo $totacte7;}?></strong></td><td><?php echo $_SESSION['ex7'];?></td><td><?php echo $_SESSION['qex7'];?></td><td><?php echo $_SESSION['upex7'];?></td><td><strong><?php if($totexamen7==0){echo'';} else{echo$totexamen7;}?></strong></td><td></td><td><?php echo $_SESSION['hosp7'];?></td><td><?php echo $_SESSION['qhosp7'];?></td><td><?php echo $_SESSION['uphosp7'];?></td><td><strong><?php if($tothosp7==0){echo'';} else{echo$tothosp7;}?></strong></td></tr>
		<tr><td><strong>Total Medicines</strong></td><td></td><td><strong><?php echo number_format((float)$gtotmed,1);?></strong></td><td></td><td><strong>Total Consumable</strong></td><td></td><td><strong><?php echo number_format((float)$gtotcons,1);?></strong></td><td></td><td><strong>Total Medical Acts</strong></td><td></td><td><strong><?php echo number_format((float)$gtotacts,1);?></strong></td><td></td><td><strong>Total Lab Test</strong></td><td></td><td><strong><?php echo number_format((float)$gtotlab,1);?></strong></td><td></td><td></td><td><strong>Total Hospitalizations</strong></td><td></td><td><strong><?php echo number_format((float)$tothosps,1);?></strong></td></tr>
		<tr><td></td><td></td><td></td><td></td><td><strong>Ambullance</strong></td><td></td><td></td><td><strong><?php echo number_format((float)$transfert,1);?></strong></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td><strong>Copayment</strong></td><td></td><td></td><td><strong><?php echo number_format((float)$copymt,1);?></strong></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td><strong>Insured</strong></td><td></td><td></td><td><strong><?php echo number_format((float)$insured,1);?></strong></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td><strong>Grand Total</td><td></strong></td><td></td><td><strong><?php echo number_format((float)$ggrandtotal11,1);?></strong></td><td></td><td></td><td></td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td><td></td><td><strong>Cashier</strong></td><td>..................</td><td></td><td></td><td></td><td></td><td></td></tr>
		</table>
		<br><br>
		<div id="invoice-POS">
    
    <center id="top">

    </center><!--End InvoiceTop-->
    
    <div id="mid" align="center">
      <div class="info">
        <p> 
             <strong>MINISTRY OF HEALTH</strong><br />
                  <strong>DD PROVINCE</strong><br />
                  <strong>Kulu DISTRICT</strong><br/>
				  <strong>Kulu HEALTH CENTER</strong>
        </p><HR>
      </div>
    </div><!--End Invoice Mid-->
    
    <div id="bot"  align="center">
NAME: <STRONG><?php echo $_SESSION['names'].'&nbsp;&nbsp;'.$_SESSION['lastname'];?></STRONG></BR>
INSURANCE : <STRONG> <?php echo $_SESSION['ins'];?></STRONG></BR>
INSURANCE NUMBER: <STRONG><?php echo  $_SESSION['num'];?></STRONG></BR>
CONSULTATION: <STRONG><?php echo $_SESSION['consultation'];?></STRONG></BR>
DATE: <STRONG><?php echo $newDate = date("d/m/Y", strtotime($myndate));?></STRONG></BR>
<p>
					<div id="table">
	
					<table>
	<tr><td ><?php  $fichetrans=$_SESSION['fichetrasnfert'];
	                $ficheconsult = $_SESSION['fichedeconsultation'];
					$tmnull = $_SESSION['nulltm'];
	if($fichetrans ==100)
	{
		?>
	<input type="checkbox" name="List1" checked onclick="addUp1(100, 'List1')"><strong>Fiche de Transfert (100 Frw)</td></tr>	
		<?php
	}
	else{
		?>
		
			<input type="checkbox" name="List1" onclick="addUp(100, 'List1')"><strong>Fiche de Transfert (100 Frw)</td></tr>	

		
	<?php
	}
	
		if($ficheconsult == 20)
		{
	?>
	
	<tr><td><input type="checkbox" name="List3" checked onClick="addUp(20, 'List3')"><strong>Fiche de Consultation (20 Frw)</td></tr>
	<?php
	}
	else
	{
	?>
		<tr><td><input type="checkbox" name="List3"  onClick="addUp(20, 'List3')"><strong>Fiche de Consultation (20 Frw)</td></tr>
		<?php
	}

	 if ( $category!=1)
	{
		if($tmnull=='Ticketmod')
		{
			$tmnull = -200;
		?><tr><td><input type="checkbox" name="List4" checked onClick="addUp1(200, 'List4')"><strong><span style="text-decoration:line-through">Null Ticket Moderateur</span></td></tr>
		<?php
		}
		else
		{
			$tmnull = 0;
		?>	
		<tr><td><input type="checkbox" name="List4"  onClick="addUp(200, 'List4')"><strong><span style="text-decoration:line-through">Null Ticket Moderateur</span></td></tr>
       <?php		
		}
		}
		?>

		</table><br>
									</div><!--End Table-->
Medicaments : <?php echo $totalmedic;?></br>
Consommables : <?php echo $totalcons;?></br>
Actes : <?php echo $totalactesmed ;?></br>
Examens : <?php echo $totalexamen;?></br>
Hospitalisations : <?php echo $totalhosp;?></br>
Grand total: <input type="text" name="ttl" style="border: none;border-color: transparent;font-weight:bold;" readOnly value=<?php echo $ggrandtotal11+$fichetrans+$pcopy+$ficheconsult+$tmnull ; ?>></BR>
Assurance: <input type="text" name="ttl2" style="border: none;border-color: transparent;font-weight:bold;" readOnly value=<?php echo ($insured); ?>></BR>
Ticket moderateur :<input type="text" name="ttl1" style="border: none;border-color: transparent;font-weight:bold;" readOnly value=<?php echo $copymt+$fichetrans+$pcopy+$ficheconsult+$tmnull ; ?>></BR>
<STRONG>Cashier : .............................................................................</STRONG></BR>

				</div><!--End InvoiceBot-->
  </div>

<input type="submit" name="save" id="save" value="SAVE">

		</form>
		</div>
		</div>
		</div>
		</div>
</div>		
<script type="text/javascript">
total = 0;
List1 = 1;
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
			