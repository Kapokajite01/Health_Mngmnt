<?php
error_reporting(0);
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Laboratory"){
      header('Location: logout');
	}
include_once('connect_db.php');
$postedesante = $_SESSION['sess_postdsante'];
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
		<?php include_once('lmmenup2.php')?>
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->	

			
				<div class="content-module">				
					
						<div class="content-module-main cf">






<?php
//error_reporting(0);
session_start();
$affnumber = $_GET['affid'];
$dtconsult = $_GET['dtconsult'];
$patientnumber = $_GET['affid'];

$key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
 $encrypted = $affnumber;
 $encrypted = preg_replace('/\s+/', '+', $encrypted);
 
 function my_decrypt($data, $key) {
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}
$decrypted = my_decrypt($encrypted, $key);
$patientnumber = $decrypted ;
$mpatientid= $patientnumber;
$datelab = $_GET['LDTlab'];
$resultpa = ("select id,names,lname,insurance,affiliate_number,consultatiom from patient where id ='$mpatientid'");

$pat = mysqli_query($conn, $resultpa);
while ($rowval = mysqli_fetch_assoc($pat)) {
   $afnumber= $rowval['affiliate_number'];
   $firstname=  $rowval['names'];
   $lastname=  $rowval['lname'];
   $insurance=  $rowval['insurance'];
   $cosnult= $rowval['consultatiom'];
   $patinetid= $rowval['id'];
}
$checkamb = $_SESSION['checkamb'];
	$km = $_SESSION['km'];
	$dt = $datelab;


	$labo  = ("select * from consom_labs where patient_id  ='$mpatientid' ");
$labores = mysqli_query($conn, $labo);
while ($rowlab = mysqli_fetch_assoc($labores)) {
$labid[] = $rowlab['lbaconsid'];
$exemens[] = $rowlab['examen'];	
$results[] = $rowlab['results'];	
$qtties[] = $rowlab['examen_qty'];	
$prices[] = $rowlab['examen_price'];	
$examen_id[] = $rowlab['examen_id'];	
}
$Nexamens = COUNT($exemens);

?>

<form id="patient" name="patient" method="POST" action="saveresulsts">

<input type ="text" name="thisdate" value="<?php echo $dt;?>" style="display:none">
<input type="text" name="p_id" id="p_id" value="<?php  echo $mpatientid;?>" required aria-required="true" aria-describedby="name-format" style="display:none" >

 
<table  style="border: 1px solid DarkOrange;border-radius: 23px;  border-spacing: 0;width: 60%;align:center;margin-left:auto;margin-right:auto;">
<tr><td valign="top" ><p><h1>Name:&nbsp;&nbsp;<strong><?php echo $firstname.'&nbsp;&nbsp;&nbsp;&nbsp;'.$lastname?></strong></h1>
<h1>Insurance :&nbsp;&nbsp;<strong><?php echo $insurance;?></strong></h1>
<h1>Insurance NUMBER:&nbsp;&nbsp;<strong><?php echo $afnumber;?></strong></h1>
<h1>Date:&nbsp;&nbsp;<strong><?php echo $newDate = date("d-m-Y", strtotime($datelab));?></strong></h1></p></td><td>
<div align="center">

<?php 
for($exi = 0; $exi < $Nexamens ; $exi++){
	?>
	
 <tr><td><input type="text" name="testid[]" VALUE="<?PHP echo $labid[$exi];?>" style="display:none"> <?php echo '<fieldset style="background:#e1eff2;" ><legend style="font-size:12px; margin-left:auto;margin-right:auto;"><i><strong>[ '.($exi+1).' ] '.$exemens[$exi].'</strong></i></legend> <textarea  name="result[]"  id="result[]"  rows="2" cols="100" autocomplete="off" required>'.$results[$exi].'</textarea>';?><input type="text" name="exnumber[]" required size="1"  style="padding-top: 20px;border: 2px solid red;" placeholder="No" ></fieldset></td><td></td></tr>

<?php
}
?>

</div></td></tr></table><br>
<div align="center">
<input name="bigbutton" id="bigbutton" type="submit" value="Submit" />
</div>

</form>


</div>

					</div> <!-- end content-module-main -->
    <script>
    function myFunction(x) {
      document.getElementById("results0").value = x;
    }
    </script>
	    <script>
    function myFunction1(x) {
      document.getElementById("result1").value = x;
    }
    function myFunction2(x) {
      document.getElementById("result2").value = x;
    }
	function myFunction3(x) {
      document.getElementById("result3").value = x;
    }
		function myFunction4(x) {
      document.getElementById("result4").value = x;
    }
		function myFunction5(x) {
      document.getElementById("result5").value = x;
    }
		function myFunction6(x) {
      document.getElementById("result6").value = x;
    }
    </script>

				
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
<style>
/* the checked style using the :checked pseudo class */
[type="radio"]:checked + span:before {
  background: green;
  box-shadow: 0 0 0 0.25em #000;
}

/* never forget focus styling */
[type="radio"]:focus + span:after {
  content: '\0020\2190';
  font-size: 0.5em;
  line-height: 1;
  vertical-align: -0.125em;
}
textarea{
    margin-left: auto;
    margin-right: auto;
}


legend {
  color: #fff;
  background: #000;
  padding: 0.25em 1em;
  border-radius: 1em;
}

.p {
  text-align: center;
  font-size: 8px;
  padding-top: 120px;
}



</style>

</style>

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



