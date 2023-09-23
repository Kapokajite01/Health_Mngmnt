
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
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left"><strong>Logged in as &nbsp;&nbsp;&nbsp;<?php echo $myusername;?></strong></a>
					<ul>
					<li><a href="logout" class="round button dark menu-user image-left"><strong>Log out</strong></a></li>

					</ul> 
</li><li class="v-sep"><a href="#" class="round button dark menu-user image-left"><strong>New</strong></a>
					<ul>
		<li class="v-sep"><a href="reception" class=" stock-tab" ><strong>Patient</strong></a></li>
					</ul> 

				</li>
		<li class="v-sep"><a href="" class="round button dark menu-user image-left"> <strong>Records Report </strong></a>
<ul>
		<li class="v-sep"><a href="" class=" stock-tab" onClick=window.open("report_reception_completed","Ratting","width=1800,height=1800,scrollbars=yes,toolbar=0,status=0,"); value="MEDICINES"><strong>Completed </strong></a></li>
					</ul> 
				


				</li>						
		</li><li class="v-sep"><a href="#" class="round button dark menu-user image-left"><strong>Stock</strong></a>
					<ul>
		<li class="v-sep"><a href="" class=" stock-tab" onClick=window.open("situation_medicine","Ratting","width=1800,height=1800,scrollbars=yes,toolbar=0,status=0,"); value="MEDICINES"><strong>Stock Medicine</strong></a></li>
				<li class="v-sep"><a href="" class=" stock-tab" onClick=window.open("situation_consumable","Ratting","width=1500,height=1000,left=150,top=150,scrollbars=yes,toolbar=0,status=0,"); value="MEDICINES"><strong>Stock Consumable</strong></a></li>
					</ul> 

				</li>
								
			</ul> <!-- end nav -->

					
			<form action="#" method="POST" id="search-form" class="fr">
				<fieldset>
                                    <a href="logout" class="round button dark menu-logoff image-left" style="background-color: #cc0000">Log out</a>
				</fieldset>
			</form>
		</div> <!-- end full-width -->	
	
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
