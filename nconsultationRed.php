<?php
error_reporting(0);
    session_start();
    $role = $_SESSION['sess_userrole'];
	$name = $_SESSION['sess_name'];
	$tel= $_SESSION['sess_phone'];
	$lname = $_SESSION['sess_lname'];
     if(!($_SESSION['sess_username']) or ($_SESSION['dirskhpe_rangiro'] !='dirskhpe_rangiro') or $role!="Consultation"){
      header('Location: logout');
	}
include_once('connect_db.php');
$postedesante = $_SESSION['sess_postdsante'];
$_SESSION['labsaved'] = "No";
?>
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
		<?php include_once('menup2.php')?>
	
	<!-- MAIN CONTENT -->
		

			 <!-- end side-menu -->	

			
					






<?php
error_reporting(0);
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
$_SESSION['affnumber'] = $patientnumber;

$_SESSION['sess_name']= $patientnumber;
$dt =  $_GET['dtconsult'];
$_SESSION['mydate'] = $dt;
$labo  = ("select * from consom_labs WHERE patient_id= '$patientnumber'");
$labores = mysqli_query($conn, $labo);
while ($rowlab = mysqli_fetch_assoc($labores)) {
$exemens[] = $rowlab['examen'];	
$qtties[] = $rowlab['examen_qty'];	
$prices[] = $rowlab['examen_price'];	
}
/*$n = count($exemens);
for($i=0; $i<$n; $i++){
echo $exemens[$i].'<br>';	
}*/
$resultpa = ("select id,names,lname,insurance,affiliate_number,consultatiom,category from patient where id ='$patientnumber' order by id DESC LIMIT 1");
$pat = mysqli_query($conn, $resultpa);
while ($rowval = mysqli_fetch_assoc($pat)) {
   $afnumber= $rowval['affiliate_number'];
   $patumber= $rowval['affiliate_number'];
   $firstname=  $rowval['names'];
   $lastname=  $rowval['lname'];
   $insurance=  $rowval['insurance'];
   $_SESSION['insurance'] = $insurance;
   $cosnult= $rowval['consultatiom'];
   $patinetid= $rowval['id'];
    $category= $rowval['category'];

}
$checkamb = $_SESSION['checkamb'];
	$km = $_SESSION['km'];
	//Medicines
$tempmedicine  = ("select * from temp_medicament WHERE patient_id  = '$patientnumber' and date='$dt'");
$temmed = mysqli_query($conn, $tempmedicine);
//Consumptions
$tempconsum = ("select * from temp_consommable WHERE patient_id  = '$patientnumber' and date='$dt'");
$temcons= mysqli_query($conn, $tempconsum);
//Medical Act
$tempactemed = ("select * from temp_actemed WHERE patient_id  = '$patientnumber' and date='$dt'");
$actcons= mysqli_query($conn, $tempactemed);

//Hospitalization
$temphospt = ("select * from temp_hospitlzation WHERE patient_id  = '$patientnumber' and date='$dt'");
$temphosp= mysqli_query($conn, $temphospt);
?>

<form id="patient" name="patient" method="POST" action="saveconsultationRed">
<table style="display:none"> <tr><td><strong>NUMBER :&nbsp;&nbsp;</strong><strong><input size="25" id="number" name="number"  value="<?php echo $afnumber;?>"  class="element text large" type="text"  style=" border: 5px" required></strong>
<input type="text" name="p_id" id="p_id" value="<?php echo $patinetid;?>"required aria-required="true" aria-describedby="name-format" ></td><td><strong>NAMES   :&nbsp;&nbsp;<input id="name" name="name" value="<?php echo $firstname;?>" class="element text large" type="text" style="border: 0px" size="50" required aria-required="true" aria-describedby="name-format" >
</td><td><input id="lname" name="lname" value="<?php echo $lastname;?>" class="element text large" type="text" style="border: 0px" size="50" required aria-required="true" aria-describedby="name-format" ></td></tr>
<tr><td><strong>Consultation :&nbsp;&nbsp;</strong><input id="consultation" name="consultation" size="5" value="<?php echo $cosnult;?>" class="element text large" type="text" style="border: 0px" required aria-required="true" aria-describedby="name-format" ></td><td><strong>INSURANCE   :&nbsp;&nbsp;<input id="insurance" name="insurance" value="<?php echo $insurance;?>" class="element text large" type="text" style="border: 0px" required aria-required="true" aria-describedby="name-format"><input size="25" id="thisdate" name="thisdate"  value="<?php echo $dt;?>"></td></tr>
</table>
<table style="width: 80%;margin:  0px auto;" align="center">
<tr><td valign="top" align="left">
<span style="background-color:#1b4f72"><font color="white">
<strong>Name:&nbsp;&nbsp;<?php echo $firstname;?>&nbsp;&nbsp;<?php echo $lastname;?></strong><br>
<strong>Insurance :&nbsp;&nbsp;<?php echo $insurance;?><br>
<strong>Number:&nbsp;&nbsp;<?php echo $afnumber;?><br>
<strong>Date:&nbsp;&nbsp;<?php echo $newDate = date("d-m-Y", strtotime($dt));?></strong><br>
<strong>Category:&nbsp;&nbsp;<?php echo $category;?></strong></font></span>
</font></span>

   </td><td>

<fieldset id="otherdisplay" style="background:#ffffff;width: 80%;margin:  0px auto;" align="center">
        <legend style="padding:20px 0; font-size:15px;"></legend>
		
		<tr><td>
		 <input type="checkbox" name="List1" id="List1" value="100" onclick="addUp(100, 'List1')"><strong>Fiche de Transfert (100 Frw)</td></tr>
	<tr><td><input type="checkbox" name="List3"  id="List3"  value="20" onClick="addUp(20, 'List3')"><strong>Fiche de Consultation (20 Frw)</td></tr>
	<?php if ( $category!=1)
	{
		?><tr><td><input type="checkbox" name="List4"  id="List4"  value="Ticketmod" onClick="addUp(200, 'List4')"><strong>Null Ticket Moderateur</td></tr>
		<?php
		}
		?>
	  	 
      </fieldset>

	  <fieldset style="background:#eee;width: 50%;margin:  0px auto;" align="center">
 <table  id="mtable" style="background:#eee;width: 60%;margin:  0px auto;" align="center" >
 
 <tr><td align="center"><fieldset style="background:#e1eff2;width: 20%; " disabled><legend></strong><b>Diagnostic  </b></strong></legend><textarea  name="diffenrenciel"  id="diffenrenciel"  rows="2" cols="40" onkeyup="countChar(this)"  required ></textarea></fieldset></td></tr></td>
</table>
</fieldset>
<fieldset style="background:#eee;width: 80%;margin:  0px auto;" align="left">
        <legend style="padding:20px 0; font-size:15px;width: 80%;"><b>Consumptions</b></legend>
<table  id="otherdisplay" style="background:#ffffff;width: 80%;margin:  0px auto;" align="center" border="1">
<tr><td style="width:30px">
 <fieldset id="medicinetab" style="background:#e1eff2;width: 20%">
        <legend style="padding:20px 0; font-size:15px;"><ul id="tabs" class="fl">
				<div align="center"><a href="javascript: void(0)"   onclick="popup('medicines')"><font color="black"><strong>MEDICINES</strong></font></a></div><hr>
				</ul>
				</legend>
		<p><strong>
			<?PHP
	if ($temmed->num_rows > 0) {
		?>
<table>
<tr><td>No</td><td>Medicine</td><td>Quantity</td><td>Price</td><td>Total</td><tr>
  <?php

while ($rowmed = mysqli_fetch_assoc($temmed)) {
	++$i;
	$totalmedic = $rowmed['quantity']*$rowmed['price'];
	?>
	<tr>
	<td><?php echo $i;?></td>
	<td><?php echo $rowmed['medicament_descript'];?></td>
	<td><?php echo number_format($rowmed['quantity']);?></td>
	<td><?php echo number_format($rowmed['price']);?></td>
	<td><?php echo number_format($totalmedic);?></td>

	<?php
	$grandtotal =  $grandtotal+$totalmedic;
	echo '</tr>';
	}

?>
<tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo number_format($grandtotal);?></strong></td></tr>  
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
	   <fieldset id="consumtab" style="background:#e1eff2;width: 40%;">
        <legend style="padding:20px 0; font-size:15px;"><ul id="tabs" class="fl">
				<div align="center"><a href="javascript: void(0)"   onclick="popup('consumptions')"><font color="black"><strong>CONSUMABLES</strong></font></a></div><hr>
				</ul></legend>
		<p><strong>
					<?PHP
	if ($temcons->num_rows > 0) {
		?>
<table>
<tr><td>No</td><td>Consumable</td><td>Quantity</td><td>Price</td><td>Total</td><tr>
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
	<td><?php echo number_format($totalcons);?></td>

	<?php
	$grandtotalcons =  $grandtotalcons+$totalcons;
	echo '</tr>';
	}

?>
<tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo number_format($grandtotalcons);?></strong></td></tr>  
</table>
<?php
	}
	else{
		echo "<span> <font color='Red'> No Consumables </font></span>";
		
	}
?>
</strong>
		</p>
      </fieldset>
	  </td><td> <fieldset id="macttab" style="background:#e1eff2;width: 40%;">
        <legend style="padding:20px 0; font-size:15px;"><ul id="tabs" class="fl">
				<a href="javascript: void(0)"   onclick="popup('medicalacts')"><font color="black"><strong>MEDICAL ACTS</strong></font></a></div><hr>
				</ul></legend>
		<p><strong>
		<?PHP
	if ($actcons->num_rows > 0) {
		?>
<table>
<tr><td>No</td><td>Medical Act</td><td>Quantity</td><td>Price</td><td>Total</td><tr>
  <?php

while ($rowmact= mysqli_fetch_assoc($actcons)) {
	++$ijk;
	$totalmedact = $rowmact['quantity']*$rowmact['price'];
	?>
	<tr>
	<td><?php echo $ijk;?></td>
	<td><?php echo $rowmact['acte_description'];?></td>
	<td><?php echo number_format($rowmact['quantity']);?></td>
	<td><?php echo number_format($rowmact['price']);?></td>
	<td><?php echo number_format($totalmedact);?></td>

	<?php
	$grandtotalmedact =  $grandtotalmedact+$totalmedact;
	echo '</tr>';
	}

?>
<tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo number_format($grandtotalmedact);?></strong></td></tr>  
</table></strong>
<?php
	}
	else{
		echo "<span> <font color='Red'> No Act </font></span>";
		
	}
?>
		</p>
      </fieldset></td>
	  
  <td><fieldset   id="hosptab"  style="background:#e1eff2;width: 40%;">
        <legend style="padding:20px 0; font-size:15px;"><ul id="tabs" class="fl">
				<div align="center"><a href="javascript: void(0)"   onclick="popup('hospitalizations')"><font color="black"><strong>HOSPITALIZATIONS</strong></font></a></div><hr>
				</ul></legend>
		<p><strong>
				<?PHP
	if ($temphosp->num_rows > 0) {
		?>
<table>

<tr><td>No</td><td>Hospitalization</td><td>Quantity</td><td>Price</td><td>Total</td><tr>
  <?php

while ($rowhospt= mysqli_fetch_assoc($temphosp)) {
	++$ijkl;
	$totalhosp = $rowhospt['quantity']*$rowhospt['price'];
	?>
	<tr>
	<td><?php echo $ijkl;?></td>
	<td><?php echo $rowhospt['temphospdescr'];?></td>
	<td><?php echo number_format($rowhospt['quantity']);?></td>
	<td><?php echo number_format($rowhospt['price']);?></td>
	<td><?php echo number_format($totalhosp);?></td>

	<?php
	$grandtotalhsopital =  $grandtotalhsopital+$totalhosp;
	echo '</tr>';
	}

?>
<tr><td colspan="3"><strong>Total</strong></td><td><strong><?php echo number_format($grandtotalhsopital);?></strong></td></tr>  
</table>
<?php
	}
	else{
		echo "<span> <font color='Red'> No Hospitalization </font></span>";
		
	}
?></strong>
		</p>
      </fieldset></td></tr></table>
	  </fieldset>
<br>
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
<script type="text/javascript">
<!--
function popup(url) 
{
 var width  = 1200;
 var height = 700;
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



