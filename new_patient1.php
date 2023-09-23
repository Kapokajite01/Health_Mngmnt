 <html>
  <head>
  <?php
error_reporting(0);
session_start();
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Manager"){
      header('Location: logout');
	}
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
window.print();
document.getElementById('printButton').style.visibility="visible";  
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
	
  <?php
error_reporting(0);

 $query = "SELECT * from users";
  $newresult = ($query) or die('Query failed: ' . mysql_error());
?>
<body>
<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
<?php
$tm=0;
$today = date("Y-m-d");
$result = ("SELECT patient.id as pid,patient.names,patient.lname,patient.carnet,patient.phtocopy,patient.transfert,patient.affectation,patient.insurance,patient.dob,patient.gender,patient.affiliate_number,consomation.consid,consomation.consultatiobn,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,sum(consomation.upmedicamnet*consomation.qtymedicamnet) as totmedicament,consomation.consommable,consomation.UPcons,consomation.Qcons,sum(consomation.UPcons*consomation.Qcons) as totconsommables,consomation.actemedicale,consomation.upacte,consomation.qtyacte,sum(consomation.upacte*consomation.qtyacte) AS totacte,consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,consomation.datecunsuption FROM consomation JOIN  patient ON consomation.id=patient.id WHERE datecunsuption='$today' GROUP BY pid,datecunsuption ORDER BY datecunsuption DESC,consid DESC");
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
?>	 <form method="POST" action="records1">

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
      <!--  <strong>Kulu National Police</strong><br />-->
                  <!--<img src="images/rnp.jpg" height="50px" width="50px" border="2" style=" border-color:FFFFFF"/><br />-->
             <!--     <strong>Kacyiru Health Center</strong><br/>-->
              </div>
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  		
<?php
    $query1 = "SELECT * from users";
  $result1 = ($query1) or die('Query failed: ' . mysql_error());
?>

 <select id="select">
      <option value="0">Please select</option>
      <?php
        while ($row1 = mysql_fetch_assoc($result1)) {
            echo '<option value="' . $row1['id'] . '">' . $row1['first_name'] . '</option>';
        }
      ?>

    </select><strong>NAME   &nbsp;&nbsp;<input id="name" name="name" class="element text large" type="text" style="border: 0px" size="35" required aria-required="true" aria-describedby="name-format">
 <hr></td>
        </tr>
        <tr>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="45"></td>
                <td width="393"><strong>All RECORDS FOR:&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $today; ?> </strong></td>
                <td width="41"><input type="text" name="datesearch" id="datesearch" required aria-required='true' aria-describedby='name-format' placeholder="Start Date" /></td>
                <td width="116"><input type="submit" name="submit" value="display"></td>
				</form>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td><table cellpadding="1" cellspacing="1" border="0" class="altrowstable">
              <tr>
			<th>No</th>
			<th>DATE </th>
			<th>BENEFICIARY'S NAMES</th>
			<th>AFFILLIATION NUMBER</th>
			<th>INSURANCE</th>
			<th>COST FOR CONSULT</th>
			<th>COST FOR PROCIDURE AND MATERIALS</th>
			<th>COST FOR OTHER CONSUMABLES</th>
			<th>COST FOR DRUGS</th>
			<th>TOTAL AMOUNT 100%</th>
			<th>COPAYMENT</th>
			<th>INSURED</th>
			</tr>
			  
		<?php
			while ($row = mysqli_fetch_assoc($result))
{
$originalDate = $row['datecunsuption'];
$newDate = date("d/m/Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row['datecunsuption']));
$tot=($row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament']);
$parc=$row['parc_insurance'];
$sumconsult=$sumconsult+$row['consultatiobn'];
$sumcarnet=$sumcarnet+$row['carnet'];
$sumphotocopy=$sumphotocopy+$row['phtocopy'];
$sumtransfer=$sumtransfer+$row['transfert'];
$sumtest= $sumtest+$row['totexamens'];
$sumpro_mat= $sumpro_mat+$row['totacte'];
$sumother_cons= $sumother_cons+$row['totconsommables'];
$sumdrugs= $sumdrugs+ $row['totmedicament'];
$sumtotala=$sumtotala+$tot;			
$ass=$row['insurance'];
if($ass == 'MUTUELLE'){
$copeymt=200;
$insured= $tot-200;
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
						<td width="60px"><?php echo $row['affiliate_number'];?></td>
						<td><?php echo $row['insurance'];?></td>
						<td><?php echo number_format((float)$row['totexamens'], 1);?></td>
						<td><?php echo number_format((float)$row['totacte'], 1);?></td>
						<td><?php echo number_format((float)$row['totconsommables'], 1);?></td>
						<td><?php echo number_format((float)$row['totmedicament'], 1);?></td>
						<td><?php echo number_format((float)($tot), 2);?></td>
						<td><?php echo number_format((float)($copeymt), 2);	
						$copeymt=0;?></td>
						<td><?php echo number_format((float)($insured), 2);?></td>
 
 </tr>
			  	
<?php 
} 
;
?>
              <tr>
			<th></th>
			<th> </th>
			<th></th>
			<th></th>
			<th>TOTALS</th>
			<th><?php echo number_format((float)$sumtest, 2);?></th>
			<th><?php echo number_format((float)$sumpro_mat, 2);?></th>
			<th><?php echo number_format((float)$sumother_cons, 2);?></th>
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
		$("#name").val(json["first_name"]);

      }

      function clearForm(){
        $("#name").val("");
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
        $("#name").val(json["first_name"]);

      }

      function clearForm1(){
        $("#name").val("");
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
