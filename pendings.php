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

  

      if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){

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

<script type="text/javascript">

function printpage() {

document.getElementById('printButton').style.visibility="hidden";

document.getElementById('printButton1').style.visibility="hidden";



window.print();

document.getElementById('printButton').style.visibility="visible"; 

document.getElementById('printButton1').style.visibility="hidden";

 

}

</script>
 <script type="text/javascript">
    function deleteConfirm(){
        var result = confirm("Do you really want to delete records?");
        if(result){
            return true;
        }else{
            return false;
        }
    }
	

</script>
<body>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;

<input name="print" type="button" value="Print" id="printButton1" onClick="printpage()">

<input type="button" id="printButton" onclick="tableToExcel('example', 'W3C Example Table')" value="Export To Excel">

<?php

$tm=0;

$month=date("m"); 



$result = ("select id,affiliate_number,names,lname,affiliate_names,afilliate_lastname,dob,status,date,insurance patient_id,consultation.time_reception  from patient JOIN consultation ON consultation.patient_id = patient.id ORDER BY consultation.time_reception");
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

                      </tr>

        <tr>

          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">

              <tr>

			  <form method="POST" action="pendings1"  onsubmit="return deleteConfirm();">

                <td width="45"></td>

                <td width="393"><strong>PENDING RECEPTIONS&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>

                <td width="41"><input type="text" name="datesearch" id="datesearch" placeholder="Start Date" required aria-required='true' aria-describedby='name-format'placeholder="Start Date" autocomplete="off"></td>

				<td></td>

                <td width="116"></td>

								<td></td>

                <td width="116"><input type="submit" name="submit" value="DELETE"></td>

				<td></td>

				<td></td>

				<td></td>

				<td></td>

				</form>

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
			<th>AFFILIATION NUMBER </th>
			<th> NAMES</th>
			<th>AGE</th>
			<th>STATUS</th>
			<th>DATE OF RECEPTION</th>
		<?php

			while ($row = mysqli_fetch_assoc($resultselect))
{
	$ij++;


$originalDate = $row['time_reception'];
$newDate = date("d/m/Y", strtotime($originalDate));
?>
				<tr>
				<td><?php 
						$tm=$tm+1;
						 echo $tm; ?></td>
						<td width="60px"><?php echo $row['affiliate_number'];?></td>
		<td><?php echo $row['names'].' '.$row['lname'];?></td>
						<td><?php echo $row['dob'];?></td>
						<td><?php echo $row['status'];?></td>
						<td><?php echo $newDate;?></td>


              </tr>
<?php 

} 

;

?>
        </table></td>

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

