
<?php
error_reporting(0);
    session_start();
    $role = $_SESSION['sess_userrole'];
    if((!$_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or ($role!="Pharmacist")){
      header('Location: logout');
	}

?><link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
   <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 

  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>



		<meta char-set="utf-8" http-equiv="content-type" content="text/html;">
		<title>Report about Health Center</title>
		<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}
window.onload=function(){
	altRows('alternatecolor');
}
</script>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
document.getElementById('export').style.visibility="hidden";

window.print();
}
</script>
<style type="text/css">
table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}
</style>
<style type="text/css" title="currentStyle">
			@import "media/css/themes/smoothness/jquery-ui-1.7.2.custom.css";
		</style>
	<script src="media/js/jquery-1.8.2.min.js"></script>
        <script src="media/js/jquery-ui.js" type="text/javascript"></script>
		<!DOCTYPE html>

<html lang="en">
<head>
		<meta char-set="utf-8" http-equiv="content-type" content="text/html;">
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
	 
       
<title><?php echo $user;?> -Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
  	<link rel="stylesheet" href="pressources/bootstrap.min.css">
	</head>
  
<?php
error_reporting(0);
include_once('connect_db.php');

?>
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
	
	</div>
<body id="dt_example">
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
 
    
						
			<div>
				<div class="css_center"><div id="tab">

			
		<form method="post" action="">
		<h4 align="center"><strong><i>STOCK OF MEDICINES ON &nbsp;&nbsp;&nbsp;&nbsp; <?php echo date('d') ?> <?php echo date('F') ?>,<?php echo date('Y') ?></i></strong><hr></hr></h4>
	<table cellpadding="10" id="example" cellspacing="5" border="0" class="altrowstable" align="center" style="width:50%;margin-left:auto;margin-right:auto;" >
			<tr>
			<th>No</th>
			<th align="left">Description</th>
			<th>Transit</th>
			<th>Fixed</th>
			<th>Stock</th>
			<th>Unit Price</th>
			<th>Total</th>
			</tr>

	

		<?php
$num=0;
$grandsum=0;
$result = ("SELECT product_name,request_qty,dist_quantity,unit_price,remain,qtity FROM prodicts WHERE qtity > 0  ORDER BY product_name"); 
$selectresult = mysqli_query($conn,$result);

while ($row = mysqli_fetch_assoc($selectresult))
{ 
$num=$num+1;
$tot=$row['unit_price']*$row['qtity'];
?>
					<tr>
						<td><?php echo $num;?></td>				
						<td><?php echo $row['product_name'];?></td>				
						<td><?php echo $row['request_qty'];?></td>				
						<td><?php echo $row['remain'];?></td>				
						<td><strong><?php echo number_format($row['qtity']);?></strong></td>				
						<td><?php echo $row['unit_price'];?></td>				
						<td><strong><?php echo number_format($tot,1);?></strong></td>				
					</tr>
					<?php 
					$total=$total+$tot;
					} 
;
?>	
<tr>
			<th colspan="6"><strong>Grand Total</strong></th>
			<th><strong><?php echo number_format($total,1);?></strong></th>
			</tr>
	
</table>
	</form>
			</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Create PDF" id="btPrint" onclick="createPDF()" />
				<hr></hr>
<h5 align="center">Designed and created by  Digital Star</a> </h5><br>
				</div>
				</div>
		</div>	
</div>		
	</body>
	<script>
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {border-collapse: separate;border-spacing: 0; color: #4a4a4d;font: 14px/1.4 'Helvetica Neue', Helvetica, Arial, sans-serif;}";
        style = style + "table, th, td {padding: 10px 15px; vertical-align: middle;border:1px solid black}";
        style = style + "table, thead{font-size: 8px; border:1px solid black}";
        style = style + "table, th:first-child{ border-top-left-radius: 5px;text-align: left;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=1000,width=1000');

        win.document.write('<html><head>');
        win.document.write('<title>Stock Medicines Print</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>
</html>
