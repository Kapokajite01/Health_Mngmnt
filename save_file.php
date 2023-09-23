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
$copec = $_POST['amazinaCOOPEC'];
echo $copec .'<br>' ;
$random =rand();	
echo $random.'<br>' ;
$tracknumber = $_POST['Noifishi'];
echo $tracknumber.'<br>' ;
$noifishi = $_POST['Noifishi'];
echo $noifishi.'<br>' ;
$amazina = $_POST['amazina'];
echo $amazina.'<br>';
$gender = $_POST['gender'];
echo $gender .'<br>';
$umwuga = $_POST['umwuga'];
echo $umwuga. '<br>';
$ise = $_POST['ise'];
echo $ise. '<br>';
$nyina = $_POST['nyina'];
echo $nyina. '<br>';
$province=$_POST['provinceName'];
echo $province. '<br>';
$district= $_POST['employerDistrictName'];
echo $district. '<br>';
$sector = $_POST['employerSectorName'];
echo $sector. '<br>';
$cell = $_POST['employerCellName'];
echo $cell. '<br>';
$village=$_POST['village'];
echo $village. '<br>';
$inzu = $_POST['niye'];
echo $inzu. '<br>';
$noindangamuntu = $_POST['noindangamuntu'];
echo $noindangamuntu. '<br>';
$notelephone= $_POST['notelephone'];
echo $notelephone. '<br>';
$kubaka = $_POST['kubaka'];
echo $kubaka. '<br>';
$abanaatunze = $_POST['abanaatunze'];
echo $abanaatunze. '<br>';
$abandiatunze = $_POST['abandiatunze'];
echo $abandiatunze. '<br>';
$loanamount = $_POST['loanamount'];
$loanamount = str_replace(',', '', $loanamount);
echo $loanamount. '<br>';
$loanamountcharacter = $_POST['loanamountcharacter'];
echo $loanamountcharacter. '<br>';
$ibyiciro =$_POST['ibyiciro'];
echo $ibyiciro. '<br>';
$igihecyokwishyura = $_POST['igihecyokwishyura'];
$impamvuinguzanyo= $_POST['impamvuinguzanyo'];
echo $impamvuinguzanyo. '<br>';
$noumunyamuryango = $_POST['Noumunyamuryango'];
echo $noumunyamuryango. '<br>';
$datekuvaumunya = $_POST['datekuvaumunya'];
echo $datekuvaumunya. '<br>';
$nokonti = $_POST['nokonti'];
echo $nokonti. '<br>';
$arikurikonti = $_POST['arikurikonti'];
echo $arikurikonti. '<br>';
$afatirwakurikonti = $_POST['afatirwakurikonti'];
echo $afatirwakurikonti. '<br>';
$igikoresho = $_POST['igikoresho'];
$ukokimeze = $_POST['ukokimeze'];
$agaciroigikoresho = $_POST['agaciroigikoresho'];
$ahobabrizwa = $_POST['ahobabrizwa'];
$nibikoresho = count($igikoresho);
$Amazinaref = $_POST['Amazinaref'];
$icyorefbakora = $_POST['icyorefbakora'];
$addressref = $_POST['addressref'];
$agaciroingwate = $_POST['agaciroingwate'];
$kontiref = $_POST['kontiref'];
$dateref = $_POST['dateref'];
$Noreff= COUNT($Amazinaref);
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
echo $file_name.'<br>';
			}
			

        }
	
    }
}
$score= "INSERT INTO score_table (score_id,track_number,score_duration,score_hostory,score_cust_duration,score_matirity,score_age,score_gender,score_stauts,score_activity) VALUES ('','$tracknumber','70','0','45','80','81','60','40','70')";
$conn->query($score);
$insertloandetails = "INSERT INTO loan_details(loan_id,loan_tracknumber,loan_account,loan_amount,loan_type,loan_incharge,loan_status,branch,time_application,loan_term_type,loan_term_number,loan_interest) 
VALUES('','$tracknumber','$nokonti ','$loanamount','$impamvuinguzanyo','','','$copec',Now(),' Ibyiciro $ibyiciro','Amezi $igihecyokwishyura','18%')";
$conn->query($insertloandetails);



$siblinglINSERT = "INSERT INTO siblings(sibling_id,loan_id,sibling_type,sibling_firtsname,sibling_lastname,sibling_idnumber,sibling_phone,sibling_adress) VALUES ('','$tracknumber','Father','$ise','$ise','','','')";
$conn->query($siblinglINSERT);

$siblinglINSERT1 = "INSERT INTO siblings(sibling_id,loan_id,sibling_type,sibling_firtsname,sibling_lastname,sibling_idnumber,sibling_phone,sibling_adress) VALUES ('','$tracknumber','Mother','$nyina','$nyina','','','')";
$conn->query($siblinglINSERT1);

$insertperoninfo = "INSERT INTO loan_personalinfo(personal_id,loan_id,first_name,last_name,id_number,telephone,date_of_birth,place_of_birth,gender,martial_satus,sibling_first_name,sibling_last_name,sibling_telephone,number_childreen,province,district,sector,cell,village) 
VALUES('','$tracknumber','$amazina','$amazina','$noindangamuntu','$notelephone','','','$gender','$kubaka','','','','$abanaatunze','$province','$district','$sector','$cell','$village')";
$conn->query($insertperoninfo);
$insertemployer = "INSERT INTO loan_applicant_employer(applicant_epmloyer_id,loan_id,applicant_employer_name,applicant_employer_Activity,applicant_position,applicant_employer_province,applicant_employer_district,applicant_employer_sector,applicant_employer_cell,applicant_employer_telephone,date_start_employment) 
VALUES('','$tracknumber','$umwuga','$umwuga','','','','','','','')";
$conn->query($insertemployer);
for($i =0;$i < $nibikoresho; $i++){
	$agaciroigikoresho[$i]= str_replace(',', '', $agaciroigikoresho[$i]);
	$insertincomes = "INSERT INTO coraterals(coraterals_id,loan_id,corateral_type,corateral_value,cor_address) 
VALUES('','$tracknumber','".addslashes($igikoresho[$i])."','".$agaciroigikoresho[$i]."','".$ahobabrizwa[$i]."')";
$conn->query($insertincomes);
}

for($j = 0; $j<$Noreff; $j++){
	$agaciroingwate[$j]= str_replace(',', '', $agaciroingwate[$j]);
$insertrefferences = "INSERT INTO applicanr_refference(reff_id,loan_id,reff_name1,reff_occupation,reff_address1,reff_corateral,ref_account,date_ref) 
VALUES('','$tracknumber','$Amazinaref[$j]','$icyorefbakora[$j]','$addressref[$j]','$agaciroingwate[$j]','$kontiref[$j]',Now())";
$conn->query($insertrefferences);
}

$conn->close();

echo "<script>alert('Application Saved Successfully')</script>";
					    echo "<script>window.location='commercial_loan_inbox';</script>";
		
?>
