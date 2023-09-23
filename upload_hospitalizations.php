<?php
error_reporting(0);
$connect = mysql_connect("localhost","root","fidele"); 
mysql_select_db("dirskhpe_rangiro",$connect);
if (isset($_POST["submit"])) {
if (!file_exists('upload')) {
    mkdir('upload', 0777, true);
}
$servername = "localhost";
$username = "root";
$password = "fidele";
$dbname = "dirskhpe_rangiro";

 ("TRUNCATE TABLE  hospitalisation");

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
    //  Insert row data array into your database of choice here
	$sql = "INSERT INTO  hospitalisation (name_hospitalisation,unit_price)VALUES ('".$rowData[0][1]."', '".$rowData[0][2]."')";
	
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