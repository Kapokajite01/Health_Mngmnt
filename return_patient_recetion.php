 <script type="text/javascript">
    function deleteConfirm(){
        var result = confirm("Do you really want to delete records?");
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
$trackpatient = $_SESSION['sespatientnumber'];

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$dateofexam= $_SESSION['dastofexamen'];
$resultret = mysqli_query($conn,"SELECT * FROM consom_labs WHERE patient_id = '$trackpatient'");

	if(isset($_POST['saveredirect'])){
		$destination = $_POST['destination'];
	$updatesdest = mysqli_query($conn,"UPDATE consultation SET  status = '$destination' WHERE patient_id ='".$trackpatient."'");
	
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
<form method="post" action=""  onsubmit="return deleteConfirm();">
				<h3>Return to Labolatory &nbsp;&nbsp;<?php echo $firstname;?>&nbsp;&nbsp;<?php echo $lastname;?> On&nbsp;&nbsp;<?php echo $dateofexam;?> </h3><hr>
<select class="box" name="destination" id="destination" required >
      <option value="">--Select Destination----</option>
      <option value = 'Laboratoire'>Laboratoire</option>

    </select><br>
	<input type="submit" name="saveredirect">
	</form></div>