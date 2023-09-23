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
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Consultation"){
      header('Location: logout');
	}
include_once('connect_db.php');
$trackpatient = $_SESSION['sespatientnumber'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$dateofexam= $_SESSION['dastofexamen'];

include_once 'connect_db.php';
if(isset($_POST['save'])){
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
	$del_id = $checkbox[$i]; 
	mysqli_query($conn,"DELETE FROM consom_labs WHERE lbaconsid='".$del_id."'");
	$message = "Data deleted successfully !";
}
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
$result = mysqli_query($conn,"SELECT * FROM consom_labs WHERE patient_id = '$trackpatient'");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<title>Delete employee data</title>
</head>
<body>
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<form method="post" action=""  onsubmit="return deleteConfirm();">
				<h3>Results Taken from &nbsp;&nbsp;<?php echo $firstname;?>&nbsp;&nbsp;<?php echo $lastname;?> On&nbsp;&nbsp;<?php echo $dateofexam;?> </h3><hr>

<table class="table table-bordered" width="75%">
<thead>
<tr>
    <th><input type="checkbox" id="checkAl"> Select All</th>
	<th>Test</th>
	<th>Quantity</th>
	<th>Price</th>
	<th>Results</th>
	<th> Test No</th>
	<th>Edit</th>
</tr>
</thead>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
		$jkh++;
?>
<tr>
    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["lbaconsid"]; ?>"></td>
	<td><?php echo $row["examen"]; ?></td>
	<td><?php echo $row["examen_qty"]; ?></td>
	<td><?php echo $row["examen_price"]; ?></td>
	<td><?php echo $row["results"]; ?></td>
	<td><?php echo $row["Noexamen"]; ?></td>
	<td><a href="edit_results?result=<?php echo urlencode($row['lbaconsid']); ?>">Edit</a></td>
</tr>
<?php
$i++;
}
?>
</table>
<p align="center"><button type="submit" class="btn btn-success" name="save" onsubmit="return deleteConfirm();">DELETE</button></p>
</form>
<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
</body>
</html>
