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

?>
<style>
#submit {
 color: #000000;
 font-size: 35;
 width: 135px;
 height: 60px;
 border: none;
 margin: 0;
 padding: 0;

}
</style>

<script type="text/javascript" src="jspopup/jquery.min.js"></script>
<script type="text/javascript" src="jspopup/jquery-ui.min.js"></script>
<link type="text/css" href="jspopup/jquery-ui.css" rel="stylesheet" />

<style type="text/css">
        .textbox
        {
            height: 20px;
            width: 142px;
        }
    </style>

<style type="text/css">
        .textbox
        {
            height: 20px;
            width: 142px;
        }
    </style>
    <title>Star Records System</title>
    <script type="text/javascript" language="javascript">
        function addRow()
        {
            var tbl = document.getElementById('tblRGA');
            var lastRow = tbl.rows.length;
            var iteration = lastRow;
            var row = tbl.insertRow(lastRow);

            //Medicament
            var cellPO = row.insertCell(0);
            var el = document.createElement('input');
            el.type = 'text';
            el.name = 'txtPO' + iteration;
            el.id = 'txtPO' + iteration;
            el.className = 'textbox';
            el.runat = 'server';
            cellPO.appendChild(el);          

            //qtyMedicament
            var cellMfrInv = row.insertCell(1);
            var el = document.createElement('input');
            el.type = 'text';
            el.name = 'txtMfrInv' + iteration;
            el.id = 'txtMfrInv' + iteration;
            el.className = 'textbox';
            el.runat = 'server';
            cellMfrInv.appendChild(el);

            //UnitpriceMedicamnet
            var cellQty = row.insertCell(2);
            var el = document.createElement('input');
            el.type = 'text';
            el.name = 'txtQty' + iteration;
            el.id = 'txtQty' + iteration;
            el.className = 'textbox';
            el.runat = 'server';
            cellQty.appendChild(el);          

        }
    </script>
<!--from   w  ww .j ava  2 s .c  o  m-->
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
<script>
(function( $ ) {
$.widget( "custom.Patient_ID", {
_create: function() {
this.wrapper = $( "<span>" )
.addClass( "custom-Patient_ID" )
.insertAfter( this.element );

this.element.hide();
this._createAutocomplete();
this._createShowAllButton();
},

_createAutocomplete: function() {
var selected = this.element.children( ":selected" ),
value = selected.val() ? selected.text() : "";

this.input = $( "<input>" )
.appendTo( this.wrapper )
.val( value )
.attr( "title", "" )
.addClass( "custom-Patient_ID-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
.autocomplete({
delay: 0,
minLength: 0,
source: $.proxy( this, "_source" )
})
.tooltip({
tooltipClass: "ui-state-highlight"
});

this._on( this.input, {
autocompleteselect: function( event, ui ) {
ui.item.option.selected = true;
this._trigger( "select", event, {
item: ui.item.option
});
},

autocompletechange: "_removeIfInvalid"
});
},

_createShowAllButton: function() {
var input = this.input,
wasOpen = false;

$( "<a>" )
.attr( "tabIndex", -1 )
.attr( "title", "Show All Items" )
.tooltip()
.appendTo( this.wrapper )
.button({
icons: {
primary: "ui-icon-triangle-1-s"
},
text: false
})
.removeClass( "ui-corner-all" )
.addClass( "custom-Patient_ID-toggle ui-corner-right" )
.mousedown(function() {
wasOpen = input.autocomplete( "widget" ).is( ":visible" );
})
.click(function() {
input.focus();

// Close if already visible
if ( wasOpen ) {
return;
}

// Pass empty string as value to search for, displaying all results
input.autocomplete( "search", "" );
});
},

_source: function( request, response ) {
var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
response( this.element.children( "option" ).map(function() {
var text = $( this ).text();
if ( this.value && ( !request.term || matcher.test(text) ) )
return {
label: text,
value: text,
option: this
};
}) );
},

_removeIfInvalid: function( event, ui ) {

// Selected an item, nothing to do
if ( ui.item ) {
return;
}

// Search for a match (case-insensitive)
var value = this.input.val(),
valueLowerCase = value.toLowerCase(),
valid = false;
this.element.children( "option" ).each(function() {
if ( $( this ).text().toLowerCase() === valueLowerCase ) {
this.selected = valid = true;
return false;
}
});

// Found a match, nothing to do
if ( valid ) {
return;
}

// Remove invalid value
this.input
.val( "" )
.attr( "title", value + " didn't match any item" )
.tooltip( "open" );
this.element.val( "" );
this._delay(function() {
this.input.tooltip( "close" ).attr( "title", "" );
}, 2500 );
this.input.data( "ui-autocomplete" ).term = "";
},

_destroy: function() {
this.wrapper.remove();
this.element.show();
}
});
})( jQuery );

$(function() {
$( "#Patient_ID" ).Patient_ID();
$( "#toggle" ).click(function() {
$( "#Patient_ID" ).toggle();
});
});
</script>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->

	<!-- jQuery & JS files -->
       

<body>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
<input name="print" type="button" value="Print" id="printButton1" onClick="printpage()">
<input type="button" id="printButton" onclick="tableToExcel('example', 'W3C Example Table')" value="Export To Excel">
<?php
$tm=0;
$month=date("m"); 
$result = ("SELECT patient.id as pid,patient.pagenumber as pn,patient.names,patient.afilliate_lastname,patient.lname,patient.affiliate_names,patient.familycode,patient.affectation,patient.insurance,patient.dob,patient.category,patient.gender,
patient.affiliate_number AS afnumber,patient.null_tm,consomation.consid,consomation.consultatiobn,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,sum(consomation.upmedicamnet*consomation.qtymedicamnet) 
as totmedicament,consomation.consommable,consomation.UPcons,consomation.Qcons,sum(consomation.UPcons*consomation.Qcons) as totconsommables,consomation.actemedicale,consomation.upacte,consomation.qtyacte,sum(consomation.upacte*consomation.qtyacte) AS totacte,
consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,consomation.hospitalization,consomation.uphospitalizations,consomation.qtyhoapitalization,
sum(consomation.uphospitalizations*consomation.qtyhoapitalization)AS tot_hosp,consomation.datecunsuption,consomation.ambullance,consomation.upambullance,consomation.qtyambullance,sum(consomation.upambullance*consomation.qtyambullance) AS amtambul,consomation.comments  
FROM consomation JOIN  patient ON consomation.id=patient.id where medicament !='' AND MONTH(datecunsuption)= MONTH(CURDATE())  GROUP BY afnumber,datecunsuption ORDER BY datecunsuption DESC,consid DESC");
$resultselect = mysqli_query($conn, $result);

/*
$result1 = ("SELECT patient.id as pid,patient.pagenumber as pn,patient.names,patient.afilliate_lastname,patient.lname,patient.affiliate_names,patient.familycode,patient.affectation,patient.insurance,patient.dob,patient.category,patient.gender,
patient.affiliate_number AS afnumber,patient.null_tm,consomation.consid,consomation.consultatiobn,consomation.medicament,consomation.upmedicamnet,consomation.qtymedicamnet,sum(consomation.upmedicamnet*consomation.qtymedicamnet) 
as totmedicament,consomation.consommable,consomation.UPcons,consomation.Qcons,sum(consomation.UPcons*consomation.Qcons) as totconsommables,consomation.actemedicale,consomation.upacte,consomation.qtyacte,sum(consomation.upacte*consomation.qtyacte) AS totacte,
consomation.examenmedicale,consomation.upexamen,consomation.qtyexamen,sum(consomation.qtyexamen*consomation.upexamen) as totexamens,consomation.hospitalization,consomation.uphospitalizations,consomation.qtyhoapitalization,
sum(consomation.uphospitalizations*consomation.qtyhoapitalization)AS tot_hosp,consomation.datecunsuption,consomation.ambullance,consomation.upambullance,consomation.qtyambullance,sum(consomation.upambullance*consomation.qtyambullance) AS amtambul,consomation.comments  
FROM consomation JOIN  patient ON consomation.id=patient.id where insurance='MUTUELLE' and postedesante = 'POSTE DE SANTE' and MONTH(datecunsuption)= MONTH(CURDATE())  GROUP BY afnumber,datecunsuption ORDER BY datecunsuption DESC,consid DESC");

*/
$total_consult=0;
$total_acte=0;
$total_lab=0;
$total_consumable=0; 
$total_medicine=0;
$total_onehparcent=0;
$total_coopymt=0;
$total_verified=0;
?>
<table width="70%" border="0" cellspacing="0" cellpadding="0">
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
				   <table>
              <tr><td>  <strong>PROVINCE/:&nbsp;&nbsp;&nbsp;&nbsp;DD</strong></td></tr>
                <tr><td>  <strong>ADMINISTRATIVE  DISTRICT:&nbsp;&nbsp;&nbsp;&nbsp;Kulu</strong></td></tr>
                <tr><td>  <strong>ADMINISTRATIVE  SECTION:&nbsp;&nbsp;&nbsp;&nbsp;Kulu</strong></td></tr>
        </tr>
        <tr>
          <td height="20"><table width="60%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
			  <form method="POST" action="drugs1">
                <td width="45"></td>
                <td width="41"><input type="text" name="datesearch" id="datesearch" placeholder="Start Date" required aria-required='true' aria-describedby='name-format'placeholder="Start Date"></td>
				<td></td>
                <td width="116"><input type="text" name="datesearch1" id="datesearch1" placeholder="End Date" required aria-required='true' aria-describedby='name-format'placeholder="End Date"></td>
								<td></td><td><?php

$query = ("Select * FROM prodicts");
$searchque = mysqli_query($conn, $query);

$previous = '';
echo '<select name="Patient_ID" id="Patient_ID" required>';
echo '<option value = "" </option>';
while ($row = mysqli_fetch_assoc($searchque)) {
    $current = $row['product_name'];
    if ($current != $previous) {
        echo '<option value="' . $row['product_name'] . '">' . $row['product_name'] . '</option>';
    }
    $previous = $current;
}
echo '</select>'?></td><td><select name="category">
	<option value=""><strong>Select Category<strong></option>
	<option value="All"><strong>All<strong></option>
	<option value="1"><strong>1<strong></option>
	<option value="2"><strong>2<strong></option>
	<option value="3"><strong>3<strong></option>
	<option value="4"><strong>4<strong></option>
	
	
	</select></td>
                <td width="116"><input type="submit" name="submit" value="DISPLAY"></td>
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
			<th>DATE </th>
			<th>NAMES</th>
			<th>AFFILLIATION NUMBER</th>
			<th>CATEGORY</th>
			<th>GENDER</th>
			<th>DRUG DESCRIPTION</th>
    		<th>QUANTITY</th>
			<th>UNIT PRICE</th>
			<th>TOTAL</th>


			
			  
		<?php
			while ($row = mysqli_fetch_assoc($resultselect))
{
		$ambul = $row['amb'];

$nulltm = $row['null_tm'];

	if($nulltm == 'Yes'){
	$ticketmod = 0;		
	}

	else{
	$ticketmod =200;	
	}
	if($ambul == 'yes'){
		$modticket = 2400;
	}
	else{
		$modticket =0;
	}
	$ticketmod1 = $ticketmod+$modticket;
$originalDate = $row['datecunsuption'];
$newDate = date("d/m/Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row['datecunsuption']));
$totals= $row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament']+$row['tot_hosp']+$row['amtambul'];
$verified=($row['consultatiobn']+$row['totexamens']+$row['totacte']+$row['totconsommables']+$row['totmedicament']+$row['tot_hosp']+$row['amtambul'])-$ticketmod1;
?>
			
				<tr>
				<td><?php 
							$tm=$tm+1;
						 echo $tm; ?></td>
						<td width="60px"><?php echo $newDate;?></td>
						<td><?php echo $row['names'].' '.$row['lname'];?></td>
						<td width="60px"><?php echo $row['afnumber'];?></td>
						<td><?php echo $row['category'];?></td>
						<td><?php echo $row['gender'];?></td>
						<td><?php echo $row['medicament'];?></td>
						<td><?php echo $row['qtymedicamnet'];?></td>
						<td><?php echo $row['upmedicamnet'];?></td>
						<td><?php echo $row['qtymedicamnet']*$row['upmedicamnet'];?></td>
						
              </tr>
			  	
<?php 
$total_consult=$total_consult+$row['consultatiobn'];
$total_acte=$total_acte+$row['totacte'];
$total_lab=$total_lab+$row['totexamens'];
$total_consumable=$total_consumable+$row['totconsommables'];
$total_medicine=$total_medicine+$row['totmedicament'];
$total_hospitalisation= $total_hospitalisation+$row['tot_hosp'];
$total_onehparcent=$total_onehparcent+$totals;
$tot_amt = $tot_amt+$row['amtambul'];
$total_coopymt=$total_coopymt+$ticketmod1;
$total= $total + $row['qtymedicamnet']*$row['upmedicamnet'];
} 
;
?>

<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th>TOTALS</th>
<th></th>
<th></th>
<th><?php echo $total; ?></th>
</tr>
			<!--<tr>
			<th></th>
			<th> </th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th> </th>
			<th>POSTE DE SANTE</th>
			<th></th>
    		<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>

			</tr>-->
			<?php/*
			while ($row1 = mysqli_fetch_assoc($result1))
{
		$ambul = $row1['amb'];

$nulltm = $row1['null_tm'];

	if($nulltm == 'Yes'){
	$ticketmod = 0;		
	}

	else{
	$ticketmod =200;	
	}
	if($ambul == 'yes'){
		$modticket = 2400;
	}
	else{
		$modticket =0;
	}
	$ticketmod1 = $ticketmod+$modticket;
$originalDate = $row1['datecunsuption'];
$newDate = date("d/m/Y", strtotime($originalDate));
$newDate1 = date("m", strtotime($row1['datecunsuption']));
$totals1= $row1['consultatiobn']+$row1['totexamens']+$row1['totacte']+$row1['totconsommables']+$row1['totmedicament']+$row1['tot_hosp']+$row1['amtambul'];
$verified1=($row1['consultatiobn']+$row1['totexamens']+$row1['totacte']+$row1['totconsommables']+$row1['totmedicament']+$row1['tot_hosp']+$row1['amtambul'])-$ticketmod1;
*/?>
	<!--<tr>
				<td><?php /*
							$tm=$tm+1;
						 echo $tm; ?></td>
						<td width="60px"><?php echo $newDate;?></td>
						<td><?php echo $row1['category'];?></td>
						<td width="60px"><?php echo $row1['afnumber'];?></td>
						<td><?php echo $row1['dob'];?></td>
						<td><?php echo $row1['gender'];?></td>
						<td><?php echo $row1['names'].' '.$row1['lname'];?></td>
						<td><?php echo $row1['affiliate_names'].' '.$row1['afilliate_lastname'];?></td>
						<td><?php echo $row1['familycode'];?></td>
						<td><?php echo $row1['consultatiobn'];?></td>
						<td><?php echo number_format((float)$row1['totexamens'], 1);?></td>
						<td><?php echo 0;?></td>
						<td><?php echo number_format((float)$row1['tot_hosp'], 1);?></td>
						<td><?php echo number_format((float)$row1['amtambul'], 1);?></td>
						<td><?php echo number_format((float)$row1['totacte'], 1);?></td>
						<td><?php echo number_format((float)$row1['totconsommables'], 1);?></td>
						<td><?php echo number_format((float)$row1['totmedicament'], 1);?></td>
						<td><?php echo number_format((float)$totals1, 1);?></td>
						<td><?php echo $ticketmod1; ?></td>
						<td><?php echo number_format((float)$verified1,1);*/?></td>
              </tr>
<?php /*
$total_consult1=$total_consult1+$row1['consultatiobn'];
$total_acte1=$total_acte1+$row1['totacte'];
$total_lab1=$total_lab1+$row1['totexamens'];
$total_consumable1=$total_consumable1+$row1['totconsommables'];
$total_medicine1=$total_medicine1+$row1['totmedicament'];
$total_hospitalisation1= $total_hospitalisation1+$row1['tot_hosp'];
$total_onehparcent1=$total_onehparcent1+$totals1;
$tot_amt1 = $tot_amt1+$row1['amtambul'];
$total_coopymt1=$total_coopymt1+$ticketmod1;
$total_verified1=$total_verified1+$verified1;
} 
;*/
?>
<!--<tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
<th>TOTALS POSTE DE SANTE</th>
<th><?php //echo number_format((float)$total_consult1,1);?></th>
<th><?php //echo number_format((float)$total_lab1,1);?></th>
<th><?php //echo number_format((float)0,1);?></th>
<th><?php //echo number_format((float)$total_hospitalisation1,1);?></th>
<th><?php //echo number_format((float)$tot_amt1,1);?></th>
<th><?php //echo number_format((float)$total_acte1,1);?></th>
<th><?php //echo number_format((float)$total_consumable1,1);?></th>
<th><?php //echo number_format((float)$total_medicine1,1);?></th>
<th><?php //echo number_format((float)$total_onehparcent1,1);?></th>
<th><?php //echo number_format((float)$total_coopymt1,1);?></th>
<th><?php //echo number_format((float)$total_verified1,1);?></th>
</tr>

<tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
<th>GRAND TOTALS</th>
<th><?php //echo number_format((float)$total_consult+$total_consult1,1);?></th>
<th><?php //echo number_format((float)$total_lab+$total_lab1,1);?></th>
<th><?php //echo number_format((float)0,1);?></th>
<th><?php //echo number_format((float)$total_hospitalisation+$total_hospitalisation1,1);?></th>
<th><?php //echo number_format((float)$tot_amt+$tot_amt1,1);?></th>
<th><?php //echo number_format((float)$total_acte+$total_acte1,1);?></th>
<th><?php //echo number_format((float)$total_consumable+$total_consumable1,1);?></th>
<th><?php //echo number_format((float)$total_medicine+$total_medicine1,1);?></th>
<th><?php //echo number_format((float)$total_onehparcent+$total_onehparcent1,1);?></th>
<th><?php //echo number_format((float)$total_coopymt+$total_coopymt1,1);?></th>
<th><?php //echo number_format((float)$total_verified+$total_verified1,1);?></th>
</tr>-->
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
