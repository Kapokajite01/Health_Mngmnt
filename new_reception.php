<?php
error_reporting(0);
session_start();
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

   </script> <?php
   $newid = $_POST['country_id'];
   ?>
<body>
    
				<form method="POST" action="reception">
                <div class="label_div"><strong>Number :</strong> </div>
                <div class="input_container">
                    <strong><?PHP echo $newid;?></strong><input type="text" id="country_id" name="country_id" VALUE="<?PHP echo $newid;?>" autocomplete="off" required aria-required='true' aria-describedby='name-format' placeholder="Insurance Number" style="display:none">
                   &nbsp;&nbsp;&nbsp;&nbsp; <ul id="country_list_id"></ul><input type="submit" name="search" value="SEARCH"><input type="text" name ="date" id="datesearch" size="30" placeholder="Enter Date of Consumption"  required aria-required='true' aria-describedby='name-format'  autocomplete="off">
                </div></div><br><br>
				
</html>