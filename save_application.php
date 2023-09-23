<?php
error_reporting(0);
session_start();

$userid = $_SESSION['userid'];
$role = $_SESSION['role'];
if(!$userid){
	header('location:logout');
}

include ("lib/PHPMailerAutoload.php");
include('mydb_connection/my_connect_db.php');
include'mydb_connection/My_dbinsert.php';
include'mydb_connection/my_dbconnection.php';

$random =rand();	
$tracknumber = $_POST['tracknumber'];
$accountnumber = $_POST['accountnumber'];
$amount = $_POST['loanamount'];
$amount = str_replace(',', '', $amount);
$loantype = $_POST['loantype'];
$loan_term_type = $_POST['loantermtype'];
$loantermduration = $_POST['loantermduration'];
$loantermrate = $_POST['loantermrate'];
$branch = $_POST['branch'];
$firstname = $_POST['firstname'];
$lastname = $_POST["lastname"];
$telephone = $_POST['telephone'];
$idnumber = $_POST['idnumber'];
$DOBDay = $_POST['DOBDay'];
$DOBMonth = $_POST['DOBMonth'];
$DOBYear = $_POST['DOBYear'];
$dateofbirth = $DOBYear.'-'.$DOBMonth.'-'.$DOBDay;
$dateofbir= $DOBYear.'-'.$DOBMonth.'-'.$DOBDay;
$placeofbirth = $_POST['palcebirth'];
$gender = $_POST['gender'];
$status = $_POST['status'];
$spousefirstname = $_POST['spousename'];
$spouselastname = $_POST['spouselastname'];
$spousetelephone = $_POST['spousetelephone'];
$numberchildreen = $_POST['numberchildredd'];
$province = $_POST['provinceName'];
$district = $_POST['disrictName'];
$sector = $_POST['sectorName'];
$cell = $_POST['cellName'];
$village = $_POST['village'];
$mployername = $_POST['employernames'];
$employeractivity = $_POST['emplactivity'];
$position = $_POST['position'];
$employerprov = $_POST['employerProvinceName'];
$employerdistr = $_POST['employerDistrictName'];
$employsector = $_POST['employerSectorName'];
$employcell = $_POST['employerCellName'];
$emplteleph = $_POST['employtelephone'];
$datestart = $_POST['datestart'];
$undefined = $_POST['Undefined'];
$terminationdate = $_POST['terminationdate'];
$lastpayment = $_POST['lastpayment'];
$refference1 = $_POST['referencename1'];
$refferenceaddres1 = $_POST['refferenceaddres1'];
$refferencenumber1 = $_POST['refferencenumber1'];
$refference2 = $_POST['referencename2'];
$refferenceaddres2 = $_POST['refferenceaddres2'];
$refferencenumber2 = $_POST['refferencenumber2'];
$refference3 = $_POST['referencename3'];
$refferenceaddres3 = $_POST['refferenceaddres3'];
$refferencenumber3= $_POST['refferencenumber3'];
$commerciaoffcomment = addslashes($_POST['mytxtarea']);
$contractudration = $_POST['contractduration'];
$custduration = $_POST['duration'];
$sdate = $dateofbirth;
$other1 = $_POST['other1'];
$other2 = $_POST['other2'];
$other3 = $_POST['other3'];
$other4 = $_POST['other4'];
$other5 = $_POST['other3'];
 $types = $_POST['type'];
  $fnames = $_POST['fname'];
 $lnames = $_POST['lname'];
 $sblidnumber = $_POST['sblidnumber'];
 $siblingtelephone = $_POST['siblingtelephone'];
 $sibladdress =$_POST['address'];
 $contsibling = COUNT($types);
 for($i=0; $i<$contsibling; $i++){
	 if($types[0]=='Other')
	 {
		 $types[0] = $other1;
	 }
	 if($types[1]=='Other')
	 {
		 $types[1] = $other2;
	 }
	 if($types[2]=='Other')
	 {
		 $types[2] = $other3;
	 }
	 if($types[3]=='Other')
	 {
		 $types[3] = $other4;
	 }
	 if($types[4]=='Other')
	 {
		 $types[4] = $other5;
	 }
 }
 $contsibling =  count($types);
$amntcrehist = $_POST['amountcrhist'];
$typepymt = $_POST['typepymt'];
$counthist = count($amntcrehist);
$typeincome = $_POST['typeincome'];
$incomeamount = $_POST['incomeamount'];
$countincome = count($incomeamount);
$corateral = $_POST['corateral'];
$typecorateral = $_POST['typecorateral'];
$countcoraterals= count($typecorateral);
$countcoraterals1 = $countcoraterals+3;
if ($loan_term_type=='Week'){
$numdays = 	$loantermduration*7;
$lastpayment=Date('Y-m-d', strtotime("+$numdays days"));
$date1=$lastpayment;
$date2=$terminationdate;
	function dateDiff($date1, $date2) 
	{
	  $date1_ts = strtotime($date1);
	  $date2_ts = strtotime($date2);
	  $diff = $date2_ts - $date1_ts;
	  return round($diff / 86400);
	}
	$dateDiff= dateDiff($date1, $date2);
}
if ($loan_term_type=='Year'){
$numdays = 	$loantermduration*360;
$lastpayment=Date('Y-m-t', strtotime("+$numdays days"));
$date1=$lastpayment;
$date2=$terminationdate;
	function dateDiff($date1, $date2) 
	{
	  $date1_ts = strtotime($date1);
	  $date2_ts = strtotime($date2);
	  $diff = $date2_ts - $date1_ts;
	  return round($diff / 86400);
	}
	$dateDiff= dateDiff($date1, $date2);
}
if ($loan_term_type=='Month'){
$numdays = 	$loantermduration*30;
$lastpayment=Date('Y-m-t', strtotime("+$numdays days"));
$date1=$lastpayment;
$date2=$terminationdate;
	function dateDiff($date1, $date2) 
	{
	  $date1_ts = strtotime($date1);
	  $date2_ts = strtotime($date2);
	  $diff = $date2_ts - $date1_ts;
	  return round($diff / 86400);
	}
	$dateDiff= dateDiff($date1, $date2);
}
if($undefined){
$terminationdate = 'Undefinded';	
$dateDiff = 'Undefinded';	
}
if ($dateDiff==0){
	$dateDiff = $dateDiff + 1;
}
if($dateDiff < 0){
$limitation = "Over Contract Duration";	
$limitationinsert= " INSERT INTO limit_table (limit_id,track_number,limitation_type) VALUES ('','$tracknumber','$limitation')";
$conn->query($limitationinsert);
}
if($dateDiff =='Undefinded')
{
$ovecontractscore = 100;	
}
else{
$scoreselect = "SELECT score FROM over_contract WHERE 	minimum_value <= $dateDiff AND maximum_value > $dateDiff AND minimum_value !='Undefined' AND maximum_value !='Undefined'";
$resultscore = $conn_db->query($scoreselect);
if ($resultscore->num_rows > 0) {
while($rowscore = $resultscore->fetch_assoc()) {
$ovecontractscore = $rowscore['score'];
}
}
}
$scoregender = "SELECT gender_score from gender_customization where gender_name = '$gender'";
$resultgender = $conn_db->query($scoregender);
if ($resultgender->num_rows > 0) {
while($rowgender = $resultgender->fetch_assoc()) {
	$genderscore = $rowgender['gender_score'];
}
}

$scorestatus = "SELECT status_score from status_customization where status_name = '$status'";
$resultgstatus = $conn_db->query($scorestatus);
if ($resultgstatus->num_rows > 0) {
while($rowstatus = $resultgstatus->fetch_assoc()) {
	$statusscore = $rowstatus['status_score'];
}
}
$scoreactivity = "SELECT activity_score from activity_custom where activity_name= '$employeractivity'";
$resultativity = $conn_db->query($scoreactivity);
if ($resultativity->num_rows > 0) {
while($rowsactivity = $resultativity->fetch_assoc()) {
	$activityscore = $rowsactivity['activity_score'];
}
}


$date_1 = new DateTime($dateofbirth);
$date_2 = new DateTime( date( 'Y-m-d' ) );
$difference = $date_2->diff( $date_1 );
$yrs = $difference->y;
if($yrs < 18){
$limitation = "Under Age";	
$limitationinsertage= " INSERT INTO limit_table (limit_id,track_number,limitation_type) VALUES ('','$tracknumber','$limitation')";
$conn->query($limitationinsertage);

}
$scoreselectage = ("SELECT age_score FROM age_custom WHERE age_minimum <= $yrs AND age_maximum > $yrs ");
$resultselectage= $conn_db->query($scoreselectage);
if ($resultselectage->num_rows > 0) {
while($rowscoreage = $resultselectage->fetch_assoc()) {
	$agescore = $rowscoreage['age_score'];
}
}



$rowSQL =  ("SELECT MAX( file_level ) AS max FROM `myfiles`;");
$resultmax= $conn_db->query($rowSQL);
if ($resultmax->num_rows > 0) {
while($rowmax = $resultmax->fetch_assoc()) {
$largestlevel = $rowmax['max'];
$largestlevel = $largestlevel+1;
}
}

if (isset($_FILES) && (bool) $_FILES) {
    $files = array();
    $ext_error = "";
  // Define allowed extensions
	
    $allowedExtentsoins = ["pdf", "doc", "docx","zip"];
	$CT = COUNT($allowedExtentsoins);
    foreach ($_FILES as $name => $file) {
        if (!$file['name'] == "") {
			$i = $i +1;
            $file_name = $file['name'];
			$file_name = $random.'_'.$file_name;
			$file_name = preg_replace('/\s+/', '_', $file_name);
			$file_name = str_replace('+','_', $file_name);
            $temp_name = $file['tmp_name'];
            $path_part = pathinfo($file_name);
            $ext = $path_part['extension'];
            $server_file = dirname(__FILE__) . "/files/sdjklnkjbnkbsfs/" . $path_part['basename'];

            // Checking for extension of attached files
           if (in_array($ext, $allowedExtentsoins)) {
            move_uploaded_file($temp_name, $server_file);
            $uploaded = array_push($files, $server_file);
$insertcomment = "INSERT INTO myfiles(att_id,loan_id,file_name,file_level) VALUES ('','$tracknumber','$file_name','$largestlevel')";
$conn->query($insertcomment);

			}
			

        }
	
    }
}

$score= "INSERT INTO score_table (score_id,track_number,score_duration,score_hostory,score_cust_duration,score_matirity,score_age,score_gender,score_stauts,score_activity) VALUES ('','$tracknumber','$ovecontractscore','$scorehist','$scorecustduration','$maturuty','$agescore','$genderscore','$statusscore','$activityscore')";
$conn->query($score);

$insertloandetails = "INSERT INTO loan_details(loan_id,loan_tracknumber,loan_account,loan_amount,loan_type,loan_incharge,loan_status,branch,time_application,loan_term_type,loan_term_number,loan_interest) 
VALUES('','$tracknumber','$accountnumber','$amount','$loantype','','','$branch',Now(),'$loan_term_type','$loantermduration','$loantermrate')";
$conn->query($insertloandetails);

//insert into sibblings

for($i=0; $i<$contsibling; $i++){
$siblinglINSERT = "INSERT INTO siblings(sibling_id,loan_id,sibling_type,sibling_firtsname,sibling_lastname,sibling_idnumber,sibling_phone,sibling_adress) VALUES ('','$tracknumber','".addslashes($types[$i])."','".addslashes($fnames[$i])."','".addslashes($lnames[$i])."','".addslashes($sblidnumber[$i])."','".addslashes($siblingtelephone[$i])."','".addslashes($sibladdress[$i])."')";
$conn->query($siblinglINSERT);

}
$insertperoninfo = "INSERT INTO loan_personalinfo(personal_id,loan_id,first_name,last_name,id_number,telephone,date_of_birth,place_of_birth,gender,martial_satus,sibling_first_name,sibling_last_name,sibling_telephone,number_childreen,province,district,sector,cell,village) 
VALUES('','$tracknumber','$firstname','$lastname','$idnumber','$telephone','$dateofbirth','$placeofbirth','$gender','$status','$spousefirstname','$spouselastname','$spousetelephone','$numberchildreen','$province','$district','$sector','$cell','$village')";
$conn->query($insertperoninfo);

$insertemployer = "INSERT INTO loan_applicant_employer(applicant_epmloyer_id,loan_id,applicant_employer_name,applicant_employer_Activity,applicant_position,applicant_employer_province,applicant_employer_district,applicant_employer_sector,applicant_employer_cell,applicant_employer_telephone,date_start_employment) 
VALUES('','$tracknumber','$mployername','$employeractivity','$position','$employerprov','$employerdistr','$employsector','$employcell','$emplteleph','$datestart ')";
$conn->query($insertemployer);
// insert into credit history
for($J=0; $J<$counthist; $J++){
	$amntcrehist[$J] = str_replace(",", "", $amntcrehist[$J]);
$inserthistory = "INSERT INTO credit_history(cred_history_id,Amount,type_pymt,loan_id) 
VALUES('','".addslashes($amntcrehist[$J])."','".addslashes($typepymt[$J])."','$tracknumber')";
$conn->query($inserthistory);
}
//Insert into incomes
for($s=0; $s<$countincome; $s++){
$incomeamount[$s]=str_replace(",", "", $incomeamount[$s]);
$insertincomes = "INSERT INTO incomes(income_id,loan_id,income_type,income_amount) 
VALUES('','$tracknumber','".addslashes($typeincome[$s])."','".addslashes($incomeamount[$s])."')";
$conn->query($insertincomes);
}
//Insert Coraterals
$randomcor =rand();	
for($n=0; $n<$countcoraterals1; $n++){
	$corateral[$n]=str_replace(",", "", $corateral[$n]);

	$temp = $_FILES["files"]["tmp_name"][$n];
	$name = $_FILES["files"]["name"][$n];
			$corfile_name = $randomcor.'_'.$name;
			$corfile_name = preg_replace('/\s+/', '_', $corfile_name);
			$corfile_name = str_replace('+','_', $corfile_name);
			move_uploaded_file($temp,"files/sdjklnkjbnkbsfs/".$corfile_name);
			if($n<$countcoraterals){
$insertincomes = "INSERT INTO coraterals(coraterals_id,loan_id,corateral_type,corateral_value,attacment) 
VALUES('','$tracknumber','".addslashes($typecorateral[$n])."','".addslashes($corateral[$n])."','".$corfile_name."')";
$conn->query($insertincomes);
			}
			else{
			$reffile_name[] = 	$corfile_name;
			}
}
 
	 $insertrefferences = "INSERT INTO applicanr_refference(reff_id,loan_id,reff_name1,reff_address1,reff_telephone1,reff_name2,reff_address2,reff_telephone2,reff_name3,reff_address3,reff_telephone3,attacment1,attachment2,attachment3) 
VALUES('','$tracknumber','$refference1','$refferenceaddres1','$refferencenumber1','$refference2','$refferenceaddres2','$refferencenumber2','$refference3','$refferenceaddres3','$refferencenumber3','$reffile_name[0]','$reffile_name[1]','$reffile_name[2]')";
$conn->query($insertrefferences);

$insertcomment = "INSERT INTO loan_comments(comment_id,loan_id,comment,commentetor,time_comment) 
VALUES('','$tracknumber','$commerciaoffcomment','$userid',Now())";
$conn->query($insertcomment);

$conn->close();
echo "<script>alert('Application Saved Successfully')</script>";
					    echo "<script>window.location='account_check';</script>";
						
				
?>
