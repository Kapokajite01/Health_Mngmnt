 <html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <?php
error_reporting(0);
session_start();
include_once('connect_db.php');
	$userid = $_SESSION['sess_user_id'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username'])  or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')){
		if(($role!="Receptionist") or ($role!="Mutuelle"))
		{
      header('Location: logout');
		}
	}
	
	$myuname=$_SESSION['sess_username'];
	$ROLE=$_SESSION['sess_userrole'];

?>
<html>
<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
   <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 

   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>
<head>
<title> Report</title>


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
    <!-- Load jQuery from Google's CDN -->
    <!-- Load jQuery UI CSS  -->
    <link rel="stylesheet" href="jquery-ui.css" />
    
    <!-- Load jQuery JS -->
    <script src="new 1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="jquery-ui.js"></script>
    
    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
    <script src="script.js"></script>
    
    <link rel="stylesheet" href="runnable.css" />
	
 
<body>
<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
<input type="button" id="printButton" onclick="tableToExcel('example', 'W3C Example Table')" value="Export To Excel">

<?php
$tm=0;
$result = ("SELECT patient.id as pid,patient.names,patient.lname,patient.carnet,patient.phtocopy,patient.transfert,patient.affectation,patient.insurance,patient.dob,patient.gender,patient.affiliate_number,patient.category,patient.sector,district,cell,
consomation.consid,consomation.consultatiobn,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,sum(consomation.upmedicamnet*consomation.qtymedicamnet) as totmedicament,
consomation.consommable,consomation.UPcons,consomation.Qcons,sum(consomation.UPcons*consomation.Qcons) as totconsommables,consomation.actemedicale,consomation.upacte,consomation.qtyacte,sum(consomation.upacte*consomation.qtyacte) AS totacte,
consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,sum(consomation.uphospitalizations*consomation.qtyhoapitalization) as tothospitalization,sum(consomation.upambullance*consomation.qtyambullance) as totambulance,
consomation.datecunsuption,consomation.user FROM consomation JOIN  patient ON consomation.id=patient.id  WHERE insurance='MUTUELLE' and   (district ='Kulu ' and (cell !='MUTONGO' and cell !='MURAMBI' and cell !='RUGARI')) and MONTH(datecunsuption)= MONTH(CURDATE())and YEAR(datecunsuption)= YEAR(CURDATE()) GROUP BY pid,datecunsuption ORDER BY datecunsuption ,consid ");

$resultdsplay = mysqli_query($conn, $result);

$previous = ''; 
$previous1 = '';
$previous2 = ''; 
$previous3 = ''; 
$previous4 = '';
$previous28 = ''; 
$previous38 = ''; 
$mypreviouscurrent = '';  
$sumconsult=0; 
$sumcarnet=0;
$sumphotocopy=0;
$sumtransfer=0;
$sumtest=0;
$sumpro_mat=0;
$sumother_cons=0;
$sumdrugs=0;
$sumtotala=0;
$sumcopeymt=0;
$suminsured=0;
?>	 <form method="POST" action="hors_zone1">

<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
         
      <table width="595" border="0" cellspacing="0" cellpadding="0">
       
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
       <strong>MINISTRY OF HEALTH</strong><br />
                  <strong>DD PROVINCE</strong><br />
                  <strong>Kulu DISTRICT</strong><br/>
				  <strong>Kulu HEALTH CENTER</strong>
              </div>
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  		
&nbsp;&nbsp;
 <hr></td>
        </tr>
        <tr>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="45"></td>HORS ZONE PATIENTS IN THE MONTH OF <strong><?php echo $month=date("F"); ?></strong></td>
                <td width="41"></td>
                <td width="116"><input type="text" name="datesearch" id="datesearch" placeholder="Start Date" required aria-required='true' aria-describedby='name-format'placeholder="Start Date" autocomplete="off"></td>
				<td width="41"><input type="text" name="datesearch1" id="datesearch1" placeholder="End Date" required aria-required='true' aria-describedby='name-format'placeholder="End Date" autocomplete="off"></td>
				<td width="41"><input type="submit" name="submit" value="Submit"></td>
</form>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td><table cellpadding="1" id="example" cellspacing="1" border="0" class="altrowstable">
              <tr>
			<th>No</th>
			<th>DATE </th>
			<th>BENEFICIARY'S NAMES</th>
			<th>AFFILLIATION NUMBER</th>
			<th>INSURANCE</th>
			<th>Sector</th>
			<th>Cell</th>
			<th>Family category</th>
			<th>COST FOR CONSUL TATION</th>
			<th>COST FOR LABO RATORY TEST</th>
			<th>COST FOR HOSPITA LIZATION</th>
			<th>COST FOR PROCIDURE AND MATERIALS</th>
			<th>COST FOR OTHER CONSU MABLES</th>
			<th>COST FOR AMBULL ANCE</th>
			<th>COST FOR DRUGS</th>
			<th>TOTAL AMOUNT 100%</th>
			<th>CO- PAYMENT</th>
			<th>INSURED</th>
			</tr>
			  
		<?php
	  	while($row = mysqli_fetch_assoc($resultdsplay)) {
$originalDate = $row['datecunsuption'];
$newDate = date("d/m/Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row['datecunsuption']));
$tot=($row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament']+$row['tothospitalization']+$row['totambulance']);
$parc=$row['parc_insurance'];
$sumconsult=$sumconsult+$row['consultatiobn'];
//$sumcarnet=$sumcarnet+$row['carnet'];
//$sumphotocopy=$sumphotocopy+$row['phtocopy'];
//$sumtransfer=$sumtransfer+$row['transfert'];
$sumcons = $sumcons + $row['consultatiobn'];
$sumtest= $sumtest+$row['totexamens'];
$sumpro_mat= $sumpro_mat+$row['totacte'];
$sumambullance = $sumambullance + $row['totambulance'];
$sumhosp = $sumhosp +$row['tothospitalization'];
$sumother_cons= $sumother_cons+$row['totconsommables'];
$sumdrugs= $sumdrugs+ $row['totmedicament'];
$sumtotala=$sumtotala+$tot;			
$ass=$row['insurance'];
$categ = $row['category'];
if($ass == 'MUTUELLE'){
$copeymt=200;
$insured= $tot-200;
}
if($ass == 'MUTUELLE' and $categ == 1){
$copeymt=0;
$insured= $tot-0;
}
if($ass == 'RAMA/RSSB'){
$copeymt=$tot*(0.15);
$insured= $tot*(0.85);
}
if($ass == 'MMI'){
$copeymt=$tot*(0.1);
$insured= $tot*(0.9);
}
if($ass == 'MEDIPLA'){
$copeymt=$tot*(0.15);
$insured= $tot*(0.85);
}
if($ass == 'MEDIPLA'){
$copeymt=$tot*(0.15);
$insured= $tot*(0.85);
}
if($ass == 'RADIANT'){
$copeymt=$tot*(0.15);
$insured= $tot*(0.85);
}
if($ass == 'NO INSURANCE'){
$copeymt=$tot*1;
$insured= 0;
}
$sumcopeymt= $sumcopeymt+$copeymt; 
$suminsured= $suminsured+$insured;
?>
			
				<tr>
				<td><?php 
							$tm=$tm+1;
						 echo $tm; ?></td>
						<td><?php echo $newDate;?></td>
						<td><?php echo $row['names'].'&nbsp;&nbsp;'.$row['lname'];?></td>
						<td style='mso-number-format:"\@"'><?php echo $row['affiliate_number'];?></td>
						<td><?php echo $row['insurance'];?></td>
						<td><?php echo $row['sector'];?></td>
						<td><?php echo $row['cell'];?></td>
						<td><?php echo $row['category'];?></td>
						<td><?php echo number_format((float)$row['consultatiobn'], 1);?></td>
						<td><?php echo number_format((float)$row['totexamens'], 1);?></td>
						<td><?php echo number_format((float)$row['tothospitalization'], 1);?></td>
						<td><?php echo number_format((float)$row['totacte'], 1);?></td>
						<td><?php echo number_format((float)$row['totconsommables'], 1);?></td>
						<td><?php echo number_format((float)$row['totambulance'], 1);?></td>
						<td><?php echo number_format((float)$row['totmedicament'], 1);?></td>
						<td><?php echo number_format((float)($tot), 2);?></td>
						<td><?php echo number_format((float)($copeymt), 2);$copeymt=0;?></td>
						<td><?php echo number_format((float)($insured), 2);?></td>

 
 </tr>
			  	
<?php 
} 
?>

			<th  colspan="8">TOTALS</th>
			<th><?php echo number_format((float)$sumcons, 2);?></th>
			<th><?php echo number_format((float)$sumtest, 2);?></th>
			<th><?php echo number_format((float)$sumhosp, 2);?></th>
			<th><?php echo number_format((float)$sumpro_mat, 2);?></th>
			<th><?php echo number_format((float)$sumother_cons, 2);?></th>
			<th><?php echo number_format((float)$sumambullance, 2);?></th>
			<th><?php echo number_format((float)$sumdrugs, 2);?></th>
			<th><?php echo number_format((float)$sumtotala, 2);?></th>
			<th><?php echo number_format((float)$sumcopeymt, 2);?></th>
			<th><?php echo number_format((float)$suminsured, 2);?></th>
			</tr>      
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
<script src="js3/jquery.min.js"></script>
    <script>
      function insertResults(json){
		$("#uname").val(json["username"]);
		$("#fname").val(json["first_name"]);
		$("#lname").val(json["last_name"]);

      }

      function clearForm(){
        $("#uname,#fname,#lname").val("");
      }

      function makeAjaxRequest(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajaxdrop.php",
          success: function(json) {
            insertResults(json);
          }
        });
      }

      $("#select").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearForm();
} else {
          makeAjaxRequest(id);
        }
      });

      function insertResults1(json){
        $("#uname").val(json["first_name"]);

      }

      function clearForm1(){
        $("#uname").val("");
      }

      function makeAjaxRequest1(placeId){
        $.ajax({
          type: "POST",
          data: { placeId: placeId },
          dataType: "json", 
          url: "process_ajaxdrop.php",
          success: function(json) {
            insertResults1(json);
          }
        });
      }

      $("#select2                            cd").on("change", function(){
        var id = $(this).val();
        if (id === "0"){
          clearForm1();
} else {
          makeAjaxRequest1(id);
        }
      });
	 
    </script>
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