<?php
error_reporting(0);
session_start();
include_once('connect_db.php');
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Receptionist"){
      header('Location: logout');
	}
$myusername=$_SESSION['sess_username'];
$postedesante = $_SESSION['sess_postdsante'];
?>
<html>


	
</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<?php
	include_once('mmenus.php');

	?>	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left"><strong>Logged in as &nbsp;&nbsp;&nbsp;<?php echo $myusername;?></strong></a>
					<ul>
					<li><a href="logout" class="round button dark menu-user image-left"><strong>Log out</strong></a></li>

					</ul> 
</li>
<li class="v-sep"><a href="" class="round button dark menu-user image-left"> <strong>Invoice </strong></a>

		<ul>
		<li class="v-sep"><a href="" class=" stock-tab" onClick=window.open("report_reception_print","Ratting","width=1800,height=1800,scrollbars=yes,toolbar=0,status=0,"); value="MEDICINES"><strong>Print </strong></a></li>
					</ul> 		


				</li>
		<li class="v-sep"><a href="" class="round button dark menu-user image-left"> <strong>Records Report </strong></a>
<ul>
		<li class="v-sep"><a href="" class=" stock-tab" onClick=window.open("report_reception_completed","Ratting","width=1800,height=1800,scrollbars=yes,toolbar=0,status=0,"); value="MEDICINES"><strong>Completed </strong></a></li>
					</ul> 
				


				</li>
				<li class="v-sep"><a href="" class="round button dark menu-user image-left"> <strong>New  </strong></a>
<ul>
		<li class="v-sep"><a href="m_reception"><strong>New Search </strong></a></li>
					</ul> 
				


				</li>

<li class="v-sep"><a href="" class="round button dark menu-user image-left"> <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Records on [<?php echo $postedesante?>]</strong></a>
<ul>
					</ul> 
				


				</li>				
		</li>
								
			</ul>	<fieldset style="float: right">
                                    <a href="logout" class="round button dark menu-logoff image-left" style="background-color: #cc0000">Log out</a>
				</fieldset>					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				

				<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="cssauto/style.css" />
<script type="text/javascript" src="jsauto/jquery.min.js"></script>
<script type="text/javascript" src="jsauto/script.js"></script>
</head>
<?php
if (isset($_POST['search'])) {

$ctry = $_POST['country_id'];	
$sqlresult = ("select  id, affiliate_number,names,lname,affiliate_names,afilliate_lastname,date,final from patient WHERE affiliate_number='$ctry' GROUP  BY affiliate_number,names,lname order by id");
$result = mysqli_query($conn, $sqlresult);
$result1 = mysqli_query($conn, $sqlresult);
$cehck = mysqli_fetch_array($result1);

      $checknumber = $cehck['affiliate_number'];
      $Insumber = $cehck['affiliate_number '];
      $firstname = $cehck['affiliate_names'];
      $lastname = $cehck['afilliate_lastname'];

if(!$checknumber){
	$affnumber = $_POST['country_id'];
		header("location:new_reception?sid=$affnumber");
}

?>

<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
 <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 
   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script> 
<body>
<p>
<h1>Head House Holder's Names: <STRONG><?php echo $firstname .'&nbsp;&nbsp;&nbsp;&nbsp;'.$lastname;?></STRONG></h1>
<h1>Affiliation Number: <sTRONG><?php echo $checknumber ;?></STRONG></h1>
<hr>


</p>

		    <div class="flex-container">

        <div class="column"><?PHP echo $Insumber;?>
				<h1><u><font color="white"size="5"><strong>Reception</strong></font></u></h1>

		<table align="left" style="width:50%;margin-left:0%;">

				<tr><th>No</th><th> Names</th><th>Last Reception</th><th>Action</th></tr>
				<tr><th><hr></th><th><hr></th><th><hr></th><th><hr></th></tr>
				<?php 
	
			while($rowval = mysqli_fetch_assoc($result)) {
			?>	
	<tr>
	<td><?php echo ++$iy;?></td>
		<td><STRONG><?php echo $rowval['names'].'&nbsp;&nbsp;&nbsp;'.$rowval['lname'];?></STRONG></td>
		<td><STRONG><?php echo $rowval['date'];?></STRONG></td>
	<td><a href = "reception1?affid=<?php echo urlencode($rowval['affiliate_number']); ?>&amp;patid=<?php echo urlencode($rowval['id']); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>">Select</a></td>
	</tr>
<?php
}


		
}	
?>
				<tr><td></td><td></td><td></td></tr>

	</table></div>

        <div class="column bg-alt"><table align="left" style="width:100%;margin-left:0%;">
				<h1><u><font color="white"size="5"><strong>Consultation</strong></font></u></h1>
				<tr><th>No</th><th> Names</th><th>Last Consultation</th><th>Action</th></tr>
				<tr><th><hr></th><th><hr></th><th><hr></th><th><hr></th></tr>
				<?php 
				
$consresult = ("select  id, affiliate_number,names,lname,affiliate_names,afilliate_lastname,date,final from patient JOIN consultation ON consultation.patient_id = patient.id WHERE affiliate_number = '$ctry' GROUP BY patient_id  ");
$consresult = mysqli_query($conn, $consresult);
	
			while($rowcons = mysqli_fetch_assoc($consresult)) {

	?>
	<tr>
	<td><?php echo ++$iii;?></td>
		<td><STRONG><?php echo $rowcons['names'].'&nbsp;&nbsp;&nbsp;'.$rowcons['lname'];?></STRONG></td>
		<td><STRONG><?php echo $rowcons['date'];?></STRONG></td>
	<td><a href = "distribution?affid=<?php echo urlencode($rowcons['affiliate_number']); ?>&amp;patid=<?php echo urlencode($rowcons['id']); ?>&amp;fname=<?php echo urlencode($rowcons['names']); ?>&amp;lastname=<?php echo urlencode($rowcons['lname']); ?>&amp;RECEDATE=<?php echo urlencode($rowcons['date']); ?>">Select</a></td>
	</tr>	
	
	<?PHP

}
		
	
?>

	</table></div>

    </div>
	<a href ="beneficiary_reception?newid=<?php echo $checknumber;?> "><strong><font size="4" color="black"> Add New Beneficiary</font></strong></a>
		</body>
<style>

.flex-container{
    width: 80%;
    min-height: 300px;
    margin: 0 auto;
    display: -webkit-flex; /* Safari */     
    display: flex; /* Standard syntax */
}
.flex-container .column{
    padding: 10px;
    background: #dbdfe5;
    -webkit-flex: 1; /* Safari */
    -ms-flex: 1; /* IE 10 */
    flex: 1; /* Standard syntax */
}
.flex-container .column.bg-alt{
    background: #b4bac0;
}
</style>				
</html>