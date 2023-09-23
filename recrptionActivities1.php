<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
   <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 
   <script type="text/javascript">
       $(function() {

               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()

               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()

       });

   </script>

<?php

error_reporting(0);

include_once('connect_db.php');



session_start();

    session_start();

    $role = $_SESSION['sess_userrole'];

	$name = $_SESSION['sess_name'];

	$lname = $_SESSION['sess_lname'];

	$tel = $_SESSION['sess_phone'];

  

    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or ($role!="Manager")){

      header('Location: logout');

	}

else{

	$sql=("INSERT INTO logs(id,name,lname,phone,action,time)

VALUES('','$name','$lname','$tel','Displayed Invoice Mutuelle',now())");

	}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"

"http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>

<title> Report</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<style type="text/css" media="print">

.hide{display:none}

</style>

<style type="text/css">

table.altrowstable {

	font-family: verdana,arial,sans-serif;

	font-size:11px;

	color:#333333;

	border-width: 1px;

	border-color: #a9c6c9;

	border-collapse: collapse;

	empty-cells: hide;

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
<style>
.custom-Patient_ID {
position: relative;
display: inline-block;
}
.custom-Patient_ID-toggle {
position: absolute;
top: 0;
bottom: 0;
margin-left: -1px;
padding: 0;
/* support: IE7 */
*height: 1.7em;
*top: 0.1em;
}
.custom-Patient_ID-input {
margin: 0;
padding: 0.3em;
}
</style>
<script type="text/javascript">

function printpage() {

document.getElementById('printButton').style.visibility="hidden";

document.getElementById('printButton1').style.visibility="hidden";



window.print();

document.getElementById('printButton').style.visibility="visible"; 

document.getElementById('printButton1').style.visibility="hidden";

 

}

</script>

<body>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;

<input name="print" type="button" value="Print" id="printButton1" onClick="printpage()">

<input type="button" id="printButton" onclick="tableToExcel('example', 'W3C Example Table')" value="Export To Excel">

<?php

$patientID = $_POST['Patient_ID'];
$startDate = $_POST['datesearch'];
$endDate = $_POST['datesearch1'];
if($patientID == 'All Receptionists'){
$result = ("SELECT affiliate_names,afilliate_lastname,receptionist,COUNT(receptionist) AS receivedP from patient WHERE date >='$startDate' AND date <='$endDate' GROUP BY receptionist");
}
else
{
$result = ("SELECT * from patient WHERE receptionist = '$patientID' AND  date >='$startDate' AND date <='$endDate'");

}
$resultselect = mysqli_query($conn, $result);

?>

<table width="95%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="center">

 

      <table width="595" border="0" cellspacing="0" cellpadding="0"  style="align:center;">

       

        <tr>

          <td height="30" align="center"><strong></strong></td>

        </tr>

        <tr>

          <td height="30" align="center">&nbsp;</td>

        </tr>

        <tr>

          <td align="right"></td>

        </tr>

        <tr>

          <td width="45">

		           <div align="left">

				   <table>

              <tr><td>  <strong>PROVINCE/:&nbsp;&nbsp;&nbsp;&nbsp;DD</strong></td></tr>

                <tr><td>  <strong>ADMINISTRATIVE  DISTRICT:&nbsp;&nbsp;&nbsp;&nbsp;Kulu</strong></td></tr>

                <tr><td>  <strong>ADMINISTRATIVE  SECTION:&nbsp;&nbsp;&nbsp;&nbsp;Kulu</strong></td></tr>

                <tr><td>  <strong>ADMINISTRATIVE  HEALTH FACILITY:&nbsp;&nbsp;&nbsp;&nbsp;Kulu</strong><br><br><br></td></tr>

        </tr>

        <tr>
<?php
	if ($resultselect->num_rows > 0) {
		
		?>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">

              <tr>


                <td colspan="10">Received Patients by <strong> <?php echo $patientID;?></strong>  From <strong><?php echo $startDate;?></strong> To <Strong><?php echo $endDate;?></strong></td>

                </tr>

          </table></td>

        </tr>

        <tr>

          <td width="45"><hr></td>

        </tr>

        <tr>

          <td><table cellpadding="" id="example" cellspacing="" border="0" class="altrowstable">
              <tr>
			<th>No</th>
			<th>NAMES</th>
			<th>No of Patients</th>
		<?php

			while ($row = mysqli_fetch_assoc($resultselect))
{
	$ij++;
		
	?>
				<tr>
				<td><?php 
						$tm=$tm+1;
						 echo $tm; ?></td>
		<td><?php  $receptionistID = $row['receptionist'];
		$selectID = "select first_name,last_name  FROM users WHERE id = '$receptionistID' LIMIT 1";
		$userSelect = mysqli_query($conn, $selectID);
			while ($rowuser = mysqli_fetch_assoc($userSelect))
			{
				echo $rowuser['first_name'].' '.$rowuser['last_name'];
			}
		
		;?></td>
		<td><?php echo $row['receivedP'];?></td>

						

              </tr>
<?php 

} 

?>


        </table>
		<?php
		
	}
	else{
		
		echo "No patient received";
		
	}
		
		
		?>
		
		
		
		</td>

        </tr>

        <tr>

          <td>&nbsp;</td>

        </tr>

        <tr>

          <td>&nbsp;</td>

        </tr>

    </table></td>

  </tr>

</table>

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

