<?php
error_reporting(0);
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Maternite"){
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
	<script src="jquerydis1.min.js"></script>
<script>
$(document).ready(function(){
    $('#destination').on('change', function() {
      if ( this.value == 'Cashier')
      {
        $("#labtab").hide();
        $("#tdtab").hide();
	    $("#consumtab").show();
        $("#medicinetab").show();
        $("#macttab").show();
        $("#hosptab").show();
        $("#mtable").show();
        $("#otherdisplay").show();
		document.getElementById("diffenrenciel").disabled = false;
      }
      else  if ( this.value == 'Laboratoire')
      {
          $("#medicinetab").hide();
        $("#consumtab").hide();
        $("#macttab").hide();
        $("#labtab").show();
        $("#hosptab").hide();
        $("#mtable").hide();
        $("#otherdisplay").hide();
		document.getElementById("diffenrenciel").disabled = true;
      }
       else  
      {
        $("#medicinetab").hide();
        $("#labtab").hide();
        $("#consumtab").hide();
        $("#macttab").hide();
        $("#hosptab").hide();
        $("#mtable").hide();
		document.getElementById("diffenrenciel").disabled = true;
      }
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
		<?php include_once('menumat2.php')?>
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			 <!-- end side-menu -->	

			
				<div class="content-module">				
					
						<div class="content-module-main cf">






<?php
error_reporting(0);
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

$_SESSION['sess_name']= $patientnumber;
$dt = $_GET['dtconsult'];
$_SESSION['mydate'] = $dt;
$resultpa = ("select id,names,lname,insurance,affiliate_number,consultatiom,category,cas from patient where id ='$patientnumber' order by id DESC LIMIT 1");
$pat = mysqli_query($conn, $resultpa);
while ($rowval = mysqli_fetch_assoc($pat)) {
   $ID= $rowval['id'];
   $afnumber= $rowval['affiliate_number'];
   $patumber= $rowval['affiliate_number'];
   $firstname=  $rowval['names'];
   $lastname=  $rowval['lname'];
   $insurance=  $rowval['insurance'];
   $cosnult= $rowval['consultatiom'];
   $patinetid= $rowval['id'];
   $category= $rowval['category'];
   $cas = $rowval['cas'];
   
}




?>

<form id="patient" name="patient" method="POST" action="">

<fieldset style="background:#eee;width: 70%;margin:  0px auto;" align="center">
        <legend style="padding:20px 0; font-size:15px;"><b>Patient Orientation</b></legend>
<table style="width: 60%;margin:  0px auto;" align="center">
<tr><td valign="top" align="left">
<input type="text" name="affnumber" id="affnumber"  value="<?php echo $affnumber;?>" style="display:none" required>
<input type="text" name="dateconsult" id="dateconsult" value="<?php echo $dtconsult;?>" style="display:none"  required  >
<br><br>
<span style="background-color:black"><font color="white">
<strong>Name:&nbsp;&nbsp;<?php echo $firstname;?>&nbsp;&nbsp;<?php echo $lastname;?></strong><br><br>
<strong>Insurance :&nbsp;&nbsp;<?php echo $insurance;?><br><br>
<strong>Number:&nbsp;&nbsp;<?php echo $afnumber;?><br><br>
<strong>Date:&nbsp;&nbsp;<?php echo $newDate = date("d-m-Y", strtotime($dt));?></strong><br><br>
<strong>Category:&nbsp;&nbsp;<?php echo $category;?></strong><br></font></span>
</font></span><br><br>

    <select class="box" name="destination"  required >
      <option value="">--Select Destination----</option>
	 <option value='Cashier'>Cashier</option>
      <option value = 'Laboratoire'>Laboratoire</option>

    </select>
	
</td></tr></table>
</fieldset>
<br><br>
<input name="bigbutton" id="bigbutton" type="submit" value="Submit" />
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
<?php 
if (isset($_POST['bigbutton'])) {
	$destination =$_POST['destination'];

	if($destination =='Cashier'){
		$UPDATEstatus= "UPDATE consultation SET origine = 'Maternite',branch = 'RedAndAdded'  WHERE patient_id = '$ID'"; 
mysqli_query($conn,$UPDATEstatus);
echo "<script>alert('Patient  Sent to Casshier')</script>";
echo "<script>window.location='nconsultationMatRed?affid=$affnumber&dtconsult=$dt&case=$cas';</script>";
	}
 

if($destination =='Laboratoire'){
		$UPDATEstatus= "UPDATE consultation SET origine   = 'Laboratoire',branch = 'RedAndAdded' WHERE patient_id = '$ID'"; 
mysqli_query($conn,$UPDATEstatus);
	echo "<script>alert('Patient  Sent to Laboratory')</script>";
echo "<script>window.location='nmaternite1?affid=$affnumber&dtconsult=$dt&case=$cas';</script>";
	}
} 
?>
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



