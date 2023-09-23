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

?>
<body id="dt_example">
		<div id="container">
			<div class="full_width big">
				MINISTRY OF HEALTH<BR>
				KIGALI CITY<BR>
				GASABO DISTRICT<BR>
			</div>			
			<h4 align="center">TRACK OF CONSUMSABLE IN HEALTH CENTER &nbsp;&nbsp;&nbsp;&nbsp; <?php echo date('F') ?> <?php echo date('Y') ?></strong>	<hr></hr></h4>
						
		<form method="post" action="trackglobal1.php">
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<div id="demo">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<table cellpadding="10" cellspacing="5" border="0" class="altrowstable" align="center">
		
			<tr>
			<th>No</th>
			<th align="left">Consumable</th>
			<th>Purchase</th>
			<th>Unit Price</th>
			<th>Total Purchase</th>
			<th>Distribution</th>
			<th>Unit Price</th>
			<th>Tot Ditribution</th>
			<th>Stock</th>
			<th>Action</th>
			<th>Date</th>
			</tr>

	

		<?php
error_reporting(0);
$num=0;
//$sql="SELECT * FROM dates where status='sent' ORDER BY date_of_expiration;";
$result = ("SELECT idmvt,consomable_mvt.bying_price,consomable_mvt.qtytin,consomable_mvt.selling_price,consomable_mvt.qntity,consomable_mvt.new_qntity as qtymvt,consomable_mvt.movment,consomable_mvt.bdate,consommables.name_consommable FROM consomable_mvt JOIN  consommables ON consomable_mvt.id=consommables.id"); 
while ($row = mysqli_fetch_assoc($result))
{ 
$originalDate = $row['datecunsuption'];
$newDate = date("d-m-Y", strtotime($originalDate));
$num=$num+1;
?>
					<tr>

						<td><?php echo $num;?></td>
						<td><?php echo $row['name_consommable'];?></td>
						<td align="center"><?php
						$tumed1=$row['qtytin'];
						if(empty($tumed1)){
						echo '';
						}
						else{
						 echo $row['qtytin'];}?></td>
						<td align="center"><?php
						$tumed2=$row['bying_price'];
						if(empty($tumed2)){
						echo '';
						}
						else{
						 echo $row['bying_price'];}?></td>
						<td align="center"><?php 
						$tumed3=$row['qtytin']*$row['bying_price'];
							if(empty($tumed3)){
						echo '';
						}
						else{
						 echo'<strong>' . $tumed3.'</strong>';}?></td>
						<td align="center"><?php
						$tumed4=$row['qntity'];
						if(empty($tumed4)){
						echo '';
						}
						else{

						echo $tumed4;}?></td>
						<td align="center"><?php 
						$tumed5=$row['selling_price'];
						if(empty($tumed5)){
						echo '';
						}
						else{

						echo $tumed5;}?></td>
						<td align="center"><?php 
						$tumed6=$row['qntity']*$row['selling_price'];
						if(empty($tumed6)){
						echo '';
						}
						else{

						echo '<strong>'. $tumed6.'</strong>';}?></td>
						<td align="center"><?php echo '<strong>'.$row['qtymvt'].'</strong>';?></td>
						<td align="center"><?php echo $row['movment'];?></td>
						<td align="center"><?php echo $row['bdate'];?></td>
						
					</tr>
<?php 
} 
;
?>		

</table>
	</form>
				</div>
			</div>
						
			<div>
				<div class="css_center">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<h3 align="center">Designed and created by  Digital Star</a> &copy; 2015</h3><br>
				</div>
				</div>
		</div>		
	</body>
</html>
