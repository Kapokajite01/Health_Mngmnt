<?php
error_reporting(0);
session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
	$postedesante = $_SESSION['sess_postdsante'];
	$user=$_SESSION['sess_username'];

     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Family_planning"){
      header('Location: logout');
	}
	
include_once('connect_db.php');

$_SESSION['consultation']=$_POST["consultation"];
	$_SESSION['pid']= $_POST["p_id"];
$pid=$_SESSION['pid'];
	$num=$_SESSION['num'];
	$ins=$_SESSION['ins'];
    $myndate = $_POST['thisdate'];

	$patient = $_POST["p_id"];	
	$destination = $_POST['destination'];
	$examendifferent =  addslashes($_POST['diffenrenciel']);
	$_SESSION['fichetrasnfert'] =$_POST['List1'];
$_SESSION['fichedeconsultation']=$_POST['List3'];
$_SESSION['nulltm']=$_POST['List4'];
$ins=$_SESSION['ins'];

	$consultation = $_SESSION['consultation'];
	//Medicaments
	$tempmedicine  = ("select * from temp_medicament WHERE patient_id  = '$pid' and date='$myndate'");
$temmed = mysqli_query($conn, $tempmedicine);
if ($temmed->num_rows > 0) {

while ($rowmed = mysqli_fetch_assoc($temmed)) {
$medicments[]= $rowmed['medicament_descript'];	
$qtymedicamen[] = $rowmed['quantity'];	
$pricemecamen[] = $rowmed['price'];	
}
$nmedicamnets = COUNT($medicments);
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
// Hospitalization

$temphospt = ("select * from temp_hospitlzation WHERE patient_id  = '$pid' and date='$myndate'");
$temphosp= mysqli_query($conn, $temphospt);
if ($temphosp->num_rows > 0) {
while ($rowhospt= mysqli_fetch_assoc($temphosp)) {
$hosptlstion[] = $rowhospt['temphospdescr'];	
$qtyhosp[] = $rowhospt['quantity'];	
$firstDate[] = $rowhospt['firstHosp'];	
$lastDate[] = $rowhospt['lastHost'];	
$pricehosp[] = $rowhospt['price'];	
	
}
$nhospt = COUNT($hosptlstion);
}
$mymaximum = MAX($nmedicamnets,$ncosnombles,$nactes,$nhospt);

	
	$fichetransfert = $_SESSION['fichetrasnfert'];
	$ficheconsult = $_SESSION['fichedeconsultation'];
	$nulltm = $_SESSION['nulltm'];
	
for($ih=0; $ih < $mymaximum; $ih++){
$insert = ("INSERT INTO consomation_consom (id,consultatiobn,medicament,upmedicamnet,qtymedicamnet,consommable,UPcons,Qcons,actemedicale,upacte,qtyacte,examenmedicale,upexamen,qtyexamen,hospitalization,uphospitalizations,qtyhoapitalization,FdtHospitalisation,LdtHospitalisation,datecunsuption,user,postedesante)
      VALUES('$pid','$consultation','$medicments[$ih]', '$pricemecamen[$ih]','$qtymedicamen[$ih]','$consomables[$ih]','$pricecosnmble[$ih]','$qtyconsmble[$ih]','$actemedic[$ih]', '$pricemedacte[$ih]','$qtymedacte[$ih]','$ex7','$upex7','$qex7','$hosptlstion[$ih]','$pricehosp[$ih]','$qtyhosp[$ih]','$firstDate[$ih]','$lastDate[$ih]','$myndate','$user','$postedesante')");
                        $resultsave= mysqli_query($conn, $insert);

}
	if($resultsave){
			$deletemedictemp = " DELETE from temp_medicament WHERE patient_id  = '$pid' and date='$myndate' ";	
	                        $resultdELETE= mysqli_query($conn, $deletemedictemp);
							
	$deletemeCONSOM = " DELETE from temp_consommable WHERE patient_id  = '$pid' and date='$myndate' ";	
	                        $resultCONSdELETE= mysqli_query($conn, $deletemeCONSOM);
	$deletemeAMEDIC = " DELETE from temp_actemed WHERE patient_id  = '$pid' and date='$myndate' ";	
	                        $resultCONSdELETE= mysqli_query($conn, $deletemeAMEDIC);
	$deletehOSPIT= " DELETE from temp_hospitlzation WHERE patient_id  = '$pid' and date='$myndate' ";	
	                        $resultCONSdELETE= mysqli_query($conn, $deletehOSPIT);	
$UPDATEstatus= "UPDATE consultation SET status  = 'Completed' WHERE  	patient_id   ='$patient' and time_reception = '$myndate'"; 
mysqli_query($conn,$UPDATEstatus);
				if(($fichetransfert) OR ($ficheconsult)OR ($nulltm)){
 		$otherinsert= ("INSERT INTO other_consumables(other_id,patient_id,fiche_transfert,photocopy,fiche_consultation,tmoderateur,date)VALUES('','$pid','$fichetransfert','','$ficheconsult','$nulltm',Now())");
	     $saveOTHERS= mysqli_query($conn, $otherinsert);
		}
	echo "<script>alert('Patient Saved and Sent to Cashier')</script>";
echo "<script>window.location='family_palnning';</script>";
	}

	ELSE{
		if (!empty($consultation) OR ($consultation != '0')) {
	$consult = ("INSERT INTO consomation_consom (id,consultatiobn,datecunsuption,user,postedesante)VALUES('$pid','$consultation','$myndate','$user','$postedesante')");
	                        $saveconsult= mysqli_query($conn, $consult);
    				$UPDATEstatus= "UPDATE consultation SET status  = 'Completed' WHERE  	patient_id   ='$pid' and time_reception = '$myndate'"; 
		mysqli_query($conn,$UPDATEstatus);
				$otherinsert= ("INSERT INTO other_consumables(other_id,patient_id,fiche_transfert,photocopy,fiche_consultation,tmoderateur,date)VALUES('','$pid','$fichetransfert','','$ficheconsult','$nulltm',Now())");
	     $saveOTHERS= mysqli_query($conn, $otherinsert);
$otherinsert= ("INSERT INTO other_consumables(other_id,patient_id,fiche_transfert,photocopy,fiche_consultation,tmoderateur,date)VALUES('','$pid','$fichetransfert','','$ficheconsult','$nulltm',Now())");
	     $saveOTHERS= mysqli_query($conn, $otherinsert);
if($examendifferent){
$INSERTdiferenc = ("INSERT INTO doctor_comments (comment_if,patient_id,type,comment,Doctor,comment_time)VALUES('','$patient','Diagnostic Diferenciel ','$examendifferent','$user','$myndate')");
$insertDD = mysqli_query($conn, $INSERTdiferenc);
}	
$UPDATEstatus= "UPDATE consultation SET status  = 'Completed' WHERE  	patient_id   ='$patient' and time_reception = '$myndate'"; 
mysqli_query($conn,$UPDATEstatus);
		$UPDATEcas= "UPDATE patient SET cas  = '$cas' WHERE  	id   ='$patient'"; 
		mysqli_query($conn,$UPDATEcas);
		if(($fichetransfert) OR ($ficheconsult)OR ($nulltm)){
 		$otherinsert= ("INSERT INTO other_consumables(other_id,patient_id,fiche_transfert,photocopy,fiche_consultation,tmoderateur,date)VALUES('','$pid','$fichetransfert','','$ficheconsult','$nulltm',Now())");
	     $saveOTHERS= mysqli_query($conn, $otherinsert);
		}		 
echo "<script>alert('Patient Saved and Sent to Cashier')</script>";
echo "<script>window.location='family_palnning';</script>";
        }
	}		
		

	
	
		
		?>