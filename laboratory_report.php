<?php 
header('Content-Type: text/html; charset=ISO-8859-1');


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
?>
<html>
<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
   <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 

   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>
</head>
<body>
<?php
	include_once('lmmenus.php');

	?>	
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="jsauto/jquery11.min.js"></script>
 
<!-- jQuery UI -->
<link rel="stylesheet" href="cssauto/jquery-ui.css" />
<script src="jsauto/jquery-ui.min.js"></script>
 
<!-- Bootstrap CSS -->
<link href="cssauto/bootstrap.min.css" rel="stylesheet">
<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
   <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 

   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>
</head>
	<!-- TOP BAR -->
	<!-- TOP BAR -->
	
	
	<!-- MAIN CONTENT -->
		
					<d

			 <!-- end side-menu -->
			
			
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
function printpage() {
document.getElementById('printButton').style.visibility="hidden";

window.print();
document.getElementById('printButton').style.visibility="visible"; 
 
}
</script>

 
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





<div class="row" > 
		<div class="col-md-12" >
						<h3 class="card-header" style="margin-left: auto;margin-right: auto;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Laboratory Report </strong></h3>
					<div class="card-body" style="width:55%;  margin-left: auto;margin-right: auto;">
						<form  action="laboratory_report1" method="POST">
					<input type="text" name="datesearch" id="datesearch" placeholder="Start Date" required aria-required='true' aria-describedby='name-format'placeholder="Start Date" autocomplete="off">	
					<input type="text" name="datesearch1" id="datesearch1" placeholder="End Date" required aria-required='true' aria-describedby='name-format'placeholder="End Date" autocomplete="off">
					<input type="submit" name="submit">
						
						
</form> 
					</div>
		</div>  

</div>   
							<div class="col-md-12" >
													<table style="width : 20%;margin-left: auto; margin-right: auto;" border="0" cellspacing="0" cellpadding="0">

															
		<thead  >
																	<tr>
																	<th>No</th>
																	<th>Patient Name</th>
																	<th>Insurance Number</th>
																	<tH>Insurance</th>
																	<th>Gender</th>
																	<th>Age</th>	
																	<th>Consultation </th>
																	<th>Date</th>
																	</tr>
																</thead>														
																<tbody>
													<?php 
													$query=mysqli_query($conn,"Select names ,lname,gender,dob,insurance,affiliate_number,patient_id,time_test      FROM consom_labs join patient ON patient.id = consom_labs.patient_id where MONTH(time_test)= MONTH(CURDATE())and YEAR(time_test)= YEAR(CURDATE()) and  technid ='$userid' GROUP BY patient_id,time_test");
													if ($query->num_rows > 0) {
													while ($row=mysqli_fetch_array($query)) {
													 

													?>
													<tr style="border: 1px solid black;"> 
														<td><font color="black"><?php echo ++$i;?></td>
														<td><p><font color="black"><?php echo $row['names'].'&nbsp;&nbsp;&nbsp;'.$row['lname'];?></p></td>
														<td><p><font color="black"><?php echo $row['affiliate_number'];?></p></td>
														<td><p><font color="black"><?php echo $row['insurance'];?></p></td>
														<td><p><font color="black"><?php echo $row['gender'];?></p></td>
														<td><p><font color="black"><?php echo $row['dob'];?></p></td>
														<td style="width:60%"><font color="black" ><table>
														<?php  
														$patientID = $row['patient_id'];														
														$dateCons = $row['time_test'];
														$queryrestest=mysqli_query($conn,"Select examen,results  FROM consom_labs WHERE patient_id = '$patientID' AND technid ='$userid'");
														if ($queryrestest->num_rows > 0) {
														?>
														<?PHP
														while ($rowtesres=mysqli_fetch_array($queryrestest)) {
														?>
														<tr><td><?php  echo $rowtesres['examen'];?></td><td style="padding: 5px 10px 5px 5px;"><?php echo $rowtesres['results']?></td></tr>
														 <?php
														}

														}
														?>
														
														</table>
														</td>
														<td style="padding: 5px 10px 5px 5px;"><p><font color="black"><?php echo date("d-m-Y", strtotime($row['time_test']));?></p></td>

													</tr>
											
										

													<?php } 
													}
													else
													{
													echo "No Laboratory";	
													}
													
													
													
													?>
													</tbody>
													</table>
													
								</div>
			</div>

			<div class="row"> 
			<div class="col-md-12">
					<ul class="pagination justify-content-center mb-4">
						<li class="page-item"><input name="print" type="button" value="Print" id="printButton" onClick="printpage()"></li>
						
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