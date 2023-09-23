<?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>



		<meta char-set="utf-8" http-equiv="content-type" content="text/html;">
		<link rel="shortcut icon" type="image/ico" href="http://www.sprymedia.co.uk/media/images/favicon.ico">
		
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
	</head>
<?php
error_reporting(0);

  $query = "SELECT * from prodicts order by product_name";

?>
<body id="dt_example">
		<div id="container">
			<div class="full_width big">
			 <strong>Kulu National Police</strong><br />
            <img src="images/rnp.jpg" height="50px" width="50px" style=" border-color:FFFFFF"/><br />
              <strong>Kacyiru Health Center</strong><br/>
			</div>	
<hr>				<form method="post" action="variation_medicine1.php">
	
			<h4 align="center">STOCK VARIATION OF MEDICINES IN HEALTH CENTER IN&nbsp;&nbsp;&nbsp;&nbsp; <?php echo date('F') ?> <?php echo date('Y') ?></strong></h4>
			
		<p align="center">
		<input type="text" name="datesearch" id="datesearch" placeholder="Start Date" required aria-required='true' aria-describedby='name-format'placeholder="Start Date">
		<input type="text" name="datesearch1" id="datesearch1" placeholder="End Date" required aria-required='true' aria-describedby='name-format'placeholder="End Date">
		<select name="medicinevar" id="medicinevar"  style=" width:200px; height: 25px " align="center" required aria-required='true' aria-describedby='name-format'>
	      <option value="">No Selection</option>

      <?php
 
  $result = ($query) or die('Query failed: ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option value="' . $row['product_name'] . '">' . $row['product_name'] . '</option>';
        }
      ?>
    </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="VARIATION"></p>
			
			<hr></hr>
				
<form>		
			<div id="demo">
<table cellpadding="10" id="example" cellspacing="5" border="0" class="altrowstable" align="center">
		
			<tr>
			<th>No</th>
			<th>Date</th>
			<th align="left">Medicaments</th>
			<th>Origine</th>
			<th>Quantity</th>
			<th>Unit Price</th>
			<th>Quantity Out</th>
			<th>Selling Price</th>
			<th>Total Purchase</th>
			<th>Total Sells</th>
			</tr>

	

		<?php
error_reporting(0);
$num=0;
$grandsum=0;
$result = ("SELECT prodicts.	product_name,medicine_mvt.origine,sum(medicine_mvt.quantity) as totpurc,(medicine_mvt.quantity*medicine_mvt.buying_price)as totalpurchase, medicine_mvt.buying_price,sum(medicine_mvt.quantityout) as totout,medicine_mvt.quantityout,medicine_mvt.sellingprice,sum(medicine_mvt.quantityout*medicine_mvt.sellingprice) as totalsells,
medicine_mvt.action,medicine_mvt.bdate FROM medicine_mvt JOIN prodicts on medicine_mvt.id= prodicts.id WHERE (medicine_mvt.action='Purchase' or medicine_mvt.action='OUT') and MONTH(bdate)= MONTH(CURDATE()) GROUP BY bdate Desc ,product_name ORDER BY bdate, action,product_name"); 
while ($row = mysqli_fetch_assoc($result))
{ 
$originalDate = $row['bdate'];
$newDate = date("d-m-Y", strtotime($originalDate));
$num=$num+1;
?>
					<tr>

						<td><?php echo $num;?></td>	
					<td><?php echo $newDate;?></td>						
					<td><?php echo $row['product_name'];?></td>
						<td><?php 
						$myorig=$row['action'];
						if($myorig=='OUT'){							
							echo "STOCK";
						}
						else{						
						echo $row['origine'];
						}
						?></td>
						<td><?php
						if($row['totpurc']==0){
							echo "";
						}
						else{
						echo $row['totpurc'];}?></td>
						<td><?php 
						if($row['buying_price']==0){
							
							echo "";
						}
						else{
						echo $row['buying_price'];}?></td>
						<td><?php 
						if($row['totout']==0){
							echo "";
						}
						else{
						echo $row['totout'];}?></td>
						<td><?php 
						if($row['sellingprice']==0){
							echo"";
						}
						else{
						echo $row['sellingprice'];}?></td>
						<th><?php 
						if(number_format((float)$row['totalpurchase']==0.00)){
						echo "";	
							
						} else{
						
						echo number_format((float)$row['totalpurchase'], 2);}?></th>
						<th><?php
							if(number_format((float)$row['totalsells']==0.00)){
								
								echo"";
							}
							else{

							echo number_format((float)$row['totalsells'], 2);}?></th>
					</tr>
					<?php 
					$grandsum = $grandsum + $row['totalpurchase'];
} 
;
?>		
<tr><th></th> <th><th></th><th></th><th></th><th></th><th>Grand Totals</th> <th><?php echo number_format((float)$grandsum,2);?></th> <th>
<?php echo number_format((float)$grandsum,2);?></th><th></th></tr>
</table>
	</form>
				</div>
			</div>
						
			<div>
				<div class="css_center">
				<hr></hr>
<h5 align="center">Designed and created by  Digital Star</a> </h5><br>
				</div>
				</div>
		</div>		
	</body>
<script>
var tableToExcel = (function() {
var uri = 'data:application/vnd.ms-excel;base64,'
, template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
return function(table, name) {
if (!table.nodeType) table = document.getElementById(table)
var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
window.location.href = uri + base64(format(template, ctx))
}
})()
</script>
</html>
