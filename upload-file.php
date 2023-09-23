<?php
error_reporting(0);
if (isset($_POST["submit"])) {
/*$event= $_POST['test'];
	$lastupload = ("select upload from old_vetting order by upload DESC LIMIT 1")or die (mysql_error());
	while($row=mysqli_fetch_assoc($lastupload)){
	$upl=$row['upload'];
	 $upl = $upl + 1;
	}*/
/****** Include the EXCEL Reader Factory ***********/
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';  



//print_r($_FILES['excelupload']);
$namearr = explode(".",$_FILES['excelupload']['name']);
if(end($namearr) != 'xls' && end($namearr) != 'xlsx')
	{
	$event = '';	
		?>
    <script>

alert('Invalid File Type'); window.location='vetting_file.php';

// Closes the new window
</script> 
<?php
	}
	else{

if($invalid != 1)
	{
$response = move_uploaded_file($_FILES['excelupload']['tmp_name'],$_FILES['excelupload']['name']); // Upload the file to the current folder
if($response)
	{

	try {
		$objPHPExcel = PHPExcel_IOFactory::load($_FILES['excelupload']['name']);
	} catch(Exception $e) {
		die('Error : Unable to load the file : "'.pathinfo($_FILES['excelupload']['name'],PATHINFO_BASENAME).'": '.$e->getMessage());
	}

$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Total Number of rows in the uploaded EXCEL file

$string = "INSERT INTO ".TABLENAME." (up_pid,up_pname,up_plname,up_pdob,up_pgender,up_afnumber,up_pcateg,affectation,up_afnme,up_aflname,up_insurance,up_famcode,up_pagenumber,up_consom_sonsultation,
			                        up_cons_medicaments,up_cons_upmedic,up_cons_qytmedic,up_consomable,up_upcons,up_qtycons,up_acte,up_upacte,up_qtyacte,up_exame,up_upexame,up_qtyexame,up_hospita,
									up_uphospita,up_qtyhosp,up_ambul,up_upambul,up_qtyambul,datecunsuption,null_tm,postedesante) VALUES ";
/*


*/
for($i=1;$i<=$arrayCount;$i++){

mysql_real_escape_string($string);

$pid = mysql_real_escape_string($allDataInSheet[$i]["A"]);
$First_Name = mysql_real_escape_string($allDataInSheet[$i]["B"]);
$Last_Name = mysql_real_escape_string($allDataInSheet[$i]["C"]);
$dob = mysql_real_escape_string($allDataInSheet[$i]["D"]);
$gender = mysql_real_escape_string($allDataInSheet[$i]["E"]);
$afnumber = mysql_real_escape_string($allDataInSheet[$i]["F"]);
$category = mysql_real_escape_string($allDataInSheet[$i]["G"]);
$affectation = mysql_real_escape_string($allDataInSheet[$i]["H"]);
$afname = mysql_real_escape_string($allDataInSheet[$i]["I"]);
$aflastname = mysql_real_escape_string($allDataInSheet[$i]["J"]);
$insurance = mysql_real_escape_string($allDataInSheet[$i]["K"]);
$famcode = mysql_real_escape_string($allDataInSheet[$i]["L"]);
$pagenumber = mysql_real_escape_string($allDataInSheet[$i]["M"]);
$consultation = mysql_real_escape_string($allDataInSheet[$i]["N"]);
$medicament = mysql_real_escape_string($allDataInSheet[$i]["O"]);
$upmendicament = mysql_real_escape_string($allDataInSheet[$i]["P"]);
$qtymendicament = mysql_real_escape_string($allDataInSheet[$i]["Q"]);
$consommable = mysql_real_escape_string($allDataInSheet[$i]["R"]);
$upconsommable = mysql_real_escape_string($allDataInSheet[$i]["S"]);
$qtyconomsmable = mysql_real_escape_string($allDataInSheet[$i]["T"]);
$acte = mysql_real_escape_string($allDataInSheet[$i]["U"]);
$upacte = mysql_real_escape_string($allDataInSheet[$i]["V"]);
$qtyacte = mysql_real_escape_string($allDataInSheet[$i]["W"]);
$examen = mysql_real_escape_string($allDataInSheet[$i]["X"]);
$upexamen = mysql_real_escape_string($allDataInSheet[$i]["Y"]);
$qtyexamen = mysql_real_escape_string($allDataInSheet[$i]["Z"]);
$hospital = mysql_real_escape_string($allDataInSheet[$i]["AA"]);
$uphospital = mysql_real_escape_string($allDataInSheet[$i]["AB"]);
$qtyhospital = mysql_real_escape_string($allDataInSheet[$i]["AC"]);
$ambul = mysql_real_escape_string($allDataInSheet[$i]["AD"]);
$upambul = mysql_real_escape_string($allDataInSheet[$i]["AE"]);
$qtyambul = mysql_real_escape_string($allDataInSheet[$i]["AF"]);
$dt = mysql_real_escape_string($allDataInSheet[$i]["AG"]);
//$dt=date("Y-M-D", strtotime($dt));

$unix_timestamp = ($tm - 25569) * 86400;
   $phpdate = date("Y-m-d", $unix_timestamp);
//$names = trim($allDataInSheet[$i]["A"]);
//$email = trim($allDataInSheet[$i]["B"]);
//$password = trim($allDataInSheet[$i]["C"]);
//$proffession = trim($allDataInSheet[$i]["D"]);
//$district = trim($allDataInSheet[$i]["E"]);
//$country = trim($allDataInSheet[$i]["F"]);
//$website = trim($allDataInSheet[$i]["G"]);

$string .= "('".$pid."','".$First_Name."','".$Last_Name."','".$dob."','".$gender."','".$afnumber."','".$category."','".$affectation."','".$afname."'
,'".$aflastname."','".$insurance."','".$famcode."','".$pagenumber."','".$consultation."','".$medicament."','".$upmendicament."','".$qtymendicament."'
,'".$consommable."','".$upconsommable."','".$qtyconomsmable."','".$acte."','".$upacte."','".$qtyacte."','".$examen."','".$upexamen."','".$qtyexamen."'
,'".$hospital."','".$uphospital."','".$qtyhospital."','".$ambul."','".$upambul."','".$qtyambul."','$phpdate','00','$dt'),";
}
$string = substr($string,0,-1);
($string);          // Insert all the data into one query
?>
<script>

alert('your  Exel file has been added Successfully into our database!'); window.location='import';

// Closes the new window
</script> 

<?php
}
else{
	?>
	<script>

alert('File Was Not Uploaded!'); window.location='import';

// Closes the new window
</script>
<?php
}
}// End Invalid Condition
} 
}
?>
