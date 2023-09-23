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
   <script type="text/javascript">
       $(function() {
               $("#startdate").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#enddate").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });
   </script>

	</head>
<?php
error_reporting(0);

$query = "SELECT * from consommables order by name_consommable";
$num=0;
$grandsum=0;
$date=$_POST['datesearch'];
$date1=$_POST['datesearch1']; 
$newdate=date("d/m/Y", strtotime($date));
$newdate1=date("d/m/Y", strtotime($date1));
$consomable=$_POST['consomablevar'];
$result = ("SELECT consommables.name_consommable,consomable_mvt.origine,sum(consomable_mvt.qtytin) as totpurc,consomable_mvt.bying_price,(consomable_mvt.qtytin*consomable_mvt.bying_price)as totalpurchase,sum(consomable_mvt.qtyout) as totout,consomable_mvt.selling_price,sum(consomable_mvt.qtyout*consomable_mvt.selling_price) as totalsells,
consomable_mvt.movment,consomable_mvt.bdate FROM consomable_mvt JOIN consommables on consomable_mvt.id= consommables.id WHERE (consomable_mvt.movment='Purchase' or consomable_mvt.movment='OUT') and bdate>='$date'and bdate<='$date1' and name_consommable='$consomable'"); 

?>
<body id="dt_example">
		<div id="container">
			<div class="full_width big">
				 <strong>Kulu National Police</strong><br />
            <img src="images/rnp.jpg" height="50px" width="50px" style=" border-color:FFFFFF"/><br />
              <strong>Kacyiru Health Center</strong><br/>
			</div>	
<hr>				<form method="post" action="variation_consomable1.php">
			
		<h4 align="center">STOCK VARIATION &nbsp;&nbsp;&nbsp;&nbsp FROM &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $newdate ?>&nbsp;&nbsp;&nbsp;&nbsp;To&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $newdate1 ?>&nbsp;&nbsp;&nbsp;&nbsp;For&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $consomable ?></strong>
		</p>
			
			<hr></hr></h4>
						
		<form method="post" action="trackglobal1.php">
<table cellpadding="10" id="example" cellspacing="5" border="0" class="altrowstable" align="center">
		
			<tr>
			<th>No</th>
			<th align="left">Medicaments</th>
			<th>Origine</th>
			<th>Quantity</th>
			<th>Unit Price</th>
			<th>Quantity Out</th>
			<th>Selling Price</th>
			<th>Total Purchase</th>
			<th>Total Sells</th>
			<th>Date</th>
			</tr>

	

		<?php
error_reporting(0);
while ($row = mysqli_fetch_assoc($result))
{ 
$originalDate = $row['bdate'];
$newDate = date("d-m-Y", strtotime($originalDate));
$num=$num+1;
?>
					<tr>

						<td><?php echo $num;?></td>				
						<td><?php echo $row['name_consommable'];?></td>
						<td><?php 
						$myorig=$row['movment'];
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
						if($row['bying_price']==0){
							
							echo "";
						}
						else{
						echo $row['bying_price'];}?></td>
						<td><?php 
						if($row['totout']==0){
							echo "";
						}
						else{
						echo $row['totout'];}?></td>
						<td><?php 
						if($row['selling_price']==0){
							echo"";
						}
						else{
						echo $row['selling_price'];}?></td>
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
					<td><?php echo $newDate;?></td>						
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
