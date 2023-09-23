<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
document.getElementById('save').style.visibility="hidden";

window.print();
document.getElementById('save').style.visibility="visible";
document.getElementById('save').disabled=false; 

}
</script>
<?php
//error_reporting(0);
session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
	
include_once('connect_db.php');
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username'])  or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')){
		if(($role!="Receptionist") or ($role!="Mutuelle"))
		{
      header('Location: logout');
		}
	}
$myusername=$_SESSION['sess_username'];
$postedesante = $_SESSION['sess_postdsante'];

$postedesante = $_SESSION['sess_postdsante'];
if (isset($_POST['bigbutton'])) {
    include('connesave.php');
	

    $_SESSION["date"] =$_POST["mydate"];
	$date = $_SESSION["date"];
	IF(empty($date)){
		?>
	<script>

alert('Complete The Date Of Consumption'); window.location='reception';

// Closes the new window
</script>  
<?php	
	}
	else{
	$_SESSION['destination'] = $_POST['destination'];
	$_SESSION['patid']= $_POST['patid'];
	$_SESSION["fname"]=addslashes($_POST["names"]);
	$fname = $_SESSION["fname"];
	$_SESSION["lname"]=addslashes($_POST["lnames"]);
	$lname = $_SESSION["lname"];
	$_SESSION["gender"]=$_POST["gender"];
	$gender=$_SESSION['gender'];
	$_SESSION['dob']=$_POST['dob'];
	$dob=$_SESSION['dob'];
	$_SESSION["province"]=$_POST['province'];
	$province = $_SESSION["province"];
	$_SESSION["district"]=$_POST['district'];
	$district=$_SESSION['district'];
	$_SESSION['sector']=$_POST['sector'];
	$sector=$_SESSION['sector'];
	$_SESSION["cell"]=$_POST['cellName'];
	$cell=$_SESSION["cell"];
	$_SESSION["numberform"]=$_POST['numberform'];
	$numberform=$_SESSION["numberform"];
	$_SESSION["affname"]=addslashes($_POST['afname']);
	$afname=$_SESSION["affname"];
	$_SESSION["aflname"]=addslashes($_POST['aflname']);
    $aflname=$_SESSION["aflname"];
	$_SESSION['affectation']=$_POST['affectation'];
	$affectation=$_SESSION['affectation'];
	$_SESSION["insnumber"]=$_POST["insnumber"];
	$number = $_SESSION["insnumber"];
	$_SESSION["insurance"]=$_POST["insurance"];
	$insurance = $_SESSION["insurance"];
    $_SESSION["pagenum"] = $_POST["pagecode"];
	$pagenum=$_SESSION["pagenum"];
	$_SESSION["membercat"]= $_POST["catmember"];
	$membercat= $_SESSION["membercat"];
	$_SESSION["famcode"] =$_POST["famcode"];
	$famcode= $_SESSION["famcode"];
	$wdays=$_POST['workingday'];
	$nultm = $_POST['nulltm'];
	$carnet=$_POST['carnet'];
	$consultation= $_POST['fiche'];
	$transfert=$_POST['transfert'];
	$numcopy=$_POST['numphotocopy'];
	$_SESSION["copynumber"]= $numcopy;
	$copies=$_SESSION["copynumber"];
	$amount = $copies*100;

}

}
?>
<?php

if (isset($_POST['cancel'])) {
	
header("Location:reception");
	
	
}?>	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			

			
				<div class="content-module">				
					
					<div class="content-module-main cf">
		<div align="center">
		<form method="POST" action="" >
	<?php
echo '<table id="mydiv">
	<tr><td><strong><strong>MINISTRY OF HEALTH</strong><br />
                  <strong>DD PROVINCE</strong><br />
                  <strong>Kulu DISTRICT</strong><br/>
				  <strong>Kulu HEALTH CENTER</strong><BR><BR></td></tr>
	<tr><td> <strong>Date</strong></td><td> <strong>:&nbsp;'.$_SESSION["date"].'</strong></td><td></td></tr>
	<tr><td> <strong>Names</strong></td><td> <strong>:&nbsp;'.$fname.'</strong></td><td><strong>'.$lname.'</strong></td></tr>
	<tr><td><strong>Insurance</strong></td><td><strong>:&nbsp;'.$insurance.'</strong></td></tr>
	<tr><td><strong>Insurance No</strong></td><td><strong>:'.$number.'</strong></td></tr>
	<!--<tr><td><strong>File No</strong></td><td><strong>:'.$copies.'</strong></td></tr>-->
	<tr><td></td><td></td></tr>
    <tr><td></td><td></td></tr>
    <tr><td></td><td></td></tr>
    <tr><td></td><td></td></tr>
	<tr><td><hr></td></tr>
    <tr><td><strong>Photocopy &nbsp;&nbsp</strong></td><td>:<strong>'.$amount.'</strong></td><td></td></tr>
	<tr><td><hr></td></tr>
	   <tr><td></td><td></td></tr>
	   <tr><td></td><td></td></tr>
	   <tr><td></td><td></td></tr>
    <tr><td></td><td></td></tr>

</table>';?><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="save" id="save" value="SAVE">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</form>
</div>
<?php
	if (isset($_POST['save'])) {
	session_start();
    include_once('connect_db.php');
	$patid = $_SESSION['patid'];
	$dt = $_SESSION["date"];
	$lname=$_SESSION["lname"];
	$fname = $_SESSION["fname"];
	$gender=$_SESSION['gender'];
	$dob=$_SESSION['dob'];
	$province= $_SESSION["province"];
	$district=$_SESSION['district'];
	$sector=$_SESSION['sector'];
	$cell=$_SESSION["cell"];
	$numberform=$_SESSION["numberform"];

	$afname=$_SESSION["affname"];
	$aflname=$_SESSION["aflname"];
    $affectation=$_SESSION['affectation'];
	$number = $_SESSION["insnumber"];
	$insurance = $_SESSION["insurance"];
	$membercat= $_SESSION["membercat"];
	$famcode= $_SESSION["famcode"];
	$pagenum=$_SESSION["pagenum"];
	$carnet = $_SESSION["crnet"];
	$transfert=$_SESSION["transfert"];
	$transferts=$_SESSION["ntransfert"];
	$copy=$_SESSION["copy"];
	$copies=$_SESSION["copynumber"];
	//$cop=$copy*$copies;

$sql = "INSERT INTO patient " . "(id,names,lname,carnet,phtocopy,transfert,category,affiliate_number,gender,dob,province,district,sector,cell,affiliate_names,afilliate_lastname,affectation,insurance,familycode,consultatiom,pagenumber,date,null_copy,null_tm,policeno,cas) " . "VALUES ('','$fname','$lname','$carnet','$cop','$transfert','$membercat','$number','$gender','$dob','$province','$district','$sector','$cell','$afname','$aflname','$affectation','$insurance','$famcode','$consult','$pagenum','$dt','$all_null','$tm_null','$numberform','$cas')";
$resultsave = mysqli_query($conn, $sql);



	if($resultsave){
	$selectbig=mysqli_query($conn,"SELECT MAX(id)AS bigid,affiliate_number  from patient");
	$rowbig = mysqli_fetch_array($selectbig);
	$curbigid = $rowbig['bigid'];
	$insconsult =  mysqli_query($conn,"INSERT INTO other_consumables(other_id,patient_id,photocopy,num_pcopy,tmoderateur,date)VALUES('','$curbigid','100','$copies','','$dt')");
	$sqlCONSOM =  mysqli_query($conn, "INSERT INTO consomation (consid,id,comments,datecunsuption) VALUES ('','$curbigid','photocopy','$dt')");
		$savelog=("INSERT INTO logs(id,name,lname,phone,action,time)
VALUES('','$name','$lname','$tel','Saved New Patient',now())");	
$logsaved = mysqli_query($conn, $savelog);
echo "<script>alert('Photocopy Added to Other Cunsumptions')</script>";
echo "<script>window.location='m_reception';</script>";
	}
	else{
		echo "<href = 'm_reception'>Data Not Saved Try Again</a>";
	}

	}
	?>
	
<style>
.button {
    background-color: #DCDCDC;
    border: none;
    color: black;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
