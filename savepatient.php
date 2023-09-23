<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
document.getElementById('save').style.visibility="hidden";

window.print();
document.getElementById('save').style.visibility="visible";
document.getElementById('save').disabled=false; 

}
</script>
<?php
error_reporting(0);
session_start();
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
    $role = $_SESSION['sess_userrole'];
	$userid = $_SESSION['sess_user_id'];

    if(!isset($_SESSION['sess_username'])  or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')){
		if(($role!="Receptionist") or ($role!="Mutuelle"))
		{
      header('Location: logout');
		}
	}
$myusername=$_SESSION['sess_username'];
$postedesante = $_SESSION['sess_postdsante'];

$postedesante = $_SESSION['sess_postdsante'];
if (isset($_POST['bigbutton'])) {
    include('connesave.php');
	include_once('connect_db.php');


    $_SESSION["date"] =$_POST["mydate"];
	$date = $_SESSION["date"];
	IF(empty($date)){
		?>
	<script>

alert('Complete The Date Of Consumption'); window.location='reception';

// Closes the new window
</script>  
<?php	
	}
	else{
	$_SESSION['destination'] = $_POST['destination'];
	$_SESSION['patid']= $_POST['patid'];
	$_SESSION["fname"]=addslashes($_POST["names"]);
	$fname = $_SESSION["fname"];
	$_SESSION["lname"]=addslashes($_POST["lnames"]);
	$lname = $_SESSION["lname"];
	$_SESSION["gender"]=$_POST["gender"];
	$gender=$_SESSION['gender'];
	$_SESSION['dob']=$_POST['dob'];
	$dob=$_SESSION['dob'];
	$_SESSION["province"]=$_POST['province'];
	$province = $_SESSION["province"];
	$_SESSION["district"]=$_POST['district'];
	$district=$_SESSION['district'];
	$_SESSION['sector']=$_POST['sector'];
	$sector=$_SESSION['sector'];
	$_SESSION["cell"]=$_POST['cellName'];
	$cell=$_SESSION["cell"];
	$_SESSION["numberform"]=$_POST['numberform'];
	$numberform=$_SESSION["numberform"];
	$_SESSION["affname"]=addslashes($_POST['afname']);
	$afname=$_SESSION["affname"];
	$_SESSION["aflname"]=addslashes($_POST['aflname']);
    $aflname=$_SESSION["aflname"];
	$_SESSION['affectation']=$_POST['affectation'];
	$affectation=$_SESSION['affectation'];
	$_SESSION["insnumber"]=$_POST["insnumber"];
	$number = $_SESSION["insnumber"];
	$_SESSION["insurance"]=$_POST["insurance"];
	$insurance = $_SESSION["insurance"];
    $_SESSION["pagenum"] = $_POST["pagecode"];
	$pagenum=$_SESSION["pagenum"];
	$_SESSION["membercat"]= $_POST["catmember"];
	$membercat= $_SESSION["membercat"];
	$_SESSION["famcode"] =$_POST["famcode"];
	$famcode= $_SESSION["famcode"];
	$wdays=$_POST['workingday'];
	$nultm = $_POST['nulltm'];
	$carnet=$_POST['carnet'];
	$consultation= $_POST['fiche'];
	$transfert=$_POST['transfert'];
	$copy=$_POST['copy'];
	$numcopy=$_POST['numcopy'];
	$_SESSION["copynumber"]=$_POST['numcopy'];
	$numtransfert=$_POST['numtransf'];
	$_SESSION["ntransfert"]=$_POST['numtransf'];
	$_SESSION['checkamb'] = $_POST['checkamb'];
	$checkamb = $_SESSION['checkamb'];
	$_SESSION['km'] = $_POST['ambullance'];
	 $km = $_SESSION['km'];
	 $_SESSION['hospital'] = $_POST['hosp'];
	 $hospital = $_SESSION['hospital'];
	 $_SESSION['cas'] = $_POST['cas'];
	 $cas = $_SESSION['cas'];
	 $_SESSION['destination'] = $_POST['destination'];
	 $destination = $_SESSION['destination'];

	$consultatio1=0;
	$qtransf=0;
	$qcarnet=0;
	$tm=0;
	if($copy=='yes'){
    $_SESSION["copy"]=50;		
	$amountcopy=50;

	}
	else{
	$_SESSION["copy"]=0;
	$amountcopy=0;
	}
	if($transfert=='yes'){
	$_SESSION["transfert"]=100;
	$transfertamount=100;
	$qtransf=1;
	}
	else{
	$transfertamount=0;
	$_SESSION["transfert"]=0;
	}
	if($carnet=='yes'){
	$_SESSION["crnet"]=50;
	$carnetamount=50;
	$qcarnet=1;
	}
	else{
	$_SESSION["crnet"]=0;
	$carnetamount=0;
	}
	if($wdays == "all_null"){
	$_SESSION["consultations1"]=0;
	$_SESSION['alnull'] = 'Yes';
	}
	else{
		$_SESSION['alnull'] = 'No';
	
	}
	
	
	
if($nultm == "nulltm"){
	$_SESSION['nulltm'] = 'Yes';
	}
	else{
		$_SESSION['nulltm'] = 'No';
	
	}
	
	if(($insurance == "MUTUELLE") AND($wdays == "regular")){
	$_SESSION["consultations"]=200;
	$_SESSION["consultations1"]=300;

	}
  if(($insurance == "MUTUELLE") AND($wdays == "others")){
	$_SESSION["consultations"]=200;	
	$_SESSION["consultations1"]=360;

   
	}	
	if(($insurance == "RAMA/RSSB") AND($wdays == "regular")){
	$_SESSION["consultations1"]=750;	
	}
  if(($insurance == "RAMA/RSSB") AND($wdays == "others")){
	$_SESSION["consultations1"]=900;	
	$consultatio=900;
	}
	if(($insurance == "TRANSIT") AND($wdays == "regular")){
	$_SESSION["consultations1"]=750;	
	}
  if(($insurance == "TRANSIT") AND($wdays == "others")){
	$_SESSION["consultations1"]=900;	
	$consultatio=900;
	}
	if(($insurance == "MMI") AND($wdays == "regular")){
	$_SESSION["consultations1"]=690;	
	}
  if(($insurance == "MMI") AND($wdays == "others")){
	$_SESSION["consultations1"]=828;	
	}
	if(($insurance == "MEDIPLA") AND($wdays == "regular")){
	$_SESSION["consultations1"]=863;	
	}
  if(($insurance == "MEDIPLA") AND($wdays == "others")){
	$_SESSION["consultations1"]=1035;	
	}
	if(($insurance == "RADIANT") AND($wdays == "regular")){
	$_SESSION["consultations1"]=863;	
	}
  if(($insurance == "RADIANT") AND($wdays == "others")){
	$_SESSION["consultations1"]=1035;
	}
	if(($insurance == "NO INSURANCE") AND($wdays == "regular")){
	$_SESSION["consultations1"]=1035;	
	}
  if(($insurance == "NO INSURANCE") AND($wdays == "others")){
	$_SESSION["consultations1"]=1242;
	}
if(($insurance == "NO INSURANCE") AND ($carnet=='yes')){
	$carnetamount=100;	
	}
	if($wdays == "DoctorConsultation"){
		
	$_SESSION["consultations1"]=3000;	
	}
	if($wdays == "Doctormutuelle"){
		
	$_SESSION["consultations1"]=1350;	
	}
	if($wdays == "Doctormutuelweekend"){
		
	$_SESSION["consultations1"]=1500;	
	}

	if($wdays == "DoctorMMI"){
		
	$_SESSION["consultations1"]=3105;	
	}
	if($wdays == "DoctorMMIweekend"){
		
	$_SESSION["consultations1"]=3450;	
	}
	$consultatio1=$_SESSION["consultations1"];
	$totaoumntphotoc=$numcopy*$amountcopy;
	$totamounttransfer=$transfertamount*$qtransf;
	$totcarnetamount=$carnetamount*$qcarnet;
	$grandtotal=$consultatio1+$totaoumntphotoc+$totamounttransfer+$totcarnetamount;
}
 $tm_null = $_SESSION['nulltm'];
$sql = "INSERT INTO patient " . "(id,names,lname,carnet,phtocopy,transfert,category,affiliate_number,gender,dob,province,district,sector,cell,affiliate_names,afilliate_lastname,affectation,insurance,familycode,consultatiom,pagenumber,date,null_copy,null_tm,policeno,cas,receptionist) " . "VALUES ('','$fname','$lname','$carnet','$cop','$transfert','$membercat','$number','$gender','$dob','$province','$district','$sector','$cell','$afname','$aflname','$affectation','$insurance','$famcode','$consultatio1','$pagenum','$date','$all_null','$tm_null','$numberform','$cas','$userid')";
$resultsave = mysqli_query($conn, $sql);
	if($resultsave){
	$selectbig=mysqli_query($conn,"SELECT MAX(id)AS bigid,affiliate_number  from patient");
	$rowbig = mysqli_fetch_array($selectbig);
	$curbigid = $rowbig['bigid'];
	$insconsult =  mysqli_query($conn,"INSERT INTO consultation(consultation_id,patient_id ,status,origine,time_reception ) VALUES('','$curbigid','$destination','Reception',Now())");
		
		$savelog=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Saved New Patient',now())");	
$logsaved = mysqli_query($conn, $savelog);
if($destination=='Consultation'){
	echo "<script>alert('Patient Saved and Sent to Consultation')</script>";
echo "<script>window.location='m_reception';</script>";
}
if($destination=='Maternite'){
	echo "<script>alert('Patient Saved and Sent to Maternité')</script>";
echo "<script>window.location='m_reception';</script>";
}
if($destination=='Planning'){
	echo "<script>alert('Patient Saved and Sent to Planning Familial')</script>";
echo "<script>window.location='m_reception';</script>";
}
if($destination=='CPN'){
	echo "<script>alert('Patient Saved and Sent to Consultation Prenatale')</script>";
echo "<script>window.location='m_reception';</script>";
}
	}
	else{
		echo "<href = 'm_reception'>Data Not Saved Try Again</a>";
	}
}
?>

<style>
.button {
    background-color: #DCDCDC;
    border: none;
    color: black;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
