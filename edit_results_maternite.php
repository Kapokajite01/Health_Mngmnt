<?php

error_reporting(0);
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Maternite"){
      header('Location: logout');
	}
$resultnumber = $_GET['result'];
include_once 'connect_db.php';
if(isset($_POST['save'])){
	$examen = $_POST['exeamenedit'];
	$examen_qty = $_POST['qtyexamenedit'];
	$examen_price = $_POST['upexamenedit'];
	$results = $_POST['resultexamenedit'];
$EDITres = mysqli_query($conn,"UPDATE  consom_labs SET examen = '$examen',examen_qty = '$examen_qty',examen_price='$examen_price',results = '$results'  WHERE lbaconsid='".$resultnumber."'");
if($EDITres){
	$message = "Data deleted successfully !";
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

$resultedit = mysqli_query($conn,"SELECT * FROM consom_labs WHERE lbaconsid = '$resultnumber'");
?>
<script type="text/javascript">
    function deleteConfirm(){
        var result = confirm("Do you really want to Edit  Record?");
        if(result){
            return true;
        }else{
            return false;
        }
    }
	

</script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<form method="post" action=""  onsubmit="return deleteConfirm();">
				<h1>Edit Results </h1><hr>

<table class="table table-bordered" width="75%">

<?php
$i=0;
while($row = mysqli_fetch_array($resultedit)) {
		$jkh++;
?>
<tr><th>Examen</th><td><input type="text" name="exeamenedit" style="width: 100%;" value='<?php echo $row["examen"]; ?>' required></td></tr>
<tr><th>Quantity</th><td><input type="text" name="qtyexamenedit" style="width: 20%;" value='<?php echo $row["examen_qty"]; ?>' required></td></tr>
<tr><th>Unit Price</th><td><input type="text" name="upexamenedit" style="width: 20%;" value='<?php echo $row["examen_price"]; ?>' required></td></tr>
<tr><th>Results</th><td><input type="text" name="resultexamenedit" style="width: 20%;" value='<?php echo $row["results"]; ?>' required></td></tr>
<tr><th>Examen No</th><td><input type="text" name="noexamenedit" style="width: 20%;" value='<?php echo $row["Noexamen"]; ?>' readonly></td></tr>
<?php
$i++;
}
?>
</table>
<p align="center"><button type="submit" class="btn btn-success" name="save" >Edit</button></p>
</form>