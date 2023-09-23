<?php
$myusername=$_SESSION['sess_username'];
$userId = $_SESSION['sess_user_id'];

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
		<link rel="stylesheet" href="css/cmxform.css">
	<script src="js/lib/jquery.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.hotkeys-0.7.9.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>

	<script src="js/script.js"></script>  
        <script src="js/date_pic/jquery.date_input.js"></script>  
        <script src="lib/auto/js/jquery.autocomplete.js "></script>  
	 
	<style>
	.entry:not(:first-of-type)
{
    margin-top: 10px;
}

.glyphicon
{
    font-size: 12px;
}
	</style>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Medical Records</title>
	
	
       

</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<div id="top-bar">
		
					<div class="content-module-heading cf">
<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left"><strong>Logged in as </strong></a>
					<ul>
					<li><a href="logout" class="round button dark menu-user image-left"><strong>Log out</strong></a></li>

					</ul> 
</li>
<li class="v-sep"><a href="laboratory" class="round button dark menu-user image-left"> <strong>&nbsp;&nbsp;&nbsp;<?php echo $myusername;?></strong></a>
</li>
		<li class="v-sep"><a href="laboratory" class="round button dark menu-user image-left"> <strong>Laboratory  Report </strong></a>
<ul>
		<li class="v-sep"><a href="laboratory" class=" stock-tab" onClick=window.open("laboratory_report","Ratting","width=1200,height=1800,left=200,scrollbars=yes,toolbar=0,status=0,"); value="MEDICINES"><strong>Laboratory report </strong></a></li>
					</ul> 
				


				</li>

<li class="v-sep"><a href="laboratory" class="round button dark menu-user image-left"> <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Laboratory  on [<?php echo  date("d-m-Y h:m");?>]</strong></a>
<ul>
					</ul> 
				


				</li>				
		</li>
								
			</ul>	<fieldset style="float: right">
                                    <a href="logout" class="round button dark menu-logoff image-left" style="background-color: #cc0000">Log out</a>
				</fieldset>					</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->	<!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
		<!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
	</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
</body>

</html>
