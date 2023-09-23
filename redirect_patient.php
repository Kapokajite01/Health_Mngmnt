 <script type="text/javascript">
    function deleteConfirm(){
        var result = confirm("Do you really want to Return Patient?");
        if(result){
            return true;
        }else{
            return false;
        }
    }
	

</script>
<?php
error_reporting(0);
session_start();
	$_SESSION['rediredted']= 'No';
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];

     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Receptionist"){
      header('Location: logout');
	}
	include_once('connect_db.php');
 $key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
 $encrypted =$_GET['ptienID'];
 $encrypted = preg_replace('/\s+/', '+', $encrypted);
 
 function my_decrypt($data, $key) {
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}
$decrypted = my_decrypt($encrypted, $key);
 $patientnumber= $decrypted;


$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$dateofexam= $_SESSION['dastofexamen'];

if(isset($_POST['saveredirect'])){
		$destination = $_POST['destination'];
	$updatesdest = mysqli_query($conn,"UPDATE consultation SET  status = '$destination',origine = 'Redirected' ,branch = 'Redcted'  WHERE patient_id ='".$patientnumber."'");
	
	if($updatesdest){
	$_SESSION['redirect']  = 'yes';
	
	?>
	<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
</script>
<script type='text/javascript'>
         self.close();
    </script>
	
	<?php
	
}
	}
?>
 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<title>Return Patient</title>
</head>
<body>
<div align="center">
<form method="POST" action=""  onsubmit="return deleteConfirm();">
				<h3>Return Patient &nbsp;&nbsp;<?php echo $firstname;?>&nbsp;&nbsp;<?php echo $lastname;?> &nbsp;&nbsp;<?php echo $dateofexam;?> </h3><hr>
<select class="box" name="destination" required >
      <option value="">--Select Destination----</option>
      <option value = 'Consultation'>Consultation</option>
      <option value='Maternite'>Maternite</option>
      <option value='Planning'>Planning Familial</option>

    </select><br>
	<input type="submit" name="saveredirect" value="RETURN">
	</form></div>