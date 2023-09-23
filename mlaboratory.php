<?php
error_reporting(0);
session_start();
include_once('connect_db.php');
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Laboratory"){
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
		<li class="v-sep"><a href="" class="round button dark menu-user image-left"> <strong>Records Report </strong></a>
<ul>
		<li class="v-sep"><a href="" class=" stock-tab" onClick=window.open("report_reception_completed","Ratting","width=1800,height=1800,scrollbars=yes,toolbar=0,status=0,"); value="MEDICINES"><strong>Completed </strong></a></li>
					</ul> 
				


				</li>

<li class="v-sep"><a href="" class="round button dark menu-user image-left"> <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Records on [<?php echo $postedesante?>]</strong></a>
<ul>
					</ul> 
				


				</li>				
		</li>
								
			</ul>				</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				

				<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Autocomplete using PHP/MySQL and jQuery</title>
<link rel="stylesheet" href="cssauto/style.css" />
<script type="text/javascript" src="jsauto/jquery.min.js"></script>
<script type="text/javascript" src="jsauto/script.js"></script>
</head>
<?php
$sqlcheck = ("select affiliate_number,affiliate_names,afilliate_lastname from patient where affiliate_number ='$_POST[country_id]' LIMIT 1");
$resultcheck = mysqli_query($conn, $sqlcheck);

while ($cehck = mysqli_fetch_assoc($resultcheck)) {
      $checknumber = $cehck['affiliate_number'];
      $Insumber = $cehck['affiliate_number '];
      $firstname = $cehck['affiliate_names'];
      $lastname = $cehck['afilliate_lastname'];
}

if (isset($_POST['search'])) {

$ctry = $_POST['country_id'];	
$sqlresult = ("select id,affiliate_number,names,lname,affiliate_names,afilliate_lastname,dob,date from patient where affiliate_number ='$_POST[country_id]'  and final != 'Invoiced' GROUP  BY affiliate_number,names,lname");
$result = mysqli_query($conn, $sqlresult);

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
    <table align="left" style="width:50%;margin-left:25%;">

				<form method="POST" action="reception1">
				<tr><th>No</th><th>Affiliation Number</th><th>Beneficiary Names</th><th>Age</th><th>Date of Consultation</th><th></th></tr>
				<?php 
	
			while($rowval = mysqli_fetch_assoc($result)) {

			?>	
	<tr>
	<td><?php echo ++$i;?>&nbsp;&nbsp;&nbsp;</td>
	<td><?php echo $rowval['affiliate_number'];?></td>
	<td><?php echo $rowval['names'].'&nbsp;&nbsp;&nbsp;'.$rowval['lname'];?></td>
	<td><?php echo $rowval['dob'];?></td>
	<td><?php echo $rowval['date'];?></td>
	<td><a href = "laboratory1?affid=<?php echo urlencode($rowval['id']); ?>&amp;fname=<?php echo urlencode($rowval['names']); ?>&amp;lastname=<?php echo urlencode($rowval['lname']); ?>">Select</a></td>
	</tr>
<?php
}
echo "<tr><th></th><th></th><th></th><th></th><th></th><th></th></tr>";		
}	
?>

	</table>			</form>
				
</html>