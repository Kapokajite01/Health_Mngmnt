<?php
error_reporting(0);
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
    if(!isset($_SESSION['sess_username'])  or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro')){
		if(($role!="Receptionist") or ($role!="Mutuelle"))
		{
      header('Location: logout');
		}
	}
include_once('connect_db.php');
$postedesante = $_SESSION['sess_postdsante'];
$gotal = 0;

session_start();
$affnumber = $_GET['affnumber'];
$dtconsult = $_GET['dtconsult'];
$patientnumber = $_GET['affnumber'];
$dt = $_GET['dtconsult'];
$redirect = $_SESSION['redirect'];
if($redirect == 'yes'){
	?>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
</script>
<script type='text/javascript'>
         self.close();
    </script>
<?php	
}
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

<link rel="stylesheet" href="cssauto/style.css" />
<script type="text/javascript" src="jsauto/jquery.min.js"></script>
<script type="text/javascript" src="jsauto/script.js"></script>
</head>

<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>  
 <script src="jquery.min1.js"></script>  
   <script src="jquery-ui.min1.js"></script> 
   <script type="text/javascript"></script>
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
function popup01(url) 
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
fieldset {
	border:1px solid #999;
	border-radius:8px;
	box-shadow:0 0 10px #999;
	margin: 0 20%;
}
legend {
	background:#fff;
}
.box {
      width:80%;
      height: 30px;
      border: 1px solid #999;
      font-size: 18px;
      color: #1c87c9;
      background-color: #eee;
      border-radius: 5px;
      box-shadow: 4px 4px #ccc;
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
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<title>Medical Records</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->

	<!-- jQuery & JS files -->
       

</head>
<body>

	<!-- TOP BAR -->
	<!-- TOP BAR -->
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->	

			
				<div class="content-module">				
					
						<div class="content-module-main cf">
 <?php
if($role=="Receptionist"){
	?>

		<button class="dropdown-item" >
                              <i class="fa fa-times text-danger fa-fw"></i><a href="javascript: void(0)"  style="text-decoration: none;" onclick="popup01('redirect_patient?ptienID=<?php echo $patientnumber;?>')"><strong>Redirect Patient </strong></a></button>
							  <?php
}
?>



<?php
include_once('connect_db.php');

//error_reporting(0);
session_start();

$key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
 $encrypted =$_GET['affnumber'];
 $encrypted = preg_replace('/\s+/', '+', $encrypted);
 
 function my_decrypt($data, $key) {
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}
$decrypted = my_decrypt($encrypted, $key);
$affnumber = $decrypted ;
$dtconsult = $_GET['dtconsult'];
$patientnumber = $affnumber;
$_SESSION['patientnumb'] = $patientnumber;
$dt = $_GET['dtconsult'];
$status = ("SELECT status FROM consultation WHERE patient_id = '$affnumber'");
$patstatus = mysqli_query($conn, $status);
$patientstatus = mysqli_fetch_array($patstatus);
$thisstatu = $patientstatus['status'];

//Examens

$labo  = ("select consid,examenmedicale,qtyexamen,upexamen,results  from consomation_consom WHERE id = '$patientnumber'  and examenmedicale !=''");
$labores = mysqli_query($conn, $labo);
if ($labores->num_rows > 0) {
while ($rowlab = mysqli_fetch_assoc($labores)) {
$idExamens[]= $rowlab['consid'];
$exemens[] = $rowlab['examenmedicale'];	
$qtties[] = $rowlab['qtyexamen'];	
$prices[] = $rowlab['upexamen'];	
$results[] = $rowlab['results'];	

}
$ntable = COUNT($exemens);
}


//Medicines

$medi  = ("select consid,medicament,upmedicamnet,qtymedicamnet from consomation_consom WHERE id = '$patientnumber' and medicament!=''");
$medres = mysqli_query($conn, $medi);
if ($medres->num_rows > 0) {
while ($rowmed = mysqli_fetch_assoc($medres)) {
$idmedicament[] = $rowmed['consid'];	
$medicament[] = $rowmed['medicament'];	
$upmedicamnet[] = $rowmed['upmedicamnet'];	
$qtymedicamnet[] = $rowmed['qtymedicamnet'];	
}
$nomed = COUNT($medicament);
}
//Consommables

$consomm  = ("select consid,consommable,UPcons,Qcons from consomation_consom WHERE id = '$patientnumber' and consommable !=''");
$consres = mysqli_query($conn, $consomm);
if ($consres->num_rows > 0) {
while ($rowcons = mysqli_fetch_assoc($consres)) {
$IDconsommable[] = $rowcons['consid'];	
$consommable[] = $rowcons['consommable'];	
$UPcons[] = $rowcons['UPcons'];	
$Qcons[] = $rowcons['Qcons'];	
}
$nocons= COUNT($consommable);
}

//Actes
$actes  = ("select consid,actemedicale,upacte,qtyacte from consomation_consom WHERE id = '$patientnumber'  and actemedicale !=''");
$actres = mysqli_query($conn, $actes);
if ($actres->num_rows > 0) {
while ($rowacte = mysqli_fetch_assoc($actres)) {
$idActemed[] = $rowacte['consid'];	
$actemedicale[] = $rowacte['actemedicale'];	
$upacte[] = $rowacte['upacte'];	
$qtyacte[] = $rowacte['qtyacte'];	
}
$noact= COUNT($actemedicale);

}

//Hospitalizations
$hosptal  = ("select consid,hospitalization,uphospitalizations,qtyhoapitalization from consomation_consom WHERE id = '$patientnumber'  and hospitalization !=''");
$hospres = mysqli_query($conn, $hosptal);
if ($hospres->num_rows > 0) {
while ($rowhosp = mysqli_fetch_assoc($hospres)) {
$idHosp[] = $rowhosp['consid'];
$hospitalization[] = $rowhosp['hospitalization'];	
$uphospitalizations[] = $rowhosp['uphospitalizations'];	
$qtyhoapitalization[] = $rowhosp['qtyhoapitalization'];	
}
$nohosp= COUNT($hospitalization);
}

$palainte="SELECT * FROM doctor_comments WHERE  	patient_id = '$patientnumber' and type='Plainte'";
$doctpl = mysqli_query($conn, $palainte);

while($rowpl = mysqli_fetch_assoc($doctpl)){
	$plainte =  $rowpl['comment'];
}

$etgeneral="SELECT * FROM doctor_comments WHERE patient_id = '$patientnumber' and type='Etat Gneneral'";
$docegen = mysqli_query($conn, $etgeneral);

while($roweg = mysqli_fetch_assoc($docegen)){
	$Etatgeneral =  $roweg['comment'];
}

$antecedent="SELECT * FROM doctor_comments WHERE patient_id = '$patientnumber' and type='Antecedent'";
$anteced = mysqli_query($conn, $antecedent);

while($rowant = mysqli_fetch_assoc($anteced)){
	$antedent =  $rowant['comment'];
}
$examenpysique="SELECT * FROM doctor_comments WHERE patient_id = '$patientnumber' and type='Examen Physique'";
$ephysique = mysqli_query($conn, $examenpysique);
$numrows= ("select id from patient where id < '$patientnumber'");
$resultnumrows = mysqli_query($conn, $numrows);
$resnum_rows = mysqli_num_rows($resultnumrows);
$resultpa = ("select id,names,lname,insurance,affiliate_number,consultatiom,category,consultatiom from patient where id ='$patientnumber' ");
$pat = mysqli_query($conn, $resultpa);
while ($rowval = mysqli_fetch_assoc($pat)) {
   $afnumber= $rowval['affiliate_number'];
   $patumber= $rowval['affiliate_number'];
   $firstname=  $rowval['names'];
   $lastname=  $rowval['lname'];
   $insurance=  $rowval['insurance'];
   $cosnult= $rowval['consultatiom'];
   $patinetid= $rowval['id'];
   $category = $rowval['category'];
   $consulta= $rowval['consultatiom'];
}
if($category==1){
	
}
$km = $_SESSION['km'];
//existance
$existance = "SELECT * FROM other_consumables WHERE patient_id = '$patientnumber' LIMIT 1";
$othercons = mysqli_query($conn, $existance);
while ($rowother = mysqli_fetch_assoc($othercons)) {
 $idother = $rowother['other_id'];
 $fiche_transfert  = $rowother['fiche_transfert'];
 $photocopy   = $rowother['photocopy'];
 $num_pcopy = $rowother['num_pcopy'];
 $fiche_consultation  = $rowother['fiche_consultation'];
 $idother = $rowother['other_id'];
 $oThercons = 'Existance';
 
}
	?>


<form id="patient" name="patient" method="POST" action="saveconsumptions">
<input type ="text" name="thisdate" value="<?php echo $dt;?>"  style="display:none">
<input size="25" id="patnumber" name="patnumber"  value="<?php echo $patientnumber;?>"  class="element text large" type="text"  style=" border: 5px;display:none" required>


<table style="width: 60%;margin:  0px auto;" align="center">
<tr><td valign="top" align="left">
<br><br>
<span style="background-color:black"><font color="white">
<strong>Name:&nbsp;&nbsp;<?php echo $firstname;?>&nbsp;&nbsp;<?php echo $lastname;?></strong><br><br>
<strong>Insurance :&nbsp;&nbsp;<?php echo $insurance;?><br><br>
<strong>Number:&nbsp;&nbsp;<?php echo $afnumber;?><br><br>
<strong>Consultation:&nbsp;&nbsp;<?php echo $consulta;?><br><br>
<strong>Familly Category:&nbsp;&nbsp;<?php echo $category;?><br><br>
<strong>Date:&nbsp;&nbsp;<?php echo $dtconsult = date("d-m-Y", strtotime($dtconsult));
;?><br><br>
 <!--<button class="dropdown-item" >
                              <i class="fa fa-times text-danger fa-fw"></i><a href="javascript: void(0)"  style="text-decoration: none;" onclick="popup01('return_patient_recetion')"><strong>Return Patient </strong></a></button>-->	
</td><td>
<!-- Medicaments-->
<?php if($nomed >0)
{
	?>
<fieldset style="background:#ffffff;width: 100%;margin:  0px auto;" align="center">
        <legend style="padding:20px 0; font-size:15px;"><b>Medicaments</b></legend>
 <table><tr><th><i>No</th><th><i>Medicament</th><th><i>QTY</th><th><i>Unit price</i></th> <th><i>Total</i></th> <th><i>Delete</i></th></tr>
<?php
for($iM=0; $iM<$nomed ; $iM++)
{
	$totmed[$iM] = $qtymedicamnet[$iM]*$upmedicamnet[$iM];
	$totalmed = $totalmed + $totmed[$iM];
	?>
<tr><td><?php echo $iM+1?></td><td><?php echo $medicament[$iM]?></td><td align="center"><?php echo $qtymedicamnet[$iM]?></td><td><strong><?php echo $upmedicamnet[$iM];?></strong></td><td><strong><?php echo number_format($totmed[$iM],1);?></strong></td><td style="width: 90px;">  <?php
if($role=="Receptionist"){
	?> <input type='button' style="background-color: #f44336;"value='DELETE' onclick="window.open('deletetest_reception?affideleTE=<?php echo urlencode($idmedicament[$iM]); ?>','popup', 'width=700, height=300, statusbar=0, location=0, menubar=0, toolbar=0,left=350,top=350')"/>
<?php
}
?>	</td></tr>	
	
<?php	
}
?>
<tr><td colspan="4" align="center"><strong>Total Medicines</td><td><strong><?php echo number_format($totalmed,1) ;?></td></tr>
</table>
</fieldset>
<?php
}
?>
<!-- Consommables-->
<?php
if($nocons >0)
{
	?>
<fieldset style="background:#ffffff;width: 100%;margin:  0px auto;" align="center">
        <legend style="padding:20px 0; font-size:15px;"><b>Consommables</b></legend>
 <table><tr><th><i>No</th><th><i>Consommable</th><th><i>QTY</th><th><i>Unit price</i></th> <th><i>Total</i></th><th><i> Delete</i></th></tr>
<?php
for($iC=0; $iC<$nocons ; $iC++)
{
	$totconsommle[$iC] = $Qcons[$iC]*$UPcons[$iC];
	$totalcons = $totalcons + $totconsommle[$iC];
	?>
<tr><td><?php echo $iC+1?></td><td><?php echo $consommable[$iC]?></td><td align="center"><?php echo $Qcons[$iC]?></td><td><strong><?php echo $UPcons[$iC];?></strong></td><td><strong><?php echo number_format($totconsommle[$iC],1);?></strong></td><td>   <?php
if($role=="Receptionist"){
	?><input type='button' style="background-color: #f44336;"value='DELETE' onclick="window.open('deleteConsommable_reception?affideleTE=<?php echo urlencode($IDconsommable[$iC]); ?>','popup', 'width=700, height=300, statusbar=0, location=0, menubar=0, toolbar=0,left=350,top=350')"/>
<?php
}
?>	</td></tr>	
	
<?php	
}
?>
<tr><td colspan="4" align="center"><strong>Total Consommables</td><td><strong><?php echo number_format($totalcons,1) ;?></td></tr>
</table>
</fieldset>
<?php
}
?>
<!-- Actes Medicaux-->
<?php
if($noact >0)
{
	?>
<fieldset style="background:#ffffff;width: 100%;margin:  0px auto;" align="center">
        <legend style="padding:20px 0; font-size:15px;"><b>Actes Medicaux</b></legend>
 <table><tr><th><i>No</th><th><i>Acte</th><th><i>QTY</th><th><i>Unit price</i></th> <th><i>Total</i></th><th><i> Delete</i></th></tr>
<?php
for($iact=0; $iact<$noact ; $iact++)
{
	$totactemed[$iact] = $qtyacte[$iact]*$upacte[$iact];
	$totalact = $totalact + $totactemed[$iact];
	?>
<tr><td><?php echo $iact+1?></td><td><?php echo $actemedicale[$iact]?></td><td align="center"><?php echo $qtyacte[$iact]?></td><td><strong><?php echo $upacte[$iact];?></strong></td><td><strong><?php echo number_format($totactemed[$iact],1);?></strong></td><td> <?php
if($role=="Receptionist"){
	?> <input type='button' style="background-color: #f44336;"value='DELETE' onclick="window.open('deleteActe_reception?affideleTE=<?php echo urlencode($idActemed[$iact]); ?>','popup', 'width=700, height=300, statusbar=0, location=0, menubar=0, toolbar=0,left=350,top=350')"/>
	<?php
}
?>
	
	
	</td></tr>	
	
<?php	
}
?>
<tr><td colspan="4" align="center"><strong>Total Acetes Medicaux</td><td><strong><?php echo number_format($totalact,1);?></td></tr>
</table>
</fieldset>
<?php
}
?>
<!-- Examens-->
<?php
if($ntable >0)
{
	?>
<fieldset style="background:#ffffff;width: 100%;margin:  0px auto;" align="center">
        <legend style="padding:20px 0; font-size:15px;"><b>Examens</b></legend>
 <table><tr><th><i>No</th><th><i>Examen</th><th><i>QTY</th><th><i>Unit price</i></th> <th><i>Total</i></th><th><i> Delete</i></th></tr>
<?php
for($i=0; $i< $ntable ; $i++)
{
		$totexamen[$i] = $qtties[$i]*$prices[$i];
	$totalex = $totalex + $totexamen[$i];
	?>
<tr><td><?php echo $i+1?></td><td><?php echo $exemens[$i]?></td><td align="center"><?php echo $qtties[$i]?></td><td><?php echo $prices[$i];?></strong></td><td><strong><?php echo number_format($totexamen[$i],1);?></strong></td><td>
 <?php
if($role=="Receptionist"){
	?> <input type='button' style="background-color: #f44336;"value='DELETE' onclick="window.open('deletetest_Examens?affideleTE=<?php echo urlencode($idExamens[$i]); ?>&status=<?php echo urlencode($thisstatu); ?>','popup', 'width=700, height=300, statusbar=0, location=0, menubar=0, toolbar=0,left=350,top=350')"/>
<?php
}

?>	</td></tr>	
	
<?php	
}
?>
<tr><td colspan="4" align="center"><strong>Total Examens</td><td><strong><?php echo number_format($totalex,1);?></td></tr>

</table>
<?php
}
?>
<!-- Hospitalisation-->
<?php
if($nohosp >0)
{
	?>
<fieldset style="background:#ffffff;width: 100%;margin:  0px auto;" align="center">
        <legend style="padding:20px 0; font-size:15px;"><b>Hospitalizations</b></legend>
 <table><tr><th><i>No</th><th><i>Hospitalizations</th><th><i>QTY</th><th><i>Unit price</i></th> <th><i>Total</i></th><th><i> Delete</i></th></tr>
<?php
for($ih=0; $ih< $nohosp ; $ih++)
{
		$tothospitalisation[$ih] = $qtyhoapitalization[$ih]*$uphospitalizations[$ih];
	$totalhosp = $totalhosp + $tothospitalisation[$ih];
	?>
<tr><td><?php echo $ih+1?></td><td><?php echo $hospitalization[$ih]?></td><td align="center"><?php echo $qtyhoapitalization[$ih]?></td><td><?php echo $uphospitalizations[$ih];?></strong></td><td><strong><?php echo number_format($tothospitalisation[$ih],1);?></strong></td><td> <?php
if($role=="Receptionist"){
	?><input type='button' style="background-color: #f44336;"value='DELETE' onclick="window.open('deletetest_hospitalization?affideleTE=<?php echo urlencode($idHosp[$ih]); ?>','popup', 'width=700, height=300, statusbar=0, location=0, menubar=0, toolbar=0,left=350,top=350')"/> 
	<?php
}
?></td></tr>	
	
<?php	
}
?>
<tr><td colspan="4" align="center"><strong>Total Hospitalisations</td><td><strong><?php echo number_format($totalhosp,1);?></td></tr>

</table>
</fieldset>
<?php
}
?>
<?php

if($insurance=='MUTUELLE'){
	if($category==1){
	$tm = -0;	
	}
	else{
	$tm = 200;
	}
}

?>
<fieldset style="background:#ffffff;width: 100%;margin:  0px auto;" align="center">
        <legend style="padding:20px 0; font-size:15px;"><b></b></legend>
<div align="center">
<table style=" margin-left: 30%;">
<input type="text" name="exisatace" value="<?php echo $othersexist ;?>" style="display:none">
<?php
if($fichetransfert==100)
{
?>
	<tr><td >	 <input type="checkbox" name="List1" id="List1" checked value="100" onclick="addUp1(100, 'List1')"><strong>Fiche de Transfert (100 Frw)</td></tr>
	<?php
}
else
{
?>
	<tr><td >	 <input type="checkbox" name="List1" id="List1"  value="100" onclick="addUp(100, 'List1')"><strong>Fiche de Transfert (100 Frw)</td></tr>
<?php
}
?>
<?php
if($photocopy==100)
{
?>
	<tr><td><input type="checkbox" name="List2"  id="List2"  value="100" onClick="addUp(100, 'List2')"> <input type="number" id="hidden_field" name="numphotocopy" size="1px" value="0" min="1" disabled required oninput="calculatevalues()"  onkeypress="return isNumberKey(event)" onKeyDown="preventBackspace()" style="font-size:12pt;border-color:black;">&nbsp;&nbsp;<strong>Photocopie (100 Frw)</td></tr>
<?php
}
else
{
?>
	<tr><td><input type="checkbox" name="List2"  id="List2"  value="100" onClick="addUp(100, 'List2')"> <input type="number" id="hidden_field" name="numphotocopy" size="1px" value="0" min="1" disabled required  oninput="calculatevalues()"   onkeypress="return isNumberKey(event)" onKeyDown="preventBackspace()" style="font-size:12pt;border-color:black;">&nbsp;&nbsp;<strong>Photocopie (100 Frw)</td></tr>

<?php
}
if($fiche_consultation==20)
{
?>
	<tr><td><input type="checkbox" name="List3"  id="List3"  checked value="20" onClick="addUp1(20, 'List3')"><strong>Fiche de Consultation (20 Frw)</td></tr>
<?php
}
else
{
?>
	<tr><td><input type="checkbox" name="List3"  id="List3"   value="20" onClick="addUp(20, 'List3')"><strong>Fiche de Consultation (20 Frw)</td></tr>

<?php
}
if($insurance=='MUTUELLE')
{
	if($NutTM=='Ticketmod')
{
	
	if ( $category!=1)
	{
			$tm =-200;

		?><tr><td><input type="checkbox" name="List4"  id="List4" checked value="Ticketmod" onClick="addUp1(200, 'List4')"><strong><span style="text-decoration:line-through">Null Ticket Moderateur</span></td></tr>
		<?php
		}
}	
else{
	
	if ( $category!=1)
	{
					$tm =200;
		?><tr><td><input type="checkbox" name="List4"  id="List4"  value="Ticketmod" onClick="addUp(200, 'List4')"><strong><span style="text-decoration:line-through">Null Ticket Moderateur</span></td></tr>
		<?php
		}
}
 $gotal = $consulta+$totalmed+$totalcons+$totalact+$totalex+$totalhosp+$fichetransfert+$photocopy+$ficheconsultation;	
}

if($insurance=='RAMA/RSSB'){
	$gotal = $consulta+$totalmed+$totalcons+$totalact+$totalex+$totalhosp;
$tm=$gotal -($gotal*0.85);	
}if($insurance=='MMI'){
$gotal = $consulta+$totalmed+$totalcons+$totalact+$totalex+$totalhosp;
$tm=$gotal -($gotal*0.9);	
	
}if($insurance=='MEDIPLA'){
$gotal = $consulta+$totalmed+$totalcons+$totalact+$totalex+$totalhosp;
$tm=$gotal -($gotal*0.85);	

}if($insurance=='RADIANT'){
$gotal = $consulta+$totalmed+$totalcons+$totalact+$totalex+$totalhosp;
$tm=$gotal -($gotal*0.85);	

}if($insurance=='NO INSURANCE'){
$gotal = $consulta+$totalmed+$totalcons+$totalact+$totalex+$totalhosp;
$tm=$gotal -($gotal*1);	
	
}

$gotal = round($gotal);
	?>
		</table>
		</div>
      </fieldset>
<fieldset style="background:#ffffff;width: 100%;margin:  0px auto;" align="center">
        <legend style="padding:20px 0; font-size:15px;"><b></b></legend>
<div align="center">
<strong>Grand Total:&nbsp;&nbsp;<input type="text" name="ttl"  id="ttl" style="border: none;border-color: transparent;font-weight:bold;" readOnly value=<?php echo $gotal; ?>></strong> <input type="text" name="ttltemp"  id="ttltemp" style="display:none" readOnly value=<?php echo $gotal; ?>></strong><br>
<strong>Insured:&nbsp;&nbsp;</strong><input type="text" name="ttl2" style="border: none;border-color: transparent;font-weight:bold;" readOnly value=<?php 

echo $gotal-$tm; 
?>><br>
<strong>Ticket modetateur:&nbsp;&nbsp;<?php 

?><input type="text" name="ttl1" id="ttl1" style="border: none;border-color: transparent;font-weight:bold;" readOnly value=<?php echo $tm+$fichetransfert+$photocopy+$fiche_consultation; ?>></strong> <input type="text" name="ttl1temp"  id="ttl1temp" style="display:none" readOnly value=<?php echo $tm+$fichetransfert+$photocopy+$fiche_consultation; ?>></strong><br>

</div>
</fieldset>
	<br>  
	 
<DIV align="center"> <?php
if($role=="Receptionist"){
	?><input name="bigbutton" id="bigbutton" type="submit" value="Submit" />
	
	<?php
}
?>
	</DIV>

</form>
 </div>
 

					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div></div> <!-- end full-width -->
			
	</div></div>	</div></div> <!-- end content -->
	
<!-- FOOTER -->
	 <!-- end footer -->
</body>
<div id="footer">

		<p>Powed By Vision Soft Ltd .</p>
			<hr></hr>
	</div>
</html>
<link rel="stylesheet" href="css/font-awesome.min.css">
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function preventBackspace(e) {
  var evt = e || window.event;
  if (evt) {
      var keyCode = evt.charCode || evt.keyCode;
      if (keyCode === 8 || keyCode === 46) {
          if (evt.preventDefault) {
              evt.preventDefault();
          } else {
              evt.returnValue = false;
          }
      }
  }
}
function calculatevalues() {
	var List1;
	if(document.getElementById("List1").checked)
	{
	 List1 = parseInt(document.getElementById("List1").value);
	}
	else{
	 List1 = 0;
		
	}
	var List2 = parseInt(document.getElementById("List2").value);
	
	if(document.getElementById("List3").checked)
	{
	 var List3 = parseInt(document.getElementById("List3").value);
	}
	else{
	 var List3 = 0;
		
	}
	var total = parseInt(document.getElementById("ttltemp").value);
	var tottickemod = document.getElementById("ttl1");
	var totalticketmod = parseInt(document.getElementById("ttl1temp").value);
	
	var hidden_field = parseInt(document.getElementById("hidden_field").value);
	var calcphtotcopy =  hidden_field * List2;
	var allval = total + calcphtotcopy + List1 + List3;
	var tottickmodval= totalticketmod + calcphtotcopy + List1 + List3;
	ttl.value =  allval;
	tottickemod.value=tottickmodval;
    
}

</script>
<script type="text/javascript">
total = 0;
List1 = 1;
List2 = 1;
List3 = 1;
List4 = 1;

function addUp(num, x)
	 {	
	 	if (x == "List1" && List1 == 1) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo + numo;
		 	document.patient.ttl.value = nwTemp;
			//copymt
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 + numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List1 = 0;
			return List1;
		}
		if (x == "List1" && List1 == 0) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo - numo;
		 	document.patient.ttl.value = nwTemp;
				//copymnt
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 - numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List1 = 1;
		}
		if (x == "List2" && List2 == 1) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo + numo;
		 	document.patient.ttl.value = nwTemp;
			//copymnt
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 + numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List2 = 0;
			return List2;
		}
		if (x == "List2" && List2 == 0) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo - numo;
		 	document.patient.ttl.value = nwTemp;
				//copymnt
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 - numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List2 = 1;
		}
		
		if (x == "List3" && List3 == 1) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo + numo;
		 	document.patient.ttl.value = nwTemp;
			//copymt
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 + numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List3 = 0;
			return List3;
		}
		if (x == "List3" && List3 == 0) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo - numo;
		 	document.patient.ttl.value = nwTemp;
				//copymnt
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 - numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List3 = 1;
		}
		
		if (x == "List4" && List4 == 1) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo - numo;
		 	document.patient.ttl.value = nwTemp;
			//copymt
			
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 - numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List4 = 0;
			return List4;
		}
		if (x == "List4" && List4 == 0) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo + numo;
		 	document.patient.ttl.value = nwTemp;
				//copymnt
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 + numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List4 = 1;
		}
	}
	//for coopeymnt


</script>

<script type="text/javascript">
total = 0;
List1 = 1;
List2 = 1;
List3 = 1;
List4 = 1;

function addUp1(num, x)
	 {	
	 	if (x == "List1" && List1 == 1) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo - numo;
		 	document.patient.ttl.value = nwTemp;
			//copymt
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 - numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List1 = 0;
			return List1;
		}
		if (x == "List1" && List1 == 0) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo + numo;
		 	document.patient.ttl.value = nwTemp;
				//copymnt
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 + numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List1 = 1;
		}
		if (x == "List2" && List2 == 1) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo - numo;
		 	document.patient.ttl.value = nwTemp;
			//copymnt
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 - numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List2 = 0;
			return List2;
		}
		if (x == "List2" && List2 == 0) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo + numo;
		 	document.patient.ttl.value = nwTemp;
				//copymnt
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 + numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List2 = 1;
		}
		
		if (x == "List3" && List3 == 1) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo -numo;
		 	document.patient.ttl.value = nwTemp;
			//copymt
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 - numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List3 = 0;
			return List3;
		}
		if (x == "List3" && List3 == 0) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo + numo;
		 	document.patient.ttl.value = nwTemp;
				//copymnt
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 + numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List3 = 1;
		}
		
		if (x == "List4" && List4 == 1) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo + numo;
		 	document.patient.ttl.value = nwTemp;
			//copymt
			
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 + numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List4 = 0;
			return List4;
		}
		if (x == "List4" && List4 == 0) {
			temp = document.patient.ttl.value;
		 	tempo = parseInt(temp);
		 	numo = parseInt(num);
			nwTemp = tempo - numo;
		 	document.patient.ttl.value = nwTemp;
				//copymnt
			temp1 = document.patient.ttl1.value;
		 	tempo1 = parseInt(temp1);
		 	numo1 = parseInt(num);
			nwTemp1 = tempo1 - numo1;
		 	document.patient.ttl1.value = nwTemp1;
			List4 = 1;
		}
	}
	//for coopeymnt

</script>




<script>
function edit1(){
	var a=document.getElementById('mmed1');
	var a1=document.getElementById('aact1');


	if(a.readOnly= true){
		document.getElementById('mmed1').readOnly=false;
		document.getElementById("mmed1").style.backgroundColor="Gainsboro";	
		document.getElementById('up1').readOnly=false;
		document.getElementById('up1').style.backgroundColor="Gainsboro";	
		document.getElementById('qmed1').readOnly=false;
		document.getElementById('qmed1').style.backgroundColor="Gainsboro";	
		document.getElementById('ccons1').readOnly=false;
		document.getElementById("ccons1").style.backgroundColor="Gainsboro";	
		document.getElementById('upcons1').readOnly=false;
		document.getElementById('upcons1').style.backgroundColor="Gainsboro";	
		document.getElementById('qcosum1').readOnly=false;
		document.getElementById('qcosum1').style.backgroundColor="Gainsboro";	
		
		document.getElementById('aact1').readOnly=false;
		document.getElementById("aact1").style.backgroundColor="Gainsboro";	
		document.getElementById('upacte1').readOnly=false;
		document.getElementById('upacte1').style.backgroundColor="Gainsboro";	
		document.getElementById('qacte1').readOnly=false;
		document.getElementById('qacte1').style.backgroundColor="Gainsboro";	
		
		document.getElementById('eex1').readOnly=false;
		document.getElementById("eex1").style.backgroundColor="Gainsboro";	
		document.getElementById('upex1').readOnly=false;
		document.getElementById('upex1').style.backgroundColor="Gainsboro";	
		document.getElementById('qex1').readOnly=false;
		document.getElementById('qex1').style.backgroundColor="Gainsboro";	

		document.getElementById('hhosp1').readOnly=false;
		document.getElementById("hhosp1").style.backgroundColor="Gainsboro";	
		document.getElementById('uphosp1').readOnly=false;
		document.getElementById('uphosp1').style.backgroundColor="Gainsboro";	
		document.getElementById('qhosp1').readOnly=false;
		document.getElementById('qhosp1').style.backgroundColor="Gainsboro";	


	}
	

}

function edit2(){
	var a=document.getElementById('mmed2');

	if(a.readOnly= true){
		document.getElementById('mmed2').readOnly=false;
		document.getElementById("mmed2").style.backgroundColor="Gainsboro";	
		document.getElementById('up2').readOnly=false;
		document.getElementById('up2').style.backgroundColor="Gainsboro";	
		document.getElementById('qmed2').readOnly=false;
		document.getElementById('qmed2').style.backgroundColor="Gainsboro";	
		document.getElementById('ccons2').readOnly=false;
		document.getElementById("ccons2").style.backgroundColor="Gainsboro";	
		document.getElementById('upcons2').readOnly=false;
		document.getElementById('upcons2').style.backgroundColor="Gainsboro";	
		document.getElementById('qcosum2').readOnly=false;
		document.getElementById('qcosum2').style.backgroundColor="Gainsboro";	
		
		document.getElementById('aact2').readOnly=false;
		document.getElementById("aact2").style.backgroundColor="Gainsboro";	
		document.getElementById('upacte2').readOnly=false;
		document.getElementById('upacte2').style.backgroundColor="Gainsboro";	
		document.getElementById('qacte2').readOnly=false;
		document.getElementById('qacte2').style.backgroundColor="Gainsboro";	
		
		document.getElementById('eexe2').readOnly=false;
		document.getElementById("eexe2").style.backgroundColor="Gainsboro";	
		document.getElementById('upex2').readOnly=false;
		document.getElementById('upex2').style.backgroundColor="Gainsboro";	
		document.getElementById('qex2').readOnly=false;
		document.getElementById('qex2').style.backgroundColor="Gainsboro";	


		document.getElementById('hhosp2').readOnly=false;
		document.getElementById("hhosp2").style.backgroundColor="Gainsboro";	
		document.getElementById('uphosp2').readOnly=false;
		document.getElementById('uphosp2').style.backgroundColor="Gainsboro";	
		document.getElementById('qhosp2').readOnly=false;
		document.getElementById('qhosp2').style.backgroundColor="Gainsboro";	

		}
	

}
function edit3(){
	var a=document.getElementById('mmed3');

	if(a.readOnly= true){
		document.getElementById('mmed3').readOnly=false;
		document.getElementById("mmed3").style.backgroundColor="Gainsboro";	
		document.getElementById('up3').readOnly=false;
		document.getElementById('up3').style.backgroundColor="Gainsboro";	
		document.getElementById('qmed3').readOnly=false;
		document.getElementById('qmed3').style.backgroundColor="Gainsboro";	
		document.getElementById('ccons3').readOnly=false;
		document.getElementById("ccons3").style.backgroundColor="Gainsboro";	
		document.getElementById('upcons3').readOnly=false;
		document.getElementById('upcons3').style.backgroundColor="Gainsboro";	
		document.getElementById('qcosum3').readOnly=false;
		document.getElementById('qcosum3').style.backgroundColor="Gainsboro";	
		
		document.getElementById('aact3').readOnly=false;
		document.getElementById("aact3").style.backgroundColor="Gainsboro";	
		document.getElementById('upacte3').readOnly=false;
		document.getElementById('upacte3').style.backgroundColor="Gainsboro";	
		document.getElementById('qacte3').readOnly=false;
		document.getElementById('qacte3').style.backgroundColor="Gainsboro";	
		
		document.getElementById('eexe3').readOnly=false;
		document.getElementById("eexe3").style.backgroundColor="Gainsboro";	
		document.getElementById('upex3').readOnly=false;
		document.getElementById('upex3').style.backgroundColor="Gainsboro";	
		document.getElementById('qex3').readOnly=false;
		document.getElementById('qex3').style.backgroundColor="Gainsboro";	

		document.getElementById('hhosp3').readOnly=false;
		document.getElementById("hhosp3").style.backgroundColor="Gainsboro";	
		document.getElementById('uphosp3').readOnly=false;
		document.getElementById('uphosp3').style.backgroundColor="Gainsboro";	
		document.getElementById('qhosp3').readOnly=false;
		document.getElementById('qhosp3').style.backgroundColor="Gainsboro";	

	}
	

}
function edit4(){
	var a=document.getElementById('mmed4');

	if(a.readOnly= true){
		document.getElementById('mmed4').readOnly=false;
		document.getElementById("mmed4").style.backgroundColor="Gainsboro";	
		document.getElementById('up4').readOnly=false;
		document.getElementById('up4').style.backgroundColor="Gainsboro";	
		document.getElementById('qmed4').readOnly=false;
		document.getElementById('qmed4').style.backgroundColor="Gainsboro";	
		document.getElementById('ccons4').readOnly=false;
		document.getElementById("ccons4").style.backgroundColor="Gainsboro";	
		document.getElementById('upcons4').readOnly=false;
		document.getElementById('upcons4').style.backgroundColor="Gainsboro";	
		document.getElementById('qcosum4').readOnly=false;
		document.getElementById('qcosum4').style.backgroundColor="Gainsboro";	
		
		document.getElementById('aact4').readOnly=false;
		document.getElementById("aact4").style.backgroundColor="Gainsboro";	
		document.getElementById('upacte4').readOnly=false;
		document.getElementById('upacte4').style.backgroundColor="Gainsboro";	
		document.getElementById('qacte4').readOnly=false;
		document.getElementById('qacte4').style.backgroundColor="Gainsboro";	
		
		document.getElementById('eexe4').readOnly=false;
		document.getElementById("eexe4").style.backgroundColor="Gainsboro";	
		document.getElementById('upex4').readOnly=false;
		document.getElementById('upex4').style.backgroundColor="Gainsboro";	
		document.getElementById('qex4').readOnly=false;
		document.getElementById('qex4').style.backgroundColor="Gainsboro";	

		document.getElementById('hhosp4').readOnly=false;
		document.getElementById("hhosp4").style.backgroundColor="Gainsboro";	
		document.getElementById('uphosp4').readOnly=false;
		document.getElementById('uphosp4').style.backgroundColor="Gainsboro";	
		document.getElementById('qhosp4').readOnly=false;
		document.getElementById('qhosp4').style.backgroundColor="Gainsboro";	


	}
	

}
function edit5(){
	var a=document.getElementById('mmed5');

	if(a.readOnly= true){
		document.getElementById('mmed5').readOnly=false;
		document.getElementById("mmed5").style.backgroundColor="Gainsboro";	
		document.getElementById('up5').readOnly=false;
		document.getElementById('up5').style.backgroundColor="Gainsboro";	
		document.getElementById('qmed5').readOnly=false;
		document.getElementById('qmed5').style.backgroundColor="Gainsboro";	
		document.getElementById('ccons5').readOnly=false;
		document.getElementById("ccons5").style.backgroundColor="Gainsboro";	
		document.getElementById('upcons5').readOnly=false;
		document.getElementById('upcons5').style.backgroundColor="Gainsboro";	
		document.getElementById('qcosum5').readOnly=false;
		document.getElementById('qcosum5').style.backgroundColor="Gainsboro";	
		
		document.getElementById('aact5').readOnly=false;
		document.getElementById("aact5").style.backgroundColor="Gainsboro";	
		document.getElementById('upacte5').readOnly=false;
		document.getElementById('upacte5').style.backgroundColor="Gainsboro";	
		document.getElementById('qacte5').readOnly=false;
		document.getElementById('qacte5').style.backgroundColor="Gainsboro";	
		
		document.getElementById('eexe5').readOnly=false;
		document.getElementById("eexe5").style.backgroundColor="Gainsboro";	
		document.getElementById('upex5').readOnly=false;
		document.getElementById('upex5').style.backgroundColor="Gainsboro";	
		document.getElementById('qex5').readOnly=false;
		document.getElementById('qex5').style.backgroundColor="Gainsboro";	
		

		document.getElementById('hhosp5').readOnly=false;
		document.getElementById("hhosp5").style.backgroundColor="Gainsboro";	
		document.getElementById('uphosp5').readOnly=false;
		document.getElementById('uphosp5').style.backgroundColor="Gainsboro";	
		document.getElementById('qhosp5').readOnly=false;
		document.getElementById('qhosp5').style.backgroundColor="Gainsboro";	


	}
	

}
function edit6(){
	var a=document.getElementById('mmed6');

	if(a.readOnly= true){
		document.getElementById('mmed6').readOnly=false;
		document.getElementById("mmed6").style.backgroundColor="Gainsboro";	
		document.getElementById('up6').readOnly=false;
		document.getElementById('up6').style.backgroundColor="Gainsboro";	
		document.getElementById('qmed6').readOnly=false;
		document.getElementById('qmed6').style.backgroundColor="Gainsboro";	
		document.getElementById('ccons6').readOnly=false;
		document.getElementById("ccons6").style.backgroundColor="Gainsboro";	
		document.getElementById('upcons6').readOnly=false;
		document.getElementById('upcons6').style.backgroundColor="Gainsboro";	
		document.getElementById('qcosum6').readOnly=false;
		document.getElementById('qcosum6').style.backgroundColor="Gainsboro";	
		
		document.getElementById('aact6').readOnly=false;
		document.getElementById("aact6").style.backgroundColor="Gainsboro";	
		document.getElementById('upacte6').readOnly=false;
		document.getElementById('upacte6').style.backgroundColor="Gainsboro";	
		document.getElementById('qacte6').readOnly=false;
		document.getElementById('qacte6').style.backgroundColor="Gainsboro";	
		
		document.getElementById('eexe6').readOnly=false;
		document.getElementById("eexe6").style.backgroundColor="Gainsboro";	
		document.getElementById('upex6').readOnly=false;
		document.getElementById('upex6').style.backgroundColor="Gainsboro";	
		document.getElementById('qex6').readOnly=false;
		document.getElementById('qex6').style.backgroundColor="Gainsboro";	

				

		document.getElementById('hhosp6').readOnly=false;
		document.getElementById("hhosp6").style.backgroundColor="Gainsboro";	
		document.getElementById('uphosp6').readOnly=false;
		document.getElementById('uphosp6').style.backgroundColor="Gainsboro";	
		document.getElementById('qhosp6').readOnly=false;
		document.getElementById('qhosp6').style.backgroundColor="Gainsboro";	


	}
	

}
function edit7(){
	var a=document.getElementById('mmed7');

	if(a.readOnly= true){
		document.getElementById('mmed7').readOnly=false;
		document.getElementById("mmed7").style.backgroundColor="Gainsboro";	
		document.getElementById('up7').readOnly=false;
		document.getElementById('up7').style.backgroundColor="Gainsboro";	
		document.getElementById('qmed7').readOnly=false;
		document.getElementById('qmed7').style.backgroundColor="Gainsboro";	
		document.getElementById('ccons7').readOnly=false;
		document.getElementById("ccons7").style.backgroundColor="Gainsboro";	
		document.getElementById('upcons7').readOnly=false;
		document.getElementById('upcons7').style.backgroundColor="Gainsboro";	
		document.getElementById('qcosum7').readOnly=false;
		document.getElementById('qcosum7').style.backgroundColor="Gainsboro";	
		
		document.getElementById('aact7').readOnly=false;
		document.getElementById("aact7").style.backgroundColor="Gainsboro";	
		document.getElementById('upacte7').readOnly=false;
		document.getElementById('upacte7').style.backgroundColor="Gainsboro";	
		document.getElementById('qacte7').readOnly=false;
		document.getElementById('qacte7').style.backgroundColor="Gainsboro";	
		
		document.getElementById('eexe7').readOnly=false;
		document.getElementById("eexe7").style.backgroundColor="Gainsboro";	
		document.getElementById('upex7').readOnly=false;
		document.getElementById('upex7').style.backgroundColor="Gainsboro";	
		document.getElementById('qex7').readOnly=false;
		document.getElementById('qex7').style.backgroundColor="Gainsboro";	


		document.getElementById('hhosp7').readOnly=false;
		document.getElementById("hhosp7").style.backgroundColor="Gainsboro";	
		document.getElementById('uphosp7').readOnly=false;
		document.getElementById('uphosp7').style.backgroundColor="Gainsboro";	
		document.getElementById('qhosp7').readOnly=false;
		document.getElementById('qhosp7').style.backgroundColor="Gainsboro";	



	}
	

}
</script>
   <script> 
   $(function() {
  var checkbox = $("#List2");
  var hidden = $("#hidden_field");
  hidden.hide();
  checkbox.change(function() {
    if (checkbox.is(':checked')) {
      hidden.show();
	  document.getElementById("hidden_field").disabled = false;
	  document.getElementById("hidden_field").value = "1";
    } else {
      hidden.hide();
	  document.getElementById("hidden_field").disabled = true;
	  	  document.getElementById("hidden_field").value = "";


    }
  });
});
</script> 
<style>
input#bigbutton {
width:250px;
background: #3e9cbf; /*the colour of the button*/
padding: 8px 14px 10px; /*apply some padding inside the button*/
border:1px solid #3e9cbf; /*required or the default border for the browser will appear*/
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
/*style the text*/
font-size:1.5em;
font-family:Oswald, sans-serif; /*Oswald is available from http://www.google.com/webfonts/specimen/Oswald*/
letter-spacing:.1em;
text-shadow: 0 -1px 0px rgba(0, 0, 0, 0.3); /*give the text a shadow - doesn't appear in Opera 12.02 or earlier*/
color: #fff;
/*use box-shadow to give the button some depth - see cssdemos.tupence.co.uk/box-shadow.htm#demo7 for more info on this technique*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
/*give the corners a small curve*/
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
}
/***SET THE BUTTON'S HOVER AND FOCUS STATES***/
input#bigbutton:hover, input#bigbutton:focus {
color:#dfe7ea;
/*reduce the size of the shadow to give a pushed effect*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
}

</style>



