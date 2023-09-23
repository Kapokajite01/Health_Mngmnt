<?php
$myusername=$_SESSION['sess_username'];


?>
<!DOCTYPE html>

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
<li class="v-sep"><a href="consultation" class="round button dark menu-user image-left"> <strong>&nbsp;&nbsp;&nbsp;<?php echo $myusername;?></strong></a>
</li>
		<li class="v-sep"><a href="" class="round button dark menu-user image-left"> <strong>Consultation  Report </strong></a>
<ul>
		<li class="v-sep"><a href="" class=" stock-tab" onClick=window.open("consultation_reception_completed","Ratting","width=1800,height=1800,scrollbars=yes,toolbar=0,status=0,"); value="MEDICINES"><strong>Consultation report </strong></a></li>
					</ul> 
				


				</li>

<li class="v-sep"><a href="" class="round button dark menu-user image-left"> <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Consultation  on [<?php echo  date("d-m-Y h:m");?>]</strong></a>
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
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
	</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
</body>

</html>
