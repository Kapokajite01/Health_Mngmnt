<?php

session_start();
$track = $_SESSION['idtrack'];
include'mydb_connection/my_dbconnection.php';
$approve = "SELECT loan_account,loan_amount ,loan_type,loan_term_number,loan_term_type,first_name,last_name  from  loan_details JOIN loan_personalinfo ON loan_details.loan_tracknumber = loan_personalinfo.loan_id  WHERE loan_tracknumber = '$track'";
 $resultscore = $conn_db->query($approve);
if ($resultscore->num_rows > 0) {

while ($rowval =  $resultscore->fetch_assoc()) {
$account = $rowval['loan_account'];	
$amount = $rowval['loan_amount'];	
$type = $rowval['loan_term_type'];	
$term = $rowval['loan_term_number'];
if($type =='Year'){
$term = $term/12;	
}
$firstname = $rowval['first_name'];
$lastname = $rowval['last_name'];
}
}

 ?>
<body style="background-color:Silver">
<div align="center" >
<form method="POST" ACTION="">
				<h1>	LOAN Closing  <img src="img/delattach.png.png" alt="Smiley face" height="42" width="42"> </h1><hr>
				<table width="75%">
				<tr><td><strong>Loan Account</strong></td><td></td><td>-&nbsp;&nbsp;<?php echo $account;?></td></tr>
				<tr><td><strong>Loan Names</strong></td><td></td><td>-&nbsp;&nbsp;<?php echo $firstname;?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lastname;?></td></tr>
				<tr><td><strong>Loan Amount</strong></td><td></td><td>-&nbsp;&nbsp;<?php echo number_format($amount);?></td></tr>
				<tr><td><strong>Loan Term</strong></td><td></td><td>-&nbsp;&nbsp; <?php echo $term*12;?>&nbsp;&nbsp; <?php echo $type;?>(s)</td></tr>
				<tr><td></td><td><input type="submit" name="approve" value="Close"></td><td><input type="submit" name="cancel" value="Cancel"></td></tr>
				</table>
				</form>
				</div>
</body>
<?PHP
if(isset($_POST['approve'])){
	$update = "UPDATE loan_details SET loan_status = 'Closed' where loan_tracknumber = '$track'";
		 $resultupdate = $conn_db->query($update);

	if($resultupdate){
			$_SESSION['redirect'] = 'yes';

		?>
		<script>
		alert('Loan Closed');
        </script>
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
if(isset($_POST['cancel'])){
	?>
		<script>
		alert('Your Canceled ');
        </script>
		
<script type='text/javascript'>
 window.parent.close();
 </script>
	<?php
}
?>