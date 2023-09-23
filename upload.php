<?php
error_reporting(0);
if (isset($_POST["submit"])) {
if (!file_exists('upload')) {
    mkdir('upload', 0777, true);
}
$connect = mysql_connect("localhost","root","fidele"); 
mysql_select_db("dirskhpe_rangiro",$connect);
$rowSQL = ( "SELECT MAX( up_level ) AS max FROM `consomation_upload`;" );
$row = mysqli_fetch_assoc( $rowSQL );
$largestNumber = $row['max'];
$largestNumber1 = $largestNumber+1;
$origine= $_POST['origine'];


$servername = "localhost";
$username = "root";
$password = "fidele";
$dbname = "dirskhpe_rangiro";

    if ($_FILES["file"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
         mkdir("upload/".$title, 0700);
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "upload/".$title . $_FILES["file"]["name"]);
    }
	            $inputfilename = "upload/".$title . $_FILES["file"]["name"];
echo $location;
	require 'Classes/PHPExcel/IOFactory.php';
 
// Mysql database

 

$exceldata = array();
 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
//  Read your Excel workbook
try
{
    $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
    $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
    $objPHPExcel = $objReader->load($inputfilename);
}
catch(Exception $e)
{
    die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
}
 
//  Get worksheet dimensions
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();
 
//  Loop through each row of the worksheet in turn
for ($row = 2; $row <= $highestRow; $row++)
{ 
    //  Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
	$tm = $rowData[0][32];
	$unix_timestamp = ($tm - 25569) * 86400;
   $phpdate = date("Y-m-d", $unix_timestamp);
   $rowData[0][0] = addslashes($rowData[0][0]);
   $rowData[0][1] = addslashes($rowData[0][1]);
   $rowData[0][2] = addslashes($rowData[0][2]);
   $rowData[0][3] = addslashes($rowData[0][3]);
   $rowData[0][4] = addslashes($rowData[0][4]);
   $rowData[0][5] = addslashes($rowData[0][5]);
   $rowData[0][6] = addslashes($rowData[0][6]);
   $rowData[0][7] = addslashes($rowData[0][7]);
   $rowData[0][8] = addslashes($rowData[0][8]);
   $rowData[0][9] = addslashes($rowData[0][9]);
   $rowData[0][10] = addslashes($rowData[0][10]);
   $rowData[0][11] = addslashes($rowData[0][11]);
   $rowData[0][12] = addslashes($rowData[0][12]);
   $rowData[0][13] = addslashes($rowData[0][13]);
   $rowData[0][14] = addslashes($rowData[0][14]);
   $rowData[0][15] = addslashes($rowData[0][15]);
   $rowData[0][16] = addslashes($rowData[0][16]);
   $rowData[0][17] = addslashes($rowData[0][17]);
   $rowData[0][18] = addslashes($rowData[0][18]);
   $rowData[0][19] = addslashes($rowData[0][19]);
   $rowData[0][20] = addslashes($rowData[0][20]);
   $rowData[0][21] = addslashes($rowData[0][21]);
   $rowData[0][22] = addslashes($rowData[0][22]);
   $rowData[0][23] = addslashes($rowData[0][23]);
   $rowData[0][24] = addslashes($rowData[0][24]);
   $rowData[0][25] = addslashes($rowData[0][25]);
   $rowData[0][26] = addslashes($rowData[0][26]);
   $rowData[0][27] = addslashes($rowData[0][27]);
   $rowData[0][28] = addslashes($rowData[0][28]);
   $rowData[0][29] = addslashes($rowData[0][29]);
   $rowData[0][30] = addslashes($rowData[0][30]);
   $rowData[0][31] = addslashes($rowData[0][31]);
   $rowData[0][32] = addslashes($rowData[0][32]);
   $rowData[0][33] = addslashes($rowData[0][33]);
   $rowData[0][34] = addslashes($rowData[0][34]);
    //  Insert row data array into your database of choice here
	$sql = "INSERT INTO consomation_upload (up_pid,up_pname,up_plname,up_pdob,up_pgender,up_afnumber,up_pcateg,affectation,up_afnme,up_aflname,up_insurance,up_famcode,up_pagenumber,up_consom_sonsultation,
			                        up_cons_medicaments,up_cons_upmedic,up_cons_qytmedic,up_consomable,up_upcons,up_qtycons,up_acte,up_upacte,up_qtyacte,up_exame,up_upexame,up_qtyexame,up_hospita,
									up_uphospita,up_qtyhosp,up_ambul,up_upambul,up_qtyambul,datecunsuption,up_level,up_time,null_tm,postedesante,origine)
			VALUES ('".$rowData[0][0]."', '".$rowData[0][1]."', '".$rowData[0][2]."', '".$rowData[0][3]."','".$rowData[0][4]."','".$rowData[0][5]."','".$rowData[0][6]."','".$rowData[0][7]."','".$rowData[0][8]."',
'".$rowData[0][9]."','".$rowData[0][10]."','".$rowData[0][11]."','".$rowData[0][12]."','".$rowData[0][13]."','".$rowData[0][14]."','".$rowData[0][15]."','".$rowData[0][16]."','".$rowData[0][17]."','".$rowData[0][18]."',
'".$rowData[0][19]."','".$rowData[0][20]."','".$rowData[0][21]."','".$rowData[0][22]."','".$rowData[0][23]."','".$rowData[0][24]."','".$rowData[0][25]."','".$rowData[0][26]."','".$rowData[0][27]."','".$rowData[0][28]."',
'".$rowData[0][29]."','".$rowData[0][30]."','".$rowData[0][31]."','".$phpdate."','".$largestNumber1."',Now(),'".$rowData[0][33]."','".$rowData[0][34]."','".$origine."')";
	
	if (mysqli_query($conn, $sql)) {
		$exceldata[] = $rowData[0];
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
 
// Print excel data
 
mysqli_close($conn);
?>
<script>

alert('your  Exel file has been added Successfully into The Database!'); window.location='import_export.php';

// Closes the new window
</script> 
<?php


}    
?> 