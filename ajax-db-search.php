<?php
 $dbhost = 'localhost';
 $dbuser = 'root';
 $dbpass = 'fidele';
 $db = 'dirskhpe_rangiro';
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($conn); 
 
function get_city($conn , $term){ 
 $query = "SELECT DISTINCT patientFname,patientLname    FROM patient_reserv WHERE patientFname LIKE '%".$term."%' OR patientLname LIKE '%".$term."%' ORDER BY patientFname ASC";
 $result = mysqli_query($conn, $query); 
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data; 
}
 
if (isset($_GET['term'])) {
 $getCity = get_city($conn, $_GET['term']);
 $cityList = array();
 foreach($getCity as $city){
 $cityList[] = $city['patientFname'].' '.$city['patientLname'];
 }
 echo json_encode($cityList);
}

?>