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
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Consultation Report </strong></h3>
					<div class="card-body" style="width:55%;  margin-left: auto;margin-right: auto;">
						<form  action="consultationReport1" method="POST">
					<input type="text" name="datesearch" id="datesearch" placeholder="Start Date" required aria-required='true' aria-describedby='name-format'placeholder="Start Date" autocomplete="off">	
					<input type="text" name="datesearch1" id="datesearch1" placeholder="End Date" required aria-required='true' aria-describedby='name-format'placeholder="End Date" autocomplete="off">
					<input type="submit" name="submit">
						
						
</form> 
					</div>
		</div>  

</div>   <?php

													 
													$datesearch = $_POST['datesearch'];
													$datesearch1 = $_POST['datesearch1'];
												$query=mysqli_query($conn,"Select * FROM consomation_consom  join patient ON patient.id = consomation_consom.id join doctor_comments ON doctor_comments.patient_id = patient.id  where datecunsuption >='$datesearch' and datecunsuption <= '$datesearch1' GROUP BY patient.id ");


?>


<hr>
<h5 align="center"> <u>Consultation From <?php echo date("d-m-Y", strtotime($datesearch))?> &nbsp;&nbsp; To &nbsp;&nbsp;<?php echo date("d-m-Y", strtotime($datesearch1
))?></u></h5><br><br>
							<div class="col-md-12" >
													<table id="customers" style="width:70%;  margin-left: auto;margin-right: auto;border: 1px solid black;">
															
		<thead  >
																	<tr>
																	<th>No</th>
																	<th>Patient Name</th>
																	<th>Insurance Number</th>
																	<tH>Insurance</th>
																	<th>Gender</th>
																	<th>Age</th>	
																	<th>Diagnostic</th>
																	<th>Date</th>
																	</tr>
																</thead>														
																<tbody>
													<?php 
													
													if ($query->num_rows > 0) {
													while ($row=mysqli_fetch_array($query)) {
													 

													?>
													<tr> 
														<td><font color="black"><?php echo ++$i;?></td>
														<td><font color="black" ><?php echo $row['names'].'&nbsp;&nbsp;&nbsp;'.$row['lname'];?></td>
														<td><font color="black"><?php echo $row['affiliate_number'];?></td>
														<td><font color="black"><?php echo $row['insurance'];?></td>
														<td><font color="black"><?php echo $row['gender'];?></td>
														<td><font color="black"><?php echo $row['dob'];?></td>
														<td style ="width:2000px;"><font color="black" ><p align><?php echo $row['comment'];?></p></td>
														<td style ="width:2000px;"><font color="black" ><?php echo  date("d-m-Y", strtotime($row['datecunsuption']));?></td>
															</tr>
											
										

													<?php }
													}
													else{
													echo "No consulation";	
													}


													?>
													</tbody>
													</table>
													
								</div>
			</div>

     <hr>
			<div class="row"> 
			<div class="col-md-12">
					<div class="row"> 
			<div class="col-md-12">
					<ul class="pagination justify-content-center mb-4">
						<li class="page-item"><input name="print" type="button" value="Print" id="printButton" onClick="printpage()"></li>
						
					</ul>
				</div>
			</div>
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