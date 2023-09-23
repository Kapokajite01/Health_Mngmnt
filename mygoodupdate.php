<?php
error_reporting(0);

$myselect = (" SELECT id FROM patient");
while ($row = mysqli_fetch_assoc($myselect)){
	$patientid = $row['id'];
	$myselect1 = (" SELECT id,ambullance FROM consomation where id = '$patientid'");
	while ($row1 = mysqli_fetch_assoc($myselect1)){
	if(!empty($row1['ambullance'])){
		
		$sql="update patient SET amb = 'yes' where id ='$patientid'";
		($sql);
	}	
		
	}
	
	
}
?>