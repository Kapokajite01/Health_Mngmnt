<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
?>
<link href="bootstrap01.min.css" rel="stylesheet">
<?php

error_reporting(0);
session_start();
include_once('connect_db.php');
	$userid = $_SESSION['sess_user_id'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username'])  or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')){
		if(($role!="Receptionist") or ($role!="Mutuelle"))
		{
      header('Location: logout');
		}
	}
	
$myusername=$_SESSION['sess_username'];
$postedesante = $_SESSION['sess_postdsante'];
$patientName = $_POST['PAtientNmae'];
$pieces = explode(" ", $patientName);
$doctorName = $_POST['doctorNmae'];
$dptName = $_POST['dpmtNmae'];
$yourBox = $_POST['yourBox'];
$yourBox1 = $_POST['yourBox1'];
$yourBox2 = $_POST['yourBox2'];
?>
<html>
</head>
<body>
<?php
	include_once('mmenus.php');

	?>	
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="jsauto/jquery11.min.js"></script>
 
<!-- jQuery UI -->
<link rel="stylesheet" href="cssauto/jquery-ui.css" />
<script src="jsauto/jquery-ui.min.js"></script>
 
<!-- Bootstrap CSS -->
<link href="cssauto/bootstrap.min.css" rel="stylesheet">
</head>
	<!-- TOP BAR -->
	<!-- TOP BAR -->
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
						
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
							<!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				


</head>
   <script>
function myfunction()
{
var checkbo = document.getElementById('yourBox');

if (checkbo.checked){
document.getElementById('search_city').disabled = false;
document.getElementById('search_city').style.display='block';
document.getElementById('search_city1').style.display='none';
document.getElementById('search_city2').style.display='none';
document.getElementById('gobtn').disabled = false;
document.getElementById('gobtn').style.display='block';
document.getElementById('gobtn1').style.display='none';
document.getElementById('gobtn2').style.display='none';
document.getElementById('yourBox1').checked=false;	
document.getElementById('yourBox2').checked=false;	
document.getElementById('search_city1').disabled = true;
document.getElementById('search_city2').disabled = true;
} 
 else {
document.getElementById('search_city').disabled = true;
document.getElementById('search_city').style.display='none';
document.getElementById('gobtn').disabled = true;
document.getElementById('gobtn').style.display='none';

}
};
  
function myfunction1()
{
var checkbo1 = document.getElementById('yourBox1');

if (checkbo1.checked){
document.getElementById('search_city1').disabled = false;
document.getElementById('search_city1').style.display='block';
document.getElementById('search_city').style.display='none';
document.getElementById('search_city2').style.display='none';
document.getElementById('gobtn1').disabled = false;
document.getElementById('gobtn1').style.display='block';
document.getElementById('gobtn').style.display='none';
document.getElementById('gobtn2').style.display='none';
document.getElementById('yourBox').checked=false;	
document.getElementById('yourBox2').checked=false;	
document.getElementById('search_city').disabled = true;
document.getElementById('search_city2').disabled = true;


} 
 else {
	document.getElementById('search_city1').disabled = true;
document.getElementById('search_city1').style.display='none';

document.getElementById('gobtn1').disabled = true;
document.getElementById('gobtn1').style.display='none';

}
}; 

function myfunction2()
{
var checkbo2 = document.getElementById('yourBox2');

if (checkbo2.checked){
document.getElementById('search_city2').disabled = false;
document.getElementById('search_city2').style.display='block';
document.getElementById('search_city').style.display='none';
document.getElementById('search_city1').style.display='none';
document.getElementById('gobtn2').disabled = false;
document.getElementById('gobtn2').style.display='block';
document.getElementById('gobtn').style.display='none';
document.getElementById('gobtn1').style.display='none';
document.getElementById('yourBox').checked=false;	
document.getElementById('yourBox1').checked=false;	
document.getElementById('search_city').disabled = true;
document.getElementById('search_city1').disabled = true;


} 
 else {
	document.getElementById('search_city2').disabled = true;
document.getElementById('search_city2').style.display='none';
document.getElementById('gobtn2').disabled = true;
document.getElementById('gobtn2').style.display='none';


}
};   
   
   </script>
<!-- autocomplete -->
<script type="text/javascript">
  $(function() {
     $( "#search_city" ).autocomplete({
       source: 'ajax-db-search.php',
     });
  });
  
    $(function() {
     $( "#search_city1" ).autocomplete({
       source: 'ajax-db-search1.php',
     });
  });
  
      $(function() {
     $( "#search_city2" ).autocomplete({
       source: 'ajax-db-search2.php',
     });
  });
</script>


   <div style="margin-left: 2%;margin-right: 2%;">


<div class="row" > 
		<div class="col-md-12" >
						<h3 class="card-header" style="margin-left: auto;margin-right: auto;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pending Appointments</strong></h3>
					<div class="card-body" style="width:55%;  margin-left: auto;margin-right: auto;">
						<form  action="search_appointment" method="POST">
                     <input type="checkbox" id="yourBox"    name="yourBox"  value="yourBox"   onclick="myfunction();" /><strong> Patient</strong><input type="text" name="PAtientNmae" id="search_city" size="50px" style="display:none" disabled required> <span class="input-group-btn"><button class="btn btn-info" type="submit" id="gobtn"  style="display:none" disabled>Go!</button></span>
					<input type="checkbox" id="yourBox1"    name="yourBox1"  value="yourBox1"   onclick="myfunction1();" /> <strong> Doctor</strong><input type="text" name="doctorNmae" id="search_city1" size="50px" style="display:none" disabled required><span class="input-group-btn"><button class="btn btn-info" type="submit" id="gobtn1"  style="display:none" disabled>Go!</button></span>
					<input type="checkbox" id="yourBox2"    name="yourBox2"  value="yourBox2"   onclick="myfunction2();" /> <strong> Department</strong><input type="text" name="dpmtNmae" id="search_city2" size="50px"  style="display:none" disabled required><span class="input-group-btn"><button class="btn btn-info" type="submit" id="gobtn2"  style="display:none" disabled>Go!</button></span>
	 
												<!-- jQuery -->

						</form> 
					</div>
		</div>  

</div>   
			<div class="row"> 
							<div class="col-md-12" >
													<table id="customers" style="width:75%;  margin-left: auto;margin-right: auto;border: 1px solid black;">
															
																<thead  >
																	<tr>
																		<th>#</th>
																		<th><strong>Number</strong></th>
																		<th><strong>Name</strong></th>
																		<th><strong>Department</strong></th>
																		<th><strong>Date</strong></th>
																		<th><strong>Time</strong></th>
																		<th><strong>Doctor</strong></th>
																		<th><strong>Reason</strong></th>
																		<th><strong>Edit</strong></th>
																		<th><strong>Delete</strong></th>
																	</tr>
																</thead>
																<tbody>
													<?php 
													include('config.php');

														if (isset($_GET['pageno'])) {
																$pageno = $_GET['pageno'];
															} else {
																$pageno = 1;
															}
															$no_of_records_per_page = 100;
															$offset = ($pageno-1) * $no_of_records_per_page;

															if($yourBox){
															$total_pages_sql = "SELECT COUNT(*) FROM patient_reserv WHERE patientFname ='$pieces[0]'OR patientLname  ='$pieces[1]'";
															}
															if($yourBox1){
															$total_pages_sql = "SELECT COUNT(*) FROM patient_reserv WHERE doctorName  ='$doctorName'";
															}
															if($yourBox2){
															$total_pages_sql = "SELECT COUNT(*) FROM patient_reserv WHERE department ='$dptName'";
															}
															
															$result = mysqli_query($conn,$total_pages_sql);
															$total_rows = mysqli_fetch_array($result)[0];
															$total_pages = ceil($total_rows / $no_of_records_per_page);

													if($yourBox){
													$query=mysqli_query($conn,"Select * FROM patient_reserv WHERE patientFname ='$pieces[0]'OR patientLname  ='$pieces[1]' ORDER BY dateAppointment ,timeAppointmennt  DESC ");
													}
													if($yourBox1){
													$query=mysqli_query($conn,"Select * FROM patient_reserv WHERE doctorName  ='$doctorName' ORDER BY dateAppointment ,timeAppointmennt  DESC ");
													}
													if($yourBox2){
													$query=mysqli_query($conn,"Select * FROM patient_reserv WHERE department ='$dptName' ORDER BY dateAppointment ,timeAppointmennt  DESC ");
													}
													
													while ($row=mysqli_fetch_array($query)) {
													 

													?>
													<tr> 
														<td><font color="black"  size = "2"><?php echo ++$i;?></td>
														<td><font color="black"  size = "2"><?php echo $row['patientID'];?></td>
														<td><font color="black"  size = "2"><?php echo $row['patientFname'].' '.$row['patientLname'];?></td>
														<td><font color="black"  size = "2"><?php echo $row['department'];?></td>
														<td><font color="black"  size = "2"><?php echo $newDate = date("d/m/Y", strtotime($row['dateAppointment ']));?></td>
														<td><font color="black"  size = "2"><?php echo $row['timeAppointmennt'];?></td>
														<td><font color="black"  size = "2"><?php echo $row['doctorName'];	?></td>
														<td style="text-align:justify;"><font color="black"  size = "2"><p><?php echo $row['appointmentReason'];?></p></td>
<td><a href="edit_appointment?appontId=<?php echo $row['oatientReservID']?>" class="btn btn-info" style="font-size: 10px;"><strong>E d i t</strong></a></td>
<td><a href="delete_appointment?appontId=<?php echo $row['oatientReservID']?>"class="btn btn-danger"  style="font-size: 10px;"><strong>D e l e t e</strong></a></td>
															</tr>
											
										

													<?php } ?>
													</tbody>
													</table>
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													Total Records [ <strong><?php echo number_format($total_rows);?></strong> ]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page <?php echo $pageno;?> of <?php echo $total_pages;?> 
								</div>
			</div>

     <hr>
			<div class="row"> 
			<div class="col-md-12">
					<ul class="pagination justify-content-center mb-4">
						<li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
						<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
							<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
						</li>
						<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
							<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
						</li>
						<li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
					</ul>
				</div>
			</div>
</div>
	




	<div id="footer" style="margin-top: 5%;">

		<p><strong>Powed By Vision Soft Ltd .</strong></p>
			
	</div> <!-- end footer -->
</body>
<script type="text/javascript">
<!--
function popup(url) 
{
 var width  = 1500;
 var height = 800;
 var left   = (screen.width  - width)/2;
 var top    = (screen.height - height)/2;
 var params = 'width='+width+', height='+height;
 params += ', top='+top+', left='+left;
 params += ', directories=no';
 params += ', location=no';
 params += ', menubar=no';
 params += ', resizable=no';
 params += ', scrollbars=no';
 params += ', status=no';
 params += ', toolbar=no';
 newwin=window.open(url,'windowname5', params);
 if (window.focus) {newwin.focus()}
 return false;
}
</script>
</html>