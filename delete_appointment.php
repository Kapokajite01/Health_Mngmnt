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
$appintID = $_GET['appontId'];


if(isset($_POST['Deleteppointment'])){
	$testdelete = mysqli_query($conn,"DELETE FROM patient_reserv WHERE oatientReservID='".$appintID."'");
	if($testdelete){
	echo "<script>alert('Appointment record Deleted successfully...');</script>";
echo "<script>window.location='viewappointmentpending';</script>";
	}

}

?>
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
<html>
<style>
table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 45%;
  text-align: left;
  border-collapse: collapse;
  border-radius: 25px;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 13px;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #FFFFFF;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444;
}
table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}
table, th, td {
  border: 1px solid LightGreen;
}
</style>
</head>
<body>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php
	include_once('mmenus.php');

	?>	

		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
							<!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				

				<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Autocomplete using PHP/MySQL and jQuery</title>
<link rel="stylesheet" href="cssauto/style.css" />
<script type="text/javascript" src="jsauto/jquery.min.js"></script>
<script type="text/javascript" src="jsauto/script.js"></script>
</head>

<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
 <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 
   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script> 
 <div style="margin-left: 2%;margin-right: 2%;">


<div class="row" > 
		<div class="col-md-12" >
						<h1 class="card-header"><strong><font color="red">You are about to delete this appointment!!!!</font></strong></h1>
					<div class="card-body" style="width:55%;  margin-left: auto;margin-right: auto;">
						<form  action="" method="POST" onsubmit="return deleteConfirm();">
								
					</div>
		</div>  

</div>   
			<div class="row"> 
							<div class="col-md-12" >
							<INPUT Type="text" name="deleteID" value="<?php echo $appintID;?>" style="display:none">
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
																	</tr>
																</thead>
																<tbody>
													<?php 

													$query=mysqli_query($conn,"Select * FROM patient_reserv  WHERE oatientReservID = '$appintID'");
													while ($row=mysqli_fetch_array($query)) {
													 

													?>
													<tr> 
														<td><font color="black"  size = "2"><?php echo ++$i;?></td>
														<td><font color="black"  size = "2"><?php echo $row['patientID'];?></td>
														<td><font color="black"  size = "2"><?php echo $row['patientFname'].' '.$row['patientLname'];?></td>
														<td><font color="black"  size = "2"><?php echo $row['department'];?></td>
														<td><font color="black"  size = "2"><?php echo $row['dateAppointment'];?></td>
														<td><font color="black"  size = "2"><?php echo $row['timeAppointmennt'];?></td>
														<td><font color="black"  size = "2"><?php echo $row['doctorName'];	?></td>
														<td style="text-align:justify;"><font color="black"  size = "2"><?php echo $row['appointmentReason'];?></td>
															</tr>
											
										

													<?php } ?>
													</tr><tr>
													          <td colspan="8" align="center"><input type="submit" name="Deleteppointment"  value="D E L E T E" style="border-radius: 4px;font-size: 26px;background-color: red;"/></td>

													</tbody>
													</table>
								</div>
			</div>
									</form> 


     <hr>

	




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