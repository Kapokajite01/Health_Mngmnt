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
		margin-left: auto;
		margin-right: auto;
	}
	.error-response {
		border-color: #d96557;
		margin-left: auto;
		margin-right: auto;
    	background: #f0c4bf;
    	color: #d96557;
	}
</style>
</head>
<?php 
error_reporting(0);
session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username'])  or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')){
		if(($role!="Receptionist") or ($role!="Mutuelle"))
		{
      header('Location: logout');
		}
	}
ini_set('max_execution_time', 30000);
$dir = "C:/BakExp";
if( is_dir($dir) === false )
{
    mkdir($dir);
}
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'fidele';
$dbname = 'dirskhpe_rangiro';

// Export Patient
function backup_tables($host,$user,$pass,$name)
{

    $link = mysqli_connect($host,$user,$pass);
    mysqli_select_db($link,$name);
    mysqli_query($link,"SET NAMES 'utf8'");

    $return='';
   $table = 'patient';
  // $numrow = 0;
        $result = mysqli_query($link,'SELECT * FROM patient WHERE synchronization != "Synchronized"');
		$myrows = mysqli_num_rows($result);
        $num_fields = mysqli_num_fields($result);
	 if($myrows > 0 ){
        for ($i = 0; $i < $num_fields; $i++) 
        {
            while($row = mysqli_fetch_row($result))
            {
                $return.= 'INSERT INTO patient  VALUES(';
                for($j=0; $j<$num_fields; $j++) 
                {
				$updateSync = mysqli_query($link,"UPDATE patient SET synchronization = 'Synchronized'  WHERE id = '$row[0]'");

                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                    if ($j<($num_fields-1)) { $return.= ','; }
                }
                $return.= ");\n";
				//$numrow= $numrow+1;
            }
        }
        $return.="\n\n\n";
  

    //save patient

	
	 	$nm='C:/BakExp/'.$table.''. date('d-m-Y'). ' @ '. date('h.i.s') .'.sql';
	 $handle = fopen($nm,'w+');
    fwrite($handle,$return);
$source = $nm; // Source file on server
$destination = "public_html/soft/cron/patient.sql"; // Save to this file on FTP server
$ftphost = "ftp.dirsoft.net";
$ftpuser = "dirskhpe";
$ftppass = "87FP65u52ouT";
$ftp = ftp_connect($ftphost);
if (ftp_login($ftp, $ftpuser, $ftppass)) {
   if(ftp_put($ftp, $destination, $source, FTP_BINARY))
   {  	 
    $msg =  "Uploaded to". $ftphost;
   }	
	 else
	 {
	$msg =   "Error uploading to ". $ftphost ;	 
	 }

}
 else { 
  $msg = "Invalid ftp User or Password for ".$ftphost; 
 }
  $resultSynch = mysqli_query($link,"INSERT INTO mySynchronizations(numRowa,tableSyncho,status,type,onLineUpload,time )VALUES
		('$myrows','$table','Succeded','Exported','$msg',Now())");
ftp_close($ftp);
	 echo '<div class="success-response sql-import-response">'.$myrows.' Patients Exported successfully</div>';
    fclose($handle);

	 }
	 else{
	 echo '<div class="error-response"> No patients Exported</div>';
		 
		 
	 }
}

// Export Consumptions

function backup_tables1($host,$user,$pass,$name)
{

    $link = mysqli_connect($host,$user,$pass);
    mysqli_select_db($link,$name);
    mysqli_query($link,"SET NAMES 'utf8'");

    $return='';
   $table = 'consomation';
  // $numrow = 0;
        $result = mysqli_query($link,'SELECT * FROM consomation  WHERE synchronization != "Synchronized"');
		$myrows = mysqli_num_rows($result);
        $num_fields = mysqli_num_fields($result);
	 if($myrows > 0 ){
        for ($i = 0; $i < $num_fields; $i++) 
        {
            while($row = mysqli_fetch_row($result))
            {
                $return.= 'INSERT INTO consomation   VALUES(';
                for($j=0; $j<$num_fields; $j++) 
                {
				$updateSync = mysqli_query($link,"UPDATE consomation  SET synchronization = 'Synchronized'  WHERE consid = '$row[0]'");

                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                    if ($j<($num_fields-1)) { $return.= ','; }
                }
                $return.= ");\n";
				//$numrow= $numrow+1;
            }
        }
        $return.="\n\n\n";
  

       //save Consumptions

	
	 	$nm='C:/BakExp/'.$table.''. date('d-m-Y'). ' @ '. date('h.i.s') .'.sql';
	 $handle = fopen($nm,'w+');
    fwrite($handle,$return);
$source = $nm; // Source file on server
$destination = "public_html/soft/cron/consomation.sql"; // Save to this file on FTP server
$ftphost = "ftp.dirsoft.net";
$ftpuser = "dirskhpe";
$ftppass = "87FP65u52ouT";
$ftp = ftp_connect($ftphost) or die("Failed to connect to $ftphost");
if (ftp_login($ftp, $ftpuser, $ftppass)) {
   if(ftp_put($ftp, $destination, $source, FTP_BINARY))
   {  	 
    $msg =  "Uploaded to". $ftphost;
   }	
	 else
	 {
	$msg =   "Error uploading to ". $ftphost ;	 
	 }

}
 else { 
  $msg = "Invalid ftp User or Password for ".$ftphost; 
 }
  $resultSynch = mysqli_query($link,"INSERT INTO mySynchronizations(numRowa,tableSyncho,status,type,onLineUpload,time )VALUES
		('$myrows','$table','Succeded','Exported','$msg',Now())");
ftp_close($ftp);
	 echo '<div class="success-response sql-import-response">'.$myrows.' Patients Exported successfully</div>';
    fclose($handle);	

	 }
	 else
	 {
	 echo '<div class="error-response"> No Consumptions Exported</div>';
		 
		 
	 }
}
backup_tables($dbhost,$dbuser,$dbpass,$dbname);
backup_tables1($dbhost,$dbuser,$dbpass,$dbname);
header('location: https://dirsoft.net/soft/ImportValues')
  ?>
   