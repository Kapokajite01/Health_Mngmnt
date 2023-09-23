<html>
<head>
<style>
	body {
	width:600px;
	text-align:center;
	}
	.sql-import-response {
		padding: 10px;
	}
	.success-response {
		background-color: #a8ebc4;
	    border-color: #1b7943;
	    color: #1b7943;
	}
	.error-response {
		border-color: #d96557;
    	background: #f0c4bf;
    	color: #d96557;
	}
</style>
</head>
<body>
<?php
error_reporting(0);
ini_set('max_execution_time', 30000);
function progressCircle()
{
echo '<div>
  <div class="outerCircle"></div>
  <div class="innerCircle"></div>
  <div class="icon"></div>
</div>';
}
$sqlScript = file('cron/patient.sql'); 
$sqlScript1 = file('cron/consomation.sql'); 

function importPatient($myscript)
{
	
	$conn =new mysqli('localhost', 'dirskhpe_root', 'fidele' , 'dirskhpe_rangiro');

$num = 0;
$query = '';
$num=0;	
foreach ($myscript as $line)	{
	
	$startWith = substr(trim($line), 0 ,2);
	$endWith = substr(trim($line), -1 ,1);
	
	if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
		continue;
	}
		
	$query = $query . $line;
	
	if ($endWith == ';') {
		$Exwquery = mysqli_query($conn,$query);
		if($Exwquery){
		$num = $num+1;
		}
		$query= '';	
	
	}
	

}
if($num > 0)
{
        $resultSynch = mysqli_query($conn,"INSERT INTO mySynchronizations(numRowa,tableSyncho,status,type,actionMsg,time )VALUES
		('$num','patient','Succeded','Imported','Imported',Now())");
echo '<div class="success-response sql-import-response">'.$num.' Patients imported successfully</div>';
}
else
	{
	echo '<div class="error-response sql-import-response">No Patients Imported</div>';	
		
	}
}




function importConsomation ($myscript1)
{
		$conn =new mysqli('localhost', 'dirskhpe_root', 'fidele' , 'dirskhpe_rangiro');

$num = 0;
$query = '';
$num1=0;
foreach ($myscript1 as $line)	{
	
	$startWith = substr(trim($line), 0 ,2);
	$endWith = substr(trim($line), -1 ,1);
	
	if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
		continue;
		
	}
		
	$query = $query . $line;
	
	if ($endWith == ';') {
		$Exwquery = mysqli_query($conn,$query);
		$query= '';	
		if($Exwquery){
		$num1 = $num1+1;
		}
		
	}
}
	if($num1 > 0)
{
        $resultSynch = mysqli_query($conn,"INSERT INTO mySynchronizations(numRowa,tableSyncho,status,type,actionMsg,time )VALUES
		('$num1','Consumptions','Succeded','Imported','Imported',Now())");
echo '<div class="success-response sql-import-response">'.$num1.' Consumptions imported successfully</div>';
}
else
	{
	echo '<div class="error-response sql-import-response">No Consumptions Imported</div>';	
		
	}

        
}

if($sqlScript){
 $linesPatient = count($sqlScript);
 if($linesPatient > 0)
 {
    importPatient($sqlScript);
 }

}
 if($sqlScript1){
 $linesConsumptions = count($sqlScript1);
 if($linesConsumptions > 0){
 	importConsomation($sqlScript1);
 }

}

?>
