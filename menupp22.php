
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Medical Records</title>
	
<script>	
  function popup01o(url) 
{
 var width  = 850;
 var height = 500;
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
// -->
</script>    	
       

</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left"><strong>Logged in as &nbsp;&nbsp;[<?php echo $_SESSION['sess_userrole'];?>]</strong></a>
					<ul>
					<li><a href="logout" class="round button dark menu-user image-left"><strong>Log out</strong></a></li>

					</ul> 

				</li><li class="v-sep"><a href="#" class="round button dark menu-user image-left"><strong><?php echo $_SESSION['sess_name'].'&nbsp;&nbsp;'. $_SESSION['sess_lname'];?></strong></a>

				</li>
				
		</li><li class="v-sep"><a href="#" class="round button dark menu-user image-left"><strong>Stock</strong></a>
		
					<ul>
			  <li class="v-sep"><a href="javascript: void(0)"class=" stock-tab"onclick="popup01('situation_medicine')"><strong>Stock Medicine</strong></a></li>
			  <li class="v-sep"><a href="javascript: void(0)"class=" stock-tab"onclick="popup01('situation_consumable')"><strong>Stock Consumables</strong></a></li>
			  <li class="v-sep"><a href="javascript: void(0)"class=" stock-tab"onclick="popup01('situation_consumable')"><strong>All</strong></a></li>
					</ul> 

				</li>
			<li class="v-sep"><a href="#" class="round button dark menu-user image-left"><strong>Purchases</strong></a>
					<ul>
			  <li class="v-sep"><a href="javascript: void(0)"class=" stock-tab"onclick="popup01('situation_medicine')"><strong>Medicines Purchases</strong></a></li>
			  <li class="v-sep"><a href="javascript: void(0)"class=" stock-tab"onclick="popup01('situation_medicine')"><strong>Consumables Purchases</strong></a></li>

					</ul> 

				</li>	
			<li class="v-sep"><a href="#" class="round button dark menu-user image-left"><strong>Distribution</strong></a>
					<ul>
			  <li class="v-sep"><a href="javascript: void(0)"class=" stock-tab"onclick="popup01('situation_medicine')"><strong>Medicines Variation</strong></a></li>
			  <li class="v-sep"><a href="javascript: void(0)"class=" stock-tab"onclick="popup01('situation_medicine')"><strong>Consumables Variation</strong></a></li>
			  <li class="v-sep"><a href="javascript: void(0)"class=" stock-tab"onclick="popup01('situation_medicine')"><strong>Medicines & Consumables </strong></a></li>

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
				
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
	</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
		<!-- MAIN CONTENT -->
		
		<div class="page-full-width cf">

		<ul id="tabs" class="fl">
				
				<li><a href="pharmacy" class=" stock-tab" ><strong>Pharmacy Dashbord</strong></a></li>
				<li><a href="pharmacy" class="active-tab dashboard-tab">Manage Stock</a></li>
		</ul> <!-- end tabs -->
		<div class="content-module">				

						<div class="content-module-main cf">


</div>
<div class="side-menu fl">
				
				<ul>
					<li><button class="dropdown-item" >
                              <a href="javascript: void(0)"  style="text-decoration: none;" onclick="popup01o('newOrder')"><strong>New Order</strong></a>
					</li>
					<li><a href="Purchasemedicine"><strong>New  Purchase Mdicine</a></li>
					<li><a href="purchaseconsumable">New  Purchase Consumable</a></li>
					<li><a href="situation_medicine">Stock Medicines</a></li>
					<li><a href="purchaseconsumable">Stock  Consumables</a></li>
					<li><a href="purchaseconsumable">Transit Stock Medicines</a></li>
					<li><a href="purchaseconsumable">Transit Stock  Consumables</a></li>
					<li><a href="purchaseconsumable">Edit Medicine Price</a></li>
					<li><a href="purchaseconsumable">Edit Consumable Price</a></li></strong>
				</ul>
                                
                                 
			</div>
	
</body>

</html>
<script>
function popup01(url) 
{
 var width  = 850;
 var height = 1500;
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
// -->
</script>
</script>
