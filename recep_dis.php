<?php
error_reporting(0);
session_start();
include_once('connect_db.php');
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Receptionist"){
      header('Location: logout');
    include_once('connect_db.php');
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
<li class="v-sep"><a href="" class="round button dark menu-user image-left"> <strong>New  </strong></a>
<ul>
		<li class="v-sep"><a href="m_reception"><strong>New Search </strong></a></li>
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
								
			</ul>	<fieldset style="float: right">
                                    <a href="logout" class="round button dark menu-logoff image-left" style="background-color: #cc0000">Log out</a>
				</fieldset>					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				

				<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Autocomplete using PHP/MySQL and jQuery</title>
<link rel="stylesheet" href="cssauto/style.css" />
<script type="text/javascript" src="jsauto/jquery.min.js"></script>
<script type="text/javascript" src="jsauto/script.js"></script>
</head>
<?php

$affid = $_GET['patid'];
$nme= $_GET['fname'];
$lname = $_GET['lastname'];	

$checkrec = ("SELECT affiliate_number,names,lname,id,date FROM  patient   where id ='$affid'");
$resultcheckrec = mysqli_query($conn, $checkrec);
while ($rowval = mysqli_fetch_assoc($resultcheckrec)) {
	/*$p_id = $rowval['pid'];
	$paconsid = $rowval['pastconsid'];
    $_SESSION['number'] = $rowval['affiliate_number'];*/
   $insid = $rowval['affiliate_number'];
   $fname = $rowval['names'];
   $lname = $rowval['lname'];
 $dt= $rowval['date'];
$nid = $rowval['id'];

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
    
				<form method="POST" action="distribution">
                <div class="input_container">
				<table border = "1" align="center">
				<tr><th><strong>Head House Holder's Number</th><th><strong><i><?php echo $insid;?></i></th></tr>
				<tr><th><strong>Names </th><th><strong><i><?php echo $fname .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$lname;?></i></th></tr>
				<tr><th><strong>Last Treatement</th><th><strong><i><?php echo $dt;?></i></th></tr></table>
				<input type="text" id="patientid" name="patientid" value ="<?php echo $nid;?>" style="display:none" required><input type="text" id="lastdatecons" name="lastdatecons" value ="<?php echo $dt;?>"  style="display:none">
                    <input type="text" id="country_id" name="country_id" value ="<?php echo $affid;?>" autocomplete="off" required aria-required='true' aria-describedby='name-format' placeholder="Search Insurance Number"  style="display:none">
                   &nbsp;&nbsp;&nbsp;&nbsp; <ul id="country_list_id"></ul><input type="submit" name="search" value="SEARCH"><input type="text" name ="date" id="datesearch" size="30" placeholder="Enter Date " required aria-required='true' aria-describedby='name-format' autocomplete="off">
                </div></div><br><br>
				
</html>