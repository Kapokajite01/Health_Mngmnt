<?php
error_reporting(0);
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];	
	$userid = $_SESSION['sess_user_id'];
     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Maternite"){
      header('Location: logout');
	}
include_once('connect_db.php');
$postedesante = $_SESSION['sess_postdsante'];
    $query_group_list = "select diagnisticId,diaName from diagnostics order by diaName";
	
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
   <script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 200) {
          val.value = val.value.substring(0, 200);
        } else {
          $('#charNum').text(200 - len);
        }
      };
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
		<?php include_once('menumat2.php')?>

<?php
session_start();
$affnumber = $_GET['affid'];
$dtconsult = $_GET['dtconsult'];
$patientnumber = $_GET['affid'];


$key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
 $encrypted = $patientnumber;
 $encrypted = preg_replace('/\s+/', '+', $encrypted);
 
 function my_decrypt($data, $key) {
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}
$decrypted = my_decrypt($encrypted, $key);
$patientnumber = $decrypted ;
$_SESSION['affnumber'] = $patientnumber;

$_SESSION['sess_name'] = $patientnumber ;
$_SESSION['sespatientnumber'] = $patientnumber;
$dt = $_GET['dtconsult'];
$_SESSION['mydate'] = $dt;
$labo  = ("select * from consom_labs WHERE patient_id = '$patientnumber'");
$labores = mysqli_query($conn, $labo);
if ($labores->num_rows > 0) {
while ($rowlab = mysqli_fetch_assoc($labores)) {
$exemens[] = $rowlab['examen'];	
$qtties[] = $rowlab['examen_qty'];	
$prices[] = $rowlab['examen_price'];	
$results[] = $rowlab['results'];
$Noexamen[] = $rowlab['Noexamen'];

}
$ntable = COUNT($exemens);
}
$diagnodiffer="SELECT * FROM doctor_comments WHERE patient_id = '$patientnumber' and type='Diagnostic Diferenciel'";
$ddifferenc= mysqli_query($conn, $diagnodiffer);

while($rowddiffer= mysqli_fetch_assoc($ddifferenc)){
	$examendifferenc =  $rowddiffer['comment'];
}



$resultpa = ("select id,names,lname,insurance,affiliate_number,consultatiom,date from patient where id ='$patientnumber' order by id DESC LIMIT 1");
$pat = mysqli_query($conn, $resultpa);
while ($rowval = mysqli_fetch_assoc($pat)) {
   $afnumber= $rowval['affiliate_number'];
   $patumber= $rowval['affiliate_number'];
   $firstname=  $rowval['names'];
   $_SESSION['firstname']= $firstname;
   $lastname=  $rowval['lname'];
   $_SESSION['lastname'] = $lastname;
   $_SESSION['dastofexamen']= $rowval['date'];
   $insurance=  $rowval['insurance'];
   $_SESSION['insurance'] = $insurance;
   $cosnult= $rowval['consultatiom'];
   $patinetid= $rowval['id'];
}
$checkamb = $_SESSION['checkamb'];
	$km = $_SESSION['km'];


$redirect = $_SESSION['redirect'];
if($redirect == 'yes'){
echo "<script>
setTimeout(function () {
   window.location.href= 'consultation';
}, 1000);
</script>";
	
}?>
	<!-- MAIN CONTENT -->
	<div id="content">
                              <button class="dropdown-item" ><strong><i class="fa fa- fa-retweet"></i><a href="javascript: void(0)"  style="text-decoration: none;" onclick="popup01('return_results')">Results</a></button>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            
          
                             <button class="dropdown-item" >
                              <i class="fa fa-times text-danger fa-fw"></i><a href="javascript: void(0)"  style="text-decoration: none;" onclick="popup01('return_patient')"><strong>Redirect Patient </strong></a></button>						  

</div>
		<div class="page-full-width cf">
<div class="content-module"><div class="content-module-main cf">
<form id="patient" name="patient" method="POST" action="savematernite">

<table  style="display:none"> <tr><td>
<input type ="text" name="thisdate" value="<?php echo $dt;?>" >
<input type="text" name="nid1" id="nid1" style="display:none">
<input type="text" name="nid2" id="nid2" style="display:none">
<input type="text" name="nid3" id="nid3" style="display:none">
<input type="text" name="nid4" id="nid4" style="display:none">
<input type="text" name="nid5" id="nid5" style="display:none">
<input type="text" name="nid6" id="nid6" style="display:none">
<input type="text" name="nid7" id="nid7" style="display:none">


<input type="text" name="nidc1" id="nidc1" style="display:none">
<input type="text" name="nidc2" id="nidc2" style="display:none">
<input type="text" name="nidc3" id="nidc3" style="display:none">
<input type="text" name="nidc4" id="nidc4" style="display:none">
<input type="text" name="nidc5" id="nidc5" style="display:none">
<input type="text" name="nidc6" id="nidc6" style="display:none">
<input type="text" name="nidc7" id="nidc7" style="display:none">
</td><td><strong>NUMBER :&nbsp;&nbsp;</strong><strong><input size="25" id="number" name="number"  value="<?php echo $afnumber;?>"  class="element text large" type="text"  style=" border: 5px" required></strong>
<input type="text" name="p_id" id="p_id" value="<?php echo $patinetid;?>"required aria-required="true" aria-describedby="name-format" style="display:none"></td><td><strong>NAMES   :&nbsp;&nbsp;<input id="name" name="name" value="<?php echo $firstname;?>" class="element text large" type="text" style="border: 0px" size="50" required aria-required="true" aria-describedby="name-format" >
</td><td><input id="lname" name="lname" value="<?php echo $lastname;?>" class="element text large" type="text" style="border: 0px" size="50" required aria-required="true" aria-describedby="name-format" ></td><td></tr>
<tr><td></td><td><strong>Consultation :&nbsp;&nbsp;</strong><input id="consultation" name="consultation" size="5" value="<?php echo $cosnult;?>" class="element text large" type="text" style="border: 0px" required aria-required="true" aria-describedby="name-format" ></td><td><strong>INSURANCE   :&nbsp;&nbsp;<input id="insurance" name="insurance" value="<?php echo $insurance;?>" class="element text large" type="text" style="border: 0px" required aria-required="true" aria-describedby="name-format"></td><td></td></tr>
<tr ><td><strong>Medicines</strong></td><td><strong>Consumables</strong></td><td><strong><b>Medical acts</strong></td><td><strong>Lab tests</strong></td><td><strong>Hospitalizations</strong></td></tr>
<tr><td><label name="lebmedicine1" id="lebmedicine1" style="float: left"><strong> </strong></label><input type="text" id="mmed1" name="mmed1" value= "" readonly style ="float: left; border: 0px"><input type="text" name ="id1" id="id1" style="display:none"><input type="text" id="up1" name="up1" size="4" value="" readonly style="float: right;border: 0px" onkeypress='return event.charCode >= 48 && event.charCode <= 57'><input type="text" id="qmed1" name="qmed1" size="3" value = ""readonly style="float: right; border: 0px"></td><td><label name="leb1" id="lebmedicine1" style="float: left; border: 0px"><strong> </strong></label><input type="text" id="ccons1" name="ccons1" style="float: left; border: 0px"value = "" readonly><input type="text" name="idc1" id="idc1" style="display:none"/><input type="text" id="upcons1" name="upcons1" size="7" style="float: right; border: 0px" value = "" readonly><input type="text" id="qcosum1" name="qcosum1" size="7" style="float: right; border: 0px" value = "" readonly></td><td><label name="lebact1" id="lebact1" style="float: left"><strong> </strong></label><input type="text" id="aact1" name="aact1"value = "" readonly style="float: left; border: 0px"><input type="text" id="upacte1" name="upacte1" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qacte1" name="qacte1" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="text" id="eex1" name="eex1" value = "<?php if($exemens[0])echo $exemens[0];?>" readonly style="float: left; border: 0px"><input type="text" id="upex1" name="upex1" size="7" value = "<?php if($prices[0])echo $prices[0];?>" readonly style="float: right; border: 0px"><input type="text" id="qex1" name="qex1" size="7" value = "<?php if($qtties[0])echo $qtties[0];?>" readonly style="float: right; border: 0px"></td><td><input type="text" id="hhosp1" name="hhosp1" value = "" readonly style="float: left; border: 0px"><input type="text" id="uphosp1" name="uphosp1" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qhosp1" name="qhosp1" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="button" name="activate" value="Edit" onclick="edit1()"/></td></tr>
<tr><td><label name="lebmedicine2" id="lebmedicine2" style="float: left"><strong> </strong></label><input type="text" id="mmed2" name="mmed2" value = "" readonly style="float: left; border: 0px"><input type="text" name ="id2" id="id2" style="display:none"><input type="text" id="up2" name="up2" size="4" value="" readonly style="float: right;border: 0px"><input type="text" id="qmed2" name="qmed2" size="3" value = ""readonly style="float: right; border: 0px"></td><td><label name="leb2" id="lebmedicine2" style="float: left; border: 0px"><strong> </strong></label><input type="text" id="ccons2" name="ccons2" style="float: left; border: 0px"value = "" readonly><input type="text" name="idc2" id="idc2" style="display:none"/><input type="text" id="upcons2" name="upcons2" size="7" style="float: right; border: 0px" value = "" readonly><input type="text" id="qcosum2" name="qcosum2" size="7" style="float: right; border: 0px" value = "" readonly></td><td><label name="lebact2" id="lebact2" style="float: left"><strong> </strong></label><input type="text" id="aact2" name="aact2"value = "" readonly style="float: left; border: 0px"><input type="text" id="upacte2" name="upacte2" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qacte2" name="qacte2" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="text" id="eexe2" name="eexe2" value = "<?php if($exemens[1])echo $exemens[1];?>" readonly style="float: left; border: 0px"><input type="text" id="upex2" name="upex2" size="7" value = "<?php if($prices[1])echo $prices[1];?>" readonly style="float: right; border: 0px"><input type="text" id="qex2" name="qex2" size="7" value = "<?php if($qtties[1])echo $qtties[1];?>" readonly style="float: right; border: 0px"></td><td><input type="text" id="hhosp2" name="hhosp2" value = "" readonly style="float: left; border: 0px"><input type="text" id="uphosp2" name="uphosp2" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qhosp2" name="qhosp2" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="button" name="activate" value="Edit" onclick="edit2()"/></td></tr>
<tr><td><label name="lebmedicine3" id="lebmedicine3" style="float: left"><strong> </strong></label><input type="text" id="mmed3" name="mmed3" value = "" readonly style="float: left; border: 0px"><input type="text" name ="id3" id="id3" style="display:none"><input type="text" id="up3" name="up3" size="4" value="" readonly style="float: right;border: 0px"><input type="text" id="qmed3" name="qmed3" size="3" value = ""readonly style="float: right; border: 0px"></td><td><label name="leb3" id="lebmedicine3" style="float: left; border: 0px"><strong> </strong></label><input type="text" id="ccons3" name="ccons3" style="float: left; border: 0px"value = "" readonly><input type="text" name="idc3" id="idc3" style="display:none"/><input type="text" id="upcons3" name="upcons3" size="7" style="float: right; border: 0px" value = "" readonly><input type="text" id="qcosum3" name="qcosum3" size="7" style="float: right; border: 0px" value = "" readonly></td><td><label name="lebact3" id="lebact3" style="float: left"><strong> </strong></label><input type="text" id="aact3" name="aact3"value = "" readonly style="float: left; border: 0px"><input type="text" id="upacte3" name="upacte3" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qacte3" name="qacte3" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="text" id="eexe3" name="eexe3" value = "<?php if($exemens[2])echo $exemens[2];?>" readonly style="float: left; border: 0px"><input type="text" id="upex3" name="upex3" size="7" value = "<?php if($prices[2])echo $prices[2];?>" readonly style="float: right; border: 0px"><input type="text" id="qex3" name="qex3" size="7" value = "<?php if($qtties[2])echo $qtties[2];?>" readonly style="float: right; border: 0px"></td><td><input type="text" id="hhosp3" name="hhosp3" value = "" readonly style="float: left; border: 0px"><input type="text" id="uphosp3" name="uphosp3" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qhosp3" name="qhosp3" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="button" name="activate" value="Edit" onclick="edit3()"/></td></tr>
<tr><td><label name="lebmedicine4" id="lebmedicine4" style="float: left"><strong> </strong></label><input type="text" id="mmed4" name="mmed4" value = "" readonly style="float: left; border: 0px"><input type="text" name ="id4" id="id4" style="display:none"><input type="text" id="up4" name="up4" size="4" value="" readonly style="float: right;border: 0px"><input type="text" id="qmed4" name="qmed4" size="3" value = ""readonly style="float: right; border: 0px"></td><td><label name="leb4" id="lebmedicine4" style="float: left; border: 0px"><strong> </strong></label><input type="text" id="ccons4" name="ccons4" style="float: left; border: 0px"value = "" readonly><input type="text" name="idc4" id="idc4" style="display:none"/><input type="text" id="upcons4" name="upcons4" size="7" style="float: right; border: 0px" value = "" readonly><input type="text" id="qcosum4" name="qcosum4" size="7" style="float: right; border: 0px" value = "" readonly></td><td><label name="lebact3" id="lebact4" style="float: left"><strong> </strong></label><input type="text" id="aact4" name="aact4"value = "" readonly style="float: left; border: 0px"><input type="text" id="upacte4" name="upacte4" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qacte4" name="qacte4" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="text" id="eexe4" name="eexe4" value = "<?php if($exemens[3])echo $exemens[3];?>" readonly style="float: left; border: 0px"><input type="text" id="upex4" name="upex4" size="7" value = "<?php if($prices[3])echo $prices[3];?>" readonly style="float: right; border: 0px"><input type="text" id="qex4" name="qex4" size="7" value = "<?php if($qtties[3])echo $qtties[3];?>" readonly style="float: right; border: 0px"></td><td><input type="text" id="hhosp4" name="hhosp4" value = "" readonly style="float: left; border: 0px"><input type="text" id="uphosp4" name="uphosp4" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qhosp4" name="qhosp4" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="button" name="activate" value="Edit" onclick="edit4()"/></td></tr>
<tr><td><label name="lebmedicine5" id="lebmedicine5" style="float: left"><strong> </strong></label><input type="text" id="mmed5" name="mmed5" value = "" readonly style="float: left; border: 0px"><input type="text" name ="id5" id="id5" style="display:none"><input type="text" id="up5" name="up5" size="4" value="" readonly style="float: right;border: 0px"><input type="text" id="qmed5" name="qmed5" size="3" value = ""readonly style="float: right; border: 0px"></td><td><label name="leb4" id="lebmedicine5" style="float: left; border: 0px"><strong> </strong></label><input type="text" id="ccons5" name="ccons5" style="float: left; border: 0px"value = "" readonly><input type="text" name="idc5" id="idc5" style="display:none"/><input type="text" id="upcons5" name="upcons5" size="7" style="float: right; border: 0px" value = "" readonly><input type="text" id="qcosum5" name="qcosum5" size="7" style="float: right; border: 0px" value = "" readonly></td><td><label name="lebact4" id="lebact5" style="float: left"><strong> </strong></label><input type="text" id="aact5" name="aact5"value = "" readonly style="float: left; border: 0px"><input type="text" id="upacte5" name="upacte5" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qacte5" name="qacte5" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="text" id="eexe5" name="eexe5" value = "<?php if($exemens[4])echo $exemens[4];?>" readonly style="float: left; border: 0px"><input type="text" id="upex5" name="upex5" size="7" value = "<?php if($prices[4])echo $prices[4];?>" readonly style="float: right; border: 0px"><input type="text" id="qex5" name="qex5" size="7" value = "<?php if($qtties[4])echo $qtties[4];?>" readonly style="float: right; border: 0px"></td><td><input type="text" id="hhosp5" name="hhosp5" value = "" readonly style="float: left; border: 0px"><input type="text" id="uphosp5" name="uphosp5" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qhosp5" name="qhosp5" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="button" name="activate" value="Edit" onclick="edit5()"/></td></tr>
<tr><td><label name="lebmedicine6" id="lebmedicine6" style="float: left"><strong> </strong></label><input type="text" id="mmed6" name="mmed6" value = "" readonly style="float: left; border: 0px"><input type="text" name ="id6" id="id6" style="display:none"><input type="text" id="up6" name="up6" size="4" value="" readonly style="float: right;border: 0px"><input type="text" id="qmed6" name="qmed6" size="3" value = ""readonly style="float: right; border: 0px"></td><td><label name="leb4" id="lebmedicine6" style="float: left; border: 0px"><strong> </strong></label><input type="text" id="ccons6" name="ccons6" style="float: left; border: 0px"value = "" readonly><input type="text" name="idc6" id="idc6" style="display:none"/><input type="text" id="upcons6" name="upcons6" size="7" style="float: right; border: 0px" value = "" readonly><input type="text" id="qcosum6" name="qcosum6" size="7" style="float: right; border: 0px" value = "" readonly></td><td><label name="lebact6" id="lebact6" style="float: left"><strong> </strong></label><input type="text" id="aact6" name="aact6"value = "" readonly style="float: left; border: 0px"><input type="text" id="upacte6" name="upacte6" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qacte6" name="qacte6" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="text" id="eexe6" name="eexe6" value = "<?php if($exemens[5])echo $exemens[5];?>" readonly style="float: left; border: 0px"><input type="text" id="upex6" name="upex6" size="7" value = "<?php if($prices[5])echo $prices[5];?>" readonly style="float: right; border: 0px"><input type="text" id="qex6" name="qex6" size="7" value = "<?php if($qtties[5])echo $qtties[5];?>" readonly style="float: right; border: 0px"></td><td><input type="text" id="hhosp6" name="hhosp6" value = "" readonly style="float: left; border: 0px"><input type="text" id="uphosp6" name="uphosp6" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qhosp6" name="qhosp6" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="button" name="activate" value="Edit" onclick="edit6()"/></td></tr>
<tr><td><label name="lebmedicine7" id="lebmedicine7" style="float: left"><strong> </strong></label><input type="text" id="mmed7" name="mmed7" value = "" readonly style="float: left; border: 0px"><input type="text" name ="id7" id="id7" style="display:none"><input type="text" id="up7" name="up7" size="4" value="" readonly style="float: right;border: 0px"><input type="text" id="qmed7" name="qmed7" size="3" value = ""readonly style="float: right; border: 0px"></td><td><label name="leb4" id="lebmedicine7" style="float: left; border: 0px"><strong> </strong></label><input type="text" id="ccons7" name="ccons7" style="float: left; border: 0px"value = "" readonly><input type="text" name="idc7" id="idc7" style="display:none"/><input type="text" id="upcons7" name="upcons7" size="7" style="float: right; border: 0px" value = "" readonly><input type="text" id="qcosum7" name="qcosum7" size="7" style="float: right; border: 0px" value = "" readonly></td><td><label name="lebact7" id="lebact7" style="float: left"><strong> </strong></label><input type="text" id="aact7" name="aact7"value = "" readonly style="float: left; border: 0px"><input type="text" id="upacte7" name="upacte7" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qacte7" name="qacte7" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="text" id="eexe7" name="eexe7" value = "<?php if($exemens[6])echo $exemens[6];?>" readonly style="float: left; border: 0px"><input type="text" id="upex7" name="upex7" size="7" value = "<?php if($prices[6])echo $prices[6];?>" readonly style="float: right; border: 0px"><input type="text" id="qex7" name="qex7" size="7" value = "<?php if($qtties[6])echo $qtties[6];?>" readonly style="float: right; border: 0px"></td><td><input type="text" id="hhosp7" name="hhosp7" value = "" readonly style="float: left; border: 0px"><input type="text" id="uphosp7" name="uphosp7" size="7" value = "" readonly style="float: right; border: 0px"><input type="text" id="qhosp7" name="qhosp7" size="7" value = "" readonly style="float: right; border: 0px"></td><td><input type="button" name="activate" value="Edit" onclick="edit7()"/></td></tr>

</table>
<table style="width: 60%;margin:  0px auto;" align="center">
<tr><td valign="top" align="left">
<span style="background-color:black"><font color="white">
<strong>Name:&nbsp;&nbsp;<?php echo $firstname;?>&nbsp;&nbsp;<?php echo $lastname;?></strong><br><br>
<strong>Insurance :&nbsp;&nbsp;<?php echo $insurance;?><br><br>
<strong>Number:&nbsp;&nbsp;<?php echo $afnumber;?><br><br>
<strong>Date:&nbsp;&nbsp;<?php echo $newDate = date("d-m-Y", strtotime($dt));?><br><br>
</td><td>
<fieldset style="background:#ffffff;width: 100%;margin:  0px auto;" align="center">
        <legend style="padding:20px 0; font-size:15px;"><b></b></legend>
<div align="center">
<table style=" margin-left: 30%;">
	<tr><td >	 <input type="checkbox" name="List1" id="List1" value="100" onclick="addUp(100, 'List1')"><strong>Fiche de Transfert (100 Frw)</td></tr>
	<tr><td><input type="checkbox" name="List3"  id="List3"  value="20" checked onClick="addUp(20, 'List3')"><strong>Fiche de Consultation (20 Frw)</td></tr>
	<?php if ( $category!=1)
	{
		?><tr><td><input type="checkbox" name="List4"  id="List4"  value="Ticketmod" onClick="addUp(200, 'List4')"><strong><span style="text-decoration:line-through">Null Ticket Moderateur</span></td></tr>
		<?php
		}
		?>
		</table>
		<strong>Ambullance</strong>&nbsp;&nbsp;&nbsp;<input type="checkbox"  name ="checkamb" value="ambChecked" onclick="var input = document.getElementById('ambullance'); if(this.checked){ input.disabled = false; input.focus();input.value='';}else{input.disabled=true;input.value=0;input.value=0;}" />Km<input type="text" id="ambullance" name="ambullance" disabled="disabled" size = "5px"  required/><br><br><br>
		</div>
      </fieldset>
	  <fieldset style="background:#eee;width: 100%;margin:  0px auto;" align="center">
 <table style="background:#eee;width: 100%;margin:  0px auto;" align="center" >
 
 <tr><td align="center">
 <?php
 if($examendifferenc)
 {
 ?>
 <fieldset style="background:#e1eff2;width: 100%; " disabled><legend>
 <span id="myBtn" style=" display: inline-block;background-color: #7b38d8;border-radius: 10px;border: 4px double #cccccc;color: #eeeeee;  text-align: center;font-size: 14px; padding: 20px;width: 200px;-webkit-transition: all 0.5s;-moz-transition: all 0.5s;-o-transition: all0.5s;transition: all 0.5s; cursor: pointer;margin: 5px;"> DIAGNOSTIC(S)</span><br><font color="red"> Required !!!</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </strong></legend><textarea  name="diffenrenciel"  id="diffenrenciel"  rows="2" cols="60"  onkeyup="countChar(this)"  required ><?php echo $examendifferenc;?></textarea></fieldset><font color="red"><strong><div id="charNum" style="margin-left: 55%"></div ></font><strong>Characters Remain</strong>
 
 <?php
 }
 else
 {
 ?>
 <fieldset style="background:#e1eff2;width: 40%; "><legend>
 <span id="myBtn" style=" display: inline-block;background-color: #7b38d8;border-radius: 10px;border: 4px double #cccccc;color: #eeeeee;  text-align: center;font-size: 14px; padding: 20px;width: 200px;-webkit-transition: all 0.5s;-moz-transition: all 0.5s;-o-transition: all0.5s;transition: all 0.5s; cursor: pointer;margin: 5px;left:20%;"> DIAGNOSTIC(S)</span><br><font color="red"> Required !!!</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </strong></legend><textarea  name="diffenrenciel" id="diffenrenciel"  rows="2" cols="60"  onkeyup="countChar(this)"  required ><?php echo $examendifferenc;?></textarea></fieldset><font color="red"><strong><div id="charNum" style="margin-left: 55%"></div ></font><strong>Characters Remain</strong>
 
 <?php
 }
 ?>
 
 </td></tr></td>
</table>
<table style="background:#eee;width: 30%;margin:  0px auto;" align="center" >
 </table>
</fieldset>

</td></tr></table>
 <fieldset style="background:#eee;width: 80%;margin:  0px auto;" align="center">
        <legend style="padding:20px 0; font-size:15px;">Consumptions</legend>
<table   id="otherdisplay" style="background:#ffffff;width: 80%;margin:  0px auto;" align="center" border="1">
<tr><td>

 <fieldset style="background:#e1eff2;width: 20%; ">
        <legend style="padding:20px 0; font-size:15px;"><ul id="tabs" class="fl">
				<div align="center"><a href="javascript: void(0)"   onclick="popup('medicines')"><font color="black"><strong>MEDICINES</strong></font></a></div><hr>
				</ul>
				</legend>
<p><strong>
<?PHP
$tempmedicine  = ("select * from temp_medicament WHERE patient_id  = '$patientnumber' AND date = '$dt'");
$temmed = mysqli_query($conn, $tempmedicine);

	if ($temmed->num_rows > 0) {
		?>
<table>
<tr><td><strong>No</strong><hr></td><td><strong>Medicine</strong><hr></td><td><strong>Quantity</strong><hr></td><td><strong>Price</strong><hr></td><td><strong>Total</strong><hr></td><tr>
  <?php
//Medicines
while ($rowmed = mysqli_fetch_assoc($temmed)) {
	++$ii;
	$totalmedic = $rowmed['quantity']*$rowmed['price'];
	?>
	<tr>
	<td><?php echo $ii;?></td>
	<td><?php echo $rowmed['medicament_descript'];?></td>
	<td><?php echo number_format($rowmed['quantity']);?></td>
	<td><?php echo $rowmed['price'];?></td>
	<td><strong><?php echo $totalmedic;?></strong></td>

	<?php
	$grandtotal =  $grandtotal+$totalmedic;
	echo '</tr>';
	}

?>
<tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo $grandtotal;?></strong></td></tr>  
</table>

<?php
	}
	else{
		echo "<span> <font color='Red'> No Mecine </font></span>";
		
	}
?>

</strong>
		</p>
      </fieldset></td><td>
	   <fieldset style="background:#e1eff2;width: 20%; ">
        <legend style="padding:20px 0; font-size:15px;"><ul id="tabs" class="fl">
				<div align="center"><a href="javascript: void(0)"   onclick="popup('consumptions')"><font color="black"><strong>CONSUMABLES</strong></font></a></div><hr>
				</ul></legend>
<p><strong>
<?PHP
$tempconsum = ("select * from temp_consommable WHERE patient_id  = '$patientnumber'  AND date = '$dt'");
$temcons= mysqli_query($conn, $tempconsum);

	if ($temcons->num_rows > 0) {
		?>
<table>
<tr><td><strong>No</strong><hr></td><td><strong>Consumable</strong><hr></td><td><strong>Quantity</strong><hr></td><td><strong>Price</strong><hr></td><td><strong>Total</strong><hr></td><tr>
  <?php

while ($rowcons= mysqli_fetch_assoc($temcons)) {
	++$ij;
	$totalcons = $rowcons['quantity']*$rowcons['price'];
	?>
	<tr>
	<td><?php echo $ij;?></td>
	<td><?php echo $rowcons['cons_description'];?></td>
	<td><?php echo number_format($rowcons['quantity']);?></td>
	<td><?php echo number_format($rowcons['price']);?></td>
	<td><strong><?php echo $totalcons;?></strong></td>

	<?php
	$grandtotalcons =  $grandtotalcons+$totalcons;
	echo '</tr>';
	}

?>
<tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo $grandtotalcons;?></strong></td></tr>  
</table><?php
	}
	else{
		echo "<span> <font color='Red'> No Consumables </font></span>";
		
	}
?></strong>
		</p>
      </fieldset>
	  </td><td> <fieldset style="background:#e1eff2;width: 20%; ">
        <legend style="padding:20px 0; font-size:15px;"><ul id="tabs" class="fl">
				<div align="center"><a href="javascript: void(0)"   onclick="popup('medicalacts')"><font color="black"><strong>MEDICAL ACTS</strong></font></a></div><hr>
				</ul></legend>
		<p><strong>
		<?PHP
$tempactemed = ("select * from temp_actemed WHERE patient_id  = '$patientnumber'  AND date = '$dt'");
$actcons= mysqli_query($conn, $tempactemed);

	if ($actcons->num_rows > 0) {
		?>
<table>
<tr><td><strong>No</strong><hr></td><td><strong>Medical Act</strong><hr></td><td><strong>Quantity</strong><hr></td><td><strong>Price</strong><hr></td><td><strong>Total</strong><hr></td><tr>
  <?php
while ($rowmact= mysqli_fetch_assoc($actcons)) {
	++$ijk;
	$totalmedact = $rowmact['quantity']*$rowmact['price'];
	?>
	<tr>
	<td><?php echo $ijk;?></td>
	<td><?php echo $rowmact['acte_description'];?></td>
	<td><?php echo number_format($rowmact['quantity']);?></td>
	<td><?php echo $rowmact['price'];?></td>
	<td><strong><?php echo $totalmedact;?></strong></td>

	<?php
	$grandtotalmedact =  $grandtotalmedact+$totalmedact;
	echo '</tr>';
	}

?>
<tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo $grandtotalmedact;?></strong></td></tr>  
</table><?php
	}
	else{
		echo "<span> <font color='Red'> No Act </font></span>";
		
	}
?></strong>
		</p>
      </fieldset></td><td> <fieldset style="background:#e1eff2;width: 20%; ">
        <legend style="padding:20px 0; font-size:15px;"><ul id="tabs" class="fl">
				<div align="center"><strong>Examens</strong></font></div><hr>
				</ul></legend>
		<p><strong>
		<?PHP
		$labores = mysqli_query($conn, $labo);
	if ($labores->num_rows > 0) {
		?>
<table>
<tr><td><strong>No<hr></strong></td><td><strong>Examens<hr></strong></td><td><strong>Quantity<hr></strong></td><td><strong>Price<hr></strong></td><td><strong>Total<hr></strong></td><td><strong>Results<hr></strong></td><tr>
  <?php

while ($rowlab = mysqli_fetch_assoc($labores)) {
	++$ijklm;
	$totalExamen= $rowlab['examen_qty']*$rowlab['examen_price'];
	?>
	<tr>
	<td><?php echo $ijklm;?></td>
	<td><?php echo $rowlab['examen'];?></td>
	<td><?php echo number_format($rowlab['examen_qty']);?></td>
	<td><?php echo $rowlab['examen_price'];?></td>
	<td><?php echo $totalExamen;?></td>
	<td><?php echo $rowlab['results'];?></td>
	<?php
	$grandtotalExamen =  $grandtotalExamen+$totalExamen;
	echo '</tr>';
	}

?>
<tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo $grandtotalExamen;?></strong></td></tr>  
</table><?php
	}
	else{
		echo "<span> <font color='Red'> No Examen </font></span>";
		
	}
?></strong>
		</p>
      </fieldset></td><td> <fieldset style="background:#e1eff2;width: 20%; ">
        <legend style="padding:20px 0; font-size:15px;"><ul id="tabs" class="fl">
			<div align="center"><a href="javascript: void(0)"   onclick="popup('hospitalizations')"><font color="black"><strong>HOSPITALIZATIONS</strong></font></a></div><hr>
				</ul></legend>
		<p><strong>
		<?PHP
$temphospt = ("select * from temp_hospitlzation WHERE patient_id  = '$patientnumber'  AND date = '$dt'");
$temphosp= mysqli_query($conn, $temphospt);

	if ($temphosp->num_rows > 0) {
		?>
<table>
<tr><td><strong>No</strong><hr></td><td><strong>Hospitalization</strong><hr></td><td><strong>Quantity</strong><hr></td><td><strong>Price</strong><hr></td><td><strong>Total</strong><hr></td><tr>
  <?php
while ($rowhospt= mysqli_fetch_assoc($temphosp)) {
	++$ijkl;
	$totalhosp = $rowhospt['quantity']*$rowhospt['price'];
	?>
	<tr>
	<td><?php echo $ijkl;?></td>
	<td><?php echo $rowhospt['temphospdescr'];?></td>
	<td><?php echo number_format($rowhospt['quantity']);?></td>
	<td><?php echo $rowhospt['price'];?></td>
	<td><?php echo $totalhosp;?></td>

	<?php
	$grandtotalhsopital =  $grandtotalhsopital+$totalhosp;
	echo '</tr>';
	}

?>
<tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo $grandtotalhsopital;?></strong></td></tr>  
</table><?php
	}
	else{
		echo "<span> <font color='Red'> No Hospitalization </font></span>";
		
	}
?></strong>
		</p>
      </fieldset></td></tr></table>
	   <br>
<input name="bigbutton" id="bigbutton" type="submit" value="Submit" /><br><br>

</form>
 </div>
 

					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div></div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
<!-- FOOTER -->
	<div id="footer">

		<p>Powed By Vision Soft Ltd .</p>
			<hr></hr>
	</div> <!-- end footer -->
</body>

</html>

<script>
function popup(url) 
{
 var width  = 1200;
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
// -->
</script>
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

<style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 25%;
  top: 0;
  width: 50%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>


<!-- Trigger/Open The Modal -->


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times; <font color="red">Close</font></span>
 <main>
<div><input type="text" id="myInput" onkeyup="searchfunc()" style="width:50%" placeholder="Search diagnostics.." title="Type diagnostics name"><br><br></div>


 <div class="modal-body">
 <ul   class="gradient-list" id='myUL' style = "list-style-type:decimal;">
 <table><tr><td>
 <?php   
         $sql_group_list = mysqli_query($conn, $query_group_list); 
            while($row = mysqli_fetch_array($sql_group_list)){
                $diagnisticId=$row['diagnisticId']; 
                    $diaName=$row['diaName']; 
                       
                           echo"<li class='item'>";
						   ?>
						    <input type="checkbox"  name="vehicle" onClick="checkbox();" value="<?php echo $row['diaName']?>">
							<?php 
						   echo"<a href='#'  class='product-title secondary'>";
						   echo $diaName;
						   echo "</a>"; 
                            echo"</li'>";
                           
			}	 						
?> 

</td></tr></table>
</ul>
</div> 
</main>
  
  </div>
    <hr>   

</div>

 <script>
 function searchfunc() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}</script>
<style>

/*** VARIABLES ***/
/* Colors */
$black: #1d1f20;
$blue: #83e4e2;
$green: #a2ed56;
$yellow: #fddc32;
$white: #fafafa;



/*** EXTEND ***/
/* box-shadow */
%boxshadow {
  box-shadow: 0.25rem 0.25rem 0.6rem rgba(0,0,0,0.05), 0 0.5rem 1.125rem rgba(75,0,0,0.05);
}



/*** STYLE ***/
*,
*:before,
*:after {
  box-sizing: border-box;
}

html,
body {
  margin: 0;
  padding: 0;
}

body {
  background-color: $white;
  color: $black;
  font-family: 'Raleway', sans-serif;
}

main {
  display: block;
  margin: 0 auto;
  max-width: 40rem;
  padding: 1rem;
}


ol.gradient-list {
  counter-reset: gradient-counter;
  list-style: none;
  margin: 1.75rem 0;
  padding-left: 1rem;
  > li {
    background: white;
    border-radius: 0 0.5rem 0.5rem 0.5rem;
    @extend %boxshadow;
    counter-increment: gradient-counter;
    margin-top: 1rem;
    min-height: 3rem;
    padding: 1rem 1rem 1rem 3rem;
    position: relative;
    &::before,
    &::after {
      background: linear-gradient(135deg, $blue 0%,$green 100%);
      border-radius: 1rem 1rem 0 1rem;
      content: '';
      height: 3rem;
      left: -1rem;
      overflow: hidden;
      position: absolute;
      top: -1rem;
      width: 3rem;
    }
    &::before {
      align-items: flex-end;
      @extend %boxshadow;
      content: counter(gradient-counter);
      color: $black;
      display: flex;
      font: 900 1.5em/1 'Montserrat';
      justify-content: flex-end;
      padding: 0.125em 0.25em;
      z-index: 1;
    }
    @for $i from 1 through 5 {
      &:nth-child(10n+#{$i}):before {
        background: linear-gradient(135deg, rgba($green, $i * 0.2) 0%,rgba($yellow, $i * 0.2) 100%);
      }
    }
    @for $i from 6 through 10 {
      &:nth-child(10n+#{$i}):before {
        background: linear-gradient(135deg, rgba($green, 1 - (($i - 5) * 0.2)) 0%,rgba($yellow, 1 - (($i - 5) * 0.2)) 100%);
      }
    }
    + li {
      margin-top: 2rem;
    }
  }
}


</style>
<script>
function checkbox(){
  
  var checkboxes = document.getElementsByName('vehicle');
  var checkboxesChecked = [];
  // loop over them all
  for (var i=0; i<checkboxes.length; i++) {
     // And stick the checked ones onto an array...
     if (checkboxes[i].checked) {
        checkboxesChecked.push(checkboxes[i].value)+'   -  ';
     }
  }
  document.getElementById("diffenrenciel").value = checkboxesChecked;

}
</script>


<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

