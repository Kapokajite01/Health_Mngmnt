<?php
error_reporting(0);
session_start();
	$user=$_SESSION['sess_username'];

	$userid = $_SESSION['sess_user_id'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username'])  or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')){
		if(($role!="Family_planning"))
		{
      header('Location: logout');
		}
	}
    include_once('connect_db.php');
$patientID = $_SESSION['affnumber'];

	  $key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
function my_encrypt($data, $key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

$affnumber = my_encrypt($patientID, $key);
			 
			 
			 
			 
	if($_POST['check']){
		
	$checkbox = $_POST['check'];
	$mydate = $_SESSION['mydate'];
	$numberChecks = count($checkbox);
	for($ijk=0;$ijk<$numberChecks;$ijk++){
	$del_id = $checkbox[$ijk]; 
	$selection = mysqli_query($conn,"SELECT * FROM examens   WHERE id='".$del_id."'");
	$data = mysqli_fetch_array($selection);
	 $EXAM = $data['name_examen'];
	 $PRICE = $data['unit_price'];
	 	$sql1 = ("SELECT  examen_id  FROM consom_labs WHERE examen_id= '$del_id' AND YEAR(time_test)= YEAR(CURDATE())");
$result1 = mysqli_query($conn, $sql1);
$num_rows1 = mysqli_num_rows($result1);
$num_rows1 = $num_rows1+1;
$myInset =  mysqli_query($conn,"INSERT INTO consom_labs (patient_id,examen_id,examen,examen_qty,examen_price,user,time_test,Noexamen ) VALUES('$patientID','$del_id','$EXAM','1','$PRICE','$user','$mydate','$num_rows1')");
   }
	echo "<script>alert('$numberChecks  Test(s) Selected')</script>";
echo "<script>window.location='laplanning?affid=$affnumber&dtconsult=$mydate&case=Nouveau';</script>";	
	
	}
	else{

echo "<script>alert('No selection')</script>";

echo "<script>window.location='laplanning?affid=$affnumber';</script>";	
  
  }		

?>
